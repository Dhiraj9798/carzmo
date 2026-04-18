<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$carzmo_page = 'about';
$carzmo_page_title = 'About | ' . $CARZMO['name'];

require __DIR__ . '/includes/header.php';
?>
<main class="min-h-screen bg-black text-white">
<?php
require __DIR__ . '/sections/about-hero.php';
require __DIR__ . '/sections/about-mission.php';
require __DIR__ . '/sections/about-section.php';
?>
</main>
<?php
require __DIR__ . '/includes/footer.php';
