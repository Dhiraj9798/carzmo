<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$slug = isset($_GET['slug']) ? (string) $_GET['slug'] : '';
$service = $slug !== '' ? carzmo_get_service_by_slug($slug) : null;
if (!$service) {
    header('Location: ' . carzmo_url('services.php'), true, 302);
    exit;
}

$carzmo_page = 'service';
$carzmo_page_title = $service['title'] . ' | ' . $CARZMO['name'];

require __DIR__ . '/includes/header.php';
?>
<main class="min-h-screen bg-black text-white">
<?php
$img0 = carzmo_img($service['images'][0]);
$ct = carzmo_url('contact.php');
$sv = carzmo_url('services.php');
?>
<section class="relative min-h-[50vh] overflow-hidden">
  <img src="<?php echo htmlspecialchars($img0); ?>" alt="" class="absolute inset-0 h-full w-full object-cover" width="1920" height="1080" />
  <div class="absolute inset-0 bg-black/60"></div>
  <div class="absolute inset-0 bg-gradient-to-t from-black via-black/30 to-transparent"></div>
  <div class="relative z-10 flex min-h-[50vh] flex-col justify-between px-6 pb-10 pt-24 sm:px-8 lg:px-16 lg:pt-28">
    <div>
      <a href="<?php echo htmlspecialchars($sv); ?>" class="inline-flex items-center gap-2 font-body text-sm text-white/70 transition-colors hover:text-white">
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        All services
      </a>
    </div>
    <div class="reveal-on-scroll is-inview">
      <div class="inline-flex rounded-full px-3 py-1 font-body text-xs font-medium text-white/90 liquid-glass"><?php echo htmlspecialchars($service['title']); ?></div>
      <h1 class="mt-4 max-w-3xl font-heading text-4xl italic text-white md:text-5xl lg:text-6xl"><?php echo htmlspecialchars($service['short']); ?></h1>
      <p class="mt-5 max-w-2xl font-body text-sm leading-relaxed text-white/75 md:text-base"><?php echo htmlspecialchars($service['body']); ?></p>
      <ul class="mt-8 max-w-xl space-y-2.5 font-body text-sm text-white/80 md:text-base">
        <?php foreach ($service['highlights'] as $line): ?>
          <li class="flex gap-3">
            <svg class="mt-0.5 h-5 w-5 shrink-0 text-emerald-400/90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 6 9 17l-5-5"/></svg>
            <span><?php echo htmlspecialchars($line); ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <a href="<?php echo htmlspecialchars($ct); ?>" class="liquid-glass-strong mt-8 inline-flex items-center gap-2 rounded-full px-5 py-2.5 font-body text-sm font-medium text-white">
        Enquire now
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
      </a>
    </div>
  </div>
</section>

<style>
  /* Gallery Grid — 1 col mobile, 4 col desktop */
  .gallery-grid {
    display: grid;
    grid-template-columns: 1fr;
    gap: 1rem;
    margin-top: 2.5rem;
  }
  @media (min-width: 640px) {
    .gallery-grid {
      grid-template-columns: repeat(4, 1fr);
      gap: 1.25rem;
    }
  }

  /* Glassmorphism Gallery Cards */
  .gallery-glass-card {
    position: relative;
    overflow: hidden;
    border-radius: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.08);
    transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), box-shadow 0.5s ease;
    cursor: pointer;
  }
  /* Desktop: compact equal cards in one row */
  @media (min-width: 640px) {
    .gallery-glass-card {
      aspect-ratio: 3 / 4;
      border-radius: 1.25rem;
    }
  }
  .gallery-glass-card:hover {
    transform: scale(1.03);
    box-shadow: 0 20px 60px rgba(212, 175, 55, 0.15), 0 0 0 1px rgba(212, 175, 55, 0.2);
  }
  .gallery-glass-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1), filter 0.5s ease;
  }
  .gallery-glass-card:hover img {
    transform: scale(1.05);
    filter: brightness(0.75);
  }
  /* Glassmorphism overlay at the bottom */
  .gallery-glass-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1rem;
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(16px) saturate(180%);
    -webkit-backdrop-filter: blur(16px) saturate(180%);
    border-top: 1px solid rgba(255, 255, 255, 0.12);
    transform: translateY(100%);
    transition: transform 0.45s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.45s ease;
    opacity: 0;
  }
  .gallery-glass-card:hover .gallery-glass-overlay {
    transform: translateY(0);
    opacity: 1;
  }
  .gallery-glass-overlay .glass-num {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 22px;
    height: 22px;
    border-radius: 6px;
    background: linear-gradient(135deg, #d4af37, #b8962e);
    font-size: 10px;
    font-weight: 800;
    color: #000;
    margin-right: 8px;
    flex-shrink: 0;
  }
  .gallery-glass-overlay .glass-text {
    font-size: 12px;
    font-weight: 600;
    color: rgba(255, 255, 255, 0.92);
    line-height: 1.4;
    letter-spacing: 0.01em;
  }
  /* Mobile: full-width photos, always show overlay */
  @media (max-width: 639px) {
    .gallery-glass-card {
      aspect-ratio: auto;
      max-height: none;
      border-radius: 1rem;
    }
    .gallery-glass-overlay {
      transform: translateY(0);
      opacity: 1;
      padding: 0.6rem 0.75rem;
      background: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(12px);
    }
    .gallery-glass-overlay .glass-text {
      font-size: 10px;
    }
    .gallery-glass-overlay .glass-num {
      width: 18px;
      height: 18px;
      font-size: 8px;
    }
  }

  /* ── Lightbox ── */
  .carzmo-lightbox {
    position: fixed;
    inset: 0;
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0);
    backdrop-filter: blur(0px);
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.4s ease, background 0.4s ease, backdrop-filter 0.4s ease, visibility 0s 0.4s;
  }
  .carzmo-lightbox.is-open {
    visibility: visible;
    opacity: 1;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(20px);
    transition: opacity 0.4s ease, background 0.4s ease, backdrop-filter 0.4s ease, visibility 0s 0s;
  }
  .carzmo-lightbox-wrap {
    position: relative;
    max-width: 90vw;
    max-height: 85vh;
    transform: scale(0.85) translateY(30px);
    opacity: 0;
    transition: transform 0.45s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
  }
  .carzmo-lightbox.is-open .carzmo-lightbox-wrap {
    transform: scale(1) translateY(0);
    opacity: 1;
  }
  .carzmo-lightbox-wrap img {
    display: block;
    max-width: 90vw;
    max-height: 85vh;
    width: auto;
    height: auto;
    border-radius: 1rem;
    box-shadow: 0 30px 80px rgba(0, 0, 0, 0.6);
    border: 1px solid rgba(255, 255, 255, 0.1);
  }
  /* Close button — outside top-right of image */
  .carzmo-lightbox-close {
    position: absolute;
    top: -48px;
    right: -4px;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    cursor: pointer;
    transition: background 0.3s ease, transform 0.3s ease;
    z-index: 10;
  }
  .carzmo-lightbox-close:hover {
    background: rgba(212, 175, 55, 0.3);
    transform: rotate(90deg);
  }
  .carzmo-lightbox-close svg {
    width: 18px;
    height: 18px;
    stroke: #fff;
    stroke-width: 2.5;
  }
  /* Caption below image in lightbox */
  .carzmo-lightbox-caption {
    position: absolute;
    bottom: -40px;
    left: 0;
    right: 0;
    text-align: center;
    font-size: 13px;
    font-weight: 500;
    color: rgba(255, 255, 255, 0.7);
    letter-spacing: 0.02em;
  }
  @media (max-width: 639px) {
    .carzmo-lightbox-wrap {
      max-width: 95vw;
      max-height: 80vh;
    }
    .carzmo-lightbox-wrap img {
      max-width: 95vw;
      max-height: 80vh;
      border-radius: 0.75rem;
    }
    .carzmo-lightbox-close {
      top: -44px;
      right: 0;
      width: 36px;
      height: 36px;
    }
    .carzmo-lightbox-caption {
      font-size: 11px;
      bottom: -32px;
    }
  }
