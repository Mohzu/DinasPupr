# PlantUML Activity Diagrams - SAPA PUPR Garut

Dokumen ini berisi kode source (DSL) PlantUML untuk menggambarkan alur aktivitas (Activity Diagram) pada modul **Live Chat Hybrid dengan Chatbot Gemini AI** pada website Dinas PUPR Kabupaten Garut.

Terdapat dua versi diagram yang disediakan:
1. **Opsi 1: Alur Chatbot Gemini AI (Sederhana)** - Sesuai dengan format dan struktur 3-swimlane pada contoh gambar (Masyarakat, Sistem, Gemini AI).
2. **Opsi 2: Alur Live Chat Hybrid (Lengkap)** - Alur penuh modul yang sesungguhnya (4-swimlane) mencakup penanganan oleh Admin ketika terjadi handover (sesuai implementasi proyek & dokumen skripsi).

---

## 1. Opsi 1: Alur Chatbot Gemini AI (Sederhana)

Diagram ini berfokus pada alur interaksi otomatis 3 pihak seperti pada contoh gambar.

### Kode PlantUML (DSL)
```plantuml
@startuml
skinparam Style strictuml
skinparam DefaultFontName "Arial"
skinparam DefaultFontSize 12

' Konfigurasi warna elemen
skinparam Activity {
    BackgroundColor #FFFFFF
    BorderColor #2C3E50
    ArrowColor #2C3E50
}
skinparam Swimlane {
    BorderColor #BDC3C7
    TitleFontColor #2C3E50
    TitleFontSize 14
    TitleFontStyle bold
}

|Masyarakat Garut|
start
:Buka widget live chat;
:Input pertanyaan;
:Klik "Kirim";

|Sistem|
:Fetch data dari Database PUPR Garut\n(Sebagai Konteks Informasi);
:Siapkan System Prompt & Riwayat Percakapan\nuntuk Gemini AI;

|Gemini AI|
:Proses pertanyaan dengan konteks\ndata Dinas PUPR Garut;
:Generate jawaban;

|Sistem|
:Tampilkan jawaban chatbot\npada widget secara real-time;

|Masyarakat Garut|
:Menerima jawaban;
stop
@endum
```

---

## 2. Opsi 2: Alur Live Chat Hybrid (Lengkap dengan Handover Admin)

Diagram ini merepresentasikan alur sesungguhnya yang ada di dalam aplikasi SAPA PUPR Garut, di mana masyarakat dapat beralih ke petugas (Admin) jika chatbot tidak memberikan jawaban yang memuaskan.

### Kode PlantUML (DSL)
```plantuml
@startuml
skinparam Style strictuml
skinparam DefaultFontName "Arial"
skinparam DefaultFontSize 12

' Konfigurasi warna elemen
skinparam Activity {
    BackgroundColor #FFFFFF
    BorderColor #2C3E50
    ArrowColor #2C3E50
}
skinparam Swimlane {
    BorderColor #BDC3C7
    TitleFontColor #2C3E50
    TitleFontSize 14
    TitleFontStyle bold
}

|Masyarakat Garut|
start
:Buka widget live chat;
:Input identitas (opsional) & pertanyaan;
:Klik "Kirim";

|Sistem|
:Buat/muat sesi percakapan;
:Simpan pesan masyarakat;
:Fetch data website Dinas PUPR Garut;
:Teruskan pertanyaan & riwayat chat ke Gemini AI;

|Gemini AI|
:Proses pertanyaan berdasarkan konteks\ndata Dinas PUPR Garut;
:Generate respons otomatis;

|Sistem|
:Simpan dan tampilkan respons chatbot\nserta tampilkan tombol verifikasi kepuasan;

|Masyarakat Garut|
:Membaca jawaban chatbot;
if (Apakah jawaban membantu?) then (Ya, Selesai)
    |Sistem|
    :Tutup sesi percakapan (Status: closed);
    |Masyarakat Garut|
    stop
else (Tidak, Hubungkan ke Admin)
    |Sistem|
    :Ubah status sesi menjadi "human";
    :Kirim notifikasi handover real-time\nvia Laravel Reverb ke Dashboard Admin;
    
    |Admin Dinas PUPR|
    :Menerima notifikasi di Dashboard;
    :Buka detail sesi & baca riwayat chat;
    repeat
        :Ketik & kirim balasan chat;
        |Sistem|
        :Simpan dan tampilkan balasan admin secara real-time;
        |Masyarakat Garut|
        :Menerima & membaca balasan admin;
        :Kirim respon balik (jika ada);
        |Sistem|
        :Simpan pesan masyarakat;
        |Admin Dinas PUPR|
    repeat while (Apakah pertanyaan selesai ditangani?) is (Belum) not (Ya)
    :Klik tombol "Akhiri Sesi";
    |Sistem|
    :Simpan status sesi sebagai closed;
    |Masyarakat Garut|
    stop
endif
@endum
```

---

## Cara Penggunaan di PlantUML
1. Salin salah satu blok kode `@startuml` sampai `@endum` di atas.
2. Tempelkan ke editor PlantUML favorit Anda:
   * [PlantUML Online Server](http://www.plantuml.com/plantuml)
   * Ekstensi PlantUML di VS Code.
   * Tool visualisasi UML lainnya yang mendukung format teks PlantUML.
