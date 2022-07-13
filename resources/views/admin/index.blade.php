@extends('template.users')
@section('title', 'Area do Administrador')
@section('body')


<div class="mt-3">
    <div class="card" style="width: 18rem;">
        <img src="{{ asset('storage/dashboard.png') }}" class="card-img-top" alt="imagem de um dashboard">
        <div class="card-body">
            <h5 class="card-title">Bem vindo ao Dashboard</h5>
            <p class="card-text">#paylivre # beacademy #laravel</p>
        </div>
    </div>
</div>





@endsection
