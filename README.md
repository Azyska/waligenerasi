<div align="center">

# 🕌 WaliGenerasi
### Sistem Informasi Direktori Program & Pengelolaan Data Warga Belajar Pondok Pesantren WALI

Aplikasi web mandiri dan portal digital terpusat untuk mengelola serta menyajikan informasi ragam jenjang pendidikan dan kelompok warga belajar pada **Pondok Pesantren WALI** secara terstruktur, responsif, dan mudah diakses.

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](#)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](#)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](#)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](#)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](#)

*Proyek Ujian Akhir Semester (UAS) — Mata Kuliah Pemrograman Website*  
**Fakultas Sains dan Teknologi — Universitas Islam Negeri (UIN) Salatiga**

</div>

---

## 📋 Latar Belakang & Tujuan

Situs web profil utama Pondok Pesantren WALI sebelumnya berfokus pada penyajian informasi satu arah bagi masyarakat umum. **WaliGenerasi** hadir sebagai portal digital terpusat untuk menangani tata kelola informasi program pendidikan dan warga belajar internal pondok dengan tujuan:

1. **🗄️ Sentralisasi Informasi Pendidikan Pesantren**: Menghimpun data profil unit dan program pendidikan ke dalam satu basis data terpusat.
2. **🎓 Segmentasi Berdasarkan Kelompok Belajar**: Menyajikan rincian kurikulum, jenjang usia, dan jadwal kegiatan secara spesifik untuk unit:
   - **Pesantren Mahasiswa**
   - **Kulliyyatul Mu'allimin al-Islamiyah (KMI)**
   - **Madrasah Diniyah (Program Reguler)**
   - **Taman Pendidikan Al-Qur'an (TPQ)**
3. **⚡ Efisiensi Pengelolaan Konten**: Menyediakan dasbor administrator bagi pengurus pesantren untuk memperbarui informasi program secara *real-time*.

---

## ✨ Fitur Utama

Sistem memisahkan hak akses ke dalam dua modul fungsional utama:

### 🌐 1. Modul Antarmuka Publik (Pengunjung)
- **Beranda Profil Ekosistem**: Menampilkan ringkasan seluruh jenjang unit pendidikan dalam tata letak kartu modular (*Bento Grid*) yang responsif (*mobile-first*) tanpa memerlukan proses login.
- **Rincian Program Belajar**: Memuat detail kurikulum, fokus pembelajaran, jadwal pelaksanaan, serta karakteristik peserta didik pada setiap jenjang.
- **Informasi Lokasi & Jaringan Resmi**: Tautan kunjungan alamat pesantren dan integrasi ke portal resmi lembaga.

### 🔐 2. Modul Antarmuka Pengelola (Administrator)
- **Sistem Autentikasi Pengurus**: Pembatasan akses pengelolaan basis data menggunakan mekanisme autentikasi berbasis sesi (*username* & *password*).
- **Manajemen Konten Program (CRUD)**: Pengurus dapat menambah, menampilkan, mengubah, dan menghapus rincian unit pendidikan, kategori peserta, maupun jadwal kegiatan secara berkala.

---

## 🗃️ Rancangan Basis Data (ERD)

Arsitektur data relasional pada sistem terdiri dari empat entitas utama:

| Nama Tabel | Deskripsi | Atribut Utama |
| :--- | :--- | :--- |
| **`UNIT_PENDIDIKAN`** | Menyimpan profil unit pendidikan pondok | `id_unit` (PK), `nama_unit`, `deskripsi_unit`, `gambar_unit`, `alamat_lokasi` |
| **`KATEGORI_PESERTA`** | Menyimpan klasifikasi warga belajar | `id_kategori` (PK), `nama_kategori`, `rentang_usia`, `keterangan` |
| **`ADMIN`** | Menyimpan kredensial pengurus/pengelola | `id_admin` (PK), `username`, `password`, `nama_lengkap` |
| **`PROGRAM_PENDIDIKAN`** | Tabel relasional utama penghubung data | `id_program` (PK), `id_unit` (FK), `id_kategori` (FK), `id_admin` (FK), `nama_program`, `kurikulum`, `jadwal_pelaksanaan`, `status_pendaftaran` |

---

## 🛠️ Teknologi & Metodologi

- **🎨 Frontend**: HTML5, CSS3 (Responsive *Bento Grid* / Flexbox, *Mobile-First Design*), JavaScript
- **⚙️ Backend & Database**: PHP (Server-side Logic), MySQL, AJAX & REST API
- **🧪 Pengujian**: *Black-box Testing* untuk memvalidasi tombol navigasi, formulir admin, dan konsistensi tampilan lintas perangkat

---

## 🚀 Cara Menjalankan Proyek Secara Lokal

1. **Clone repositori ini:**
   ```bash
   git clone [https://github.com/Azyska/waligenerasi.git](https://github.com/Azyska/waligenerasi.git)
   cd waligenerasi