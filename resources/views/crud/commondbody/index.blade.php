@extends('crud.commondheader.header')
@section('content')
    <form action="/create" method="POST">
        @csrf
        Name: <input type="text" name="name">
         <br>
        Description: <textarea id='summernote' type="text" name="description" ></textarea>

        {{--        status khi ma tao thi mac dinh la chua lam xong nen k phai nhap k lien quan nguoi dung --}}
        @foreach($tags as $tag)
            <input type="checkbox" name="tags[]" value="{{$tag->id}}"> {{$tag->name}}
        @endforeach
        <button class="btn btn-primary" type="submit">Add Task</button>
        <ul class="alert text-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Tags</th>
            <th scope="col">By</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
{{--            foreach de lap cac bang ghi trong database tham so dau tien la mang tham so sau as ( thu hai ) la bien chay --}}
            <tr>
                <th scope="row">{{$task->id}}</th>
                <td>{{$task->name}}</td>
                <td>{!!$task->description!!}</td>
                <td>{{$task->status}}</td>
                <td>
                    @foreach($task->tags as $tag)
                        <span class="badge badge-secondary">{{$tag->name}}</span>
                    @endforeach
                </td>
                <td> Auth: {{ Auth::user()->name }}</td>
                <td>
                    <a href="/task/show/{{$task->id}}" class="btn btn-success">Show</a>
                    <a href="/task/update/{{$task->id}}" class="btn btn-primary">Edit</a>
                    <form action="/delete/{{$task->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-warning">Delete</button>
                    </form>
                </td>
            <tr>
        @endforeach
        </tbody>
    </table>
@endsection

