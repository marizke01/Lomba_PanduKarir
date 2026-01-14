# PanduKarir – CI/CD Project Documentation

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

Alur singkat pipeline:
