<?php
$page_title    = "Kaal Bhairav Virtual Mandir — Daily Aarti Live | KaalBhairav.org";
$meta_desc     = "Attend the daily Kaal Bhairav aarti online — morning 6:00 AM and evening 7:00 PM IST. Virtual mandir with live kapat opening, aarti darshan, and mantra chanting.";
$meta_keywords = "Kaal Bhairav virtual mandir, online aarti, काल भैरव आरती, live darshan, Bhairav aarti online, virtual temple";
$current_page  = "mandir";
include 'includes/header.php';
?>

<style>
/* ===== MANDIR PAGE STYLES ===== */
.mandir-wrapper {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 2rem 1rem 4rem;
  background: radial-gradient(ellipse at center, #1a0800 0%, #0a0300 60%, #000 100%);
}

.mandir-title {
  font-family: 'Cinzel Decorative', serif;
  font-size: clamp(1.2rem, 3vw, 2rem);
  color: #c9a84c;
  text-align: center;
  margin-bottom: 0.3rem;
  text-shadow: 0 0 30px rgba(201,168,76,0.5);
}
.mandir-subtitle {
  font-family: 'Cinzel', serif;
  font-size: 0.8rem;
  color: rgba(201,168,76,0.6);
  letter-spacing: 0.15em;
  text-align: center;
  margin-bottom: 2rem;
}

/* ===== TEMPLE SCENE ===== */
.temple-scene {
  position: relative;
  width: 100%;
  max-width: 680px;
  margin: 0 auto;
}

/* Arch frame */
.temple-arch {
  position: relative;
  border: 3px solid rgba(201,168,76,0.6);
  border-radius: 50% 50% 0 0 / 30% 30% 0 0;
  overflow: hidden;
  background: #000;
  box-shadow:
    0 0 60px rgba(201,168,76,0.2),
    0 0 120px rgba(139,0,0,0.3),
    inset 0 0 40px rgba(0,0,0,0.8);
  aspect-ratio: 4/3;
}

/* Mandir background image */
.mandir-bg {
  position: absolute;
  inset: 0;
  background: url('assets/img/mandir.png') center center / cover no-repeat;
  opacity: 0;
  transition: opacity 2s ease;
}
.mandir-bg.visible { opacity: 1; }

/* Kapat (doors) */
.kapat-left, .kapat-right {
  position: absolute;
  top: 0;
  width: 50%;
  height: 100%;
  background: linear-gradient(135deg, #1a0800 0%, #2d1200 40%, #1a0800 100%);
  transition: transform 3s cubic-bezier(0.4, 0, 0.2, 1);
  z-index: 10;
  display: flex;
  align-items: center;
  justify-content: center;
}
.kapat-left {
  left: 0;
  transform-origin: left center;
  border-right: 2px solid rgba(201,168,76,0.4);
}
.kapat-right {
  right: 0;
  transform-origin: right center;
  border-left: 2px solid rgba(201,168,76,0.4);
}
.kapat-left.open { transform: perspective(800px) rotateY(-75deg); }
.kapat-right.open { transform: perspective(800px) rotateY(75deg); }

/* Door decorations */
.kapat-left::before, .kapat-right::before {
  content: 'ॐ';
  font-size: 3rem;
  color: rgba(201,168,76,0.3);
  font-family: 'EB Garamond', serif;
}
.kapat-left::after {
  content: '';
  position: absolute;
  right: 10px; top: 50%;
  transform: translateY(-50%);
  width: 12px; height: 12px;
  border-radius: 50%;
  background: #c9a84c;
  box-shadow: 0 0 8px rgba(201,168,76,0.8);
}
.kapat-right::after {
  content: '';
  position: absolute;
  left: 10px; top: 50%;
  transform: translateY(-50%);
  width: 12px; height: 12px;
  border-radius: 50%;
  background: #c9a84c;
  box-shadow: 0 0 8px rgba(201,168,76,0.8);
}

/* Closed state overlay */
.kapat-closed-msg {
  position: absolute;
  inset: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  z-index: 20;
  pointer-events: none;
}
.kapat-closed-msg.hidden { display: none; }

/* Flames */
.flames-container {
  position: absolute;
  bottom: 2%;
  left: 0; right: 0;
  display: flex;
  justify-content: space-around;
  padding: 0 18%;
  z-index: 5;
  opacity: 0;
  transition: opacity 2s ease 2s;
}
.flames-container.visible { opacity: 1; }

.flame {
  position: relative;
  width: 18px;
  height: 32px;
}
/* Outer flame */
.flame::before {
  content: '';
  position: absolute;
  bottom: 0; left: 50%;
  transform: translateX(-50%);
  width: 13px; height: 28px;
  background: radial-gradient(ellipse at bottom,
    #fff    0%,
    #ffee00 15%,
    #ff8800 40%,
    #ff3300 65%,
    #cc0000 85%,
    transparent 100%);
  border-radius: 50% 50% 15% 15%;
  animation: flicker 0.4s ease-in-out infinite alternate;
  filter: blur(1px);
  box-shadow: 0 0 10px 4px rgba(255,100,0,0.5), 0 0 20px 6px rgba(255,50,0,0.25);
}
/* Inner core */
.flame::after {
  content: '';
  position: absolute;
  bottom: 0; left: 50%;
  transform: translateX(-50%);
  width: 6px; height: 15px;
  background: radial-gradient(ellipse at bottom,
    #fff    0%,
    #ffffaa 35%,
    #ffcc00 65%,
    transparent 100%);
  border-radius: 50% 50% 20% 20%;
  animation: flickerInner 0.3s ease-in-out infinite alternate-reverse;
  filter: blur(0.5px);
}

@keyframes flicker {
  0%   { transform: translateX(-50%) scaleX(1)    scaleY(1)    rotate(-3deg); height: 28px; }
  20%  { transform: translateX(-50%) scaleX(0.8)  scaleY(1.1)  rotate(4deg);  height: 32px; }
  40%  { transform: translateX(-50%) scaleX(1.15) scaleY(0.9)  rotate(-5deg); height: 25px; }
  60%  { transform: translateX(-50%) scaleX(0.85) scaleY(1.15) rotate(3deg);  height: 34px; }
  80%  { transform: translateX(-50%) scaleX(1.1)  scaleY(0.95) rotate(-2deg); height: 26px; }
  100% { transform: translateX(-50%) scaleX(0.9)  scaleY(1.05) rotate(2deg);  height: 30px; }
}
@keyframes flickerInner {
  0%   { transform: translateX(-50%) scaleX(1)   scaleY(1)   rotate(-2deg); }
  33%  { transform: translateX(-50%) scaleX(0.7) scaleY(1.2) rotate(3deg); }
  66%  { transform: translateX(-50%) scaleX(1.2) scaleY(0.8) rotate(-4deg); }
  100% { transform: translateX(-50%) scaleX(0.9) scaleY(1.1) rotate(2deg); }
}

/* Smoke */
.smoke-container {
  position: absolute;
  bottom: 8%;
  left: 0; right: 0;
  height: 85%;
  z-index: 4;
  opacity: 0;
  transition: opacity 4s ease 4s;
  pointer-events: none;
}
.smoke-container.visible { opacity: 1; }

.smoke-puff {
  position: absolute;
  border-radius: 50%;
  bottom: 10px;
  background: radial-gradient(circle at 40% 40%,
    rgba(230,220,210,0.5) 0%,
    rgba(200,190,180,0.3) 30%,
    rgba(160,150,140,0.1) 65%,
    transparent 100%);
  filter: blur(8px);
  animation: smokeRise linear infinite;
  transform-origin: center bottom;
}
.smoke-puff:nth-child(1){
  left:30%; width:40px; height:40px;
  animation-duration:6s; animation-delay:0s;
}
.smoke-puff:nth-child(2){
  left:42%; width:30px; height:30px;
  animation-duration:5s; animation-delay:2s;
}
.smoke-puff:nth-child(3){
  left:55%; width:50px; height:50px;
  animation-duration:7s; animation-delay:1s;
}
.smoke-puff:nth-child(4){
  left:36%; width:25px; height:25px;
  animation-duration:4.5s; animation-delay:3.5s;
}
.smoke-puff:nth-child(5){
  left:50%; width:45px; height:45px;
  animation-duration:8s; animation-delay:0.5s;
}

@keyframes smokeRise {
  0%   { transform: translateY(0px)    translateX(0px)   scale(0.4) rotate(0deg);   opacity:0;    }
  8%   { opacity: 0.6; }
  30%  { transform: translateY(-60px)  translateX(10px)  scale(1.2) rotate(15deg);  opacity:0.45; }
  55%  { transform: translateY(-120px) translateX(-8px)  scale(2.0) rotate(-10deg); opacity:0.25; }
  80%  { transform: translateY(-190px) translateX(6px)   scale(2.8) rotate(8deg);   opacity:0.1;  }
  100% { transform: translateY(-260px) translateX(-4px)  scale(3.5) rotate(-5deg);  opacity:0;    }
}

/* Glow overlay during aarti */
.temple-glow {
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at center 70%, rgba(255,150,0,0.15) 0%, transparent 70%);
  z-index: 3;
  opacity: 0;
  transition: opacity 3s ease;
  pointer-events: none;
}
.temple-glow.visible { opacity: 1; animation: glowPulse 3s ease-in-out infinite; }

@keyframes glowPulse {
  0%, 100% { opacity: 0.6; }
  50%       { opacity: 1; }
}

/* Bell ring animation */
.bell-icon {
  font-size: 1.8rem;
  cursor: pointer;
  display: inline-block;
  transition: transform 0.1s;
  user-select: none;
}
.bell-icon.ringing { animation: bellRing 0.5s ease-in-out; }
@keyframes bellRing {
  0%,100% { transform: rotate(0deg); }
  20%      { transform: rotate(-20deg); }
  40%      { transform: rotate(20deg); }
  60%      { transform: rotate(-15deg); }
  80%      { transform: rotate(10deg); }
}

/* ===== STATUS PANEL ===== */
.status-panel {
  width: 100%;
  max-width: 680px;
  margin: 1.5rem auto 0;
  background: linear-gradient(135deg, rgba(20,8,0,0.95), rgba(10,3,0,0.95));
  border: 1px solid rgba(201,168,76,0.3);
  border-radius: 6px;
  padding: 1.2rem 1.5rem;
  text-align: center;
}

.status-label {
  font-family: 'Cinzel', serif;
  font-size: 0.72rem;
  letter-spacing: 0.15em;
  color: rgba(201,168,76,0.6);
  text-transform: uppercase;
  margin-bottom: 0.4rem;
}
.status-main {
  font-family: 'Cinzel Decorative', serif;
  font-size: clamp(0.9rem, 2.5vw, 1.3rem);
  color: #c9a84c;
  margin-bottom: 0.5rem;
}
.countdown {
  font-family: 'Cinzel', serif;
  font-size: clamp(1.5rem, 5vw, 2.5rem);
  color: #e8c96e;
  letter-spacing: 0.1em;
  text-shadow: 0 0 20px rgba(201,168,76,0.5);
}
.aarti-times {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin-top: 1rem;
  flex-wrap: wrap;
}
.aarti-time-item {
  text-align: center;
}
.aarti-time-item .time {
  font-family: 'Cinzel', serif;
  font-size: 1.1rem;
  color: #c9a84c;
  display: block;
}
.aarti-time-item .label {
  font-size: 0.75rem;
  color: rgba(201,168,76,0.6);
  font-family: 'EB Garamond', serif;
}
.aarti-time-item.active .time {
  color: #ff6600;
  text-shadow: 0 0 15px rgba(255,100,0,0.6);
}

/* ===== YOUTUBE PLAYER ===== */
.aarti-player {
  width: 100%;
  max-width: 680px;
  margin: 1.5rem auto 0;
  display: none;
}
.aarti-player.visible { display: block; }
.aarti-player iframe {
  width: 100%;
  height: 0;
  border: none;
  /* hidden player — audio only experience */
}

/* Unmute button */
#unmute-btn {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 99999;
  background: linear-gradient(135deg, #8b0000, #6b0000);
  color: #e8c96e;
  font-family: 'Cinzel', serif;
  font-size: 1rem;
  letter-spacing: 0.1em;
  border: 2px solid rgba(201,168,76,0.6);
  border-radius: 6px;
  padding: 1rem 2rem;
  cursor: pointer;
  box-shadow: 0 0 40px rgba(139,0,0,0.8), 0 0 80px rgba(201,168,76,0.2);
  animation: unmutePulse 1.5s ease-in-out infinite;
  text-align: center;
}
#unmute-btn span {
  display: block;
  font-size: 0.72rem;
  color: rgba(201,168,76,0.6);
  margin-top: 0.3rem;
  letter-spacing: 0.05em;
}
#unmute-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  z-index: 99998;
}
#unmute-btn.visible, #unmute-overlay.visible { display: block; }
@keyframes unmutePulse {
  0%,100% { box-shadow: 0 0 40px rgba(139,0,0,0.8), 0 0 80px rgba(201,168,76,0.2); }
  50%      { box-shadow: 0 0 60px rgba(200,0,0,1),   0 0 120px rgba(201,168,76,0.4); }
}

