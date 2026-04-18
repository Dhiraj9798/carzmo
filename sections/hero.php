<?php
declare(strict_types=1);
/** @var array $CARZMO */
/** @var array $CARZMO_HERO_SLIDES */
$loc_bits = array_map('trim', explode(',', $CARZMO['location']));
$loc_short = count($loc_bits) >= 2 ? $loc_bits[count($loc_bits) - 2] . ', ' . $loc_bits[count($loc_bits) - 1] : $CARZMO['location'];
?>
<section id="home" class="relative flex min-h-[min(100vh,920px)] flex-col overflow-hidden bg-black">
  <div class="absolute inset-0 z-0">
    <?php foreach ($CARZMO_HERO_SLIDES as $i => $img):
        $src = carzmo_img($img);
        $active = $i === 0 ? ' is-active' : '';
        ?>
      <img src="<?php echo htmlspecialchars($src); ?>" alt="" width="1920" height="1080" sizes="100vw" loading="<?php echo $i === 0 ? 'eager' : 'lazy'; ?>" fetchpriority="<?php echo $i === 0 ? 'high' : 'low'; ?>" class="carzmo-hero-ken hero-slide-img absolute inset-0 h-full w-full object-cover<?php echo $active; ?>" data-hero-slide="<?php echo (int) $i; ?>" <?php echo $i !== 0 ? 'aria-hidden="true"' : ''; ?> />
    <?php endforeach; ?>
    <div class="pointer-events-none absolute inset-0 z-[1] bg-gradient-to-b from-black/70 via-black/35 to-black" aria-hidden="true"></div>
  </div>

  <div class="pointer-events-none absolute inset-x-0 bottom-0 z-[2] h-40 bg-gradient-to-t from-black to-transparent"></div>

  <div class="relative z-10 mx-auto flex w-full max-w-[1600px] flex-1 flex-col px-8 pt-24 sm:pt-28 lg:px-16 lg:pt-32">
    <div class="mx-auto flex w-full max-w-4xl flex-col items-center text-center">
      <div class="liquid-glass inline-flex items-center gap-2 rounded-full px-1 py-1">
        <span class="rounded-full bg-white px-3 py-1 font-body text-xs font-semibold text-black">Kolkata</span>
        <span class="pr-2 font-body text-xs font-medium text-white/90"><?php echo htmlspecialchars($CARZMO['tagline']); ?></span>
      </div>


      <div class="mt-8 max-w-3xl w-full flex flex-col items-center">
        <span class="font-heading font-bold italic fade-in-hero-title"
          style="
            font-size: clamp(3.5rem, 10vw, 4.5rem);
            background: linear-gradient(90deg,
              #8C6A2A 0%,
              #B9923F 18%,
              #F2D27A 50%,
              #D4AF5A 82%,
              #9C772F 100%
            );
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-fill-color: transparent;
            letter-spacing: 0.18em;
            text-shadow: 0 2px 16px #000a;
            opacity: 0;
            animation: fadeInHero 1s 0.1s forwards;
          ">
          CARZMO
        </span>
        <style>
        @keyframes fadeInHero {
          from { opacity: 0; transform: translateY(24px); }
          to { opacity: 1; transform: none; }
        }
        .fade-in-hero-title {
          will-change: opacity, transform;
        }
        </style>
          <span class="block mt-1 font-heading text-base sm:text-lg md:text-xl tracking-[0.6em] font-semibold uppercase fade-in-hero-title"
            style="
              background: linear-gradient(90deg,
                #8C6A2A 0%,
                #B9923F 18%,
                #F2D27A 50%,
                #D4AF5A 82%,
                #9C772F 100%
              );
              -webkit-background-clip: text;
              -webkit-text-fill-color: transparent;
              background-clip: text;
              color: transparent;
              letter-spacing: 0.6em;
              text-shadow: 0 1px 8px #0007;
              opacity: 0;
              animation: fadeInHero 1s 0.7s forwards;
            ">
          MOTORS
        </span>
      </div>

      <p class="reveal-on-scroll mt-6 max-w-xl font-body text-sm leading-tight font-light text-white/90 md:text-lg" style="transition-delay: 0.15s">
        Workshop, detailing, accessories, and modifications—delivered with obsessive care and a premium experience.
      </p>

      <div class="reveal-on-scroll mt-10 flex flex-wrap items-center justify-center gap-4" style="transition-delay: 0.25s">
        <button type="button" data-scroll-to="contact" class="liquid-glass-strong inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-body text-sm font-medium text-white">
          Book a visit
          <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
        </button>
        <button type="button" data-scroll-to="services" class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/5 px-5 py-2.5 font-body text-sm font-medium text-white backdrop-blur-sm transition-colors hover:bg-white/10">
          Explore services
        </button>
      </div>
    </div>

    <div class="relative z-10 mt-auto flex w-full flex-col items-center gap-6 pb-10 pt-16">
      <div class="flex items-center gap-3">
        <button type="button" class="liquid-glass flex h-10 w-10 items-center justify-center rounded-full text-white transition-colors hover:bg-white/10" data-hero-prev aria-label="Previous slide">
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
        </button>
        <div class="flex gap-2" role="tablist" aria-label="Hero slides">
          <?php foreach ($CARZMO_HERO_SLIDES as $i => $_): ?>
            <button type="button" role="tab" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $i + 1; ?>" data-hero-dot="<?php echo (int) $i; ?>" class="h-2 rounded-full transition-all <?php echo $i === 0 ? 'w-8 bg-white' : 'w-2 bg-white/35 hover:bg-white/55'; ?>"></button>
          <?php endforeach; ?>
        </div>
        <button type="button" class="liquid-glass flex h-10 w-10 items-center justify-center rounded-full text-white transition-colors hover:bg-white/10" data-hero-next aria-label="Next slide">
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
        </button>
      </div>
      <div class="text-center flex flex-col gap-1.5 mt-2">
        <p class="font-body text-[13px] font-bold tracking-widest text-white uppercase">Official Garware Application Studio</p>
        <p class="font-body text-xs font-medium tracking-wide text-white/45">Premium automotive care · <?php echo htmlspecialchars($loc_short); ?></p>
      </div>
    </div>
  </div>
</section>
