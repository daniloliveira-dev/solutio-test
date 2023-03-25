<!DOCTYPE html>
<html lang="en">

<head>
    @include('site._partials.head')
    <script type="text/javascript" src="{{ asset('js/edit.js') }}"></script>
    <linK rel="stylesheet" href="{{ asset('css/edit.css') }}">
    <title>Editar Usuário</title>
</head>

<body>
    <h2 id="titulo">Editar usuário</h2>
    <a id="button-voltar" class="btn btn-secondary" href="{{ route('site.mainpage') }}">Voltar</a>
    <form action={{ route('site.editar', ['id' => $id]) }} method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="email" class="form-label">Seu novo email</label>
            <input type="email" value="{{ $buscarUsuario->email != '' ? $buscarUsuario->email : '' }}"
                class="form-control" placeholder="Novo email..." name="email" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Sua nova senha</label>
            <input type="text" value="{{ $buscarUsuario->password != '' ? $buscarUsuario->password : '' }}"
                class="form-control" placeholder="Nova senha..." name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary" value="editar">Atualizar</button>
        @include('site._partials.divs')
    </form>
</body>

</html>
