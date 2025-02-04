<?php
    require_once 'dbCon.php';
    $transID = $_POST['transID'];
    $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE transID = ?");
    $stmt->bind_param("s", $transID);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    echo json_encode($items);
    $stmt->close();
    $conn->close();