CREATE TABLE FamilyHead (
  family_head_id VARCHAR(9) NOT NULL PRIMARY KEY,
  date_of_interview DATE NOT NULL,
  purok VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  middle_name VARCHAR(100),
  address VARCHAR(200) NOT NULL,
  occupation VARCHAR(100),
  educational VARCHAR(100),
  philhealth_number VARCHAR(11),
  family_dependencies VARCHAR(100),
  contact_number VARCHAR(11) NOT NULL,
  email VARCHAR(50),
  birthdate DATE NOT NULL,
  age INT NOT NULL,
  civil_status VARCHAR(50) NOT NULL,
  first_vac VARCHAR(50),
  second_vac VARCHAR(50),
  other_vac VARCHAR(50),
  date_given DATE,
  family_planning_method VARCHAR(200),
  remarks VARCHAR(200),
  interviewer VARCHAR(100) NOT NULL
);

CREATE TABLE Spouse (
  spouse_ID VARCHAR(8) NOT NULL PRIMARY KEY,
  family_head_id VARCHAR(9),
  last_name VARCHAR(100) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  middle_name VARCHAR(100),
  address VARCHAR(200) NOT NULL,
  occupation VARCHAR(100),
  educational VARCHAR(100),
  birthdate DATE NOT NULL,
  age INT NOT NULL,
  civil_status VARCHAR(50) NOT NULL,
  first_vac VARCHAR(50),
  second_vac VARCHAR(50),
  other_vac VARCHAR(50),
  date_given DATE,
  FOREIGN KEY (family_head_id) REFERENCES FamilyHead(family_head_id) ON DELETE SET NULL
);

CREATE TABLE FamilyMember (
  family_member_id VARCHAR(9) NOT NULL PRIMARY KEY,
  family_head_id VARCHAR(9),
  last_name VARCHAR(100) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  middle_name VARCHAR(100),
  sex VARCHAR(6) NOT NULL,
  relationship VARCHAR(100) NOT NULL,
  birthdate DATE NOT NULL,
  age INT NOT NULL,
  place_of_birth VARCHAR(50),
  in_school VARCHAR(50),
  out_school VARCHAR(50),
  occupation VARCHAR(50),
  medical_history VARCHAR(50),
  vaccine_history VARCHAR(50),
  FOREIGN KEY (family_head_id) REFERENCES FamilyHead(family_head_id) ON DELETE SET NULL
);

CREATE TABLE FamilyInfo (
  family_info_id VARCHAR(9) NOT NULL PRIMARY KEY,
  family_head_id VARCHAR(9),
  family_medical_history VARCHAR(100),
  house_structure VARCHAR(100) NOT NULL,
  residential_status VARCHAR(100) NOT NULL,
  water_supply VARCHAR(100) NOT NULL,
  electricity VARCHAR(100) NOT NULL,
  FOREIGN KEY (family_head_id) REFERENCES FamilyHead(family_head_id) ON DELETE SET NULL
);

CREATE TABLE PreNatal (
  prenatal_id VARCHAR(9) NOT NULL PRIMARY KEY,
  family_head_id VARCHAR(9),
  LMP VARCHAR(100),
  AOG VARCHAR(100),
  birth_plan VARCHAR(100),
  follow_up VARCHAR(100),
  first_term DATE,
  second_term DATE,
  td_1 VARCHAR(100),
  td_2 VARCHAR(100),
  td_3 VARCHAR(100),
  FOREIGN KEY (family_head_id) REFERENCES FamilyHead(family_head_id) ON DELETE SET NULL
);

CREATE TABLE PostPartum (
  post_partum_id VARCHAR(9) NOT NULL PRIMARY KEY,
  family_head_id VARCHAR(9),
  date_delivery DATE,
  place_of_delivery VARCHAR(100),
  kind_of_delivery VARCHAR(100),
  time_of_delivery TIME,
  gender_of_child VARCHAR(100),
  weight_of_child DECIMAL(10, 2),
  height_of_child VARCHAR(10),
  new_born_screening VARCHAR(50),
  no_of_child INT,
  tetanus_toxoid_given VARCHAR(50),
  breast_feeding VARCHAR(50),
  FOREIGN KEY (family_head_id) REFERENCES FamilyHead(family_head_id) ON DELETE SET NULL
);

