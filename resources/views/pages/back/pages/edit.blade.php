@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "")
@section("meta_author", "zakialawi")


@section("meta_robots", "noindex, follow")

@push("css")
    {{-- code here --}}
@endpush

@section("content")
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">{{ __($data["title"] ?? "") }}</h4>

                    <!-- Breadcrumb -->
                    @include("components.admin.breadcrumb")

                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    <div class="p-3 card">

        <form action="{{ route("admin.pages.update", $page->id) }}" id="form-category" method="post">
            @csrf
            @method("put")

            <div class="form-group">
                <label for="title">Page Title Name</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old("title", $page->title) }}" autofocus required>
                @error("title")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Page Description</label>
                <textarea type="text" name="description" id="description" class="form-control" placeholder="Page Description">{{ old("description", $page->description) }}</textarea>
                @error("description")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug">Url</label>
                <div class="mb-3 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://domain.com/p/</span>
                    </div>
                    <input type="text" class="form-control" name="slug" id="slug" aria-describedby="basic-addon3" value="{{ old("slug", $page->slug) }}">
                </div>
                @error("slug")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="template_id">Template</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="template_id" id="template-default" value="1" @if ($page->isFullWidth == 1) checked @endif>
                    <label class="form-check-label" for="template-default">
                        Full Width
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="template_id" id="template-blog" value="0" @if ($page->isFullWidth == 0) checked @endif>
                    <label class="form-check-label" for="template-blog">
                        Canvas
                    </label>
                </div>
                @error("template_id")
                    <p class="text-sm text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>

    </div>



@endsection

@push("javascript")
    <script></script>
@endpush
