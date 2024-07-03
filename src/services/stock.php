<?php

require_once '../config/conn.php';

function selectAllStock()
{
    global $connection;
    $sql = "SELECT * FROM categories";
    return $connection->query($sql);
}

function deleteStock($id)
{
    global $connection;
    $sql = "DELETE FROM categories WHERE id = $id";
    return $connection->query($sql);
}

function createStock($stock): int
{
    global $connection;
    $sql = "INSERT INTO stock VALUES(NULL, '$stock', NOW(), NOW())";
    return $connection->query($sql) ? $connection->insert_id : 0;
}
