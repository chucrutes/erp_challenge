<?= $this->extend('default') ?>


<?= $this->section('content') ?>
<div class="container">
    <div>Produtos</div>
    <form action="products.php" method="post">
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" name="price" id="price">
        </div>
        <div class="form-group">
            <label for="quantity">Quantidade</label>
            <input type="number" name="quantity" id="quantity">
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
<?= $this->endSection() ?>