</style>

<!-- Gallery Section -->
<section class="bg-black px-6 py-16 sm:px-8 lg:px-16">
  <div class="mx-auto max-w-[1400px]">
    <h2 class="font-body text-xs font-semibold uppercase tracking-[0.2em] text-white/40">Gallery</h2>
    <p class="mt-2 font-heading text-2xl italic text-white md:text-3xl">On the job</p>
    <div class="gallery-grid">
      <?php 
      $captions = isset($service['captions']) ? $service['captions'] : [];
      foreach ($service['images'] as $i => $imgName):
          $src = carzmo_img($imgName);
          $caption = isset($captions[$i]) ? $captions[$i] : '';
          ?>
        <div class="reveal-on-scroll gallery-glass-card group" data-lightbox-src="<?php echo htmlspecialchars($src); ?>" data-lightbox-caption="<?php echo htmlspecialchars($caption); ?>">
          <img src="<?php echo htmlspecialchars($src); ?>" alt="<?php echo htmlspecialchars($caption ?: ($service['title'] . ' ' . ($i + 1))); ?>" width="600" height="450" loading="lazy" />
          <?php if ($caption): ?>
          <div class="gallery-glass-overlay">
            <div style="display:flex;align-items:flex-start;">
              <span class="glass-num">0<?php echo $i + 1; ?></span>
              <span class="glass-text"><?php echo htmlspecialchars($caption); ?></span>
            </div>
          </div>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Lightbox Modal -->
<div class="carzmo-lightbox" id="carzmoLightbox">
  <div class="carzmo-lightbox-wrap">
    <button class="carzmo-lightbox-close" id="carzmoLightboxClose" aria-label="Close">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>
    <img src="" alt="" id="carzmoLightboxImg" />
    <div class="carzmo-lightbox-caption" id="carzmoLightboxCaption"></div>
  </div>
</div>

<script>
(function() {
  const lightbox = document.getElementById('carzmoLightbox');
  const lbImg = document.getElementById('carzmoLightboxImg');
  const lbCaption = document.getElementById('carzmoLightboxCaption');
  const lbClose = document.getElementById('carzmoLightboxClose');

  // Open lightbox on card click
  document.querySelectorAll('.gallery-glass-card[data-lightbox-src]').forEach(function(card) {
    card.addEventListener('click', function() {
      var src = this.getAttribute('data-lightbox-src');
      var caption = this.getAttribute('data-lightbox-caption') || '';
      lbImg.src = src;
      lbImg.alt = caption;
      lbCaption.textContent = caption;
      lightbox.classList.add('is-open');
      document.body.style.overflow = 'hidden';
    });
  });

  // Close lightbox
  function closeLightbox() {
    lightbox.classList.remove('is-open');
    document.body.style.overflow = '';
    setTimeout(function() { lbImg.src = ''; }, 400);
  }

  lbClose.addEventListener('click', function(e) {
    e.stopPropagation();
    closeLightbox();
  });

  // Click outside image to close
  lightbox.addEventListener('click', function(e) {
    if (e.target === lightbox) closeLightbox();
  });

  // Escape key to close
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && lightbox.classList.contains('is-open')) closeLightbox();
  });
})();
</script>

</main>
<?php
require __DIR__ . '/includes/footer.php';

