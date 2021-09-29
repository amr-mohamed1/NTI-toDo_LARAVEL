<?php 
use Carbon\Carbon;
use Carbon\CarbonPeriod;
?>

<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }
    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1> 
            <br>

          Welcome : {{ auth()->user()->name }}
          <br>

        <a href="{{ url('/create') }}">create</a>
        </div>


        {{ session()->get('Message') }}   

        <!-- PHP code to read records will be here -->



        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>From</th>
                <th>To</th>

            </tr>
<?php $i= 1;?>
@foreach ($data as $fetchedData )
            <tr>

                <td>{{ $i++ }}</td>

                <td>{{$fetchedData->id  }}</td>
                <td>{{$fetchedData->task_title  }}</td>
                <td>{{$fetchedData->task_desc  }}</td>
                <td>{{$fetchedData->task_date  }}</td>
                <td>{{$fetchedData->time_from  }}</td>
                <td>{{$fetchedData->time_to  }}</td>
                <td>

                    @if($fetchedData->task_date > Carbon::now('Africa/Cairo'))
                    <a href='{{ url('/delete/'.$fetchedData->id) }}' class='btn btn-danger m-r-1em'>Delete</a>
                    @endif


                </td>

            </tr>

            @endforeach

            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>