<?php
    include "lib/LocationData.php";
    $data = new LocationData();
    $location_lists = $data->fetchLocations();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Address Latitude and Longitude</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="location.php">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="locationList.php">Location List <span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
    </nav>
    <?php if(!empty($location_lists)){
        foreach($location_lists as $value){    
    ?>
    <div class="card" style="margin:10px;">
        <h5 class="card-header"><?php echo $value['location_name'];?></h5>
        <div class="card-body">
            <input type="hidden" name="location_name" class="location_name" value="<?php echo $value['location_name'];?>">
            <input type="hidden" name="location_src" class="location_src" value="https://maps.google.com/maps?q=<?php echo $value['location_name'];?>&output=embed">
            <h5 class="card-title">Place ID : <?php echo $value['place_id'];?></h5>
            <p class="card-text">Longitude : <?php echo $value['lon'];?> , Latitude : <?php echo $value['lat'];?> , Class : <?php echo $value['class'];?> , Type : <?php echo $value['type'];?></p>
            <button type="button" class="btn btn-primary locations">View Map</button>
        </div>
    </div>

    <?php } }?>
    <div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="location_map" width="100%" height="500" src="" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <script src="assets/scripts.js"></script>
</body>
</html>