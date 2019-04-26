@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', [
    'title' => __('Accede a cualquier curso de inmediato'),
    'icon' => 'th'
    ])
@stop

@section('content')
<div class="px-5">
    <div class="row justify-content-center">
        @forelse($courses as $course)
            <div class="col-md-3">
                @include('partials.courses.card_course')
            </div>
        @empty
            <div class="alert alert-dark">
                {{ __('No hay cursos disponibles') }}
            </div>
        @endforelse
    </div>

    <div class="row justify-content-center">
        {{ $courses->links() }}
    </div>

</div>
@endsection
