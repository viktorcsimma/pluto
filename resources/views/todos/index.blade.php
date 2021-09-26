@extends('layouts.app')

@section('title')
  Reminders
@endsection

@section('content')

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Expiration date</th>
      <th>Completed</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($all_todos as $todo)
    <tr>
      <td>{{$todo->name}}</td>
      <td>{{$todo->description}}</td>
      <td>{{$todo->expiration_date}}</td>
      <td>{{$todo->completed}}</td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
