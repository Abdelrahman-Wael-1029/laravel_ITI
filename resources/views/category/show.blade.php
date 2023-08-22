<!DOCTYPE html>
<html lang="en">

<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>{{$category['name']}}</h1>
                <p>
                    <b>description: </b> {{$category['description']}}
                </p>
            </div>
            <div class="col-md-6">
                <h2>all products</h2>
                <ul>
                    @foreach($products->getData() as $product)
                    <li>
                        <a href="{{route('products.show', $product->id)}}">
                            {{$product->name}}
                        </a>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
    @endsection
</body>


</html>