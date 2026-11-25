/* ==========================================================================
   WaliGenerasi — Smooth Scroll & Animasi
   Lenis + GSAP + ScrollTrigger
   ========================================================================== */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var isMobile = window.matchMedia('(max-width: 768px)').matches;

  // Jika pengguna memilih mengurangi animasi, biarkan halaman tampil statis.
  // Jika GSAP/ScrollTrigger gagal dimuat, jangan sembunyikan elemen apa pun.
  if (reduceMotion) return;
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.config({ ignoreMobileResize: true });

  /* ----------------------------------------------------------------------
     1. SMOOTH SCROLLING (LENIS) + SINKRONISASI SCROLLTRIGGER
     ---------------------------------------------------------------------- */
  var lenis = null;

  if (typeof Lenis !== 'undefined') {
    lenis = new Lenis({
      duration: 1.1,
      smoothWheel: true
    });

    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add(function (time) {
      lenis.raf(time * 1000);
    });

    gsap.ticker.lagSmoothing(0);
  }

  /* ----------------------------------------------------------------------
     2. ANCHOR LINK → LENIS.SCROLLTO()
     ---------------------------------------------------------------------- */
  function getHeaderOffset() {
    var header = document.querySelector('.site-header');
    return header ? Math.round(header.getBoundingClientRect().height) + 28 : 0;
  }

  if (lenis) {
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
      link.addEventListener('click', function (event) {
        if (
          event.defaultPrevented ||
          event.button !== 0 ||
          event.metaKey ||
          event.ctrlKey ||
          event.shiftKey ||
          event.altKey
        ) {
          return;
        }

        var hash = link.getAttribute('href');
        var target = hash && hash.length > 1 ? document.getElementById(hash.slice(1)) : null;

        // Biarkan browser menangani anchor yang tidak memiliki tujuan valid.
        if (hash !== '#' && !target) return;

        event.preventDefault();

        lenis.scrollTo(target || 0, {
          offset: target ? -getHeaderOffset() : 0,
          duration: 1.1
        });

        // Skip-link tetap memindahkan fokus keyboard ke konten utama.
        if (target && link.classList.contains('skip-link')) {
          if (!target.hasAttribute('tabindex')) target.setAttribute('tabindex', '-1');
          target.focus({ preventScroll: true });
        }

        if (hash !== '#') {
          try {
            history.pushState(null, '', hash);
          } catch (error) {
            /* Abaikan bila riwayat URL tidak dapat diperbarui (mis. file://). */
          }
        }
      });
    });
  }

  /* ----------------------------------------------------------------------
     3. ENTRANCE ANIMATION — HERO
     ---------------------------------------------------------------------- */
  var heroItems = gsap.utils.toArray('.hero__title, .hero__desc, .hero .btn');

  if (heroItems.length) {
    gsap.from(heroItems, {
      autoAlpha: 0,
      y: 24,
      duration: 0.8,
      stagger: 0.15,
      ease: 'power2.out',
      clearProps: 'transform,opacity,visibility'
    });
  }

  /* ----------------------------------------------------------------------
     4. SCROLL REVEAL — JUDUL SECTION, KARTU, & KONTEN DI BAWAH HERO
     ---------------------------------------------------------------------- */
  var revealSelector = [
    '.network-cta .section-title',
    '.network-cta .section-lead',
    '.network-cta .btn-row',
    '.about__header .section-title',
    '.about__story p',
    '.metric-item',
    '.programs-overview .section-head',
    '.program-card',
    '.detail-row',
    '.location .section-title',
    '.location__address-card',
    '.location__info > .btn',
    '.location__frame'
  ].join(',');

  ScrollTrigger.batch(revealSelector, {
    start: 'top 85%',
    once: true,
    interval: 0.12,
    batchMax: isMobile ? 3 : 6,
    onEnter: function (batch) {
      gsap.fromTo(
        batch,
        {
          y: isMobile ? 20 : 28,
          autoAlpha: 0
        },
        {
          y: 0,
          autoAlpha: 1,
          duration: isMobile ? 0.55 : 0.7,
          stagger: isMobile ? 0.06 : 0.09,
          ease: 'power2.out',
          overwrite: true,
          clearProps: 'transform,opacity,visibility'
        }
      );
    }
  });

  // Segarkan posisi trigger setelah gambar/font selesai dimuat.
  window.addEventListener('load', function () {
    ScrollTrigger.refresh();
  }, { once: true });
})();
