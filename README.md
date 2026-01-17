# SkillBridge – CI/CD Project Documentation
# Kelompok Taring Keberuntungan
- Marizke Mega Utami (Ketua) - 2310120023
- Andi Nur Akifah - 2310120003
- Alifa Nur Azizah - 2310120002

## link deploy (Railway)
production(skill-bridge.up.railway.app)
staging(skill-bridge-staging.up.railway.app)

## link youtube
https://youtu.be/EWdRouyLaio?si=8gUdUaOXdh8z0AFW


## Deskripsi Proyek


**PanduKarir** adalah aplikasi berbasis web yang dikembangkan menggunakan **Laravel** untuk membantu pengguna dalam pengelolaan dan pengembangan karier.
Proyek ini menerapkan **CI/CD (Continuous Integration & Continuous Deployment)** menggunakan **GitHub Actions** untuk memastikan proses build, testing, dan deployment berjalan otomatis, konsisten, dan terkontrol.

## Arsitektur CI/CD Pipeline

Arsitektur CI/CD pada proyek ini terdiri dari beberapa tahapan utama:

1. **Source Code Management**
   * Repository dikelola menggunakan **GitHub**
   * Setiap perubahan kode dilakukan melalui branch terpisah

2. **Continuous Integration (CI)**
   * Trigger otomatis saat terjadi `push` atau `pull request`
   * Proses:
     * Install dependencies
     * Menjalankan pengecekan dasar (linting / build Laravel)
     * Menjalankan test (jika tersedia)

3. **Continuous Deployment (CD)**
   * Deployment ke:
     * **Staging** untuk pengujian
     * **Production** untuk rilis final
   * Deployment hanya dilakukan jika proses CI berhasil

**Alur singkat pipeline:**

---

## Penjelasan Workflow GitHub Actions

Workflow GitHub Actions berada pada folder:
 
### Tahapan Workflow

1. **Trigger**
   * `push` ke branch tertentu
   * `pull_request` ke branch utama

2. **Job CI**
   * Checkout repository
   * Setup PHP dan Composer
   * Install dependency Laravel
   * Build aplikasi
   * Menjalankan test (jika ada)

3. **Job CD**
   * Hanya berjalan jika job CI sukses
   * Melakukan deployment ke server staging atau production

Workflow ini memastikan bahwa **kode yang dideploy selalu dalam kondisi valid**.

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
