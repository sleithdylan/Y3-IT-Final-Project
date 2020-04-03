-- Drop database if exists

-- DROP DATABASE IF EXISTS studenthired;

-- Create database

-- CREATE DATABASE studenthired CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Use database

-- USE studenthired;

-- Table Students

DROP TABLE IF EXISTS Students;
CREATE TABLE IF NOT EXISTS Students (
  student_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  student_fullname VARCHAR(255) NULL DEFAULT NULL,
  student_email VARCHAR(255) NULL DEFAULT NULL,
  student_password VARCHAR(255) NULL DEFAULT NULL,
  student_phone INT(10) ZEROFILL NULL,
  student_location VARCHAR(255) NULL,
  student_bio TEXT NULL,
  student_skills VARCHAR(255) NULL,
  student_github VARCHAR(255) NULL,
  student_linkedin VARCHAR(255) NULL,
  student_college VARCHAR(255) NULL,
  student_course VARCHAR(255) NULL,
  student_picture VARCHAR(255) DEFAULT 'blank-profile-picture.png',
PRIMARY KEY (student_id));

-- Data for Students

INSERT INTO Students (student_id, student_fullname, student_email, student_password, student_phone, student_location, student_bio, student_skills, student_github, student_linkedin, student_college, student_course, student_picture) VALUES
(1, 'Glen Rouse', 'glen.rouse@gmail.com', 'Test', 0871234567, 'Co. Galway', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quis dolorem obcaecati? Nihil possimus veritatis aliquid cupiditate ducimus ratione laudantium ex earum quo porro ad, perferendis tempore cum! Eligendi eos porro voluptates at laborum, fugit, minus, fuga autem recusandae beatae possimus dolorum! Excepturi vel placeat, nam fuga possimus obcaecati animi consequatur rerum! Eius voluptates asperiores veniam commodi reiciendis quos ut officia, aliquid eveniet eaque odit explicabo voluptatum, error, hic ullam cum facilis deserunt nemo consequatur!', 'HTML, CSS/Sass, Javascript, PHP, SQL, NPM, Git', 'github.com/glenr20', 'linkedin.com/in/glenrouse', 'GMIT GALWAY', 'Level 8 (Honours) in Computing and Digital Media', 'blank-profile-picture.png');

-- Table Employers

DROP TABLE IF EXISTS Employers;
CREATE TABLE IF NOT EXISTS Employers (
  employer_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  employer_fullname VARCHAR(255) NOT NULL,
  employer_email VARCHAR(255) NOT NULL,
  employer_password VARCHAR(255) NOT NULL,
PRIMARY KEY (employer_id));

-- Data for Employers

INSERT INTO Employers (employer_id, employer_fullname, employer_email, employer_password) VALUES
(1, 'Lara Thayer', 'larat90@gmail.com', 'Test');

-- Table Jobs

DROP TABLE IF EXISTS Jobs;
CREATE TABLE IF NOT EXISTS Jobs (
  job_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  job_title VARCHAR(255) NOT NULL,
  job_company VARCHAR(255) NOT NULL,
  job_location VARCHAR(255) NOT NULL,
  job_other_details TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  created_by VARCHAR(255),
PRIMARY KEY (job_id));

-- Data for Jobs

INSERT INTO Jobs (job_id, job_title, job_company, job_location, job_other_details, created_at, created_by) VALUES
(1, 'Lead Software Engineer', 'Google', 'Dublin', 'Neque convallis a cras semper auctor neque vitae tempus quam. Tortor pretium viverra suspendisse potenti nullam ac. Eget nunc lobortis mattis aliquam faucibus purus in massa. Aliquet nibh praesent tristique magna. Tempor nec feugiat nisl pretium fusce id. Dignissim enim sit amet venenatis urna cursus. Dignissim convallis aenean et tortor at risus viverra adipiscing at. Vel elit scelerisque mauris pellentesque pulvinar. Sodales ut etiam sit amet nisl purus in. Cras adipiscing enim eu turpis egestas.', '2020-01-01', 'larat90@gmail.com'),
(2, 'Senior Manager', 'Apple', 'Dublin', 'Egestas fringilla phasellus faucibus scelerisque eleifend. Arcu vitae elementum curabitur vitae nunc sed velit. Integer enim neque volutpat ac tincidunt vitae semper quis. Donec adipiscing tristique risus nec. Pellentesque habitant morbi tristique senectus et netus et malesuada. Non nisi est sit amet facilisis magna. A pellentesque sit amet porttitor eget dolor morbi. Suspendisse potenti nullam ac tortor. Amet nulla facilisi morbi tempus iaculis urna id volutpat.', '2020-02-04', 'larat90@gmail.com'),
(3, 'Marketing Specialist', 'HP', 'Galway', 'Ultricies mi eget mauris pharetra et ultrices. Condimentum vitae sapien pellentesque habitant morbi. Tincidunt nunc pulvinar sapien et ligula. Et malesuada fames ac turpis egestas sed. Tempor nec feugiat nisl pretium fusce id velit ut. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Fermentum leo vel orci porta.', '2019-06-10', 'larat90@gmail.com');