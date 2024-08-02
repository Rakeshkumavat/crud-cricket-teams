<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title> College List </title>
</head>

<body>
    {{-- <nav class="navbar navbar-expand-sm bg-dark">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/">Employee list</a>
                </li>
            </ul>
        </div>

    </nav> --}}
    <div class="container mb-3">
        <div class="text-right">
            <a class="btn btn-dark mt-2" href="/create">college Add</a>
            <a class="btn btn-dark mt-2" href="user-list">College List</a>
        </div>
        <form action="" method="">
            <div class="row">
                <div class="form-group col-md-3">
                    <input type="search" name="search" class="form-control mt-2 search" placeholder="Search by name "
                        value="{{ $search }}" />
                </div>
                <div class="form-group col-md-2">
                    <button class="btn btn-primary mt-2 search_data" type="submit">Search</button>
                </div>
            </div>
        </form>

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        <div id="list_pagination_results">
            @include('employee.list_data')
        </div>
        {{-- <div class="mt-5">
            {{ $users->links() }}
        </div> --}}
    </div>
</body>

</html>

<script>
    $(document).ready(function() {
        $("#my-form").submit(function(event) {
            event.preventDefault();

            var form = $("#my-form")[0];
            var data = new FormData(form);

            $("#btnSubmit").prop("disabled", true);

            $.ajax({
                type: "POST",
                url: "{{ route('store-data') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    get_list()
                },
                error: function(e) {
                    console.log(e.responseText);
                    $("#btnSubmit").prop("disabled", false);

                }
            });
        });
        // {'name': 'vikas','mobile'}
        // [''=>]
        // $("body").on("click", ".search_data", function(e) {
        //     e.preventDefault();
        var list_url = $(".search_data")

        function get_list() {

            list_url = "{{ route('list') }}"
            $.get(list_url, $(".search_data"), function(data, status) {
                console.log(data);
                $("#list_pagination_results").html(data);
            }, "html");
        }
        // });

        $("body").on("click", ".delete_data", function(e) {
            e.preventDefault();
            if (confirm('Are you sure want to delete?')) {
                t = $(this);
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'get',
                    error: function() {},
                    beforeSend: function() {
                        t.prop('disabled', true);
                    },
                    complete: function() {
                        t.prop('disabled', false);
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.status) {
                            get_list();
                        }
                    }
                });
            }

        });

        $("body").on("click", ".status", function(e) {
            e.preventDefault();
            if (confirm('Are you sure change status?')) {
                t = $(this);
                var id = $(this).attr('id');
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'get',
                    data:{
                        'id':id,
                    },
                    error: function() {},
                    beforeSend: function() {
                        // t.prop('disabled', true);
                    },
                    complete: function() {
                        // t.prop('disabled', false);
                    },
                    success: function(response) {
                            get_list();

                    }
                });
            }

        });




        <?php /*
        // $('.toggle-class').change(function() {
        //     var status = $(this).prop('checked') == true ? 0 : 1;
        //     var id = $(this).data('id');
        //     console.log(status);
        //     $.ajax({
        //         type: "get",
        //         dataType: "json",
        //         url: "{{ /route('status') }}",
        //         data: {
        //             'status': status,
        //             'id': id
        //         },
        //         success: function(data) {
        //             console.log(data.success);
        //         }
        //     });
        // }); */?>
    });
</script>
