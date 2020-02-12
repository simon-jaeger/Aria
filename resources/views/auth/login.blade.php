<?php /** @var Illuminate\Support\MessageBag $errors */ ?>

@extends('layouts.master')
@section('title', 'Login')

@section('content')
  <form class="form" method="post" action="/login">
    @csrf

    @if($errors->any())
      <ul class="alert is-error">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <div class="input">
      <label for="email" class="input_label">Email</label>
      <input type="email"
             required
             name="email"
             id="email"
             class="input_field"
             value="{{ old('email') }}">
    </div>

    <div class="input">
      <label for="password" class="input_label">Password</label>
      <div style="display: grid; grid-template-columns: 1fr auto;">
        <input type="password"
               required
               name="password"
               id="password"
               class="input_field">
        <button type="button"
                class="button is-secondary is-icon"
                onclick="password.type = password.type === 'password' ? 'text' : 'password'; icon.textContent = icon.textContent === 'visibility' ? 'visibility_off' : 'visibility'">
          <span class="button_icon is-alone" id="icon">visibility</span>
        </button>
      </div>
    </div>

    {{--remember user by default--}}
    <input type="hidden" name="remember" value="true">

    <button class="button" style="justify-self: end;">Log in</button>
  </form>
@endsection
