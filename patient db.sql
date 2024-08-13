CREATE DATABASE IF NOT EXISTS patient;
drop table PatientInfo;
CREATE TABLE PatientInfo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_initial CHAR(1),
    gender ENUM('Male', 'Female') NOT NULL,
    dob_year numeric NOT NULL,
     dob_month numeric NOT NULL,
      dob_day numeric NOT NULL,
    age INT NOT NULL,
    age_type ENUM('Years', 'Months') NOT NULL,
    race ENUM('White', 'Black', 'Asian/Pacific Islander', 'Unknown', 'Other') NOT NULL,
    race_other VARCHAR(100),
    hispanic_latino ENUM('Yes', 'No', 'Unknown') NOT NULL,
    facility_name VARCHAR(100),
    facility_city VARCHAR(100),
    facility_county VARCHAR(100),
    facility_state VARCHAR(50),
    facility_phone VARCHAR(20),
    medical_record VARCHAR(50),
    present_facility_name VARCHAR(100),
    present_street VARCHAR(100),
    present_city VARCHAR(100),
    present_county VARCHAR(100),
    present_state VARCHAR(50)
);
select * from PatientInfo;
describe table PatientInfo;
