<?php
/** @var array $CARZMO_SERVICES */
$N = count($CARZMO_SERVICES);
$services_payload = [];
foreach ($CARZMO_SERVICES as $idx => $s) {
    $services_payload[] = [
        'slug' => $s['slug'],
        'title' => $s['title'],
        'short' => $s['short'],
        'body' => $s['body'],
        'image' => carzmo_img($s['images'][0]),
        'href' => carzmo_url('service.php?slug=' . rawurlencode($s['slug'])),
    ];
}
?>
<section id="services" class="relative w-full border-t border-white/5 bg-[#050505]">
  
  <style>
    /* ExpandOnHover Pure CSS Implementation tailored to Carzmo (Horizontal on ALL devices) */
    .expand-card {
      position: relative;
      cursor: pointer;
      overflow: hidden;
      border-radius: 1.5rem;
      flex: 1; /* Collapsed state */
      height: 70vh;
      min-height: 400px;
      max-height: 600px;
      transition: all 0.7s cubic-bezier(0.25, 1, 0.5, 1);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Desktop Hover State */
    .expand-card:hover, .expand-card.default-expanded {
      flex: 6;
    }

    /* Mobile Native Swipe Carousel */
    @media (max-width: 639px) {
      .expand-cards-container {
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        scroll-behavior: smooth;
        scrollbar-width: none;
        padding-bottom: 1rem;
        justify-content: flex-start;
      }
      .expand-cards-container::-webkit-scrollbar {
        display: none;
      }
      .expand-card {
        flex: 0 0 85vw !important;
        scroll-snap-align: center;
        height: 60vh;
        min-height: 380px;
        transform: scale(0.92);
        opacity: 0.9;
      }
      /* Active state via Touch/Click on mobile */
      .expand-card.is-active {
        transform: scale(1);
        opacity: 1;
      }
    }
    
    .expand-card img {
      transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1), filter 0.7s ease;
      filter: grayscale(80%) brightness(0.6);
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Active Content visibility */
    .expand-card.is-active img,
    .expand-card:hover img {
      filter: grayscale(0%) brightness(0.85);
      transform: scale(1.05);
    }

    /* Vertical collapsed title */
    .collapsed-title {
      opacity: 1;
      transition: opacity 0.3s ease;
    }
    .expand-card.is-active .collapsed-title,
    .expand-card:hover .collapsed-title {
      opacity: 0;
      pointer-events: none;
    }

    /* Overlay data (Service info) */
    .active-overlay {
      opacity: 0;
      transform: translateY(15px);
      transition: opacity 0.3s ease, transform 0.3s ease;
      transition-delay: 0s;
      min-width: 200px;
    }
    .expand-card.is-active .active-overlay,
    .expand-card:hover .active-overlay {
      opacity: 1;
      transform: translateY(0);
      transition-delay: 0s; /* Instant appearance as requested */
    }

    @media (max-width: 639px) {
      /* Show overlay slightly differently on mobile native slider */
      .expand-card.is-active .active-overlay {
        opacity: 1;
      }
      .expand-card:not(.is-active) .active-overlay {
        opacity: 0 !important;
      }
      .expand-card:not(.is-active) .collapsed-title {
        opacity: 1 !important;
      }
    }
  </style>

  <!-- Standard Section Container (No Scroll Lock) -->
  <div class="relative w-full py-16 sm:py-24">
    
    <div class="relative z-10 w-full max-w-[1400px] mx-auto flex flex-col justify-center items-center">
        
        <!-- Header Area -->
        <div class="text-center mb-6 md:mb-12">
          <div class="mx-auto inline-flex items-center justify-center gap-2 rounded-full border border-[rgba(212,175,55,0.3)] bg-white/5 px-4 py-1.5 backdrop-blur-md mb-2 md:mb-4">
            <span class="font-body text-[10px] md:text-xs font-semibold uppercase tracking-widest text-[#d4af37]">Signature Services</span>
          </div>
          <h2 class="text-3xl font-heading tracking-tight text-white sm:text-5xl lg:text-6xl px-4">Everything your car needs.</h2>
        </div>

        <!-- Hover Cards Container (Always Horizontal Row) -->
        <div class="expand-cards-container flex flex-row w-full items-stretch justify-center gap-1.5 sm:gap-2 lg:gap-3 p-1 sm:p-2 bg-[#050505]">
          
          <?php foreach ($services_payload as $idx => $sp): ?>
            <!-- Adding js-service-panel class for tracking -->
            <div class="js-service-panel expand-card bg-neutral-900 shadow-2xl group outline-none" data-index="<?php echo (int) $idx; ?>" role="button" aria-expanded="false" aria-label="<?php echo htmlspecialchars($sp['title']); ?>">
              
              <!-- Background Image -->
              <img class="absolute inset-0 z-0 block" src="<?php echo htmlspecialchars($sp['image']); ?>" alt="Carzmo <?php echo htmlspecialchars($sp['title']); ?>" loading="lazy" />
              
              <!-- Gradient overlay for readability -->
              <div class="absolute inset-x-0 bottom-0 top-1/4 bg-gradient-to-t from-black/90 via-black/40 to-transparent z-10"></div>

              <!-- Vertical Label (Visible when collapsed on ALL devices) -->
              <div class="collapsed-title absolute inset-0 z-20 flex flex-col items-center justify-end pb-4 md:pb-10">
                 <div class="whitespace-nowrap -rotate-90 origin-bottom font-heading text-lg md:text-xl lg:text-2xl text-white tracking-wider">
                   <?php echo htmlspecialchars($sp['title']); ?>
                 </div>
              </div>

              <!-- Expanded Content Overlay -->
              <div class="active-overlay absolute inset-0 z-30 flex flex-col justify-end p-2 pb-2.5 sm:p-4 md:p-6 lg:p-8">
                
                <!-- High Contrast White Overlay Box - LEFT ALIGNED -->
                <div class="bg-white/95 backdrop-blur-xl rounded-[1rem] sm:rounded-2xl p-3 sm:p-5 md:p-6 shadow-2xl w-full border border-black/5 flex flex-col items-start text-left overflow-hidden">
                  
                  <!-- Top Badge (Index + Short Description) -->
                  <div class="inline-flex max-w-fit items-center gap-1 sm:gap-2 rounded-md bg-black/5 px-2 py-1 md:px-3 md:py-1.5 mb-1 sm:mb-2">
                    <span class="h-1 w-1 sm:h-1.5 sm:w-1.5 rounded-full bg-black"></span>
                    <span class="font-body text-[8px] sm:text-[10px] md:text-xs font-bold uppercase tracking-widest text-[#050505]">
                      0<?php echo $idx + 1; ?> <span class="hidden sm:inline">&mdash; <?php echo htmlspecialchars($sp['short']); ?></span>
                    </span>
                  </div>
                  
                  <!-- Main Golden Heading (Auto Workshop, Detailing, etc) -->
                  <h3 class="text-[1.3rem] sm:text-3xl md:text-4xl lg:text-5xl font-heading text-[#d4af37] font-black uppercase tracking-tight mb-2 md:mb-3 leading-[1.05] drop-shadow-sm">
                    <?php echo htmlspecialchars($sp['title']); ?>
                  </h3>
                  
                  <!-- Subtext Body -->
                  <p class="font-body text-[10px] sm:text-sm text-black/75 font-semibold line-clamp-2 md:line-clamp-3 mb-2.5 md:mb-5 lg:max-w-md hidden sm:block">
                    <?php echo htmlspecialchars($sp['body']); ?>
                  </p>
                  
                  <!-- CTA Button (Left Aligned) -->
                  <a href="<?php echo htmlspecialchars($sp['href']); ?>" class="inline-flex w-fit items-center gap-1 sm:gap-2 rounded-full bg-black px-3 py-1.5 sm:px-6 sm:py-3 font-body text-[9px] sm:text-xs font-bold text-white transition-all duration-300 hover:bg-[#d4af37] hover:text-black">
                    <span class="hidden sm:inline">Explore Details</span>
                    <span class="inline sm:hidden">Explore</span>
                    <svg class="h-2.5 w-2.5 sm:h-3 sm:w-3 md:w-4 md:h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                  </a>
                </div>

              </div>

            </div>
          <?php endforeach; ?>

        </div>
      </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const cards = document.querySelectorAll('.js-service-panel');
  
  // Desktop Default Expansion Clear on Hover
  const container = document.querySelector('.expand-cards-container');
  if(container) {
    container.addEventListener('mouseenter', () => {
      // Once user intentionally hovers the container, we can remove default-expanded
      // so pure CSS hover takes over perfectly.
      const def = container.querySelector('.default-expanded');
      if(def) def.classList.remove('default-expanded');
    }, {once: true});
  }

  // Mobile Hand Slider logic
  if(window.innerWidth < 640) {
    // Initial active card is the first one
    if(cards[0]) cards[0].classList.add('is-active');

    cards.forEach(card => {
      card.addEventListener('click', function() {
        cards.forEach(c => c.classList.remove('is-active'));
        this.classList.add('is-active');
        // Instantly snap to the clicked card smoothly
        this.scrollIntoView({ behavior: "smooth", block: "nearest", inline: "center" });
      });
    });
  }
});
</script>
