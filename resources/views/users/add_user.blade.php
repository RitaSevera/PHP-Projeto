@extends('layouts.main_layout')
@section('content')

<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Adicionar utilizadores</button>
</div>
    <br>

        <div class="container">
        <form method="POST" action="{{route('user.create')}}">
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="texto" value="{{old('name')}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
                @error('name')
                <div class="alert alert-danger">
                    O nome que colocou não é válido
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" required>
                @error('email')
                <div class="alert alert-danger">
                    O email que colocou já está registado
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
              </div>
              <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <br>
        <a class="btn btn-success" href="{{route('home')}}">Voltar</a>
        <br>
        </div>

    @endsection
