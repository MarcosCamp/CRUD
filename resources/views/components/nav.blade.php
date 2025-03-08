<nav style="background-color: #f5f5dc; padding: 15px; display: flex; justify-content: space-between; align-items: center;">
    <!-- Botones de idioma e inicio (izquierda) -->
    <div>
        <a class="btn nav1" href="/" >{{__('messages.inicio')}}</a>
        <a href="{{ route('change.language', 'es') }}" class="btn">{{__('messages.espanol')}}</a>
        <a href="{{ route('change.language', 'en') }}" class="btn">{{__('messages.ingles')}}</a>
        <a href="{{ route('change.language', 'fr') }}" class="btn">{{__('messages.frances')}}</a>

    </div>

    <!-- Autenticación (derecha) -->
    <div>
        @if (Auth::check())
            <a class="btn nav1" href="{{ route('logout') }}" >{{__('messages.cerrarsesion')}}</a>
        @else
            <a class="btn nav1" href="{{ route('login') }}" >{{__('messages.iniciarsesion')}}</a>
            <a class="btn nav1" href="{{ route('register') }}" >{{__('messages.registrarse')}}</a>
        @endif
    </div>
</nav>
