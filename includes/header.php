<?php
declare(strict_types=1);
/** @var array $CARZMO */
/** @var array $CARZMO_SERVICES */
/** @var string $carzmo_page home|about|services|service|contact|gallery|legal */
/** @var string $carzmo_page_title */

$carzmo_page = $carzmo_page ?? '';
if (!isset($carzmo_page_title)) {
    $carzmo_page_title = $CARZMO['name'] . ' — Premium Automotive Care | Kolkata';
}
$carzmo_nav_landing = $carzmo_page === 'home';
$services_nav_active = in_array($carzmo_page, ['services', 'service'], true);
$about_nav_active = $carzmo_page === 'about';
$contact_nav_active = $carzmo_page === 'contact';
$gallery_nav_active = $carzmo_page === 'gallery';
$index = carzmo_url('index.php');
$about_page = carzmo_url('about.php');
$services_page = carzmo_url('services.php');
$contact_page = carzmo_url('contact.php');
$gallery_page = carzmo_url('gallery.php');

function carzmo_nav_item_classes(bool $active): string
{
    return $active
        ? 'rounded-full px-2 py-1.5 font-body text-[13px] font-medium transition-colors duration-200 lg:px-3 lg:py-2 lg:text-sm bg-white/18 text-white shadow-inner shadow-white/5'
        : 'rounded-full px-2 py-1.5 font-body text-[13px] font-medium transition-colors duration-200 lg:px-3 lg:py-2 lg:text-sm text-white/85 hover:bg-white/10 hover:text-white';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="<?php echo htmlspecialchars(carzmo_asset('favicon.svg')); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($carzmo_page_title); ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Barlow:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo htmlspecialchars(carzmo_asset('css/app.css')); ?>" />
</head>
<body class="min-h-full bg-black font-body text-foreground antialiased" data-page="<?php echo htmlspecialchars($carzmo_page); ?>" data-contact-url="<?php echo htmlspecialchars(carzmo_url('contact.php')); ?>">
<header class="nav-glass-bar fixed top-0 right-0 left-0 z-[200]">
  <div class="mx-auto grid max-w-[1600px] grid-cols-[auto_minmax(0,1fr)_auto] items-center gap-2 px-3 py-3 sm:gap-3 sm:px-5 lg:gap-4 lg:px-10">
    <a href="<?php echo htmlspecialchars($index); ?>" class="shrink-0 justify-self-start" data-nav-close aria-label="<?php echo htmlspecialchars($CARZMO['name']); ?> home">
      <img src="<?php echo htmlspecialchars(carzmo_img('logo.png')); ?>" alt="<?php echo htmlspecialchars($CARZMO['name']); ?>" class="h-10 w-auto max-w-[180px] object-contain object-left sm:h-11 md:h-12 md:max-w-[200px]" width="200" height="48" fetchpriority="high" />
    </a>

    <nav class="nav-pill-glass liquid-glass hidden max-w-full min-w-0 items-center justify-center justify-self-center gap-0.5 rounded-full px-1 py-1 sm:px-1.5 md:flex md:flex-nowrap bg-white/[0.06] shadow-[inset_0_1px_0_rgba(255,255,255,0.12)]" aria-label="Primary">
      <?php if ($carzmo_nav_landing): ?>
        <button type="button" class="<?php echo carzmo_nav_item_classes(false); ?>" data-scroll-to="home">Home</button>
        <a href="<?php echo htmlspecialchars($about_page); ?>" class="<?php echo carzmo_nav_item_classes(false); ?>" data-nav-close>About</a>
      <?php else: ?>
        <a href="<?php echo htmlspecialchars($index); ?>" class="<?php echo carzmo_nav_item_classes(false); ?>">Home</a>
        <a href="<?php echo htmlspecialchars($about_page); ?>" class="<?php echo carzmo_nav_item_classes($about_nav_active); ?>">About</a>
      <?php endif; ?>

      <div class="relative z-[210]" id="services-dropdown-root">
        <button type="button" id="services-dropdown-btn" aria-expanded="false" aria-haspopup="menu" class="inline-flex items-center gap-1 rounded-full px-2 py-1.5 font-body text-[13px] font-medium transition-colors duration-200 lg:px-3 lg:py-2 lg:text-sm <?php echo $services_nav_active ? 'bg-white/18 text-white' : 'text-white/85 hover:bg-white/10 hover:text-white'; ?>">
          Services
          <svg class="services-dd-chevron h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m6 9 6 6 6-6"/></svg>
        </button>
        <div id="services-dropdown-menu" class="hidden absolute top-full left-1/2 z-[220] mt-2 min-w-[260px] -translate-x-1/2 overflow-hidden rounded-2xl border border-white/15 bg-black/90 py-2 shadow-2xl backdrop-blur-2xl" role="menu" aria-label="Our four services">
          <a href="<?php echo htmlspecialchars($services_page); ?>" class="block border-b border-white/10 px-4 py-2.5 font-body text-xs font-semibold uppercase tracking-wider text-white/50 transition-colors hover:bg-white/5 hover:text-white/80" data-nav-close>View all services →</a>
          <p class="px-4 pt-2 pb-1 font-body text-[10px] font-semibold uppercase tracking-wider text-white/35"><?php echo count($CARZMO_SERVICES); ?> specialties</p>
          <?php foreach ($CARZMO_SERVICES as $s):
              $thumb = carzmo_img($s['images'][0]);
              $surl = carzmo_url('service.php?slug=' . rawurlencode($s['slug']));
              ?>
            <a href="<?php echo htmlspecialchars($surl); ?>" role="menuitem" class="flex items-center gap-3 px-4 py-2.5 font-body text-sm text-white/90 transition-colors hover:bg-white/10 hover:text-white" data-nav-close>
              <span class="h-9 w-9 shrink-0 overflow-hidden rounded-full border border-white/15">
                <img src="<?php echo htmlspecialchars($thumb); ?>" alt="" class="h-full w-full object-cover" width="36" height="36" />
              </span>
              <span><?php echo htmlspecialchars($s['title']); ?></span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <?php if ($carzmo_nav_landing): ?>
        <a href="<?php echo htmlspecialchars($gallery_page); ?>" class="<?php echo carzmo_nav_item_classes(false); ?>" data-nav-close>Gallery</a>
        <a href="<?php echo htmlspecialchars($contact_page); ?>" class="<?php echo carzmo_nav_item_classes(false); ?>" data-nav-close>Contact Us</a>
        <a href="<?php echo htmlspecialchars($contact_page); ?>" class="ml-0.5 inline-flex shrink-0 items-center gap-1.5 rounded-full bg-white px-3 py-1.5 font-body text-sm font-medium text-black transition-opacity hover:opacity-90 lg:ml-1 lg:px-3.5" data-nav-close>Book now</a>
      <?php else: ?>
        <a href="<?php echo htmlspecialchars($gallery_page); ?>" class="<?php echo carzmo_nav_item_classes($gallery_nav_active); ?>">Gallery</a>
        <a href="<?php echo htmlspecialchars($contact_page); ?>" class="<?php echo carzmo_nav_item_classes($contact_nav_active); ?>">Contact Us</a>
        <a href="<?php echo htmlspecialchars($contact_page); ?>" class="ml-0.5 inline-flex shrink-0 items-center gap-1.5 rounded-full bg-white px-3 py-1.5 font-body text-sm font-medium text-black transition-opacity hover:opacity-90 lg:ml-1 lg:px-3.5">Book now</a>
      <?php endif; ?>
    </nav>

    <button type="button" id="mobile-menu-btn" class="justify-self-end rounded-full p-2 text-white transition-colors hover:bg-white/10 md:hidden" aria-expanded="false" aria-label="Open menu">
      <svg class="icon-menu h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
      <svg class="icon-close hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
    </button>

    <div class="hidden h-10 w-10 justify-self-end md:block" aria-hidden="true"></div>
  </div>

  <div id="mobile-nav-panel" class="overflow-hidden border-t border-white/10 bg-black/60 backdrop-blur-xl md:hidden" aria-hidden="true">
    <div class="liquid-glass mx-4 my-4 rounded-2xl px-3 py-3 sm:px-4">
      <div class="flex flex-col gap-0.5">
        <?php if ($carzmo_nav_landing): ?>
          <button type="button" data-scroll-to="home" class="rounded-lg px-3 py-2.5 text-left font-body text-sm text-white/90" data-nav-close>Home</button>
          <a href="<?php echo htmlspecialchars($about_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm text-white/90" data-nav-close>About</a>
        <?php else: ?>
          <a href="<?php echo htmlspecialchars($index); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm text-white/90" data-nav-close>Home</a>
          <a href="<?php echo htmlspecialchars($about_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm <?php echo $about_nav_active ? 'bg-white/15 text-white' : 'text-white/90'; ?>" data-nav-close>About</a>
        <?php endif; ?>
        <a href="<?php echo htmlspecialchars($services_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm <?php echo $services_nav_active ? 'bg-white/15 text-white' : 'text-white/90'; ?>" data-nav-close>All services</a>
        <div class="px-3 pt-2 pb-1 font-body text-[10px] font-semibold uppercase tracking-wider text-white/45">Services · <?php echo count($CARZMO_SERVICES); ?></div>
        <?php foreach ($CARZMO_SERVICES as $s):
            $surl = carzmo_url('service.php?slug=' . rawurlencode($s['slug']));
            ?>
          <a href="<?php echo htmlspecialchars($surl); ?>" class="flex items-center gap-3 rounded-lg py-2 pl-5 pr-3 font-body text-sm text-white/90" data-nav-close>
            <span class="h-8 w-8 shrink-0 overflow-hidden rounded-full border border-white/15">
              <img src="<?php echo htmlspecialchars(carzmo_img($s['images'][0])); ?>" alt="" class="h-full w-full object-cover" width="32" height="32" />
            </span>
            <?php echo htmlspecialchars($s['title']); ?>
          </a>
        <?php endforeach; ?>
        <?php if ($carzmo_nav_landing): ?>
          <a href="<?php echo htmlspecialchars($gallery_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm text-white/90" data-nav-close>Gallery</a>
          <a href="<?php echo htmlspecialchars($contact_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm text-white/90" data-nav-close>Contact Us</a>
          <a href="<?php echo htmlspecialchars($contact_page); ?>" class="mt-2 inline-flex w-full items-center justify-center rounded-full bg-white px-4 py-2.5 font-body text-sm font-medium text-black" data-nav-close>Book now</a>
        <?php else: ?>
          <a href="<?php echo htmlspecialchars($gallery_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm <?php echo $gallery_nav_active ? 'bg-white/15 text-white' : 'text-white/90'; ?>" data-nav-close>Gallery</a>
          <a href="<?php echo htmlspecialchars($contact_page); ?>" class="rounded-lg px-3 py-2.5 font-body text-sm <?php echo $contact_nav_active ? 'bg-white/15 text-white' : 'text-white/90'; ?>" data-nav-close>Contact Us</a>
          <a href="<?php echo htmlspecialchars($contact_page); ?>" class="mt-2 inline-flex w-full items-center justify-center rounded-full bg-white px-4 py-2.5 font-body text-sm font-medium text-black" data-nav-close>Book now</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
