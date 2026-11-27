# WaliGenerasi — Direktori Digital Pondok Pesantren WALI

Website profil dan direktori resmi untuk **Pondok Pesantren WALI** yang menyajikan informasi unit pendidikan, program belajar, profil lembaga, serta akses navigasi lokasi secara responsif dan interaktif.

## Fitur Utama
* **Desain Responsif & Modern:** Tampilan adaptif untuk perangkat desktop, tablet, maupun ponsel dengan tipografi yang terukur dan bersih.
* **Animasi & Smooth Scrolling:** Menggunakan **Lenis** untuk pengalaman gulir halaman yang halus dan **GSAP (ScrollTrigger)** untuk animasi transisi elemen saat layar digulir.
* **Direktori Unit Belajar:** Informasi ringkas mengenai program pendidikan formal dan non-formal (seperti KMI, Diniyah, dan unit belajar lainnya).
* **Akses Lokasi & Kontak:** Integrasi peta lokasi dan navigasi cepat ke informasi pendaftaran maupun jaringan resmi lembaga.

## Teknologi yang Digunakan
* **HTML5** — Struktur semantik halaman web.
* **CSS3** — Tata letak menggunakan CSS Grid, Flexbox, variabel CSS (`:root`), dan efek *glassmorphism*.
* **JavaScript (Vanilla)** — Interaktivitas navigasi mobile dan kontrol animasi.
* **GSAP & ScrollTrigger** — Mesin animasi elemen halaman.
* **Lenis** — *Smooth scroll library* ringan.
* **Vercel** — Platform *deployment* dan *hosting* statis.

## Struktur Proyek
```text
WaliGenerasi/
├── assets/
│   ├── css/
│   │   └── style.css       # Gaya utama, variabel tema, & responsivitas
│   ├── images/             # Aset gambar hero, kartu program, dan ikon
│   └── js/
│       └── main.js         # Inisialisasi Lenis, GSAP ScrollTrigger, & navigasi
├── index.html              # Halaman utama website
└── README.md               # Dokumentasi proyek
