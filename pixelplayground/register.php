<?php
require 'db.php';

$registerError = '';
$registerSuccess = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $registerError = 'Alle velden zijn verplicht.';
    } else {
        $stmt = $pdo->prepare("SELECT id FROM gebruikers WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            $registerError = 'Gebruikersnaam bestaat al.';
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO gebruikers (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashedPassword]);
            $registerSuccess = 'Registratie geslaagd! <a href="login.php">Inloggen</a>';
        }
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
    <h2 class="titel">Registreren</h2>

    <?php if ($registerError): ?>
        <p class="foutmelding"><?php echo htmlspecialchars($registerError); ?></p>
    <?php endif; ?>

    <?php if ($registerSuccess): ?>
        <p class="success-message"><?php echo $registerSuccess; ?></p>
    <?php endif; ?>

    <label for="username" class="formulier-label">Gebruikersnaam</label>
    <input type="text" name="username" id="username" class="formulier-tekstveld" required>

    <label for="password" class="formulier-label">Wachtwoord</label>
    <input type="password" name="password" id="password" class="formulier-tekstveld" required>

    <input type="submit" value="Registreren" class="formulier-knop registreer">

    <a href="login.php" class="link">Al een account? Inloggen</a>
</form>

</body>
<?php
    include 'footer.php'
?>

</main>



</html>

