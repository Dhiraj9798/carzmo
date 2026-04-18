<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$p = isset($_GET['p']) ? (string) $_GET['p'] : '';
$is_privacy = $p === 'privacy';
$is_terms = $p === 'terms';
if (!$is_privacy && !$is_terms) {
    header('Location: ' . carzmo_url('index.php'), true, 302);
    exit;
}

$carzmo_page = 'legal';
$carzmo_page_title = ($is_privacy ? 'Privacy' : 'Terms') . ' | ' . $CARZMO['name'];

require __DIR__ . '/includes/header.php';
?>
<main class="mx-auto min-h-screen max-w-3xl bg-black px-6 pb-20 pt-28 text-white lg:px-10 lg:pt-32">
  <h1 class="font-heading text-4xl italic text-white"><?php echo $is_privacy ? 'Privacy' : 'Terms'; ?></h1>
  <div class="mt-8 space-y-4 font-body text-sm leading-relaxed text-white/65">
    <?php if ($is_privacy): ?>
      <p>This is a placeholder privacy notice for <?php echo htmlspecialchars($CARZMO['name']); ?>. Replace with your final policy covering data you collect (for example enquiry forms, WhatsApp messages, and analytics), retention, and contact details for privacy requests.</p>
    <?php else: ?>
      <p>This is a placeholder terms of use page for <?php echo htmlspecialchars($CARZMO['name']); ?>. Replace with your terms covering services, liability, warranties, and governing law as advised by your counsel.</p>
    <?php endif; ?>
  </div>
</main>
<?php
require __DIR__ . '/includes/footer.php';
