<?php
$page_title    = "Kaal Bhairav Virtual Mandir — Daily Aarti Live | KaalBhairav.org";
$meta_desc     = "Attend the daily Kaal Bhairav aarti online — morning 6:00 AM and evening 7:00 PM IST. Virtual mandir with live kapat opening, aarti darshan, and mantra chanting.";
$meta_keywords = "Kaal Bhairav virtual mandir, online aarti, काल भैरव आरती, live darshan, Bhairav aarti online, virtual temple";
$current_page  = "mandir";
$page_schema = json_encode([
  "@context" => "https://schema.org",
  "@type" => "WebPage",
  "name" => "Kaal Bhairav Virtual Mandir — Live Aarti Daily",
  "description" => "Attend the daily Kaal Bhairav aarti online — morning and evening darshan in the virtual mandir.",
  "url" => "https://kaalbhairav.org/mandir.php",
  "inLanguage" => ["en", "hi"],
  "isPartOf" => ["@type"=>"WebSite","name"=>"KaalBhairav.org","url"=>"https://kaalbhairav.org"],
  "about" => ["@type"=>"HinduTemple","name"=>"Kaal Bhairav Virtual Mandir","description"=>"Online virtual temple for daily Kaal Bhairav aarti darshan"]
]);
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
  padding: 20px;
  box-sizing: border-box;
}

/* Arch frame */
.temple-arch {
  position: relative;
  border-radius: 50% 50% 0 0 / 30% 30% 0 0;
  overflow: hidden;
  background: #000;
  box-shadow:
    0 0 60px rgba(201,168,76,0.2),
    0 0 120px rgba(139,0,0,0.3),
    inset 0 0 40px rgba(0,0,0,0.8);
  aspect-ratio: 4/3;
}

/* Handcrafted torana border overlay */
.torana-border {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 20;
  overflow: visible;
}
.torana-border svg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  overflow: visible;
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

