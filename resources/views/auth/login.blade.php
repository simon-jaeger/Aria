<?php /** @var Illuminate\Support\MessageBag $errors */ ?>

@extends('layouts.master')

@section('content')
  <h1>Login</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form method="post" action="/login" novalidate>
    @csrf
    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="a@b">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password" value="p">
    </div>
    <button type="submit">Log in</button>
  </form>
@endsection
