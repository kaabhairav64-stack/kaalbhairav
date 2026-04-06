<?php
$page_title    = "Kaal Bhairav Mantras — Mool Mantra, Ashtakam, Gayatri, Beej Mantras";
$meta_desc     = "Complete collection of Kaal Bhairav mantras — Mool Mantra, Kaal Bhairav Ashtakam by Adi Shankaracharya, Bhairav Gayatri, beej mantras, and Tantric procedures with guidance on proper use.";
$meta_keywords = "Kaal Bhairav mantra, Bhairav Ashtakam, Kaal Bhairav Gayatri, Bhairav beej mantra, Batuk Bhairav mantra, Bhairav stotra, Om Kalabhairavaya namah, Bhairav tantra";
$current_page  = "mantra";
include 'includes/header.php';
?>

<div class="page-header">
  <h1 data-key="mantra_header">Mantras &amp; Tantra</h1>
  <p data-key="mantra_sub">Sacred syllables of Kaal Bhairav — for devotion, protection, and liberation</p>
</div>

<section class="section">
  <div class="section-inner">

    <div class="disclaimer-box">
      <h3 data-key="mantra_disc_title">⚠ Guidance on Mantra Practice</h3>
      <p data-key="mantra_disc_text">Mantras are sacred sound formulas with deep vibrational energy. They should be practiced with sincerity, regularity, and righteous intent. <strong>Never use any mantra or Tantric practice to harm another person</strong> — this is explicitly forbidden in all authentic Shaiva and Tantric traditions and will create severe negative karma for the practitioner. For Tantric practices beyond basic mantra japa, guidance from a qualified guru is strongly recommended.</p>
    </div>

    <!-- MOOL MANTRA -->
    <h2 class="section-title" style="margin-top:3rem;" data-key="mantra_mool_title">Mool Mantra (Root Mantra)</h2>
    <div class="gold-line"></div>
    <div class="mantra-block">
      <p class="mantra-text">ॐ कालभैरवाय नमः</p>
      <p class="mantra-meaning"><em>Om Kalabhairavaya Namah</em><br>"I bow to Kaal Bhairav — the Lord of Time, Destroyer of Ego"</p>
      <br>
      <div style="display:flex;gap:0.6rem;flex-wrap:wrap;align-items:center;">
        <button onclick="copyMantra('ॐ कालभैरवाय नमः')" class="btn-secondary" style="font-size:0.8rem; padding:0.5rem 1.5rem;" data-key="mantra_copy_btn">Copy</button>
        <a href="https://wa.me/?text=<?php echo rawurlencode('ॐ कालभैरवाय नमः — काल भैरव मूल मंत्र। जय काल भैरव! और जानें: https://kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.3rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.75rem;font-weight:600;padding:0.5rem 1rem;border-radius:3px;text-decoration:none;">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
          <span data-key="mantra_wa_btn">Share</span>
        </a>
      </div>

      <button class="guidance-toggle" onclick="toggleGuidance(this)"
        data-open="Full Guidance ▾" data-close="Hide Guidance ▴"
        data-open-hi="पूर्ण मार्गदर्शन ▾" data-close-hi="छुपाएं ▴">
        <span class="label-text" data-key="guidance_open">Full Guidance ▾</span>
      </button>
      <div class="guidance-panel">
        <div class="guidance-inner">
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_results">Results</div>
            <div class="guidance-value" data-key="mool_results">Protection from evil spirits, fear, enemies, black magic, and sudden misfortune. Removes past-life karma. Grants courage and fearlessness. Daily practice over 40 days (mandala) accelerates spiritual growth and clears obstacles from all areas of life. Considered the most direct invocation of Bhairav's protective energy.<span class="guidance-source">Source: Kaal Bhairav Tantra, Shiva Purana — Rudra Samhita</span></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_who">Who Should Chant</div>
            <div class="guidance-value" data-key="mool_who">Anyone seeking protection and liberation. Especially recommended for those experiencing fear, court cases, enemies, chronic illness, recurring nightmares, or feeling spiritually blocked. Also for those who work at night or in dangerous professions.</div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_when">When to Chant</div>
            <div class="guidance-value" data-key="mool_when"><ul><li><span class="must">Best:</span> Sunday before sunrise, Tuesday at dusk, or midnight (ratri puja)</li><li>Bhairav Ashtami (8th lunar day of Krishna Paksha) — most potent</li><li>Kaal Bhairav Jayanti (Krishna Ashtami in Margashirsha month)</li><li>Amavasya (new moon night) for removing deep-seated karma</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_where">Where to Sit</div>
            <div class="guidance-value" data-key="mool_where">Face South — Bhairav's direction, the direction of Yama and cosmic justice. Sit on a black or dark-coloured mat (kambala or krishnajina). A clean home altar or Bhairav temple is ideal. Cremation ground (shmashana) is mentioned in Tantric texts for advanced practitioners only.</div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_must">Must Have</div>
            <div class="guidance-value" data-key="mool_must"><ul><li class="must">Rudraksha mala (108 beads) — Shiva's sacred beads</li><li class="must">Mustard oil lamp (sarson tel ka deepak) — Bhairav's preferred offering</li><li class="must">Clean body and mind — bath before practice</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_optional">Optional</div>
            <div class="guidance-value" data-key="mool_optional"><ul><li class="optional">Black sesame seeds (kala til) — offered to Bhairav</li><li class="optional">Urad dal (black lentil) — Bhairav's naivedya</li><li class="optional">Red hibiscus or black flowers</li><li class="optional">Bhairav yantra placed in front</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_count">Repetitions</div>
            <div class="guidance-value" data-key="mool_count"><ul><li>Daily practice: <span class="must">108 times</span></li><li>For serious problems: <span class="must">1008 times</span> on a Sunday or Ashtami</li><li>Full purashcharana: <span class="must">1,25,000 times</span> over 40 days for complete activation</li></ul></div>
          </div>
        </div>
      </div>
    </div>

    <!-- BATUK BHAIRAV MANTRA -->
    <h2 class="section-title" style="margin-top:3rem;" data-key="mantra_batuk_title">Batuk Bhairav Mantra</h2>
    <div class="gold-line"></div>
    <p class="section-subtitle" data-key="mantra_batuk_sub">Batuk = the eternal youth form of Bhairav — most accessible for all devotees</p>
    <div class="mantra-block">
      <p class="mantra-text">
        ॐ हृीं बटुकाय आपदुद्धारणाय<br>
        कुरु कुरु बटुकाय हृीं ॥
      </p>
      <p class="mantra-meaning">
        <em>Om Hreem Batukaya Apaduddharanaya Kuru Kuru Batukaya Hreem</em><br>
        "O Batuk Bhairav, please remove all calamities from my life, act swiftly, O Batuk."
      </p>
      <br>
      <div style="display:flex;gap:0.6rem;flex-wrap:wrap;align-items:center;">
        <button onclick="copyMantra('ॐ हृीं बटुकाय आपदुद्धारणाय कुरु कुरु बटुकाय हृीं')" class="btn-secondary" style="font-size:0.8rem; padding:0.5rem 1.5rem;" data-key="mantra_copy_btn">Copy</button>
        <a href="https://wa.me/?text=<?php echo rawurlencode('ॐ हृीं बटुकाय आपदुद्धारणाय कुरु कुरु बटुकाय हृीं — बटुक भैरव मंत्र। जय काल भैरव! और जानें: https://kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.3rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.75rem;font-weight:600;padding:0.5rem 1rem;border-radius:3px;text-decoration:none;">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
          <span data-key="mantra_wa_btn">Share</span>
        </a>
      </div>

      <button class="guidance-toggle" onclick="toggleGuidance(this)"
        data-open="Full Guidance ▾" data-close="Hide Guidance ▴"
        data-open-hi="पूर्ण मार्गदर्शन ▾" data-close-hi="छुपाएं ▴">
        <span class="label-text" data-key="guidance_open">Full Guidance ▾</span>
      </button>
      <div class="guidance-panel">
        <div class="guidance-inner">
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_results">Results</div>
            <div class="guidance-value" data-key="batuk_results">Removes sudden calamities (apadā) — accidents, sudden illness, financial ruin, legal trouble, travel dangers, evil eye (nazar). Most effective for crisis situations where fast relief is needed. Batuk (the eternal youth form) is approachable and responds quickly to sincere devotion. Protects children and families from unexpected harm.<span class="guidance-source">Source: Batuk Bhairav Tantram, Rudrayamala Tantra</span></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_who">Who Should Chant</div>
            <div class="guidance-value" data-key="batuk_who">People facing sudden crisis, illness, or danger. Those who travel frequently (by road, air, or train). Parents seeking protection for children. Those experiencing unexpected financial reversal, job loss, or legal problems. Anyone feeling an unexplained sense of impending danger.</div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_when">When to Chant</div>
            <div class="guidance-value" data-key="batuk_when"><ul><li><span class="must">Best:</span> Tuesday and Sunday evenings at dusk (pradosh kaal)</li><li>Midnight on Ashtami (8th lunar day) — most powerful</li><li>Before travel — chant 11 times for journey protection</li><li>In emergency: chant continuously without counting until relief comes</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_where">Where to Sit</div>
            <div class="guidance-value" data-key="batuk_where">Home altar facing East or South. Near a Bhairav temple is ideal. For travel protection — chant mentally in any direction. No strict location restriction for this mantra — Batuk Bhairav is accessible everywhere.</div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_must">Must Have</div>
            <div class="guidance-value" data-key="batuk_must"><ul><li class="must">Any oil lamp (deepak) — even a simple diya</li><li class="must">Sincere intention and full focus</li><li class="must">Mala for counting — Rudraksha preferred</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_optional">Optional</div>
            <div class="guidance-value" data-key="batuk_optional"><ul><li class="optional">Red flowers or red sindoor</li><li class="optional">Mustard oil for lamp (sarson tel)</li><li class="optional">Sweet offering (modak or jaggery) — Batuk's favourite</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_count">Repetitions</div>
            <div class="guidance-value" data-key="batuk_count"><ul><li>Daily protection: <span class="must">108 times</span></li><li>For active crisis: <span class="must">1008 times</span> in one sitting</li><li>For journey: <span class="must">11 or 21 times</span> before departure</li><li>Full activation: <span class="must">1,25,000 times</span> over 40 days</li></ul></div>
          </div>
        </div>
      </div>
    </div>

    <!-- GAYATRI MANTRA -->
    <h2 class="section-title" style="margin-top:3rem;" data-key="mantra_gayatri_title">Kaal Bhairav Gayatri Mantra</h2>
    <div class="gold-line"></div>
    <div class="mantra-block">
      <p class="mantra-text">
        ॐ कालदण्डाय विद्महे<br>
        कालभैरवाय धीमहि<br>
        तन्नो भैरवः प्रचोदयात् ॥
      </p>
      <p class="mantra-meaning">
        <em>Om Kaladandaya Vidmahe, Kalabhairavaya Dhimahi, Tanno Bhairavah Prachodayat</em><br>
        "We meditate upon Kaal Bhairav who holds the staff of Time. May that Bhairav illuminate our intellect."
      </p>
      <br>
      <div style="display:flex;gap:0.6rem;flex-wrap:wrap;align-items:center;">
        <button onclick="copyMantra('ॐ कालदण्डाय विद्महे कालभैरवाय धीमहि तन्नो भैरवः प्रचोदयात्')" class="btn-secondary" style="font-size:0.8rem; padding:0.5rem 1.5rem;" data-key="mantra_copy_btn">Copy</button>
        <a href="https://wa.me/?text=<?php echo rawurlencode('ॐ कालदण्डाय विद्महे कालभैरवाय धीमहि तन्नो भैरवः प्रचोदयात् — काल भैरव गायत्री मंत्र। जय काल भैरव! और जानें: https://kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.3rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.75rem;font-weight:600;padding:0.5rem 1rem;border-radius:3px;text-decoration:none;">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg>
          <span data-key="mantra_wa_btn">Share</span>
        </a>
      </div>

      <button class="guidance-toggle" onclick="toggleGuidance(this)"
        data-open="Full Guidance ▾" data-close="Hide Guidance ▴"
        data-open-hi="पूर्ण मार्गदर्शन ▾" data-close-hi="छुपाएं ▴">
        <span class="label-text" data-key="guidance_open">Full Guidance ▾</span>
      </button>
      <div class="guidance-panel">
        <div class="guidance-inner">
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_results">Results</div>
            <div class="guidance-value" data-key="gayatri_results">Awakens divine intelligence and clarity of mind. Removes confusion, wrong decisions, and mental darkness. Strengthens the intellect for spiritual understanding. Regular practice helps the seeker grasp the deeper meaning of scriptures and life. Also grants concentration, memory, and discernment (viveka). Considered the highest Bhairav mantra for spiritual seekers.<span class="guidance-source">Source: Shaiva Agamas, Mahanirvana Tantra</span></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_who">Who Should Chant</div>
            <div class="guidance-value" data-key="gayatri_who">Students seeking clarity and academic success. Spiritual seekers wanting deeper understanding of dharma. Those in confusion about major life decisions. People involved in teaching, writing, or spiritual work. Those who wish to progress beyond devotional worship into deep understanding of Bhairav's philosophy.</div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_when">When to Chant</div>
            <div class="guidance-value" data-key="gayatri_when"><ul><li><span class="must">Best:</span> Brahma Muhurta (90 minutes before sunrise) — peak time for Gayatri mantras</li><li>Sandhya kaal (dusk) — second most potent time</li><li>Wednesday mornings — associated with Mercury and intelligence</li><li>Purnima (full moon) — enhanced for all Gayatri mantras</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_where">Where to Sit</div>
            <div class="guidance-value" data-key="gayatri_where">Face East at sunrise (dawn practice). Face South at dusk or other times. Sit on a clean woollen mat (kambala). A quiet, clean space free from disturbance. Near flowing water (river, lake) enhances Gayatri practice. A dedicated meditation room or home altar is ideal.</div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_must">Must Have</div>
            <div class="guidance-value" data-key="gayatri_must"><ul><li class="must">Clean body — bath before practice is mandatory for Gayatri</li><li class="must">Oil lamp or ghee lamp (deepak)</li><li class="must">Rudraksha or crystal mala for counting</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_optional">Optional</div>
            <div class="guidance-value" data-key="gayatri_optional"><ul><li class="optional">White sandalwood paste (chandan) — applied to forehead</li><li class="optional">White flowers (jasmine or lotus) as offering</li><li class="optional">Copper vessel of water placed in front</li></ul></div>
          </div>
          <div class="guidance-row">
            <div class="guidance-label" data-key="g_count">Repetitions</div>
            <div class="guidance-value" data-key="gayatri_count"><ul><li>Daily: <span class="must">108 times</span> at dawn</li><li>For enhanced effect: <span class="must">3 rounds of 108</span> (324 total) at the three sandhyas</li><li>Full purashcharana: <span class="must">24,000 times</span> — one for each syllable of the original Gayatri</li></ul></div>
          </div>
        </div>
      </div>
    </div>

    <!-- BEEJ MANTRA -->
    <h2 class="section-title" style="margin-top:3rem;" data-key="mantra_beej_title">Beej Mantras (Seed Syllables)</h2>
    <div class="gold-line"></div>
    <p class="section-subtitle" data-key="mantra_beej_sub">Beej mantras are concentrated vibrational seeds — powerful and direct. For advanced practitioners.</p>

    <div class="card-grid">
      <div class="card">
        <h3 class="card-title" data-key="mantra_beej1_title">Bhairav Beej</h3>
        <p class="mantra-text" style="font-size:2rem; text-align:center; margin:1rem 0;">हृीं</p>
        <p class="card-text" data-key="mantra_beej1_text"><em>Hreem</em> — the primary beej of Bhairav. Represents his shakti, maya-piercing energy, and direct connection to cosmic consciousness. Used in Tantra as the core seed syllable.</p>
        <div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-top:1rem;">
          <button onclick="copyMantra('हृीं')" class="btn-secondary" style="font-size:0.75rem;padding:0.4rem 1rem;" data-key="mantra_copy_btn">Copy</button>
          <a href="<?php echo 'https://wa.me/?text='.rawurlencode('हृीं — भैरव बीज मंत्र। काल भैरव का प्राथमिक बीज। जय काल भैरव! 🙏 kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.3rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.72rem;font-weight:600;padding:0.4rem 0.8rem;border-radius:3px;text-decoration:none;"><svg viewBox="0 0 24 24" width="13" height="13" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg><span data-key="mantra_wa_btn">Share</span></a>
        </div>
      </div>
      <div class="card">
        <h3 class="card-title" data-key="mantra_beej2_title">Kaal Beej</h3>
        <p class="mantra-text" style="font-size:2rem; text-align:center; margin:1rem 0;">क्रीं</p>
        <p class="card-text" data-key="mantra_beej2_text"><em>Kreem</em> — the beej of Kali, the time-force. Used in Kaal Bhairav practice to invoke the aspect of time-transcendence and dissolution of karma.</p>
        <div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-top:1rem;">
          <button onclick="copyMantra('क्रीं')" class="btn-secondary" style="font-size:0.75rem;padding:0.4rem 1rem;" data-key="mantra_copy_btn">Copy</button>
          <a href="<?php echo 'https://wa.me/?text='.rawurlencode('क्रीं — काल बीज मंत्र। काल भैरव साधना में प्रयुक्त। जय काल भैरव! 🙏 kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.3rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.72rem;font-weight:600;padding:0.4rem 0.8rem;border-radius:3px;text-decoration:none;"><svg viewBox="0 0 24 24" width="13" height="13" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg><span data-key="mantra_wa_btn">Share</span></a>
        </div>
      </div>
      <div class="card">
        <h3 class="card-title" data-key="mantra_beej3_title">Mrityu Beej</h3>
        <p class="mantra-text" style="font-size:2rem; text-align:center; margin:1rem 0;">ॐ</p>
        <p class="card-text" data-key="mantra_beej3_text"><em>Om</em> — the universal sound, the beej of all mantras. Always precedes Bhairav mantras to establish cosmic resonance.</p>
        <div style="display:flex;gap:0.5rem;flex-wrap:wrap;margin-top:1rem;">
          <button onclick="copyMantra('ॐ')" class="btn-secondary" style="font-size:0.75rem;padding:0.4rem 1rem;" data-key="mantra_copy_btn">Copy</button>
          <a href="<?php echo 'https://wa.me/?text='.rawurlencode('ॐ — मृत्यु बीज, सभी मंत्रों का आधार। जय काल भैरव! 🙏 kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.3rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.72rem;font-weight:600;padding:0.4rem 0.8rem;border-radius:3px;text-decoration:none;"><svg viewBox="0 0 24 24" width="13" height="13" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg><span data-key="mantra_wa_btn">Share</span></a>
        </div>
      </div>
    </div>

    <!-- KAAL BHAIRAV ASHTAKAM -->
    <h2 class="section-title" style="margin-top:3rem;" data-key="mantra_ashtakam_title">Kaal Bhairav Ashtakam</h2>
    <div class="gold-line"></div>
    <p class="section-subtitle" data-key="mantra_ashtakam_sub">The celebrated hymn of 8 verses by Adi Shankaracharya — the most complete devotional text on Kaal Bhairav</p>

    <div class="disclaimer-box" style="margin-bottom:1.5rem;">
      <p data-key="mantra_ashtakam_desc">The complete Ashtakam is an ancient Sanskrit text of 8 stanzas describing the glory, attributes, and grace of Kaal Bhairav. Below is a description of each verse with its meaning and significance. The full Sanskrit text is found in <em>Shankaracharya's Stotra Sangraha</em>.</p>
      <div style="margin-top:1rem;">
        <a href="<?php echo 'https://wa.me/?text='.rawurlencode('काल भैरव अष्टकम् — आदि शंकराचार्य द्वारा रचित 8 श्लोकों का स्तोत्र। जय काल भैरव! 🙏 पूरा पढ़ें: kaalbhairav.org/mantra.php'); ?>" target="_blank" rel="noopener" style="display:inline-flex;align-items:center;gap:0.4rem;background:#25D366;color:#fff;font-family:'Cinzel',serif;font-size:0.75rem;font-weight:600;padding:0.5rem 1.1rem;border-radius:3px;text-decoration:none;"><svg viewBox="0 0 24 24" width="14" height="14" fill="#fff"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.126.554 4.122 1.524 5.853L.057 23.976l6.306-1.63A11.942 11.942 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 21.818a9.796 9.796 0 01-5.017-1.378l-.36-.214-3.742.982.999-3.648-.234-.374A9.796 9.796 0 012.182 12C2.182 6.57 6.57 2.182 12 2.182S21.818 6.57 21.818 12 17.43 21.818 12 21.818z"/></svg><span data-key="mantra_wa_btn">Share Ashtakam</span></a>
      </div>
    </div>

    <?php
    $ashtakam = [
      ['verse'=>1, 'desc'=>'Opens by describing Bhairav\'s divine appearance: dark complexion shining like a fresh rain cloud, three blazing eyes, adorned with skulls, wearing the moon as a crown. Proclaims him as the Kotwal of Kashi who destroys all sins.', 'refrain'=>'Verse end: "Kaalabhairavam bhaje" (I worship Kaal Bhairav)'],
      ['verse'=>2, 'desc'=>'Describes Bhairav\'s divine qualities: he holds a trident, noose, skull, and drum. He wears the crescent moon, and snakes as ornaments. His lotus feet destroy the sins of his devotees.', 'refrain'=>'Devotees surrender completely at his feet.'],
      ['verse'=>3, 'desc'=>'Invokes Bhairav as the eternal one who transcends the cycle of creation and destruction. He is beyond all the gods — Brahma, Vishnu, and even Shiva\'s transcendent aspect. The gods bow to him.', 'refrain'=>'He alone grants liberation.'],
      ['verse'=>4, 'desc'=>'Describes Bhairav as the ultimate judge — the one who records and punishes the deeds of all beings. His law is absolute. No one escapes his ledger. Yet for devotees, he is the most compassionate lord.', 'refrain'=>'His danda (staff of justice) is feared by all wrongdoers.'],
      ['verse'=>5, 'desc'=>'Speaks of Bhairav as the destroyer of the ego (Brahma\'s head). He teaches the supreme lesson: the pride of creation is nothing before the truth of time. He who surrenders his ego finds liberation.', 'refrain'=>'He carries the skull as a reminder of ego\'s impermanence.'],
      ['verse'=>6, 'desc'=>'Praises the sacred site of Kashi — calling it the city of liberation where even the greatest sinners are freed by dying within its limits. Bhairav as its Kotwal grants this liberation to all.', 'refrain'=>'Kashi under his protection is the ultimate refuge.'],
      ['verse'=>7, 'desc'=>'Describes the fruits of worshipping Bhairav: freedom from disease, sorrow, poverty, fear, and enemies. Devotees gain longevity, success, knowledge, and spiritual power.', 'refrain'=>'Reciting this verse 3 times removes all adversity.'],
      ['verse'=>8, 'desc'=>'The phalashruti (fruit of recitation verse): proclaims that whoever recites this hymn with devotion is freed from all sins, gains divine protection, and ultimately attains Bhairav\'s supreme abode — liberation from the cycle of birth and death.', 'refrain'=>'The hymn\'s recitation once daily grants freedom from fear.'],
    ];
    ?>

    <?php foreach ($ashtakam as $v): ?>
    <div class="story-block" style="margin:1.5rem 0; border-left-color: rgba(201,168,76,0.5);">
      <span class="source-tag" data-key="mantra_ashta_v<?php echo $v['verse']; ?>_src">Verse <?php echo $v['verse']; ?> of 8</span>
      <p data-key="mantra_ashta_v<?php echo $v['verse']; ?>_desc"><?php echo $v['desc']; ?></p>
      <p style="margin-top:0.7rem; color:var(--gold); font-style:italic; font-size:0.9rem;" data-key="mantra_ashta_v<?php echo $v['verse']; ?>_refrain">→ <?php echo $v['refrain']; ?></p>
    </div>
    <?php endforeach; ?>

    <!-- TANTRIC PRACTICES -->
    <h2 class="section-title" style="margin-top:4rem;" data-key="mantra_tantric_title">Tantric Practices</h2>
    <div class="gold-line"></div>

    <div class="disclaimer-box">
      <h3 data-key="mantra_tantric_warn_title">⚠ Critical Warning on Tantric Practices</h3>
      <p data-key="mantra_tantric_warn_text">The following information is provided for <strong>educational purposes only</strong>. Tantric practices described here should <strong>only</strong> be performed by individuals who have received initiation (<em>diksha</em>) from a qualified Shaiva or Tantric guru. Performing Tantric rites without proper initiation, preparation, or guidance can have adverse effects. <strong>All practices are exclusively for personal spiritual benefit — NEVER for harming others.</strong> This website and its creators bear no responsibility for any outcomes.</p>
    </div>

    <div class="card-grid" style="margin-top:2rem;">
      <div class="card">
        <div class="card-icon">🕯️</div>
        <h3 class="card-title" data-key="mantra_tantric1_title">Shmashana Sadhana</h3>
        <p class="card-text" data-key="mantra_tantric1_text">Advanced practice performed in cremation grounds at midnight. Requires proper initiation, fearlessness, and guidance. Considered the most direct way to experience Bhairav's presence. Only for initiated Tantrics.</p>
      </div>
      <div class="card">
        <div class="card-icon">🔱</div>
        <h3 class="card-title" data-key="mantra_tantric2_title">Bhairav Yantra</h3>
        <p class="card-text" data-key="mantra_tantric2_text">A geometric diagram (yantra) representing Bhairav's cosmic form. It is energized through mantra and ritual and kept in the worship space. Acts as a permanent focal point of Bhairav's energy for protection and blessings.</p>
      </div>
      <div class="card">
        <div class="card-icon">📿</div>
        <h3 class="card-title" data-key="mantra_tantric3_title">Purashcharana</h3>
        <p class="card-text" data-key="mantra_tantric3_text">A dedicated repetition of Bhairav's mantra — 100,000 times (1 lakh) minimum for basic activation, typically done over 40 days. Requires specific dietary, behavioral, and ritual restrictions throughout the period.</p>
      </div>
      <div class="card">
        <div class="card-icon">🌑</div>
        <h3 class="card-title" data-key="mantra_tantric4_title">Amavasya Sadhana</h3>
        <p class="card-text" data-key="mantra_tantric4_text">Special practice performed on the new moon night. Begins at midnight. Includes mantra japa, lamp offering, and offerings of sesame and iron. Considered highly potent for removing stubborn obstacles.</p>
      </div>
    </div>

    <div class="disclaimer-box" style="margin-top:3rem;">
      <h3 data-key="mantra_final_title">The Core Principle of Righteous Practice</h3>
      <p data-key="mantra_final_text">All authentic Shaiva Tantric traditions agree: <strong>Bhairav himself punishes those who misuse his energy.</strong> He is the Kotwal of cosmic justice. Using any practice for manipulation, control, or harm of others will invoke Bhairav's wrath — not his grace. The practitioner who approaches Bhairav with ego, greed, or malice will find their own karma accelerated and amplified. <em>True Bhairav sadhana dissolves the ego — it does not inflate it.</em></p>
    </div>

  </div>
</section>

<?php include 'includes/footer.php'; ?>
