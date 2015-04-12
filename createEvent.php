<?php
$servername = "sql3.freemysqlhosting.net";
$username = "sql373806";
$password = "tP4*vK2*";
$dbname = "sql373806";

$name=$_POST["name"];
$description=$_POST["description"];
$date=$_POST["date"];
$time=$_POST["time"];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($time=="beforeSchool") {
	$time=420;
}
else if ($time=="910LunchA") {
	$time=681;
}
else if ($time=="910LunchB") {
	$time=653;
}
else if ($time=="1112LunchA") {
	$time=735;
}
else if ($time=="1112LunchB") {
	$time=747;
}
else if ($time=="advisory") {
	$time=781;
}
else if ($time=="seminar") {
	$time=835;
}
else if ($time=="afterSchool") {
	$time=880;
}

$sql = "INSERT INTO Events (name, description, date, time)
VALUES ('$name', '$description', '$date', '$time')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>