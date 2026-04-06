<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$site_name = "KaalBhairav.org";

$page_titles = [
    'index'       => 'Kaal Bhairav — Kotwal of Kashi | KaalBhairav.org',
    'about'       => 'About Kaal Bhairav — Iconography & Traditions | KaalBhairav.org',
    '64-bhairav'  => '64 Forms of Bhairav — Ashtabhairav | KaalBhairav.org',
    'pooja-vidhi' => 'Kaal Bhairav Pooja Vidhi — Complete Procedure | KaalBhairav.org',
    'mantra'      => 'Kaal Bhairav Mantras — Mool Mantra, Ashtakam, Gayatri | KaalBhairav.org',
    'kashi'       => 'Kaal Bhairav & Kashi — The Sacred Connection | KaalBhairav.org',
    'stories'     => 'Sacred Stories of Kaal Bhairav — Puranic Legends | KaalBhairav.org',
    'seva'        => 'Dog Seva & Donation — Feed Bhairav\'s Vahana | KaalBhairav.org',
    'disclaimer'  => 'Disclaimer & Terms | KaalBhairav.org',
];

$meta_desc = [
    'index'       => 'काल भैरव — काशी के कोतवाल। मंत्र, पूजा विधि, 64 रूप, पवित्र कथाएं और कुत्ता सेवा। Kaal Bhairav — Kotwal of Kashi. Mantras, pooja vidhi, 64 forms, sacred stories.',
    'about'       => 'काल भैरव का प्रतिमा विज्ञान, महत्व और परंपराएं। Kaal Bhairav iconography, significance, Shaiva and Tantric traditions.',
    '64-bhairav'  => '64 भैरव रूप — अष्टभैरव और उनके उप-रूप। 64 forms of Bhairav — Ashtabhairav and sub-forms, directions, shaktis.',
    'pooja-vidhi' => 'काल भैरव पूजा विधि — संपूर्ण 16-चरण पूजा प्रक्रिया। Complete Kaal Bhairav pooja vidhi with materials, steps, and effects.',
    'mantra'      => 'काल भैरव मंत्र — मूल मंत्र, अष्टकम, गायत्री, बीज मंत्र। Kaal Bhairav mantras — mool mantra, Ashtakam, Gayatri, beej mantras.',
    'kashi'       => 'काल भैरव और काशी का दिव्य संबंध। Kaal Bhairav and Kashi (Varanasi) — the eternal city and its cosmic guardian.',
    'stories'     => 'काल भैरव की पवित्र कथाएं — शिव पुराण, स्कंद पुराण। Sacred stories of Kaal Bhairav from Shiva Purana and Skanda Purana.',
    'seva'        => 'कुत्ता सेवा — भैरव के वाहन की सेवा करें। Dog seva and donation — feeding dogs is the highest Bhairav devotion.',
    'disclaimer'  => 'KaalBhairav.org अस्वीकरण और उपयोग की शर्तें। Disclaimer and terms of use.',
];

$og_desc = [
    'index'       => 'काल भैरव — काशी के कोतवाल, काल के स्वामी। मंत्र, पूजा विधि, 64 रूप और पवित्र कथाएं। Kaal Bhairav — Kotwal of Kashi, Lord of Time.',
    'about'       => 'काल भैरव का स्वरूप, अस्त्र और विभिन्न परंपराओं में उनका स्थान। Learn about Kaal Bhairav\'s form, weapons and traditions.',
    '64-bhairav'  => 'ब्रह्मांड की 8 दिशाओं के 64 भैरव रूप। 64 Bhairavas — guardians of the 8 directions of the cosmos.',
    'pooja-vidhi' => 'काल भैरव की संपूर्ण पूजा विधि — सामग्री, 16 चरण, और आध्यात्मिक प्रभाव। Complete Bhairav pooja procedure.',
    'mantra'      => 'ॐ कालभैरवाय नमः — काल भैरव के पवित्र मंत्र। Sacred mantras of Kaal Bhairav for protection and liberation.',
    'kashi'       => 'काशी और काल भैरव — अटूट दिव्य संबंध। Kashi and Kaal Bhairav — an inseparable bond since the beginning of time.',
    'stories'     => 'ब्रह्मा के शिरच्छेदन से लेकर काशी के कोतवाल तक — काल भैरव की पवित्र कथाएं।',
    'seva'        => 'कुत्ते की सेवा = भैरव की सेवा। Dog seva is one of the highest forms of Bhairav devotion.',
    'disclaimer'  => 'KaalBhairav.org — disclaimer and spiritual practice guidelines.',
];

