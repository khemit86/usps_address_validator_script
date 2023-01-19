INSTALLATION STEPS

#Install Xampp on local computer

#Create database "usps_address" in the mysql(xampp) url: http://localhost/phpmyadmin

#Import the database "usps_address.sql"

#Create the folder "usps_code" in the location example: "E:\xampp\htdocs" and move the all code files inside the folder

#Update the database connection from file "db_connection.php"
$conn = new mysqli("localhost","root","","usps_address");
hostname: localhost
usrname:root
password:""
database name : "usps_address"

#Now run the url on browser: http://localhost/usps_code/


