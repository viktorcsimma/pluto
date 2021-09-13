@extends('layouts.app')

@section('title')

Felhasználói beállítások

@endsection

@section('content')


<table>
    <thead>
      <tr>
          <th>Name</th>
          <th>Email</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($users as $user2)
        @if($user2 == $user)
        <tr>
            <td><b>{{ $user2->name }}</b></td>
            <td><b>{{ $user2->email }}</b></td>
        </tr>
        @else
        <tr>
            <td>{{ $user2->name }}</td>
            <td>{{ $user2->email }}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>

  

@endsection