$share_texts = [
    'index'       => 'काल भैरव — काशी के कोतवाल। मंत्र, पूजा विधि, 64 रूप जानें:',
    'about'       => 'काल भैरव का स्वरूप और महत्व जानें:',
    '64-bhairav'  => 'काल भैरव के 64 रूप — अष्टभैरव:',
    'pooja-vidhi' => 'काल भैरव पूजा विधि — संपूर्ण 16-चरण प्रक्रिया:',
    'mantra'      => 'काल भैरव के पवित्र मंत्र — ॐ कालभैरवाय नमः:',
    'kashi'       => 'काल भैरव और काशी का दिव्य संबंध:',
    'stories'     => 'काल भैरव की पवित्र कथाएं — शिव पुराण से:',
    'seva'        => 'कुत्ते की सेवा = भैरव की सेवा। जानें कैसे:',
    'disclaimer'  => 'KaalBhairav.org — अस्वीकरण:',
];

$page_title      = $page_titles[$current_page] ?? $site_name;
$meta_description = $meta_desc[$current_page] ?? 'KaalBhairav.org — Complete devotional resource on Kaal Bhairav.';
$og_description  = $og_desc[$current_page] ?? $meta_description;
$share_text      = $share_texts[$current_page] ?? 'काल भैरव की जय! जानें:';
$canonical_path  = ($current_page === 'index') ? '' : $current_page . '.php';
$full_url        = 'https://kaalbhairav.org/' . $canonical_path;
$is_local        = in_array($_SERVER['HTTP_HOST'] ?? '', ['localhost', 'localhost:8080', '127.0.0.1', '127.0.0.1:8080']);
$base_href       = $is_local ? '/kaalbhairav/' : '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<base href="<?php echo $base_href; ?>">
<title><?php echo $page_title; ?></title>
<meta name="description" content="<?php echo $meta_description; ?>">
<meta name="keywords" content="Kaal Bhairav, Kashi, Bhairav mantra, Bhairav pooja, 64 Bhairav, Ashtabhairav, Varanasi, Shiva, dog seva, Bhairav stotram, tantra, Bhairav worship">
<meta name="robots" content="index, follow">
<meta name="author" content="KaalBhairav.org">
<link rel="canonical" href="https://kaalbhairav.org/<?php echo $current_page === 'index' ? '' : $current_page . '.php'; ?>">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:description" content="<?php echo $og_description; ?>">
<meta property="og:url" content="<?php echo $full_url; ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="KaalBhairav.org">
<meta property="og:image" content="https://kaalbhairav.org/assets/img/og-kaalbhairav.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="hi_IN">
<meta property="og:locale:alternate" content="en_IN">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $page_title; ?>">
<meta name="twitter:description" content="<?php echo $og_description; ?>">
<meta name="twitter:image" content="https://kaalbhairav.org/assets/img/og-kaalbhairav.jpg">
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"WebSite","name":"KaalBhairav.org","url":"https://kaalbhairav.org","description":"काल भैरव — काशी के कोतवाल। मंत्र, पूजा विधि, 64 रूप, पवित्र कथाएं। Complete devotional resource on Kaal Bhairav.","inLanguage":["hi","en"],"potentialAction":{"@type":"SearchAction","target":"https://kaalbhairav.org/?s={search_term_string}","query-input":"required name=search_term_string"}}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Organization","name":"KaalBhairav.org","url":"https://kaalbhairav.org","logo":"https://kaalbhairav.org/assets/img/og-kaalbhairav.jpg","sameAs":[],"description":"Devoted to spreading knowledge of Kaal Bhairav — the Kotwal of Kashi"}
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Cinzel:wght@400;600;700&family=EB+Garamond:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo $base_href; ?>assets/css/style.css">
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
/* WhatsApp Share Bar */
#wa-share-bar {
  display: none;
  position: fixed;
  bottom: 0; left: 0; right: 0;
  background: linear-gradient(90deg, rgba(10,5,0,0.97), rgba(20,8,0,0.97));
  border-top: 1px solid rgba(201,168,76,0.35);
  box-shadow: 0 -4px 24px rgba(139,0,0,0.25);
  padding: 0.65rem 1.2rem;
  z-index: 9000;
  align-items: center;
  justify-content: space-between;
  gap: 0.7rem;
}
#wa-share-bar.visible { display: flex; }
#wa-share-bar .wa-text {
  font-family: 'Cinzel', serif;
  font-size: 0.72rem;
  color: rgba(201,168,76,0.85);
  letter-spacing: 0.05em;
  flex: 1;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
