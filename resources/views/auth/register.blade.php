<?php /** @var Illuminate\Support\MessageBag $errors */ ?>

@extends('layouts.master')
@section('title', 'Sign up')

@section('content')
  <form class="form" method="post" action="/register">
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
      <label for="password" class="input_label">
        Password <span style="opacity: 0.5;">(6 or more characters)</span>
      </label>
      <div style="display: grid; grid-template-columns: 1fr auto;">
        <input type="password"
               required
               minlength="6"
               name="password"
               id="password"
               class="input_field">
        <button type="button" class="button is-secondary is-icon"
                onclick="password.type = password.type === 'password' ? 'text' : 'password'; icon.textContent = icon.textContent === 'visibility' ? 'visibility_off' : 'visibility'">
          <span class="button_icon is-alone" id="icon">visibility</span>
        </button>
      </div>
    </div>

    {{--remember user by default--}}
    <input type="hidden" name="remember" value="true">

    <button class="button" style="justify-self: end;">Sign up</button>

    <small style="margin-left:auto; opacity: 0.5;">
      By signing up, you agree to our <a href="/about#legal-notice">legal
        notice</a>.
    </small>
  </form>
@endsection
