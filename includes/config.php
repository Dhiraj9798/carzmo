<?php
declare(strict_types=1);

/**
 * Carzmo — site data + URL helpers (single source for PHP pages).
 *
 * Logic map: brand + services + gallery catalog live here; sections consume $CARZMO_*.
 * Behaviour JS: assets/js/carzmo-site.js (nav, hero, services scroll, shop cart, enquiry).
 * Images: assets/images/… — styles in assets/css/app.css (no Node build in this folder).
 */
if (defined('CARZMO_CONFIG_LOADED')) {
    return;
}
define('CARZMO_CONFIG_LOADED', true);

function carzmo_script_dir(): string
{
    $sn = $_SERVER['SCRIPT_NAME'] ?? '/';
    $dir = dirname($sn);
    if ($dir === '/' || $dir === '\\' || $dir === '.') {
        return '';
    }

    return rtrim(str_replace('\\', '/', $dir), '/');
}

function carzmo_url(string $path): string
{
    $base = carzmo_script_dir();
    $path = ltrim(str_replace('\\', '/', $path), '/');
    if ($base === '') {
        return '/' . $path;
    }

    return $base . '/' . $path;
}

function carzmo_asset(string $file): string
{
    return carzmo_url('assets/' . ltrim($file, '/'));
}

function carzmo_img(string $file): string
{
    return carzmo_url('assets/images/' . ltrim($file, '/'));
}

$CARZMO = [
    'name' => 'Carzmo Motors',
    'tagline' => 'Premium automotive care in Kolkata',
    'phone' => '+91 81003 64196',
    'whatsapp' => '+91 81003 64196',
    'instagram' => 'https://www.instagram.com/carzmomotors',
    'location' => 'Rajpur Sonarpur, Kolkata, West Bengal',
];

$CARZMO_SERVICES = [
    [
        'slug' => 'auto-workshop',
        'title' => 'Auto Workshop',
        'short' => 'Diagnostics, repairs & maintenance',
        'body' => 'Factory-trained technicians, genuine parts, and transparent estimates—so your vehicle stays reliable mile after mile.',
        'images' => ['autoworkshop13.jpeg', 'autoworkshop12.jpeg', 'autoworkshop11.jpeg', 'autoworkshop10.jpeg'],
        'captions' => [
            'Mechanic draining engine oil under lifted car',
            'Brake & wheel area repair work being done',
            'Engine inspection and maintenance work',
            'Tire and wheel servicing by mechanics',
        ],
        'highlights' => [
            'Computer diagnostics & OEM-level fault tracing',
            'Scheduled servicing, brakes, suspension, and drivetrain',
            'Transparent quotes before work begins',
            'Quality fluids and parts matched to your model',
        ],
    ],
    [
        'slug' => 'detailing',
        'title' => 'Detailing',
        'short' => 'Showroom finish, every time',
        'body' => 'Paint correction, ceramic protection, and interior revival—meticulous care that protects your investment and turns heads.',
        'images' => ['detailing13.jpeg', 'detailing12.jpeg', 'detailing11.jpeg', 'detailing10.jpeg'],
        'captions' => [
            'Car logo cleaning and polishing for a shiny finish',
            'Person polishing the car bonnet inside a workshop',
            'Paint protection film being applied on car door',
            'Car detailing and polishing work in progress',
        ],
        'highlights' => [
            'Multi-stage wash and decontamination',
            'Paint correction and long-life ceramic coatings',
            'Leather, fabric, and cabin deep-clean programmes',
            'Finishing touches for wheels, glass, and trim',
        ],
    ],
    [
        'slug' => 'accessories',
        'title' => 'Accessories',
        'short' => 'Fitment you can trust',
        'body' => 'From audio upgrades to comfort add-ons—we source quality accessories and install them to manufacturer-grade standards.',
        'images' => ['accessories13.jpeg', 'accessories12.jpeg', 'accessories11.jpeg', 'accessories10.jpeg'],
        'captions' => [
            'Car lighting kits and exterior parts displayed on shelves',
            'Variety of car accessories and gadget boxes arranged in a store',
            'Interior accessories and small car products organized neatly',
            'Car care liquids like oils, polish, and cleaners on display',
        ],
        'highlights' => [
            'Infotainment, audio, and lighting upgrades',
            'Comfort, storage, and protection accessories',
            'Wiring and integration without cutting corners',
            'Warranty-friendly installation practices',
        ],
    ],
    [
        'slug' => 'modifications',
        'title' => 'Modifications',
        'short' => 'Built for your vision',
        'body' => 'Performance, stance, and style—thoughtful upgrades engineered for safety, compliance, and the drive you actually want.',
        'images' => ['mods1.jpeg', 'mods2.jpeg', 'mods3.jpeg', 'mods4.jpeg'],
        'captions' => [
            'Custom suspension and performance stance upgrade',
            'Aftermarket exhaust and intake tuning setup',
            'Aero body kit and exterior styling transformation',
            'Custom alloy wheels and brake caliper upgrade',
        ],
        'highlights' => [
            'Suspension, wheels, and stance packages',
            'Intake, exhaust, and tuning support (where compliant)',
            'Aero, lighting, and exterior personalisation',
            'Safety-first advice on road-legal options',
        ],
    ],
];

$CARZMO_HERO_SLIDES = ['hero1.jpeg', 'hero2.jpeg', 'hero3.jpeg'];

