@foreach ($comments as $comment)
    <div class="grid grid-cols-1 gap-4 mt-3 mb-3">
        <div id="comment_0212{{ $comment->id }}" data-userId="{{ $comment->user->id }}" data-user="{{ $comment->user->username }}" data-comment="{{ Str::limit($comment->content, 15) }}" class="p-3 mt-3 rounded-lg bg-opacity-40 bg-neutral">
            <div class="flex justify-between">
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full" src="{{ asset("/assets/img/profile/user.png") }}" alt="">
                    <div class="flex flex-col ml-4">
                        <h3 class="font-bold">{{ $comment->user->username }}</h3>
                        <p class="text-sm">{{ $comment->created_at ? $comment->created_at->diffForHumans() : "" }}</p>
                    </div>
                </div>

                <div x-data="{ isActive: false }" class="relative">
                    <div class="flex items-center">
                        <button x-on:click="isActive = !isActive">
                            <i class="ri-more-2-fill"></i>
                        </button>
                    </div>

                    @if (auth()->check() && auth()->user()->id == $comment->user_id)
                        <div class="absolute z-10 w-24 mt-2 bg-white border border-gray-100 rounded-md shadow-lg" role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
                            <div class="p-0">
                                <form method="POST" data-id="{{ $comment->id }}" action="#">
                                    @csrf
                                    @method("delete")
                                    <button type="submit" class="block px-4 py-2 text-sm rounded-lg text-error hover:bg-gray-50 hover:text-gray-700 show-confirm-delete" role="menuitem">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
            <div class="mt-3">
                <p class="text-base">{!! $comment->content !!}</p>
            </div>
            <div class="mt-3">
                <button type="button" id="reply_0212{{ $comment->id }}" class=" text-primary hover:text-secondary reply_comment">Reply</button>
            </div>
        </div>
    </div>


    @foreach ($replies as $reply)
        @if ($reply->parent_id == $comment->id)
            <div class="grid grid-cols-1 gap-4 mt-2 mb-3 ml-8">

                <div class="-mb-2" id="spanToParent">
                    <span><i class="ri-reply-fill"></i> Rely to {{ $comment->user->username }} ({{ Str::limit($comment->content, 15) }})<span id="replyToName"></span>
                </div>

                <div id="comment_0212{{ $reply->id }}" data-userId="{{ $reply->user->id }}" data-user="{{ $reply->user->username }}" data-comment="{{ Str::limit($reply->content, 15) }}" class="p-3 rounded-lg bg-opacity-40 bg-neutral">
                    <div class="flex justify-between">
                        <div class="flex items-center">
                            <img class="w-10 h-10 rounded-full" src="{{ asset("/assets/img/profile/user.png") }}" alt="">
                            <div class="flex flex-col ml-4">
                                <h3 class="font-bold">{{ $reply->user->username }}</h3>
                                <p class="text-sm">{{ $reply->created_at ? $reply->created_at->diffForHumans() : "" }}</p>
                            </div>
                        </div>

                        <div x-data="{ isActive: false }" class="relative">
                            <div class="flex items-center">
                                <button x-on:click="isActive = !isActive">
                                    <i class="ri-more-2-fill"></i>
                                </button>
                            </div>

                            @if (auth()->check() && auth()->user()->id == $reply->user_id)
                                <div class="absolute z-10 w-24 mt-2 bg-white border border-gray-100 rounded-md shadow-lg" role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
                                    <div class="p-0">
                                        <form method="POST" data-id="{{ $reply->id }}" action="#">
                                            @csrf
                                            @method("delete")
                                            <button type="submit" class="block px-4 py-2 text-sm rounded-lg text-error hover:bg-gray-50 hover:text-gray-700 show-confirm-delete" role="menuitem">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-base">{!! $reply->content !!}</p>
                    </div>
                    <div class="mt-3">
                        <button type="button" id="reply_0212{{ $reply->id }}" class=" text-primary hover:text-secondary reply_comment">Reply</button>
                    </div>
                </div>
            </div>

            @foreach ($replies as $reply2)
                @if ($reply2->parent_id == $reply->id)
                    <div class="grid grid-cols-1 gap-4 mt-2 mb-3 ml-16">

                        <div class="-mb-2" id="spanToParent">
                            <span><i class="ri-reply-fill"></i> Rely to {{ $reply->user->username }} ({{ Str::limit($reply->content, 15) }})<span id="replyToName"></span>
                        </div>

                        <div id="comment_0212{{ $reply2->id }}" data-userId="{{ $reply2->user->id }}" data-user="{{ $reply2->user->username }}" data-comment="{{ Str::limit($reply2->content, 15) }}" class="p-3 rounded-lg bg-opacity-40 bg-neutral">
                            <div class="flex justify-between">
                                <div class="flex items-center">
                                    <img class="w-10 h-10 rounded-full" src="{{ asset("/assets/img/profile/user.png") }}" alt="">
                                    <div class="flex flex-col ml-4">
                                        <h3 class="font-bold">{{ $reply2->user->username }}</h3>
                                        <p class="text-sm">{{ $reply2->created_at ? $reply2->created_at->diffForHumans() : "" }}</p>
                                    </div>
                                </div>

                                <div x-data="{ isActive: false }" class="relative">
                                    <div class="flex items-center">
                                        <button x-on:click="isActive = !isActive">
                                            <i class="ri-more-2-fill"></i>
                                        </button>
                                    </div>

                                    @if (auth()->check() && auth()->user()->id == $reply2->user_id)
                                        <div class="absolute z-10 w-24 mt-2 bg-white border border-gray-100 rounded-md shadow-lg" role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
                                            <div class="p-0">
                                                <form method="POST" data-id="{{ $reply2->id }}" action="#">
                                                    @csrf
                                                    @method("delete")
                                                    <button type="submit" class="block px-4 py-2 text-sm rounded-lg text-error hover:bg-gray-50 hover:text-gray-700 show-confirm-delete" role="menuitem">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="text-base">{!! $reply2->content !!}</p>
                            </div>
                            {{-- <div class="mt-3">
                                <button type="button" id="reply_0212{{ $reply2->id }}" class=" text-primary hover:text-secondary reply_comment">Reply</button>
                            </div> --}}
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    @endforeach
@endforeach
