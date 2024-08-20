@extends("layouts.appFront")

@section("title", "{$article->title} | zakialawi")
@section("meta_description", "$article->excerpt")
@section("meta_author", "zakialawi")

@section("og_title", "{$article->title} | zakialawi.my.id")
@section("og_description", "$article->excerpt")
@section("og_image", "$article->cover")

@push("css")
    <link rel="stylesheet" href="{{ asset("assets/css/prism.css") }}">
@endpush

@section("content")
    <!-- NAVBAR -->
    @include("components.front.navbar")

    @guest()
        <!-- MODAL LOGIN -->
        <div id="modal-login"class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div id="modal-login-backdrop" class="absolute inset-0 bg-gray-700 opacity-50"></div>
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 text-center py-44">

                <div class="relative inline-block px-4 w-[80%] pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                    <div class="relative z-10">
                        <button id="modal-login-close" class="absolute text-2xl font-bold bg-gray-100 border border-gray-300 rounded-lg -top-4 -right-4">
                            <i class="ri-close-fill"></i>
                        </button>
                    </div>

                    <form id="login-form" class="w-full" method="post" action="{{ route("login") }}">
                        @csrf
                        @method("POST")

                        <div class="flex flex-col mb-4">
                            <label for="id_user" class="text-gray-700 select-none">Email/Username</label>
                            <div class="relative">
                                <input type="text" class="w-full py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" name="id_user" id="id_user" value="{{ old("id_user") }}" placeholder="Enter email" autofocus>
                            </div>
                            @error("id_user")
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-col mb-4">
                            <label for="password" class="text-gray-700 select-none">Password</label>
                            <div class="relative">
                                <input type="password" class="w-full py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary" name="password" id="password" value="{{ old("password") }}" placeholder="Enter password">
                            </div>
                            @error("password")
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" class="w-4 h-4 border-gray-300 rounded focus:ring-primary text-primary" id="remember_me" name="remember">
                            <label for="remember_me" class="block ml-2 text-sm text-gray-900 select-none">Remember me</label>
                        </div>

                        <div class="mt-4">
                            <button class="w-full px-4 py-2 text-base font-medium tracking-wide text-white rounded-lg bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-white" type="submit">Log In</button>
                        </div>

                        <div id="login-error-messages" class="mt-3 text-center text-red-500"></div>

                        <div class="mt-4 text-center">
                            <a href="{{ route("password.request") }}" class="text-sm text-gray-500 hover:text-gray-700">Forgot your password?</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endguest

    <main class="container w-full p-6 md:p-10">

        <div class="mt-6">

            <div id="breadcrumb" class="">
                <nav aria-label="breadcrumb">
                    <ol class="flex flex-row flex-wrap items-center">
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="/">Home</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="{{ route("article.index") }}">Blog</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="{{ route("article.year", request()->segment(2)) }}">{{ request()->segment(2) }}</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent breadcrumb-next" href="{{ $article->category ? route("article.category", $article->category->slug) : "#" }}">{{ $article->category ? $article->category->category : "Uncategorized" }}</a>
                        </li>
                        <li class="">
                            <a class="text-dark hover:text-accent" aria-current="page" href="{{ route("article.show", ["year" => request()->segment(2), "slug" => $article->slug]) }}">{{ $article->title }}</a>
                        </li>
                    </ol>
                </nav>
            </div>

            <div id="main" class="flex flex-col flex-wrap flex-auto flex-grow gap-4 md:flex-row text-dark">
                <div id="post" class="w-full md:w-[60%] md:flex-grow">
                    <div id="main-content" class="">
                        <div id="post-header" class="py-1 my-2 mb-3">
                            <h1 class="mb-2 text-3xl font-bold">{{ $article->title }}</h1>
                            <div class="inline-flex items-center">
                                <a href="{{ route("article.user", $article->user->username) }}" class="inline-flex items-center after:content-['.'] after:mx-2 after:top-[-3px] after:relative after:px-1 after:font-black after:text-secondary  hover:text-primary gap-1" target="_blank">
                                    <img class="w-6" src="{{ $article->user->profile_photo_path }}" alt="author {{ $article->user->username }}">{{ $article->user->username }}
                                </a>
                                <a href="{{ route("article.month", ["year" => $article->published_at->format("Y"), "month" => $article->published_at->format("m")]) }}" class="hover:text-primary" target="_blank">{{ $article->published_at->format("d M Y") }}</a>
                            </div>
                        </div>
                    </div>
                    <div id="feature-image" class="mb-3">
                        <img class="max-h-[26rem] w-full rounded-lg object-cover object-center" src="{{ $article->cover }}" alt="{{ $article->title }}" loading="lazy" onerror="this.onerror=null;this.src='http://personal-blog-laravel.test/assets/img/image-placeholder.png';">
                    </div>
                    <div id="post-content" class="text-lg">

                        {!! $article->content !!}

                    </div>

                    <div class="py-1 my-2 border-b-2 border-dark border-opacity-40"></div>

                    <div class="post-bottom">
                        <div class="flex items-center justify-between text-secondary">
                            <div class="">
                                <!-- tags -->
                                @foreach ($article->tags->take(4) as $tag)
                                    <a href="{{ route("article.tag", $tag->tag_name) }}" class="px-1 py-[0.1rem] transition-all duration-300 mr-1 border-[1px] rounded-2xl border-secondary hover:border-primary hover:text-primary ">#{{ $tag->tag_name }}</a>
                                @endforeach
                            </div>
                            <div class="text-2xl">
                                <p class="text-sm">Share:</p>
                                <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                    <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                    <a class="a2a_button_facebook"></a>
                                    <a class="a2a_button_email"></a>
                                    <a class="a2a_button_whatsapp"></a>
                                    <a class="a2a_button_linkedin"></a>
                                    <a class="a2a_button_telegram"></a>
                                    <a class="a2a_button_x"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
                            </div>
                        </div>
                    </div>

                    <div id="author">

                    </div>

                    <div class="py-1 my-2 border-b-2 border-dark border-opacity-40"></div>

                    <div id="comments">
                        <div id="" class="mt-4">
                            <div class="mb-3">
                                <h2 class="text-3xl font-bold">Comments</h2>
                            </div>

                            <div id="comments-section"></div>

                            <div class="flex justify-start mt-3">
                                <button type="button" id="btn-show-comments-section" class="px-4 py-2 font-bold text-white transition-all duration-300 rounded-lg bg-primary hover:bg-secondary focus:outline-none">Show Comments Section</button>
                            </div>

                            <div id="content-comment-container" class="mt-10"> </div>

                        </div>
                    </div>
                </div>

                <div id="sidebar" class="w-full md:w-[30%] mt-10 md:mt-8">
                    <div id="popular-posts" class="p-2 mb-3 border-2 rounded-lg border-neutral">
                        <div class="text-xl font-bold text-center">
                            <h3>Popular Posts</h3>
                        </div>

                        <div class="p-2 mx-auto">
                            @forelse ($popularPosts as $popular)
                                <article>
                                    <div class="flex items-center gap-2 p-2">
                                        <a href="{{ route("article.show", ["year" => $popular->published_at->format("Y"), "slug" => $popular->slug]) }}" class="block mr-2 shrink-0">
                                            <img alt="post image" src="{{ $popular->cover }}" class="object-cover rounded-3xl size-14" />
                                        </a>

                                        <div>
                                            <h3 class="font-medium sm:text-lg line-clamp-2">
                                                <a href="{{ route("article.show", ["year" => $popular->published_at->format("Y"), "slug" => $popular->slug]) }}" class="block hover:text-primary">{{ $popular->title }}</a>
                                            </h3>

                                            <div class="mt-2 sm:flex sm:items-center sm:gap-2">
                                                <p class="hidden sm:block sm:text-xs">Posted by <a href="{{ route("article.user", $popular->user->username) }}" class="font-medium hover:text-primary">{{ $popular->user->username }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @empty
                                <p class="my-2 text-center font-regular">No popular posts</p>
                            @endforelse
                        </div>
                    </div>
                    <div id="categories" class="p-2 mb-3 border-2 rounded-lg border-neutral">
                        <div class="text-xl font-bold text-center">
                            <h3>Categories</h3>
                        </div>
                        <div class="p-2 mx-auto">
                            <ul class="flex flex-col gap-4 p-2">
                                @forelse ($categories as $category)
                                    <li><a href="{{ route("article.category", $category->slug) }}" class="font-bold hover:text-primary"><i class="mr-2 text-xl ri-skip-right-line text-info"></i>{{ $category->category }}</a></li>
                                @empty
                                    <p class="my-2 text-center font-regular">No Category Available</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>

    <!-- Footer -->
    @include("components.front.footer")
@endsection

@push("javascript")
    <script src="{{ asset("assets/js/prism.js") }}"></script>

    <script>
        $(document).ready(function() {
            const query = new URLSearchParams(window.location.search);
            const source = query.get('source');
            const commentId = query.get('commentId');
            if (source == "comments") {
                showCommentsSection();
                loadComments();
                if (commentId) {
                    scrollToElement(`#${commentId}`, 50, 500);
                }
            }

            function showCommentsSection(callback = null) {
                $.ajax({
                    type: "post",
                    url: "{{ route("showCommentSection") }}",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "html",
                    beforeSend: function() {
                        $("#btn-show-comments-section").empty();
                        $("#btn-show-comments-section").prepend("<div class='text-center loadspin'></div>");
                    },
                    success: function(response) {
                        $("#btn-show-comments-section").remove();
                        $("#comments-section").html(response);
                        $(".loadspin").remove();
                        const auth = "{{ auth()->check() }}"; // null=not login or 1=login
                        if (callback) callback();
                    },
                    error: function(error) {
                        // console.error(error);
                        $("#btn-show-comments-section").empty();
                        $("#btn-show-comments-section").prepend("Show Comments Section (error)");
                    }
                });
            }

            function loadComments() {
                $.ajax({
                    type: "post",
                    url: "{{ route("showArticleComment", $article->slug) }}",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "html",
                    beforeSend: function() {

                    },
                    success: function(response) {
                        $("#content-comment-container").empty();
                        $("#content-comment-container").html(response);
                    },
                    error: function(error) {
                        // console.error(error);
                        $("#content-comment-container").empty();
                        $("#content-comment-container").prepend("Load Comments (error)");
                    }
                });
            }

            $("#btn-show-comments-section").click(function(e) {
                e.preventDefault();
                showCommentsSection(() => loadComments());
            });

            $(document).on("submit", "#comment-form", function(e) {
                e.preventDefault();
                $("#messages-error").html("");
                $("#btn-submit-comment").empty();
                $("#btn-submit-comment").prepend("<div class='text-center loadspin'></div>");
                $.ajax({
                    type: "post",
                    url: "{{ route("admin.comment.store", $article->slug) }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        comment: $("#comment_input").val(),
                        parent_id: $("#parentTarget").val(),
                    },
                    dataType: "json",
                    berforeSend: function() {
                        $("#btn-submit-comment").empty();
                        $("#btn-submit-comment").prepend("<div class='text-center loadspin'></div>");
                    },
                    success: function(response) {
                        closeReply();
                        $("#comment_input").val("");
                        $("#btn-submit-comment").empty();
                        $("#btn-submit-comment").prepend("Post Comment");
                        $("#content-comment-container").empty();
                        $("#content-comment-container").prepend("<div class='text-center loadspin'></div>");
                        loadComments();
                        const target = `#${response.commentId}`;
                        if (target) {
                            scrollToElement(`${target}`, 200, 300);
                        }
                    },
                    error: function(error) {
                        // console.error(error);
                        $("#btn-submit-comment").empty();
                        $("#btn-submit-comment").prepend("Post Comment");
                        if (error.status == 419) {
                            $("#messages-error").append('<span>Error: Please refresh the page and try again</span> <br>');
                        } else {
                            $("#messages-error").append(`<span>${error.responseJSON.message}</span> <br>`);
                        }

                    }
                })
            });

            $(document).on("click", ".show-confirm-delete", function(e) {
                e.preventDefault();
                const commentId = $(this).closest("form").data("id");
                const url = "{{ route("admin.comment.destroy", ":commentId") }}".replace(':commentId', commentId);
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    beforeSend: function() {
                        $("#content-comment-container").empty();
                        $("#content-comment-container").prepend("<div class='text-center loadspin'></div>");
                    },
                    success: function(response) {
                        loadComments();
                    },
                    error: function(error) {
                        // console.error(error);
                    },
                });
            });

            $(document).on("click", ".reply_comment", function(e) {
                $("#replyToTarget").removeClass("hidden");
                const sectionId = $(this).closest('div[id^="comment_"]');
                const commentId = $(this).closest('div[id^="comment_"]').attr('id');
                const snapComment = sectionId.data('comment');
                const userComment = sectionId.data('user');
                const userIdComment = sectionId.data('userId');
                $("#replyToName").text(`${userComment}`);
                $("#snapshotComment").text(`${snapComment}`);
                $("#parentTarget").val(`${commentId}`);
                scrollToElement("#comment-form", 60);
            });

            function closeReply() {
                $("#replyToTarget").addClass("hidden");
                $("#replyToName").text(``);
                $("#snapshotComment").text(``);
                $("#parentTarget").val(``);
            }

            function scrollToElement(selector, offset = 0, delay = 0) {
                setTimeout(function() {
                    window.scrollTo({
                        top: document.querySelector(selector).offsetTop - offset,
                        behavior: 'smooth'
                    });
                }, delay);
            }

            $(document).on("click", "#cancel_reply", function(e) {
                closeReply();
            })

        });
    </script>

    @guest()
        <script>
            $(document).on("click", "#btn-submit-comment-need-login", function(e) {
                $("#modal-login").css("display", "block");
            });

            $(document).on("click", "#modal-login-close, #modal-login-backdrop", function(e) {
                $("#modal-login").css("display", "none");
            });

            $(document).on("submit", "#login-form", function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: "{{ route("login") }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id_user: $("#id_user").val(),
                        password: $("#password").val()
                    },
                    dataType: "json",
                    beforeSend: function() {

                    },
                    success: function(response) {
                        window.location.reload();
                    },
                    error: function(error) {
                        // console.error(error);
                        if (error.status == 200) {
                            window.location.reload();
                        } else {
                            $("#login-error-messages").html("Login Failed. Please check your credentials and try again.");
                        }
                    }
                });
            });
        </script>
    @endguest
@endpush
