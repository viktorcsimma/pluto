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
    <a href='create' class="btn">@lang('todo.new')</a>
  </div>
</div>
@else
<table>
  <tr>
    <td>
      <a href='todos/create' class="btn">@lang('todo.new')</a>
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
<table>
  <thead>
    <tr>
      <th>@lang('todo.name')</th>
      <th>@lang('todo.desc')</th>
      <th>@lang('todo.expire')</th>
      <th>@lang('todo.expired')</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($todos as $todo)
    @if(!is_null($todo->expiration_date)
            && $todo->expiration_date < date('Y-m-d'))
    <tr class="red-text"> <!--print them with red-->
    @else
    <tr>
    @endif
      <td>{{$todo->name}}</td>
      <td>{{$todo->description}}</td>
      <td><nobr>{{$todo->expiration_date}}</nobr></td>
      <td>
        @if($todo->expiration_date < date('Y-m-d'))
          @lang('todo.yes')
        @else
          @lang('todo.no')
        @endif
      </td>
      <td>
        @if (!($todo->completed))
        <form action="{{route('todos.set_completed', $todo)}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$todo->id}}" />
          <button class="btn" type="submit">@lang('todo.done')</button>
        </form>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
