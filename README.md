# Web Application - Rental Mobil

## Deskripsi
Aplikasi web ini dibuat menggunakan Laravel dan bertujuan untuk memudahkan proses penyewaan mobil secara online. Pengguna dapat mencari mobil, melihat detail mobil, serta melakukan pemesanan dengan sistem yang telah tersedia. Aplikasi ini juga dilengkapi dengan fitur manajemen penyewaan yang memungkinkan admin untuk mengelola data sewa mobil dan status penyewaan.

## Fitur
Fitur yang ada di aplikasi rental mobil ini antara lain:
- **Pencarian Mobil**: Pengguna dapat mencari mobil berdasarkan kriteria seperti jenis mobil, harga, dan lokasi.
- **Pemesanan Mobil**: Pengguna dapat memesan mobil untuk disewa melalui sistem yang ada.
- **Detail Mobil**: Setiap mobil yang tersedia disertai dengan informasi detail mengenai jenis, kapasitas, harga, dan foto.
- **Manajemen Penyewaan**: Admin dapat mengelola data penyewaan mobil, termasuk menambahkan mobil baru, mengedit informasi, dan melihat status sewa.
- **Login dan Registrasi**: Pengguna dan admin dapat membuat akun dan masuk ke dalam sistem.

## Tools dan Teknologi
Aplikasi ini dibangun dengan menggunakan beberapa tools dan teknologi berikut:
- **Laravel Framework**: Framework utama untuk aplikasi web.
- **XAMPP**: Local environment untuk PHP dan MySQL.
- **Composer**: Dependency manager untuk PHP.
- **Visual Studio Code**: Code editor dengan extensions PHP dan Laravel.
- **Git**: Version control untuk melacak perubahan kode.

## Library & Dependensi
Berikut adalah beberapa library dan dependensi yang digunakan dalam proyek ini:
- **Feather Icons**: Ikon ringan untuk UI.
- **Maatwebsite/Laravel-Excel**: Ekspor data ke file Excel.
- **Carbon**: Library untuk manipulasi tanggal.
- **Bootstrap CSS**: Styling dasar.
- **Eloquent ORM**: Untuk manipulasi data database di Laravel.

## Prasyarat
Sebelum menjalankan aplikasi, pastikan Anda sudah menginstal beberapa hal berikut:
- **PHP** (Minimal versi 7.4)
- **Composer** (Untuk manajemen dependensi PHP)
- **MySQL** (Database)

## Langkah-langkah Menjalankan Aplikasi

1. **Clone repository**:
   Clone repository ini ke komputer Anda:
   ```bash
   git clone https://github.com/hilmanardiansyah/rental--mobil.git
   cd repository-name
2.  **Instalasi dependensi**:
     ```bash
    composer install
4.  Konfigurasi file .env: Salin file .env.example menjadi .env:
    ```bash
    cp .env.example .env
5. Generate key aplikasi:
    ```bash
    php artisan key:generate
6. Migrasi database:
    ```bash
   php artisan migrate
7. Menjalankan server:
   ```bash
   php artisan serve
 
  
   


