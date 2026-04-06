<?php
$page_title   = "Kaal Bhairav — Kotwal of Kashi | Lord of Time";
$meta_desc    = "Enter the sacred world of Kaal Bhairav — the fierce form of Lord Shiva, Kotwal of Kashi, destroyer of ego, guardian of time. Stories, mantras, pooja vidhi, 64 forms and more.";
$meta_keywords = "Kaal Bhairav, Kotwal of Kashi, Kaal Bhairav temple, Bhairav mantra, Bhairav pooja, Varanasi Bhairav, Lord Bhairav";
$current_page = "home";
include 'includes/header.php';
?>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg"></div>
  <div class="flame-container"></div>
  <div class="hero-content">
    <p class="hero-sanskrit">ॐ कालभैरवाय नमः</p>
    <div class="trishul-divider">✦ ☽ ✦</div>
    <h1 class="hero-title" data-key="hero_title">Kaal Bhairav</h1>
    <p class="hero-title-sub" data-key="hero_subtitle">Kotwal of Kashi · Lord of Time · Destroyer of Ego</p>
    <p class="hero-desc" data-key="hero_desc">
      He who carries the skull of Brahma. He who roams the cremation grounds.
      He who is Time itself — the fierce, compassionate guardian of Varanasi,
      the eternal city where death is liberation.
    </p>
    <div>
      <a href="<?php echo $base_href; ?>pooja-vidhi.php" class="btn-primary" data-key="btn_pooja">Pooja Vidhi</a>
      <a href="<?php echo $base_href; ?>mantra.php" class="btn-primary" data-key="btn_mantra">Mantras &amp; Tantra</a>
      <a href="<?php echo $base_href; ?>stories.php" class="btn-secondary" data-key="btn_stories">Sacred Stories</a>
    </div>
  </div>
</section>

<!-- WHO IS KAAL BHAIRAV -->
<section class="section" style="background: linear-gradient(to bottom, var(--black), var(--deep));">
  <div class="section-inner">
    <h2 class="section-title" data-key="who_title">Who is Kaal Bhairav?</h2>
    <div class="gold-line"></div>
    <div class="two-col">
      <div>
        <p data-key="who_p1">
          <strong class="text-gold">Kaal Bhairav</strong> (काल भैरव) is the most fierce and powerful manifestation
          of Lord Shiva. The name combines <em>Kaal</em> (Time/Death) and <em>Bhairav</em> (terrible, fearsome).
          He is the god who transcends time itself — and simultaneously is Time.
        </p>
        <br>
        <p data-key="who_p2">
          He is depicted as a dark, naked deity adorned with a garland of skulls, holding a skull-cup
          (<em>kapala</em>), a trident, a drum, and a noose. His vehicle (<em>vahana</em>) is a black dog —
          a sacred animal representing loyalty, alertness, and the ability to perceive what humans cannot.
        </p>
        <br>
        <p data-key="who_p3">
          In <strong class="text-gold">Varanasi (Kashi)</strong>, he is revered as the <em>Kotwal</em> —
          the divine police commissioner — who governs the eternal city on behalf of Lord Shiva. No one
          enters or leaves Kashi without his permission.
        </p>
      </div>
      <div class="weapons-panel">
          <h3 class="card-title" style="margin-bottom:1rem;" data-key="attr_title">Key Attributes</h3>
          <table>
            <tr><th data-key="attr_h1">Attribute</th><th data-key="attr_h2">Details</th></tr>
            <tr><td data-key="attr_name">Also Known As</td><td data-key="attr_name_val">Kshetrapala, Kotwal, Dandapani</td></tr>
            <tr><td data-key="attr_form">Form</td><td data-key="attr_form_val">Fierce aspect (Ugra) of Shiva</td></tr>
            <tr><td data-key="attr_vahana">Vahana</td><td data-key="attr_vahana_val">Black Dog (Shvan)</td></tr>
            <tr><td data-key="attr_color">Color</td><td data-key="attr_color_val">Dark blue / Black</td></tr>
            <tr><td data-key="attr_day">Day</td><td data-key="attr_day_val">Bhairav Ashtami, Sunday, Tuesday</td></tr>
            <tr><td data-key="attr_dhaam">Primary Dhaam</td><td data-key="attr_dhaam_val">Kaal Bhairav Temple, Varanasi</td></tr>
            <tr><td data-key="attr_river">Sacred River</td><td data-key="attr_river_val">Shipra (Ujjain), Ganga (Kashi)</td></tr>
            <tr><td data-key="attr_forms">Forms</td><td data-key="attr_forms_val">64 Bhairavas (Ashtabhairav × 8)</td></tr>
          </table>
      </div>
    </div>
  </div>
