<?php

try {
    $host = '127.0.0.1';
    $port = '3306';
    $username = 'root';
    $password = 'zuniga2026';
    $database = 'etc_vallenas';

    // Conectar sin especificar base de datos
    $pdo = new PDO("mysql:host=$host;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la base de datos si no existe
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "✓ Base de datos '$database' creada exitosamente o ya existe.\n";

    // Verificar conexión a la base de datos
    $pdo->exec("USE `$database`");
    echo "✓ Conexión a la base de datos '$database' exitosa.\n";
} catch (PDOException $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    exit(1);
}
