<!DOCTYPE html>
<html lang="en">

<body>
    @extends('layouts.app')
    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{asset('images/'.$item['image'])}}" alt="" width="100%">
            </div>
            <div class="col-md-6">
                <h1>name: {{$item['name']}}</h1>
                <h2>price: {{$item['price']}}</h2>
                <p><b>desc</b> : {{$item['description']}}</p>
                <p><b>category</b> : {{$item['category']['name']}}</p>
            </div>
        </div>
    </div>
    @endsection 
</body>

</html>