@extends("layouts.appFrontPages")

@section("title", "{$page->title} | zakialawi")
@section("meta_description", "$page->description")
@section("meta_author", "zakialawi")

@section("og_title", "{$page->title} | zakialawi.my.id")
@section("og_description", "$page->description")
{{-- @section("og_image", "") --}}

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/css/prism.css") }}">
@endpush

@section("content")
    <main class="@if ($page->isFullWidth == 1) container w-full p-6 md:p-10 @endif">

        <div id="gjs"></div>

    </main>
@endsection

@push("javascript")
    <script src="{{ asset("assets/js/prism.js") }}"></script>
@endpush
