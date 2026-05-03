// main.js — kaalbhairav.org

// Mobile menu toggle
function toggleMenu() {
  const nav = document.getElementById('nav-links');
  nav.classList.toggle('open');
}

// Close menu on outside click
document.addEventListener('click', function(e) {
  const nav = document.getElementById('nav-links');
  const btn = document.querySelector('.mobile-menu-btn');
  if (nav && btn && !nav.contains(e.target) && !btn.contains(e.target)) {
    nav.classList.remove('open');
  }
});

// Nav scroll effect
window.addEventListener('scroll', function() {
  const nav = document.getElementById('main-nav');
  if (nav) {
    nav.style.backgroundColor = window.scrollY > 50
      ? 'rgba(10,5,0,0.99)'
      : 'rgba(10,5,0,0.85)';
  }
});

// Generate flame effects on hero
function generateFlames() {
  const container = document.querySelector('.flame-container');
  if (!container) return;

  const colors = [
    ['#ff6b00','#cc1111'],
    ['#ff8c00','#8b0000'],
    ['#ffd700','#ff6b00'],
    ['#cc1111','#6b0000'],
    ['#ffaa00','#cc1111'],
  ];

  for (let i = 0; i < 40; i++) {
    const flame = document.createElement('div');
    flame.className = 'flame';
    const color = colors[Math.floor(Math.random() * colors.length)];
    const height = 30 + Math.random() * 100;
    const width  = 3 + Math.random() * 8;
    const left   = Math.random() * 100;
    const duration = 1 + Math.random() * 2;
    const delay  = Math.random() * 2;

    flame.style.cssText = `
      left: ${left}%;
      height: ${height}px;
      width: ${width}px;
      background: linear-gradient(to top, ${color[0]}, ${color[1]}, transparent);
      animation-duration: ${duration}s;
      animation-delay: ${delay}s;
    `;
    container.appendChild(flame);
  }
}

// Scroll reveal animation
function initScrollReveal() {
  const cards = document.querySelectorAll('.card, .story-block, .bhairav-item, .pooja-step, .mantra-block');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = '1';
        entry.target.style.transform = entry.target.classList.contains('bhairav-item')
          ? 'scale(1)' : 'translateY(0)';
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

  cards.forEach(el => {
    el.style.opacity = '0';
    el.style.transform = el.classList.contains('bhairav-item') ? 'scale(0.95)' : 'translateY(20px)';
    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    observer.observe(el);
  });
}

// Donation amount selector
function initDonation() {
  const btns = document.querySelectorAll('.amount-btn');
  const customInput = document.getElementById('custom-amount');

  btns.forEach(btn => {
    btn.addEventListener('click', function() {
      btns.forEach(b => b.classList.remove('selected'));
      this.classList.add('selected');
      if (customInput) {
        customInput.value = this.dataset.amount || '';
      }
    });
  });
}

// Guidance accordion toggle
function toggleGuidance(btn) {
  var panel = btn.nextElementSibling;
  var isOpen = panel.classList.contains('open');
  btn.classList.toggle('open', !isOpen);
  panel.classList.toggle('open', !isOpen);
  var keyOpen = btn.getAttribute('data-open');
  var keyClose = btn.getAttribute('data-close');
  var lang = localStorage.getItem('kb_lang') || 'en';
  if (!isOpen) {
    btn.querySelector('.label-text').textContent = (lang === 'hi' ? (btn.getAttribute('data-close-hi') || keyClose) : keyClose);
  } else {
    btn.querySelector('.label-text').textContent = (lang === 'hi' ? (btn.getAttribute('data-open-hi') || keyOpen) : keyOpen);
  }
}

// Copy mantra to clipboard
function copyMantra(text) {
  navigator.clipboard.writeText(text).then(() => {
    showToast('Mantra copied to clipboard 🙏');
  }).catch(() => {
    showToast('Please copy manually');
  });
}

function showToast(msg) {
  const toast = document.createElement('div');
  toast.style.cssText = `
    position:fixed; bottom:2rem; right:2rem; z-index:9999;
    background:rgba(139,0,0,0.9); color:#f5e4a0;
    font-family:'Cinzel',serif; font-size:0.85rem;
    padding:0.8rem 1.5rem; border-radius:3px;
    border:1px solid rgba(201,168,76,0.4);
    box-shadow:0 0 20px rgba(139,0,0,0.5);
    animation: fadeInOut 3s ease forwards;
  `;
  toast.textContent = msg;

  const style = document.createElement('style');
  style.textContent = `@keyframes fadeInOut {
    0%{opacity:0;transform:translateY(10px)}
    15%{opacity:1;transform:translateY(0)}
    75%{opacity:1}
    100%{opacity:0}
  }`;
  document.head.appendChild(style);
  document.body.appendChild(toast);
  setTimeout(() => toast.remove(), 3000);
}

