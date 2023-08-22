<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\AddCategory;
use App\Http\Requests\Category\UpdateCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
require_once 'Default.php';

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::with(['user' => function ($q) {
            $q->select('id', 'name');
        }])->orderBy('name')->paginate((int)PAGINATE);
        return view('category/index', ['item' => $category]);
    }

    private function checkUser($userId)
    {
        return Auth::user()->id == $userId;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        return view('category/addCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategory $request)
    {
        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->user_id = $request->user;
        $category->save();
        return response()->json([
            'status' => true,
            'message' => "The successful added to the $category->name category",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = response()->json($category->products);

        return view('category/show', ['category' => $category, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (!$this->checkUser($category->user->id)) {
            return redirect()->route('category.index')->withErrors(['not allow' => 'not allow to edit']);
        }
        if (!$category) {
            abort(404);
        }
        return view('category/editCategory', ['item' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return response()->json([
            'status' => true,
            'message' => "The successful update to the $category->name category",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if (!$this->checkUser($category->user->id)) {
            return response()->json([
                'status' => false,
                'error' => "not allow to delete",
            ]);
        }

        if (!$category) {
            abort(404);
        }

        $category->delete();

        return response()->json([
            'status' => true,
            'message' => "The successful delete to the $category->name category",
        ]);
    }
}
