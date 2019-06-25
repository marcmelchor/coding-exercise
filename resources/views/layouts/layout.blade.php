<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @yield('title')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <style>
          html {
            padding: 20px;
          }
        </style>
    </head>
    <body>
        <div class="col-xs-9 col-md-7">
          @yield('content')
        </div>
    </body>
</html>

<script>
$(document).ready(function(){

    fetch_job_data();

    function fetch_job_data(query = '')
    {
    $.ajax({
        url:"{{ route('live_search.action') }}",
        method:'GET',
        data:{query:query},
        dataType:'json',
        success:function(data)
        {
        $('#toSearch').html(data.table_jobs);
        }
    })
    }

    $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_job_data(query);
    });
});
</script>

