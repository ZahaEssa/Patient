<?php
require_once "../connections/connect.php";

if (isset($_POST["submit"])) {
    $con->begin_transaction();
    try {
        $facilityId = null;
        $presentFacilityId = null;
        if (!empty($_POST["facility-name"]) || !empty($_POST["facility-city"]) || !empty($_POST["facility-state"]) || !empty($_POST["facility-phone"]) || !empty($_POST["medical-record"])) {
            $stmtFacility = $con->prepare("INSERT INTO facility (facility_name, facility_city, facility_county, facility_state, facility_phone, medical_record) VALUES (?, ?, ?, ?, ?, ?)");
            $stmtFacility->bind_param("ssssss", 
                $_POST["facility-name"],
                $_POST["facility-city"],
                $_POST["facility-county"],
                $_POST["facility-state"],
                $_POST["facility-phone"],
                $_POST["medical-record"]
            );
            if (!$stmtFacility->execute()) {
                throw new Exception("Failed to insert into facility: " . $stmtFacility->error);
            }
            $facilityId = $con->insert_id;
        }

        if (!empty($_POST["present-facility-name"]) || !empty($_POST["present-street"]) || !empty($_POST["present-city"]) || !empty($_POST["present-state"])) {
            $stmtPresentFacility = $con->prepare("INSERT INTO presentfacility (present_facility_name, present_street, present_city, present_county, present_state) VALUES (?, ?, ?, ?, ?)");
            $stmtPresentFacility->bind_param("sssss", 
                $_POST["present-facility-name"],
                $_POST["present-street"],
                $_POST["present-city"],
                $_POST["present-county"],
                $_POST["present-state"]
            );
            if (!$stmtPresentFacility->execute()) {
                throw new Exception("Failed to insert into presentfacility: " . $stmtPresentFacility->error);
            }
            $presentFacilityId = $con->insert_id;
        }
        $lastName = ucfirst(strtolower($_POST["last-name"]));
        $firstName = ucfirst(strtolower($_POST["first-name"]));
        $middleInitial = strtoupper($_POST["middle-initial"]);
        $gender = $_POST["gender"];
        $dobYear = intval($_POST["dob-year"]);
        $dobMonth = intval($_POST["dob-month"]);
        $dobDay = intval($_POST["dob-day"]);
        $age = intval($_POST["age"]);
        $ageType = $_POST["age-type"];
        $race = $_POST["race"];
        $raceOther = $_POST["race-other"];
        $hispanicLatino = $_POST["hispanic-latino"];
       
        
        $stmtPatient = $con->prepare("INSERT INTO PatientInfo (last_name, first_name, middle_initial, gender, dob_year, dob_month, dob_day, age, age_type, race, race_other, hispanic_latino, facility_id, present_facility_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmtPatient->bind_param("ssssiiisssssii", 
            $lastName, $firstName, $middleInitial, $gender, $dobYear, $dobMonth, $dobDay, 
            $age, $ageType, $race, $raceOther, $hispanicLatino, $facilityId, $presentFacilityId
        )) {
            throw new Exception("Binding parameters failed: " . $stmtPatient->error);
        }
        if (!$stmtPatient->execute()) {
            throw new Exception("Failed to insert into PatientInfo: " . $stmtPatient->error);
        }
        $con->commit();

        echo '<script>
            alert("Insertion successful");
            window.location.href = "../index.php";
        </script>';
    } catch (Exception $e) {
        $con->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
