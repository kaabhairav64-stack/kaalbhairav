<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$site_name = "KaalBhairav.org";

$page_titles = [
    'index' => 'Kaal Bhairav - The Supreme Guardian of Kashi | KaalBhairav.org',
    'about' => 'About Kaal Bhairav - Origin & Stories | KaalBhairav.org',
    '64-bhairav' => '64 Types of Bhairav - Ashtabhairav & More | KaalBhairav.org',
    'pooja-vidhi' => 'Pooja Vidhi & Procedure | KaalBhairav.org',
    'mantra' => 'Mantras, Tantras & Stotras | KaalBhairav.org',
    'kashi' => 'Kaal Bhairav & Kashi - The Sacred Connection | KaalBhairav.org',
    'stories' => 'Stories & Legends of Kaal Bhairav | KaalBhairav.org',
    'seva' => 'Donate for Dog Seva & Sacred Service | KaalBhairav.org',
    'disclaimer' => 'Disclaimer & Terms | KaalBhairav.org',
];
$meta_desc = [
    'index' => 'Complete guide to Kaal Bhairav: stories, pooja vidhi, mantras, 64 types, Kashi connection, and dog seva donation.',
    'about' => 'Learn about Kaal Bhairav\'s origin, his manifestation from Shiva, his role as Kotwal of Kashi, and sacred Puranic stories.',
    '64-bhairav' => 'Explore all 64 types of Bhairav including Ashtabhairav and their significance, forms, and worship.',
    'pooja-vidhi' => 'Complete Kaal Bhairav Pooja Vidhi with step-by-step procedure, required items, timing, and effects.',
    'mantra' => 'Sacred Kaal Bhairav mantras, Bhairav Ashtakam, tantric procedures, and their authentic sources.',
    'kashi' => 'The divine connection between Kaal Bhairav and Kashi (Varanasi) - the eternal city and its cosmic guardian.',
    'stories' => 'Ancient stories and legends of Kaal Bhairav from Shiva Purana, Skanda Purana, and other sacred texts.',
    'seva' => 'Support dog seva and Bhairav-related charitable work. Dogs are the sacred vehicle of Kaal Bhairav.',
    'disclaimer' => 'Important disclaimer and terms of use for KaalBhairav.org.',
];
$page_title = $page_titles[$current_page] ?? $site_name;
$meta_description = $meta_desc[$current_page] ?? 'KaalBhairav.org - Complete devotional resource on Kaal Bhairav.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $page_title; ?></title>
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="keywords" content="Kaal Bhairav, Kashi, Bhairav mantra, Bhairav pooja, 64 Bhairav, Ashtabhairav, Varanasi, Shiva, dog seva, Bhairav stotram, tantra, Bhairav worship">
<meta name="robots" content="index, follow">
<meta name="author" content="KaalBhairav.org">
<link rel="canonical" href="https://kaalbhairav.org/<?php echo $current_page === 'index' ? '' : $current_page . '.php'; ?>">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:description" content="<?php echo $meta_description; ?>">
<meta property="og:url" content="https://kaalbhairav.org/">
<meta property="og:type" content="website">
<meta property="og:site_name" content="KaalBhairav.org">
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"WebSite","name":"KaalBhairav.org","url":"https://kaalbhairav.org","description":"Complete devotional and informational resource on Kaal Bhairav"}
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400;600;700&family=EB+Garamond:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/style.css">
<style>
#lang-toggle {
  background: transparent;
  border: 1px solid rgba(201,168,76,0.4);
  color: #c9a84c;
  font-family: 'Cinzel', serif;
  font-size: 0.7rem;
  letter-spacing: 0.08em;
  padding: 0.3rem 0.8rem;
  border-radius: 2px;
  cursor: pointer;
  transition: all 0.3s;
  margin-left: 0.5rem;
}
#lang-toggle:hover { background: rgba(201,168,76,0.1); border-color: #c9a84c; }
.nav-toggle {
  display: none;
  background: transparent;
  border: 1px solid rgba(201,168,76,0.4);
  color: #c9a84c;
  font-size: 1.3rem;
  padding: 0.3rem 0.7rem;
  cursor: pointer;
  border-radius: 2px;
}
@media (max-width: 768px) {
  .nav-toggle { display: block; }
  .nav-links { display: none; flex-direction: column; position: absolute; top: 70px; left: 0; right: 0; background: rgba(10,5,0,0.98); border-bottom: 1px solid rgba(201,168,76,0.3); padding: 1rem 0; z-index: 999; }
  .nav-links.open { display: flex; }
  .nav-links li { text-align: center; padding: 0.4rem 0; }
}
</style>
<script>
function closeMenu() {
  var nav = document.getElementById('mainNav');
  var btn = document.getElementById('navToggle');
  if (nav) nav.classList.remove('open');
  if (btn) btn.textContent = '☰';
}
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.nav-links a').forEach(function(link) {
    link.addEventListener('click', closeMenu);
  });
});
</script>
</head>
<body>
<div class="particles" id="particles"></div>
<nav>
    <div class="nav-inner">
        <a href="/index.php" class="nav-logo">KaalBhairav<span>.org</span></a>
        <button class="nav-toggle" id="navToggle" onclick="document.getElementById('mainNav').classList.toggle('open');this.textContent=document.getElementById('mainNav').classList.contains('open')?'✕':'☰'">☰</button>
        <ul class="nav-links" id="mainNav">
            <li><a href="/index.php" <?php echo $current_page==='index'?'class="active"':''; ?> data-key="nav_home">Home</a></li>
            <li><a href="/about.php" <?php echo $current_page==='about'?'class="active"':''; ?> data-key="nav_about">About</a></li>
            <li><a href="/stories.php" <?php echo $current_page==='stories'?'class="active"':''; ?> data-key="nav_stories">Stories</a></li>
            <li><a href="/64-bhairav.php" <?php echo $current_page==='64-bhairav'?'class="active"':''; ?> data-key="nav_64">64 Bhairavas</a></li>
            <li><a href="/kashi.php" <?php echo $current_page==='kashi'?'class="active"':''; ?> data-key="nav_kashi">Kashi</a></li>
            <li><a href="/pooja-vidhi.php" <?php echo $current_page==='pooja-vidhi'?'class="active"':''; ?> data-key="nav_pooja">Pooja Vidhi</a></li>
            <li><a href="/mantra.php" <?php echo $current_page==='mantra'?'class="active"':''; ?> data-key="nav_mantra">Mantra &amp; Tantra</a></li>
            <li><a href="/seva.php" <?php echo $current_page==='seva'?'class="active"':''; ?> data-key="nav_seva">Dog Seva</a></li>
            <li><a href="/disclaimer.php" <?php echo $current_page==='disclaimer'?'class="active"':''; ?> data-key="nav_disclaimer">Disclaimer</a></li>
            <li><button id="lang-toggle" onclick="setLang(localStorage.getItem('kb_lang')==='hi'?'en':'hi');closeMenu()">हिंदी</button></li>
        </ul>
    </div>
</nav>
