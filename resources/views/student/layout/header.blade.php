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
    <title>Student</title>
</head>
<script>
    $(document).ready(function() {
        $("#student-form").submit(function(event) {
            event.preventDefault();

            var form = $("#student-form")[0];
            var data = new FormData(form);

            $("#submitBtn").prop("disabled", true);

            $.ajax({
                type: "POST",
                url: "{{ route('student-data') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    get_list();
                },
                error: function(e) {
                    console.log(e.responseText);
                    $("#submitBtn").prop("disabled", false);

                }
            });
        });
        var list_url = $(".search_data")

        function get_list() {

            list_url = "{{ route('student-list') }}"
            $.get(list_url, $(".search_data"), function(data, status) {
                console.log(data);
                location = "{{ route('student-list') }}"
                // $("#list_pagination_results").html(data);
            }, "html");
        }


        $(document).ready(function() {
            $("#student-edit").submit(function(event) {
                event.preventDefault();

                var form = $("#student-edit")[0];
                var data = new FormData(form);

                $("#submitEditStudent").prop("disabled", true);

                $.ajax({
                    type: "POST",
                    url: "{{ route('update-student') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        get_list();
                    },
                    error: function(e) {
                        console.log(e.responseText);
                        $("#submitEditStudent").prop("disabled", false);

                    }
                });
            });
        });


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
                    data: {
                        'id': id,
                    },
                    error: function() {},
                    beforeSend: function() {},
                    complete: function() {},
                    success: function(response) {
                        get_list();

                    }
                });
            }

        });

    });
</script>
