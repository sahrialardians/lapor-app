# Lapor App

Lapor App adalah sebuah aplikasi layanan publik untuk masyarakat digunakan sebagai pelaporan.

## Fitur

Sebagai pengguna :
- Daftar pengguna
- Membuat laporan
- Melihat progres laporan
- Menghapus laporan

Sebagai admin : 
- Melihat daftar semua laporan pengguna
- Tindak lanjut untuk laporan


## Panduan Singkat Installasi

Aplikasi ini dibangun menggunakan Laravel Framework dan MySQL sebagai database.

Persyaratan
- Menggunakan versi PHP 8.4
- MySQL versi 6
- Composer
- Code editor

Cara Install

Silahkan masuk kedalam directory projek ini :
```bash
cd ./development/lapor-app
```

Ketika sudah masuk dalam directory projek, silahkan sesuai env. variable, fokus pada koneksi database :
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Setelah selesai lanjutkan installasi dengan composer :
```
composer update
composer install
```

Maka local server akan berjalan di http::127.0.0.1:8000

## Dokumentasi
Dokumentasi dapat dilihat diliat di postman collection
