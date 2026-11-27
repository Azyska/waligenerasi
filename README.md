<div align="center">

# 🕌 WaliGenerasi
**Direktori & Profil Digital Resmi Pondok Pesantren WALI**

[![Live Demo](https://img.shields.io/badge/Live_Demo-pesantrenwali.or.id-12372A?style=for-the-badge&logo=vercel&logoColor=white)](https://pesantrenwali.or.id/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](#teknologi-yang-digunakan)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](#teknologi-yang-digunakan)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](#teknologi-yang-digunakan)
[![GSAP](https://img.shields.io/badge/GSAP-88CE02?style=for-the-badge&logo=greensock&logoColor=black)](#teknologi-yang-digunakan)

*Portal informasi terpadu yang menyajikan profil lembaga, unit pendidikan formal dan non-formal, serta akses navigasi lokasi Pondok Pesantren WALI secara modern, ringan, dan responsif.*

[Kunjungi Website](https://pesantrenwali.or.id/) · [Laporkan Masalah](https://github.com/Azyska/waligenerasi/issues)

</div>

---

## ✨ Fitur Utama

| Fitur | Deskripsi |
| :--- | :--- |
| **📱 Desain Responsif** | Tata letak adaptif untuk layar desktop, tablet, maupun ponsel dengan hierarki tipografi yang nyaman dibaca. |
| **🎞️ Smooth Scroll & Animasi** | Menggunakan **Lenis** untuk guliran halaman yang mulus dan **GSAP (ScrollTrigger)** untuk transisi kemunculan elemen yang presisi. |
| **📚 Direktori Unit Belajar** | Katalog ringkas seluruh jenjang dan unit pendidikan (KMI, Diniyah, serta program unggulan lainnya). |
| **🧭 Navigasi & Lokasi Terpadu** | Akses cepat ke peta lokasi pesantren, kontak pengurus, dan tautan resmi jaringan lembaga. |

---

## 🛠️ Teknologi yang Digunakan

* **HTML5** — Struktur semantik halaman yang ramah aksesibilitas dan SEO.
* **CSS3** — Styling modern berbasis CSS Variables (`:root`), CSS Grid, Flexbox, dan efek *glassmorphism*.
* **JavaScript (Vanilla)** — Pengelolaan menu navigasi mobile dan interaksi antarmuka.
* **GSAP & ScrollTrigger** — Animasi *entrance* dan *scroll-based reveal* berkinerja tinggi.
* **Lenis** — *Smooth scrolling* ringan tanpa membebani performa browser.
* **Vercel** — *Continuous deployment* dan *hosting* statis otomatis dari repositori GitHub.

---

## 📁 Struktur Proyek

```text
WaliGenerasi/
├── assets/
│   ├── css/
│   │   └── style.css       # Variabel tema, komponen UI, dan media queries
│   ├── images/             # Aset visual hero, kartu program, dan ikon
│   └── js/
│       └── main.js         # Konfigurasi Lenis, GSAP ScrollTrigger, & menu mobile
├── index.html              # Halaman utama website
└── README.md               # Dokumentasi repositori
