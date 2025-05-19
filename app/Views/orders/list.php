<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="container">
    <div>Pedidos</div>
    <?php if (! empty($products) && is_array($products)): ?>
        <select name="product_id">
            <?php foreach ($products as $product): ?>
                <option value="<?= esc($product['product_id']) ?>"><?= esc($product['name']) ?></option>
            <?php endforeach; ?>
        </select>
    <?php else: ?>
        <p>Não há produtos cadastrados.</p>
    <?php endif; ?>

</div>
<?= $this->endSection() ?>