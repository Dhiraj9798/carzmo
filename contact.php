<?php
declare(strict_types=1);

require_once __DIR__ . '/includes/config.php';

$carzmo_page = 'contact';
$carzmo_page_title = 'Enquiry | ' . $CARZMO['name'];

require __DIR__ . '/includes/header.php';

$tel = preg_replace('/\s+/', '', $CARZMO['phone']);
?>
<main class="min-h-screen bg-black text-white">
<?php
$ix = carzmo_url('index.php');
$contactHero = carzmo_img('contact.jpeg');
?>
<section class="relative min-h-[50vh] overflow-hidden sm:min-h-[55vh]">
  <!-- Image cropped: top 20% and bottom 20% hidden by expanding image beyond container -->
  <img src="<?php echo htmlspecialchars($contactHero); ?>" alt="" class="absolute w-full object-cover" style="top:-45%;left:0;right:0;height:150%;object-position:center center;" width="1920" height="1080" fetchpriority="high" />
  <div class="absolute inset-0 bg-black/30"></div>
  <div class="absolute inset-0" style="background:linear-gradient(to top, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.3) 10%, transparent 30%);"></div>
  <div class="relative z-10 flex min-h-[50vh] flex-col justify-end px-6 pb-12 pt-28 sm:min-h-[55vh] sm:px-8 lg:px-16 lg:pb-16 lg:pt-32">
    <div class="reveal-on-scroll is-inview">
      <p class="font-body text-xs font-semibold uppercase tracking-[0.2em] text-white/60">Contact Us</p>
      <h1 class="mt-2 max-w-3xl font-heading text-4xl italic text-white md:text-5xl lg:text-6xl">Let's talk about your car.</h1>
      <p class="mt-4 max-w-xl font-body text-sm text-white/70 md:text-base">
        Share your details and what you need—we'll get back to you swiftly.
      </p>
    </div>
  </div>
</section>

<div class="mx-auto max-w-2xl px-6 pb-16 pt-12 md:px-8 lg:px-16">
  <div class="mb-8 flex flex-wrap items-center gap-4">
    <button type="button" class="inline-flex items-center gap-2 font-body text-sm text-white/55 transition-colors hover:text-white" onclick="history.back()">
      <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
      Back
    </button>
    <a href="<?php echo htmlspecialchars($ix); ?>" class="font-body text-sm text-white/45 underline-offset-4 transition-colors hover:text-white hover:underline">Home</a>
  </div>

  <h1 class="font-heading text-4xl italic text-white md:text-5xl">Enquiry</h1>
  <p class="mt-3 font-body text-sm leading-relaxed text-white/60">
    Share your details and what you need. Your cart from the gallery can be pre-filled here when
    you tap <span class="text-white/80">Enquiry</span> there.
  </p>

  <div class="liquid-glass mt-10 space-y-5 rounded-2xl p-6 md:p-8">
    <div>
      <label for="enq-name" class="font-body text-xs font-medium uppercase tracking-wide text-white/50">Name</label>
      <input id="enq-name" type="text" autocomplete="name" class="mt-2 w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 font-body text-sm text-white outline-none ring-0 placeholder:text-white/30 focus:border-white/35" placeholder="Your name" />
    </div>
    <div>
      <label for="enq-phone" class="font-body text-xs font-medium uppercase tracking-wide text-white/50">Phone</label>
      <input id="enq-phone" type="tel" autocomplete="tel" inputmode="tel" class="mt-2 w-full rounded-xl border border-white/15 bg-white/5 px-4 py-3 font-body text-sm text-white outline-none placeholder:text-white/30 focus:border-white/35" placeholder="+91 …" />
    </div>
    <div>
      <label for="enq-msg" class="font-body text-xs font-medium uppercase tracking-wide text-white/50">Message</label>
      <textarea id="enq-msg" rows="8" class="mt-2 w-full resize-y rounded-xl border border-white/15 bg-white/5 px-4 py-3 font-body text-sm leading-relaxed text-white outline-none placeholder:text-white/30 focus:border-white/35" placeholder="What would you like to know?"></textarea>
    </div>

    <div class="flex flex-col gap-3 pt-2 sm:flex-row sm:flex-wrap">
      <!-- Removed JS WhatsApp button, only direct WhatsApp and Call Us remain -->
      <a href="https://wa.me/918100364196" target="_blank" rel="noopener noreferrer" id="enq-wa-direct" class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-[#25D366] px-6 py-3 font-body text-sm font-semibold text-white transition-opacity hover:opacity-95">
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        WhatsApp Direct
      </a>

<script>
  // WhatsApp Direct button: send form data to WhatsApp
  document.getElementById('enq-wa-direct')?.addEventListener('click', function (e) {
    e.preventDefault();
    var name = document.getElementById('enq-name')?.value.trim() || '-';
    var phone = document.getElementById('enq-phone')?.value.trim() || '-';
    var message = document.getElementById('enq-msg')?.value.trim() || 'I would like to enquire about your products and services.';
    var brand = 'Carzmo Motors';
    var body = [
      'Hello ' + brand + ',',
      '',
      'Name: ' + name,
      'Phone: ' + phone,
      '',
      message
    ].join('\n');
    var waUrl = 'https://wa.me/918100364196?text=' + encodeURIComponent(body);
    window.open(waUrl, '_blank', 'noopener,noreferrer');
  });
</script>
      <a href="tel:<?php echo htmlspecialchars($tel); ?>" class="liquid-glass inline-flex flex-1 items-center justify-center gap-2 rounded-full px-6 py-3 font-body text-sm font-medium text-white">
        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
        Call us
      </a>
    </div>

  </div>
</div>

<!-- Google Maps Location -->
<div class="mt-10 rounded-2xl overflow-hidden shadow-lg">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14754.868156080369!2d88.4027106516541!3d22.402022217456583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a026de8da2485e3%3A0x5d8a12edbde2984a!2sCarzmo%20Motors!5e0!3m2!1sen!2sin!4v1776321411418!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

</main>
<?php
require __DIR__ . '/includes/footer.php';
