<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Novo Evento</title>
  <link rel="stylesheet" href="/eventos_proponto_challenge/public/css/style.css">
</head>
<body>
  <header class="header">
    <h1>Cadastrar Evento</h1>
  </header>

  <main>
    <div class="container">
      <form method="POST" action="index.php?route=evento/store">
      <?php if (isset($erro)): ?>
        <div class="mensagem-flash erro">
          <?= $erro ?>
        </div>
      <?php endif; ?>
        <?php include 'formulario.php'; ?>
        <div class="bottom-buttons">
          <button type="submit">Salvar</button>
          <a href="index.php?route=evento/index"><button type="button">Cancelar</button></a>
        </div>
      </form>
    </div>
  </main>
  <footer>Projeto Gerenciador de Eventos - 2025</footer>
</body>
</html>