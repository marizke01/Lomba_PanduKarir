PanduKarir – CI/CD Project Documentation

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

```
Developer → GitHub Repository → GitHub Actions (CI) → Staging → Production
```

---

## Penjelasan Workflow GitHub Actions

Workflow GitHub Actions berada pada folder:

```
.github/workflows/
```

### Tahapan Workflow:

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

---

## Branching Strategy

Proyek ini menerapkan strategi branching yang sederhana dan terstruktur untuk menjaga stabilitas dan kualitas kode.

### Branch Utama

* `main`
  → Branch production (kode stabil dan siap rilis)

### Branch Pendukung
develop/*
Berisi kode pengembangan aktif sebelum dirilis ke production

feature/*
Digunakan untuk pengembangan fitur baru

hotfix/*
Digunakan untuk perbaikan bug kritis pada lingkungan production

**Aturan utama:**

* Tidak melakukan commit langsung ke `main`
* Semua perubahan harus melalui Pull Request
* Pull Request harus lulus CI sebelum merge

---

##  Cara Kerja Deployment Staging & Production

###  Deployment Staging

* Trigger: `push` ke branch `development`
* Tujuan:

  * Testing fitur
  * Validasi integrasi
* Environment: Staging server

###  Deployment Production

* Trigger: `merge` ke branch `main`
* Tujuan:

  * Rilis aplikasi ke pengguna
* Environment: Production server

Deployment dilakukan secara otomatis oleh GitHub Actions untuk menghindari human error.

---

##  Mekanisme Rollback

Untuk mengantisipasi kegagalan deployment, proyek ini menyediakan mekanisme rollback:

1. **Rollback via Git**

   * Kembali ke commit stabil sebelumnya
   * Re-deploy otomatis melalui pipeline

2. **Rollback Manual**

   * Menggunakan backup versi sebelumnya di server
   * Digunakan jika deployment otomatis gagal

Rollback memastikan aplikasi tetap stabil dan meminimalkan downtime.


