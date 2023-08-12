<?php
include_once("class.database.php");

if ($_GET['id'] == "1") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $column1 = $_POST["column1"];

        $sql = "INSERT INTO gms_eenheden_aanvullend (naam, value) VALUES ('$column1', '$column1')";

        if ($db->query($sql) === TRUE) {
            $response = array('status' => 'success', 'message' => 'New row added successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error adding row: ' . $db->error);
        }

        // Return the response as JSON
        echo json_encode($response);
    }
} else if ($_GET['id'] == "2") {
    $getSpecialisaties = $db->query("SELECT * FROM gms_eenheden_aanvullend");
    while ($fetchSpecialisaties = $getSpecialisaties->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='display:none'>" . $fetchSpecialisaties["id"] . "</td>";
        echo "<td><input type='text' name='column1' value='" . $fetchSpecialisaties["naam"] . "'></td>";
        echo "<td><button class='edit-button'>Edit</button></td>";
        echo "<td><a href='delete.php?id=" . $fetchSpecialisaties["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }
} else if ($_GET['id'] == "3") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $column1 = $_POST["column1"];
        $column2 = $_POST["column2"];

        $sql = "UPDATE gms_eenheden_aanvullend SET naam='$column1', value='$column1' WHERE id='$column2'";

        if ($db->query($sql) === TRUE) {
            $response = array('status' => 'success', 'message' => 'New row added successfully');
        } else {
            $response = array('status' => 'error', 'message' => 'Error adding row: ' . $db->error);
        }

        // Return the response as JSON
        echo json_encode($response);
    }
}
