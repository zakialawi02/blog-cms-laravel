@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of all posts on the zakialawi.my.id website")
@section("meta_author", "zakialawi")

@section("og_title", "All Posts • Dashboard | zakialawi.my.id")
@section("og_description", "List of all posts on the zakialawi.my.id website")

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

        @if (session("success"))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session("success") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session("error"))
            <div class="alert alert-error alert-dismissible fade show" role="alert">
                {{ session("error") }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="">
            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger"><i class="ri-delete-bin-6-line"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger"><i class="ri-delete-bin-6-line"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                        <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-danger"><i class="ri-delete-bin-6-line"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="pagination"></div>
        </div>

    </div>



@endsection

@push("javascript")
    {{--  --}}
@endpush