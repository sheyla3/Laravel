<strong>
    <h2 class="text-center">Casals de la Generalitat de Catalunya</h2>
</strong>
<div class="float-right" tabindex="1">
    <form method="POST" action="{{ route('cerrar') }}">
        @csrf
        <a href="{{ route('cerrar') }}" onclick="event.preventDefault(); this.closest('form').submit();">Cerrar sesión</a>
    </form>
</div>
