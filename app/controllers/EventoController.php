<?php
  require_once __DIR__ . '/../models/Evento.php';

  class EventoController {
    public function index() {
      $eventos = Evento::listar();
      include __DIR__ . '/../../views/eventos/index.php';
    }
    public function create() {
      include __DIR__ . '/../../views/eventos/create.php';
    }
    public function edit() {
      $evento = Evento::buscar($_GET['id']);
      include __DIR__ . '/../../views/eventos/edit.php';
    }
    public function delete() {
      Evento::excluir($_GET['id']);
      header("Location: ../public/index.php?route=evento/index&sucesso=excluido");
      exit;
    }
    public function store() {
      $dados = $_POST;
      
      if (empty($dados['tipo']) || empty($dados['nome']) || empty($dados['endereco']) || empty($dados['data_hora'])) {
            $erro = "Preencha todos os campos obrigatórios.";
            include __DIR__ . '/../../views/eventos/create.php';
            return;
      }

      Evento::inserir($dados);
      header("Location: index.php?route=evento/index&sucesso=criado");
      exit;
    }

    public function update() {
        $dados = $_POST;

        if (empty($dados['tipo']) || empty($dados['nome']) || empty($dados['endereco']) || empty($dados['data_hora'])) {
            $evento = $dados; // repopula o form
            $erro = "Preencha todos os campos obrigatórios.";
            include __DIR__ . '/../../views/eventos/edit.php';
            return;
        }

        Evento::atualizar($dados);
        header("Location: index.php?route=evento/index&sucesso=editado");
        exit;
    }
  }