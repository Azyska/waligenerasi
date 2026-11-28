import { animate, hover, press } from "https://cdn.jsdelivr.net/npm/motion@12/+esm";

/* ==========================================================================
   WaliGenerasi — Smooth Scroll & Animasi
   Lenis + GSAP + ScrollTrigger
   ========================================================================== */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Jika pengguna memilih mengurangi animasi, biarkan halaman tampil statis.
  // Jika GSAP/ScrollTrigger gagal dimuat, jangan sembunyikan elemen apa pun.
  if (reduceMotion) return;

  /* ----------------------------------------------------------------------
     MICRO-INTERACTIONS DENGAN MOTION (SPRING PHYSICS)
     ---------------------------------------------------------------------- */
  document.querySelectorAll(".btn").forEach(function (btn) {
    hover(btn, function () {
      animate(btn, { scale: 1.03 }, { type: "spring", stiffness: 400, damping: 22 });
      return function () {
        animate(btn, { scale: 1 }, { type: "spring", stiffness: 400, damping: 25 });
      };
    });

    press(btn, function () {
      animate(btn, { scale: 0.96 }, { type: "spring", stiffness: 500, damping: 25 });
      return function () {
        animate(btn, { scale: 1.03 }, { type: "spring", stiffness: 400, damping: 22 });
      };
    });
  });

  document.querySelectorAll(".program-card").forEach(function (card) {
    var pin = card.querySelector(".program-card__pin");
    if (!pin) return;

    hover(card, function () {
      animate(pin, { scale: 1.35 }, { type: "spring", stiffness: 450, damping: 18 });
      return function () {
        animate(pin, { scale: 1 }, { type: "spring", stiffness: 400, damping: 22 });
      };
    });
  });

  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

  gsap.registerPlugin(ScrollTrigger);
  ScrollTrigger.config({ ignoreMobileResize: true });

  /* ----------------------------------------------------------------------
     0. SEMBUNYIKAN ELEMEN SEBELUM ANIMASI DIBUAT (ANTI-FOUC)
     Semua target disetel tersembunyi lebih dulu, baru ScrollTrigger dibuat.
     Dengan begitu tidak ada elemen yang sempat terlihat lalu berkedip.
     ---------------------------------------------------------------------- */
  var heroItems = gsap.utils.toArray('.hero__title, .hero__desc, .hero .btn');

  if (heroItems.length) {
    gsap.set(heroItems, { autoAlpha: 0, y: 24 });
  }

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
    '.location__frame',
    '.site-footer__main',
    '.site-footer__nav-grid'
  ].join(',');

  var revealElements = gsap.utils.toArray(revealSelector);

  if (revealElements.length) {
    gsap.set(revealElements, { autoAlpha: 0, y: 28 });
  }

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
  if (heroItems.length) {
    gsap.to(heroItems, {
      autoAlpha: 1,
      y: 0,
      duration: 0.8,
      stagger: 0.14,
      ease: 'power2.out',
      clearProps: 'transform,opacity,visibility'
    });
  }

  /* ----------------------------------------------------------------------
     4. SCROLL REVEAL — JUDUL SECTION, KARTU, & FOOTER
     gsap.to() dipakai (bukan gsap.from()) agar nilai awal tidak dihitung
     ulang saat trigger aktif, sehingga tidak menimbulkan flash.
     ---------------------------------------------------------------------- */
  revealElements.forEach(function (el) {
    gsap.to(el, {
      autoAlpha: 1,
      y: 0,
      duration: 0.75,
      ease: 'power2.out',
      clearProps: 'transform,opacity,visibility',
      scrollTrigger: {
        trigger: el,
        start: 'top 92%',
        once: true
      }
    });
  });

  /* ----------------------------------------------------------------------
     5. REFRESH SETELAH HALAMAN & FONT SELESAI DIMUAT
     ---------------------------------------------------------------------- */
  window.addEventListener('load', function () {
    ScrollTrigger.refresh();
  });

  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(function () {
      ScrollTrigger.refresh();
    });
  }
})();
