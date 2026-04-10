<?php
// This page is designed for print-to-PDF — clean layout, no nav/footer
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="hi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kaal Bhairav Mantras — Print Card | KaalBhairav.org</title>
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Cinzel:wght@400;600&family=EB+Garamond:ital,wght@0,400;0,500;1,400&display=swap" rel="stylesheet">
<style>
* { margin:0; padding:0; box-sizing:border-box; }
body {
  background: #fff;
  color: #1a0800;
  font-family: 'EB Garamond', serif;
}
.print-page {
  max-width: 800px;
  margin: 0 auto;
  padding: 2rem;
}
.header-box {
  background: linear-gradient(135deg, #0a0500, #1a0800);
  color: #c9a84c;
  text-align: center;
  padding: 2rem;
  border-radius: 6px;
  margin-bottom: 1.5rem;
}
.header-box h1 {
  font-family: 'Cinzel Decorative', serif;
  font-size: 1.6rem;
  color: #c9a84c;
  margin-bottom: 0.3rem;
}
.header-box p {
  font-size: 0.95rem;
  color: rgba(201,168,76,0.8);
  font-family: 'Cinzel', serif;
  letter-spacing: 0.05em;
}
.mantra-card {
  border: 1px solid #c9a84c;
  border-radius: 6px;
  padding: 1.5rem;
  margin-bottom: 1.2rem;
  background: #fffdf8;
  page-break-inside: avoid;
}
.mantra-card h2 {
  font-family: 'Cinzel', serif;
  font-size: 0.85rem;
  letter-spacing: 0.1em;
  color: #8b0000;
  text-transform: uppercase;
  margin-bottom: 0.8rem;
  border-bottom: 1px solid rgba(139,0,0,0.2);
  padding-bottom: 0.5rem;
}
.mantra-text {
  font-size: 1.5rem;
  color: #1a0800;
  line-height: 1.7;
  text-align: center;
  margin: 0.8rem 0;
  font-family: 'EB Garamond', serif;
}
.mantra-roman {
  font-size: 0.95rem;
  color: #555;
  text-align: center;
  font-style: italic;
  margin-bottom: 0.5rem;
}
.mantra-meaning {
  font-size: 0.9rem;
  color: #333;
  text-align: center;
  border-top: 1px solid rgba(201,168,76,0.3);
  padding-top: 0.6rem;
  margin-top: 0.6rem;
}
.guidance-mini {
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  margin-top: 0.8rem;
  font-size: 0.82rem;
  color: #444;
}
.guidance-mini span {
  background: rgba(139,0,0,0.06);
  border-radius: 3px;
  padding: 0.2rem 0.5rem;
}
.guidance-mini strong { color: #8b0000; }
.divider {
  text-align: center;
  color: #c9a84c;
  font-size: 1.2rem;
  margin: 0.5rem 0;
}
.footer-box {
  background: #0a0500;
  color: rgba(201,168,76,0.8);
  text-align: center;
  padding: 1rem;
  border-radius: 6px;
  margin-top: 1.5rem;
  font-family: 'Cinzel', serif;
  font-size: 0.78rem;
  letter-spacing: 0.05em;
}
.print-btn {
  display: block;
  margin: 1rem auto 1.5rem;
  background: #8b0000;
  color: #c9a84c;
  font-family: 'Cinzel', serif;
  font-size: 0.85rem;
  letter-spacing: 0.1em;
  border: 1px solid #c9a84c;
  padding: 0.7rem 2rem;
  border-radius: 4px;
  cursor: pointer;
  text-align: center;
  width: fit-content;
}
.print-btn:hover { background: #a00000; }
.back-link {
  display: block;
  text-align: center;
  color: #8b0000;
  font-family: 'Cinzel', serif;
  font-size: 0.78rem;
  margin-bottom: 1rem;
  text-decoration: none;
  letter-spacing: 0.05em;
}

@media print {
  .print-btn, .back-link, .no-print { display: none !important; }
  body { background: #fff; }
  .print-page { padding: 0; }
  .header-box { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
  .footer-box { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
}
</style>
</head>
<body>
<div class="print-page">

  <a href="mantra.php" class="back-link no-print">← Back to Mantras Page</a>
  <button class="print-btn no-print" onclick="window.print()">Print / Save as PDF</button>

  <div class="header-box">
    <h1>Kaal Bhairav Mantras</h1>
    <p>काल भैरव के पवित्र मंत्र — Sacred Syllables for Protection & Liberation</p>
    <p style="margin-top:0.5rem; font-size:0.8rem; opacity:0.7;">KaalBhairav.org · Jay Kaal Bhairav 🔱</p>
  </div>

  <!-- MOOL MANTRA -->
  <div class="mantra-card">
    <h2>1. Mool Mantra (Root Mantra) — मूल मंत्र</h2>
    <div class="mantra-text">ॐ कालभैरवाय नमः</div>
    <div class="mantra-roman">Om Kalabhairavaya Namah</div>
    <div class="mantra-meaning">"I bow to Kaal Bhairav — Lord of Time, Destroyer of Ego"</div>
    <div class="guidance-mini">
      <span><strong>Japa:</strong> 108 times daily</span>
      <span><strong>Best day:</strong> Sunday, Tuesday</span>
      <span><strong>Direction:</strong> Face South</span>
      <span><strong>Mala:</strong> Rudraksha 108 beads</span>
      <span><strong>Benefits:</strong> Protection, fearlessness, karma dissolution</span>
    </div>
  </div>

  <div class="divider">✦ ✦ ✦</div>

  <!-- BATUK MANTRA -->
  <div class="mantra-card">
    <h2>2. Batuk Bhairav Mantra — बटुक भैरव मंत्र</h2>
    <div class="mantra-text">ॐ हृीं बटुकाय आपदुद्धारणाय<br>कुरु कुरु बटुकाय हृीं ॥</div>
    <div class="mantra-roman">Om Hreem Batukaya Apaduddharanaya Kuru Kuru Batukaya Hreem</div>
    <div class="mantra-meaning">"O Batuk Bhairav, remove all calamities, act swiftly"</div>
    <div class="guidance-mini">
      <span><strong>Japa:</strong> 108 times (crisis: 1008)</span>
      <span><strong>Best:</strong> Tuesday & Sunday dusk</span>
      <span><strong>Benefits:</strong> Removes sudden danger, travel protection, crisis relief</span>
    </div>
  </div>

  <div class="divider">✦ ✦ ✦</div>

  <!-- GAYATRI -->
  <div class="mantra-card">
    <h2>3. Kaal Bhairav Gayatri — गायत्री मंत्र</h2>
    <div class="mantra-text">ॐ कालदण्डाय विद्महे<br>कालभैरवाय धीमहि<br>तन्नो भैरवः प्रचोदयात् ॥</div>
    <div class="mantra-roman">Om Kaladandaya Vidmahe Kalabhairavaya Dhimahi Tanno Bhairavah Prachodayat</div>
    <div class="mantra-meaning">"We meditate on Kaal Bhairav, holder of the staff of time. May Bhairav illuminate our intellect."</div>
    <div class="guidance-mini">
      <span><strong>Japa:</strong> 108 times</span>
      <span><strong>Best:</strong> Sunrise on Ashtami</span>
      <span><strong>Benefits:</strong> Wisdom, clarity, spiritual advancement</span>
    </div>
  </div>

  <div class="divider">✦ ✦ ✦</div>

  <!-- BEEJ MANTRA -->
  <div class="mantra-card">
    <h2>4. Bhairav Beej Mantra — बीज मंत्र</h2>
    <div class="mantra-text">ॐ भ्रं भैरवाय नमः</div>
    <div class="mantra-roman">Om Bhram Bhairavaya Namah</div>
    <div class="mantra-meaning">"Salutations to Bhairav with the seed syllable Bhram"</div>
    <div class="guidance-mini">
      <span><strong>Japa:</strong> 108 times</span>
      <span><strong>Best:</strong> Midnight on Ashtami or Amavasya</span>
      <span><strong>Benefits:</strong> Destroys enemies, removes evil eye, strongest protection</span>
      <span><strong>Note:</strong> For experienced practitioners</span>
    </div>
  </div>

  <div class="divider">✦ ✦ ✦</div>

  <!-- DOG SEVA NOTE -->
  <div class="mantra-card" style="background:#fff8f0; border-color:#8b0000;">
    <h2>🐕 Dog Seva — The Most Important Practice</h2>
    <div class="mantra-text" style="font-size:1.1rem; color:#8b0000;">कुत्ते को खाना खिलाएं = काल भैरव की सेवा करें</div>
    <div class="mantra-meaning" style="font-size:0.95rem;">Feed a dog before every mantra session. The dog is Bhairav's vahana. One act of dog seva dissolves more karma than 100 mantra repetitions without it. A black dog is most auspicious — any dog is Bhairav.</div>
  </div>

  <div class="footer-box">
    ॐ कालभैरवाय नमः · जय काल भैरव · KaalBhairav.org
    <br>
    <span style="font-size:0.72rem; opacity:0.7;">Complete mantras, pooja vidhi, stories & more at KaalBhairav.org</span>
  </div>

  <button class="print-btn no-print" onclick="window.print()" style="margin-top:1rem;">Print / Save as PDF</button>

</div>
</body>
</html>
