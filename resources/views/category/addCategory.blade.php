<!DOCTYPE html>
<html>


<body>
  <script>
                    Swal.fire(
                            'successed!',
                            'category updated successfully!',
                            'success'
                        );
  </script>
  @extends('layouts.app')
  @section('content')
  <div class="container">
    <form method="post" id="categoryForm" class="form-group">
      @csrf
      <input type="text" name="user" hidden value="{{Auth::user()->id}}">
      <div class="form-group">
        <label for="name">name</label>
        <input type="text" class="form-control field" name="name" value="{{old('name')}}" id="name">

        <div class="form-text text-danger error" style="display:none;"></div>

      </div>

      <div class="form-group">
        <label for="description">description</label>
        <input type="text" class="form-control field" name="description" value="{{old('description')}}" id="description">

        <div class="form-text text-danger error" style="display:none;"></div>

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
        $('.error').css('display', 'none');
        $('.field').removeClass('is-invalid');

        let res = Ajax('post', "{{ route('category.store') }}", $('#categoryForm').serialize());
        res.then(function(response){
          Swal.fire(
                        'successed!',
                        'category added successfully!',
                        'success'
                      );
        }).catch(function(error){
          let errors = error.responseJSON.errors;
          $.each(errors, function(key, value){
            $(`#${key}`).addClass('is-invalid');
            $(`#${key}`).next('.error').css('display', 'block').text(value);
          })
        });
      });
    });
</script>

<script src="{{asset('js/ajax.js')}}"></script>

@stop


</html>