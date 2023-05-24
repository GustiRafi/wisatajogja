# Wonderfullyogyakarta

Selamat datang di Wonderfullyogyakarta, sebuah website yang didedikasikan untuk menjelajahi keindahan Yogyakarta. Temukan berbagai atraksi, cari destinasi wisata berdasarkan nama, jelajahi berdasarkan kategori, dan bagikan pengalaman Anda melalui komentar. Website ini dibangun dengan menggunakan Laravel dan jQuery untuk memastikan pengalaman pengguna yang mulus.

## Fitur

### 1. Pencarian Wisata

Cari destinasi wisata tertentu berdasarkan nama. Cukup masukkan nama tempat yang ingin Anda jelajahi, dan fitur pencarian kami yang kuat akan menampilkan hasil yang relevan.

### 2. Daftar Wisata

Jelajahi daftar lengkap atraksi yang tersedia di Yogyakarta. Temukan berbagai tempat, ketahui tentang fitur uniknya, dan rencanakan itinerary Anda dengan baik.

### 3. Jelajahi berdasarkan Kategori

Mudah menjelajahi berbagai kategori atraksi wisata. Apakah Anda tertarik dengan situs bersejarah, keajaiban alam, atau landmark budaya, website kami memungkinkan Anda untuk menyaring dan menjelajahi atraksi berdasarkan preferensi Anda.

### 4. Detail Tempat Wisata

Dapatkan informasi detail tentang setiap tempat wisata, termasuk harga tiket, jam buka, rute, peta lokasi, fasilitas, deskripsi, dan foto-foto yang memukau. Nikmati pengalaman virtual yang mendekati nyata sebelum Anda mengunjungi destinasi tersebut.

### 5. Sistem Komentar

Bagikan pengalaman dan pandangan Anda dengan meninggalkan komentar pada atraksi tertentu. Berinteraksi dengan pengguna lain, berbagi rekomendasi, dan ciptakan komunitas yang dinamis bagi para pecinta wisata.

## Teknologi yang Digunakan

Wonderfullyogyakarta dibangun menggunakan teknologi berikut:

- Laravel: Framework PHP yang kuat yang memberikan dasar yang kokoh untuk pengembangan web, memastikan skalabilitas, keamanan, dan organisasi kode yang efisien.

- jQuery: Pustaka JavaScript yang cepat, kecil, dan kaya fitur yang menyederhanakan scripting di sisi klien, memudahkan pembuatan halaman web interaktif dan dinamis.

## Instalasi

Untuk menjalankan website Wonderfullyogyakarta secara lokal, ikuti langkah-langkah berikut:

1. Kloning repositori:

   ```
   git clone https://github.com/GustiRafi/wisatajogja.git
   ```

2. Masuk ke direktori proyek:

   ```
   cd wisatajogja
   ```

3. Install dependensi:

   ```
   composer install
   ```

4. Konfigurasi koneksi database di file `.env`:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database_anda
   DB_USERNAME=username_anda
   DB_PASSWORD=password_anda
   ```

5. Jalankan migrasi database:

   ```
   php artisan migrate
   ```

6. Jalankan server pengembangan:

   ```
   php artisan serve
   ```

7. Buka browser web Anda dan
  akses website di `http://localhost:8000`.

## Kontribusi

Kami menyambut kontribusi untuk meningkatkan website Wonderfullyogyakarta. Jika Anda menemukan bug atau memiliki saran untuk perbaikan, silakan buka isu atau ajukan permintaan pull di repositori GitHub kami.

Mari kita bersama-sama membuat Wonderfullyogyakarta menjadi platform yang luar biasa untuk menjelajahi keindahan Yogyakarta!

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).