#wa-share-btn {
  display: flex; align-items: center; gap: 0.5rem;
  background: linear-gradient(135deg, #8b0000 0%, #6b0000 100%);
  color: #e8c96e;
  font-family: 'Cinzel', serif;
  font-size: 0.75rem;
  font-weight: 600;
  letter-spacing: 0.08em;
  border: 1px solid rgba(201,168,76,0.45);
  border-radius: 3px;
  padding: 0.5rem 1.1rem;
  cursor: pointer;
  text-decoration: none;
  white-space: nowrap;
  transition: all 0.2s;
  box-shadow: 0 0 12px rgba(139,0,0,0.4);
}
#wa-share-btn:hover {
  background: linear-gradient(135deg, #a00000 0%, #8b0000 100%);
  box-shadow: 0 0 20px rgba(204,17,17,0.5), 0 0 30px rgba(201,168,76,0.15);
  color: #f5e4a0;
}
#wa-share-btn svg { width: 16px; height: 16px; fill: #e8c96e; }
#wa-close-btn {
  background: transparent;
  border: none;
  color: rgba(201,168,76,0.6);
  font-size: 1.1rem;
  cursor: pointer;
  padding: 0.2rem 0.3rem;
  line-height: 1;
}
#wa-close-btn:hover { color: #c9a84c; }
@media (min-width: 769px) {
  #wa-share-bar {
    bottom: 2rem;
    left: auto;
    right: 1.5rem;
    top: auto;
    width: auto;
    border-top: none;
    border: none;
    background: none;
    box-shadow: none;
    padding: 0;
    gap: 0;
  }
  #wa-share-bar .wa-text { display: none; }
  #wa-close-btn { display: none; }
  #wa-share-btn {
    flex-direction: column;
    align-items: center;
    gap: 0.25rem;
    padding: 0.65rem 0.75rem;
    font-size: 0.58rem;
    letter-spacing: 0.06em;
    border-radius: 8px;
    box-shadow: 0 0 16px rgba(139,0,0,0.5), 0 4px 12px rgba(0,0,0,0.6);
  }
  #wa-share-btn svg { width: 22px; height: 22px; }
}
</style>
<script>
var KB_PAGE_URL = "<?php echo $full_url; ?>";
var KB_SHARE_TEXT = "<?php echo addslashes($share_text); ?>";
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
        <a href="<?php echo $base_href; ?>index.php" class="nav-logo">KaalBhairav<span>.org</span></a>
        <button class="nav-toggle" id="navToggle" onclick="document.getElementById('mainNav').classList.toggle('open');this.textContent=document.getElementById('mainNav').classList.contains('open')?'✕':'☰'">☰</button>
        <ul class="nav-links" id="mainNav">
            <li><a href="<?php echo $base_href; ?>index.php" <?php echo $current_page==='index'?'class="active"':''; ?> data-key="nav_home">Home</a></li>
            <li><a href="<?php echo $base_href; ?>about.php" <?php echo $current_page==='about'?'class="active"':''; ?> data-key="nav_about">About</a></li>
            <li><a href="<?php echo $base_href; ?>stories.php" <?php echo $current_page==='stories'?'class="active"':''; ?> data-key="nav_stories">Stories</a></li>
            <li><a href="<?php echo $base_href; ?>64-bhairav.php" <?php echo $current_page==='64-bhairav'?'class="active"':''; ?> data-key="nav_64">64 Bhairavas</a></li>
            <li><a href="<?php echo $base_href; ?>kashi.php" <?php echo $current_page==='kashi'?'class="active"':''; ?> data-key="nav_kashi">Kashi</a></li>
            <li><a href="<?php echo $base_href; ?>pooja-vidhi.php" <?php echo $current_page==='pooja-vidhi'?'class="active"':''; ?> data-key="nav_pooja">Pooja Vidhi</a></li>
            <li><a href="<?php echo $base_href; ?>mantra.php" <?php echo $current_page==='mantra'?'class="active"':''; ?> data-key="nav_mantra">Mantra &amp; Tantra</a></li>
            <li><a href="<?php echo $base_href; ?>seva.php" <?php echo $current_page==='seva'?'class="active"':''; ?> data-key="nav_seva">Dog Seva</a></li>
            <li><a href="<?php echo $base_href; ?>disclaimer.php" <?php echo $current_page==='disclaimer'?'class="active"':''; ?> data-key="nav_disclaimer">Disclaimer</a></li>
            <li><button id="lang-toggle" onclick="setLang(localStorage.getItem('kb_lang')==='hi'?'en':'hi');closeMenu()">हिंदी</button></li>
        </ul>
    </div>
</nav>