/* Bell interaction */
.bell-panel {
  width: 100%;
  max-width: 680px;
  margin: 1rem auto 0;
  text-align: center;
  padding: 1rem;
}
.bell-text {
  font-family: 'Cinzel', serif;
  font-size: 0.75rem;
  color: rgba(201,168,76,0.5);
  letter-spacing: 0.1em;
  margin-top: 0.5rem;
}

/* Aarti live badge */
.live-badge {
  display: inline-flex;
  align-items: center;
  gap: 0.4rem;
  background: rgba(139,0,0,0.8);
  border: 1px solid rgba(201,168,76,0.4);
  border-radius: 20px;
  padding: 0.25rem 0.8rem;
  font-family: 'Cinzel', serif;
  font-size: 0.7rem;
  color: #e8c96e;
  letter-spacing: 0.08em;
  margin-bottom: 0.8rem;
  display: none;
}
.live-badge.visible { display: inline-flex; }
.live-dot {
  width: 8px; height: 8px;
  border-radius: 50%;
  background: #ff3333;
  animation: livePulse 1s ease-in-out infinite;
}
@keyframes livePulse {
  0%,100% { opacity: 1; transform: scale(1); }
  50%      { opacity: 0.4; transform: scale(0.8); }
}

/* Prayer text */
.prayer-scroll {
  width: 100%;
  max-width: 680px;
  margin: 1.5rem auto 0;
  background: rgba(10,5,0,0.8);
  border: 1px solid rgba(201,168,76,0.2);
  border-radius: 6px;
  padding: 1.2rem 1.5rem;
  text-align: center;
}
.prayer-scroll p {
  font-family: 'EB Garamond', serif;
  font-size: 1.1rem;
  color: rgba(201,168,76,0.8);
  line-height: 1.8;
  margin: 0;
}
</style>

