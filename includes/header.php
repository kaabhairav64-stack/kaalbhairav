<?php
if (!isset($current_page)) $current_page = basename($_SERVER['PHP_SELF'], '.php');
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
    'mandir'      => 'Kaal Bhairav Virtual Mandir — Live Aarti Daily | KaalBhairav.org',
    'ashtami'     => 'Kaal Bhairav Ashtami 2026 — All Dates, Timings & Puja Guide | KaalBhairav.org',
    'jayanti'     => 'Kaal Bhairav Jayanti 2026 — Date, Tithi, Puja Vidhi | KaalBhairav.org',
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
    'mandir'      => 'काल भैरव वर्चुअल मंदिर — प्रतिदिन आरती दर्शन। Attend the daily Kaal Bhairav aarti online — morning and evening darshan.',
    'ashtami'     => '2026 की सभी काल भैरव अष्टमी तिथियाँ — कृष्ण पक्ष और शुक्ल पक्ष। All Kaal Bhairav Ashtami dates in 2026 with puja timings.',
    'jayanti'     => 'काल भैरव जयंती 2026 — 27 नवंबर, शुक्रवार। Kaal Bhairav Jayanti 2026 is November 27 — complete puja vidhi, significance & timings.',
];

$og_desc = [
    'index'       => 'जो एक बार काल भैरव के द्वार आया — वो कभी खाली नहीं लौटा। काल के स्वामी, काशी के कोतवाल का दिव्य रहस्य जानें। Kaal Bhairav — Lord of Time, Kotwal of Kashi.',
    'about'       => 'तीन नेत्र, कपाल, त्रिशूल — और एक साधारण-सा कुत्ता। काल भैरव के हर रूप में एक गहरा रहस्य छुपा है। जानें उनका संपूर्ण स्वरूप।',
    '64-bhairav'  => 'आपकी दिशा के भैरव कौन हैं? 64 रूप, 8 दिशाएं — ब्रह्मांड का संपूर्ण भैरव-मंडल। 64 Bhairavas — guardians of all 8 directions of the cosmos.',
    'pooja-vidhi' => 'शास्त्र-सम्मत 16 उपचारों में पूर्ण पूजा — आज से शुरू करें। काल भैरव की कृपा अवश्य बरसेगी। Complete step-by-step Bhairav pooja vidhi.',
    'mantra'      => 'ॐ कालभैरवाय नमः — जो इस मंत्र को श्रद्धा से जपता है, काल उसे नहीं छूता। पवित्र मंत्र, बीज मंत्र, अष्टकम — सब यहाँ।',
    'kashi'       => 'काशी में श्वास लेना पुण्य है — लेकिन बिना भैरव के काशी अधूरी है। जानें यह अटूट दिव्य संबंध जो युगों से चला आ रहा है।',
    'stories'     => 'ब्रह्मा का पाँचवाँ सिर काट दिया — और फिर भी करुणा। काल भैरव की वो कथाएं जो रोंगटे खड़े कर दें, मन को झकझोर दें।',
    'seva'        => 'एक कुत्ते को एक रोटी — और काल भैरव प्रसन्न। यह भक्ति का सबसे सरल, सबसे शक्तिशाली मार्ग है। Dog seva = Bhairav seva.',
    'disclaimer'  => 'KaalBhairav.org — आस्था, ज्ञान और श्रद्धा का डिजिटल तीर्थ। अस्वीकरण और आध्यात्मिक दिशानिर्देश।',
    'mandir'      => 'घर बैठे काल भैरव की आरती का दर्शन करें — सुबह और शाम, प्रतिदिन। यह वर्चुअल मंदिर आपका अपना मंदिर है।',
    'ashtami'     => 'हर महीने की भैरव अष्टमी — 2026 की पूरी सूची। कब करें पूजा, कैसे करें — सब एक जगह।',
    'jayanti'     => '27 नवंबर 2026 — काल भैरव जयंती। जब भैरव प्रकट हुए, वो तिथि है सबसे पवित्र। जानें पूजा विधि और महत्व।',
];

