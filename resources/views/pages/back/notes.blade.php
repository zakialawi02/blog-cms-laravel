@extends("layouts.app")

@section("title", "Notes | zakialawi")
@section("meta_description", "isi disini")

@push("css")
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            -webkit-line-clamp: 2;
        }

        .card-note:hover {
            background-color: #ebebeb;
            /* cursor: pointer; */
        }

        .border-note {
            border: 1px solid #252b3b;
        }
    </style>
@endpush

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

        <div class="d-inline-flex mx-2 px-2 align-items-center">
            <input type="text" class="form-control px-1" style="width: 15rem" id="search" name="search" placeholder="Search...">
            <a type="button" class="btn btn-primary mx-2" href="{{ route("notes.create") }}">Add Note</a>
        </div>

        <div class="m-2 p-3">

            <div class="row">
                @foreach ($notes as $note)
                    <div class="col-sm-4">
                        <div class="card card-note border-note">
                            <div class="card-body text-dark">
                                <h4 class="card-title line-clamp-2">{{ $note->title }}</h4>
                                <div class="card-text line-clamp-2">{{ $note->clean_note }}</div>
                                <div class="mt-3 float-right">
                                    <a href="{{ route("notes.show", $note->id) }}" class="btn btn-sm btn-secondary"><i class="ri-eye-line"></i></a>
                                    <a href="{{ route("notes.edit", $note->id) }}" class="btn btn-sm btn-info"><i class="ri-pencil-line"></i></a>
                                    <form class="d-inline" method="POST" action="{{ route("notes.destroy", $note->id) }}">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ri-delete-bin-line"></i></button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>



@endsection


@push("javascript")
    <script>
        jQuery(document).ready(function($) {
            $("#search").on("keyup", function() {
                console.log(this.value);
            });
        });
    </script>
@endpush
