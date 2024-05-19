@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "News Letters Subscription List")
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

        <div class="">
            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Subscribed At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($newsletters as $newsletter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $newsletter->email }}</td>
                            <td>{{ $newsletter->created_at->diffForHumans() }}</td>
                            <td>
                                <form action="{{ route("admin.newsletter.destroy", $newsletter->email) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-sm btn-danger show-confirm-delete"><i class="ri-delete-bin-6-line"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Newsletters</td>
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
