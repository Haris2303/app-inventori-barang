<?php

require_once '../config/conn.php';

function selectStockById($id)
{
    global $connection;
    $sql = "SELECT * FROM stocks WHERE id = $id";
    $result = $connection->query($sql);
    return $result->fetch_assoc();
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
    $sql = "INSERT INTO stocks VALUES(NULL, '$stock', NOW(), NOW())";
    return $connection->query($sql) ? $connection->insert_id : 0;
}
