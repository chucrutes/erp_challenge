<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

    <style>
        .form-group {
            padding: 2em
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
    </style>



</head>

<body>
    <div class="container">
        <div>products</div>
        <form action="products.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="price">Name</label>
                <input type="number" name="price" id="price">
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