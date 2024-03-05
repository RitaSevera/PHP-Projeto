@extends('layouts.main_layout')
@section('content')
<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Nova banda</button>
</div>
    <br>

        <div class="container">
        <form method="POST" action="{{route('band.create')}}">
            @csrf

            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Nome</label>
                <input type="text" value="{{old('name')}}" name="name" class="form-control" id="exampleFormControlInput1" required>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Género</label>
                    <input type="text" value="{{old('genero')}}" name="genero" class="form-control" id="exampleFormControlInput1" required>
              <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Ano de formação</label>
                <input type="text" value="{{old('year')}}" name="year" class="form-control" id="exampleFormControlInput1">
              </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="forma-label">Foto</label>
                    <input accept="image/*" type="file" name="photo" class="form-control" id="photo" required>
                  </div>
                </div>
                <br>
              <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <br>
        <a class="btn btn-success" href="{{route('home')}}">Voltar</a>
        <br>
        </div>

    @endsection
