<form action="#" id="comment-form" method="post" class="space-y-4">
    <div class="flex items-center gap-4 mb-3">
        <img class="w-8 h-8 rounded-full" src="{{ asset("assets/img/profile/user.png") }}" alt="Ahmad Zaki Alawi">
        <span class="text-sm text-gray-700">comment as <b>{{ $user }}</b></span>
    </div>

    <div class="hidden" id="replyToTarget">
        <span><i class="ri-reply-fill"></i> Rely to <span id="replyToName"></span> <b>(<span id="snapshotComment"></span>)</b> <button id="cancel_reply" class="ml-2 text-error hover:text-accent" type="button"><i class="ri-close-circle-fill"></i></button></span>
    </div>

    <input type="text" name="parent_id" id="parentTarget" class="hidden" value="">

    <div class="space-y-2">
        <textarea name="comment" id="comment_input" cols="10" rows="5" class="w-full p-2 border-2 rounded-lg border-neutral" placeholder="Write your comment..."></textarea>
        <p><span class="text-sm text-error" id="messages-error"></span></p>
    </div>
    <div class="flex justify-end">
        @auth()
            <button type="submit" id="btn-submit-comment" class="px-4 py-2 font-semibold text-white rounded-lg bg-primary hover:bg-secondary">Post Comment</button>
        @else
            <button type="button" id="btn-submit-comment-need-login" class="px-4 py-2 font-semibold text-white rounded-lg bg-primary hover:bg-secondary"><i class="ri-lock-2-line"></i> Login</button>
        @endauth
    </div>
</form>
