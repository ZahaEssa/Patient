<?php
require_once "../connections/connect.php";

if (isset($_POST["submit"])) {

    $lastName = ucfirst(strtolower($_POST["last-name"]));
    $firstName = ucfirst(strtolower($_POST["first-name"]));
    $middleInitial = strtoupper($_POST["middle-initial"]);
    $gender = $_POST["gender"];
    $dobYear = intval($_POST["dob-year"]);
    $dobMonth = intval($_POST["dob-month"]);
    $dobDay = intval($_POST["dob-day"]);
    $age = intval($_POST["age"]);
    $ageType = $_POST["age-type"];
    $race = isset($_POST["race"]);
    $raceOther = $_POST["race-other"];
    $hispanicLatino = $_POST["hispanic-latino"];
    $facilityName = $_POST["facility-name"];
    $facilityCity = $_POST["facility-city"];
    $facilityCounty = $_POST["facility-county"];
    $facilityState = $_POST["facility-state"];
    $facilityPhone = $_POST["facility-phone"];
    $medicalRecord = $_POST["medical-record"];
    $presentFacilityName = $_POST["present-facility-name"];
    $presentStreet = $_POST["present-street"];
    $presentCity = $_POST["present-city"];
    $presentCounty = $_POST["present-county"];
    $presentState = $_POST["present-state"];



    $stmt = $con->prepare("INSERT INTO PatientInfo (
        last_name, first_name, middle_initial, gender, dob_year, dob_month, dob_day, age, age_type, race, race_other, hispanic_latino, 
        facility_name, facility_city, facility_county, facility_state, facility_phone, medical_record, 
        present_facility_name, present_street, present_city, present_county, present_state
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)");


    if (!$stmt) {
        die("Prepare failed: " . $con->error);
    }

    if (!$stmt->bind_param(
        "ssssiiissssssssssssssss",
        $lastName, $firstName, $middleInitial, $gender, $dobYear, $dobMonth, $dobDay, $age, $ageType, $race, $raceOther, $hispanicLatino,
        $facilityName, $facilityCity, $facilityCounty, $facilityState, $facilityPhone, $medicalRecord,
        $presentFacilityName, $presentStreet, $presentCity, $presentCounty, $presentState
    )) {
        die("Bind parameters failed: " . $stmt->error);
    }

    
    if ($stmt->execute()) {
      
        echo '<script>
            alert("Insertion successful");
            window.location.href = "../index.php";
        </script>';
    } else {
        echo "Error: " . $stmt->error;
    }
}  
?>