/* Door knob */
.kapat-left::after {
  content: '';
  position: absolute;
  right: 8px; top: 50%;
  transform: translateY(-50%);
  width: 16px; height: 16px;
  border-radius: 50%;
  background: radial-gradient(circle at 35% 35%, #f0d97a, #a8761e);
  box-shadow: 0 0 10px rgba(201,168,76,0.9), 2px 2px 4px rgba(0,0,0,0.6);
  z-index: 15;
}
.kapat-right::after {
  content: '';
  position: absolute;
  left: 8px; top: 50%;
  transform: translateY(-50%);
  width: 16px; height: 16px;
  border-radius: 50%;
  background: radial-gradient(circle at 35% 35%, #f0d97a, #a8761e);
  box-shadow: 0 0 10px rgba(201,168,76,0.9), 2px 2px 4px rgba(0,0,0,0.6);
  z-index: 15;
}

/* Nakashi SVG overlay */
.nk-wrap {
  position: absolute;
  inset: 0;
  pointer-events: none;
  z-index: 2;
}
.nk-wrap svg {
  width: 100%;
  height: 100%;
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
  width: 1px;
  height: 1px;
  border: none;
  opacity: 0;
  pointer-events: none;
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

  <!-- <h1 class="mandir-title" data-key="mandir_title">Kaal Bhairav Virtual Mandir</h1> -->
  <p class="mandir-subtitle" data-key="mandir_sub">Kaal Bhairav Virtual Temple · Daily Aarti Darshan</p>

  <!-- LIVE BADGE -->
  <div class="live-badge" id="liveBadge">
    <span class="live-dot"></span>
    <span data-key="mandir_live">AARTI LIVE NOW</span>
  </div>

  <!-- TEMPLE SCENE -->
  <div class="temple-scene" style="position:relative;">

    <!-- HANDCRAFTED TORANA BORDER — arch-shaped carved surround -->
    <div class="torana-border" aria-hidden="true">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 720 556" preserveAspectRatio="none">
        <!--
          ViewBox: 720×556
          Arch shape: border-radius 50% 50% 0 0 / 30% 30% 0 0
          On 680×510 content area (20px padding each side):
            cx=360, cy=173, rx=340, ry=153
          Arch path: M left,bottom L left,cy A rx,ry 0 0 1 right,cy L right,bottom
          = M 20,536 L 20,173 A 340,153 0 0 1 700,173 L 700,536
          Bead positions computed along ellipse (cx=360, cy=173, rx=348, ry=161):
          θ: 180°(12,173) 168°(19,140) 156°(41,109) 144°(77,81) 132°(126,57)
             120°(186,39) 108°(252,26) 96°(322,20) 90°(360,12) 84°(398,20)
             72°(468,26) 60°(534,39) 48°(594,57) 36°(643,81) 24°(679,109)
             12°(701,140) 0°(708,173)
        -->

        <!-- ===== 3-STEP ARCH FRAME ===== -->
        <!-- Outermost arch -->
        <path d="M 4,548 L 4,172 A 356,162 0 0 1 716,172 L 716,548"
          fill="none" stroke="#3a2005" stroke-width="5" stroke-opacity="0.75" stroke-linecap="square"/>
        <!-- Middle arch -->
        <path d="M 10,544 L 10,173 A 350,157 0 0 1 710,173 L 710,544"
          fill="none" stroke="#7a5212" stroke-width="3.5" stroke-opacity="0.85" stroke-linecap="square"/>
        <!-- Inner accent arch -->
        <path d="M 16,540 L 16,174 A 344,152 0 0 1 704,174 L 704,540"
          fill="none" stroke="#b08828" stroke-width="1.2" stroke-opacity="0.72" stroke-linecap="square"/>
        <!-- Innermost thin line -->
        <path d="M 20,536 L 20,176 A 340,149 0 0 1 700,176 L 700,536"
          fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.55" stroke-linecap="square"/>

        <!-- ===== BEAD NECKLACE along arch curve (pre-computed ellipse points) ===== -->
        <!-- Arch beads: cx=360,cy=173,rx=352,ry=163 spaced every ~12° -->
        <circle cx="8"   cy="173" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="8"   cy="173" r="2.5" fill="#b08828"/><circle cx="7.2"   cy="172.2" r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="15"  cy="140" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="15"  cy="140" r="2.5" fill="#b08828"/><circle cx="14.2"  cy="139.2" r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="36"  cy="110" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="36"  cy="110" r="2.5" fill="#b08828"/><circle cx="35.2"  cy="109.2" r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="71"  cy="82"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="71"  cy="82"  r="2.5" fill="#b08828"/><circle cx="70.2"  cy="81.2"  r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="119" cy="57"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="119" cy="57"  r="2.5" fill="#b08828"/><circle cx="118.2" cy="56.2"  r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="178" cy="38"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="178" cy="38"  r="2.5" fill="#b08828"/><circle cx="177.2" cy="37.2"  r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="244" cy="25"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="244" cy="25"  r="2.5" fill="#b08828"/><circle cx="243.2" cy="24.2"  r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="316" cy="18"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="316" cy="18"  r="2.5" fill="#b08828"/><circle cx="315.2" cy="17.2"  r="1"   fill="#f0d870" fill-opacity="0.8"/>
        <!-- Apex Kalash -->
        <rect x="347" y="6" width="26" height="3.5" rx="1.8" fill="#9a7020" fill-opacity="0.7" stroke="#d4aa48" stroke-width="0.8"/>
        <path d="M 351 9.5 Q 345 16 347 24 Q 349 31 355 33.5 L 360 33.5 L 365 33.5 Q 371 31 373 24 Q 375 16 369 9.5 Z" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="1" stroke-opacity="0.9"/>
        <path d="M 348 27 Q 360 25.5 372 27" fill="none" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.65"/>
        <rect x="354" y="7" width="12" height="3.5" rx="1" fill="#9a7020" fill-opacity="0.38" stroke="#b08828" stroke-width="0.75"/>
        <circle cx="360" cy="5.5" r="5" fill="#9a7020" fill-opacity="0.35" stroke="#b08828" stroke-width="0.85"/>
        <circle cx="360" cy="4.5" r="2.2" fill="#d4a840" fill-opacity="0.8"/>
        <path d="M 354 8.5 Q 346 5.5 347 1.5 Q 349 -1.5 352.5 4" fill="#5a3c08" fill-opacity="0.35" stroke="#9a7020" stroke-width="0.7"/>
        <path d="M 366 8.5 Q 374 5.5 373 1.5 Q 371 -1.5 367.5 4" fill="#5a3c08" fill-opacity="0.35" stroke="#9a7020" stroke-width="0.7"/>
        <!-- Apex bead -->
        <circle cx="360" cy="10" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8" opacity="0"/>
        <!-- Continue right side beads (mirror) -->
        <circle cx="404" cy="18"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="404" cy="18"  r="2.5" fill="#b08828"/><circle cx="403.2" cy="17.2"  r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="476" cy="25"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="476" cy="25"  r="2.5" fill="#b08828"/><circle cx="475.2" cy="24.2"  r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="542" cy="38"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="542" cy="38"  r="2.5" fill="#b08828"/><circle cx="541.2" cy="37.2"  r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="601" cy="57"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="601" cy="57"  r="2.5" fill="#b08828"/><circle cx="600.2" cy="56.2"  r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="649" cy="82"  r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="649" cy="82"  r="2.5" fill="#b08828"/><circle cx="648.2" cy="81.2"  r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="684" cy="110" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="684" cy="110" r="2.5" fill="#b08828"/><circle cx="683.2" cy="109.2" r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="705" cy="140" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="705" cy="140" r="2.5" fill="#b08828"/><circle cx="704.2" cy="139.2" r="1" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="712" cy="173" r="4.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.8"/><circle cx="712" cy="173" r="2.5" fill="#b08828"/><circle cx="711.2" cy="172.2" r="1" fill="#f0d870" fill-opacity="0.8"/>

        <!-- ===== STRAIGHT SIDE BEADS — left ===== -->
        <!-- Diamond chain left pillar -->
        <path d="M7,200  L3,212  L7,224  L11,212  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,232  L3,244  L7,256  L11,244  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,264  L3,276  L7,288  L11,276  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,296  L3,308  L7,320  L11,308  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,328  L3,340  L7,352  L11,340  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,360  L3,372  L7,384  L11,372  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,392  L3,404  L7,416  L11,404  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,424  L3,436  L7,448  L11,436  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,456  L3,468  L7,480  L11,468  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M7,488  L3,500  L7,512  L11,500  Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <!-- Circle studs between diamonds left -->
        <circle cx="7" cy="195" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="195" r="2" fill="#b08828"/>
        <circle cx="7" cy="227" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="227" r="2" fill="#b08828"/>
        <circle cx="7" cy="259" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="259" r="2" fill="#b08828"/>
        <circle cx="7" cy="291" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="291" r="2" fill="#b08828"/>
        <circle cx="7" cy="323" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="323" r="2" fill="#b08828"/>
        <circle cx="7" cy="355" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="355" r="2" fill="#b08828"/>
        <circle cx="7" cy="387" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="387" r="2" fill="#b08828"/>
        <circle cx="7" cy="419" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="419" r="2" fill="#b08828"/>
        <circle cx="7" cy="451" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="451" r="2" fill="#b08828"/>
        <circle cx="7" cy="483" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="483" r="2" fill="#b08828"/>
        <circle cx="7" cy="515" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="7" cy="515" r="2" fill="#b08828"/>

        <!-- ===== STRAIGHT SIDE BEADS — right ===== -->
        <path d="M713,200 L709,212 L713,224 L717,212 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,232 L709,244 L713,256 L717,244 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,264 L709,276 L713,288 L717,276 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,296 L709,308 L713,320 L717,308 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,328 L709,340 L713,352 L717,340 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,360 L709,372 L713,384 L717,372 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,392 L709,404 L713,416 L717,404 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,424 L709,436 L713,448 L717,436 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,456 L709,468 L713,480 L717,468 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <path d="M713,488 L709,500 L713,512 L717,500 Z" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.7"/>
        <circle cx="713" cy="195" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="195" r="2" fill="#b08828"/>
        <circle cx="713" cy="227" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="227" r="2" fill="#b08828"/>
        <circle cx="713" cy="259" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="259" r="2" fill="#b08828"/>
        <circle cx="713" cy="291" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="291" r="2" fill="#b08828"/>
        <circle cx="713" cy="323" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="323" r="2" fill="#b08828"/>
        <circle cx="713" cy="355" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="355" r="2" fill="#b08828"/>
        <circle cx="713" cy="387" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="387" r="2" fill="#b08828"/>
        <circle cx="713" cy="419" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="419" r="2" fill="#b08828"/>
        <circle cx="713" cy="451" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="451" r="2" fill="#b08828"/>
        <circle cx="713" cy="483" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="483" r="2" fill="#b08828"/>
        <circle cx="713" cy="515" r="3.5" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="713" cy="515" r="2" fill="#b08828"/>

        <!-- ===== BOTTOM: lotus wave + studs ===== -->
        <path d="M30,544 Q46,536 62,544 Q78,552 94,544 Q110,536 126,544 Q142,552 158,544 Q174,536 190,544 Q206,552 222,544 Q238,536 254,544 Q270,552 286,544 Q302,536 318,544 Q334,552 350,544 Q366,536 382,544 Q398,552 414,544 Q430,536 446,544 Q462,552 478,544 Q494,536 510,544 Q526,552 542,544 Q558,536 574,544 Q590,552 606,544 Q622,536 638,544 Q654,552 670,544 Q686,536 702,544"
          fill="none" stroke="#9a7020" stroke-width="1.3" stroke-opacity="0.65"/>
        <!-- Bottom studs -->
        <circle cx="62"  cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="62"  cy="548" r="2.2" fill="#b08828"/><circle cx="61.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="158" cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="158" cy="548" r="2.2" fill="#b08828"/><circle cx="157.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="254" cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="254" cy="548" r="2.2" fill="#b08828"/><circle cx="253.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="360" cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="360" cy="548" r="2.2" fill="#b08828"/><circle cx="359.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="446" cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="446" cy="548" r="2.2" fill="#b08828"/><circle cx="445.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="542" cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="542" cy="548" r="2.2" fill="#b08828"/><circle cx="541.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>
        <circle cx="638" cy="548" r="4" fill="#4a3008" stroke="#9a7020" stroke-width="0.7"/><circle cx="638" cy="548" r="2.2" fill="#b08828"/><circle cx="637.3" cy="547.3" r="0.9" fill="#f0d870" fill-opacity="0.8"/>

        <!-- ===== BOTTOM CORNER MEDALLIONS (no top corners — arch has none) ===== -->
        <circle cx="10" cy="544" r="16" fill="#1e0a00" fill-opacity="0.88" stroke="#9a7020" stroke-width="1.5"/>
        <circle cx="10" cy="544" r="11" fill="none" stroke="#c9a84c" stroke-width="0.9" stroke-opacity="0.75"/>
        <circle cx="10" cy="544" r="6"  fill="#9a7020" fill-opacity="0.3" stroke="#d4aa48" stroke-width="0.8"/>
        <circle cx="10" cy="544" r="2.5" fill="#e0c060"/>
        <circle cx="710" cy="544" r="16" fill="#1e0a00" fill-opacity="0.88" stroke="#9a7020" stroke-width="1.5"/>
        <circle cx="710" cy="544" r="11" fill="none" stroke="#c9a84c" stroke-width="0.9" stroke-opacity="0.75"/>
        <circle cx="710" cy="544" r="6"  fill="#9a7020" fill-opacity="0.3" stroke="#d4aa48" stroke-width="0.8"/>
        <circle cx="710" cy="544" r="2.5" fill="#e0c060"/>
      </svg>
    </div>

    <div class="temple-arch">

      <!-- Mandir background -->
      <div class="mandir-bg" id="mandirBg"></div>

      <!-- Glow -->
      <div class="temple-glow" id="templeGlow"></div>

      <!-- Smoke -->

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
      <div class="kapat-left" id="kapatLeft"><div class="nk-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 150">
          <!-- AGED WOOD BASE -->
          <rect width="100" height="150" fill="#1e0b01" fill-opacity="0.65"/>
          <!-- Wood grain lines -->
          <path d="M0,10 Q18,9 38,10.5 Q58,12 78,10 Q90,9.2 100,10.3" stroke="#170800" stroke-width="0.55" fill="none" opacity="0.55"/>
          <path d="M0,22 Q25,23.5 48,21.5 Q72,19.8 100,22.2" stroke="#321200" stroke-width="0.4" fill="none" opacity="0.4"/>
          <path d="M0,48 Q20,49.5 45,47.5 Q68,46 100,48.8" stroke="#170800" stroke-width="0.45" fill="none" opacity="0.42"/>
          <path d="M0,65 Q30,66.5 55,64 Q80,62.5 100,65.5" stroke="#321200" stroke-width="0.38" fill="none" opacity="0.38"/>
          <path d="M0,92 Q22,93.5 48,91.5 Q72,90 100,92.5" stroke="#170800" stroke-width="0.42" fill="none" opacity="0.4"/>
          <path d="M0,110 Q35,111.5 60,109 Q82,107.5 100,110.5" stroke="#321200" stroke-width="0.38" fill="none" opacity="0.36"/>
          <path d="M0,138 Q28,139.5 52,137.5 Q75,136 100,138.8" stroke="#170800" stroke-width="0.4" fill="none" opacity="0.38"/>
          <!-- VERTICAL PLANK SEAMS (3 planks) -->
          <line x1="33" y1="0" x2="33" y2="150" stroke="#080300" stroke-width="2.2" opacity="0.82"/>
          <line x1="35" y1="0" x2="35" y2="150" stroke="#3a1200" stroke-width="0.5" opacity="0.28"/>
          <line x1="66" y1="0" x2="66" y2="150" stroke="#080300" stroke-width="2.2" opacity="0.82"/>
          <line x1="68" y1="0" x2="68" y2="150" stroke="#3a1200" stroke-width="0.5" opacity="0.28"/>
          <!-- OUTER BRASS FRAME -->
          <rect x="1.5" y="1.5" width="97" height="147" fill="none" stroke="#7a5212" stroke-width="2.4" stroke-opacity="0.9"/>
          <rect x="4.5" y="4.5" width="91" height="141" fill="none" stroke="#b08828" stroke-width="0.9" stroke-opacity="0.58"/>
          <!-- CORNER ROSETTES -->
          <circle cx="4.5" cy="4.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="4.5" cy="4.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="4.5" cy="4.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <circle cx="95.5" cy="4.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="95.5" cy="4.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="95.5" cy="4.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <circle cx="4.5" cy="145.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="4.5" cy="145.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="4.5" cy="145.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <circle cx="95.5" cy="145.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="95.5" cy="145.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="95.5" cy="145.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <!-- BEAD/ROPE BORDER — top row -->
          <circle cx="13" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="13" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="22" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="22" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="31" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="31" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="50" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="50" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="69" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="69" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="78" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="78" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="87" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="87" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <!-- left & right bead columns -->
          <circle cx="7" cy="16" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="16" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="25" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="25" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="52" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="52" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="61" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="61" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="70" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="70" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="97" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="97" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="106" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="106" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="115" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="115" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="136" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="136" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="16" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="16" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="25" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="25" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="52" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="52" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="61" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="61" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="70" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="70" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="97" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="97" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="106" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="106" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="115" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="115" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="136" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="136" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <!-- bottom row beads -->
          <circle cx="13" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="13" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="22" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="22" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="31" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="31" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="50" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="50" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="69" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="69" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="78" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="78" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="87" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="87" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <!-- ===== IRON BAND 1 (y=35–43) ===== -->
          <rect x="0" y="35" width="100" height="8" fill="#0c0400" fill-opacity="0.94" stroke="#6a4810" stroke-width="0.6"/>
          <line x1="0" y1="36.5" x2="100" y2="36.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <line x1="0" y1="41.5" x2="100" y2="41.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <circle cx="9"  cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="9"  cy="39" r="2"   fill="#b08828"/><circle cx="8.4"  cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="23" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="23" cy="39" r="2"   fill="#b08828"/><circle cx="22.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="37" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="37" cy="39" r="2"   fill="#b08828"/><circle cx="36.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="50" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="50" cy="39" r="2"   fill="#b08828"/><circle cx="49.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="63" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="63" cy="39" r="2"   fill="#b08828"/><circle cx="62.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="77" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="77" cy="39" r="2"   fill="#b08828"/><circle cx="76.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="91" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="91" cy="39" r="2"   fill="#b08828"/><circle cx="90.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <!-- ===== TOP PANEL (y=4 to y=35): KALASH ===== -->
          <rect x="10" y="10" width="80" height="24" fill="#c9a84c" fill-opacity="0.04" stroke="#7a5212" stroke-width="0.7" stroke-opacity="0.55" rx="1"/>
          <!-- Kalash pot -->
          <path d="M 44 34 Q 37 25.5 39 17 Q 41.5 10 50 10 Q 58.5 10 61 17 Q 63 25.5 56 34 Z" fill="#9a7020" fill-opacity="0.2" stroke="#b08828" stroke-width="1" stroke-opacity="0.88"/>
          <path d="M 40.5 28.5 Q 50 27 59.5 28.5" fill="none" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.65"/>
          <path d="M 40 21 Q 50 19.5 60 21" fill="none" stroke="#b08828" stroke-width="0.5" stroke-opacity="0.55"/>
          <!-- Neck -->
          <rect x="44.5" y="8.5" width="11" height="3.5" rx="1.2" fill="#9a7020" fill-opacity="0.28" stroke="#b08828" stroke-width="0.75" stroke-opacity="0.85"/>
          <!-- Coconut -->
          <circle cx="50" cy="6.8" r="3.8" fill="#9a7020" fill-opacity="0.28" stroke="#b08828" stroke-width="0.75" stroke-opacity="0.9"/>
          <circle cx="50" cy="6.2" r="1.4" fill="#d4a840" fill-opacity="0.6"/>
          <!-- Mango leaves -->
          <path d="M 44.5 10 Q 37 7.5 38 4 Q 40 1.2 43.5 6.5" fill="#6a4412" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <path d="M 55.5 10 Q 63 7.5 62 4 Q 60 1.2 56.5 6.5" fill="#6a4412" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <!-- Base plate -->
          <rect x="38" y="33" width="24" height="2.5" rx="1.2" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="0.75" stroke-opacity="0.88"/>
          <!-- Left mini 4-petal flower -->
          <circle cx="16" cy="21" r="6" fill="none" stroke="#7a5212" stroke-width="0.65" stroke-opacity="0.52"/>
          <circle cx="16" cy="21" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.75" stroke-opacity="0.72"/>
          <circle cx="16" cy="21" r="1.5" fill="#c9a84c" fill-opacity="0.65"/>
          <ellipse cx="16" cy="14.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="16" cy="27.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="9.5"  cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="22.5" cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <!-- Right mini 4-petal flower -->
          <circle cx="84" cy="21" r="6" fill="none" stroke="#7a5212" stroke-width="0.65" stroke-opacity="0.52"/>
          <circle cx="84" cy="21" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.75" stroke-opacity="0.72"/>
          <circle cx="84" cy="21" r="1.5" fill="#c9a84c" fill-opacity="0.65"/>
          <ellipse cx="84" cy="14.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="84" cy="27.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="77.5" cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="90.5" cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <!-- ===== IRON BAND 2 (y=80–88) ===== -->
          <rect x="0" y="80" width="100" height="8" fill="#0c0400" fill-opacity="0.94" stroke="#6a4810" stroke-width="0.6"/>
          <line x1="0" y1="81.5" x2="100" y2="81.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <line x1="0" y1="86.5" x2="100" y2="86.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <circle cx="9"  cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="9"  cy="84" r="2" fill="#b08828"/><circle cx="8.4"  cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="23" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="23" cy="84" r="2" fill="#b08828"/><circle cx="22.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="37" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="37" cy="84" r="2" fill="#b08828"/><circle cx="36.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="50" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="50" cy="84" r="2" fill="#b08828"/><circle cx="49.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="63" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="63" cy="84" r="2" fill="#b08828"/><circle cx="62.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="77" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="77" cy="84" r="2" fill="#b08828"/><circle cx="76.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="91" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="91" cy="84" r="2" fill="#b08828"/><circle cx="90.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <!-- ===== MIDDLE PANEL (y=43 to y=80): 8-PETAL LOTUS ===== -->
          <rect x="10" y="45" width="80" height="34" fill="#c9a84c" fill-opacity="0.03" stroke="#7a5212" stroke-width="0.7" stroke-opacity="0.52" rx="1"/>
          <!-- Outer decorative ring -->
          <circle cx="50" cy="62" r="18" fill="none" stroke="#6a4812" stroke-width="0.75" stroke-opacity="0.6"/>
          <!-- 8 outer petals -->
          <ellipse cx="50" cy="44"  rx="4.8" ry="8"   fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="50" cy="80"  rx="4.8" ry="8"   fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="32" cy="62"  rx="8"   ry="4.8" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="68" cy="62"  rx="8"   ry="4.8" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="37.3" cy="49.3" rx="4.8" ry="8" transform="rotate(45 37.3 49.3)"  fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="62.7" cy="49.3" rx="4.8" ry="8" transform="rotate(-45 62.7 49.3)" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="37.3" cy="74.7" rx="4.8" ry="8" transform="rotate(-45 37.3 74.7)" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="62.7" cy="74.7" rx="4.8" ry="8" transform="rotate(45 62.7 74.7)"  fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <!-- Inner ring -->
          <circle cx="50" cy="62" r="11.5" fill="none" stroke="#9a7020" stroke-width="0.8" stroke-opacity="0.7"/>
          <!-- 8 inner petals -->
          <ellipse cx="50" cy="51.5" rx="3.2" ry="5.5" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="50" cy="72.5" rx="3.2" ry="5.5" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="39.5" cy="62" rx="5.5" ry="3.2" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="60.5" cy="62" rx="5.5" ry="3.2" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="42.8" cy="55.3" rx="3.2" ry="5.5" transform="rotate(45 42.8 55.3)"  fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="57.2" cy="55.3" rx="3.2" ry="5.5" transform="rotate(-45 57.2 55.3)" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="42.8" cy="68.7" rx="3.2" ry="5.5" transform="rotate(-45 42.8 68.7)" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="57.2" cy="68.7" rx="3.2" ry="5.5" transform="rotate(45 57.2 68.7)"  fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <!-- Center boss -->
          <circle cx="50" cy="62" r="8"   fill="#3d1800" fill-opacity="0.55" stroke="#b08828" stroke-width="1.1" stroke-opacity="0.9"/>
          <circle cx="50" cy="62" r="5.5" fill="#2a1004" fill-opacity="0.45" stroke="#c9a84c" stroke-width="0.65" stroke-opacity="0.75"/>
          <text x="50" y="65.8" text-anchor="middle" font-size="9" fill="#d4aa48" fill-opacity="0.95" font-family="serif" font-weight="bold">ॐ</text>
          <!-- ===== IRON BAND 3 (y=123–131) ===== -->
          <rect x="0" y="123" width="100" height="8" fill="#0c0400" fill-opacity="0.94" stroke="#6a4810" stroke-width="0.6"/>
          <line x1="0" y1="124.5" x2="100" y2="124.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <line x1="0" y1="129.5" x2="100" y2="129.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <circle cx="9"  cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="9"  cy="127" r="2" fill="#b08828"/><circle cx="8.4"  cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="23" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="23" cy="127" r="2" fill="#b08828"/><circle cx="22.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="37" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="37" cy="127" r="2" fill="#b08828"/><circle cx="36.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="50" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="50" cy="127" r="2" fill="#b08828"/><circle cx="49.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="63" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="63" cy="127" r="2" fill="#b08828"/><circle cx="62.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="77" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="77" cy="127" r="2" fill="#b08828"/><circle cx="76.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="91" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="91" cy="127" r="2" fill="#b08828"/><circle cx="90.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <!-- ===== LOWER PANEL (y=88 to y=123): TRISHUL + DAMARU ===== -->
          <rect x="10" y="90" width="80" height="32" fill="#c9a84c" fill-opacity="0.03" stroke="#7a5212" stroke-width="0.7" stroke-opacity="0.52" rx="1"/>
          <!-- Trishul shaft -->
          <rect x="48.5" y="90" width="3" height="31" rx="1.5" fill="#9a7020" fill-opacity="0.48" stroke="#b08828" stroke-width="0.55" stroke-opacity="0.75"/>
          <!-- Center prong tip -->
          <path d="M 50 86 L 46.5 91.5 L 53.5 91.5 Z" fill="#b08828" fill-opacity="0.75" stroke="#d4aa48" stroke-width="0.5"/>
          <!-- Left prong curve -->
          <path d="M 50 91 Q 42.5 93.5 40.5 100 Q 42.5 107.5 45.5 105" fill="none" stroke="#b08828" stroke-width="1.3" stroke-opacity="0.78" stroke-linecap="round"/>
          <path d="M 43.5 90.5 L 41 95.5 L 46 93.5 Z" fill="#b08828" fill-opacity="0.55"/>
          <!-- Right prong curve -->
          <path d="M 50 91 Q 57.5 93.5 59.5 100 Q 57.5 107.5 54.5 105" fill="none" stroke="#b08828" stroke-width="1.3" stroke-opacity="0.78" stroke-linecap="round"/>
          <path d="M 56.5 90.5 L 59 95.5 L 54 93.5 Z" fill="#b08828" fill-opacity="0.55"/>
          <!-- Damaru (hourglass drum) -->
          <path d="M 44.5 109.5 L 50 115 L 55.5 109.5" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="0.85"/>
          <path d="M 44.5 120.5 L 50 115 L 55.5 120.5" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="0.85"/>
          <line x1="44.5" y1="109.5" x2="55.5" y2="109.5" stroke="#b08828" stroke-width="0.65" stroke-opacity="0.65"/>
          <line x1="44.5" y1="120.5" x2="55.5" y2="120.5" stroke="#b08828" stroke-width="0.65" stroke-opacity="0.65"/>
          <!-- Damaru knotted strings + beads -->
          <path d="M 44.5 109.5 Q 41.5 115 44.5 120.5" fill="none" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.6"/>
          <path d="M 55.5 109.5 Q 58.5 115 55.5 120.5" fill="none" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.6"/>
          <circle cx="41.5" cy="115" r="1.5" fill="#c9a84c" fill-opacity="0.75"/>
          <circle cx="58.5" cy="115" r="1.5" fill="#c9a84c" fill-opacity="0.75"/>
          <!-- Side vine tendrils left -->
          <path d="M 14 94 Q 18.5 98 14 102 Q 18.5 106 14 110 Q 18.5 114 14 118" fill="none" stroke="#9a7020" stroke-width="0.72" stroke-opacity="0.58"/>
          <circle cx="18.5" cy="98"  r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="18.5" cy="98"  r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="18.5" cy="106" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="18.5" cy="106" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="18.5" cy="114" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="18.5" cy="114" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <!-- Side vine tendrils right -->
          <path d="M 86 94 Q 81.5 98 86 102 Q 81.5 106 86 110 Q 81.5 114 86 118" fill="none" stroke="#9a7020" stroke-width="0.72" stroke-opacity="0.58"/>
          <circle cx="81.5" cy="98"  r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="81.5" cy="98"  r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="81.5" cy="106" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="81.5" cy="106" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="81.5" cy="114" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="81.5" cy="114" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <!-- ===== BOTTOM STRIP (y=131–150): running lotus buds ===== -->
          <rect x="10" y="133" width="80" height="13" fill="#c9a84c" fill-opacity="0.04" stroke="#7a5212" stroke-width="0.65" stroke-opacity="0.5" rx="1"/>
          <!-- 5 lotus buds -->
          <ellipse cx="21" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="21" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="21" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="36" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="36" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="36" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="50" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="50" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="50" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="64" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="64" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="64" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="79" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="79" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="79" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <!-- vine connecting buds -->
          <path d="M 24.5 141.8 Q 30 139.5 36 141.8 Q 43 144 50 141.8 Q 57 139.5 64 141.8 Q 70 144 76 141.8" fill="none" stroke="#7a5212" stroke-width="0.55" stroke-opacity="0.52"/>
          <!-- Corner rosettes -->
          <circle cx="4.5" cy="4.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="4.5" cy="4.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <circle cx="95.5" cy="4.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="95.5" cy="4.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <circle cx="4.5" cy="145.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="4.5" cy="145.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <circle cx="95.5" cy="145.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="95.5" cy="145.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <!-- TOP PANEL background -->
          <rect x="4.5" y="4.5" width="91" height="44" fill="#c9a84c" fill-opacity="0.07"/>
          <!-- Kalash (sacred pot) -->
          <rect x="39" y="41" width="22" height="3" rx="1.5" fill="none" stroke="#c9a84c" stroke-width="0.8" stroke-opacity="0.7"/>
          <path d="M 43 41 Q 38 32 40 23 Q 42 16 50 16 Q 58 16 60 23 Q 62 32 57 41 Z" fill="#c9a84c" fill-opacity="0.1" stroke="#c9a84c" stroke-width="0.8" stroke-opacity="0.7"/>
          <path d="M 42 35 Q 50 33 58 35" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <path d="M 42 28 Q 50 26 58 28" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <rect x="44" y="13" width="12" height="4" rx="1" fill="#c9a84c" fill-opacity="0.1" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/>
          <circle cx="50" cy="10" r="4" fill="#c9a84c" fill-opacity="0.1" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/>
          <path d="M 44 14 Q 39 11 40 8 Q 42 5 46 9" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.6"/>
          <path d="M 56 14 Q 61 11 60 8 Q 58 5 54 9" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.6"/>
          <circle cx="50" cy="7" r="2" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.7"/><circle cx="50" cy="7" r="0.8" fill="#c9a84c" fill-opacity="0.5"/>
          <!-- Small lotus — left of kalash -->
          <circle cx="16" cy="26" r="5" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.45"/>
          <circle cx="16" cy="26" r="2.8" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle cx="16" cy="26" r="1.2" fill="#c9a84c" fill-opacity="0.5"/>
          <ellipse cx="16" cy="20" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="16" cy="32" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="10" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="22" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <!-- Small lotus — right -->
          <circle cx="84" cy="26" r="5" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.45"/>
          <circle cx="84" cy="26" r="2.8" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle cx="84" cy="26" r="1.2" fill="#c9a84c" fill-opacity="0.5"/>
          <ellipse cx="84" cy="20" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="84" cy="32" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="78" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="90" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <!-- Top panel bottom border -->
          <line x1="4.5" y1="48" x2="95.5" y2="48" stroke="#c9a84c" stroke-width="1" stroke-opacity="0.6"/>
          <line x1="4.5" y1="51" x2="95.5" y2="51" stroke="#c9a84c" stroke-width="0.4" stroke-opacity="0.35"/>
          <!-- LEFT PILLAR BAND -->
          <rect x="4.5" y="51" width="15" height="84" fill="#c9a84c" fill-opacity="0.05"/>
          <line x1="19.5" y1="51" x2="19.5" y2="135" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.55"/>
          <circle cx="12" cy="60" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="60" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 65 L 9 68 L 12 71 L 15 68 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="74" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="74" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 79 L 9 82 L 12 85 L 15 82 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="88" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="88" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 93 L 9 96 L 12 99 L 15 96 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="102" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="102" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 107 L 9 110 L 12 113 L 15 110 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="116" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="116" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 121 L 9 124 L 12 127 L 15 124 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="130" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="130" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <!-- RIGHT PILLAR BAND -->
          <rect x="80.5" y="51" width="15" height="84" fill="#c9a84c" fill-opacity="0.05"/>
          <line x1="80.5" y1="51" x2="80.5" y2="135" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.55"/>
          <circle cx="88" cy="60" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="60" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 65 L 85 68 L 88 71 L 91 68 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="74" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="74" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 79 L 85 82 L 88 85 L 91 82 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="88" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="88" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 93 L 85 96 L 88 99 L 91 96 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="102" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="102" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 107 L 85 110 L 88 113 L 91 110 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="116" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="116" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 121 L 85 124 L 88 127 L 91 124 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="130" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="130" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <!-- CENTER PANEL — large diamond -->
          <path d="M 50 53 L 21 93 L 50 133 L 79 93 Z" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="1" stroke-opacity="0.6"/>
          <path d="M 50 59 L 26 93 L 50 127 L 74 93 Z" fill="none" stroke="#c9a84c" stroke-width="0.45" stroke-opacity="0.4"/>
          <circle cx="50" cy="54" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <circle cx="21" cy="93" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <circle cx="50" cy="132" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <circle cx="79" cy="93" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <!-- 8-petal lotus inside diamond -->
          <circle cx="50" cy="93" r="16" fill="none" stroke="#c9a84c" stroke-width="0.55" stroke-opacity="0.45"/>
          <circle cx="50" cy="93" r="11" fill="none" stroke="#c9a84c" stroke-width="0.65" stroke-opacity="0.55"/>
          <ellipse cx="50" cy="81" rx="3" ry="5.5" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="50" cy="105" rx="3" ry="5.5" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="38" cy="93" rx="5.5" ry="3" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="62" cy="93" rx="5.5" ry="3" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="42" cy="85" rx="3" ry="5.5" transform="rotate(45 42 85)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="58" cy="85" rx="3" ry="5.5" transform="rotate(-45 58 85)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="42" cy="101" rx="3" ry="5.5" transform="rotate(-45 42 101)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="58" cy="101" rx="3" ry="5.5" transform="rotate(45 58 101)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="50" cy="93" r="6" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.65"/>
          <text x="50" y="97" text-anchor="middle" font-size="9" fill="#c9a84c" fill-opacity="0.65" font-family="serif">ॐ</text>
          <!-- BOTTOM PANEL -->
          <line x1="4.5" y1="135" x2="95.5" y2="135" stroke="#c9a84c" stroke-width="1" stroke-opacity="0.6"/>
          <line x1="4.5" y1="138" x2="95.5" y2="138" stroke="#c9a84c" stroke-width="0.4" stroke-opacity="0.35"/>
          <rect x="4.5" y="138" width="91" height="7.5" fill="#c9a84c" fill-opacity="0.07"/>
          <path d="M 20 140 L 16 144 L 20 148 L 24 144 Z" fill="#c9a84c" fill-opacity="0.15" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <path d="M 50 140 L 46 144 L 50 148 L 54 144 Z" fill="#c9a84c" fill-opacity="0.15" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <path d="M 80 140 L 76 144 L 80 148 L 84 144 Z" fill="#c9a84c" fill-opacity="0.15" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
        </svg>
      </div></div>
      <div class="kapat-right" id="kapatRight"><div class="nk-wrap">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 150">
          <!-- AGED WOOD BASE -->
          <rect width="100" height="150" fill="#1e0b01" fill-opacity="0.65"/>
          <!-- Wood grain lines -->
          <path d="M0,10 Q18,9 38,10.5 Q58,12 78,10 Q90,9.2 100,10.3" stroke="#170800" stroke-width="0.55" fill="none" opacity="0.55"/>
          <path d="M0,22 Q25,23.5 48,21.5 Q72,19.8 100,22.2" stroke="#321200" stroke-width="0.4" fill="none" opacity="0.4"/>
          <path d="M0,48 Q20,49.5 45,47.5 Q68,46 100,48.8" stroke="#170800" stroke-width="0.45" fill="none" opacity="0.42"/>
          <path d="M0,65 Q30,66.5 55,64 Q80,62.5 100,65.5" stroke="#321200" stroke-width="0.38" fill="none" opacity="0.38"/>
          <path d="M0,92 Q22,93.5 48,91.5 Q72,90 100,92.5" stroke="#170800" stroke-width="0.42" fill="none" opacity="0.4"/>
          <path d="M0,110 Q35,111.5 60,109 Q82,107.5 100,110.5" stroke="#321200" stroke-width="0.38" fill="none" opacity="0.36"/>
          <path d="M0,138 Q28,139.5 52,137.5 Q75,136 100,138.8" stroke="#170800" stroke-width="0.4" fill="none" opacity="0.38"/>
          <!-- VERTICAL PLANK SEAMS (3 planks) -->
          <line x1="33" y1="0" x2="33" y2="150" stroke="#080300" stroke-width="2.2" opacity="0.82"/>
          <line x1="35" y1="0" x2="35" y2="150" stroke="#3a1200" stroke-width="0.5" opacity="0.28"/>
          <line x1="66" y1="0" x2="66" y2="150" stroke="#080300" stroke-width="2.2" opacity="0.82"/>
          <line x1="68" y1="0" x2="68" y2="150" stroke="#3a1200" stroke-width="0.5" opacity="0.28"/>
          <!-- OUTER BRASS FRAME -->
          <rect x="1.5" y="1.5" width="97" height="147" fill="none" stroke="#7a5212" stroke-width="2.4" stroke-opacity="0.9"/>
          <rect x="4.5" y="4.5" width="91" height="141" fill="none" stroke="#b08828" stroke-width="0.9" stroke-opacity="0.58"/>
          <!-- CORNER ROSETTES -->
          <circle cx="4.5" cy="4.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="4.5" cy="4.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="4.5" cy="4.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <circle cx="95.5" cy="4.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="95.5" cy="4.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="95.5" cy="4.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <circle cx="4.5" cy="145.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="4.5" cy="145.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="4.5" cy="145.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <circle cx="95.5" cy="145.5" r="5.5" fill="#3d1800" fill-opacity="0.85" stroke="#9a7020" stroke-width="0.9"/>
          <circle cx="95.5" cy="145.5" r="3.2" fill="#9a7020" fill-opacity="0.55" stroke="#c9a84c" stroke-width="0.5"/>
          <circle cx="95.5" cy="145.5" r="1.6" fill="#e0c060" fill-opacity="0.85"/>
          <!-- BEAD/ROPE BORDER — top row -->
          <circle cx="13" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="13" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="22" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="22" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="31" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="31" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="50" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="50" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="69" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="69" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="78" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="78" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="87" cy="7" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="87" cy="7" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <!-- left & right bead columns -->
          <circle cx="7" cy="16" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="16" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="25" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="25" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="52" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="52" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="61" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="61" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="70" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="70" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="97" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="97" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="106" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="106" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="115" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="115" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="7" cy="136" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="7" cy="136" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="16" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="16" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="25" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="25" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="52" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="52" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="61" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="61" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="70" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="70" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="97" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="97" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="106" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="106" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="115" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="115" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="93" cy="136" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="93" cy="136" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <!-- bottom row beads -->
          <circle cx="13" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="13" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="22" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="22" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="31" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="31" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="50" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="50" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="69" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="69" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="78" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="78" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <circle cx="87" cy="143" r="1.6" fill="#9a7020" fill-opacity="0.75"/><circle cx="87" cy="143" r="0.75" fill="#e8d070" fill-opacity="0.7"/>
          <!-- ===== IRON BAND 1 (y=35–43) ===== -->
          <rect x="0" y="35" width="100" height="8" fill="#0c0400" fill-opacity="0.94" stroke="#6a4810" stroke-width="0.6"/>
          <line x1="0" y1="36.5" x2="100" y2="36.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <line x1="0" y1="41.5" x2="100" y2="41.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <circle cx="9"  cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="9"  cy="39" r="2"   fill="#b08828"/><circle cx="8.4"  cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="23" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="23" cy="39" r="2"   fill="#b08828"/><circle cx="22.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="37" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="37" cy="39" r="2"   fill="#b08828"/><circle cx="36.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="50" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="50" cy="39" r="2"   fill="#b08828"/><circle cx="49.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="63" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="63" cy="39" r="2"   fill="#b08828"/><circle cx="62.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="77" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="77" cy="39" r="2"   fill="#b08828"/><circle cx="76.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="91" cy="39" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="91" cy="39" r="2"   fill="#b08828"/><circle cx="90.4" cy="38.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <!-- ===== TOP PANEL (y=4 to y=35): KALASH ===== -->
          <rect x="10" y="10" width="80" height="24" fill="#c9a84c" fill-opacity="0.04" stroke="#7a5212" stroke-width="0.7" stroke-opacity="0.55" rx="1"/>
          <!-- Kalash pot -->
          <path d="M 44 34 Q 37 25.5 39 17 Q 41.5 10 50 10 Q 58.5 10 61 17 Q 63 25.5 56 34 Z" fill="#9a7020" fill-opacity="0.2" stroke="#b08828" stroke-width="1" stroke-opacity="0.88"/>
          <path d="M 40.5 28.5 Q 50 27 59.5 28.5" fill="none" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.65"/>
          <path d="M 40 21 Q 50 19.5 60 21" fill="none" stroke="#b08828" stroke-width="0.5" stroke-opacity="0.55"/>
          <!-- Neck -->
          <rect x="44.5" y="8.5" width="11" height="3.5" rx="1.2" fill="#9a7020" fill-opacity="0.28" stroke="#b08828" stroke-width="0.75" stroke-opacity="0.85"/>
          <!-- Coconut -->
          <circle cx="50" cy="6.8" r="3.8" fill="#9a7020" fill-opacity="0.28" stroke="#b08828" stroke-width="0.75" stroke-opacity="0.9"/>
          <circle cx="50" cy="6.2" r="1.4" fill="#d4a840" fill-opacity="0.6"/>
          <!-- Mango leaves -->
          <path d="M 44.5 10 Q 37 7.5 38 4 Q 40 1.2 43.5 6.5" fill="#6a4412" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <path d="M 55.5 10 Q 63 7.5 62 4 Q 60 1.2 56.5 6.5" fill="#6a4412" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <!-- Base plate -->
          <rect x="38" y="33" width="24" height="2.5" rx="1.2" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="0.75" stroke-opacity="0.88"/>
          <!-- Left mini 4-petal flower -->
          <circle cx="16" cy="21" r="6" fill="none" stroke="#7a5212" stroke-width="0.65" stroke-opacity="0.52"/>
          <circle cx="16" cy="21" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.75" stroke-opacity="0.72"/>
          <circle cx="16" cy="21" r="1.5" fill="#c9a84c" fill-opacity="0.65"/>
          <ellipse cx="16" cy="14.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="16" cy="27.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="9.5"  cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="22.5" cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <!-- Right mini 4-petal flower -->
          <circle cx="84" cy="21" r="6" fill="none" stroke="#7a5212" stroke-width="0.65" stroke-opacity="0.52"/>
          <circle cx="84" cy="21" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.75" stroke-opacity="0.72"/>
          <circle cx="84" cy="21" r="1.5" fill="#c9a84c" fill-opacity="0.65"/>
          <ellipse cx="84" cy="14.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="84" cy="27.5" rx="2.2" ry="3.8" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="77.5" cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <ellipse cx="90.5" cy="21" rx="3.8" ry="2.2" fill="#6a4412" fill-opacity="0.12" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.65"/>
          <!-- ===== IRON BAND 2 (y=80–88) ===== -->
          <rect x="0" y="80" width="100" height="8" fill="#0c0400" fill-opacity="0.94" stroke="#6a4810" stroke-width="0.6"/>
          <line x1="0" y1="81.5" x2="100" y2="81.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <line x1="0" y1="86.5" x2="100" y2="86.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <circle cx="9"  cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="9"  cy="84" r="2" fill="#b08828"/><circle cx="8.4"  cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="23" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="23" cy="84" r="2" fill="#b08828"/><circle cx="22.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="37" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="37" cy="84" r="2" fill="#b08828"/><circle cx="36.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="50" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="50" cy="84" r="2" fill="#b08828"/><circle cx="49.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="63" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="63" cy="84" r="2" fill="#b08828"/><circle cx="62.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="77" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="77" cy="84" r="2" fill="#b08828"/><circle cx="76.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="91" cy="84" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="91" cy="84" r="2" fill="#b08828"/><circle cx="90.4" cy="83.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <!-- ===== MIDDLE PANEL (y=43 to y=80): 8-PETAL LOTUS ===== -->
          <rect x="10" y="45" width="80" height="34" fill="#c9a84c" fill-opacity="0.03" stroke="#7a5212" stroke-width="0.7" stroke-opacity="0.52" rx="1"/>
          <!-- Outer decorative ring -->
          <circle cx="50" cy="62" r="18" fill="none" stroke="#6a4812" stroke-width="0.75" stroke-opacity="0.6"/>
          <!-- 8 outer petals -->
          <ellipse cx="50" cy="44"  rx="4.8" ry="8"   fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="50" cy="80"  rx="4.8" ry="8"   fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="32" cy="62"  rx="8"   ry="4.8" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="68" cy="62"  rx="8"   ry="4.8" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="37.3" cy="49.3" rx="4.8" ry="8" transform="rotate(45 37.3 49.3)"  fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="62.7" cy="49.3" rx="4.8" ry="8" transform="rotate(-45 62.7 49.3)" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="37.3" cy="74.7" rx="4.8" ry="8" transform="rotate(-45 37.3 74.7)" fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <ellipse cx="62.7" cy="74.7" rx="4.8" ry="8" transform="rotate(45 62.7 74.7)"  fill="#8a6018" fill-opacity="0.14" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.78"/>
          <!-- Inner ring -->
          <circle cx="50" cy="62" r="11.5" fill="none" stroke="#9a7020" stroke-width="0.8" stroke-opacity="0.7"/>
          <!-- 8 inner petals -->
          <ellipse cx="50" cy="51.5" rx="3.2" ry="5.5" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="50" cy="72.5" rx="3.2" ry="5.5" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="39.5" cy="62" rx="5.5" ry="3.2" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="60.5" cy="62" rx="5.5" ry="3.2" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="42.8" cy="55.3" rx="3.2" ry="5.5" transform="rotate(45 42.8 55.3)"  fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="57.2" cy="55.3" rx="3.2" ry="5.5" transform="rotate(-45 57.2 55.3)" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="42.8" cy="68.7" rx="3.2" ry="5.5" transform="rotate(-45 42.8 68.7)" fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <ellipse cx="57.2" cy="68.7" rx="3.2" ry="5.5" transform="rotate(45 57.2 68.7)"  fill="#9a7020" fill-opacity="0.22" stroke="#b08828" stroke-width="0.6" stroke-opacity="0.75"/>
          <!-- Center boss -->
          <circle cx="50" cy="62" r="8"   fill="#3d1800" fill-opacity="0.55" stroke="#b08828" stroke-width="1.1" stroke-opacity="0.9"/>
          <circle cx="50" cy="62" r="5.5" fill="#2a1004" fill-opacity="0.45" stroke="#c9a84c" stroke-width="0.65" stroke-opacity="0.75"/>
          <text x="50" y="65.8" text-anchor="middle" font-size="9" fill="#d4aa48" fill-opacity="0.95" font-family="serif" font-weight="bold">ॐ</text>
          <!-- ===== IRON BAND 3 (y=123–131) ===== -->
          <rect x="0" y="123" width="100" height="8" fill="#0c0400" fill-opacity="0.94" stroke="#6a4810" stroke-width="0.6"/>
          <line x1="0" y1="124.5" x2="100" y2="124.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <line x1="0" y1="129.5" x2="100" y2="129.5" stroke="#9a7020" stroke-width="0.4" stroke-opacity="0.38"/>
          <circle cx="9"  cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="9"  cy="127" r="2" fill="#b08828"/><circle cx="8.4"  cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="23" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="23" cy="127" r="2" fill="#b08828"/><circle cx="22.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="37" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="37" cy="127" r="2" fill="#b08828"/><circle cx="36.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="50" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="50" cy="127" r="2" fill="#b08828"/><circle cx="49.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="63" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="63" cy="127" r="2" fill="#b08828"/><circle cx="62.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="77" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="77" cy="127" r="2" fill="#b08828"/><circle cx="76.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <circle cx="91" cy="127" r="3.4" fill="#4a3008" stroke="#9a7020" stroke-width="0.65"/><circle cx="91" cy="127" r="2" fill="#b08828"/><circle cx="90.4" cy="126.2" r="0.8" fill="#f0d870" fill-opacity="0.85"/>
          <!-- ===== LOWER PANEL (y=88 to y=123): TRISHUL + DAMARU ===== -->
          <rect x="10" y="90" width="80" height="32" fill="#c9a84c" fill-opacity="0.03" stroke="#7a5212" stroke-width="0.7" stroke-opacity="0.52" rx="1"/>
          <!-- Trishul shaft -->
          <rect x="48.5" y="90" width="3" height="31" rx="1.5" fill="#9a7020" fill-opacity="0.48" stroke="#b08828" stroke-width="0.55" stroke-opacity="0.75"/>
          <!-- Center prong tip -->
          <path d="M 50 86 L 46.5 91.5 L 53.5 91.5 Z" fill="#b08828" fill-opacity="0.75" stroke="#d4aa48" stroke-width="0.5"/>
          <!-- Left prong curve -->
          <path d="M 50 91 Q 42.5 93.5 40.5 100 Q 42.5 107.5 45.5 105" fill="none" stroke="#b08828" stroke-width="1.3" stroke-opacity="0.78" stroke-linecap="round"/>
          <path d="M 43.5 90.5 L 41 95.5 L 46 93.5 Z" fill="#b08828" fill-opacity="0.55"/>
          <!-- Right prong curve -->
          <path d="M 50 91 Q 57.5 93.5 59.5 100 Q 57.5 107.5 54.5 105" fill="none" stroke="#b08828" stroke-width="1.3" stroke-opacity="0.78" stroke-linecap="round"/>
          <path d="M 56.5 90.5 L 59 95.5 L 54 93.5 Z" fill="#b08828" fill-opacity="0.55"/>
          <!-- Damaru (hourglass drum) -->
          <path d="M 44.5 109.5 L 50 115 L 55.5 109.5" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="0.85"/>
          <path d="M 44.5 120.5 L 50 115 L 55.5 120.5" fill="#9a7020" fill-opacity="0.32" stroke="#b08828" stroke-width="0.85"/>
          <line x1="44.5" y1="109.5" x2="55.5" y2="109.5" stroke="#b08828" stroke-width="0.65" stroke-opacity="0.65"/>
          <line x1="44.5" y1="120.5" x2="55.5" y2="120.5" stroke="#b08828" stroke-width="0.65" stroke-opacity="0.65"/>
          <!-- Damaru knotted strings + beads -->
          <path d="M 44.5 109.5 Q 41.5 115 44.5 120.5" fill="none" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.6"/>
          <path d="M 55.5 109.5 Q 58.5 115 55.5 120.5" fill="none" stroke="#9a7020" stroke-width="0.55" stroke-opacity="0.6"/>
          <circle cx="41.5" cy="115" r="1.5" fill="#c9a84c" fill-opacity="0.75"/>
          <circle cx="58.5" cy="115" r="1.5" fill="#c9a84c" fill-opacity="0.75"/>
          <!-- Side vine tendrils left -->
          <path d="M 14 94 Q 18.5 98 14 102 Q 18.5 106 14 110 Q 18.5 114 14 118" fill="none" stroke="#9a7020" stroke-width="0.72" stroke-opacity="0.58"/>
          <circle cx="18.5" cy="98"  r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="18.5" cy="98"  r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="18.5" cy="106" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="18.5" cy="106" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="18.5" cy="114" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="18.5" cy="114" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <!-- Side vine tendrils right -->
          <path d="M 86 94 Q 81.5 98 86 102 Q 81.5 106 86 110 Q 81.5 114 86 118" fill="none" stroke="#9a7020" stroke-width="0.72" stroke-opacity="0.58"/>
          <circle cx="81.5" cy="98"  r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="81.5" cy="98"  r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="81.5" cy="106" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="81.5" cy="106" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <circle cx="81.5" cy="114" r="2.2" fill="#8a6018" fill-opacity="0.22" stroke="#9a7020" stroke-width="0.5"/><circle cx="81.5" cy="114" r="0.9" fill="#b08828" fill-opacity="0.65"/>
          <!-- ===== BOTTOM STRIP (y=131–150): running lotus buds ===== -->
          <rect x="10" y="133" width="80" height="13" fill="#c9a84c" fill-opacity="0.04" stroke="#7a5212" stroke-width="0.65" stroke-opacity="0.5" rx="1"/>
          <!-- 5 lotus buds -->
          <ellipse cx="21" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="21" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="21" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="36" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="36" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="36" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="50" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="50" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="50" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="64" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="64" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="64" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <ellipse cx="79" cy="137" rx="3.2" ry="4.8" fill="#8a6018" fill-opacity="0.18" stroke="#9a7020" stroke-width="0.65" stroke-opacity="0.72"/>
          <circle  cx="79" cy="141.8" r="3.2" fill="none" stroke="#9a7020" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle  cx="79" cy="141.8" r="1.3" fill="#b08828" fill-opacity="0.6"/>
          <!-- vine connecting buds -->
          <path d="M 24.5 141.8 Q 30 139.5 36 141.8 Q 43 144 50 141.8 Q 57 139.5 64 141.8 Q 70 144 76 141.8" fill="none" stroke="#7a5212" stroke-width="0.55" stroke-opacity="0.52"/>
          <!-- Corner rosettes -->
          <circle cx="4.5" cy="4.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="4.5" cy="4.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <circle cx="95.5" cy="4.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="95.5" cy="4.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <circle cx="4.5" cy="145.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="4.5" cy="145.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <circle cx="95.5" cy="145.5" r="4" fill="#c9a84c" fill-opacity="0.2" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.7"/><circle cx="95.5" cy="145.5" r="1.8" fill="#c9a84c" fill-opacity="0.6"/>
          <!-- TOP PANEL background -->
          <rect x="4.5" y="4.5" width="91" height="44" fill="#c9a84c" fill-opacity="0.07"/>
          <!-- Kalash (sacred pot) -->
          <rect x="39" y="41" width="22" height="3" rx="1.5" fill="none" stroke="#c9a84c" stroke-width="0.8" stroke-opacity="0.7"/>
          <path d="M 43 41 Q 38 32 40 23 Q 42 16 50 16 Q 58 16 60 23 Q 62 32 57 41 Z" fill="#c9a84c" fill-opacity="0.1" stroke="#c9a84c" stroke-width="0.8" stroke-opacity="0.7"/>
          <path d="M 42 35 Q 50 33 58 35" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <path d="M 42 28 Q 50 26 58 28" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <rect x="44" y="13" width="12" height="4" rx="1" fill="#c9a84c" fill-opacity="0.1" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/>
          <circle cx="50" cy="10" r="4" fill="#c9a84c" fill-opacity="0.1" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/>
          <path d="M 44 14 Q 39 11 40 8 Q 42 5 46 9" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.6"/>
          <path d="M 56 14 Q 61 11 60 8 Q 58 5 54 9" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.6"/>
          <circle cx="50" cy="7" r="2" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.7"/><circle cx="50" cy="7" r="0.8" fill="#c9a84c" fill-opacity="0.5"/>
          <!-- Small lotus — left of kalash -->
          <circle cx="16" cy="26" r="5" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.45"/>
          <circle cx="16" cy="26" r="2.8" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle cx="16" cy="26" r="1.2" fill="#c9a84c" fill-opacity="0.5"/>
          <ellipse cx="16" cy="20" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="16" cy="32" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="10" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="22" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <!-- Small lotus — right -->
          <circle cx="84" cy="26" r="5" fill="none" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.45"/>
          <circle cx="84" cy="26" r="2.8" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.65"/>
          <circle cx="84" cy="26" r="1.2" fill="#c9a84c" fill-opacity="0.5"/>
          <ellipse cx="84" cy="20" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="84" cy="32" rx="1.8" ry="3.2" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="78" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="90" cy="26" rx="3.2" ry="1.8" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <!-- Top panel bottom border -->
          <line x1="4.5" y1="48" x2="95.5" y2="48" stroke="#c9a84c" stroke-width="1" stroke-opacity="0.6"/>
          <line x1="4.5" y1="51" x2="95.5" y2="51" stroke="#c9a84c" stroke-width="0.4" stroke-opacity="0.35"/>
          <!-- LEFT PILLAR BAND -->
          <rect x="4.5" y="51" width="15" height="84" fill="#c9a84c" fill-opacity="0.05"/>
          <line x1="19.5" y1="51" x2="19.5" y2="135" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.55"/>
          <circle cx="12" cy="60" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="60" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 65 L 9 68 L 12 71 L 15 68 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="74" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="74" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 79 L 9 82 L 12 85 L 15 82 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="88" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="88" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 93 L 9 96 L 12 99 L 15 96 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="102" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="102" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 107 L 9 110 L 12 113 L 15 110 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="116" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="116" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 12 121 L 9 124 L 12 127 L 15 124 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="12" cy="130" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="12" cy="130" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <!-- RIGHT PILLAR BAND -->
          <rect x="80.5" y="51" width="15" height="84" fill="#c9a84c" fill-opacity="0.05"/>
          <line x1="80.5" y1="51" x2="80.5" y2="135" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.55"/>
          <circle cx="88" cy="60" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="60" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 65 L 85 68 L 88 71 L 91 68 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="74" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="74" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 79 L 85 82 L 88 85 L 91 82 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="88" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="88" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 93 L 85 96 L 88 99 L 91 96 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="102" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="102" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 107 L 85 110 L 88 113 L 91 110 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="116" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="116" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <path d="M 88 121 L 85 124 L 88 127 L 91 124 Z" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="88" cy="130" r="2.2" fill="none" stroke="#c9a84c" stroke-width="0.6" stroke-opacity="0.7"/><circle cx="88" cy="130" r="1" fill="#c9a84c" fill-opacity="0.5"/>
          <!-- CENTER PANEL — large diamond -->
          <path d="M 50 53 L 21 93 L 50 133 L 79 93 Z" fill="#c9a84c" fill-opacity="0.06" stroke="#c9a84c" stroke-width="1" stroke-opacity="0.6"/>
          <path d="M 50 59 L 26 93 L 50 127 L 74 93 Z" fill="none" stroke="#c9a84c" stroke-width="0.45" stroke-opacity="0.4"/>
          <circle cx="50" cy="54" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <circle cx="21" cy="93" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <circle cx="50" cy="132" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <circle cx="79" cy="93" r="2" fill="#c9a84c" fill-opacity="0.65"/>
          <!-- 8-petal lotus inside diamond -->
          <circle cx="50" cy="93" r="16" fill="none" stroke="#c9a84c" stroke-width="0.55" stroke-opacity="0.45"/>
          <circle cx="50" cy="93" r="11" fill="none" stroke="#c9a84c" stroke-width="0.65" stroke-opacity="0.55"/>
          <ellipse cx="50" cy="81" rx="3" ry="5.5" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="50" cy="105" rx="3" ry="5.5" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="38" cy="93" rx="5.5" ry="3" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="62" cy="93" rx="5.5" ry="3" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="42" cy="85" rx="3" ry="5.5" transform="rotate(45 42 85)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="58" cy="85" rx="3" ry="5.5" transform="rotate(-45 58 85)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="42" cy="101" rx="3" ry="5.5" transform="rotate(-45 42 101)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <ellipse cx="58" cy="101" rx="3" ry="5.5" transform="rotate(45 58 101)" fill="#c9a84c" fill-opacity="0.07" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.55"/>
          <circle cx="50" cy="93" r="6" fill="#c9a84c" fill-opacity="0.12" stroke="#c9a84c" stroke-width="0.7" stroke-opacity="0.65"/>
          <text x="50" y="97" text-anchor="middle" font-size="9" fill="#c9a84c" fill-opacity="0.65" font-family="serif">ॐ</text>
          <!-- BOTTOM PANEL -->
          <line x1="4.5" y1="135" x2="95.5" y2="135" stroke="#c9a84c" stroke-width="1" stroke-opacity="0.6"/>
          <line x1="4.5" y1="138" x2="95.5" y2="138" stroke="#c9a84c" stroke-width="0.4" stroke-opacity="0.35"/>
          <rect x="4.5" y="138" width="91" height="7.5" fill="#c9a84c" fill-opacity="0.07"/>
          <path d="M 20 140 L 16 144 L 20 148 L 24 144 Z" fill="#c9a84c" fill-opacity="0.15" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <path d="M 50 140 L 46 144 L 50 148 L 54 144 Z" fill="#c9a84c" fill-opacity="0.15" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
          <path d="M 80 140 L 76 144 L 80 148 L 84 144 Z" fill="#c9a84c" fill-opacity="0.15" stroke="#c9a84c" stroke-width="0.5" stroke-opacity="0.5"/>
        </svg>
      </div></div>

    </div>
  </div>

  <!-- STATUS PANEL -->
  <div class="status-panel">
    <div class="status-label" id="statusLabel">Next Aarti</div>
    <div class="status-main" id="statusMain">Doors closed — Awaiting aarti</div>
    <div class="countdown" id="countdown">--:--:--</div>
    <!-- Progress Bar -->
    <div style="width:100%;background:rgba(255,255,255,0.06);border-radius:20px;height:6px;margin:1rem 0 0.5rem;overflow:hidden;">
      <div id="progressBar" style="height:100%;width:0%;border-radius:20px;background:linear-gradient(90deg,#8b0000,#c9a84c,#ff8800);transition:width 1s linear;box-shadow:0 0 8px rgba(201,168,76,0.5);"></div>
    </div>

    <div class="aarti-times">
      <div class="aarti-time-item" id="morningItem">
        <span class="time">6:00 AM</span>
        <span class="label" data-key="mandir_morning_lbl">Morning Aarti</span>
      </div>
      <div class="aarti-time-item" id="eveningItem">
        <span class="time">7:00 PM</span>
        <span class="label" data-key="mandir_evening_lbl">Evening Aarti</span>
      </div>
    </div>
  </div>

  <!-- YOUTUBE PLAYER (YT IFrame API — loads muted, unmuted on tap) -->
  <div class="aarti-player" id="aartiPlayer">
    <div id="aartiFrame"></div>
  </div>


  <!-- PRAYER -->
  <div class="prayer-scroll">
    <p>
      <span data-key="mandir_prayer">ॐ Kaalabhairavaya Namah</span><br>
      <span style="font-size:0.85rem; color:rgba(201,168,76,0.5);" data-key="mandir_prayer_sub">Jai Kaal Bhairav · Kotwal of Kashi · Destroyer of Fear</span>
    </p>
  </div>

</div>

<script>
// ===== CONFIGURATION =====
var AARTI_YOUTUBE_ID = 'v70gYG7XJmc';
var AARTI_DURATION_MIN = 8; // minutes (video is 7:08, rounded up)

// IST aarti times
var MORNING_HOUR = 6,  MORNING_MIN = 0;
var EVENING_HOUR = 19, EVENING_MIN = 0;

// ===== LANG HELPER =====
function isHindi() { return localStorage.getItem('kb_lang') === 'hi'; }
function t(en, hi) { return isHindi() ? hi : en; }

// ===== STATE =====
var aartiActive = false;
var testMode    = false;
var testElapsed = 0; // seconds elapsed since test started (counts up each tick)

// ===== TEST BUTTON — added after DOM ready =====
<?php $h = $_SERVER['HTTP_HOST']; if ($h==='localhost'||$h==='localhost:8080'||$h==='127.0.0.1'||$h==='127.0.0.1:8080'): ?>
window.addEventListener('load', function() {
  var btn = document.createElement('button');
  btn.id = 'testBtn';
  btn.textContent = '▶ Test Aarti';
  btn.style.cssText = 'position:fixed;bottom:90px;right:12px;z-index:99999;background:#1a0800;color:#c9a84c;border:1px solid rgba(201,168,76,0.6);font-size:0.72rem;padding:0.45rem 0.9rem;border-radius:4px;cursor:pointer;letter-spacing:0.05em;';
  btn.addEventListener('click', function() {
    if (!testMode) {
      // START TEST — tick() will count testElapsed each second
      testMode    = true;
      testElapsed = 0;
      aartiActive = true;
      _openKapat();
      document.getElementById('statusLabel').textContent = t('Aarti in Progress [TEST]', 'आरती चल रही है [TEST]');
      document.getElementById('statusMain').textContent  = t('Doors open — Darshan time · Aarti in Progress', 'कपाट खुले हैं — दर्शन करें · आरती चल रही है');
      btn.textContent = '■ Stop Test';
    } else {
      // STOP TEST
      testMode    = false;
      testElapsed = 0;
      aartiActive = false;
      _closeKapat();
      document.getElementById('statusLabel').textContent = t('Next Aarti', 'अगली आरती');
      document.getElementById('statusMain').textContent  = t('Doors closed — Awaiting aarti', 'कपाट बंद हैं — आरती की प्रतीक्षा करें');
      document.getElementById('progressBar').style.width = '0%';
      btn.textContent = '▶ Test Aarti';
    }
  });
  document.body.appendChild(btn);
});
<?php endif; ?>


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
    document.getElementById('flamesContainer').classList.add('visible');
  }, 1500);
  document.getElementById('liveBadge').classList.add('visible');

  // Calculate elapsed seconds for late-join sync
  var elapsed = 0;
  if (testMode) {
    elapsed = testElapsed;
  } else {
    var ist = getISTTime();
    var h   = ist.getHours();
    var startSec = (h < 12)
      ? (MORNING_HOUR * 60 + MORNING_MIN) * 60
      : (EVENING_HOUR * 60 + EVENING_MIN) * 60;
    elapsed = Math.max(0, h * 3600 + ist.getMinutes() * 60 + ist.getSeconds() - startSec);
  }

  // Wait for kapat to fully open (3s transition) then start aarti
  var _elapsed = elapsed;
  setTimeout(function() {
    loadAartiPlayer(_elapsed, true); // start muted (browser requires), onReady unmutes
  }, 3000);
}

