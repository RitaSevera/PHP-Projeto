@extends('layouts.main_layout')
@section('content')
<br>
@auth
@if (Auth::user()->user_type == 1)
    <td><a class="alert alert-success">Conta de administrador</a></td>
@endif
@endauth
<br>
<br>
<br>
@auth
Olá, {{ Auth::user()->name }}
isto é a view do backoffice
@endauth
@endsection

