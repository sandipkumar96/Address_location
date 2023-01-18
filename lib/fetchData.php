<?php
include "dbconfig.php";
    class LocationDetails {
        public function __construct($address){
            $this->address = $address;
        }

        // Fetch location details from OSM API
        public function fetchLocationDetails(){
            $address = $this->address;
            $return = array();
            $url = "https://nominatim.openstreetmap.org/search?format=json&limit=1&q=".$address;
            $data = $this->curlMethod($url);
            $result = json_decode($data, true);
            if(!empty($result)){
                $this->processLocation($result);
                $return['longitude'] = $result[0]['lon'];
                $return['latitude'] = $result[0]['lat'];
            }
            return $return;
        }

        // Curl Method for fetching data from API
        protected function curlMethod($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_USERAGENT,"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }

        // Check location details present in DB or not . If not then save into table
        public function processLocation($data){
            $con = new DBConfig();
            if(!empty($data)){
                $query = "SELECT id FROM location_details where place_id = '".$data[0]['place_id']."'";
                $add_check = $con->numRows($query);
                if($add_check == 0){
                    $sql = "INSERT into location_details (place_id, location_name, lon, lat, class, type) VALUES('".$data[0]['place_id']."','".$data[0]['display_name']."','".$data[0]['lon']."','".$data[0]['lat']."','".$data[0]['class']."','".$data[0]['type']."')";
                    $con->execute($sql);
                }
            }
        }

    }

    
    $address = strip_tags(addslashes($_POST['address']));
    if(!empty($address)){
        $loc_details = new LocationDetails($address);
        $fetch_data = $loc_details->fetchLocationDetails();
        if(!empty($fetch_data)){
            echo json_encode($fetch_data);
        }else{
            echo json_encode(array( 
                'status' => false,
                'message' => 'No Data Found!'
            ));
        }
    }else{
        echo json_encode(array( 
            'status' => false,
            'message' => 'Somethind went wrong!!'
        ));
    }

?>