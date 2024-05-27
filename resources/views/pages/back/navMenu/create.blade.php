@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "")
@section("meta_author", "zakialawi")


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

        <form action="{{ route("admin.menu-items.store") }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old("name") }}" required>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">URL</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old("url") }}" required>
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class" value="{{ old("class") }}" required>
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Order</label>
                <input type="number" class="form-control" id="order" name="order" value="{{ old("order") }}" required>
            </div>
            <div class="mb-3">
                <label for="parent_id" class="form-label">Parent Menu Item</label>
                <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">None</option>
                    @foreach ($menuItems as $menuItem)
                        <option value="{{ $menuItem->id }}" {{ old("parent_id") == $menuItem->id ? "selected" : "" }}>
                            {{ $menuItem->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>



@endsection

@push("javascript")
    <script>
        // code here
    </script>
@endpush
