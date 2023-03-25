<!DOCTYPE html>
<html lang="en">

<head>
    @include('site._partials.head')
    <script type="text/javascript" src="{{ asset('js/newUser.js') }}"></script>
    <linK rel="stylesheet" href="{{ asset('css/newUser.css') }}">
    <title id>Novo Usuário</title>
</head>

<body>

    <a id="button-voltar" class="btn btn-secondary" href="{{ route('site.mainpage') }}">Voltar</a>
    <h3 id="titulo">Novo Usuário</h3>
    <form action="{{ route('site.novoUsuario') }}" method="POST">
        @csrf
        <div class="mb-2">
            <label for="email" class="form-label">Seu email</label>
            <input type="email" class="form-control" value="" placeholder="Seu email..." name="email"
                id="email">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Sua senha</label>
            <input type="text" class="form-control" value="" placeholder="Sua senha..." name="password"
                id="password">
        </div>
        <button type="submit" class="btn btn-primary" value="cadastrar">Cadastrar</button>
        @include('site._partials.divs')
    </form>
</body>

</html>
