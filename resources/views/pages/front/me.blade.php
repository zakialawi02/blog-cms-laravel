@extends("layouts.appFront")

@section("title", "Notes | zakialawi")
@section("meta_description", "isi disini")

@push("css")
    {{-- code here --}}
@endpush

@section("content")

    <header class="bg-blue-600 flex h-20 w-full px-20 items-center justify-between">
        <div class="bg-blue-100 m-2 p-2">Section 1</div>
        <div class="bg-blue-300 m-2 p-2">
            <ul class="flex gap-4">
                <li class="bg-orange-300 hover:text-blue-200 hover:bg-pink-500 p-2 mx-2"><a href="#home">Home</a></li>
                <li class="bg-orange-300 hover:text-blue-200 hover:bg-pink-500 p-2 mx-2"><a href="#about">About</a></li>
                <li class="bg-orange-300 hover:text-blue-200 hover:bg-pink-500 p-2 mx-2"><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </header>

    <section id="home" class="container bg-red-300 h-[100vh] flex items-center justify-center gap-3 mx-auto">
        <div class="bg-green-300 h-1/2 w-1/2 p-3">
            <div class="">A1</div>
        </div>
        <div class="bg-yellow-300 h-1/2 w-1/2 p-3">
            <div class="">A 2</div>
        </div>
    </section>


@endsection


@push("javascript")
    <script>
        // code here
    </script>
@endpush
