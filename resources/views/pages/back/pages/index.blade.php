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

        <div class="px-2 mb-3 d-flex justify-content-between align-items-center">
            <h3>{{ __("Pages") }}</h3>
            <a href="{{ route("admin.pages.create") }}" class="btn btn-primary"><i class="ri-add-line"></i> Add Pages</a>
        </div>


        <div class="">
            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Page</th>
                        <th scope="col">Description</th>
                        <th scope="col">Url</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $page)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $page->title }}</td>
                            <td>{{ $page->description }}</td>
                            <td> <a href="http://{{ url("/p/") }}/{{ $page->slug }}" target="_blank">{{ url("/p/") }}/{{ $page->slug }}</a></td>
                            <td>
                                <a href="{{ route("admin.pages.builder", $page->id) }}" class="btn btn-sm btn-primary" title="Open Page Builder"><i class="ri-pencil-ruler-2-line"></i></a>
                                <a href="{{ route("admin.pages.edit", $page->id) }}" class="btn btn-sm btn-secondary" title="Edit"><i class="ri-settings-4-line"></i></a>
                                <a href="{{ route("page.show", $page->slug) }}" class="btn btn-sm btn-info" title="Edit" target="_blank"><i class="ri-computer-line"></i></a>

                                <form action="{{ route("admin.pages.destroy", $page->id) }}" class="d-inline" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger show-confirm-delete"><i class="ri-delete-bin-6-line"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Pages Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>



@endsection

@push("javascript")
    <script>
        // code here
    </script>
@endpush
