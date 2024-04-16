@extends('layouts.appFront')

@section('title', 'Notes | zakialawi')
@section('meta_description', 'isi disini')

@push('css')
    {{-- code here --}}
@endpush

@section('content')

    <!-- NAVBAR -->
    @include('components.front.navbar')


    <section id="home" class="container bg-red-300 h-[100vh] flex items-center justify-center gap-3 mx-auto">
        <div class="w-1/2 p-3 bg-green-300 h-1/2">
            <div class="">A1</div>
        </div>
        <div class="w-1/2 p-3 bg-yellow-300 h-1/2">
            <div class="">A 2</div>
        </div>
    </section>


@endsection


@push('javascript')
    <script>
        // code here
    </script>
@endpush
