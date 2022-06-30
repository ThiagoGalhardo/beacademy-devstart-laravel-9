@extends('template.users')
@section('title', 'Usuário '. $user->name)
@section('body')

<h1 class="text-white">Usuário: {{$user->name}}</h1>


<table class="table table-dark table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data de cadastro</th>
        <th scope="col">Editar</th>
        <th scope="col">Excluir</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{ date('d/m/Y H:i', strtotime($user->created_at))}}</td>
        <td>
            <a href="{{route('users.edit', $user->id)}}" class="  btn btn-warning btn-sm text-white fw-bold">Editar</a>
        </td>
        <td>
            <form action="{{route('users.destroy', $user->id)}}" method="POST" class="col-auto mx-0">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm text-white fw-bold">Excluir</button>
            </form>
        </td>
    </tr>
    </tbody>
</table>

<div class="d-flex justify-content-center">
   <a class="btn btn-primary px-4" href="{{route('users.index')}}">Voltar</a>
</div>

@endsection
