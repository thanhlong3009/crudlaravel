@extends('crud.commondheader.header')
@section('content')
    <h2 style="color: red">Update</h2>
    <form action="/update/{{$task->id}}" method="POST">
        @csrf
        Name: <input type="text" name="name" value="{{$task->name}}">
        Description: <input type="text" name="description" value="{{$task->description}}">
        {{--        status khi ma tao thi mac dinh la chua lam xong nen k phai nhap k lien quan nguoi dung --}}


        <button type="submit" class="btn btn-success">Update </button>



    </form>

@endsection