CREATE TABLE ChildImmunization (
  child_immunization_id VARCHAR(9) NOT NULL PRIMARY KEY,
  family_head_id VARCHAR(9),
  date DATE,
  name_of_child VARCHAR(100),
  hepa_B VARCHAR(100),
  penta_1 VARCHAR(100),
  penta_2 VARCHAR(100),
  penta_3 VARCHAR(100),
  pcv_13_1 VARCHAR(100),
  pcv_13_2 VARCHAR(100),
  pcv_13_3 VARCHAR(100),
  opv_1 VARCHAR(100),
  opv_2 VARCHAR(100),
  opv_3 VARCHAR(100),
  ipv_1 VARCHAR(100),
  ipv_2 VARCHAR(100),
  ipv_3 VARCHAR(100),
  mmr_1 VARCHAR(100),
  mmr_2 VARCHAR(100),
  other_vac VARCHAR(100),
  FOREIGN KEY (family_head_id) REFERENCES FamilyHead(family_head_id) ON DELETE SET NULL
);

INSERT INTO FamilyHead (family_head_id, date_of_interview, purok, last_name, first_name, middle_name, address, occupation, educational, philhealth_number, family_dependencies, contact_number, email, birthdate, age, civil_status, first_vac, second_vac, other_vac, date_given, family_planning_method, remarks, interviewer) 
VALUES ("FH-000001", "2024-01-02", "Purok 1 Sonrisa", "Ferrer", "Mark Ernest", "Ases", "Bili Camella Sonrisa, F. Manalo St., San Nicolas, Pasig City", "Nurse", "College Graduate", "01057228181", "Dependent", "", "", "1988-03-25", 35, "Married", "SINOVAC", "SINOVAC", "", NULL, "Family Planning DMPA", "Husband - Not voter in San Nicolas. Wife - Voter in San Nicolas", "Charisma R. Limen");

INSERT INTO Spouse (spouse_ID, family_head_id, last_name, first_name, middle_name, address, occupation, educational, birthdate, age, civil_status, first_vac, second_vac, other_vac, date_given) 
VALUES ("S-000001", "FH-000001", "Ferrer", "Preciouse", "Begornia", "Bili Camella Sonrisa, F. Manalo St., San Nicolas, Pasig City", "Nurse", "College Graduate", "1987-09-25", 36, "Married", "SINOVAC", "SINOVAC", "Flu Vaccine", "2024-01-02");

INSERT INTO FamilyMember (family_member_id, family_head_id, last_name, first_name, middle_name, sex, relationship, birthdate, age, place_of_birth, in_school, out_school, occupation, medical_history, vaccine_history) 
VALUES ("FM-000001", "FH-000001", "Ferrer", "Rai Margarette", "Ferrer", "F", "Daughter", "2013-10-16", 10, "PCGH Pasig", "Private", "", "Student", "", "pfizer"),
       ("FM-000002", "FH-000001", "Ferrer", "Marthena Ysabelle", "Ferrer", "F", "Daughter", "2019-06-12", 4, "PCGH Pasig", "Private", "", "Student", "", "moderna");

INSERT INTO FamilyInfo (family_info_id, family_head_id, family_medical_history, house_structure, residential_status, water_supply, electricity) 
VALUES ("FI-000001", "FH-000001", "Mataas na Presyon", "Stone", "Own", "Piped", "Available");

INSERT INTO PreNatal (prenatal_id, family_head_id, LMP, AOG, birth_plan, follow_up, first_term, second_term, td_1, td_2, td_3) 
VALUES ("PN-000001", "FH-000001", "", "", "", "", NULL, NULL, "", "", "");

INSERT INTO PostPartum (post_partum_id, family_head_id, date_delivery, place_of_delivery, kind_of_delivery, time_of_delivery, gender_of_child, weight_of_child, height_of_child, new_born_screening, no_of_child, tetanus_toxoid_given, breast_feeding) 
VALUES ("PP-000001", "FH-000001", NULL, "", "", NULL, "", NULL, "", "", NULL, "", "");

INSERT INTO ChildImmunization (child_immunization_id, family_head_id, date, name_of_child, hepa_B, penta_1, penta_2, penta_3, pcv_13_1, pcv_13_2, pcv_13_3, opv_1, opv_2, opv_3, ipv_1, ipv_2, ipv_3, mmr_1, mmr_2, other_vac) 
VALUES ("CI-000001", "FH-000001", NULL, "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "", "");

