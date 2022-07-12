@extends('template.users')
@section('title', "Listagem de Postagens do {$user->name}")
@section('body')
<h1 class="text-white">Postagens do {{$user->name}}</h1>


@foreach($posts as $post)
<div class="mb-3">
    <label class="form-label text-white"><b>Identificação Nº </b>{{ $post->id }}</label>
    <br>
    <label class="form-label text-white"><b>Status:</b> {{ $post->active?'Ativo' : 'Inativo' }}</label>
    <br>
    <label class="form-label text-white"><b>Título:</b> {{ $post->title }}</label>
    <br>
    <label class="form-label text-white"><b>Postagem:</b> </label>
    <textarea disabled class="form-control" rows="3">{{ $post->post }}</textarea>
</div>

@endforeach

@endsection
