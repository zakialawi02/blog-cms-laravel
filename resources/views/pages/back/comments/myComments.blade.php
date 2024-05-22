@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of my comments on the zakialawi.my.id website")
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
                        <th scope="col" width="10px">#</th>
                        <th scope="col" width="40%">Article</th>
                        <th scope="col" width="45%">Comment</th>
                        <th scope="col" width="50px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($myComments as $myComment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $myComment->article->title }}</td>
                            <td>{!! $myComment->content !!}</td>
                            <td>
                                <a type="button" href="{{ route("article.show", ["year" => $myComment->article->published_at->format("Y"), "slug" => $myComment->article->slug]) . "?source=comments&commentId=comment_0212" . $myComment->id }}" class="btn btn-sm btn-primary"
                                    data-target="comment_{{ $myComment->id }}" target="_blank"><i class="ri-eye-fill"></i></a>
                                <form action="{{ route("admin.comment.destroy", $myComment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method("DELETE")

                                    <button type="submit" class="btn btn-sm btn-danger show-confirm-delete"><i class="ri-delete-bin-6-line show-confirm-delete"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Comments</td>
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