// WhatsApp Share Bar
function initWAShareBar() {
  var bar = document.getElementById('wa-share-bar');
  var btn = document.getElementById('wa-share-btn');
  var closeBtn = document.getElementById('wa-close-btn');
  if (!bar || !btn) return;

  var dismissed = sessionStorage.getItem('wa_bar_dismissed');
  var shown = false;
  var isDesktop = window.innerWidth >= 769;

  function buildWAUrl() {
    var url = (typeof KB_PAGE_URL !== 'undefined') ? KB_PAGE_URL : window.location.href;
    var text = (typeof KB_SHARE_TEXT !== 'undefined') ? KB_SHARE_TEXT : 'काल भैरव की जय! जानें:';
    return 'https://wa.me/?text=' + encodeURIComponent(text + ' ' + url);
  }

  function showBar() {
    if (!shown) {
      bar.classList.add('visible');
      btn.href = buildWAUrl();
      shown = true;
    }
  }

  // Desktop: always show immediately
  if (isDesktop) {
    showBar();
  } else {
    // Mobile: show after scrolling 40%, respect dismiss
    if (!dismissed) {
      window.addEventListener('scroll', function() {
        var scrollPct = (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
        if (scrollPct > 40) showBar();
      }, { passive: true });
    }
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', function() {
      bar.classList.remove('visible');
      sessionStorage.setItem('wa_bar_dismissed', '1');
      dismissed = true;
    });
  }

  // Also update href on click in case lang changed
  btn.addEventListener('click', function() {
    this.href = buildWAUrl();
  });
}

// Track WA share bar visibility so aarti CTA can stack above it
function initWABarTracking() {
  var bar = document.getElementById('wa-share-bar');
  if (!bar) return;
  function sync() {
    document.body.classList.toggle('wa-bar-visible', bar.classList.contains('visible'));
  }
  sync();
  var observer = new MutationObserver(sync);
  observer.observe(bar, { attributes: true, attributeFilter: ['class'] });
}

// Aarti Live CTA bar — mobile prominence for the live darshan feature
function initAartiCTA() {
  var bar = document.getElementById('aarti-cta-bar');
  if (!bar || document.body.classList.contains('page-mandir')) return;
  var textEl = bar.querySelector('.aarti-cta-text');
  var countEl = bar.querySelector('.aarti-cta-countdown');
  var timeEl  = bar.querySelector('.cta-clock-time');
  if (!textEl) return;

  var MORNING_MIN  = 6 * 60;       // 6:00 AM IST
  var EVENING_MIN  = 19 * 60;      // 7:00 PM IST
  var DURATION_MIN = 8;
  var SOON_MIN     = 30;

  function getIST() {
    var now = new Date();
    var utc = now.getTime() + (now.getTimezoneOffset() * 60000);
    return new Date(utc + (5.5 * 3600000));
  }

  function computeState() {
    var ist = getIST();
    var nowSec     = ist.getHours() * 3600 + ist.getMinutes() * 60 + ist.getSeconds();
    var morningSec = MORNING_MIN * 60;
    var eveningSec = EVENING_MIN * 60;
    var durSec     = DURATION_MIN * 60;
    var soonSec    = SOON_MIN * 60;

    if (nowSec >= morningSec && nowSec < morningSec + durSec) {
      return { state:'live', secsLeft: morningSec + durSec - nowSec };
    }
    if (nowSec >= eveningSec && nowSec < eveningSec + durSec) {
      return { state:'live', secsLeft: eveningSec + durSec - nowSec };
    }
    var secsToNext;
    if (nowSec < morningSec)         secsToNext = morningSec - nowSec;
    else if (nowSec < eveningSec)    secsToNext = eveningSec - nowSec;
    else                             secsToNext = (86400 - nowSec) + morningSec;
    var nextIsMorning = (nowSec < morningSec) || (nowSec >= eveningSec);

    if (secsToNext <= soonSec) return { state:'soon', secsToNext: secsToNext, nextIsMorning: nextIsMorning };
    return { state:'idle', secsToNext: secsToNext, nextIsMorning: nextIsMorning };
  }

  function isHi() { return localStorage.getItem('kb_lang') === 'hi'; }

  function buildText(s) {
    var hi = isHi();
    if (s.state === 'live') return hi ? 'आरती लाइव — दर्शन करें' : 'LIVE: Aarti darshan happening now';
    if (s.state === 'soon') return hi ? 'आरती शुरू हो रही है' : 'Aarti starting soon';
    if (s.nextIsMorning) return hi ? 'अगली आरती: सुबह 6 बजे' : 'Next aarti: 6 AM';
    return hi ? 'अगली आरती: शाम 7 बजे' : 'Next aarti: 7 PM';
  }

  function pad(n) { return n < 10 ? '0' + n : '' + n; }
  function formatCountdown(secs) {
    var h = Math.floor(secs / 3600);
    var m = Math.floor((secs % 3600) / 60);
    var s = secs % 60;
    return (h > 0 ? pad(h) + ':' : '') + pad(m) + ':' + pad(s);
  }

  function update() {
    var s = computeState();
    bar.classList.remove('state-live','state-soon','state-idle');
    bar.classList.add('state-' + s.state);
    textEl.textContent = buildText(s);
    if (countEl) {
      if (s.state === 'live') {
        countEl.setAttribute('hidden', '');
      } else {
        if (timeEl) timeEl.textContent = formatCountdown(s.secsToNext);
        countEl.removeAttribute('hidden');
      }
    }
    bar.classList.add('visible');
    document.body.classList.add('aarti-cta-active');
  }

  update();
  setInterval(update, 1000);
}

// Init on DOM ready
document.addEventListener('DOMContentLoaded', function() {
  generateFlames();
  initScrollReveal();
  initDonation();
  initWAShareBar();
  initWABarTracking();
  initAartiCTA();
});
