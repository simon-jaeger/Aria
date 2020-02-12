<?php /** @var Illuminate\Support\MessageBag $errors */ ?>

@extends('layouts.master')

@section('content')
  <h1>Register</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form method="post" action="/register" novalidate>
    @csrf
    <div>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
      <label for="password">Password</label>
      <input type="password" id="password" name="password">
    </div>
    <button type="submit">Register</button>
  </form>
@endsection
