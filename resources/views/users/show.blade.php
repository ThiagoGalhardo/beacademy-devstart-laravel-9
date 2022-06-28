<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Usuário {{$user->name}}</title>
</head>
<body>
<div class="container mt-5">
    <h1>Usuário: {{$user->name}}</h1>

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
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{ date('d/m/Y H:i', strtotime($user->created_at))}}</td>
                <td>
                    <a href="" class="btn btn-warning btn-sm text-white">Editar</a>
                    <a href="" class="btn btn-danger btn-sm text-white">Excluir</a>
                </td>
            </tr>
        </tbody>
    </table>

</div>
</body>
