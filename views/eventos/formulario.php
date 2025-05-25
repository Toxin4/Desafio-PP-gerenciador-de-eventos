<label>Tipo</label>
<select name="tipo" required>
  <?php
    $tipos = ['social', 'cultural', 'esportivo', 'corporativo', 'religioso', 'entretenimento', 'outros'];
    foreach ($tipos as $tipo) {
      $selected = isset($evento['tipo']) && $evento['tipo'] === $tipo ? 'selected' : '';
      echo "<option value=\"$tipo\" $selected>$tipo</option>";
    }
  ?>
</select>

<label>Nome</label>
<input type="text" name="nome" value="<?= $evento['nome'] ?? '' ?>" required />

<label>Descrição</label>
<textarea name="descricao"><?= $evento['descricao'] ?? '' ?></textarea>

<label>Endereço</label>
<input type="text" name="endereco" value="<?= $evento['endereco'] ?? '' ?>" required />

<label>Link do Google Maps</label>
<input type="url" name="link_maps" value="<?= $evento['link_maps'] ?? '' ?>" />

<label>Data e Hora</label>
<input type="datetime-local" name="data_hora" value="<?= isset($evento['data_hora']) ? date('Y-m-d\TH:i', strtotime($evento['data_hora'])) : '' ?>" required />

<label>Preço</label>
<input type="number" name="preco" value="<?= $evento['preco'] ?? '' ?>" step="0.01" />