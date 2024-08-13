<?php
require_once "connections/connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Patient Identifying Information Form</title>
</head>
<body>
<form action="processes/registration.php" method="POST" autocomplete="off">
    <h2>1. Patient Identifying Information</h2>
    
    <div class="form-group">
        <h2>Name</h2>
        <label for="last-name">Last Name</label>
        <input type="text" id="last-name" name="last-name" class="form-input">
        <label for="first-name">First Name</label>
        <input type="text" id="first-name" name="first-name" class="form-input">
        <label for="middle-initial">Middle Name Initial</label>
        <input type="text" id="middle-initial" name="middle-initial" class="form-input">
    </div>

    <div class="form-group">
        <h2>Gender</h2>
        <div class="radio-group">
            <label><input type="radio" name="gender" value="Male"> Male</label>
            <label><input type="radio" name="gender" value="Female"> Female</label>
        </div>
    </div>

    <div class="form-group">
    <h2>Date of Birth</h2>
    <label for="dob-year">Year</label>
    <input type="number" id="dob-year" name="dob-year" class="form-input" placeholder="YYYY" min="1900" max="2099" step="1">

    <label for="dob-month">Month</label>
    <input type="number" id="dob-month" name="dob-month" class="form-input" placeholder="MM" min="1" max="12" step="1">

    <label for="dob-day">Day</label>
    <input type="number" id="dob-day" name="dob-day" class="form-input" placeholder="DD" min="1" max="31" step="1">
</div>
    <div class="form-group">
        <h2>Age</h2>
        <label for="age">Age</label>
        <input type="number" id="age" name="age" class="form-input" min="0">
        <div class="radio-group">
            <label><input type="radio" name="age-type" value="Years"> Years</label>
            <label><input type="radio" name="age-type" value="Months"> Months</label>
        </div>
    </div>

    <div class="form-group">
        <h2>Race</h2>
        <div class="checkbox-group">
            <label><input type="radio" name="race" value="White"> White</label>
            <label><input type="radio" name="race" value="Black"> Black</label>
            <label><input type="radio" name="race" value="Asian/Pacific Islander"> Asian/Pacific Islander</label>
            <label><input type="radio" name="race" value="Unknown"> Unknown</label>
            <label><input type="radio" name="race" value="Other"> Other</label>
            <input type="text" name="race-other" class="form-input" placeholder="Please specify if other">
        </div>
    </div>

    <div class="form-group">
        <h2>Hispanic or Latino</h2>
        <div class="radio-group">
            <label><input type="radio" name="hispanic-latino" value="yes"> Yes</label>
            <label><input type="radio" name="hispanic-latino" value="no"> No</label>
            <label><input type="radio" name="hispanic-latino" value="unknown"> Unknown</label>
        </div>
    </div>

    <div class="form-group">
        <h2>Facility (If Hospitalized)</h2>
        <label for="facility-name">Name</label>
        <input type="text" id="facility-name" name="facility-name" class="form-input">
        <label for="facility-city">City</label>
        <input type="text" id="facility-city" name="facility-city" class="form-input">
        <label for="facility-county">County</label>
        <input type="text" id="facility-county" name="facility-county" class="form-input">
        <label for="facility-state">State</label>
        <input type="text" id="facility-state" name="facility-state" class="form-input">
        <label for="facility-phone">Phone Number</label>
        <input type="tel" id="facility-phone" name="facility-phone" class="form-input">
        <label for="medical-record">Medical Record</label>
        <input type="text" id="medical-record" name="medical-record" class="form-input">
    </div>

    <div class="form-group">
        <h2>Present Address</h2>
        <label for="present-facility-name">Facility Name (If Applicable)</label>
        <input type="text" id="present-facility-name" name="present-facility-name" class="form-input">
        <label for="present-street">Street</label>
        <input type="text" id="present-street" name="present-street" class="form-input">
        <label for="present-city">City</label>
        <input type="text" id="present-city" name="present-city" class="form-input">
        <label for="present-county">County</label>
        <input type="text" id="present-county" name="present-county" class="form-input">
        <label for="present-state">State</label>
        <input type="text" id="present-state" name="present-state" class="form-input">
    </div>
    <input type="submit" name="submit" value="Insert New Patient" class="button-submit">
</form>
</body>
</html>