</section>

<!-- QUICK ACCESS CARDS -->
<section class="section">
  <div class="section-inner">
    <h2 class="section-title" data-key="cards_title">Explore the Sacred Knowledge</h2>
    <div class="gold-line"></div>
    <div class="card-grid">

      <a href="<?php echo $base_href; ?>stories.php" style="text-decoration:none;">
        <div class="card">
          <div class="card-icon">📜</div>
          <h3 class="card-title" data-key="card1_title">Sacred Stories</h3>
          <p class="card-text" data-key="card1_text">The beheading of Brahma, origin of Kaal Bhairav, the legend of Kashi Kotwal, and stories from Shiva Purana, Skanda Purana, and Tantric texts.</p>
        </div>
      </a>

      <a href="<?php echo $base_href; ?>64-bhairav.php" style="text-decoration:none;">
        <div class="card">
          <div class="card-icon">🔱</div>
          <h3 class="card-title" data-key="card2_title">64 Forms of Bhairav</h3>
          <p class="card-text" data-key="card2_text">The 64 Bhairavas — 8 Ashtabhairavas each commanding 8 sub-forms. Each form governs a specific direction, power, and aspect of cosmic energy.</p>
        </div>
      </a>

      <a href="<?php echo $base_href; ?>pooja-vidhi.php" style="text-decoration:none;">
        <div class="card">
          <div class="card-icon">🪷</div>
          <h3 class="card-title" data-key="card3_title">Pooja Vidhi</h3>
          <p class="card-text" data-key="card3_text">Complete step-by-step Kaal Bhairav pooja procedure — materials required, sankalpa, abhishek, naivedya, aarti, and known spiritual effects.</p>
        </div>
      </a>

      <a href="<?php echo $base_href; ?>mantra.php" style="text-decoration:none;">
        <div class="card">
          <div class="card-icon">🔔</div>
          <h3 class="card-title" data-key="card4_title">Mantras &amp; Tantra</h3>
          <p class="card-text" data-key="card4_text">Mool mantra, Ashtakam, Bhairav Gayatri, beej mantras, and Tantric practices — with proper guidance, effects, and fair-use principles.</p>
        </div>
      </a>

      <a href="<?php echo $base_href; ?>seva.php" style="text-decoration:none;">
        <div class="card">
          <div class="card-icon"><span style="filter: brightness(0.05) drop-shadow(0 0 4px rgba(201,168,76,0.7));">🐕</span></div>
          <h3 class="card-title" data-key="card5_title">Dog Seva &amp; Donation</h3>
          <p class="card-text" data-key="card5_text">The dog is Bhairav's sacred vahana. Feeding and caring for dogs — especially strays — is one of the highest forms of Bhairav seva.</p>
        </div>
      </a>

      <a href="<?php echo $base_href; ?>about.php" style="text-decoration:none;">
        <div class="card">
          <div class="card-icon">🌙</div>
          <h3 class="card-title" data-key="card6_title">About Kaal Bhairav</h3>
          <p class="card-text" data-key="card6_text">Iconography, significance, connection to Shaivism and Tantra, Bhairav in different traditions — Shaiva, Shakta, and Nath sampradaya.</p>
        </div>
      </a>

    </div>
  </div>
</section>

<!-- MOOL MANTRA FEATURE -->
<section class="section" style="background: linear-gradient(135deg, rgba(139,0,0,0.08), var(--deep));">
  <div class="section-inner">
    <h2 class="section-title" data-key="mantra_title">The Mool Mantra</h2>
    <div class="gold-line"></div>
    <div class="mantra-block">
      <p class="mantra-text">
        ॐ हृीं बटुकाय आपदुद्धारणाय<br>
        कुरु कुरु बटुकाय हृीं ॥
      </p>
      <p class="mantra-meaning" data-key="mantra_meaning">
        "Om Hreem Batukaya Apaduddharanaya Kuru Kuru Batukaya Hreem"<br>
        <em>O Batuk Bhairav, please remove all obstacles and distress from my life.</em>
      </p>
      <br>
      <button onclick="copyMantra('ॐ हृीं बटुकाय आपदुद्धारणाय कुरु कुरु बटुकाय हृीं')"
        class="btn-secondary" style="font-size:0.8rem; padding:0.5rem 1.5rem;" data-key="btn_copy">
        Copy Mantra
      </button>
    </div>
    <p style="color:var(--smoke); font-size:0.9rem; font-style:italic; margin-top:1rem;">
      <span data-key="mantra_guide">Chant 108 times daily, preferably on Sunday or Tuesday, facing South.</span><br>
      <a href="<?php echo $base_href; ?>mantra.php" style="color:var(--gold);" data-key="dmw_more">See all mantras →</a>
    </p>
  </div>
