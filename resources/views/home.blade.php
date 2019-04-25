@extends('layouts.app')

@section('content')
<div class="px-5">
    <div class="row justify-content-center">
        @forelse($courses as $course)
            <div class="col-md-3">
                {{ $course->name }}
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
