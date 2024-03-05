@extends('layouts.main_layout')
@section('content')

<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Album</button>
</div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Capa</th>
            <th scope="col">Nome</th>
            <th scope="col">Data de lançamento</th>
            <th scope="col">Banda</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($albuns as $album)
          <tr>
            <th scope="row">{{$album->id}}</th>
            <td>{{$album->capa}}</td>
            <td>{{$album->albumName}}</td>
            <td>{{$album->lancamento}}</td>
            <td>{{$album->bands_id}}</td>
            <td><a href="{{route('album.view', $album->id)}}" class="btn btn-info">Ver | Atualizar</a></td>
            <td><a href="{{route('album.delete', $album->id)}}" class="btn btn-danger">Apagar</a></td>
          </tr>
        </tbody>
        @endforeach
      </table>

      @endsection
