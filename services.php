<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$carzmo_page = 'services';
$carzmo_page_title = 'Services | ' . $CARZMO['name'];

require __DIR__ . '/includes/header.php';
?>
<main class="min-h-screen bg-black text-white">
<?php
$hero = carzmo_img('detailing12.jpeg');
$sv = carzmo_url('services.php');
$ct = carzmo_url('contact.php');
?>
<section class="relative min-h-[45vh] overflow-hidden sm:min-h-[50vh]">
  <img src="<?php echo htmlspecialchars($hero); ?>" alt="" class="absolute inset-0 h-full w-full object-cover" width="1920" height="1080" fetchpriority="high" />
  <div class="absolute inset-0 bg-black/55"></div>
  <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-black/40"></div>
  <div class="relative z-10 flex min-h-[45vh] flex-col justify-end px-6 pb-12 pt-28 sm:min-h-[50vh] sm:px-8 lg:px-16 lg:pb-16 lg:pt-32">
    <div class="reveal-on-scroll is-inview">
      <p class="font-body text-xs font-semibold uppercase tracking-[0.2em] text-white/60">Services</p>
      <h1 class="mt-2 max-w-3xl font-heading text-4xl italic text-white md:text-5xl lg:text-6xl">Four disciplines. One obsession with quality.</h1>
      <p class="mt-4 max-w-xl font-body text-sm text-white/70 md:text-base">
        Choose a service to see scope, imagery, and how we deliver—then reach out when you are ready.
      </p>
    </div>
  </div>
</section>

<section class="bg-black px-6 py-16 sm:px-8 lg:px-16 lg:py-24">
  <div class="mx-auto grid max-w-[1400px] gap-6 sm:grid-cols-2" style="grid-auto-rows:1fr;">
    <?php foreach ($CARZMO_SERVICES as $s):
        $href = carzmo_url('service.php?slug=' . rawurlencode($s['slug']));
        $img0 = carzmo_img($s['images'][0]);
        ?>
      <article class="reveal-on-scroll h-full">
        <a href="<?php echo htmlspecialchars($href); ?>" class="group liquid-glass flex h-full flex-col overflow-hidden rounded-2xl border border-white/10 sm:flex-row" style="min-height:220px;">
          <div class="relative aspect-[16/10] w-full shrink-0 overflow-hidden sm:aspect-auto sm:h-auto sm:w-[42%]">
            <img src="<?php echo htmlspecialchars($img0); ?>" alt="" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105" width="800" height="500" loading="lazy" />
          </div>
          <div class="flex flex-1 flex-col justify-center p-6 sm:p-8">
            <h2 class="font-heading text-2xl italic text-white md:text-3xl"><?php echo htmlspecialchars($s['title']); ?></h2>
            <p class="mt-2 font-body text-sm font-medium text-white/70"><?php echo htmlspecialchars($s['short']); ?></p>
            <p class="mt-3 line-clamp-3 font-body text-sm text-white/50"><?php echo htmlspecialchars($s['body']); ?></p>
            <span class="mt-6 inline-flex items-center gap-2 font-body text-sm font-medium text-white">
              View details
              <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5 group-hover:-translate-y-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
            </span>
          </div>
        </a>
      </article>
    <?php endforeach; ?>
  </div>

  <div class="mx-auto mt-14 max-w-[1400px] text-center">
    <a href="<?php echo htmlspecialchars($ct); ?>" class="liquid-glass-strong inline-flex items-center gap-2 rounded-full px-6 py-3 font-body text-sm font-medium text-white">
      Book a visit
      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
    </a>
  </div>
</section>

</main>
<?php
require __DIR__ . '/includes/footer.php';
