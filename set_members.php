<?php
include("configmembre.php");

$result = $conn->query("SELECT * FROM membres ORDER BY date_inscription DESC");
$members = [];

while ($row = $result->fetch_assoc()) {
    $members[] = $row;
}

echo json_encode($members);
?>
