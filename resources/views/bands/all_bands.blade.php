@extends('layouts.main_layout')
@section('content')
<br>
<br>
    <div class="d-grid col-6 mx-auto">
        <button type="button" class="btn btn-outline-secondary" disabled>Bandas</button>
    </div>
    <br>

    <div class="d-grid d-md-flex justify-content-md-end">
        <form method="GET">
            <input type="text" value="" name="search" id="">
            <button class="btn btn-dark btn-sm" type="submit">Procurar</button>
        </form>
    </div>


    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Género</th>
                <th scope="col">Ano de formação</th>
                <th scope="col">Foto</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bands as $band)
                <tr>
                    <th scope="row">{{ $band->id }}</th>
                    <td>{{ $band->name }}</td>
                    <td>{{ $band->genero }}</td>
                    <td>{{ $band->year }}</td>
                    <td>{{ $band->photo }}</td>
                    @auth
                        <td><a href="{{ route('band.view', $band->id) }}" class="btn btn-info">Ver | Atualizar</a></td>
                        @if (Auth::user()->user_type == 1)
                            <td><a href="{{ route('band.delete', $band->id) }}" class="btn btn-danger">Apagar</a></td>
                        @endif
                    @endauth
                </tr>
        </tbody>
        @endforeach
    </table>
@endsection