<div class="mandir-wrapper">

  <h1 class="mandir-title">Kaal Bhairav Virtual Mandir</h1>
  <p class="mandir-subtitle">काल भैरव वर्चुअल मंदिर · Daily Aarti Darshan</p>

  <!-- LIVE BADGE -->
  <div class="live-badge" id="liveBadge">
    <span class="live-dot"></span>
    AARTI LIVE NOW
  </div>

  <!-- TEMPLE SCENE -->
  <div class="temple-scene">
    <div class="temple-arch">

      <!-- Mandir background -->
      <div class="mandir-bg" id="mandirBg"></div>

      <!-- Glow -->
      <div class="temple-glow" id="templeGlow"></div>

      <!-- Smoke -->
      <div class="smoke-container" id="smokeContainer">
        <div class="smoke-puff"></div>
        <div class="smoke-puff"></div>
        <div class="smoke-puff"></div>
        <div class="smoke-puff"></div>
        <div class="smoke-puff"></div>
      </div>

      <!-- Flames -->
      <div class="flames-container" id="flamesContainer">
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
        <div class="flame"></div>
      </div>

      <!-- Closed message inside doors -->
      <div class="kapat-closed-msg" id="kapatMsg">
        <!-- empty — doors themselves show OM -->
      </div>

      <!-- Kapat (doors) -->
      <div class="kapat-left" id="kapatLeft"></div>
      <div class="kapat-right" id="kapatRight"></div>

    </div>
  </div>

  <!-- STATUS PANEL -->
  <div class="status-panel">
    <div class="status-label" id="statusLabel">Next Aarti</div>
    <div class="status-main" id="statusMain">कपाट बंद हैं — आरती की प्रतीक्षा करें</div>
    <div class="countdown" id="countdown">--:--:--</div>
    <div class="aarti-times">
      <div class="aarti-time-item" id="morningItem">
        <span class="time">6:00 AM</span>
        <span class="label">प्रातः आरती</span>
      </div>
      <div class="aarti-time-item" id="eveningItem">
        <span class="time">7:00 PM</span>
        <span class="label">संध्या आरती</span>
      </div>
    </div>
  </div>

  <!-- BELL -->
  <div class="bell-panel">
    <span class="bell-icon" id="bellIcon" onclick="ringBell()" title="घंटी बजाएं">🔔</span>
    <p class="bell-text">घंटी बजाएं — Ring the Bell</p>
  </div>

  <!-- YOUTUBE PLAYER (hidden — audio only) -->
  <div class="aarti-player" id="aartiPlayer">
    <iframe id="aartiFrame"
      src=""
      allow="autoplay; encrypted-media"
      allowfullscreen>
    </iframe>
  </div>

  <!-- UNMUTE OVERLAY -->
  <div id="unmute-overlay"></div>
  <button id="unmute-btn" onclick="unmuteAarti()">
    🔔 आरती शुरू हो गई — सुनें
    <span>Tap to start Aarti audio</span>
  </button>

  <!-- PRAYER -->
  <div class="prayer-scroll">
    <p>
      ॐ कालभैरवाय नमः<br>
      <span style="font-size:0.85rem; color:rgba(201,168,76,0.5);">जय काल भैरव · काशी के कोतवाल · भय के नाशक</span>
    </p>
  </div>

