<!DOCTYPE html>
<html>


<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <form method="post" class="form-group" id="categoryEdit" action="{{route('category.update', $item)}}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name='id' hidden value="{{$item['id']}}">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control" name="name" value="{{old('name') ?? $item['name']}}" id="name">

                <div class="form-text text-danger" style="display:none;"></div>

            </div>

            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control" name="description"
                    value="{{old('description') ?? $item['description']}}" id="description">

                <div class="form-text text-danger" style="display:none;"></div>

            </div>
            <br>
            <div>
                <button class="btn btn-primary btn-block" id='edit'> update</button>
            </div>
        </form>
    </div>
    @endsection
</body>

@section('script')
<script>
    $(function(){
      $('#edit').click(function(e){
        e.preventDefault();
        $('.form-text').css('display', 'none');
        $('.form-control').removeClass('is-invalid');


        
        $.ajax({
            // method:'post',
            type: 'PUT',
            url: "{{route('category.update', $item)}}",  
            data: $('#categoryEdit').serialize(),
            success: function(response){
                Swal.fire(
                            'successed!',
                            'category updated successfully!',
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


</html>