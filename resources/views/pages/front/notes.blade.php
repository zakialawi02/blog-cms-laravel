@extends('layouts.appFront')

@section('title', 'Notes | zakialawi')
@section('meta_description', 'isi disini')

@push('css')
    {{-- code here --}}
@endpush

@section('content')

    <!-- NAVBAR -->
    @include('components.front.navbar')


    <section class="bg-blue-100 ">
        <div class="max-w-4xl p-6 mx-auto bg-white">
            <div class="flex items-center mb-6">
                <input
                    class="flex flex-1 w-full h-10 px-3 py-2 mr-4 text-sm border rounded-md border-input bg-background ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                    placeholder="Search your notes..." />
                <button
                    class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors border rounded-md whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input bg-background hover:bg-blue-200 hover:text-blue-900 active:bg-blue-300 active:text-blue-900">Search</button>
            </div>
        </div>

        <div class="container flex flex-wrap gap-4 p-3 mx-auto bg-orange-300">

            @foreach ($notes as $note)
                <div onclick="window.location.href='{{ route('notes.show', $note->id) }}'"
                    class="rounded-xl basis-auto border-gray-100 bg-white w-[25rem] cursor-pointer group">
                    <div class="flex items-start gap-4 p-3 sm:p-6 lg:p-8 group-hover:bg-blue-100 group-hover:rounded-xl ">
                        <div href="{{ route('me.notes.show', $note->id) }}" class="block shrink-0">
                            <img alt="" src="https://placehold.jp/100x100.png"
                                class="object-cover rounded-lg size-14" />
                        </div>

                        <div class="w-10/12">
                            <h3 class="font-medium sm:text-lg">
                                <a href="{{ route('me.notes.show', $note->id) }}" class="line-clamp-2 hover:underline">
                                    {{ $note->title }} </a>
                            </h3>
                            <div class="text-sm text-gray-700 line-clamp-2">
                                {{ $note->clean_note }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endsection


@push('javascript')
    <script>
        // code here
    </script>
@endpush
