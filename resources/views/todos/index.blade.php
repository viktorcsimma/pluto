@extends('layouts.app')

@section('title')
  @lang('todo.todos')
@endsection

@section('content')
@isset($completed_count, $expired_count)
<div class="card">
  <div class="card-content">
    <blockquote>
      @lang('todo.stat', ['completed' => $completed_count, 'expired' => $expired_count])
  </div>
  <div class="card-action">
    <a href="{{route('todos.create')}}" class="btn">@lang('todo.new')</a>
  </div>
</div>
@else
<table>
  <tr>
    <td>
      <a href="{{route('todos.create')}}" class="btn">@lang('todo.new')</a>
    </td>
  </tr>
</table>
@endisset

<table>
  <tr>
    <td>

    </td>
  </tr>
</table>
@foreach ($todos as $todo)
  @include('todos.card', ['todo' => $todo])
@endforeach

@endsection
