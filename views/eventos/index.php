<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Listagem de Eventos</title>
  <link rel="stylesheet" href="/eventos_proponto_challenge/public/css/style.css">
</head>
<body>
  <header class="header">
    <h1>Gerenciador de Eventos</h1>
  </header>

  <main>
    <div>
      <?php if (isset($_GET['sucesso'])): ?>
        <div class="mensagem-flash sucesso">
          <?php
            if ($_GET['sucesso'] === 'criado') echo '✅ Evento criado com sucesso!';
            elseif ($_GET['sucesso'] === 'editado') echo '✏️ Evento editado com sucesso!';
            elseif ($_GET['sucesso'] === 'excluido') echo '🗑️ Evento excluído com sucesso!';
          ?>
        </div>
      <?php endif; ?>
      <div class="top-buttons">
        <a href="../../public/index.php?route=evento/create"><button>Novo Evento</button></a>
      </div>
      <div class="table-container">
        <table>
          <thead>
            <tr>
              <th>Tipo</th>
              <th>Nome</th>
              <th>Endereço</th>
              <th>Data e Hora</th>
              <th>Preço</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($eventos)): ?>
              <?php foreach ($eventos as $evento): ?>
                <tr>
                  <td><?= $evento['tipo'] ?></td>
                  <td><?= $evento['nome'] ?></td>
                  <td><a href="<?= $evento['link_maps'] ?>" target="_blank"><?= $evento['endereco'] ?></a></td>
                  <td><?= date('d/m/Y H:i', strtotime($evento['data_hora'])) ?></td>
                  <td>R$ <?= number_format($evento['preco'], 2, ',', '.') ?></td>
                  <td>
                    <a href="index.php?route=evento/edit&id=<?= $evento['id'] ?>">Editar</a>
                    <a href="index.php?route=evento/delete&id=<?= $evento['id'] ?>" onclick="return confirm('Deseja excluir este evento?')">Excluir</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="6">Nenhum evento encontrado.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <footer>Projeto Gerenciador de Eventos - 2025</footer>
  <script src="/eventos_proponto_challenge/public/js/script.js"></script>
</body>
</html>