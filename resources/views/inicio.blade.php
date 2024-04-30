<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
</head>
<body>
    <div>
        <div class="row w-100 d-flex justify-content-center">
            <div class="w-25">
                <div class="card w-100 shadow-lg rounded text-white bg-dark mb-3 text-center">
                    <div class="card-header">Log in</div>
                    <div class="card-body">
                        <h5 class="card-title">BIENVENIDO!</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Pon tu nick y contraseña:</h6>
                        <form action="{{ route('user.iniciar') }}" method="POST">
                            @csrf
                            <input type="text" id="nick" name="nick" value="{{ old('nick') }}" placeholder="nick" class="form-control form-control-admin rounded-0">
                            <p>{!! $errors->first('nick', '<small>:message</small>') !!}</p>
                            <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="contraseña" class="form-control form-control-admin rounded-0">
                            <p>{!! $errors->first('password', '<small>:message</small>') !!}</p>
                            <input type="submit" value="Iniciar" class="btn btn-iniciar text-white">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('ERROR'))
        <div class="modal" id="errormodal" tabindex="-1" role="dialog" aria-labelledby="errormodalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errormodalLabel">ERROR</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('ERROR') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#errormodal').modal('show');
            });
        </script>
    @endif
</body>
</html>