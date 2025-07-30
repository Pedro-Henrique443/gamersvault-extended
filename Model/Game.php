<?php

namespace Model;

use Model\Connection;

use PDO;
use PDOException;
use Exception;

class Game
{
    private $db;

    /*
     * MÉTODO QUE IRÁ SER EXECUTADO TODA VEZ QUE
     * FOR CRIADO UM OBJETO DA CLASSE -> USER
     */

    public function __construct()
    {
        $this->db = Connection::getInstance();
    }

    // FUNÇÃO DE CRIAR JOGO
    public function registerGame($game_cover, $title, $price, $developer, $publisher)
    {
        try {
            // INSERÇÃO DE DADOS NA LINGUAGEM SQL
            $sql = 'INSERT INTO games (game_cover, title, price, developer, publisher, created_at) VALUES (:game_cover, :title, :price, :developer, :publisher, NOW())';

            // PREPARAR O BANCO DE DADOS PARA RECEBER O COMANDO ACIMA
            $stmt = $this->db->prepare($sql);

            // REFERENCIAR OS DADOS PASSADOS PELO COMANDO SQL COM OS PARÂMETROS DA FUNÇÃO
            $stmt->bindParam(":game_cover", $game_cover, PDO::PARAM_STR);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":developer", $developer, PDO::PARAM_STR);
            $stmt->bindParam(":publisher", $publisher, PDO::PARAM_STR);

            // EXECUTAR TUDO
            return $stmt->execute();

        } catch (PDOException $error) {
            // EXIBIR MENSAGEM DE ERRO COMPLETA E PARAR A EXECUÇÃO
            echo "Erro ao executar o comando " . $error->getMessage();
            return false;
        }
    }

    // OBTER INFORMAÇÕES DO JOGO
    public function getGameInfo($id, $game_cover, $title, $price, $developer, $publisher)
    {
        try {
            $sql = "SELECT game_cover, title, price, developer, publisher FROM games WHERE id = :id AND game_cover = :game_cover AND title = :title AND price = :price AND developer = :developer AND publisher = :publisher";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":game_cover", $game_cover, PDO::PARAM_STR);
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":price", $price, PDO::PARAM_STR);
            $stmt->bindParam(":developer", $developer, PDO::PARAM_STR);
            $stmt->bindParam(":publisher", $publisher, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo "Erro ao buscar informações: " . $error->getMessage();
            return false;
        }
    }

    public function getAllGames()
    {
        try {
            $sql = "SELECT * FROM games ORDER BY created_at DESC";
            $stmt = $this->db->prepare($sql);
            
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $error) {
            echo "Erro ao buscar jogos: " . $error->getMessage();
            return false;
        }
    }
}

?>