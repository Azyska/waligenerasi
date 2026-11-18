# WaliGenerasi — Sistem Informasi Direktori Program & Data Warga Belajar Pondok Pesantren WALI

**WaliGenerasi** adalah aplikasi web mandiri dan portal digital terpusat yang dirancang untuk mengelola serta menyajikan informasi ragam jenjang pendidikan dan kelompok warga belajar pada **Pondok Pesantren WALI** (Candirejo, Tuntang, Kabupaten Semarang) secara terstruktur, responsif, dan mudah diakses[cite: 3].

---

## 📋 Latar Belakang & Tujuan

Situs web profil utama Pondok Pesantren WALI sebelumnya berfokus pada publikasi satu arah bagi masyarakat umum[cite: 3]. **WaliGenerasi** dibangun untuk melengkapi kebutuhan tersebut dengan tujuan[cite: 3]:

1. **Sentralisasi Informasi Pendidikan Pesantren**: Menghimpun data profil unit dan program pendidikan ke dalam satu basis data terpusat[cite: 3].
2. **Segmentasi Berdasarkan Kelompok Belajar**: Menyajikan informasi kurikulum, jenjang usia, dan jadwal kegiatan secara spesifik untuk unit **Kulliyyatul Mu'allimin al-Islamiyah (KMI)**, **Madrasah Diniyah**, **Pesantren Mahasiswa**, serta **Taman Pendidikan Al-Qur'an (TPQ)**[cite: 3].
3. **Efisiensi Pengelolaan Konten**: Menyediakan dasbor administrator bagi pengurus pondok untuk memperbarui data program secara *real-time*[cite: 3].

---

## ✨ Fitur Utama

Sistem memisahkan hak akses ke dalam dua modul utama[cite: 4]:

### 1. Modul Antarmuka Publik (Pengunjung)
* **Beranda Profil Ekosistem**: Menampilkan ringkasan unit pendidikan dalam tata letak kartu modular (*Bento Grid*) yang responsif (*mobile-first*) tanpa memerlukan proses login[cite: 4, 6, 7].
* **Rincian Program Belajar**: Memuat detail kurikulum, fokus pembelajaran, jadwal pelaksanaan, serta karakteristik peserta didik pada setiap jenjang[cite: 4, 5].
* **Informasi Lokasi & Jaringan Resmi**: Integrasi peta kunjungan pesantren dan tautan ke portal utama lembaga[cite: 6].

### 2. Modul Antarmuka Pengelola (Administrator)
* **Sistem Autentikasi Pengurus**: Pembatasan akses pengelolaan data menggunakan mekanisme autentikasi berbasis sesi (*username* & *password*)[cite: 4].
* **Manajemen Konten Program (CRUD)**: Pengurus dapat menambah, menampilkan, mengubah, dan menghapus rincian unit pendidikan, kategori peserta, maupun jadwal kegiatan secara berkala[cite: 4, 5].

---

## 🗄️ Rancangan Basis Data (ERD)

Arsitektur data relasional pada sistem terdiri dari empat entitas utama[cite: 5]:
* **`UNIT_PENDIDIKAN`**: Menyimpan data unit (`id_unit`, `nama_unit`, `deskripsi_unit`, `gambar_unit`, `alamat_lokasi`)[cite: 5].
* **`KATEGORI_PESERTA`**: Menyimpan klasifikasi warga belajar (`id_kategori`, `nama_kategori`, `rentang_usia`, `keterangan`)[cite: 5].
* **`ADMIN`**: Menyimpan kredensial pengelola sistem (`id_admin`, `username`, `password`, `nama_lengkap`)[cite: 5].
* **`PROGRAM_PENDIDIKAN`**: Tabel relasional utama yang menghubungkan unit, kategori peserta, dan admin (`id_program`, `id_unit`, `id_kategori`, `id_admin`, `nama_program`, `kurikulum`, `jadwal_pelaksanaan`, `status_pendaftaran`)[cite: 5].

---

## 🛠️ Teknologi yang Digunakan

* **Frontend**: HTML5, CSS3 (Responsive Grid/Flexbox, Google Sans Flex), JavaScript
* **Backend & Database**: PHP / Server-side Logic, MySQL, AJAX & REST API[cite: 7]
* **Pengujian**: *Black-box Testing* untuk validasi navigasi, formulir admin, dan konsistensi antarmuka lintas perangkat[cite: 7]

---

## 🚀 Cara Menjalankan Proyek Secara Lokal

1. **Clone repositori ini:**
   ```bash
   git clone [https://github.com/Azyska/waligenerasi.git](https://github.com/Azyska/waligenerasi.git)