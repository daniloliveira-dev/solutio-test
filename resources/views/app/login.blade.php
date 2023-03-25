<!DOCTYPE html>
<html lang="en">

<head>
    @include('site._partials.head')
    <script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>

<body>
    <h2 id="titulo">Login</h2>
    <div class="container">
        <form id="form" action={{ route('app.auth') }} method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Digite seu email</label>
                <input type="email" class="form-control" placeholder="Sua email..." name="email" id="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Digite seu senha</label>
                <input type="password" class="form-control" placeholder="Sua senha..." name="password" id="password">
            </div>
            <button id="login-button" type="submit">Login</button>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div id="validation-error" class="alert alert-danger">
                        {{ $error }}
                    </div>
                @endforeach
            @endif

            @if (session('message'))
                <div id="message" class="alert alert-info">{{ session('message') }}</div>
            @elseif(session('error'))
                <div id="error" class="alert alert-danger">{{ session('error') }}</div>
            @elseif(session('info'))
                <div id="info" class="alert alert-danger">{{ session('info') }}</div>
            @endif
        </form>
    </div>
</body>

</html>
