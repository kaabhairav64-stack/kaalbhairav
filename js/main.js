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

// Init on DOM ready
document.addEventListener('DOMContentLoaded', function() {
  generateFlames();
  initScrollReveal();
  initDonation();
  initWAShareBar();
});
