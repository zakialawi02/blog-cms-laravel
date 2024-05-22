@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "List of comments")
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
                        <th scope="col">#</th>
                        <th scope="col" width="480rem">Comment</th>
                        <th scope="col" width="10%">User</th>
                        <th scope="col" width="40%">Article</th>
                        <th scope="col" width="10px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($comments as $comment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $comment->content }}</td>
                            <td>{{ $comment->user->username }} {{ $comment->user->id == auth()->user()->id ? "(You)" : "" }}</td>
                            <td>{{ $comment->article->title }}</td>
                            <td>
                                <a type="button" href="{{ route("article.show", ["year" => $comment->article->published_at->format("Y"), "slug" => $comment->article->slug]) . "?source=comments&commentId=comment_0212" . $comment->id }}" class="btn btn-sm btn-primary"
                                    data-target="comment_{{ $comment->id }}" target="_blank"><i class="ri-eye-fill"></i></a>
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
