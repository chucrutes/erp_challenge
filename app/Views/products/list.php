<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="container">
    <div>Produtos</div>
    <?php if (session()->getFlashdata('success')): ?>
        <div style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div style="color: red;">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>
    <form action="/products" method="POST">
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
    <?php if (! empty($products) && is_array($products)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Atualizado Em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= esc($product['product_id']) ?></td>
                        <td><?= esc($product['name']) ?></td>
                        <td><?= esc(number_format($product['price'], 2, ',', '.')) ?></td>
                        <td><?= esc(number_format($product['quantity'], 2, ',', '.')) ?></td>
                        <td><?= format_brazillian_date(esc($product['updated_at'])) ?></td>
                        <td style="display: flex; justify-content: center; align-items: center; gap: 1em">
                            <a href="/products/edit/<?= esc($product['product_id']) ?>">Editar</a>
                            <form action="/products/delete/<?= esc($product['product_id']) ?>" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja excluir este item?');">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Não há produtos cadastrados.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>