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

                    <div class="page-title-right">
                        <ol class="m-0 breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                            <li class="breadcrumb-item active">Starter page</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
    </div>

    <div class="p-3 card">

        <div class="">
            <table class="table table-hover table-striped">
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
