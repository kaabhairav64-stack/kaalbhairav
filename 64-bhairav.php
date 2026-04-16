<?php
$page_title    = "64 Forms of Bhairav — Ashtabhairav and the 64 Bhairavas";
$meta_desc     = "Complete guide to all 64 forms of Bhairav — the 8 Ashtabhairavas and their 8 sub-forms each. Learn their names, directions, powers, and significance in the Shaiva Tantric tradition.";
$meta_keywords = "64 Bhairav, Ashtabhairav, 8 Bhairav, Asitanga Bhairav, Ruru Bhairav, Chanda Bhairav, Krodha Bhairav, Unmatta Bhairav, Kapala Bhairav, Bhishana Bhairav, Samhara Bhairav, 64 Bhairavas list";
$current_page  = "64bhairav";
include 'includes/header.php';
?>

<div class="page-header">
  <h1 data-key="bhairav64_header">The 64 Forms of Bhairav</h1>
  <p data-key="bhairav64_sub">The Ashtabhairav and their manifestations — guardians of the 8 directions of the cosmos</p>
</div>

<section class="section">
  <div class="section-inner">

    <div class="highlight-box mb-2">
      <h3 class="card-title" data-key="bhairav64_intro_title">Understanding the 64 Bhairavas</h3>
      <p data-key="bhairav64_intro_p1">
        According to the Shaiva Tantric tradition (particularly the <em>Bhairavagama</em> and
        <em>Rudrayamala Tantra</em>), there are <strong class="text-gold">64 Bhairavas</strong>
        organized into 8 primary forms called the <strong class="text-gold">Ashtabhairava</strong>
        (Eight Bhairavas). Each of these 8 primary Bhairavas commands 8 sub-forms — making
        8 × 8 = 64. They collectively preside over the 8 directions of the cosmos, 8 cremation
        grounds (<em>ashta shmashana</em>), and 8 aspects of Tantric power (<em>ashta siddhi</em>).
      </p>
      <br>
      <p data-key="bhairav64_intro_p2">
        In Kashi (Varanasi), the Ashtabhairav are stationed at 8 points around the city,
        forming a sacred protective ring — the <em>Kashi Ashtabhairav Chakra</em> — that
        guards the holy city. Completing a pilgrimage to all 8 Bhairav shrines in Kashi is
        considered deeply auspicious.
      </p>
    </div>

    <h2 class="section-title" style="margin-top:3rem;" data-key="bhairav64_8_title">The 8 Ashtabhairavas</h2>
    <div class="gold-line"></div>

    <?php
    $ashtabhairav = [
      [
        'num' => 1,
        'name' => 'Asitanga Bhairav',
        'sanskrit' => 'असितांग भैरव',
        'direction' => 'East',
        'color' => 'White / Crystal',
        'shakti' => 'Brahmi',
        'desc' => 'The first and foremost of the Ashtabhairavas. Asitanga means "one with dark limbs." He presides over the East direction and is associated with dawn, beginnings, and Brahmi Shakti. He is the most sattvic of the eight and governs spiritual knowledge, learning, and the power of speech (Vak Siddhi). Worshipped for wisdom, eloquence, and clearing confusion from the mind.',
        'sub_forms' => ['Asitanga','Pushpadanta','Bhadrakarna','Vikarana','Vikrita','Vikata','Bala','Mrityu']
      ],
      [
        'num' => 2,
        'name' => 'Ruru Bhairav',
        'sanskrit' => 'रुरु भैरव',
        'direction' => 'South-East (Agneya)',
        'color' => 'Red-Gold',
        'shakti' => 'Maheshwari',
        'desc' => 'Ruru means "deer" — this form of Bhairav is associated with fire, swiftness, and the power to destroy sins instantly. He is fierce but also a healer. His shakti is Maheshwari. Worshipped by those seeking swift removal of obstacles, legal problems, and enemies. Also revered for curing diseases.',
        'sub_forms' => ['Ruru','Chandika','Trishula','Jwala','Stambha','Nagabhushana','Bhumika','Virabhadra']
      ],
      [
        'num' => 3,
        'name' => 'Chanda Bhairav',
        'sanskrit' => 'चण्ड भैरव',
        'direction' => 'South',
        'color' => 'Dark Red',
        'shakti' => 'Kaumari',
        'desc' => 'Chanda means "fierce" or "wrathful." This form of Bhairav presides over the South — the direction of death and Yama. He is the most terrifying of the eight and governs the destruction of all negative forces. His shakti is Kaumari. Worshipped by Tantrics for protection from evil spirits, black magic, and sudden death.',
        'sub_forms' => ['Chanda','Virachanda','Chandisha','Mahachanda','Chandaksha','Chandanatha','Chandavira','Chandabhairava']
      ],
      [
        'num' => 4,
        'name' => 'Krodha Bhairav',
        'sanskrit' => 'क्रोध भैरव',
        'direction' => 'South-West (Nairruti)',
        'color' => 'Smoke / Dark Blue',
        'shakti' => 'Vaishnavi',
        'desc' => 'Krodha means "anger" — but this is the cosmic anger that destroys injustice and protects the righteous. He governs the South-West direction. His shakti is Vaishnavi. He is invoked for justice, to punish those who have caused wrongful harm, and to cut through deception. Protects devotees from treachery.',
        'sub_forms' => ['Krodha','Rudrakrodha','Mahakrodha','Krodhanatha','Krodhisha','Kalakrodha','Krodhavirabhadra','Krodhabhairava']
      ],
      [
        'num' => 5,
        'name' => 'Unmatta Bhairav',
        'sanskrit' => 'उन्मत्त भैरव',
        'direction' => 'West',
        'color' => 'Blue-Black',
        'shakti' => 'Varahi',
        'desc' => 'Unmatta means "intoxicated" or "ecstatic" — but this is divine intoxication, the state of being drunk on supreme consciousness. He governs the West direction and is associated with liberation from worldly maya. His shakti is Varahi. Worshipped by those seeking liberation from worldly attachments, addictions (of the spirit), and for experiencing deep meditative states.',
        'sub_forms' => ['Unmatta','Mattaprabhava','Mattendra','Unmattabhairava','Krodhamatta','Mahonmatta','Nayonmatta','Dvijonmatta']
      ],
      [
        'num' => 6,
        'name' => 'Kapala Bhairav',
        'sanskrit' => 'कपाल भैरव',
        'direction' => 'North-West (Vayavya)',
        'color' => 'White-Gold',
        'shakti' => 'Indrani',
        'desc' => 'Kapala means "skull" — this form directly embodies the kapalika tradition and is closely associated with the skull of Brahma. He governs the North-West. His shakti is Indrani. He is the patron of Tantric practitioners who use skull-bowls in their sadhana. Worshipped for Tantric siddhis, mastery over spirits, and breaking karmic limitations.',
        'sub_forms' => ['Kapala','Mahakopala','Kapalavirabhadra','Kapalarudra','Vamakopala','Brahmakopala','Kapaleshwara','Kapalabhairava']
      ],
      [
        'num' => 7,
        'name' => 'Bhishana Bhairav',
        'sanskrit' => 'भीषण भैरव',
        'direction' => 'North',
        'color' => 'Black',
        'shakti' => 'Chamunda',
        'desc' => 'Bhishana means "terrible" or "fearsome to behold." He governs the North direction and is associated with the cremation grounds, absolute darkness, and the void of creation. His shakti is Chamunda. He is worshipped at midnight in cremation grounds by advanced Tantrics. For ordinary devotees, he grants freedom from fear — for one who beholds the fearsome, nothing can frighten.',
        'sub_forms' => ['Bhishana','Atibhishana','Mahabhishana','Bhishanarudra','Bhishanavira','Shmashana Bhairav','Krura Bhairav','Bhishana Natha']
      ],
      [
        'num' => 8,
        'name' => 'Samhara Bhairav',
        'sanskrit' => 'संहार भैरव',
        'direction' => 'North-East (Ishanya)',
        'color' => 'Red-Black',
        'shakti' => 'Mahalakshmi / Shiva',
        'desc' => 'Samhara means "dissolution" — this is the most cosmic of all Bhairavas, presiding over the ultimate dissolution of the universe at the end of each cycle. He governs the sacred North-East direction. His shakti is Mahalakshmi. He is Kaal Bhairav in his most supreme aspect — the destroyer of time itself. Worshipped for liberation (moksha), transcendence of karma, and for realizing that all forms are ultimately dissolved into the divine.',
        'sub_forms' => ['Samhara','Atisamhara','Mahasamhara','Samhareshwara','Kaalasamhara','Brahmasamhara','Vishnusamhara','Shivasamhara']
      ],
    ];

    foreach ($ashtabhairav as $b): ?>
    <div class="story-block" style="margin:2.5rem 0;">
      <div style="display:flex; justify-content:space-between; align-items:flex-start; flex-wrap:wrap; gap:1rem; margin-bottom:1rem;">
        <div>
          <span class="source-tag" data-key="bhairav64_form<?php echo $b['num']; ?>_src">Form #<?php echo $b['num']; ?> of 8</span>
          <h3 class="story-title" style="margin-top:0.5rem;" data-key="bhairav64_form<?php echo $b['num']; ?>_name">
            <?php echo $b['num']; ?>. <?php echo $b['name']; ?>
            <span style="font-family:'EB Garamond',serif; font-size:1rem; color:var(--smoke); font-style:italic;">
              — <?php echo $b['sanskrit']; ?>
            </span>
          </h3>
        </div>
        <div style="text-align:right;">
          <div style="color:var(--smoke); font-size:0.82rem; font-family:'Cinzel',serif;">
            <span data-key="bhairav64_label_dir">Direction:</span> <span style="color:var(--gold);" data-key="bhairav64_form<?php echo $b['num']; ?>_dir"><?php echo $b['direction']; ?></span><br>
            <span data-key="bhairav64_label_color">Color:</span> <span style="color:var(--gold);" data-key="bhairav64_form<?php echo $b['num']; ?>_color"><?php echo $b['color']; ?></span><br>
            <span data-key="bhairav64_label_shakti">Shakti:</span> <span style="color:var(--gold);" data-key="bhairav64_form<?php echo $b['num']; ?>_shakti"><?php echo $b['shakti']; ?></span>
          </div>
        </div>
      </div>
      <p data-key="bhairav64_form<?php echo $b['num']; ?>_desc"><?php echo $b['desc']; ?></p>
      <div style="margin-top:1.2rem;">
        <p class="subforms-label" data-key="bhairav64_label_subforms">8 SUB-FORMS:</p>
        <div class="subforms-grid">
          <?php foreach ($b['sub_forms'] as $i => $sf): ?>
          <span class="subform-tag">
            <?php echo ($i+1); ?>. <span data-key="bhairav64_form<?php echo $b['num']; ?>_sub<?php echo ($i+1); ?>"><?php echo $sf; ?></span>
          </span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

    <!-- FULL 64 QUICK LIST -->
    <h2 class="section-title" style="margin-top:4rem;" data-key="bhairav64_list_title">Complete List — All 64 Bhairavas</h2>
    <div class="gold-line"></div>
    <p class="section-subtitle" data-key="bhairav64_list_sub">As enumerated in the Bhairavagama and Rudrayamala Tantra</p>

    <?php
    $all64 = [];
    foreach ($ashtabhairav as $b) {
      foreach ($b['sub_forms'] as $i => $sf) {
        $all64[] = [
          'num'   => count($all64)+1,
          'name'  => $sf . ' Bhairav',
          'group' => $b['name'],
          'gnum'  => $b['num'],
        ];
      }
    }
    ?>
    <div class="bhairav-grid">
      <?php foreach ($all64 as $item): ?>
      <div class="bhairav-item">
        <div class="bhairav-num">#<?php echo str_pad($item['num'],2,'0',STR_PAD_LEFT); ?></div>
        <div class="bhairav-name"><?php echo htmlspecialchars($item['name']); ?></div>
        <div class="bhairav-desc"><span data-key="bhairav64_subof">Sub-form of</span> <span data-key="bhairav64_gname<?php echo $item['gnum']; ?>"><?php echo htmlspecialchars($item['group']); ?></span></div>
      </div>
      <?php endforeach; ?>
    </div>

    <div class="disclaimer-box mt-2">
      <h3 data-key="bhairav64_sources_title">📚 Textual Sources</h3>
      <p data-key="bhairav64_sources_text">The enumeration and descriptions of the 64 Bhairavas are found primarily in:</p>
      <ul>
        <li data-key="bhairav64_src1"><strong>Bhairavagama</strong> — one of the 64 Shaiva Agamas</li>
        <li data-key="bhairav64_src2"><strong>Rudrayamala Tantra</strong> — describes the 8 × 8 structure in detail</li>
        <li data-key="bhairav64_src3"><strong>Kashi Khanda (Skanda Purana)</strong> — describes the Ashtabhairav of Varanasi</li>
        <li data-key="bhairav64_src4"><strong>Tantraloka</strong> by Abhinavagupta — philosophical commentary on Bhairav forms</li>
        <li data-key="bhairav64_src5"><strong>Sivapurana</strong> — Shatarudra Samhita describes the birth of Kaal Bhairav</li>
        <li data-key="bhairav64_src6"><strong>Kularnava Tantra</strong> — Tantric practices associated with Bhairav worship</li>
      </ul>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
