@extends("layouts.app")

@section("title", "Notes | zakialawi")
@section("meta_description", "isi disini")

@section("css")
    {{-- code here --}}
@endsection

@section("content")
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __("Notes") }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Starter page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    <div class="card p-3">
        <div class="">
            <h3>{{ __("Notes") }}</h3>
        </div>

        <div class="">
            <a type="button" class="btn btn-primary" href="{{ route("notes.create") }}">Add Note</a>
        </div>

        <div class="m-2 p-3">
            @foreach ($notes as $note)
                <h4>{{ $note->title }}</h4>
                <p>{{ $note->note }}, {{ $note->id }}, {{ $note->slug }}</p>
            @endforeach
        </div>
    </div>



@endsection


@section("javascript")

    <script>
        // code here
    </script>
@endsection
