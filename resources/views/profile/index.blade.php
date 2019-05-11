@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', ['title' => 'Configurar tu perfil', 'icon' => 'user-circle'])
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <div class="pl-5 pr-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __("Actualiza tus datos") }}
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">
                                    {{ __("Correo electrónico") }}
                                </label>
                                <div class="col-md-6">
                                    <input
                                        id="email"
                                        type="email"
                                        readonly
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                        name="email"
                                        value="{{ old('email') ?: $user->email }}"
                                        required
                                        autofocus
                                    />

                                    @if($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    {{ __("Contraseña") }}
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="password"
                                        type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password"
                                        required
                                    />

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label
                                    for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right"
                                >
                                    {{ __("Confirma la contraseña") }}
                                </label>

                                <div class="col-md-6">
                                    <input
                                        id="password-confirm"
                                        type="password"
                                        class="form-control"
                                        name="password_confirmation"
                                        required
                                    />
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __("Actualizar datos") }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @if( ! $user->teacher)
                    <div class="card">
                        <div class="card-header">
                            {{ __("Convertirme en profesor de la plataforma") }}
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    <i class="fa fa-graduation-cap"></i> {{ __("Solicitar") }}
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            {{ __("Administrar los cursos que imparto") }}
                        </div>
                        <div class="card-body">
                            <a href="{{ route('teacher.courses') }}" class="btn btn-secondary btn-block">
                                <i class="fa fa-leanpub"></i> {{ __("Administrar ahora") }}
                            </a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {{ __("Mis estudiantes") }}
                        </div>
                        <div class="card-body">
                            <table
                                class="table table-striped table-bordered nowrap"
                                cellspacing="0"
                                id="students-table"
                            >
                                <thead>
                                <tr>
                                    <th>{{ __("ID") }}</th>
                                    <th>{{ __("Nombre") }}</th>
                                    <th>{{ __("Email") }}</th>
                                    <th>{{ __("Cursos") }}</th>
                                    <th>{{ __("Acciones") }}</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endif

                @if($user->socialAccount)
                    <div class="card">
                        <div class="card-header">
                            {{ __("Acceso con Socialite") }}
                        </div>
                        <div class="card-body">
                            <button class="btn btn-outline-dark btn-block">
                                {{ __("Registrado con") }}: <i class="fa fa-{{ $user->socialAccount->provider }}"></i>
                                {{ $user->socialAccount->provider }}
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{--    @include('partials.modal')--}}
@endsection