$share_texts = [
    'index'       => 'जय काल भैरव! काशी के कोतवाल का यह दिव्य पोर्टल आपके साथ साझा कर रहा हूँ — मंत्र, पूजा विधि, 64 रूप, पवित्र कथाएं, सब एक जगह:',
    'about'       => 'काल भैरव के स्वरूप, अस्त्र और महत्व के बारे में यह जानकारी अद्भुत है। हर शिव भक्त को एक बार जरूर पढ़नी चाहिए:',
    '64-bhairav'  => 'क्या आप जानते हैं — काल भैरव के 64 रूप हैं? हर दिशा का एक भैरव। यह जानकर मन श्रद्धा से भर गया:',
    'pooja-vidhi' => 'काल भैरव की पूजा विधि — शास्त्र-सम्मत, 16 उपचारों में पूर्ण। अपने परिवार के साथ जरूर साझा करें:',
    'mantra'      => 'ॐ कालभैरवाय नमः — काल भैरव के यह पवित्र मंत्र आज से जपना शुरू करें। मूल मंत्र, बीज मंत्र, अष्टकम सब यहाँ:',
    'kashi'       => 'काशी जाने वाले या वहाँ रहने वाले भक्तों के लिए — काल भैरव और काशी का यह दिव्य रहस्य जरूर पढ़ें:',
    'stories'     => 'काल भैरव की यह कथा पढ़कर मन भाव-विभोर हो गया। आपके साथ साझा किए बिना रह नहीं सका:',
    'seva'        => 'कुत्ते को खाना खिलाएं = काल भैरव की सेवा करें। यह जानकर जीवन बदल गया। आप भी पढ़ें:',
    'disclaimer'  => 'KaalBhairav.org — अस्वीकरण और आध्यात्मिक दिशानिर्देश:',
    'mandir'      => 'काल भैरव की आरती — प्रतिदिन सुबह और शाम, वर्चुअल मंदिर में दर्शन करें। यह लिंक भेजें अपने परिजनों को:',
    'ashtami'     => '2026 की सभी भैरव अष्टमी तिथियाँ — हर महीने कब है अष्टमी, कैसे करें पूजा, सब एक जगह:',
    'jayanti'     => 'काल भैरव जयंती 2026 — 27 नवंबर। भैरव के प्रकट होने का सबसे पवित्र दिन। पूजा विधि और महत्व जानें:',
];

$page_keywords = [
    'index'       => 'काल भैरव, कालभैरव, काशी के कोतवाल, भैरव मंत्र, भैरव पूजा, कालभैरव मंदिर, Kaal Bhairav, Kashi, Bhairav mantra, Bhairav pooja, Varanasi, Shiva, tantra',
    'about'       => 'काल भैरव स्वरूप, भैरव अष्टायुध, काल भैरव का महत्व, शैव परंपरा, Kaal Bhairav iconography, Ashtayudha, Shaiva tradition, Bhairav significance',
    '64-bhairav'  => '64 भैरव, अष्टभैरव, भैरव दिशाएं, महाभैरव, 64 Bhairav, Ashtabhairav, 64 forms of Bhairav, Bhairav directions, Mahabhairavas',
    'pooja-vidhi' => 'काल भैरव पूजा विधि, भैरव पूजन सामग्री, षोडशोपचार पूजा, Kaal Bhairav pooja vidhi, Bhairav worship procedure, Shodashopachara puja',
    'mantra'      => 'काल भैरव मंत्र, भैरव बीज मंत्र, कालभैरव अष्टकम, भैरव गायत्री, Kaal Bhairav mantra, Bhairav beej mantra, Kalbhairav Ashtakam, Bhairav Gayatri',
    'kashi'       => 'काशी और काल भैरव, वाराणसी कालभैरव मंदिर, काशी कोतवाल, Kashi Kaal Bhairav, Varanasi Bhairav temple, Kashi Kotwal, Bhairav Kashi connection',
    'stories'     => 'काल भैरव कथा, भैरव शिव पुराण, ब्रह्मा शिरच्छेदन कथा, Kaal Bhairav stories, Bhairav Shiva Purana, Brahma beheading story, Bhairav legends',
    'seva'        => 'कुत्ता सेवा भैरव, श्वान सेवा, भैरव वाहन सेवा, dog seva Bhairav, feed dogs Bhairav, Bhairav vahana seva, dog donation',
    'disclaimer'  => 'KaalBhairav.org disclaimer, spiritual website terms, Hindu devotional site guidelines',
    'mandir'      => 'काल भैरव वर्चुअल मंदिर, ऑनलाइन आरती, भैरव दर्शन, Kaal Bhairav virtual mandir, online aarti, live darshan, Bhairav aarti online, virtual temple',
    'ashtami'     => 'काल भैरव अष्टमी 2026, भैरव अष्टमी तिथि, अगली भैरव अष्टमी, Kaal Bhairav Ashtami 2026, Bhairav Ashtami dates, next Bhairav Ashtami, Ashtami calendar 2026',
    'jayanti'     => 'काल भैरव जयंती 2026, भैरव जयंती कब है, Kaal Bhairav Jayanti 2026, Bhairav Jayanti date, Bhairav Jayanti November 2026, Kaal Bhairav birthday',
];

