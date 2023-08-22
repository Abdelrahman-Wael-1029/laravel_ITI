<!DOCTYPE html>
<html lang="en">


<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">

        <form method="post" id="productForm" class="form-group" action="" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control field" name="name" value="{{old('name')}}" id="name">

                <div class="form-text text-danger error"></div>


            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="number" class="form-control field" name="price" value="{{old('price')}}" id="price">

                <div class="form-text text-danger error"></div>

            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control field" name="description" value="{{old('description')}}" id="description">
                <div class="form-text text-danger error" style="display:none;"></div>

            </div>
            <div>
                <label for="image">image</label>
                <input type="file" class="form-control field" name='image' id='image'>
                <div class="form-text text-danger error" style="display:none;"></div>

            </div>
            <div class="form-group">
                <label for="category">enter category</label>
                <select name="category_id" class="form-control field" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
                <div class="form-text text-danger error" style="display:none;"></div>

            </div>
            <br>
            <div>
                <button class="btn btn-primary btn-block" id="add"> add</button>
            </div>
        </form>
    </div>
    @endsection

    @section('script')
    <script>
        $(function() {
            $('#success').hide();

            $('#add').click(function(e) {
                e.preventDefault();
                $('.error').css('display', 'none');
                $('.field').removeClass('is-invalid');

                let res = Ajax("post", "{{route('products.store')}}", new FormData($('#productForm')[0]), true);

                res.then(function(response) {
                    Swal.fire(
                        'successed!',
                        'product added successfully!',
                        'success'
                    );
                }).catch(function(error) {
                    let errors = error.responseJSON.errors;
                    $.each(errors, function(key, value) {
                        $(`#${key}`).addClass('is-invalid');
                        $(`#${key}`).next('.error').css('display', 'block').text(value);
                    })
                });

            });
        });
    </script>
    <script src="{{asset('js/ajax.js')}}"></script>

    @stop
</body>


</html>