</div>

<script>
// ===== CONFIGURATION =====
var AARTI_YOUTUBE_ID = 'v70gYG7XJmc';
var AARTI_DURATION_MIN = 12; // minutes

// IST aarti times
var MORNING_HOUR = 6,  MORNING_MIN = 0;
var EVENING_HOUR = 19, EVENING_MIN = 0;

// ===== STATE =====
var aartiActive = false;
var bellAudio = null;
var testMode = false;

// ===== TEST BUTTON — added after DOM ready =====
<?php $h = $_SERVER['HTTP_HOST']; if ($h==='localhost'||$h==='localhost:8080'||$h==='127.0.0.1'||$h==='127.0.0.1:8080'): ?>
window.addEventListener('load', function() {
  var btn = document.createElement('button');
  btn.textContent = '▶ Test Aarti';
  btn.style.cssText = 'position:fixed;bottom:90px;right:12px;z-index:99999;background:#1a0800;color:#c9a84c;border:1px solid rgba(201,168,76,0.6);font-size:0.72rem;padding:0.45rem 0.9rem;border-radius:4px;cursor:pointer;letter-spacing:0.05em;';
  btn.addEventListener('click', function() {
    if (!testMode) {
      testMode = true;
      aartiActive = true;
      _openKapat();
      document.getElementById('statusLabel').textContent = 'आरती चल रही है [TEST]';
      document.getElementById('statusMain').textContent = 'कपाट खुले हैं — दर्शन करें · Aarti in Progress';
      btn.textContent = '■ Close Kapat';
    } else {
      testMode = false;
      aartiActive = false;
      _closeKapat();
      document.getElementById('statusLabel').textContent = 'अगली आरती';
      document.getElementById('statusMain').textContent = 'कपाट बंद हैं — आरती की प्रतीक्षा करें';
      btn.textContent = '▶ Test Aarti';
    }
  });
  document.body.appendChild(btn);
});
<?php endif; ?>