$page_title      = $page_titles[$current_page] ?? $site_name;
$meta_description = $meta_desc[$current_page] ?? 'KaalBhairav.org — Complete devotional resource on Kaal Bhairav.';
$og_description  = $og_desc[$current_page] ?? $meta_description;
$page_keyword    = $page_keywords[$current_page] ?? 'Kaal Bhairav, KaalBhairav.org, काल भैरव, भैरव मंत्र, Bhairav mantra, Kashi, Varanasi';
$share_text      = $share_texts[$current_page] ?? 'काल भैरव की जय! जानें:';
$actual_file     = basename($_SERVER['PHP_SELF']);
$canonical_path  = ($actual_file === 'index.php') ? '' : $actual_file;
$full_url        = 'https://www.kaalbhairav.org/' . $canonical_path;
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
<meta name="keywords" content="<?php echo htmlspecialchars($page_keyword); ?>">
<meta name="robots" content="<?php echo in_array($current_page, ['404','500']) ? 'noindex, follow' : 'index, follow'; ?>">
<meta name="msvalidate.01" content="A148FC00FAEF359CD32EDDD1C9FA32D3">
<meta name="indexnow-key" content="43af73a0df314481819cb21edd4f51a4">
<meta name="author" content="KaalBhairav.org">
<link rel="icon" type="image/x-icon" href="<?php echo $base_href; ?>assets/favicons/favicon.ico">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $base_href; ?>assets/favicons/favicon-16x16.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $base_href; ?>assets/favicons/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $base_href; ?>assets/favicons/apple-touch-icon.png">
<link rel="manifest" href="<?php echo $base_href; ?>assets/favicons/site.webmanifest">
<meta name="theme-color" content="#0a0500">
<link rel="canonical" href="<?php echo $full_url; ?>">
<meta property="og:title" content="<?php echo $page_title; ?>">
<meta property="og:description" content="<?php echo $og_description; ?>">
<meta property="og:url" content="<?php echo $full_url; ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="KaalBhairav.org">
<meta property="og:image" content="https://www.kaalbhairav.org/assets/img/og-kaalbhairav.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:locale" content="hi_IN">
<meta property="og:locale:alternate" content="en_IN">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $page_title; ?>">
<meta name="twitter:description" content="<?php echo $og_description; ?>">
<meta name="twitter:image" content="https://www.kaalbhairav.org/assets/img/og-kaalbhairav.jpg">
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"WebSite","name":"KaalBhairav.org","url":"https://www.kaalbhairav.org","description":"काल भैरव — काशी के कोतवाल। मंत्र, पूजा विधि, 64 रूप, पवित्र कथाएं। Complete devotional resource on Kaal Bhairav.","inLanguage":["hi","en"]}
</script>
<script type="application/ld+json">
{"@context":"https://schema.org","@type":"Organization","name":"KaalBhairav.org","url":"https://www.kaalbhairav.org","logo":"https://www.kaalbhairav.org/assets/img/og-kaalbhairav.jpg","description":"Devoted to spreading knowledge of Kaal Bhairav — the Kotwal of Kashi"}
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
.nav-mobile-actions { display: contents; }
.lang-toggle-mobile {
  display: none;
  background: transparent;
  border: 1px solid rgba(201,168,76,0.4);
  color: #c9a84c;
  font-family: 'Cinzel', serif;
  font-size: 0.65rem;
  letter-spacing: 0.08em;
  padding: 0.3rem 0.6rem;
  border-radius: 2px;
  cursor: pointer;
}
.lang-toggle-mobile:hover { background: rgba(201,168,76,0.1); border-color: #c9a84c; }
/* Nav dropdowns (desktop) */
.nav-dropdown { position: relative; }
.nav-dropdown > .nav-dropdown-trigger { cursor: pointer; }
.nav-dropdown > .nav-dropdown-trigger::after {
  content: '\25BE';
  font-size: 0.7em;
  margin-left: 0.3em;
  opacity: 0.75;
  display: inline-block;
  transition: transform 0.2s;
}
.nav-dropdown:hover > .nav-dropdown-trigger::after,
.nav-dropdown.open > .nav-dropdown-trigger::after { transform: rotate(-180deg); opacity: 1; }
.nav-submenu {
  display: none;
  position: absolute;
  top: calc(100% + 4px);
  left: 0;
  min-width: 180px;
  background: rgba(10,5,0,0.98);
  border: 1px solid rgba(201,168,76,0.3);
  border-radius: 3px;
  padding: 0.4rem 0;
  list-style: none;
  z-index: 1001;
  box-shadow: 0 8px 24px rgba(0,0,0,0.6), 0 0 16px rgba(139,0,0,0.15);
  backdrop-filter: blur(10px);
}
.nav-dropdown:hover .nav-submenu,
.nav-dropdown:focus-within .nav-submenu,
.nav-dropdown.open .nav-submenu { display: block; }
.nav-submenu li { padding: 0; display: block; }
.nav-submenu a {
  display: block;
  padding: 0.55rem 1rem;
  white-space: nowrap;
  border: 1px solid transparent;
  border-radius: 0;
}
.nav-submenu a:hover, .nav-submenu a.active {
  background: rgba(201,168,76,0.08);
  border-color: transparent;
}
@media (max-width: 768px) {
  .nav-toggle { display: block; }
  .lang-toggle-mobile {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin-right: 0.4rem;
    padding: 0 0.7rem;
    height: 2.1rem;
    line-height: 1;
  }
  .nav-toggle {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 2.1rem;
    padding: 0 0.6rem;
    line-height: 1;
  }
  .nav-links.open .lang-toggle-wrap { display: none !important; }
  .nav-mobile-actions { display: flex; align-items: center; }
  .nav-links { display: none; flex-direction: column; position: absolute; top: 70px; left: 0; right: 0; background: rgba(10,5,0,0.98); border-bottom: 1px solid rgba(201,168,76,0.3); padding: 0.6rem 0 0.8rem; z-index: 999; }
  .nav-links.open { display: flex; }
  .nav-links li { text-align: center; padding: 0.1rem 0; }
  /* Dropdown trigger → centered section divider "─── LEARN ───" */
  .nav-links.open .nav-dropdown { margin: 0.6rem 0 0.2rem; width: 100%; display: block; }
  /* Closing separator after each submenu section — gold gradient line (matches label style) */
  .nav-links.open .nav-submenu {
    margin: 0 1.5rem 0.6rem;
    padding-bottom: 0.8rem;
    position: relative;
  }
  .nav-links.open .nav-submenu::after {
    content: '';
    position: absolute;
    left: 20%;
    right: 20%;
    bottom: 0;
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(201,168,76,0.35), transparent);
  }
  /* No trailing separator after the last dropdown (Festivals) */
  .nav-links.open .nav-dropdown ~ .nav-dropdown .nav-submenu::after { content: none; }
  .nav-links.open .nav-dropdown > .nav-dropdown-trigger {
    display: flex !important;
    align-items: center;
    justify-content: center;
    gap: 0.7rem;
    color: rgba(201,168,76,0.55) !important;
    font-size: 0.6rem !important;
    letter-spacing: 0.35em !important;
    text-transform: uppercase;
    padding: 0.4rem 0 0.2rem !important;
    border: none !important;
    cursor: default;
    pointer-events: none;
    background: transparent;
    font-family: 'Cinzel', serif;
    font-weight: 600;
  }
  .nav-links.open .nav-dropdown > .nav-dropdown-trigger::before,
  .nav-links.open .nav-dropdown > .nav-dropdown-trigger::after {
    content: '';
    flex: 1;
    max-width: 60px;
    height: 1px;
    background: linear-gradient(to right, transparent, rgba(201,168,76,0.35), transparent);
    margin: 0;
    transform: none;
    opacity: 1;
    display: block;
  }
  .nav-submenu {
    display: block;
    position: static;
    background: transparent;
    border: none;
    box-shadow: none;
    padding: 0;
    min-width: 0;
    backdrop-filter: none;
  }
  .nav-submenu li { padding: 0; }
  .nav-submenu a { white-space: normal; }
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
    padding: 0.5rem 0.35rem;
    font-size: 0.5rem;
    letter-spacing: 0.03em;
    border-radius: 8px;
    box-shadow: 0 0 16px rgba(139,0,0,0.5), 0 4px 12px rgba(0,0,0,0.6);
    max-width: 58px;
    white-space: normal;
    text-align: center;
    line-height: 1.2;
  }
  #wa-share-btn svg { width: 18px; height: 18px; }
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
<?php if (!empty($page_schema)): ?>
<script type="application/ld+json"><?php echo $page_schema; ?></script>
<?php endif; ?>
</head>
<body class="page-<?php echo htmlspecialchars($current_page); ?>">
<div class="particles" id="particles"></div>
<nav>
    <div class="nav-inner">
        <a href="<?php echo $base_href; ?>index.php" class="nav-logo">KaalBhairav<span>.org</span></a>
        <div class="nav-mobile-actions">
          <button class="lang-toggle-btn lang-toggle-mobile" onclick="setLang(localStorage.getItem('kb_lang')==='hi'?'en':'hi')">हिंदी</button>
          <button class="nav-toggle" id="navToggle" onclick="document.getElementById('mainNav').classList.toggle('open');this.textContent=document.getElementById('mainNav').classList.contains('open')?'✕':'☰'">☰</button>
        </div>
