<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<div class="container">
    <div>Cupons</div>
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
    <form action="/coupons" method="POST">
        <?php if (! empty($products) && is_array($products)): ?>
            <label for="product_id">Produto</label>
            <select name="product_id" id="product_id" required>
                <option value="">-- Selecione um produto --</option>
                <?php foreach ($products as $product): ?>
                    <option value="<?= esc($product['product_id']) ?>"><?= esc($product['name']) ?></option>
                <?php endforeach; ?>
            </select>
        <?php else: ?>
            <p>Não há produtos cadastrados.</p>
        <?php endif; ?>
        <div class="form-group">
            <label for="discount">Desconto (%)</label>
            <input type="number" name="discount" id="discount" step="0.01" min="0" required>
        </div>

        <div class="form-group">
            <label for="start_date">Data de Início</label>
            <input type="datetime-local" name="start_date" id="start_date" required>
        </div>

        <div class="form-group">
            <label for="end_date">Data de Término</label>
            <input type="datetime-local" name="end_date" id="end_date" required>
        </div>

        <button type="submit">Salvar</button>
    </form>
    <?php if (! empty($coupons) && is_array($coupons)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Desconto</th>
                    <th>Data de início</th>
                    <th>Data de fim</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($coupons as $coupon): ?>
                    <tr>
                        <td><?= esc($coupon['coupon_id']) ?></td>
                        <td><?= esc($coupon['name']) ?></td>
                        <td><?= esc($coupon['discount']) ?></td>
                        <td><?= format_brazillian_date(esc($coupon['start_date'])) ?></td>
                        <td><?= format_brazillian_date(esc($coupon['end_date'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Não há cupons cadastrados.</p>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>