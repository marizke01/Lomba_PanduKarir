# SkillBridge – CI/CD Project Documentation
# Kelompok Taring Keberuntungan
- Marizke Mega Utami (Ketua) - 2310120023
- Andi Nur Akifah - 2310120003
- Alifa Nur Azizah - 2310120002

## Deskripsi Proyek
PanduKarir adalah aplikasi berbasis web yang dikembangkan menggunakan Laravel untuk membantu pengguna dalam pengelolaan dan pengembangan karier. Proyek ini menerapkan CI/CD (Continuous Integration & Continuous Deployment) menggunakan GitHub Actions untuk memastikan proses build, testing, dan deployment berjalan otomatis, konsisten, dan terkontrol.

---

## Arsitektur CI/CD Pipeline
Arsitektur CI/CD pada proyek ini terdiri dari beberapa tahapan utama:

### 1. Source Code Management
- Repository dikelola menggunakan GitHub
- Setiap perubahan kode dilakukan melalui branch terpisah

### 2. Continuous Integration (CI)
Trigger otomatis saat terjadi **push** atau **pull request**

Proses:
- Install dependencies
- Menjalankan pengecekan dasar (build Laravel)
- Menjalankan test (jika tersedia)

### 3. Continuous Deployment (CD)
Deployment ke:
- **Staging** untuk pengujian
- **Production** untuk rilis final

Deployment hanya dilakukan jika proses CI berhasil.

### 4. Alur singkat pipeline:

Developer Push Code
        ↓
GitHub Repository
        ↓
GitHub Actions Trigger
        ↓
Continuous Integration (Build & Test)
        ↓
Continuous Deployment
        ↓
Staging / Production Server

### 5. Cara Menjalankan Proyek Secara Lokal

1. Clone repository: git clone https://github.com/marizke01/Lomba_PanduKarir.git

2. Install dependencies: composer install

3. Copy file environment: cp .env.example .env

4. Generate application key: php artisan key:generate

5. Jalankan migrasi database: php artisan migrate

6. Jalankan server: php artisan serve