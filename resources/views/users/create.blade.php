@extends('template.users')
@section('title', 'Novo usuário')
@section('body')

<h1 class="text-white">Novo usuário</h1>

@if($errors->any())
    <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{$error}}<br>
        @endforeach
    </div>
@endif


<form action="{{route('users.store')}}" method="POST">
    @csrf
  <div class="mb-3 col-sm-5">
    <label for="name" class="form-label text-white">Nome</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="mb-3 col-sm-5">
    <label for="email" class="form-label text-white">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
  </div>
  <div class="mb-3 col-sm-5" >
    <label for="password" class="form-label text-white">Senha</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary px-5">Enviar</button>
</form>



@endsection
