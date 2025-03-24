<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE requests SET status='$status' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color: green; text-align: center;'>Status updated successfully!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $conn->error . "</p>";
    }
}

$sql = "SELECT * FROM requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        body {
            background-color: #f0f9f0;
            color: #333;
            text-align: center;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            color: #2d6a4f;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            color: #333;
            margin: 10px 0;
            font-weight: bold;
        }

        form {
            background: white;
            width: 80%;
            max-width: 400px;
            margin: 10px auto;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #2d6a4f;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #2d6a4f;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #40916c;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            form {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h2>Manage Requests</h2>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <p><?php echo $row["name"] . " - " . $row["status"]; ?></p>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
            <button type="submit">Update</button>
        </form>
    <?php } ?>
</body>
</html>

<?php $conn->close(); ?>