$CARZMO_GALLERY_CATALOG = [
    [
        'id' => 'ceramic-graphene',
        'title' => 'Ceramic / Graphene Coatings',
        'products' => [
            ['id' => 'garware-graphene', 'image' => 'image4.jpg', 'title' => 'Garware Graphene'],
            ['id' => 'maple-graphene', 'image' => 'image10.jpg', 'title' => 'Maple Graphene'],
            ['id' => '3m-ceramic', 'image' => 'image16.jpg', 'title' => '3M Ceramic'],
            ['id' => '9h-gold-ceramic', 'image' => 'image17.jpg', 'title' => '9H Gold Ceramic'],
            ['id' => 'garware-ceramic', 'image' => 'image20.jpg', 'title' => 'Garware Ceramic'],
        ],
    ],
    [
        'id' => 'detailing-chemicals',
        'title' => 'Detailing Chemicals',
        'products' => [
            ['id' => 'maple-aerosol', 'image' => 'image2.jpg', 'title' => 'Maple Aerosol Spray'],
            ['id' => 'quick-detailer', 'image' => 'image9.jpg', 'title' => 'Quick Detailer'],
            ['id' => 'liquid-wax', 'image' => 'image13.jpg', 'title' => 'Liquid Wax'],
            ['id' => 'snow-foam', 'image' => 'image18.jpg', 'title' => 'Snow Foam'],
            ['id' => 'surface-cleaner', 'image' => 'image19.jpg', 'title' => 'Surface Cleaner'],
            ['id' => 'interior-glass-cleaner', 'image' => 'image23.jpeg', 'title' => 'Interior Glass Cleaner'],
        ],
    ],
    [
        'id' => 'surface-protection',
        'title' => 'Surface Protection',
        'products' => [
            ['id' => 'trim-restorer', 'image' => 'image14.jpg', 'title' => 'Trim Restorer'],
            ['id' => 'interior-protection', 'image' => 'image15.jpg', 'title' => 'Interior Protection'],
        ],
    ],
    [
        'id' => 'electronics',
        'title' => 'Electronics Accessories',
        'products' => [
            ['id' => 'car-charger', 'image' => 'image5.jpg', 'title' => 'Car Charger'],
            ['id' => 'type-c-cable', 'image' => 'image6.jpg', 'title' => 'Type-C Cable'],
            ['id' => 'led-lights', 'image' => 'image12.jpg', 'title' => 'LED Lights'],
            ['id' => 'android-screen', 'image' => 'image22.jpg', 'title' => 'Android Screen'],
        ],
    ],
    [
        'id' => 'interior-accessories',
        'title' => 'Interior Accessories',
        'products' => [
            ['id' => 'dashboard-scent', 'image' => 'image3.jpg', 'title' => 'Dashboard Scent'],
            ['id' => 'perfume-spray', 'image' => 'image11.jpg', 'title' => 'Perfume Spray'],
        ],
    ],
    [
        'id' => 'car-perfumes',
        'title' => 'Car Perfumes',
        'products' => [
            ['id' => 'autoroma-perfume', 'image' => 'image1.jpg', 'title' => 'AutoRoma Perfume'],
            ['id' => 'black-odor-perfume', 'image' => 'image7.jpg', 'title' => 'Black Odor Perfume'],
        ],
    ],
    [
        'id' => 'car-audio-systems',
        'title' => 'Car Audio Systems',
        'products' => [
            ['id' => 'car-speakers', 'image' => 'car speakers.jpeg', 'title' => 'Car Speakers'],
            ['id' => 'car-amplifier', 'image' => 'car amplifier.jpeg', 'title' => 'Car Amplifier'],
            ['id' => 'component-speakers', 'image' => 'component speakers.jpeg', 'title' => 'Component Speakers'],
            ['id' => 'speakers-tweeter', 'image' => 'speakers with tweeter.jpeg', 'title' => 'Speakers with Tweeter'],
            ['id' => 'focal-speakers', 'image' => 'focal speakers.jpeg', 'title' => 'Focal Speakers'],
            ['id' => 'car-stereo', 'image' => 'car stereo head unit.jpeg', 'title' => 'Car Stereo Head Unit'],
            ['id' => 'jbl-speakers', 'image' => 'jbl speakers.jpeg', 'title' => 'JBL Speakers'],
            ['id' => 'coaxial-speakers', 'image' => 'coaxial speakers.jpeg', 'title' => 'Coaxial Speakers'],
            ['id' => 'car-subwoofer', 'image' => 'car subwoofer.jpeg', 'title' => 'Car Subwoofer'],
        ],
    ],
];

/**
 * @return array<string, array{id:string,title:string,image:string}>
 */
function carzmo_gallery_product_map(): array
{
    global $CARZMO_GALLERY_CATALOG;
    $map = [];
    foreach ($CARZMO_GALLERY_CATALOG as $cat) {
        foreach ($cat['products'] as $p) {
            $map[$p['id']] = [
                'id' => $p['id'],
                'title' => $p['title'],
                'image' => carzmo_img($p['image']),
            ];
        }
    }

    return $map;
}

function carzmo_get_service_by_slug(string $slug): ?array
{
    global $CARZMO_SERVICES;
    foreach ($CARZMO_SERVICES as $s) {
        if ($s['slug'] === $slug) {
            return $s;
        }
    }

    return null;
}
