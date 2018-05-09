@extends('layouts.admin')

@section('content')

    <h1>Media</h1>

    <form action="delete/media" method="post" class="form-inline">
        {{csrf_field()}}
        {{method_field('delete')}}
        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        <div class="form-group">
            <select name="checkBoxArray" id="" class="form-control">
                <option value="">Delete</option>
            </select>
        </div>
        <div class="form-group">
            <input type="submit" name="delete_all" class="btn btn-primary">
        </div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Photo Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Created</th>
        </tr>
        </thead>
        <tbody>
        @if($photos)
            @foreach($photos as $photo)
            <tr>
                <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                <td>{{$photo->id}}</td>
                <td><img height="50" src="{{$photo->file}}" alt="no image"></td>
                <td>{{$photo->file}}</td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'no date'}}</td>
                <td>
                    <input type="hidden" name="photo" value="{{$photo->id}}">
                    <div class="form-group">
                        <input type="submit" name="delete_single" value="Delete" class="btn btn-danger">
                    </div>

                </td>
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    </form>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$photos->render()}}
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $(document).ready(function(){
          $('#options').click(function(){
             if(this.checked){
                 $('.checkBoxes').each(function(){
                    this.checked = true;
                 });
             }else{
                 $('.checkBoxes').each(function(){
                     this.checked = false;
                 });
             }

             console.log('it works');
          });
        });
    </script>
@stop
