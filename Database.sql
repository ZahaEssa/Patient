CREATE DATABASE IF NOT EXISTS patient;
drop database patient;
drop table PatientInfo;
CREATE TABLE PatientInfo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    last_name VARCHAR(50) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    middle_initial CHAR(1),
    gender ENUM('Male', 'Female') NOT NULL, 
    dob_year INT NOT NULL,
    dob_month INT NOT NULL,
    dob_day INT NOT NULL,
    age INT NOT NULL,
    age_type VARCHAR (10) NOT NULL,
   race ENUM('White', 'Black', 'Asian/Pacific Islander', 'Unknown', 'Other') NOT NULL,
    race_other VARCHAR(100),
    hispanic_latino ENUM('Yes', 'No', 'Unknown') NOT NULL,
    facility_id INT,
    present_facility_id INT,
    FOREIGN KEY (facility_id) REFERENCES facility(id),
    FOREIGN KEY (present_facility_id) REFERENCES presentfacility(id)
);
ALTER TABLE PatientInfo
MODIFY age_type ENUM('Years', 'Months') NOT NULL;
select * from PatientInfo;

CREATE TABLE facility (
    id INT AUTO_INCREMENT PRIMARY KEY,
    facility_name VARCHAR(100),
    facility_city VARCHAR(100),
    facility_county VARCHAR(100),
    facility_state VARCHAR(50),
    facility_phone VARCHAR(20),
    medical_record VARCHAR(50)
);
select * from facility;
CREATE TABLE presentfacility (
    id INT AUTO_INCREMENT PRIMARY KEY,
    present_facility_name VARCHAR(100),
    present_street VARCHAR(100),
    present_city VARCHAR(100),
    present_county VARCHAR(100),
    present_state VARCHAR(50)
);

select * from presentfacility;







