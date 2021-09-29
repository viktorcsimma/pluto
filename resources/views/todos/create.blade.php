@extends('layouts.app')

@section('title')
  @lang('todo.new')
@endsection

@section('content')

  <form action="{{route('todos.store')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="@lang('todo.name')"/>
    <input type="text" name="description" placeholder="@lang('todo.desc')"/>

    <button class="btn" type="submit">@lang('todo.create')</button>
  </form>

@endsection
