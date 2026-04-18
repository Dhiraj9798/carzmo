<?php
declare(strict_types=1);
/** @var array $CARZMO */
/** @var string $carzmo_page */
$wa_href = 'https://wa.me/918100364196';
$services_url = carzmo_url('services.php');
$about_url = carzmo_url('about.php');
$gallery_url = carzmo_url('gallery.php');
$contact_url = carzmo_url('contact.php');
$legal_privacy = carzmo_url('legal.php?p=privacy');
$legal_terms = carzmo_url('legal.php?p=terms');
$carzmo_on_home = ($carzmo_page ?? '') === 'home';
?>
<section id="contact" class="relative scroll-mt-[4.5rem] overflow-hidden bg-black pb-12">
  <img src="<?php echo htmlspecialchars(carzmo_img('detailing2.jpeg')); ?>" alt="" class="absolute inset-0 h-full w-full object-cover opacity-35" width="1920" height="1080" loading="lazy" decoding="async" aria-hidden="true" />
  <div class="pointer-events-none absolute inset-0 z-[1] bg-black/70" aria-hidden="true"></div>
  <div class="pointer-events-none absolute inset-x-0 top-0 z-[1] h-[200px]" style="background: linear-gradient(to bottom, black, transparent)"></div>
  <div class="pointer-events-none absolute inset-x-0 bottom-0 z-[1] h-[200px]" style="background: linear-gradient(to top, black, transparent)"></div>

  <div class="relative z-10 mx-auto max-w-5xl px-8 py-24 lg:px-16">
    <div class="reveal-on-scroll text-center">
      <h2 class="max-w-4xl mx-auto text-5xl leading-[0.85] font-heading text-white italic md:text-6xl lg:text-7xl">Ready when you are.</h2>
      <p class="mx-auto mt-6 max-w-2xl font-body text-sm leading-relaxed font-light text-white/65 md:text-base">
        Call, message, or visit—tell us what you drive and what you want. We will guide you with
        honest options and a premium finish.
      </p>
    </div>

    <div class="mt-14 grid gap-6 md:grid-cols-2">
      <a href="tel:<?php echo htmlspecialchars(preg_replace('/\s+/', '', $CARZMO['phone'])); ?>" class="liquid-glass flex items-start gap-4 rounded-2xl p-6 text-left transition-colors hover:bg-white/10">
        <div class="liquid-glass-strong flex h-11 w-11 shrink-0 items-center justify-center rounded-full">
          <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        </div>
        <div>
          <div class="font-body text-xs font-medium uppercase tracking-wide text-white/50">Phone</div>
          <div class="mt-1 font-body text-lg font-medium text-white"><?php echo htmlspecialchars($CARZMO['phone']); ?></div>
        </div>
      </a>

      <a href="<?php echo htmlspecialchars($wa_href); ?>" target="_blank" rel="noopener noreferrer" class="liquid-glass flex items-start gap-4 rounded-2xl p-6 text-left transition-colors hover:bg-white/10">
        <div class="liquid-glass-strong flex h-11 w-11 shrink-0 items-center justify-center rounded-full">
          <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        </div>
        <div>
          <div class="font-body text-xs font-medium uppercase tracking-wide text-white/50">WhatsApp</div>
          <div class="mt-1 font-body text-lg font-medium text-white"><?php echo htmlspecialchars($CARZMO['whatsapp']); ?></div>
        </div>
      </a>

      <a href="<?php echo htmlspecialchars($CARZMO['instagram']); ?>" target="_blank" rel="noopener noreferrer" class="liquid-glass flex items-start gap-4 rounded-2xl p-6 text-left transition-colors hover:bg-white/10">
        <div class="liquid-glass-strong flex h-11 w-11 shrink-0 items-center justify-center rounded-full">
          <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M16 8v8M8 8v8"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>
        </div>
        <div>
          <div class="font-body text-xs font-medium uppercase tracking-wide text-white/50">Instagram</div>
          <div class="mt-1 break-all font-body text-sm font-medium text-white md:text-base">@carzmomotors</div>
        </div>
      </a>

      <div class="liquid-glass flex items-start gap-4 rounded-2xl p-6 text-left">
        <div class="liquid-glass-strong flex h-11 w-11 shrink-0 items-center justify-center rounded-full">
          <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
        </div>
        <div>
          <div class="font-body text-xs font-medium uppercase tracking-wide text-white/50">Location</div>
          <div class="mt-1 font-body text-sm leading-relaxed text-white/90 md:text-base"><?php echo htmlspecialchars($CARZMO['location']); ?></div>
        </div>
      </div>
    </div>

    <div class="mt-12 flex flex-wrap items-center justify-center gap-4">
      <a href="<?php echo htmlspecialchars($services_url); ?>" class="liquid-glass-strong inline-flex items-center gap-2 rounded-full px-6 py-3 font-body text-sm font-medium text-white">
        View services
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
      </a>
      <a href="<?php echo htmlspecialchars($wa_href); ?>" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 rounded-full bg-white px-6 py-3 font-body text-sm font-medium text-black transition-opacity hover:opacity-90">WhatsApp us</a>
    </div>

    <!-- Premium Embedded Footer -->

    <!-- Compact, Professional Footer -->
    <footer class="w-full bg-[#101012] border-t border-[#d4af37]/20 py-8 px-4">
      <div class="max-w-5xl mx-auto flex flex-col md:flex-row md:justify-between items-center gap-8 md:gap-0">
        <div class="flex flex-col items-center md:items-start text-center md:text-left">
          <a href="<?php echo htmlspecialchars(carzmo_url('index.php')); ?>" class="mb-2 inline-block">
            <img src="<?php echo htmlspecialchars(carzmo_img('logo.png')); ?>" alt="Carzmo Motors" class="h-9 w-auto object-contain" />
          </a>
          <p class="text-xs text-[#d4af37] font-semibold mb-3 leading-relaxed">Experience the pinnacle of automotive care</p>
          <div class="flex gap-2 mt-3">
            <a href="<?php echo htmlspecialchars($CARZMO['instagram']); ?>" target="_blank" aria-label="Instagram" class="hover:text-[#d4af37] transition"><svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg></a>
            <a href="#" target="_blank" aria-label="Facebook" class="hover:text-[#d4af37] transition"><svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
            <a href="#" target="_blank" aria-label="YouTube" class="hover:text-[#d4af37] transition"><svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg></a>
          </div>
        </div>
        <div class="flex flex-col items-center md:items-end text-center md:text-right text-xs text-[#bdbdbd] gap-3">
          <div class="flex items-center gap-2 leading-relaxed"><svg class="h-4 w-4 text-[#d4af37]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5z"/></svg>1154 Badehooghly Dakshin, Kolkata</div>
          <div class="flex items-center gap-2 leading-relaxed"><svg class="h-4 w-4 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 4.01V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4.01A2 2 0 0 1 4 2h16a2 2 0 0 1 2 2.01z"/><polyline points="22,6 12,13 2,6"/></svg><a href="mailto:Carzmomotors@gmail.com" class="hover:text-[#d4af37] transition">Carzmomotors@gmail.com</a></div>
          <div class="flex items-center gap-2 leading-relaxed"><svg class="h-4 w-4 text-[#d4af37]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92V19a2 2 0 0 1-2 2A19.72 19.72 0 0 1 3 5a2 2 0 0 1 2-2h2.09a2 2 0 0 1 2 1.72c.13 1.13.37 2.23.72 3.28a2 2 0 0 1-.45 2.11l-1.27 1.27a16 16 0 0 0 6.29 6.29l1.27-1.27a2 2 0 0 1 2.11-.45c1.05.35 2.15.59 3.28.72A2 2 0 0 1 22 16.92z"/></svg><a href="tel:+918100364196" class="hover:text-[#d4af37] transition">+91 8100364196</a></div>
        </div>
      </div>
      <div class="mt-8 text-center text-xs text-[#bdbdbd] leading-relaxed space-y-1">
        <div>© 2026 Carzmo Motors. <span class="text-[#d4af37]">Designed with Excellence.</span> All rights reserved.</div>
        <div>Developed by <a href="https://bnintelhub.com/" target="_blank" class="text-[#d4af37] font-semibold hover:underline">BNIntelHub</a></div>
      </div>
    </footer>
