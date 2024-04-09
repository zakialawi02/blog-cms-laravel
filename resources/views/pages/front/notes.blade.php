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

    <section class=" bg-blue-100">
        <div class="max-w-4xl mx-auto p-6 bg-white">
            <div class="flex items-center mb-6">
                <input
                    class="flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 flex-1 mr-4"
                    placeholder="Search your notes..." />
                <button
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-blue-200 hover:text-blue-900 active:bg-blue-300 active:text-blue-900 h-10 px-4 py-2">Search</button>
            </div>
        </div>

        <div class="container mx-auto flex flex-wrap gap-4 bg-orange-300 p-3">

            @foreach ($notes as $note)
                <div onclick="window.location.href='{{ route("notes.show", $note->id) }}'" class="rounded-xl basis-auto border-gray-100 bg-white w-[25rem] cursor-pointer group">
                    <div class="flex items-start gap-4 p-3 sm:p-6 lg:p-8 group-hover:bg-blue-100 group-hover:rounded-xl ">
                        <div href="{{ route("me.notes.show", $note->id) }}" class="block shrink-0">
                            <img alt="" src="https://placehold.jp/100x100.png" class="size-14 rounded-lg object-cover" />
                        </div>

                        <div class="w-10/12">
                            <h3 class="font-medium sm:text-lg">
                                <a href="{{ route("me.notes.show", $note->id) }}" class="line-clamp-2 hover:underline"> {{ $note->title }} </a>
                            </h3>
                            <div class="line-clamp-2 text-sm text-gray-700">
                                {{ $note->clean_note }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endsection


@push("javascript")
    <script>
        // code here
    </script>
@endpush
