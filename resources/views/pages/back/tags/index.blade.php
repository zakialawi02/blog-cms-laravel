@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of all tags on the zakialawi.my.id website")
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

        <div class="px-2 mb-3 d-flex justify-content-end align-items-center">
            <div class="">
                <a href="{{ route("admin.tags.create") }}" class="btn btn-primary"><i class="ri-add-line"></i> Add Tag</a>
            </div>
        </div>


        <div class="">
            <table id="myTable" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tag Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tags as $tag)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tag->tag_name }}</td>
                            <td>{{ $tag->slug }}</td>
                            <td>{{ $tag->created_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route("admin.tags.edit", $tag->slug) }}" class="btn btn-sm btn-success"><i class="ri-pencil-line"></i></a>
                                <form action="{{ route("admin.tags.destroy", $tag->slug) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger show-confirm-delete"><i class="ri-delete-bin-6-line"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Tags</td>
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
