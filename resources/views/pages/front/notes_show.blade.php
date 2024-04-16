@extends('layouts.appFront')

@section('title', 'Notes | zakialawi')
@section('meta_description', 'isi disini')

@push('css')
    {{-- code here --}}
@endpush

@section('content')

    <!-- NAVBAR -->
    @include('components.front.navbar')


    <section id="notes" class="min-h-full bg-base-100">
        <div class="flex flex-col items-start max-w-full gap-2 p-2 mx-auto sm:flex-row">
            <div class="w-full p-3 bg-white rounded-lg text-dark shadow-md sm:w-[50%] lg:w-[30%]">

                <!-- SEARCH -->
                <div class="flex items-center my-2">
                    <input id="search-notes" type="search"
                        class="flex flex-1 w-full h-10 text-sm border rounded-md border-input ring-offset-primary file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        placeholder="Search your notes..." />
                </div>

                @auth
                    <a href="{{ route('notes.create') }}" class="block p-2 text-center rounded-lg bg-primary">Add Note</a>
                @endauth

                <!-- NOTES LIST -->
                <div id="notes-list" class="gap-2 my-3 px-2 max-h-[65vh] overflow-auto">

                    <!-- FECTH DATA FROM JAVASCRIPT  -->

                </div>
            </div>

            <div class="w-full min-h-[80vh] p-3 rounded-lg shadow-md md:p-5 bg-light text-dark">
                <div id="notes-content" class="p-5 ">

                    <p class="text-lg text-center">Click on the note you want to read</p>

                    {{-- <article>
                        <div class="">
                            <h4 class="mt-0.5 text-lg font-medium ">How to position your furniture for positivity</h4>

                            <time datetime="2022-10-10" class="block text-xs text-muted"> 10th Oct 2022 </time>

                            <div class="mt-2" id="note-note"></div>
                        </div>
                    </article> --}}

                    <!-- SKELETON LOADING -->
                    {{-- <div class="w-full animate-pulse">
                        <h4 class="h-2 bg-gray-300 rounded-lg w-[52%] dark:bg-gray-600"></h4>
                        <p class="h-2 mt-2 bg-gray-200 rounded-lg w-14 dark:bg-gray-700"></p>
                        <p class="w-[82%] h-2 mt-6 bg-gray-200 rounded-lg  dark:bg-gray-700"></p>
                        <p class="w-[92%] h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        <p class="w-[42%] h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                        <p class="w-[62%] h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                    </div> --}}

                </div>
            </div>
        </div>
    </section>



@endsection


@push('javascript')
    <script>
        getnote();

        // Fungsi untuk menangani peristiwa popstate
        window.addEventListener('popstate', function(event) {
            const noteId = location.pathname.split('/').pop();
            console.log(`Popstate ${noteId}`);
            getnote(noteId);
        });

        // Fungsi untuk memuat data catatan berdasarkan URL saat halaman pertama dimuat
        window.addEventListener('load', function() {
            const noteId = location.pathname.split('/').pop();
            console.log(`Memuat pertama ${noteId}`);
            getnote(noteId);
        });

        // Fungsi untuk menangani klik catatan
        function handleNoteClick() {
            console.log('Elemen .note diklik');
            // Tangani klik pada elemen dengan kelas "note"
            const noteId = this.getAttribute('data-note');
            console.log(noteId);

            // Ubah URL
            history.pushState(null, null, `/me/notes/show/${noteId}`);

            const loadingSkeleton = // html
                `<div class="w-full animate-pulse">
                    <h4 class="h-2 bg-gray-300 rounded-lg w-[52%] dark:bg-gray-600"></h4>
                    <p class="h-2 mt-2 bg-gray-200 rounded-lg w-14 dark:bg-gray-700"></p>
                    <p class="w-[82%] h-2 mt-6 bg-gray-200 rounded-lg  dark:bg-gray-700"></p>
                    <p class="w-[92%] h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                    <p class="w-[42%] h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                    <p class="w-[62%] h-2 mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                </div>`;

            document.getElementById('notes-content').innerHTML = loadingSkeleton;

            getnote(noteId);
        }

        // Tambahkan event listener untuk semua catatan
        document.querySelectorAll('.note').forEach((noteElement) => {
            noteElement.addEventListener('click', handleNoteClick);
        });


        function getnote(noteId) {
            console.log(`fungsi getnote= ${noteId}`);
            if (!noteId || noteId == undefined || noteId == 'notes') {
                // Memuat semua notes
                fetch('/me/getnotes')
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        document.getElementById('notes-list').innerHTML = '';
                        document.getElementById('notes-content').innerHTML =
                            '<p class="text-lg text-center">Click on the note you want to read</p>';
                        data.map((note) => {
                            document.getElementById('notes-list').innerHTML += //html
                                `<a href="javascript:void(0)" data-note="${note.id}" class="block w-full p-2 my-2 border-2 rounded-lg border-slate-500 hover:bg-base-100 bg-light group note">
                                    <h4 class="text-lg font-medium line-clamp-2 group-hover:underline">${note.title}</h4>
                                    <p class="text-sm text-muted">${note.created_at}</p>
                                    <p class="line-clamp-2">
                                    ${note.clean_note}
                                    </p>
                                </a>`;
                        });

                        document.querySelectorAll('.note').forEach((noteElement) => {
                            noteElement.addEventListener('click', handleNoteClick);
                        });

                    })
                    .catch(error => {
                        console.error('Error:', error);
                        const notesContent = document.getElementById('notes-content');
                        notesContent.innerHTML = //html
                            `<div class="text-center text-red-500">Error fetching note. Please try again later.</div>`;
                    });
            } else {
                // Memuat notes berdasarkan ID
                fetch(`/me/getnotes/${noteId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        const notesContent = document.getElementById('notes-content');
                        notesContent.innerHTML = //html
                            `<article>
                                <div class="">
                                <h4 class="mt-0.5 text-lg font-medium ">${data.title}</h4>
                                <time datetime="2022-10-10" class="block text-xs text-muted"> ${data.created_at} </time>
                                <div class="mt-2" id="note-note">${data.note}</div>
                                </div>
                             </article>`;
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        const notesContent = document.getElementById('notes-content');
                        notesContent.innerHTML = //html
                            `<div class="text-center text-red-500">Error fetching note. Please try again later.</div>`;
                    });
            }
        }


        const searchInput = document.getElementById('search-notes');
        searchInput.addEventListener('keyup', function(e) {
            console.log(searchInput.value);
        })
    </script>
@endpush
