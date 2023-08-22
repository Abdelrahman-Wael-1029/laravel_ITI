<!DOCTYPE html>
<html lang="en">

<body>
    @extends('layouts.app')
    @section('content')

    <div class="container">
        <form method="post" class="form-group" id="productEdit" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name='id' value="{{$item['id']}}" hidden>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control field" name="name" id="name" value="{{old('name') ?? $item['name']}}">
                <div class="form-text text-danger error" style="display:none;"></div>

            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="number" class="form-control field" name="price" id="price" value="{{old('price') ?? $item['price']}}">
                <div class="form-text text-danger error" style="display:none;"></div>
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control field" name="description" id="description" value="{{ old('description') ?? $item['description']}}">
                <div class="form-text text-danger error" style="display:none;"></div>
            </div>
            <div class="form-group">
                <label for="category">enter category</label>
                <select name="category_id" class="form-control field" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}" @if ($category['id']==$item['category_id']) selected @endif>
                        {{$category['name']}}
                    </option>
                    @endforeach
                </select>
                <div class="form-text text-danger error" style="display:none;"></div>
            </div>
            <div>
                <label for="image">image</label>
                <input type="file" class="form-control field" name='image' id='image'>
                <div class="form-text text-danger error" style="display:none;"></div>
            </div>
            <br>
            <div>
                <button class="btn btn-primary btn-block" id="add"> update</button>

            </div>
        </form>
    </div>
    @endsection

    @section('script')
    <script>
        $(function() {
            $('#add').click(function(e) {
                e.preventDefault();
                $('.error').css('display', 'none');
                $('.field').removeClass('is-invalid');

                let res = Ajax("post", "{{route('products.update', $item['id'])}}", new FormData($('#productEdit')[0]),true)
                res.then(function(response) {
                    Swal.fire(
                        'successed!',
                        'product updated successfully!',
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
    @stop
</body>
<script src="{{asset('js/ajax.js')}}"></script>


</html>