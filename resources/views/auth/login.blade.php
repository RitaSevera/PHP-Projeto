@extends('layouts.main_layout')

 @section('content')

 <form method="POST" action="{{route('login')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Submeter</button>

    <div class="mb-3">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
      </div>

      <a href="{{route('password.request')}}">Esqueci-me da password</a>
</form>


  @endsection
