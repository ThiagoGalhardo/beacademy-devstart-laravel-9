@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')

<h1 class="text-white">Listagem de usuários</h1>
<div class="d-flex justify-content-end ">
    <a href="{{route('users.create')}}" class="btn btn-success mb-3">Novo Usuário</a>
</div>

<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td >{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{ date('d/m/Y H:i', strtotime($user->created_at))}}</td>
            <td><a href="{{route('users.show', $user->id)}}" class="btn btn-info text-white btn-sm fw-bold">Visualizar</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
