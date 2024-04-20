@extends('layouts.appFront')

@section('title', 'Notes | zakialawi')
@section('meta_description', 'isi disini')

@push('css')
    {{-- code here --}}
@endpush

@section('content')

    <!-- NAVBAR -->
    @include('components.front.navbar')


    <section id="home"
        class="container bg-red-300 h-[90vh] flex items-center justify-center gap-3 mx-auto flex-col md:flex-row">
        <div class="order-1 w-full p-3 bg-green-300 md:w-1/2 md:-order-1">
            <div class="">A1</div>
            <div class="">no height set</div>
        </div>
        <div class="w-full p-3 bg-yellow-300 md:w-1/2">
            <div class="">A 2</div>
            <div class="">no height set</div>
        </div>
    </section>


@endsection


@push('javascript')
    <script>
        // code here
    </script>
@endpush
