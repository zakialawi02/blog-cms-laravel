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
        <div class="w-100 p-2">
            <form action="{{ route("notes.store") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method("post")

                <div class="form-group">
                    <label for="title">Title Note</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title Note" value="{{ old("title") }}">
                    @error("title")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="note">Text</label>
                    <textarea class="form-control" id="note" name="note" rows="3" placeholder="Note Here">{{ old("note") }}</textarea>
                    @error("note")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary ">Add</button>
            </form>
        </div>


    </div>



@endsection


@section("javascript")

    <script>
        // code here
    </script>
@endsection
