<?php include('../../includes/header.php'); ?>
<form action="../../controllers/LoginController.php" method="POST">
    <input type="text" name="username" placeholder="Usuário">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit">Entrar</button>
</form>
<?php include('../../includes/footer.php'); ?>