// Bell sound using Web Audio API
function ringBell() {
  var bell = document.getElementById('bellIcon');
  bell.classList.add('ringing');
  setTimeout(function() { bell.classList.remove('ringing'); }, 500);

  // Generate bell tone
  try {
    var ctx = new (window.AudioContext || window.webkitAudioContext)();
    var osc = ctx.createOscillator();
    var gain = ctx.createGain();
    osc.connect(gain);
    gain.connect(ctx.destination);
    osc.type = 'sine';
    osc.frequency.setValueAtTime(800, ctx.currentTime);
    osc.frequency.exponentialRampToValueAtTime(400, ctx.currentTime + 1.5);
    gain.gain.setValueAtTime(0.4, ctx.currentTime);
    gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 1.5);
    osc.start(ctx.currentTime);
    osc.stop(ctx.currentTime + 1.5);
  } catch(e) {}
}

// ===== TIME LOGIC =====
function getISTTime() {
  var now = new Date();
  // IST = UTC + 5:30
  var utc = now.getTime() + (now.getTimezoneOffset() * 60000);
  var ist = new Date(utc + (5.5 * 3600000));
  return ist;
}

function isAartiTime(ist) {
  var h = ist.getHours(), m = ist.getMinutes();
  var totalMin = h * 60 + m;
  var morningStart = MORNING_HOUR * 60 + MORNING_MIN;
  var eveningStart = EVENING_HOUR * 60 + EVENING_MIN;
  return (totalMin >= morningStart && totalMin < morningStart + AARTI_DURATION_MIN) ||
         (totalMin >= eveningStart && totalMin < eveningStart + AARTI_DURATION_MIN);
}

function getNextAarti(ist) {
  var h = ist.getHours(), m = ist.getMinutes(), s = ist.getSeconds();
  var totalSec = h * 3600 + m * 60 + s;
  var morningSec = (MORNING_HOUR * 60 + MORNING_MIN) * 60;
  var eveningSec = (EVENING_HOUR * 60 + EVENING_MIN) * 60;

  var diff;
  if (totalSec < morningSec) {
    diff = morningSec - totalSec;
    return { diff: diff, which: 'morning' };
  } else if (totalSec < eveningSec) {
    diff = eveningSec - totalSec;
    return { diff: diff, which: 'evening' };
  } else {
    // next morning
    diff = (86400 - totalSec) + morningSec;
    return { diff: diff, which: 'morning' };
  }
}

