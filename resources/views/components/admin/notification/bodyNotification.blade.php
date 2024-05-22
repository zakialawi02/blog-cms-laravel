@forelse ($notifications as $notification)
    @if ($notification->type == "comment")
        <a href="{{ route("article.show", ["year" => $notification->data["article"]->published_at->format("Y"), "slug" => $notification->data["article"]->slug]) . "?source=comments&commentId=comment_0212" . $notification->data["article"]->id }}" id="comment_notification"
            class="text-reset notification-item" data-notif="notif_0205{{ $notification->id }}" target="_blank">
            <div class="media">
                <div class="mr-3 avatar-xs">
                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                        <i class="ri-discuss-line"></i>
                    </span>
                </div>
                <div class="media-body">
                    <h6 class="mt-0 mb-1"><span id="name_notification">{{ $notification->data["user"]->username }}</span> Commented on your post</h6>
                    <div class="font-size-12 text-muted">
                        <p class="mb-1"><span id="comment_pages">{{ $notification->data["article"]->title }}</span></p>
                        <p class="mb-1"><span id="snapshot_notification">"{{ $notification->data["comment"] }}"</span></p>
                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i><span id="time_notification">{{ $notification->created_at->diffForHumans() }}</span></p>
                    </div>
                </div>
            </div>
        </a>
    @elseif ($notification->type == "follow")
        <a href="#" id="follow_notification" class="text-reset notification-item" data-notif="notif_0205{{ $notification->id }}">
            <div class="media">
                <img src="/assets/img/profile/user.png" class="mr-3 rounded-circle avatar-xs" alt="user-pic">
                <div class="media-body">
                    <h6 class="mt-0 mb-1"><span id="name_notification">{{ $notification->data["user"]->username }}</span> Followed you</h6>
                    <div class="font-size-12 text-muted">
                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i><span id="time_notification">{{ $notification->created_at->diffForHumans() }}</span></p>
                    </div>
                </div>
            </div>
        </a>
    @endif
@empty
    <div class="p-3 text-center text-muted">
        <p>No new notifications</p>
    </div>
@endforelse
