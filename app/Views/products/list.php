<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/css/globals.css">
</head>

<body>
    <div class="container">
        <div>Produtos</div>
        <form action="products.php" method="post" >
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



    <script {csp-script-nonce}>
        document.getElementById("menuToggle").addEventListener('click', toggleMenu);

        function toggleMenu() {
            var menuItems = document.getElementsByClassName('menu-item');
            for (var i = 0; i < menuItems.length; i++) {
                var menuItem = menuItems[i];
                menuItem.classList.toggle("hidden");
            }
        }
    </script>

    <!-- -->

</body>

</html>