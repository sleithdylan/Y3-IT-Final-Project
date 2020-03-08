-- Table students

CREATE TABLE IF NOT EXISTS students (
  student_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  student_fullname VARCHAR(255) NOT NULL,
  student_email VARCHAR(255) NOT NULL,
  student_password VARCHAR(255) NOT NULL,
  student_phone INT(10) NULL,
  student_location VARCHAR(255) NULL,
  student_bio TEXT NULL,
  student_github VARCHAR(255) NULL,
  student_linkedin VARCHAR(255) NULL,
PRIMARY KEY (student_id));

-- Data for students

INSERT INTO students (student_id, student_fullname, student_email, student_password, student_phone, student_location, student_bio, student_github, student_linkedin) VALUES
(1, 'Glen Rouse', 'glen.rouse@gmail.com', 'Test', 0871234567, 'Co. Galway', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum quis dolorem obcaecati? Nihil possimus veritatis aliquid cupiditate ducimus ratione laudantium ex earum quo porro ad, perferendis tempore cum! Eligendi eos porro voluptates at laborum, fugit, minus, fuga autem recusandae beatae possimus dolorum! Excepturi vel placeat, nam fuga possimus obcaecati animi consequatur rerum! Eius voluptates asperiores veniam commodi reiciendis quos ut officia, aliquid eveniet eaque odit explicabo voluptatum, error, hic ullam cum facilis deserunt nemo consequatur!', 'github.com/glenr20', 'linkedin.com/in/glenrouse');

-- Table employers

CREATE TABLE IF NOT EXISTS employers (
  employer_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  employer_fullname VARCHAR(255) NOT NULL,
  employer_email VARCHAR(255) NOT NULL,
  employer_password VARCHAR(255) NOT NULL,
PRIMARY KEY (employer_id));

-- Data for employers

INSERT INTO employers (employer_id, employer_fullname, employer_email, employer_password) VALUES
(1, 'Lara Thayer', 'larat90@gmail.com', 'Test');

-- Table jobs

CREATE TABLE IF NOT EXISTS jobs (
  job_id SMALLINT(3) NOT NULL AUTO_INCREMENT,
  job_title VARCHAR(255) NOT NULL,
  job_company VARCHAR(255) NOT NULL,
  job_location VARCHAR(255) NOT NULL,
  job_other_details TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (job_id));

-- Data for jobs

INSERT INTO jobs (job_id, job_title, job_company, job_location, job_other_details, created_at) VALUES
(1, 'Lead Software Engineer', 'Google', 'Dublin', 'Neque convallis a cras semper auctor neque vitae tempus quam. Tortor pretium viverra suspendisse potenti nullam ac. Eget nunc lobortis mattis aliquam faucibus purus in massa. Aliquet nibh praesent tristique magna. Tempor nec feugiat nisl pretium fusce id. Dignissim enim sit amet venenatis urna cursus. Dignissim convallis aenean et tortor at risus viverra adipiscing at. Vel elit scelerisque mauris pellentesque pulvinar. Sodales ut etiam sit amet nisl purus in. Cras adipiscing enim eu turpis egestas.', '2020-01-01'),
(2, 'Senior Manager', 'Apple', 'Dublin', 'Egestas fringilla phasellus faucibus scelerisque eleifend. Arcu vitae elementum curabitur vitae nunc sed velit. Integer enim neque volutpat ac tincidunt vitae semper quis. Donec adipiscing tristique risus nec. Pellentesque habitant morbi tristique senectus et netus et malesuada. Non nisi est sit amet facilisis magna. A pellentesque sit amet porttitor eget dolor morbi. Suspendisse potenti nullam ac tortor. Amet nulla facilisi morbi tempus iaculis urna id volutpat.', '2020-02-04'),
(3, 'Marketing Specialist', 'HP', 'Galway', 'Ultricies mi eget mauris pharetra et ultrices. Condimentum vitae sapien pellentesque habitant morbi. Tincidunt nunc pulvinar sapien et ligula. Et malesuada fames ac turpis egestas sed. Tempor nec feugiat nisl pretium fusce id velit ut. Eu lobortis elementum nibh tellus molestie nunc non blandit massa. Fermentum leo vel orci porta.', '2019-06-10');