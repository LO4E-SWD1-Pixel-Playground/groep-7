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
<body>
 <div class="game-container">
    <div class="game-title">Boter Kaas en Eieren</div>
    <div class="game-board" id="board"></div>
    <div class="game-status" id="status">X is aan de beurt</div>
    <div class="game-button" onclick="resetGame()">Opnieuw</div>
  </div>
<?php
    include 'footer.php'
?>

</main>
