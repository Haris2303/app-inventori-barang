<?php

require_once '../services/stock.php';

function selectAllItems()
{
    global $connection;

    $sql = "SELECT items.id, items.name, items.price, items.description, stocks.total, categories.name as 'category_name'
            FROM items
            JOIN stocks ON items.stock_id = stocks.id
            JOIN categories ON items.category_id = categories.id";

    $result = $connection->query($sql);
    $connection->close();

    return $result;
}

function deleteItem($id)
{
    global $connection;

    $sql = "DELETE FROM categories WHERE id = $id";

    $result = $connection->query($sql);
    $connection->close();

    return $result;
}

function createItem($data)
{
    global $connection;

    $name = $data['name'];
    $description = $data['description'];
    $price = $data['price'];
    $stock = $data['stock'];
    $category_id = $data['category_id'];
    $user_id = $data['user_id'];

    try {
        $connection->autocommit(false);

        // insert stock
        $stock_id = createStock($stock);

        $sql = "INSERT INTO items VALUES(NULL, '$name', '$description', '$price', $stock_id, $category_id, $user_id, NOW(), NOW())";

        $result = $connection->query($sql);
        $connection->commit();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    $connection->close();

    return $result ?? null;
}
