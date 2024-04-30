<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - casals</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('layouts.header')
    <div class="container">
        <ul class="mt-3 list-unstyled">
            <li>
                <h1>Gestio de casals</h1>
            </li>
            <li class="float-right ml-4">
                <form action="{{ route('formularioCasal') }}" method="GET">
                    @csrf
                    <button type="submit" class="d-inline btn btn-primary">Afegir</button>
                </form>
            </li>
        </ul>
        <br><br>
        <table class="table table-responsive-md">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Data de inici</th>
                    <th scope="col">Data final</th>
                    <th scope="col">Num places</th>
                    <th scope="col">Ciutat</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody id="tabla-casals">
                @foreach($casals as $casal)
                <tr>
                    <td>{{ $casal->nom }}</td>
                    <td>{{ \Carbon\Carbon::parse($casal->data_inici)->format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($casal->data_final)->format('d-m-Y') }}</td>
                    <td>{{ $casal->n_places }}</td>
                    <td>{{ $casal->ciutat->nom }}</td>
                    <td><a class="btn btn-info" href="/editarcasal/{{ $casal->id }}">Editar</a></td>
                    <td><a class="btn btn-danger" href="/eliminarcasal/{{ $casal->id }}">Eliminar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@include('layouts.footer')
</body>
</html>