function formatCountdown(secs) {
  var h = Math.floor(secs / 3600);
  var m = Math.floor((secs % 3600) / 60);
  var s = secs % 60;
  return (h > 0 ? pad(h) + ':' : '') + pad(m) + ':' + pad(s);
}
function pad(n) { return n < 10 ? '0' + n : '' + n; }

// ===== OPEN / CLOSE KAPAT =====
function _openKapat() {
  document.getElementById('kapatLeft').classList.add('open');
  document.getElementById('kapatRight').classList.add('open');
  document.getElementById('kapatMsg').classList.add('hidden');
  setTimeout(function() {
    document.getElementById('mandirBg').classList.add('visible');
    document.getElementById('templeGlow').classList.add('visible');
    document.getElementById('smokeContainer').classList.add('visible');
    document.getElementById('flamesContainer').classList.add('visible');
  }, 1500);
  document.getElementById('liveBadge').classList.add('visible');
  // Show unmute prompt — browser blocks autoplay audio
  document.getElementById('unmute-btn').classList.add('visible');
  document.getElementById('unmute-overlay').classList.add('visible');
}

function _closeKapat() {
  document.getElementById('kapatLeft').classList.remove('open');
  document.getElementById('kapatRight').classList.remove('open');
  document.getElementById('kapatMsg').classList.remove('hidden');
  document.getElementById('mandirBg').classList.remove('visible');
  document.getElementById('templeGlow').classList.remove('visible');
  document.getElementById('smokeContainer').classList.remove('visible');
  document.getElementById('flamesContainer').classList.remove('visible');
  document.getElementById('liveBadge').classList.remove('visible');
  document.getElementById('aartiPlayer').classList.remove('visible');
  document.getElementById('aartiFrame').src = '';
  document.getElementById('unmute-btn').classList.remove('visible');
  document.getElementById('unmute-overlay').classList.remove('visible');
}

// ===== MAIN TICK =====
function tick() {
  if (testMode) return;
  var ist = getISTTime();
  var active = isAartiTime(ist);
  var ist_h = ist.getHours();

  // Highlight active aarti time
  document.getElementById('morningItem').classList.remove('active');
  document.getElementById('eveningItem').classList.remove('active');
  if (active) {
    if (ist_h < 12) document.getElementById('morningItem').classList.add('active');
    else            document.getElementById('eveningItem').classList.add('active');
  }

  if (active && !aartiActive) {
    aartiActive = true;
    _openKapat();
    document.getElementById('statusLabel').textContent = 'आरती चल रही है';
    document.getElementById('statusMain').textContent = 'कपाट खुले हैं — दर्शन करें · Aarti in Progress';
    var endMin = (ist_h < 12)
      ? (MORNING_HOUR * 60 + MORNING_MIN + AARTI_DURATION_MIN)
      : (EVENING_HOUR * 60 + EVENING_MIN + AARTI_DURATION_MIN);
    var nowMin = ist_h * 60 + ist.getMinutes();
    var remainSec = (endMin - nowMin) * 60 - ist.getSeconds();
    document.getElementById('countdown').textContent = formatCountdown(Math.max(0, remainSec));
  } else if (!active && aartiActive) {
    aartiActive = false;
    _closeKapat();
    document.getElementById('statusLabel').textContent = 'अगली आरती';
    document.getElementById('statusMain').textContent = 'कपाट बंद हैं — आरती की प्रतीक्षा करें';
  }

  if (!active) {
    var next = getNextAarti(ist);
    document.getElementById('countdown').textContent = formatCountdown(next.diff);
  }
}

function unmuteAarti() {
  document.getElementById('unmute-btn').classList.remove('visible');
  document.getElementById('unmute-overlay').classList.remove('visible');
  document.getElementById('aartiPlayer').classList.add('visible');
  document.getElementById('aartiFrame').src =
    'https://www.youtube.com/embed/' + AARTI_YOUTUBE_ID +
    '?autoplay=1&loop=1&playlist=' + AARTI_YOUTUBE_ID;
}

// Run immediately + every second
tick();
setInterval(tick, 1000);
</script>

<?php include 'includes/footer.php'; ?>
