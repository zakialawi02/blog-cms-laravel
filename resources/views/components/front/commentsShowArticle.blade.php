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
                <div class="flex items-center">
                    <i class="ri-more-2-fill"></i>
                </div>
            </div>
            <div class="mt-3">
                <p class="text-base">{!! $comment->content !!}</p>
            </div>
        </div>
    </div>
@endforeach
