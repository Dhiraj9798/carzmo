<?php
declare(strict_types=1);
/** @var array $CARZMO */
/** @var array $CARZMO_GALLERY_CATALOG */
/** @var bool $carzmo_skip_global_footer */

if (empty($carzmo_skip_global_footer)) {
  $about_url = carzmo_url('about.php');
  $gallery_url = carzmo_url('gallery.php');
  $contact_url = carzmo_url('contact.php');
  ?>


 
    <div class="w-full border-t border-white/5 py-5 sm:py-6 relative z-10">
      <div
        class="mx-auto flex max-w-[1400px] flex-col items-center justify-between px-6 lg:px-10 md:flex-row gap-3 md:gap-0">
        <p class="font-body text-[13px] text-white/50 text-center">© 2026 Carzmo Motors. Designed with Excellence. All
          rights reserved.</p>
        <p class="font-body text-[13px] text-white/50">
          Developed by <a href="https://bnintelhub.com/" target="_blank" rel="noopener noreferrer"
            class="font-semibold text-[#d4af37] hover:text-white transition-colors duration-300">BNIntelHub</a>
        </p>
      </div>
    </div>
  </footer>
  <?php
}

$gallery_for_js = [];
foreach ($CARZMO_GALLERY_CATALOG as $cat) {
  foreach ($cat['products'] as $p) {
    $gallery_for_js[$p['id']] = [
      'id' => $p['id'],
      'title' => $p['title'],
      'image' => carzmo_img($p['image']),
    ];
  }
}
$catalog_json = json_encode($gallery_for_js, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE);
?>
<script type="application/json" id="carzmo-gallery-products"><?php echo $catalog_json; ?></script>
<script>
  window.CARZMO = <?php echo json_encode([
    'name' => $CARZMO['name'],
    'phone' => $CARZMO['phone'],
    'whatsapp' => $CARZMO['whatsapp'],
  ], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_UNESCAPED_UNICODE); ?>;
</script>
<script src="<?php echo htmlspecialchars(carzmo_asset('js/carzmo-site.js')); ?>" defer></script>
</body>

</html>