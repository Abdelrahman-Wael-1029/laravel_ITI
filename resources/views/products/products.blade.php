<!DOCTYPE html>
<html lang="en">

<body>
    @extends('layouts.app')
    @section('content')
    <div>
        <h1>all products</h1>
    </div>
    <div class="container">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        price
                    </th>
                    <th>
                        category
                    </th>
                    <th>
                        views
                    </th>
                    <th colspan="3">
                        action
                    </th>
                </tr>
            </thead>
            {{-- @dd($item) --}}
            <tbody>
                @foreach ($item as $product)
                @php($id = $product['id'])
                <tr>
                    <td>
                        {{$id}}
                    </td>
                    <td>
                        {{$product['name']}}
                    </td>
                    <td>
                        {{$product['price']}}
                    </td>
                    <td>
                        {{$product['category']['name']}}
                    </td>
                    <td>
                        {{$product['views']}}
                    </td>
                    <td>
                        <a class="btn-primary btn"  href = "{{route('products.edit',  $id)}}">
                            edit
                        </a>
                    </td>
                    <td>
                        <a class="btn-info btn" href ="{{route('products.show', $id)}}">
                            show
                        </a>
                    </td>
                    <td>
                        <form id='productDelete' method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger delete" data-id="{{$id}}">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{route('products.create')}}" class="btn btn-primary btn-block">add product</a>

    </div>
    @endsection

    @section('script')
    <script>
        $(document).on('click','.delete', function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(result => {
                if(result.value){
                    let id = $(this).attr('data-id');
                    let route = '{{route("products.destroy", ":id")}}';
                    route = route.replace(':id', id);
                    $.ajax({
                        url : route,
                        method: "post",
                        data:$('#productDelete').serialize(),
                        success: (response) =>{
                            $(this).closest('tr').remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                        },
                        error: function(xhr){
                            console.log(xhr.responseText); 
                        }
                    });
                }
            });
        });
    </script>
    @stop
</body>


</html>