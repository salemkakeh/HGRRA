
<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// فحص الاتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$offset = 0; // بداية الجلب
$limit = 10; // عدد السجلات التي تريد جلبها

$sql = "SELECT id, firstname, lastname FROM MyGuests LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // طباعة البيانات لكل سجل
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>