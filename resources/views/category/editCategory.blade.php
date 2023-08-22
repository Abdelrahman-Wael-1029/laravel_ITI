<!DOCTYPE html>
<html>


<body>
    @extends('layouts.app')
    @section('content')
    <div class="container">
        <form method="post" class="form-group" id="categoryEdit" action="{{route('category.update', $item)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="text" name='id' hidden value="{{$item['id']}}">
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" class="form-control field" name="name" value="{{old('name') ?? $item['name']}}" id="name">

                <div class="form-text text-danger error" style="display:none;"></div>

            </div>

            <div class="form-group">
                <label for="description">description</label>
                <input type="text" class="form-control field" name="description" value="{{old('description') ?? $item['description']}}" id="description">

                <div class="form-text text-danger error" style="display:none;"></div>

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
    $(function() {
        $('#edit').click(async function(e) {
            e.preventDefault();
            $('.error').css('display', 'none');
            $('.field').removeClass('is-invalid');

            let res = Ajax('post', "{{route('category.update', $item)}}", $('#categoryEdit').serialize())
                .then((res) => {
                    Swal.fire(
                        'successed!',
                        'category updated successfully!',
                        'success'
                    );
                })
                .catch((err) => {
                    console.log(err);
                    let errors = err.responseJSON.errors;
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


</html>