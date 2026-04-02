// KaalBhairav.org - Main JS

// Particle system (sacred flame particles)
(function() {
  const container = document.getElementById('particles');
  if (!container) return;
  const colors = ['#c8922a','#ffd060','#ff8c00','#e8b84b','#c0392b'];
  for (let i = 0; i < 30; i++) {
    const p = document.createElement('div');
    p.className = 'particle';
    p.style.cssText = `
      left:${Math.random()*100}%;
      width:${Math.random()*3+1}px;
      height:${Math.random()*3+1}px;
      background:${colors[Math.floor(Math.random()*colors.length)]};
      animation-duration:${Math.random()*12+8}s;
      animation-delay:${Math.random()*10}s;
      opacity:0;
    `;
    container.appendChild(p);
  }
})();

// Mobile nav toggle
document.getElementById('navToggle')?.addEventListener('click', function() {
  const nav = document.getElementById('mainNav');
  nav.classList.toggle('open');
});

// Donation amount selector
document.querySelectorAll('.donation-amt').forEach(btn => {
  btn.addEventListener('click', function() {
    document.querySelectorAll('.donation-amt').forEach(b => b.classList.remove('selected'));
    this.classList.add('selected');
    const inp = document.querySelector('.donation-input');
    if (inp) inp.value = this.dataset.amount;
  });
});

// Smooth reveal on scroll
const observer = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (e.isIntersecting) {
      e.target.style.opacity = '1';
      e.target.style.transform = 'translateY(0)';
    }
  });
}, { threshold: 0.1 });

document.querySelectorAll('.card, .content-section, .mantra-box, .sacred-box').forEach(el => {
  el.style.opacity = '0';
  el.style.transform = 'translateY(20px)';
  el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  observer.observe(el);
});
