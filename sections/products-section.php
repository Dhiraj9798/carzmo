<?php
declare(strict_types=1);
$feature_items = [
    [
        'title' => 'Workshop-grade precision',
        'body' => 'Diagnostics and repairs done with the right tools, the right parts, and clear approvals before we turn a bolt.',
        'icon' => 'wrench',
    ],
    [
        'title' => 'Showroom-level detailing',
        'body' => 'Paint, glass, and interiors treated with products and techniques that protect—and impress.',
        'icon' => 'sparkles',
    ],
    [
        'title' => 'Performance-minded mods',
        'body' => 'Upgrades engineered for balance: drivability, safety, and the way your car should feel.',
        'icon' => 'gauge',
    ],
    [
        'title' => 'Trust, start to finish',
        'body' => 'Straight timelines, honest recommendations, and a team that treats your car like its own.',
        'icon' => 'shield',
    ],
];
?>
<section id="why-us" class="bg-black px-8 py-24 lg:px-16">
  <div class="mx-auto max-w-[1400px]">
    <div class="reveal-on-scroll mx-auto max-w-3xl text-center">
      <div class="mx-auto inline-flex rounded-full px-3.5 py-1 font-body text-xs font-medium text-white liquid-glass">Why Carzmo</div>
      <h2 class="mt-6 text-4xl leading-[0.9] font-heading tracking-tight text-white italic md:text-5xl lg:text-6xl">The difference is in the details.</h2>
    </div>

    <div class="mt-16 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
      <?php foreach ($feature_items as $i => $item): ?>
        <div class="reveal-on-scroll liquid-glass rounded-2xl p-6" style="transition-delay: <?php echo $i * 60; ?>ms">
          <div class="liquid-glass-strong flex h-10 w-10 items-center justify-center rounded-full text-white" aria-hidden="true">
            <?php if ($item['icon'] === 'wrench'): ?>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            <?php elseif ($item['icon'] === 'sparkles'): ?>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>
            <?php elseif ($item['icon'] === 'gauge'): ?>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/></svg>
            <?php else: ?>
              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><path d="m9 12 2 2 4-4"/></svg>
            <?php endif; ?>
          </div>
          <h3 class="mt-5 font-body text-lg font-medium text-white"><?php echo htmlspecialchars($item['title']); ?></h3>
          <p class="mt-3 font-body text-sm leading-relaxed font-light text-white/60"><?php echo htmlspecialchars($item['body']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
