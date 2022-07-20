@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')


<h1 class="text-white">Listagem de usuários</h1>

<div class="row mt-3">

    <div class="col mb-3">
        <a href="{{route('users.create')}}" class="btn btn-success mb-3">Novo Usuário</a>
    </div>

    <div class="col mb-3">
        <form class="d-flex mb-4" action="{{ route('users.index') }}" method="GET">
            <input class="form-control me-2" type="search" name="search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>

</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Postagens</th>
            <th scope="col">Data de cadastro</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            @if($user->image)
            <th> <img src="{{ asset('storage/' .$user->image) }}" alt="Imagem do perfil" width="50px" height="50px" class="rounded-circle"></th>
            @else
            <th> <img src="{{ asset('storage/profile/avatar.png') }}" alt="Imagem do perfil" width="50px" height="50px" class="rounded-circle"></th>
            @endif


            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href=" {{route('posts.show', $user->id)}}" class="btn btn-outline-primary btn-sm fw-bold">Postagens: {{$user->posts->count()}}</a>

            </td>
            <td>{{ formatDateTime($user->created_at) }}</td>
            <td><a href=" {{route('users.show', $user->id)}}" class="btn btn-primary text-white btn-sm fw-bold">Visualizar</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="justify-content-center pagination">
    {{$users->links('pagination::bootstrap-4')}}
</div>
@endsection
