<!DOCTYPE html>
<html lang="en">

<body>
    @extends('layouts.app')
    @section('content')
    <div>
        <h1>all categories</h1>
    </div>


    <div class="container">
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>
                        id
                    </th>
                    <th>
                        name
                    </th>
                    <th>
                        description
                    </th>
                    <th>
                        user name
                    </th>
                    <th colspan="2">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($item as $category)
                @php($id = $category['id'])
                <tr>
                    <td>
                        {{$category['id']}}
                    </td>
                    <td>
                        {{$category['name']}}
                    </td>
                    <td>
                        {{$category['description']}}

                    </td>
                    <td>
                        {{$category['user']['name']}}
                    </td>

                    <td>
                        <a class="btn-primary btn" href="{{route('category.edit',  $id)}}">
                            edit
                        </a>
                    </td>
                    <td>
                        <a class="btn-info btn" href="{{route('category.show',  $id)}}">
                            show
                        </a>
                    </td>

                    <td>
                        <form id="categoryDelete" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger delete" data-id="{{$id}}">delete</button>
                        </form>
                    </td>
                    @endforeach
            </tbody>
        </table>
        <!-- display links -->
        <div class="d-flex justify-content-end">
            {{ $item->links('pagination::bootstrap-4') }}
        </div>

        <a href="{{route('category.create')}}" class="btn btn-primary btn-block">add category</a>

    </div>
    @endsection

    @section('script')
    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $(this).attr('data-id');
                    let route = '{{route("category.destroy", ":id")}}';
                    route = route.replace(':id', id);
                    $.ajax({
                        url: route,
                        method: "post",
                        data: $('#categoryDelete').serialize(),
                        success: (response) => {
                            if (response.status === true) {
                                $(this).closest('tr').remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'Oops...',
                                    response.error ?? 'something went wrong!',
                                    'error'
                                )
                                console.log(response);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);

                        }
                    });
                }
            })
        });
    </script>

    @if($errors->any())
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $errors->first() }}'
            });
        })
    </script>
    @endif
    @stop
</body>

<script src="{{asset('js/ajax.js')}}"></script>


</html>