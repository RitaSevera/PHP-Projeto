@extends('layouts.main_layout')
@section('content')

<form method="POST" action="{{route('password.email')}}">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Recuperar</button>
</form>
<br>
<a class="btn btn-secondary" href="{{route('home')}}">Voltar</a>

@endsection