function _closeKapat() {
  document.getElementById('kapatLeft').classList.remove('open');
  document.getElementById('kapatRight').classList.remove('open');
  document.getElementById('kapatMsg').classList.remove('hidden');
  document.getElementById('mandirBg').classList.remove('visible');
  document.getElementById('templeGlow').classList.remove('visible');
  document.getElementById('flamesContainer').classList.remove('visible');
  document.getElementById('liveBadge').classList.remove('visible');
  stopAartiPlayer();
}

// ===== MAIN TICK =====
function tick() {
  var totalDur = AARTI_DURATION_MIN * 60;
  var active, elapsedSec;

  if (testMode) {
    // Simulate aarti time — increment every second
    testElapsed++;
    elapsedSec = testElapsed;
    active = elapsedSec <= totalDur;
    if (!active) {
      // Test naturally finished (ran full duration)
      testMode    = false;
      testElapsed = 0;
      var b = document.getElementById('testBtn');
      if (b) b.textContent = '▶ Test Aarti';
    }
  } else {
    var ist   = getISTTime();
    var ist_h = ist.getHours();
    active = isAartiTime(ist);

    // Highlight active aarti time
    document.getElementById('morningItem').classList.remove('active');
    document.getElementById('eveningItem').classList.remove('active');
    if (active) {
      if (ist_h < 12) document.getElementById('morningItem').classList.add('active');
      else            document.getElementById('eveningItem').classList.add('active');
    }

    if (active) {
      var startSec = (ist_h < 12)
        ? (MORNING_HOUR * 60 + MORNING_MIN) * 60
        : (EVENING_HOUR * 60 + EVENING_MIN) * 60;
      elapsedSec = Math.max(0, ist_h * 3600 + ist.getMinutes() * 60 + ist.getSeconds() - startSec);
    }
  }

  // State transitions
  if (active && !aartiActive) {
    aartiActive = true;
    _openKapat();
    document.getElementById('statusLabel').textContent = testMode ? t('Aarti in Progress [TEST]', 'आरती चल रही है [TEST]') : t('Aarti in Progress', 'आरती चल रही है');
    document.getElementById('statusMain').textContent  = t('Doors open — Darshan time · Aarti in Progress', 'कपाट खुले हैं — दर्शन करें · आरती चल रही है');
  } else if (!active && aartiActive) {
    aartiActive = false;
    _closeKapat();
    document.getElementById('statusLabel').textContent = t('Next Aarti', 'अगली आरती');
    document.getElementById('statusMain').textContent  = t('Doors closed — Awaiting aarti', 'कपाट बंद हैं — आरती की प्रतीक्षा करें');
    document.getElementById('progressBar').style.width = '0%';
  }

  // Update countdown + progress bar
  if (active) {
    var remain = Math.max(0, totalDur - elapsedSec);
    var pct    = Math.min(100, (elapsedSec / totalDur) * 100);
    document.getElementById('countdown').textContent   = formatCountdown(remain);
    document.getElementById('progressBar').style.width = pct + '%';
  } else if (!testMode) {
    var ist2     = getISTTime();
    var next     = getNextAarti(ist2);
    var secsIn30 = 30 * 60;
    document.getElementById('countdown').textContent   = formatCountdown(next.diff);
    document.getElementById('progressBar').style.width =
      (next.diff <= secsIn30)
        ? Math.min(100, ((secsIn30 - next.diff) / secsIn30) * 100) + '%'
        : '0%';
  }
}

