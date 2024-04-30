<?php
use App\Http\Controllers\CasalsController;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Añadir Casal</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <h1>Afegir Casal</h1>
        <form action="{{ route('casal.nuevo') }}" method="POST" class="mb-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" id="nom" name="nom" value="{{ old('nom') }}" class="form-control">
                {!! $errors->first('nom', '<small class="text-danger">:message</small>') !!}
            </div>
            <div class="mb-3">
                <label for="data_inici" class="form-label">Data de inici:</label>
                <input type="date" id="data_inici" name="data_inici" min="{{ $fechaActual }}" value="{{ old('data_inici') }}"
                    class="form-control">
                {!! $errors->first('data_inici', '<small class="text-danger">:message</small>') !!}
            </div>
            <div class="mb-3">
                <label for="data_final" class="form-label">Data final:</label>
                <input type="date" id="data_final" name="data_final" min="{{ $fechaDias }}" value="{{ old('data_final') }}"
                    class="form-control">
                {!! $errors->first('data_final', '<small class="text-danger">:message</small>') !!}
            </div>
            <div class="mb-3">
                <label for="n_places">Num places:</label>
                <input type="number" id="n_places" name="n_places" value="{{ old('n_places') }}" class="form-control">
                {!! $errors->first('n_places', '<small class="text-danger">:message</small>') !!}
            </div>
            <div class="mb-3">
                <label for="id_ciutat">Ciutat:</label>
                <select id="id_ciutat" name="id_ciutat" class="form-control">
                    @foreach ($ciutats as $ciutat)
                        <option value="{{ $ciutat->id }}">
                            {{ $ciutat->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <a href="{{ route('indexVista') }}" class="btn btn-secondary">Atrás</a>
    </div>
    @if (session('Guardado'))
        <div class="modal" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ session('Guardado') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#successModal').modal('show');
            });
        </script>
    @endif

    @if ($errors->any())
        <div class="modal" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="errorModalLabel">Error</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#errorModal').modal('show');
            });
        </script>
    @endif
    @include('layouts.footer')
</body>

</html>
