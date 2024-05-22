<script type="text/javascript">
    $(document).ready(function() {
        getNotifications();

        function getNotifications() {
            $.ajax({
                type: "GET",
                url: "{{ route("admin.getNotifications") }}",
                dataType: "html",
                beforeSend: function() {
                    $("#notifications-dot").removeAttr("class");
                },
                success: function(response) {
                    const links = $(response).closest('a[id^="comment_notification"]');
                    const countLink = links.length;
                    if (countLink > 0) {
                        $("#notifications-dot").removeAttr("class");
                        $("#notifications-dot").addClass("noti-dot");
                    }
                    $("#container-notifications-list").html(response);
                },
                error: function(error) {
                    // console.error(error);
                }
            });
        }

        $(document).on('click', '#mark-all-notifications-as-read', function() {
            const elements = $("#container-notifications-list").find("a");
            let Ids = [];
            elements.each(function(index, element) {
                Ids[index] = $(element).data("notif");
            });
            if (Ids.length == 0) {
                return
            }
            $.ajax({
                type: "PUT",
                url: "{{ route("admin.markAsReadAll") }}",
                data: {
                    _token: "{{ csrf_token() }}",
                },
                dataType: "json",
                beforeSend: function() {

                },
                success: function(response) {
                    // console.log(response);
                    if (response.success) {
                        getNotifications();
                        const buttonMarkRead = $("#mark-notifications-as-read");
                        if (buttonMarkRead.length > 0) {
                            buttonMarkRead.prop("disabled", true);
                        }
                    } else {
                        toastr["error"](response.message, "Error", optionsTostr)
                    }
                },
                error: function(error) {
                    // console.error(error);
                    toastr["error"](error.responseJSON.message, "Error", optionsTostr)
                },
            });
        })

        $(document).on('click', '#mark-notifications-as-read', function() {
            const button = $(this);
            $.ajax({
                type: "PUT",
                url: "{{ route("admin.markAsReadAll") }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    dataId: $(this).data("notif"),
                },
                dataType: "json",
                beforeSend: function() {

                },
                success: function(response) {
                    // console.log(response);
                    if (response.success) {
                        getNotifications();
                        button.prop("disabled", true);
                    }
                },
                error: function(error) {
                    // console.error(error);
                    toastr["error"](error.responseJSON.message, "Error", optionsTostr)
                },
            });
        })
    });
</script>
