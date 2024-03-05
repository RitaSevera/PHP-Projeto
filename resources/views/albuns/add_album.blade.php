@extends('layouts.main_layout')
@section('content')
<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Novo album</button>
</div>
    <br>

        <div class="container">
        <form method="POST" action="{{route('album.create')}}">
            @csrf

            <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Nome do album</label>
                <input type="text" value="{{old('albumName')}}" name="albumName" class="form-control" id="exampleFormControlInput1" required>
              <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Ano de lançamento</label>
                <input type="number" value="{{old('lancamento')}}" name="lancamento" class="form-control" id="exampleFormControlInput1">
              </div>
              <div class="mb-4">
                <label for="exampleFormControlInput1" class="form-label">Banda</label>
                <select id="inputLine" name="bands_id" class="form-control" required>
                  <option selected>Select...</option>
                  @foreach ($bands as $band)
                  <option value="{{ $band->bands_id }}">{{ $band->band_name }} </option>
                  @endforeach
                </select>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="forma-label">Capa do album</label>
                    <input accept="image/*" type="file" name="capa" class="form-control" id="capa" required>
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
