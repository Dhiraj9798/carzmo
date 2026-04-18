<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$carzmo_page = 'gallery';
$carzmo_page_title = 'Gallery & Shop | ' . $CARZMO['name'];

require __DIR__ . '/includes/header.php';

$hero = carzmo_img('accessories12.jpeg');
?>
<main class="min-h-screen bg-black text-white">
<section class="relative min-h-[42vh] overflow-hidden sm:min-h-[46vh]">
  <img src="<?php echo htmlspecialchars($hero); ?>" alt="" class="absolute inset-0 h-full w-full object-cover" width="1920" height="1080" fetchpriority="high" />
  <div class="absolute inset-0 bg-black/55"></div>
  <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40"></div>
  <div class="relative z-10 flex min-h-[42vh] flex-col justify-end px-6 pb-10 pt-24 sm:min-h-[46vh] sm:px-8 sm:pb-12 lg:px-16 lg:pb-14 lg:pt-28">
    <div class="reveal-on-scroll is-inview">
      <p class="font-body text-xs font-semibold uppercase tracking-[0.2em] text-white/60">Gallery &amp; shop</p>
      <h1 class="mt-2 max-w-3xl font-heading text-4xl italic text-white md:text-5xl lg:text-6xl">Products, coatings, and accessories—curated for your car.</h1>
      <p class="mt-4 max-w-xl font-body text-sm text-white/70 md:text-base">
        Browse categories, add items to your cart, then message us on WhatsApp or send an enquiry—we will respond with availability and pricing.
      </p>
      <div class="mt-8 flex flex-wrap gap-3">
        <a href="<?php echo htmlspecialchars(carzmo_url('contact.php')); ?>" class="liquid-glass-strong inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-body text-sm font-medium text-white">
          Enquiry form
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
        </a>
        <a href="<?php echo htmlspecialchars(carzmo_url('services.php')); ?>" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/5 px-5 py-2.5 font-body text-sm font-medium text-white backdrop-blur-sm transition-colors hover:bg-white/10">
          Our services
        </a>
      </div>
    </div>
  </div>
</section>
<?php require __DIR__ . '/sections/gallery-section.php'; ?>
</main>
<?php
require __DIR__ . '/includes/footer.php';
