<!DOCTYPE html>
<html>


<body>
  @extends('layouts.app')
  @section('content')
  <div class="container">
    <form method="post" id="categoryForm" class="form-group">
      @csrf
      <input type="text" name="user" hidden value="{{Auth::user()->id}}">
      <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">

        <div class="form-text text-danger" style="display:none;"></div>

      </div>

      <div class="form-group">
        <label for="description">description</label>
        <input type="text" class="form-control" name="description" value="{{old('description')}}" id="description">

        <div class="form-text text-danger" style="display:none;"></div>

      </div>
      <br>
      <div>
        <button class="btn btn-primary btn-block" id='add'> add</button>
      </div>
    </form>
  </div>
  @endsection
</body>
@section('script')
<script>
  $(function(){
      $('#add').click(function(e){
        e.preventDefault();
        $('.form-text').css('display', 'none');
        $('.form-control').removeClass('is-invalid');

        let form = new FormData($('#categoryForm')[0]);
        $.ajax({
          url: "{{ route('category.store') }}",  
          method: "POST",
          data: $('#categoryForm').serialize(),
          success: function(response){
            Swal.fire(
                        'successed!',
                        'category added successfully!',
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