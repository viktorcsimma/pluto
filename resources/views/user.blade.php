@extends('layouts.app')

@section('content')
    <table>
      <thead>
        <td><strong>User</strong></td>
        <td><strong>E-mail</strong></td>
      </thead>
      @foreach ($all_users as $user)
      @if ($user==$current_user)
      <tr>
        <td><em>{{$current_user->name}}</em></td>
        <td><em>{{$current_user->email}}</em></td>
      </tr>
      @else:
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
      </tr>
      @endif
      @endforeach
    </table>
@endsection

@section('title')
    Felhasználók
@endsection
