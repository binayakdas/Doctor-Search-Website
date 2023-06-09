<?php

$search_param = $_POST["search"];
$search_area = $_POST["area"];

if( isset($_POST["search"]) && isset($_POST["area"]) ){

// Connect to Database
$host = "localhost";
$dbuser = "id20883511_doctordatabase";
$dbpass = "Abcd@1234";
$dbname = "id20883511_doctordatabase";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
    $sql = "SELECT ID, DoctorName, DoctorInformation, DoctorImage from Doctors 
    where DoctorArea like  '%".$search_area."%' and DoctorCategory like '%".$search_param."%'";

    $result = $conn->query($sql);

    if($result->num_rows>0){
        $data = '<div class="caption">Doctors found in your area</div>';
        $doctor_data = '<div class="maindiv"></div>';
        while($row = $result->fetch_assoc()){
            
            $doctorid = $row["ID"];
            $doctorname = $row["DoctorName"];
            $doctorinfo = $row["DoctorInformation"];
            $doctorimage = $row["DoctorImage"];

            $doctor_data = $doctor_data.'<div class="div1">
            <img class="div3-child" src="'.$doctorimage.'" /><img
                class="searchicon1"
            />
            <div class="largetext3">'.$doctorname.'</div>
            <div class="smalltext">
                <p class="discovering-a-doctor">
                '.$doctorinfo.'
                </p>
            </div>
            </div>'; 
        }
        $data = $data.$doctor_data;
    }
    else{
        $data = '<div class="caption">No Doctors found in your area</div>';
    }
}


else{
    $data = '<div class="caption">Bad Query</div>';
} 

echo $data;
?>
