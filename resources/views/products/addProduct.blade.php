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
                <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">

                <div class="form-text text-danger">{{$message}}</div>


            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="number" class="form-control" name="price" value="{{old('price')}}" id="price">

                <div class="form-text text-danger">{{$message}}</div>

            </div>
            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}"
                    id="description">
                <div class="form-text text-danger" style="display:none;"></div>

            </div>
            <div>
                <label for="image">image</label>
                <input type="file" class="form-control" name='image' id='image'>
                <div class="form-text text-danger" style="display:none;"></div>

            </div>
            <div class="form-group">
                <label for="category">enter category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach ($categories as $category)
                    <option value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
                <div class="form-text text-danger" style="display:none;"></div>

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
        $(function(){
            $('#success').hide();

      $('#add').click(function(e){
        e.preventDefault();
        $('.form-text').css('display', 'none');
        $('.form-control').removeClass('is-invalid');

    
        $.ajax({
          url: "{{route('products.store')}}",  
          method: "post",
          data: new FormData($('#productForm')[0]),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
          success: function(response){
            Swal.fire(
            'successed!',
            'product added successfully!',
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