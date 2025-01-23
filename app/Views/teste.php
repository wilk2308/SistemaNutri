<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teste</title>
</head>
<body>


<form action="<?= base_url(); ?>/SubcategoriaController/index" method="post">
<div class="form-group col-md-4">
<label for="subcategoria_id" class="fw-bold">Sub-Categoria</label>
<select name="subcategoria_id" id="subcategoria_id" class="form-control">
    <option value="">Selecione uma Sub Categoria</option>
  
    <?php foreach ($subcategorias as $subcategoria): ?>
        <?php $selected = (isset($subcategoria['subcategoria_id']) && $subcategoria['subcategoria_id'] == $movimentacao['subcategoria_id']) ? 'selected' : ''; ?>
        <option value="<?= $subcategoria['subcategoria_id']; ?>" <?= $selected; ?>>
            <?= $subcategoria['nome_subcategoria']; ?>
        </option>
    <?php endforeach; ?>
</select>
</div>

    </form>
    
</body>
</html>