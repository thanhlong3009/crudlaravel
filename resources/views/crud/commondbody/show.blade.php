@extends('crud.commondheader.header')
@section('content')

    <br>ID      <th  scope="row">{{$task->id}}</th>
    <br>Name:    <td>{{$task->name}}</td>
    <br>DES:     <td>{{$task->description}}</td>
    <br>STATUS:  <td>{{$task->status}}</td>
    <br>TAGS :    @foreach($task->tags as $tag)
                    <span class="badge badge-secondary">{{ $tag->name }}</span>
                    @endforeach


@endsection

