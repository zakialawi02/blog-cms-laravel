@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of notifications on the zakialawi.my.id website")
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
            <div class="" style="text-align-last: right;">
                <a href="javascript:void(0)" id="mark-all-notifications-as-read"> Mark all as read</a>
            </div>

            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notifications as $notification)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $notification->type }}</td>
                            <td>{!! $notification->type == "comment" ? "Commented on" . $notification->data["article"]->title . "<br>" . "'" . $notification->data["comment"] . "'" . " by " . $notification->data["user"]->username : "" !!}</td>
                            <td>{{ $notification->created_at->diffForHumans() }}</td>
                            @if ($notification->read_at == null)
                                <td>
                                    <button type="button" id="mark-notifications-as-read" data-notif="notif_0205{{ $notification->id }}" class="text-white btn btn-sm btn-primary"><i class="ri-check-fill"></i></button>
                                </td>
                            @else
                                <td>
                                    <button type="button" class="text-white btn btn-sm btn-primary" disabled><i class="ri-check-fill"></i></button>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Notifications</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div id="pagination"></div>
        </div>

    </div>



@endsection

@push("javascript")
    <script>
        // code here
    </script>
@endpush
