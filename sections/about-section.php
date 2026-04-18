<?php
declare(strict_types=1);
/** @var array $CARZMO */
/** @var string $carzmo_page */
?>
<?php if (($carzmo_page ?? '') === 'home'): ?>
<section id="about" class="scroll-mt-[4.5rem] bg-black px-8 py-24 lg:px-16">
  <div class="mx-auto grid max-w-[1400px] gap-14 lg:grid-cols-2 lg:items-center lg:gap-20">
    <div class="reveal-on-scroll liquid-glass relative aspect-[4/3] overflow-hidden rounded-3xl">
      <img src="<?php echo htmlspecialchars(carzmo_img('about.jpeg')); ?>" alt="<?php echo htmlspecialchars($CARZMO['name']); ?> facility" class="h-full w-full object-cover" width="1200" height="900" sizes="(max-width: 1024px) 100vw, 50vw" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='<?php echo htmlspecialchars(carzmo_img('about.jpeg')); ?>';" />
    </div>

    <div class="reveal-on-scroll" style="transition-delay: 0.08s">
      <div class="inline-flex rounded-full px-3.5 py-1 font-body text-xs font-medium text-white liquid-glass">About us</div>
      <h2 class="mt-6 text-4xl leading-[0.95] font-heading tracking-tight text-white italic md:text-5xl lg:text-6xl">Built for enthusiasts. Trusted by owners.</h2>
      <p class="mt-6 font-body text-sm leading-relaxed font-light text-white/65 md:text-base">
        <?php echo htmlspecialchars($CARZMO['name']); ?> is a premium automotive destination in <?php echo htmlspecialchars($CARZMO['location']); ?>. From precision
        workshop care to show-quality detailing and curated accessories—we combine skilled
        craftsmanship with transparent service, so your car looks and drives exactly the way you
        imagine.
      </p>
      <p class="mt-4 font-body text-sm leading-relaxed font-light text-white/65 md:text-base">
        Whether it is routine maintenance, paint protection, fitment, or bespoke modifications,
        our team focuses on safety, longevity, and a finish you will notice every time you get
        behind the wheel.
      </p>
    </div>
  </div>
</section>
<?php endif; ?>

<?php if (($carzmo_page ?? '') !== 'home'): ?>
<!-- Showroom Exterior Section -->
<section class="scroll-mt-[4.5rem] bg-black px-8 py-24 lg:px-16" id="facility-section">
  <div class="mx-auto grid max-w-[1400px] gap-14 lg:grid-cols-2 lg:items-center lg:gap-20">
    <!-- Image Left -->
    <div class="reveal-on-scroll liquid-glass relative aspect-[4/3] overflow-hidden rounded-3xl">
      <img src="<?php echo htmlspecialchars(carzmo_img('showroom-exterior.jpeg')); ?>" alt="Showroom Exterior" class="h-full w-full object-cover" width="1200" height="900" sizes="(max-width: 1024px) 100vw, 50vw" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='<?php echo htmlspecialchars(carzmo_img('showroom-exterior.jpeg')); ?>';" />
    </div>
    <!-- Text Right -->
    <div class="reveal-on-scroll" style="transition-delay: 0.08s">
      <div class="inline-flex rounded-full px-3.5 py-1 font-body text-xs font-medium text-white liquid-glass">Our Facility</div>
      <h2 class="mt-6 text-3xl md:text-4xl lg:text-5xl font-heading tracking-tight text-white italic">A Space for Car Lovers</h2>
      <ul class="mt-6 space-y-4">
        <li class="flex items-start gap-3">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 text-[#FFD700]">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 2l2.09 6.26L20 9.27l-5 4.87L16.18 21 12 17.27 7.82 21 9 14.14l-5-4.87 5.91-.91z'/></svg>
          </span>
          <span class="font-body text-base text-white/80">Modern, spacious, and welcoming environment</span>
        </li>
        <li class="flex items-start gap-3">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 text-[#00BFFF]">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><circle cx='12' cy='12' r='10' stroke='currentColor' stroke-width='2' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 12l2 2 4-4'/></svg>
          </span>
          <span class="font-body text-base text-white/80">Dedicated service bays for all types of vehicles</span>
        </li>
        <li class="flex items-start gap-3">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 text-[#32CD32]">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg>
          </span>
          <span class="font-body text-base text-white/80">Comfortable lounge for customers</span>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- Car Accessories Display Section -->
<section class="scroll-mt-[4.5rem] bg-black px-8 py-24 lg:px-16" id="accessories-section">
  <div class="mx-auto grid max-w-[1400px] gap-14 lg:grid-cols-2 lg:items-center lg:gap-20">
    <!-- Text Left -->
    <div class="reveal-on-scroll order-2 lg:order-1" style="transition-delay: 0.08s">
      <div class="inline-flex rounded-full px-3.5 py-1 font-body text-xs font-medium text-white liquid-glass">Accessories & Care</div>
      <h2 class="mt-6 text-3xl md:text-4xl lg:text-5xl font-heading tracking-tight text-white italic">Curated Car Accessories</h2>
      <ul class="mt-6 space-y-4">
        <li class="flex items-start gap-3">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 text-[#FF69B4]">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><circle cx='12' cy='12' r='10' stroke='currentColor' stroke-width='2' fill='none'/><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 12l2 2 4-4'/></svg>
          </span>
          <span class="font-body text-base text-white/80">Wide range of premium car care products</span>
        </li>
        <li class="flex items-start gap-3">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 text-[#FFA500]">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg>
          </span>
          <span class="font-body text-base text-white/80">Latest accessories for style and utility</span>
        </li>
        <li class="flex items-start gap-3">
          <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/10 text-[#00CED1]">
            <svg xmlns='http://www.w3.org/2000/svg' class='h-5 w-5' fill='none' viewBox='0 0 24 24' stroke='currentColor'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'/></svg>
          </span>
          <span class="font-body text-base text-white/80">Expert advice for the perfect fit</span>
        </li>
      </ul>
    </div>
    <!-- Image Right -->
    <div class="reveal-on-scroll order-1 lg:order-2 liquid-glass relative aspect-[4/3] overflow-hidden rounded-3xl">
      <img src="<?php echo htmlspecialchars(carzmo_img('car-accessories-display.jpeg')); ?>" alt="Car Accessories Display" class="h-full w-full object-cover" width="1200" height="900" sizes="(max-width: 1024px) 100vw, 50vw" loading="lazy" decoding="async" onerror="this.onerror=null;this.src='<?php echo htmlspecialchars(carzmo_img('car-accessories-display.jpeg')); ?>';" />
    </div>
  </div>
</section>
<?php endif; ?>
