# 🎓 Kampus LSP

**Aplikasi Kampus LSP** adalah platform web yang dikembangkan untuk mendukung kegiatan Lembaga Sertifikasi Profesi (LSP) dengan fokus pada manajemen data dan proses asesmen.



[Image of a clean, modern web application dashboard with a purple and white color scheme]


---

## 🛠️ Tech Stack

Proyek ini dibangun menggunakan teknologi *full-stack* modern:

| Kategori | Teknologi | Deskripsi |
| :--- | :--- | :--- |
| **Backend** | **Laravel 11** | Framework PHP yang elegan untuk pengembangan aplikasi web yang cepat dan aman. |
| **Frontend** | **Tailwind CSS** | Framework CSS utility-first yang memungkinkan desain antarmuka yang cepat dan kustom. |
| **Database** | **MySQL** | Sistem manajemen basis data relasional yang andal. |

---

## 🚀 Persyaratan Sistem (Requirements)

Pastikan sistem Anda telah memenuhi persyaratan berikut sebelum memulai instalasi:

* **PHP** (Versi terbaru, disarankan 8.x)
* **XAMPP** / **Laragon** / Lingkungan *web server* lain yang mendukung PHP dan MySQL.
* **Composer** (Manajer paket untuk PHP)
* Akses ke **MySQL** Database

---

## 💻 Instalasi Proyek

Ikuti langkah-langkah di bawah ini untuk mengatur dan menjalankan proyek di lingkungan lokal Anda.

### 1. Kloning Repositori

Buka terminal atau Git Bash Anda dan klon proyek dari GitHub:

```
git clone https://github.com/LSP-P1-UMDP-Skema-Pengembang-Web/batch-6-asesor-faris-HuAlvin.git
```
### 2. Cd Ke Project
```
cd batch-6-asesor-faris-HuAlvin
```
### 3. Download Composer
```
composer install
```
### 4. Ubah .env.example sesuai database yang digunakan lalu copy paste menjadi .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lsp         # Ganti dengan nama database Anda
DB_USERNAME=root        # Ganti dengan username database Anda
DB_PASSWORD=            # Ganti dengan password database Anda
```
### 5. Migrate Database
```
php artisan migrate
```
### 6. Jalankan Aplikasi
```
php artisan serv
```
