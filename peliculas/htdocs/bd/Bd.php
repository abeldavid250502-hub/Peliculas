<?php

class Bd {
    private static ?PDO $pdo = null;

    static function pdo(): PDO {
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                "sqlite:" . __DIR__ . "/cine.db",
                null,
                null,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false
                ]
            );

            
            self::$pdo->exec("PRAGMA journal_mode = WAL;");

            
            self::$pdo->exec("
                CREATE TABLE IF NOT EXISTS usuarios (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    nombre TEXT NOT NULL,
                    correo TEXT NOT NULL UNIQUE,
                    password TEXT NOT NULL,
                    rol TEXT NOT NULL DEFAULT 'usuario',
                    creado_por INTEGER DEFAULT NULL
                );
            ");

            
            self::$pdo->exec("
                CREATE TABLE IF NOT EXISTS peliculas (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    titulo TEXT NOT NULL,
                    director TEXT NOT NULL,
                    anio INTEGER,
                    genero TEXT,
                    duracion INTEGER,
                    descripcion TEXT
                );
            ");
        }

        return self::$pdo;
    }
}
