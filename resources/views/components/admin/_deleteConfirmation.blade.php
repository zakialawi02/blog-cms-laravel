<script>
    $(".show-confirm-delete").click(function(e) {
        e.preventDefault();
        let deleteForm = e.target.closest("form");;

        Swal.fire({
            title: "Are you sure you want to delete this record?",
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#74788d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonColor: '#5664d2',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                deleteForm.submit();
            }
        });
    });

    $(document).on("click", ".show-confirm-delete", function(e) {
        e.preventDefault();
        let deleteForm = e.target.closest("form");;

        Swal.fire({
            title: "Are you sure you want to delete this record?",
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#74788d',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonColor: '#5664d2',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                deleteForm.submit();
            }
        });
    });
</script>
