<?php
  require_once __DIR__ . '/../../config/db.php';

  class Evento {
    public static function listar()
    {
        global $conn;
        $sql = "SELECT * FROM eventos";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function inserir($dados)
    {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO eventos (tipo, nome, descricao, endereco, link_maps, data_hora, preco)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "ssssssd",
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['endereco'],
            $dados['link_maps'],
            $dados['data_hora'],
            $dados['preco']
        );
        $stmt->execute();
        $stmt->close();
    }

    public static function buscar($id)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM eventos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function atualizar($dados)
    {
        global $conn;
        $stmt = $conn->prepare("UPDATE eventos SET tipo=?, nome=?, descricao=?, endereco=?, link_maps=?, data_hora=?, preco=? WHERE id=?");
        $stmt->bind_param(
            "ssssssdi",
            $dados['tipo'],
            $dados['nome'],
            $dados['descricao'],
            $dados['endereco'],
            $dados['link_maps'],
            $dados['data_hora'],
            $dados['preco'],
            $dados['id']
        );
        $stmt->execute();
        $stmt->close();
    }

    public static function excluir($id)
    {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM eventos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
  }