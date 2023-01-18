<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Address Latitude and Longitude</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        #loader,#main_div,#map {
            margin:10px;
        }
        #loader {
            display:none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="location.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="locationList.php">Location List</a>
      </li>
    </ul>
  </div>
</nav>
    <div class="col-md-12 row " id="main_div">
        <label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg"> Enter Address</label>
        <input type="text" class="form-control col-md-4" id="address"  placeholder="Enter Address">
        <button id="add_btn" class="col-md-2" style="margin-left: 10px;opacity:5px;">Click Here</button>
    </div>
    <br>
    <div id="loader"></div>
    <div id="result" class="col-md-12 row "style="margin:10px;display:none;">
        <div class="col-md-2 row ">Longitude :  <span id="lon"></span></div>
        <div class="col-md-2 row">Latitude :  <span id="lat"></span></div>
    </div>
    <br>
    <div id="map">
        <iframe id="location_map" width="80%" height="500" src="" frameborder="0"></iframe>
    </div>
    
    <script src="assets/jquery.js"></script>
    <script src="assets/scripts.js"></script>
</body>
</html>