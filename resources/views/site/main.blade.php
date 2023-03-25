<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>Página Principal</title>
</head>

<body id="body">
    <div class="container">
        <a id="logout" class="btn btn-primary btn-sm" href="{{ route('site.logout') }}"> Logout</a>
    </div>

    <h1 id="titulo">Usuários</h1>
    <div class="container">
        <a id="new-user-button" class="btn btn-primary btn-sm" href="{{ route('view.novoUsuario') }}"> Novo Usuário</a>
    </div>
    <div class="container">
        @include('site._partials.divs')
        <table class="table table-bordered table-sm" border="1">
            <thead class="table-dark">
                <tr>
                    <td class="table-active">#</td>
                    <td>Email</td>
                    <td>Senha</td>
                    <td id="actions">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($buscarUsuarios as $usuario)
                    <tr>
                        <td class="table-active">{{ $usuario->id }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->password }}</td>
                        <td>
                            <a id="edit-button" class="btn btn-warning btn-sm"
                                href="{{ route('view.editar', ['id' => $usuario->id, 'usuario' => $usuario]) }}">Editar</a>
                            <form id="form_{{ $usuario->id }}" method="POST"
                                action="{{ route('site.deletar', ['id' => $usuario->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a id="delete-button" class="btn btn-danger btn-sm" href="#"
                                    onclick="document.getElementById('form_{{ $usuario->id }}').submit()">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
