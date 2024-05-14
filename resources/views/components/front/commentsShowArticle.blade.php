@foreach ($comments as $comment)
    <div class="grid grid-cols-1 gap-4 mt-3 mb-3">
        <div class="p-3 rounded-lg bg-opacity-40 bg-neutral">
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
        </div>
    </div>
@endforeach
