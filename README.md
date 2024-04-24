# Techsolv_assessment

# Setup the Table in the Database before running the index.html file as below
CREATE TABLE `contact_form` (
  `user_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `time_stamp` timestamp NOT NULL)

  # Now run the index.html file
