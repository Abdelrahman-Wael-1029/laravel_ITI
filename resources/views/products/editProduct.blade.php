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
                <input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? $item['name']}}">
                <div class="form-text text-danger" style="display:none;"></div>

            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="number" class="form-control" name="price" id="price"
                    value="{{old('price') ?? $item['price']}}">
                <div class="form-text text-danger" style="display:none;"></div>
            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" name="description" id="description"
                    value="{{ old('description') ?? $item['description']}}">
                <div class="form-text text-danger" style="display:none;"></div>
            </div>
            <div class="form-group">
                <label for="category">enter category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}" @if ($category['id']==$item['category_id']) selected @endif>
                        {{$category['name']}}</option>
                    @endforeach
                </select>
                <div class="form-text text-danger" style="display:none;"></div>
            </div>
            <div>
                <label for="image">image</label>
                <input type="file" class="form-control" name='image' id='image'>
                <div class="form-text text-danger" style="display:none;"></div>
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
        $(function(){
      $('#add').click(function(e){
        e.preventDefault();
        $('.form-text').css('display', 'none');
        $('.form-control').removeClass('is-invalid');
    
        $.ajax({
          url: "{{route('products.update', $item['id'])}}",  
          method: "post",
          data: new FormData($('#productEdit')[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
          success: function(response){
            Swal.fire(
            'successed!',
            'product updated successfully!',
            'success'
            );
          },
            error: function(xhr){
                let errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value){
                    $(`#${key}`).addClass('is-invalid');
                    $(`#${key}`).next('.form-text').css('display', 'block').text(value);
                })
            }
        });
      });
    });
    </script>
    @stop
</body>

</html>