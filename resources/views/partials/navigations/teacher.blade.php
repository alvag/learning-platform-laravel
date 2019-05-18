<li><a href="{{ route('profile.index') }}" class="nav-link">{{ __('Mi Perfil') }}</a></li>
<li><a href="{{ route('courses.subscribed') }}" class="nav-link">{{ __('Mis Cursos') }}</a></li>
<li><a href="{{ route('teacher.courses') }}" class="nav-link">{{ __('Cursos Desarrollador por mi') }}</a></li>
<li><a href="{{ route('courses.create') }}" class="nav-link">{{ __('Crear Curso') }}</a></li>

@include('partials.navigations.logged')