</section>

<!-- IMPORTANCE OF KASHI -->
<section class="section">
  <div class="section-inner">
    <h2 class="section-title" data-key="kashi_title">Kashi — The Eternal City</h2>
    <div class="gold-line"></div>
    <div class="story-block">
      <span class="source-tag" data-key="kashi_source">Source: Kashi Khanda, Skanda Purana</span>
      <h3 class="story-title" data-key="kashi_story_title">Why Kaal Bhairav is Kashi's Guardian</h3>
      <p data-key="kashi_p1">
        When Lord Shiva decided to make Kashi his permanent abode, he needed an eternal guardian
        for the city — one who would maintain cosmic order, punish wrongdoers, and ensure that
        every soul dying within the city's limits received liberation (<em>moksha</em>).
      </p>
      <br>
      <p data-key="kashi_p2">
        He appointed <strong class="text-gold">Kaal Bhairav</strong> as the <em>Kotwal</em> — the keeper
        of Kashi. The Kaal Bhairav temple on Kaal Bhairav Gali in Varanasi is one of the most important
        shrines in the city, and it is said that one must visit Kaal Bhairav before visiting
        Kashi Vishwanath — to seek permission to enter the eternal city.
      </p>
      <br>
      <p data-key="kashi_p3">
        According to tradition, even Lord Yama (the god of death) has no authority within the
        boundaries of Kashi — it is Kaal Bhairav alone who presides over death and liberation here.
        Every soul departing from Kashi is said to receive the <em>Tarak Mantra</em> whispered in
        the ear by Lord Shiva himself, through the grace of Kaal Bhairav.
      </p>
    </div>
    <div class="text-center mt-2">
      <a href="<?php echo $base_href; ?>stories.php" class="btn-secondary" data-key="btn_all_stories">Read All Sacred Stories →</a>
    </div>
  </div>
</section>

<!-- DOG SEVA CALLOUT -->
<section class="section" style="background: linear-gradient(to bottom, var(--deep), var(--black));">
  <div class="section-inner">
    <div class="donation-section">
      <div style="display:flex; align-items:center; justify-content:center; gap:0.6rem; margin-bottom:0.5rem; flex-wrap:wrap;">
        <span style="font-size:2.5rem; line-height:1; filter: brightness(0.05) drop-shadow(0 0 4px rgba(201,168,76,0.7));">🐕</span>
        <h2 class="section-title" style="margin-bottom:0;" data-key="seva_title">Feed a Dog, Please Bhairav</h2>
      </div>
      <div class="gold-line"></div>
      <p style="color:var(--smoke); max-width:600px; margin:0 auto 1.5rem;" data-key="seva_desc">
        The black dog is Kaal Bhairav's <em>vahana</em> and most beloved animal.
        Feeding a stray dog — especially on Sunday, Bhairav Ashtami, or during Kaal Bhairav Jayanti —
        is considered one of the most powerful acts of devotion.
      </p>
      <a href="<?php echo $base_href; ?>seva.php" class="btn-primary" data-key="btn_seva">Contribute to Dog Seva</a>
    </div>
  </div>
</section>

<!-- DISCLAIMER NOTICE -->
<section class="section">
  <div class="section-inner">
    <div class="disclaimer-box">
      <h3 data-key="disclaimer_title">⚠ Important Notice — Please Read</h3>
      <p data-key="disclaimer_text">
        All spiritual practices, mantras, and Tantric procedures described on this website are
        presented for <strong>educational and devotional purposes only</strong>. They are meant
        exclusively for <strong>personal spiritual growth, protection, and positive purposes</strong>.
        The use of any practice for harming others is strictly prohibited and goes against the
        dharmic principles of Bhairav worship. Any practice performed is entirely at the
        practitioner's own responsibility and risk.
      </p>
      <a href="<?php echo $base_href; ?>disclaimer.php" style="color:var(--gold);" data-key="disclaimer_link">Read full disclaimer →</a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