<?php
            $learn_pages     = ['stories','64-bhairav','kashi','pooja-vidhi','mantra'];
            $festival_pages  = ['ashtami','jayanti'];
            $learn_active    = in_array($current_page, $learn_pages, true) ? 'active' : '';
            $festival_active = in_array($current_page, $festival_pages, true) ? 'active' : '';
        ?>
        <ul class="nav-links" id="mainNav">
            <li><a href="<?php echo $base_href; ?>index.php" <?php echo $current_page==='index'?'class="active"':''; ?> data-key="nav_home">Home</a></li>
            <li><a href="<?php echo $base_href; ?>about.php" <?php echo $current_page==='about'?'class="active"':''; ?> data-key="nav_about">About</a></li>
            <li class="nav-dropdown">
                <a href="#" class="nav-dropdown-trigger <?php echo $learn_active; ?>" data-key="nav_learn" aria-haspopup="true" aria-expanded="false" onclick="event.preventDefault();this.parentNode.classList.toggle('open')">Learn</a>
                <ul class="nav-submenu">
                    <li><a href="<?php echo $base_href; ?>stories.php" <?php echo $current_page==='stories'?'class="active"':''; ?> data-key="nav_stories">Stories</a></li>
                    <li><a href="<?php echo $base_href; ?>64-bhairav.php" <?php echo $current_page==='64-bhairav'?'class="active"':''; ?> data-key="nav_64">64 Bhairavas</a></li>
                    <li><a href="<?php echo $base_href; ?>kashi.php" <?php echo $current_page==='kashi'?'class="active"':''; ?> data-key="nav_kashi">Kashi</a></li>
                    <li><a href="<?php echo $base_href; ?>pooja-vidhi.php" <?php echo $current_page==='pooja-vidhi'?'class="active"':''; ?> data-key="nav_pooja">Pooja Vidhi</a></li>
                    <li><a href="<?php echo $base_href; ?>mantra.php" <?php echo $current_page==='mantra'?'class="active"':''; ?> data-key="nav_mantra">Mantra &amp; Tantra</a></li>
                </ul>
            </li>
            <li><a href="<?php echo $base_href; ?>mandir.php" <?php echo $current_page==='mandir'?'class="active"':''; ?> style="color:#ff6600;" data-key="nav_mandir">🛕 Live Aarti</a></li>
            <li><a href="<?php echo $base_href; ?>seva.php" <?php echo $current_page==='seva'?'class="active"':''; ?> data-key="nav_seva">Dog Seva</a></li>
            <li class="nav-dropdown">
                <a href="#" class="nav-dropdown-trigger <?php echo $festival_active; ?>" data-key="nav_festivals" aria-haspopup="true" aria-expanded="false" style="color:#e8c96e;" onclick="event.preventDefault();this.parentNode.classList.toggle('open')">Festivals</a>
                <ul class="nav-submenu">
                    <li><a href="<?php echo $base_href; ?>bhairav-ashtami-2026.php" <?php echo $current_page==='ashtami'?'class="active"':''; ?> style="color:#e8c96e;" data-key="nav_ashtami">Ashtami 2026</a></li>
                    <li><a href="<?php echo $base_href; ?>kaal-bhairav-jayanti-2026.php" <?php echo $current_page==='jayanti'?'class="active"':''; ?> style="color:#e8c96e;" data-key="nav_jayanti">Jayanti 2026</a></li>
                </ul>
            </li>
            <li class="lang-toggle-wrap"><button id="lang-toggle" class="lang-toggle-btn" onclick="setLang(localStorage.getItem('kb_lang')==='hi'?'en':'hi');closeMenu()">हिंदी</button></li>
        </ul>
    </div>
</nav>
