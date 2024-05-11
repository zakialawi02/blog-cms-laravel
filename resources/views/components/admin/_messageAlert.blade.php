<script>
    const optionsTostr = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "timeOut": 3000,
    }
    // toastr["success"]("Test tes", "Success", optionsTostr)
</script>

@if (session("success"))
    <script>
        toastr["success"]("{{ session("success") }}", "Success", optionsTostr)
    </script>
@endif
@if (session("error"))
    <script>
        toastr["error"]("{{ session("error") }}", "Failed", optionsTostr)
    </script>
@endif
