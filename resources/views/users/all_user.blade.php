@extends('layouts.main_layout')
@section('content')

<br>
<div class="d-grid col-6 mx-auto">
    <button type="button" class="btn btn-outline-secondary" disabled>Users</button>
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                @auth
                    <td><a href="{{ route('user.view', $user->id) }}" class="btn btn-info">Ver | Atualizar</a></td>
                    @if (Auth::user()->user_type == 1)
                        <td><a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
                    @endif
                @endauth
            </tr>
    </tbody>
    @endforeach
</table>
@endsection

