<?php
declare(strict_types=1);
/** @var array $CARZMO */
$stats = [
    ['value' => '5+', 'label' => 'Years of hands-on experience'],
    ['value' => '500+', 'label' => 'Detailing & protection jobs'],
    ['value' => '4.9★', 'label' => 'Average customer satisfaction'],
    ['value' => '24h', 'label' => 'Quick response on enquiries'],
];
$testimonials = [
    [
        'quote' => 'Ceramic coating looks incredible—and the team explained every step. Easily the most professional outfit I have used in Kolkata.',
        'name' => 'Arjun M.',
        'role' => 'BMW 3 Series owner',
    ],
    [
        'quote' => 'Accessory fitment was clean, with proper wiring and no rattles. They treat your car like their own.',
        'name' => 'Priya S.',
        'role' => 'SUV owner',
    ],
    [
        'quote' => 'Workshop work was transparent: photos, estimates, and timelines. I will be back for servicing.',
        'name' => 'Rahul K.',
        'role' => 'Performance enthusiast',
    ],
];
?>
<section id="facility" class="relative min-h-[520px] w-full scroll-mt-[4.5rem] overflow-hidden bg-black">
  <img src="<?php echo htmlspecialchars(carzmo_img('autoworkshop1.jpeg')); ?>" alt="" class="absolute inset-0 h-full w-full object-cover" width="1920" height="1080" loading="lazy" decoding="async" aria-hidden="true" />
  <div class="pointer-events-none absolute inset-0 z-[1] bg-black/65" aria-hidden="true"></div>
  <div class="pointer-events-none absolute inset-x-0 top-0 z-[1] h-[160px]" style="background: linear-gradient(to bottom, black, transparent)"></div>
  <div class="pointer-events-none absolute inset-x-0 bottom-0 z-[1] h-[160px]" style="background: linear-gradient(to top, black, transparent)"></div>

  <div class="reveal-on-scroll relative z-10 mx-auto flex min-h-[520px] max-w-4xl flex-col items-center justify-center px-8 py-24 text-center lg:px-16">
    <div class="liquid-glass rounded-full px-3.5 py-1 font-body text-xs font-medium text-white">Our facility</div>
    <h2 class="mt-6 max-w-3xl text-4xl leading-[0.9] font-heading tracking-tight text-white italic md:text-5xl lg:text-6xl">Space, tooling, and talent—built for modern cars.</h2>
    <p class="mt-6 max-w-2xl font-body text-sm leading-relaxed font-light text-white/75 md:text-base">
      Visit <?php echo htmlspecialchars($CARZMO['name']); ?> in <?php echo htmlspecialchars($CARZMO['location']); ?>. From routine service to specialist installs, we keep
      your vehicle performing—and looking—its best.
    </p>
    <button type="button" data-scroll-to="contact" class="liquid-glass-strong mt-10 inline-flex items-center gap-2 rounded-full px-6 py-3 font-body text-sm font-medium text-white">
      Plan a visit
      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
    </button>
  </div>
</section>

<section id="process" class="relative scroll-mt-[4.5rem] py-24 overflow-hidden bg-black">
  <!-- Integrated Background full width left to right -->
  <img src="<?php echo htmlspecialchars(carzmo_img('hero_bg.jpeg')); ?>" alt="" class="absolute inset-0 h-full w-full object-cover opacity-80" width="1920" height="1080" loading="lazy" decoding="async" aria-hidden="true" />
  <!-- Dark blur overlay to make the background darker and ensure text pops -->
  <div class="absolute inset-0 bg-black/70" aria-hidden="true"></div>
  
  <!-- Smooth fade into the sections above and below -->
  <div class="pointer-events-none absolute inset-x-0 top-0 z-[1] h-32 bg-gradient-to-b from-black to-transparent" aria-hidden="true"></div>
  <div class="pointer-events-none absolute inset-x-0 bottom-0 z-[1] h-32 bg-gradient-to-t from-black to-transparent" aria-hidden="true"></div>

  <div class="relative z-10 mx-auto max-w-7xl px-8 lg:px-16">
    <!-- The Stat Container without confining the background -->
    <div class="reveal-on-scroll relative overflow-hidden rounded-[2rem] border border-white/10 shadow-2xl backdrop-blur-md bg-black/40 liquid-glass-strong">
      
      <!-- Stats Content Container -->
      <div class="relative z-10 p-12 md:p-16 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-4">
        <?php foreach ($stats as $item): ?>
          <div class="reveal-on-scroll text-center flex flex-col justify-center">
            <div class="text-5xl text-[#d4af37] italic md:text-5xl lg:text-7xl font-heading font-black drop-shadow-xl"><?php echo htmlspecialchars($item['value']); ?></div>
            <div class="mt-4 font-body text-[13px] font-bold tracking-widest text-[#e5e5e5] uppercase leading-snug drop-shadow-md"><?php echo htmlspecialchars($item['label']); ?></div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>

<section class="bg-black px-8 py-24 lg:px-16">
  <div class="mx-auto max-w-[1400px]">
    <div class="reveal-on-scroll mx-auto max-w-3xl text-center">
      <div class="mx-auto inline-flex rounded-full px-3.5 py-1 font-body text-xs font-medium text-white liquid-glass">Testimonials</div>
      <h2 class="mt-6 text-4xl leading-[0.9] font-heading tracking-tight text-white italic md:text-5xl lg:text-6xl">Owners who noticed the difference.</h2>
    </div>

    <div class="mt-16 grid grid-cols-1 gap-6 md:grid-cols-3">
      <?php foreach ($testimonials as $ti => $item): ?>
        <figure class="reveal-on-scroll liquid-glass rounded-2xl p-8" style="transition-delay: <?php echo $ti * 80; ?>ms">
          <blockquote class="font-body text-sm leading-relaxed font-light text-white/80 italic">“<?php echo htmlspecialchars($item['quote']); ?>”</blockquote>
          <figcaption class="mt-6">
            <div class="font-body text-sm font-medium text-white"><?php echo htmlspecialchars($item['name']); ?></div>
            <div class="mt-1 font-body text-xs font-light text-white/50"><?php echo htmlspecialchars($item['role']); ?></div>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>
