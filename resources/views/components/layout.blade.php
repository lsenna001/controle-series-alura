<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="container">
    <h1>{{ $title }}</h1>

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    {{ $slot }}
</body>

</html>