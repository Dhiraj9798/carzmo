<?php
declare(strict_types=1);
/** @var array $CARZMO_GALLERY_CATALOG */
?>
<section id="gallery" class="scroll-mt-[4.5rem] bg-black px-4 py-20 sm:px-8 lg:px-16">
  <div class="mx-auto max-w-[1400px]">
    <div class="reveal-on-scroll mx-auto max-w-3xl text-center">
      <div class="mx-auto inline-flex rounded-full px-3.5 py-1 font-body text-xs font-medium text-white liquid-glass">Shop</div>
      <h2 class="mt-6 text-3xl leading-[0.95] font-heading tracking-tight text-white italic sm:text-4xl md:text-5xl lg:text-6xl">Work that speaks for itself.</h2>
      <p class="mt-5 font-body text-sm leading-relaxed font-light text-white/60 md:text-base">
        Browse by category, add items to your cart, then reach us on WhatsApp or send a formal
        enquiry.
      </p>
    </div>

    <div class="mt-14 lg:grid lg:grid-cols-12 lg:items-start lg:gap-10">
      <div class="lg:col-span-8">
        <?php foreach ($CARZMO_GALLERY_CATALOG as $cat): ?>
          <div class="mb-16 scroll-mt-28 last:mb-0" id="cat-<?php echo htmlspecialchars($cat['id']); ?>">
            <div class="mb-6 flex items-center gap-2 border-b border-white/10 pb-3">
              <span class="text-lg text-white/35" aria-hidden="true">✤</span>
              <h3 class="font-heading text-xl italic text-white md:text-2xl"><?php echo htmlspecialchars($cat['title']); ?></h3>
            </div>
            <div class="grid grid-cols-2 gap-3 sm:gap-4 md:grid-cols-2 lg:grid-cols-3">
              <?php foreach ($cat['products'] as $product):
                  $pid = $product['id'];
                  $pimg = carzmo_img($product['image']);
                  ?>
                <div class="reveal-on-scroll">
                  <div class="liquid-glass group flex flex-col overflow-hidden rounded-2xl border border-white/10" data-product-card="<?php echo htmlspecialchars($pid); ?>">
                    <div class="relative aspect-[4/5] w-full overflow-hidden rounded-t-2xl bg-white">
                      <div class="flex h-full w-full items-center justify-center p-3 sm:p-4">
                        <img src="<?php echo htmlspecialchars($pimg); ?>" alt="<?php echo htmlspecialchars($product['title']); ?>" class="max-h-full max-w-full object-contain object-center transition-transform duration-500 group-hover:scale-[1.02]" width="400" height="500" sizes="(max-width: 640px) 50vw, (max-width: 1024px) 33vw, 25vw" loading="lazy" decoding="async" />
                      </div>
                    </div>
                    <div class="flex flex-1 flex-col rounded-b-2xl bg-black/80 p-4">
                      <h3 class="font-body text-sm font-medium leading-snug text-white md:text-base"><?php echo htmlspecialchars($product['title']); ?></h3>
                      <div class="mt-4 flex items-center justify-between gap-2" data-cart-controls="<?php echo htmlspecialchars($pid); ?>">
                        <button type="button" class="cart-add-btn w-full rounded-full bg-white py-2.5 text-center font-body text-xs font-semibold text-black transition-opacity hover:opacity-90 md:text-sm">Add to cart</button>
                        <div class="cart-qty-row hidden w-full items-center justify-between rounded-full border border-white/15 bg-white/5 px-2 py-1.5">
                          <button type="button" class="cart-dec-btn flex h-9 w-9 items-center justify-center rounded-full text-white/80 transition-colors hover:bg-white/10 hover:text-white" aria-label="Decrease quantity">
                            <svg class="cart-trash-icon hidden h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                            <svg class="cart-minus-icon h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/></svg>
                          </button>
                          <span class="cart-qty-label min-w-[2rem] text-center font-body text-sm font-semibold tabular-nums text-white">0</span>
                          <button type="button" class="cart-inc-btn flex h-9 w-9 items-center justify-center rounded-full text-white/80 transition-colors hover:bg-white/10 hover:text-white" aria-label="Increase quantity">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <aside class="mt-12 hidden lg:col-span-4 lg:sticky lg:top-28 lg:mt-0 lg:block">
        <div class="liquid-glass flex flex-col overflow-hidden rounded-2xl border border-white/10" id="cart-panel-desktop">
          <div class="flex items-center gap-2 border-b border-white/10 px-4 py-3">
            <svg class="h-5 w-5 text-white/80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
            <h3 class="font-body text-sm font-semibold text-white">Cart</h3>
            <span id="cart-badge-desktop" class="ml-auto hidden rounded-full bg-white/15 px-2 py-0.5 font-body text-xs tabular-nums text-white"></span>
          </div>
          <div class="max-h-[min(50vh,420px)] overflow-y-auto px-4 py-3">
            <ul id="cart-lines-desktop" class="space-y-3"></ul>
            <p id="cart-empty-desktop" class="py-6 text-center font-body text-sm text-white/45">Add products from the catalog. Your cart stays in this browser session.</p>
          </div>
          <div id="cart-clear-wrap-desktop" class="hidden border-t border-white/10 px-4 py-2">
            <button type="button" id="cart-clear-desktop" class="w-full rounded-lg py-2 font-body text-xs text-white/45 transition-colors hover:text-white/70">Clear cart</button>
          </div>
          <div class="space-y-2 border-t border-white/10 p-4">
            <button type="button" id="cart-wa-desktop" class="flex w-full items-center justify-center gap-2 rounded-full bg-[#25D366] py-3 font-body text-sm font-semibold text-white transition-opacity hover:opacity-95">
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
              WhatsApp
            </button>
            <button type="button" id="cart-enquiry-desktop" class="flex w-full items-center justify-center gap-2 rounded-full bg-white py-3 font-body text-sm font-medium text-black transition-opacity hover:opacity-90">
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
              Enquiry
            </button>
            <p id="cart-hint-desktop" class="text-center font-body text-[11px] leading-relaxed text-white/40">Add products for a detailed list—or use the buttons for a general message.</p>
          </div>
        </div>
      </aside>
    </div>

    <div class="lg:hidden">
      <button type="button" id="mobile-cart-fab" class="mobile-cart-bar fixed left-4 right-4 z-40 hidden items-center justify-between rounded-2xl px-5 py-4 shadow-lg bottom-[max(1rem,env(safe-area-inset-bottom,0px))] bg-white" aria-label="Open cart">
        <span class="flex items-center gap-2 font-body text-sm font-bold text-black">
          <svg class="h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span id="mobile-cart-fab-text"></span>
        </span>
        <span class="font-body text-xs font-bold text-black">View</span>
      </button>

      <div id="mobile-cart-overlay" class="fixed inset-0 z-50 hidden flex-col justify-end bg-black/70 backdrop-blur-sm">
        <button type="button" class="absolute inset-0 cursor-default" id="mobile-cart-scrim" aria-label="Close"></button>
        <div id="mobile-cart-drawer" class="relative max-h-[85vh] overflow-hidden rounded-t-3xl border border-white/10 bg-black p-4 shadow-2xl">
          <div class="mb-3 flex items-center justify-between">
            <span class="font-body text-sm font-semibold text-white">Your cart</span>
            <button type="button" id="mobile-cart-close" class="rounded-full p-2 text-white/60 hover:bg-white/10 hover:text-white" aria-label="Close cart">
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
          </div>
          <div class="liquid-glass flex flex-col overflow-hidden rounded-2xl border border-white/10" id="cart-panel-mobile">
            <div class="flex items-center gap-2 border-b border-white/10 px-4 py-3">
              <svg class="h-5 w-5 text-white/80" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"/><path d="M3 6h18"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
              <h3 class="font-body text-sm font-semibold text-white">Cart</h3>
              <span id="cart-badge-mobile" class="ml-auto hidden rounded-full bg-white/15 px-2 py-0.5 font-body text-xs tabular-nums text-white"></span>
            </div>
            <div class="max-h-[min(50vh,420px)] overflow-y-auto px-4 py-3">
              <ul id="cart-lines-mobile" class="space-y-3"></ul>
              <p id="cart-empty-mobile" class="py-6 text-center font-body text-sm text-white/45">Add products from the catalog. Your cart stays in this browser session.</p>
            </div>
            <div id="cart-clear-wrap-mobile" class="hidden border-t border-white/10 px-4 py-2">
              <button type="button" id="cart-clear-mobile" class="w-full rounded-lg py-2 font-body text-xs text-white/45 transition-colors hover:text-white/70">Clear cart</button>
            </div>
            <div class="space-y-2 border-t border-white/10 p-4">
              <button type="button" id="cart-wa-mobile" class="flex w-full items-center justify-center gap-2 rounded-full bg-[#25D366] py-3 font-body text-sm font-semibold text-white transition-opacity hover:opacity-95">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
                WhatsApp
              </button>
              <button type="button" id="cart-enquiry-mobile" class="flex w-full items-center justify-center gap-2 rounded-full bg-white py-3 font-body text-sm font-medium text-black transition-opacity hover:opacity-90">
                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m22 2-7 20-4-9-9-4Z"/><path d="M22 2 11 13"/></svg>
                Enquiry
              </button>
              <p id="cart-hint-mobile" class="text-center font-body text-[11px] leading-relaxed text-white/40">Add products for a detailed list—or use the buttons for a general message.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
