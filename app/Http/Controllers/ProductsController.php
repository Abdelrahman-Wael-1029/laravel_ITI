<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Validation\Validator;
use App\Http\Requests\Products\AddProduct;
use App\Http\Requests\Products\UpdateProduct;
use App\Events\viewProduct;

require_once 'Default.php';

class ProductsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    function index()
    {
        $data = Product::with(['category' => function ($q) {
            $q->select('id', 'name');
        }])->paginate(PAGINATE);
        return view('products/products', ['item' => $data]);
    }

    function create()
    {
        $categories = category::all();
        return view('products/addProduct', ['categories' => $categories->toArray()]);
    }

    function store(AddProduct $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        // return dd($request->file()['image']->getLinkTarget());
        // return dd($_FILES['image']);
        $product->image = $this->storeImage($request);

        $product->save();

        // return redirect('products');  
        return response()->json([
            'status' => true,
            'message' => "The successful delete to the $product->name product",

        ]);
    }

    function show(Product $product)
    {
        $id = $product->id;

        $item = Product::with(['category' => function ($q) {
            $q->select('id', 'name');
        }])->where('id', $id)->get()->toArray();
        if (!$item) {
            abort(404);
        }

        event(new viewProduct($product));
        return view('products/show', ['item' => $item[0]]);
    }

    function edit(Product $product)
    {
        if (!$product) {
            abort(404);
        }
        return view('products/editProduct', ['item' => $product, 'categories' => Category::all()->toArray()]);
    }

    function update(UpdateProduct $request, Product $product)
    {
        if (!$product) {
            abort(404);
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        if ($request->image) {
            $this->remove($product->image);
            $product->image = $this->storeImage($request);
        }
        $product->save();

        // return redirect('products'); 
        return response()->json([
            'status' => true,
            'message' => "The successful update to the $product->name product",
        ]);
    }

    private function storeImage(Request $request)
    {

        $extension = $request->image->getClientOriginalExtension();

        $imageName = time() . "." . $extension;

        move_uploaded_file($_FILES['image']['tmp_name'], public_path('images/' . $imageName));

        return $imageName;
    }

    private function remove($imageName)
    {
        try {
            unlink(public_path('images/' . $imageName));
        } catch (\Exception $e) {
            return;
        }
    }

    function destroy(Product $product)
    {
        if (!$product) {
            abort(404);
        }
        $this->remove($product->image);
        $product->delete();
        // return redirect('products');
        return response()->json([
            'status' => true,
            'message' => "The successful delete to the $product->name product",
        ]);
    }
}
