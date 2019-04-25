<li class="nav-item dropdown">

    <a href="#" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }} <span class="caret"></span>
    </a>

    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a href="#" class="dropdown-item">{{ __('Mis Suscripciones') }}</a>
        <a href="#" class="dropdown-item">{{ __('Mis Facturas') }}</a>

        <a href="{{ route('logout') }}"
           class="dropdown-item"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Cerrar sesión') }}
        </a>

        <form action="{{ route('logout') }}" id="logout-form" method="post" style="display: none;">
            @csrf
        </form>
    </div>

</li>
