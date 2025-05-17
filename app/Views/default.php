<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Erp challenge</title>
    <link rel="stylesheet" href="/css/globals.css">
</head>

<body>
    <?= $this->include('layout/header') ?>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <?= $this->include('layout/footer') ?>
</body>

</html>