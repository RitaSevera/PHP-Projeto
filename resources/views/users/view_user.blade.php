@extends('layouts.main_layout')
@section('content')

<br>

<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Ver | Atualizar dados do user - {{$myUser->name}}</button>
</div>
{{-- ACRESCESTAR COLUNA PARA PÔR FOTO --}}


{{-- <h1>Ver | Atualizar dados do user {{$myUser ->name}}</h1> --}}
{{-- <h4>Nome: {{$myUser ->name}}</h4>
<h4>Email: {{$myUser ->email}}</h4>
<h4>Password: {{$myUser ->password}}</h4> --}}

<form method="POST" action="{{route('user.update')}}">
    @csrf

        <input type="hidden" name="id" value="{{$myUser->id}} id=">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="texto" value="{{$myUser->name}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
        @error('name')
        <div class="alert alert-danger">
            O nome que colocou não é válido
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input disabled type="email" value="{{$myUser->email}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" required>
        @error('email')
        <div class="alert alert-danger">
            O email que colocou já está registado
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
