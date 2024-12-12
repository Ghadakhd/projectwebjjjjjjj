<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/launcher/Controller/MuseumController.php';

$controller = new MuseumController();
$museums = $controller->getMuseums();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Museum</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <section class="homepage" id="home">
            <div class="content flex">
                <div class="text">
                    <h1>Museums, Exhibitions and Art Galleries</h1>
                    <p>Discover fascinating exhibits and rare artifacts for an unforgettable journey through history. Gear up for an adventure through time and create lasting memories.</p>
                </div>
                <a href="#servics" class="explore-btn">Explore</a>
            </div>
        </section>
    </header>

    <section class="servics" id="servics">
        <div class="container">
            <div class="section-title">
                <h2>Museums, Exhibitions and Galleries</h2>
                <p>Step into a world of history, art, and inspiration, where every exhibit tells a unique story waiting to be explored!</p>
            </div>
            <ul class="cards flex">
                <?php foreach ($museums as $museum): ?>
                <li class="card">
                    <img src="<?= htmlspecialchars($museum['image']); ?>" alt="<?= htmlspecialchars($museum['name']); ?>">
                    <h3><?= htmlspecialchars($museum['name']); ?></h3>
                    <p><?= htmlspecialchars($museum['description']); ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <script>
        // Smooth Scroll for "Explore" Button
        const exploreButton = document.querySelector('.explore-btn');
        exploreButton.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector('#servics').scrollIntoView({ behavior: 'smooth' });
        });
    </script>
</body>
</html>
