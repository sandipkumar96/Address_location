<?php
include "dbconfig.php";
class LocationData{
    //Fetch all location data from table
    public function fetchLocations(){
        $con = new DBConfig();
        $return = array();
        $query = "SELECT * FROM location_details";
        $result = $con->queryAll($query);
        $data_count = $con->numRows($query);
        if(!empty($result)){
            $return = $result;
        }
        return $return;
    }

}


?>