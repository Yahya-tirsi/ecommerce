<?php
try {
    $pdo = new PDO("mysql:host=localhost; dbname=ecomerce; port=3307","root",'');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}