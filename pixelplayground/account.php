<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="op deze pagina zetten we 2 games en wat revieuws over de games en de pegi rating">
    <meta name="keywords" content="game, review, gamereview">
    <meta name="author" content="Senne van Ling">
    <title>galgje</title>
    <script src="javascript/script.js" defer></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
    include 'header.php'
?>
<body class="pagina">

<form class="formulier">
    <h2 class="titel">Welkom, <?php echo htmlspecialchars($username); ?>!</h2>

    <p class="success-message">Je bent succesvol ingelogd.</p>

    <a href="logout.php" class="link">Uitloggen</a>
</form>

</body>
<?php
    include 'footer.php'
?>

</main>



</html>
