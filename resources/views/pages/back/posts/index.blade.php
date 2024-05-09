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

        <div class="px-2 mb-3 d-flex justify-content-between align-items-center">
            <div class="d-flex">
                <h3>{{ __("Posts") }}</h3>
                <a href="{{ route("article.index") }}" class="ml-2" target="_blank"><i class="ri-external-link-line"></i></a>
            </div>
            <div class="">
                <a href="{{ route("admin.posts.create") }}" class="btn btn-primary"><i class="ri-add-line"></i> Add Posts</a>
            </div>
        </div>


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

            <div class="px-2 ">
                <label>Filter</label>
            </div>
            <div class="px-2 mb-3 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <div class="mr-2 form-group">
                        <label for="status">Status</label>
                        <select name="status" id="publish" class="form-control">
                            <option value="all">All</option>
                            <option value="published">Published</option>
                            <option value="draft">Draft</option>
                        </select>
                    </div>
                    <div class="mr-2 form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="all">All</option>
                            <option value="uncategorized">Uncategorized</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (Auth::user()->role == "admin")
                        <div class="mr-2 form-group">
                            <label for="user">Author</label>
                            <select name="user" id="user" class="form-control">
                                <option value="all">All</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->username }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                <div class="mr-2 form-group">
                    <div class="">
                        <label for="search">Search</label>
                    </div>
                    <div class="d-inline-flex">
                        <input type="search" name="search" id="search" class="form-control" placeholder="Enter search">
                        <button class="btn btn-primary" id="btn-search" type="button"><i class="ri-search-line"></i></button>
                    </div>
                </div>
            </div>

            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Author</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div id="pagination"></div>
        </div>

    </div>



@endsection

@push("javascript")
    <script>
        $(document).ready(function() {
            fetchData(window.location.search);

            $("[name^=status], [name^=category], [name^=user]").change(function(e) {
                e.preventDefault();
                const newUrl = getparams(1);
                history.pushState(null, '', newUrl);
                fetchData(newUrl);
            });

            $("#btn-search").click(function(e) {
                e.preventDefault();
                const newUrl = getparams(1);
                history.pushState(null, '', newUrl);
                fetchData(newUrl);
            });

            $(document).on('click', '.btn-paginate', function(event) {
                event.preventDefault();
                const page = $(this).attr('href').split('=')[1];
                const newUrl = getparams(page);
                history.pushState(null, '', newUrl);
                fetchData(newUrl);
            });

            window.onpopstate = function(event) {
                fetchData(window.location.search);
            };
        });

        function fetchData(fullUrl) {
            setInputValuesFromParams();
            const apiUrl = "{{ route("posts.data") }}";
            const urlAjax = apiUrl + fullUrl;

            const articleShowUrlTemplate = "{{ route("article.show", ["year" => "__year__", "slug" => "__slug__"]) }}";
            const articleEditUrlTemplate = "{{ route("admin.posts.edit", "__slug__") }}";
            $.ajax({
                url: urlAjax,
                type: "GET",
                beforeSend: function() {
                    $("#myTable tbody").html('<tr><td colspan="5" class="text-center"><i class="spinner-border text-primary"></i></td></tr>');
                },
                success: function(response) {
                    const data = response.data;
                    if (data.length === 0) {
                        $("#myTable tbody").html('<tr><td colspan="5" class="text-center">No Data</td></tr>');
                        return;
                    }
                    $('tbody').empty();
                    $.each(data, function(key, data) {
                        const publishedDate = new Date(data.published_at);
                        const publishedYear = publishedDate.getFullYear();
                        const articleUrlShow = articleShowUrlTemplate.replace('__year__', encodeURIComponent(publishedYear)).replace('__slug__', encodeURIComponent(data.slug));
                        const articleUrlEdit = articleEditUrlTemplate.replace('__slug__', encodeURIComponent(data.slug));
                        $('tbody').append(`
                                <tr>
                                    <td>${data.title}</td>
                                    <td>${data.category?.category ?? "Uncategorized"}</td>
                                    <td>${data.status === 'published' ? (new Date(data.published_at) < new Date() ? "Published<br>" : "Scheduled<br>") + Intl.DateTimeFormat('id-ID', {dateStyle: 'medium'}).format(new Date(data.published_at)) : data.status}</td>
                                    <td>${data.user.username}</td>
                                    <td>${Intl.DateTimeFormat('id-ID', {dateStyle: 'medium'}).format(new Date(data.created_at))}</td>
                                    <td>
                                        <a href="${articleUrlShow}" class="btn btn-secondary btn-sm" target="_blank"><i class="ri-computer-fill"></i></a>
                                        <a href="${articleUrlEdit}" class="btn btn-primary btn-sm""><i class="ri-edit-line"></i></a>
                                        <form action="/admin/posts/${data.slug}", ":slug") }}" method="POST" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="ri-delete-bin-6-line"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                `);
                    });
                    const links = response.links;
                    const pagination = $('#pagination');
                    pagination.empty();
                    if (links.length > 0) {
                        $.each(links, function(key, link) {
                            const href = link.url?.split('?')[1] || null;
                            const activeClass = link.active || link.url === null ? "disabled" : "";
                            pagination.append(`
                                        <a href="${href}" class="btn-paginate btn btn-sm btn-outline-secondary ${activeClass}" ${activeClass}>${link.label}</a>
                                        `);
                        });
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function getparams(page = null) {
            const urlParams = new URLSearchParams(window.location.search);

            if (page !== null) {
                urlParams.set('page', page);
            }
            urlParams.set('status', $("[name^=status]").val() || urlParams.get('status') || '');
            urlParams.set('category', $("[name^=category]").val() || urlParams.get('category') || '');
            urlParams.set('user', $("[name^=user]").val() || urlParams.get('user') || '');
            urlParams.set('search', $("[name^=search]").val());
            return '?' + urlParams.toString();
        }

        function setInputValuesFromParams() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status') || 'all';
            const category = urlParams.get('category') || 'all';
            const user = urlParams.get('user') || 'all';
            const search = urlParams.get('search');

            $("[name^=status]").val(status);
            $("[name^=category]").val(category);
            $("[name^=user]").val(user);
            $("[name^=search]").val(search);
        }
    </script>
@endpush
