# 🏥 Laravel CRUD Rumah Sakit & Pasien

Project ini merupakan aplikasi CRUD sederhana berbasis **Laravel** yang mencakup fitur autentikasi login dan manajemen data **Rumah Sakit** serta **Pasien**.  
Aplikasi ini dibuat sebagai latihan teknikal untuk mengimplementasikan **relasi antar tabel**, **AJAX delete**, dan **filter dinamis** menggunakan Laravel dan jQuery.

---

## 🚀 Fitur Utama

### 🔐 Login
- Login menggunakan **username**.
- Setelah login, pengguna diarahkan ke halaman **dashboard**.

### 🏥 CRUD Data Rumah Sakit
- Kolom: `ID`, `Nama Rumah Sakit`, `Alamat`, `Email`, `Telepon`
- Fitur:
  - Tambah, Edit, Hapus, dan Lihat data
  - Validasi input form
  - Tombol Hapus menggunakan **AJAX + SweetAlert**

### 👨‍⚕️ CRUD Data Pasien
- Kolom: `ID`, `Nama Pasien`, `Alamat`, `No Telepon`, `ID Rumah Sakit`
- Relasi: `Pasien` → `Rumah Sakit` (**Many-to-One**)
- Fitur:
  - Tambah & Edit di form terpisah
  - Filter berdasarkan Rumah Sakit menggunakan **AJAX**
  - Tombol Hapus menggunakan **SweetAlert + AJAX**



---

## ⚙️ Instalasi

### 1️⃣ Clone Repository
```bash
git clone https://github.com/azzahrasth/laravel_azzahrasth.git
cd laravel_azzahrasth
```

### 2️⃣ Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3️⃣ Konfigurasi .env
Buat file `.env` dan sesuaikan dengan konfigurasi database lokal kamu:
```bash
cp .env.example .env
php artisan key:generate
```

Edit bagian:
```env
DB_DATABASE=db_rumah_sakit
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Migrasi & Seeder
```bash
php artisan migrate --seed
```

### 5️⃣ Jalankan Aplikasi
```bash
php artisan serve
```

Lalu buka di browser:
```
http://127.0.0.1:8000/
```

---

## 🔑 Akun Login Default
| Username | Password |
|-----------|-----------|
| admin     | password123  |

---

## 🧩 Teknologi yang Digunakan
- **Laravel 10**
- **MySQL**
- **Bootstrap 4 (CDN)**
- **jQuery & AJAX**
- **SweetAlert 2**
- **SB Admin 2 Template**

---

## 📄 Lisensi
Proyek ini dilisensikan di bawah [MIT License](LICENSE).
