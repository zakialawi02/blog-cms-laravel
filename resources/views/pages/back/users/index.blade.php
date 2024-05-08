@extends("layouts.app")

@section("title", ($data["title"] ?? "") . " • Dashboard | zakialawi")
@section("meta_description", "isi disini")
@section("meta_author", "zakialawi")


@push("css")
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
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

        <div class="px-2 mb-3 d-flex justify-content-end align-items-center">
            <button type="button" class="btn btn-primary" id="createNewUser" data-toggle="modal" data-target="#userModal"><i class="ri-add-line"></i> Add User</button>
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

        <div class="table-responsive">
            <table id="myTable" class="table table-hover table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Registered</th>
                        <th scope="col">Verified</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="error-messages"></div>

                    <form id="userForm" class="form-horizontal" method="post" action="">
                        @csrf
                        <input type="hidden" name="_method" id="_method">

                        <div class="mb-3 form-group auth-form-group-custom">
                            <i class="ri-user-2-line auti-custom-input-icon"></i>
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ old("name") }}" placeholder="Enter your Name" required autofocus="on">
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6 form-group auth-form-group-custom">
                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                <label for="username">Username</label>
                                <input type="username" class="form-control" name="username" id="username" value="{{ old("username") }}"placeholder="Enter your username" required>
                            </div>


                            <div class="mb-3 col-md-6 form-group auth-form-group-custom">
                                <i class="ri-user-2-line auti-custom-input-icon"></i>
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="writer">Writer</option>
                                    <option value="user" selected>User</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 form-group auth-form-group-custom">
                            <i class="ri-mail-line auti-custom-input-icon"></i>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ old("email") }}"placeholder="Enter email" required>
                        </div>

                        <div class="mb-3 form-group auth-form-group-custom">
                            <i class="ri-lock-2-line auti-custom-input-icon"></i>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                            <span id="passwordHelpBlock" class="text-muted"></span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="saveBtn" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push("javascript")
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable', {
                processing: true,
                serverSide: true,
                ajax: "{{ url()->current() }}",
                lengthMenu: [
                    [10, 15, 25, 50, -1],
                    [10, 15, 25, 50, "All"]
                ],
                language: {
                    paginate: {
                        previous: '<i class="mdi mdi-chevron-left">',
                        next: '<i class="mdi mdi-chevron-right">'
                    }
                },
                order: [
                    [2, 'asc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'photo',
                        name: 'photo',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'role',
                        name: 'role'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'email_verified_at',
                        name: 'email_verified_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const cardErrorMessages = `<div id="body-messages" class="alert alert-danger" role="alert"></div>`;

            // Open modal for creating new user
            $('#createNewUser').click(function() {
                $('#userModal').find('.modal-title').text('Add User');
                $('#userForm').attr('method', 'POST');
                $('#_method').val('POST');
                $('#userForm').trigger("reset");
                $('#userForm').attr('action', '{{ route("admin.users.store") }}');
                $('#saveBtn').text('Create');
                $("#error-messages").html("");
                $("#passwordHelpBlock").html("");
            });

            // Save new or updated user
            $('#saveBtn').on('click', function(e) {
                e.preventDefault();
                const formData = $('#userForm').serialize();
                const formAction = $('#userForm').attr('action');
                const method = $('#userForm').attr('method');

                $.ajax({
                    type: method,
                    url: formAction,
                    data: formData,
                    beforeSend: function() {
                        $("#body-messages").html("");
                    },
                    success: function(response) {
                        $('#userModal').modal('hide');
                        $('#myTable').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        $("#error-messages").html(cardErrorMessages);
                        const messages = error.responseJSON.errors;
                        console.log(messages);
                        $.each(messages, function(indexInArray, message) {
                            console.log(message[0]);
                            $("#body-messages").append('<span>' + message[0] + '</span> <br>');
                        });
                    }
                });
            });

            // Edit user
            $('body').on('click', '.editUser', function() {
                $("#error-messages").html("");
                $("#passwordHelpBlock").html("blank if you don't want to change");
                const userId = $(this).data('id');
                $.get(`{{ route("admin.users.show", ":userId") }}`.replace(':userId', userId), function(data) {
                    $('#userModal').modal('show');
                    $('#userModal').find('.modal-title').text('Edit User');
                    $('#userForm').attr('action', `{{ route("admin.users.update", ":userId") }}`.replace(':userId', userId));
                    $('#saveBtn').text('Update');
                    $('#_method').val('PUT');
                    $('#name').val(data.name);
                    $('#username').val(data.username);
                    $('#role').val(data.role);
                    $('#email').val(data.email);
                });
            });

            // Delete user
            $('body').on('click', '.deleteUser', function(e) {
                e.preventDefault();
                const userId = $(this).data('id');
                const url = `{{ route("admin.users.destroy", ":userId") }}`.replace(':userId', userId);
                console.log(url);
                console.log(userId);
                if (confirm("Are you sure you want to delete this user?")) {
                    $.ajax({
                        type: "DELETE",
                        url: `{{ route("admin.users.destroy", ":userId") }}`.replace(':userId', userId),
                        success: function(response) {
                            $('#myTable').DataTable().ajax.reload();
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            })
        });
    </script>
@endpush
