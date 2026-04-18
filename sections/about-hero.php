<?php
declare(strict_types=1);
/** @var array $CARZMO */
?>
<section id="about-hero" class="relative flex min-h-[min(100vh,860px)] flex-col overflow-hidden bg-black">
  <div class="absolute inset-0 z-0">
    <img src="<?php echo htmlspecialchars(carzmo_img('about.jpeg')); ?>" alt="About Carzmo Motors" width="1920" height="1080" sizes="100vw" loading="eager" fetchpriority="high" class="carzmo-hero-ken hero-slide-img is-active absolute inset-0 h-full w-full object-cover" />
    <div class="pointer-events-none absolute inset-0 z-[1] bg-gradient-to-b from-black/65 via-black/30 to-black" aria-hidden="true"></div>
  </div>

  <div class="pointer-events-none absolute inset-x-0 bottom-0 z-[2] h-48 bg-gradient-to-t from-black to-transparent"></div>

  <div class="relative z-10 mx-auto flex w-full max-w-[1600px] flex-1 flex-col items-center justify-center px-8 pt-28 pb-20 sm:pt-32 lg:px-16 lg:pt-36">
    <div class="mx-auto flex w-full max-w-4xl flex-col items-center text-center">


      <!-- Buttons -->
      <div class="mt-10 flex flex-wrap items-center justify-center gap-4"
        style="opacity:0; animation: fadeInAboutHero 1s 0.65s forwards;">
        <a href="<?php echo htmlspecialchars(carzmo_url('contact.php')); ?>"
          class="liquid-glass-strong inline-flex items-center gap-2 rounded-full px-6 py-3 font-body text-sm font-medium text-white">
          Book a visit
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
        </a>
        <a href="<?php echo htmlspecialchars(carzmo_url('services.php')); ?>"
          class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/5 px-6 py-3 font-body text-sm font-medium text-white backdrop-blur-sm transition-colors hover:bg-white/10">
          Explore services
        </a>
      </div>

    </div>
  </div>
</section>

<style>
@keyframes fadeInAboutHero {
  from { opacity: 0; transform: translateY(22px); }
  to   { opacity: 1; transform: none; }
}
.fade-in-hero-title { will-change: opacity, transform; }
</style>
