@extends('layouts.app');
@section('content')
    @foreach($tasks as $task)
        <h1>{{$task->name}}</h1>
        <p>{{$task->title}}</p> {{$task->status}}
    @endforeach
@endsection