// unmuteAarti() and loadAartiPlayer() defined below after YT API script loads

// Run immediately + every second
tick();
setInterval(tick, 1000);
</script>

<!-- YouTube IFrame API — loads async, does not block page -->
<script src="https://www.youtube.com/iframe_api"></script>
<script>
var ytPlayer    = null;
var ytApiReady  = false;
var pendingStart = -1; // elapsed seconds waiting for API to be ready


var pendingMuted = true;

function _createYTPlayer(startSec, muted) {
  // Destroy previous instance if any
  if (ytPlayer) { try { ytPlayer.destroy(); } catch(e){} ytPlayer = null; }

  document.getElementById('aartiPlayer').classList.add('visible');

  ytPlayer = new YT.Player('aartiFrame', {
    width: '1', height: '1',
    videoId: AARTI_YOUTUBE_ID,
    playerVars: {
      autoplay: 1,
      mute:     muted ? 1 : 0,
      start:    startSec,
      controls: 0,
      loop:     0,
      rel:      0
    },
    events: {
      onReady: function(e) {
        e.target.playVideo();
        // Auto-unmute — works once browser sees the muted autoplay first
        setTimeout(function() {
          try { e.target.unMute(); e.target.setVolume(100); } catch(err) {}
        }, 500);
      }
    }
  });
}

// muted=false when called from a user gesture (test button click)
// muted=true  when auto-triggered by real aarti time (no gesture)
function loadAartiPlayer(elapsed, muted) {
  if (ytApiReady) {
    _createYTPlayer(elapsed, muted);
  } else {
    pendingStart = elapsed;
    pendingMuted = muted;
  }
}

function onYouTubeIframeAPIReady() {
  ytApiReady = true;
  if (pendingStart >= 0) {
    _createYTPlayer(pendingStart, pendingMuted);
    pendingStart = -1;
  }
}


function stopAartiPlayer() {
  document.getElementById('aartiPlayer').classList.remove('visible');
  if (ytPlayer) { try { ytPlayer.stopVideo(); ytPlayer.destroy(); } catch(e){} ytPlayer = null; }
  // Re-create the target div (YT API replaces it with iframe)
  var p = document.getElementById('aartiPlayer');
  var d = document.createElement('div');
  d.id = 'aartiFrame';
  p.innerHTML = '';
  p.appendChild(d);
}
</script>

<?php include 'includes/footer.php'; ?>
