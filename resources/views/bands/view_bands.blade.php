@extends('layouts.main_layout')
@section('content')
<div class="container">

<div class="section_title">
  <h2 class="secondary_title">Atualizar banda</h2>
</div>
<div class="container-form">
<form method="POST" action="{{ route('band.update', ['id' => $band->id]) }}" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{ $band->id }}" id="">
  <div class="row row-form">
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1" class="form-label">Nome</label>
      <input type="text" value="{{ $band->name}}" name="name" class="form-control" id="inputLine" required>
      @error('name')
      <div class="alert alert-danger">
         Nome inválido
      </div>
      @enderror
    </div>
  <div class="form-group col-md-6">
    <label for="photo" style="padding-bottom: 1px">Foto da banda</label>
    <input accept="image/*" value="{{ $band->photo }}" type="file" name="photo" class="form-control"
    id="exampleFormControlInput1">
    @if($band->photo)
    <p>Imagem atual</p>
    <img src="{{ asset('storage/' . $band->photo) }}" alt="Current Image" style="max-height: 120px; margin-bottom: 15px">
    @else
      <p><i class="bi bi-image"></i>Inválido</p>
    @endif
  </div>
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1" class="form-label">Género</label>
      <input type="text" value="{{ $band->genero}}" name="genero" class="form-control" id="inputLine" required>
      @error('genero')
      <div class="alert alert-danger">
          Inválido
      </div>
      @enderror
    </div>
  </div>
  <div class="row row-form">
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1" class="form-label">Ano de formação</label>
      <input type="number" value="{{ $band->year}}" name="year" class="form-control" id="inputLine" required>
      @error('year')
      <div class="alert alert-danger">
          Inválido
      </div>
      @enderror
    </div>
  </div>
  <div class="d-flex justify-content-end confirmation-button">
  <button type="submit" class="btn btn-primary-purple">Atualizar</button>
</div>
</form>
</div>
</div>
@endsection
