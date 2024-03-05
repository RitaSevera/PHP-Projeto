@extends('layouts.main_layout')
@section('content')

@if (session('message'))
<div class="alert alert-dark">
  {{session('message')}}
</div>
@endif
<div class="body_main">
<img src="{{ asset('imagens/Music.webp') }}" alt="" style="width: 90vw; height: 80vh">
</div>
@endsection
