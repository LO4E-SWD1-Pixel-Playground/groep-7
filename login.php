<?php
session_start(); 
require 'db.php';

$loginError = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("SELECT password FROM gebruikers WHERE username = ?");
    $stmt->execute([$username]);
    $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($gebruiker && password_verify($password, $gebruiker['password'])) {
        $_SESSION['username'] = $username; 
        header('Location: account.php'); 
        exit;
    } else {
        $loginError = 'Ongeldige gebruikersnaam of wachtwoord.';
    }
}
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

<form method="post" class="formulier">
    <h2 class="titel">Inloggen</h2>

    <?php if ($loginError): ?>
        <p class="foutmelding"><?php echo htmlspecialchars($loginError); ?></p>
    <?php endif; ?>

    <label for="username" class="formulier-label">Gebruikersnaam</label>
    <input type="text" name="username" id="username" class="formulier-tekstveld" required>

    <label for="password" class="formulier-label">Wachtwoord</label>
    <input type="password" name="password" id="password" class="formulier-tekstveld" required>

    <input type="submit" value="Inloggen" class="formulier-knop login">

    <a href="register.php" class="link">Nog geen account? Registreren</a>
</form>

</body>

<?php
    include 'footer.php'
?>

</main>



</html>
