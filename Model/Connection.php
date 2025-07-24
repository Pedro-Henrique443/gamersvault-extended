<?php
// CONFIGURAÇÕES DE USO

// EXEMPLO DE USO EM OUTRAS CLASSES = use Model\Connection
namespace Model;

// IMPORTAÇÃO PARA CONEXÃO COM BANCO DE DADOS
use PDO;
use PDOException;

// BUSCANDO DADOS DE CONFIGURAÇÃO DO BANCO DE DADOS
require_once __DIR__ . "/../Config/configuration.php";

class Connection

    // ATRIBUTO ESTÁTICO QUE IRÁ PERMITIR A CONEXÃO ABAIXO
{
    private static $stmt;

    public static function getInstance(): PDO
    {
        if (empty(self::$stmt)) {
            try {
                self::$stmt = new PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . '', DB_USER, DB_PASSWORD);
            } catch (PDOException $error) {
                die("Erro de conexão: " . $error->getMessage());
            }
        }
        return self::$stmt;
    }
}

?>