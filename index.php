<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WaliGenerasi - Direktori Pendidikan Ponpes WALI</title>
  
  <!-- Font Google Sans Flex -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- ================= FLOATING NAVBAR ================= -->
  <header class="site-header">
    <div class="site-header__wrap">
      <a href="#" class="brand">
        <img src="assets/images/logo-waligenerasi.png" alt="Logo WaliGenerasi" class="brand__logo" onerror="this.src='assets/images/image0.png'">
        <span class="brand__name">WaliGenerasi</span>
      </a>

      <!-- Tombol Hamburger Mobile -->
      <button class="nav-toggle" id="navToggle" aria-label="Buka Menu Navigasi">
        <span></span>
        <span></span>
        <span></span>
      </button>

      <nav class="site-nav" id="siteNav">
        <a href="#" class="site-nav__link">Beranda</a>
        <a href="#tentang-kami" class="site-nav__link">Tentang Kami</a>
        <a href="#unit-pendidikan" class="site-nav__link">Program Belajar</a>
        <a href="#lokasi" class="site-nav__link">Lokasi</a>
        <a href="#kontak" class="site-nav__link">Kontak</a>
      </nav>
    </div>
  </header>

  <main>
    <!-- ================= HERO ================= -->
    <section class="hero">
      <img src="assets/images/hero-pesantren-wali.png" alt="Pondok Pesantren WALI" class="hero__image" onerror="this.src='assets/images/vector-1-10.png'">
      <div class="hero__overlay"></div>
      
      <div class="container hero__container">
        <div class="hero__content">
          <span class="hero__badge">Pondok Pesantren WALI</span>
          <h1 class="hero__title">Direktori Resmi Pendidikan Santri</h1>
          <p class="hero__tagline">Beradab, Berkitab, Digital</p>
          <p class="hero__desc">
            Pusat informasi kelembagaan, jenjang belajar klasikal, serta profil warga belajar Pondok Pesantren WALI Tuntang, Kabupaten Semarang.
          </p>
          <div class="hero__actions">
            <a href="#unit-pendidikan" class="btn btn--primary">Lihat Program Belajar</a>
            <a href="#tentang-kami" class="btn btn--secondary">Tentang Pesantren</a>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= JARINGAN RESMI ================= -->
    <section class="network-cta">
      <div class="container text-center">
        <h2 class="section-title">Jaringan Resmi Lembaga</h2>
        <p class="section-lead">
          Kunjungi portal resmi Pondok Pesantren WALI untuk informasi warta pesantren, pendaftaran santri baru, dan artikel turats.
        </p>
        <div class="btn-row">
          <a href="https://ponpeswali.org" target="_blank" rel="noopener noreferrer" class="btn btn--dark">
            Kunjungi ponpeswali.org &rarr;
          </a>
        </div>
      </div>
    </section>

    <!-- ================= TENTANG KAMI ================= -->
    <section id="tentang-kami" class="about">
      <div class="container">
        <div class="about__header">
          <span class="eyebrow">Profil Singkat</span>
          <h2 class="section-title">Pondok Pesantren WALI</h2>
        </div>

        <div class="about__body">
          <div class="about__story">
            <p>
              Pondok Pesantren WALI (Wakaf Literasi Islam Indonesia) didirikan di Dusun Candirejo, Kecamatan Tuntang, Kabupaten Semarang. Pesantren ini lahir sebagai ikhtiar menyatukan dua pilar keilmuan: kedalaman kajian turats kitab kuning serta keterampilan teknologi digital.
            </p>
            <p>
              Dengan sistem pembinaan berasrama 24 jam penuh, para santri dididik mengedepankan adab harian islami, kemandirian hidup, serta pemahaman dalil Ahlussunnah wal Jama'ah yang bersanad.
            </p>
          </div>

          <!-- Statistik Dinamis dari Database -->
          <div class="about__metrics">
            <?php
            $query_stat = mysqli_query($conn, "SELECT * FROM statistik");
            while ($stat = mysqli_fetch_assoc($query_stat)) {
            ?>
              <div class="metric-item">
                <span class="metric-item__num"><?= htmlspecialchars($stat['nilai']); ?></span>
                <span class="metric-item__txt"><?= htmlspecialchars($stat['label']); ?></span>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <!-- ================= DAFTAR UNIT PENDIDIKAN ================= -->
    <section id="unit-pendidikan" class="programs-overview">
      <div class="container">
        <div class="section-head text-center">
          <span class="eyebrow">Jenjang Pendidikan</span>
          <h2 class="section-title">Daftar Unit Belajar</h2>
          <p class="section-lead">Pilihan unit pendidikan formal dan non-formal di lingkungan Pondok Pesantren WALI.</p>
        </div>

        <!-- Kartu Unit Dinamis dari Database -->
        <div class="programs-grid">
          <?php
          $query_unit = mysqli_query($conn, "SELECT * FROM unit_pendidikan");
          while ($unit = mysqli_fetch_assoc($query_unit)) {
          ?>
            <article class="program-card">
              <div class="program-card__body">
                <h3 class="program-card__title"><?= htmlspecialchars($unit['nama']); ?></h3>
                <p class="program-card__text"><?= htmlspecialchars($unit['deskripsi_singkat']); ?></p>
              </div>
              <div class="program-card__media">
                <img src="<?= htmlspecialchars($unit['gambar']); ?>" alt="<?= htmlspecialchars($unit['nama']); ?>" class="program-card__thumb">
              </div>
              <div class="program-card__footer">
                <a href="#detail-<?= htmlspecialchars($unit['kode']); ?>" class="inline-link">Lihat Detail Program &rarr;</a>
              </div>
            </article>
          <?php } ?>
        </div>
      </div>
    </section>

    <!-- ================= RINCIAN PROGRAM ================= -->
    <section class="programs-detail">
      <div class="container">

        <!-- Detail KMI -->
        <article id="detail-kmi" class="detail-row">
          <div class="detail-row__media">
            <img src="assets/images/detail-kmi.png" alt="Kegiatan Santri KMI" class="detail-row__img" onerror="this.src='assets/images/image5.png'">
          </div>
          <div class="detail-row__content">
            <span class="eyebrow">Jenjang Menengah</span>
            <h3 class="detail-row__title">Kulliyyatul Mu'allimin al-Islamiyah (KMI)</h3>
            <p class="detail-row__desc">
              Program klasikal berdurasi 4 hingga 6 tahun yang mengutamakan disiplin bahasa, pembiasaan ibadah berjamaah, dan pendalaman materi diniyah terstruktur. Santri dilatih mandiri mengurus kebutuhan sehari-hari dalam iklim asrama yang guyub dan terpantau.
            </p>
          </div>
        </article>

        <!-- Detail Diniyah -->
        <article id="detail-diniyah" class="detail-row detail-row--reverse">
          <div class="detail-row__media">
            <img src="assets/images/detail-diniyah.png" alt="Santri Diniyah Berdiskusi" class="detail-row__img" onerror="this.src='assets/images/image6.png'">
          </div>
          <div class="detail-row__content">
            <span class="eyebrow">Kajian Turats</span>
            <h3 class="detail-row__title">Madrasah Diniyah WALI (Program Reguler)</h3>
            <p class="detail-row__desc">
              Mengakomodasi santri reguler untuk mengaji kitab fiqih, akhlak, tajwid, dan tauhid. Di samping pengajian weton dan sorogan, santri diarahkan untuk memanfaatkan gawai secara produktif dalam membuat konten edukasi yang berfaedah.
            </p>
          </div>
        </article>

        <!-- Detail Pesma -->
        <article id="detail-pesma" class="detail-row">
          <div class="detail-row__media">
            <img src="assets/images/detail-pesma.png" alt="Diskusi Mahasiswa Santri" class="detail-row__img" onerror="this.src='assets/images/image7.png'">
          </div>
          <div class="detail-row__content">
            <span class="eyebrow">Pendidikan Tinggi</span>
            <h3 class="detail-row__title">Pesantren Mahasiswa WALI</h3>
            <p class="detail-row__desc">
              Diperuntukkan bagi mahasiswa aktif. Menjadi tempat berteduh spiritual di tengah rutinitas perkuliahan dengan kurikulum malam hari yang fleksibel, pembinaan kepemimpinan, dan kerja nyata di unit wakaf produktif pesantren.
            </p>
          </div>
        </article>

        <!-- Detail TPQ -->
        <article id="detail-tpq" class="detail-row detail-row--reverse">
          <div class="detail-row__media">
            <img src="assets/images/detail-tpq.png" alt="Pembelajaran Al-Qur'an TPQ" class="detail-row__img" onerror="this.src='assets/images/image8.png'">
          </div>
          <div class="detail-row__content">
            <span class="eyebrow">Pendidikan Usia Dini</span>
            <h3 class="detail-row__title">Taman Pendidikan Al-Qur’an (TPQ) WALI</h3>
            <p class="detail-row__desc">
              Fokus pada kelancaran makharijul huruf dan tajwid praktis menggunakan metode pengajaran ramah anak, diiringi pengenalan adab kepada orang tua, guru, dan teman sebaya.
            </p>
          </div>
        </article>

      </div>
    </section>

    <!-- ================= LOKASI ================= -->
    <section id="lokasi" class="location">
      <div class="container location__wrap">
        <div class="location__info">
          <span class="eyebrow">Lokasi Pesantren</span>
          <h2 class="section-title">Kunjungan &amp; Alamat</h2>
          
          <div class="location__address-card">
            <p class="location__address">
              Jl. Mertokusumo No. 99, Candirejo, Kec. Tuntang, Kabupaten Semarang, Jawa Tengah 50773
            </p>
          </div>

          <a href="https://maps.google.com/?q=Pondok+Pesantren+WALI+Tuntang+Semarang" target="_blank" rel="noopener noreferrer" class="btn btn--primary">
            Petunjuk Arah Google Maps &rarr;
          </a>
        </div>

        <div class="location__frame">
          <iframe 
            src="https://maps.google.com/maps?q=Pondok+Pesantren+WALI+Candirejo+Tuntang+Semarang&t=&z=15&ie=UTF8&iwloc=&output=embed"
            title="Peta Lokasi Ponpes WALI"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </section>
  </main>

  <!-- ================= FOOTER ================= -->
  <footer id="kontak" class="site-footer">
    <div class="container site-footer__wrap">
      <div class="site-footer__main">
        <div class="brand">
          <img src="assets/images/logo-waligenerasi.png" alt="Logo WaliGenerasi" class="brand__logo" onerror="this.src='assets/images/image0.png'">
          <span class="brand__name">WaliGenerasi</span>
        </div>
        <p class="site-footer__about">
          Situs direktori data warga belajar dan unit pendidikan terpadu Pondok Pesantren WALI.
        </p>

        <!-- Media Sosial Resmi Ponpes WALI -->
        <div class="social-links">
          <!-- Instagram -->
          <a href="https://www.instagram.com/ponpeswali/" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Instagram Ponpes WALI">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <!-- YouTube -->
          <a href="https://www.youtube.com/@mediawali804" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="YouTube Ponpes WALI">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
              <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.5 12 3.5 12 3.5s-7.505 0-9.377.55a3.016 3.016 0 0 0-2.122 2.136C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.55 9.376.55 9.376.55s7.505 0 9.377-.55a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
            </svg>
          </a>
          <!-- Facebook -->
          <a href="https://www.facebook.com/share/19SJMVmUUv/" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Facebook Ponpes WALI">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </a>
          <!-- TikTok -->
          <a href="https://www.tiktok.com/@ponpeswali?_r=1&_t=ZS-9BBjhyDm0CS" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="TikTok Ponpes WALI">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
              <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.24 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/>
            </svg>
          </a>
        </div>
      </div>

      <div class="site-footer__nav-grid">
        <div class="footer-col">
          <h4 class="footer-col__title">Menu Utama</h4>
          <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="#tentang-kami">Tentang Kami</a></li>
            <li><a href="#unit-pendidikan">Program Belajar</a></li>
            <li><a href="#lokasi">Lokasi</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="footer-col__title">Unit Pendidikan</h4>
          <ul>
            <li><a href="#detail-kmi">KMI WALI</a></li>
            <li><a href="#detail-diniyah">Madrasah Diniyah</a></li>
            <li><a href="#detail-pesma">Pesantren Mahasiswa</a></li>
            <li><a href="#detail-tpq">TPQ WALI</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="footer-col__title">Tautan Resmi</h4>
          <ul>
            <li><a href="https://ponpeswali.org" target="_blank" rel="noopener noreferrer">Portal ponpeswali.org</a></li>
            <li><a href="#lokasi">Peta Lokasi</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Script Menu Hamburger Mobile -->
  <script>
    const navToggle = document.getElementById('navToggle');
    const siteNav = document.getElementById('siteNav');

    navToggle.addEventListener('click', () => {
      siteNav.classList.toggle('is-active');
      navToggle.classList.toggle('is-active');
    });

    document.querySelectorAll('.site-nav__link').forEach(link => {
      link.addEventListener('click', () => {
        siteNav.classList.remove('is-active');
        navToggle.classList.remove('is-active');
      });
    });
  </script>

</body>
</html>