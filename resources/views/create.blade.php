
<?php 
use Carbon\Carbon;
use Carbon\CarbonPeriod;
$period = CarbonPeriod::create(Carbon::now('Africa/Cairo'), Carbon::now('Africa/Cairo')->addMonth());

// Iterate over the period

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add To Do</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Create To Do</h2>
  

  
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{ session()->get('Message') }}


  <form method="post" action="{{  url('/addTask') }}"  enctype ="multipart/form-data">

  

    <input type="hidden" name = '_token'  value = '<?php echo csrf_token();?>'>
    <input type="hidden" name = 'user_id'  value = '<?php echo auth()->user()->id;?>'>

  <div class="form-group">
    <label for="exampleInputEmail1">Date</label>
    <select class="form-control" name="task_date"  id="exampleFormControlSelect1">
        <?php 
        foreach ($period as $date) {

        
        echo '<option value="' . $date->format('Y-m-d') . '" >' . $date->format('Y-m-d') . '</option>';
     } ?>
      </select>
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">From</label>
    <input type="time" name="time_from"  value="{{ old('from') }}"   class="form-control" id="exampleInputEmail1" placeholder="Enter From Date">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">To</label>
    <input type="time" name="time_to"   value="{{ old('to') }}"   class="form-control" id="exampleInputEmail1" placeholder="Enter To">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input type="text" name="task_title"   value="{{ old('title') }}"   class="form-control" id="exampleInputEmail1" placeholder="Enter title">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="task_desc" rows="4">
        {{ old('phone') }}
        </textarea>
  </div>


  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>



</body>
</html>

