<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $sql = "SELECT * FROM requests WHERE name='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Request for " . $row["waste_type"] . " at " . $row["address"] . " is " . $row["status"];
        }
    } else {
        echo "No request found.";
    }

    $conn->close();
}
?>
