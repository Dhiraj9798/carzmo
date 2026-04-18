<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$carzmo_page = 'home';
$carzmo_skip_global_footer = true;
$carzmo_page_title = $CARZMO['name'] . ' — Premium Automotive Care | Kolkata';

require __DIR__ . '/includes/header.php';
?>
<main class="min-h-screen bg-black text-white">
<?php
require __DIR__ . '/sections/hero.php';
?>
<div class="bg-black">
<?php
require __DIR__ . '/sections/about-section.php';
require __DIR__ . '/sections/services-section.php';
require __DIR__ . '/sections/gallery-section.php';
require __DIR__ . '/sections/products-section.php';
require __DIR__ . '/sections/process-section.php';
require __DIR__ . '/sections/contact-section.php';
?>
</div>
</main>
<?php
require __DIR__ . '/includes/footer.php';
