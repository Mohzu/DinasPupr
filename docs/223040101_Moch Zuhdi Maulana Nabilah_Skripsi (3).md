## **PENGEMBANGAN MODUL** _**LIVE CHAT HYBRID**_ **DENGAN** _**CHATBOT**_ **GEMINI AI PADA WEBSITE PORTAL INFORMASI DAN PUBLIKASI DINAS PUPR KABUPATEN GARUT** 

## **TUGAS AKHIR** 

Disusun sebagai salah satu syarat untuk kelulusan Program Strata 1, Program Studi Teknik Informatika, Universitas Pasundan Bandung 

Oleh : 

## Moch Zuhdi Maulana Nabilah 

NRP : 223040101 

## **PROGRAM STUDI TEKNIK INFORMATIKA** 

## **FAKULTAS TEKNIK** 

## **UNIVERSITAS PASUNDAN** 

## **BANDUNG** 

**2026** 

# **LEMBAR PENGESAHAN LAPORAN TUGAS AKHIR** 

Telah disetujui dan disahkan Laporan Tugas Akhir, dari : 

Nama : Moch Zuhdi Maulana Nabilah NPM   : 22.304.0101 

Dengan judul : 

**“** PENGEMBANGAN MODUL LIVE CHAT HYBRID DENGAN CHATBOT GEMINI AI PADA WEBSITE PORTAL INFORMASI DAN PUBLIKASI DINAS PUPR KABUPATEN GARUT **”** 

Bandung, 24 April 2026 

Menyetujui, 

Pembimbing Utama 

( Dr. Ayi Purbasari, ST., MT..) 

i 

## **KATA PENGANTAR** 

Puji Syukur penulis panjatkan ke hadirat Allah SWT atas segala nikmat dan kemudahan untuk penulis dapat menyelesaikan Laporan Tugas Akhir yang berjudul "Pengembangan Modul Live Chat Hybrid dengan Chatbot Gemini AI Pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut". Laporan ini merupakan salah satu syarat untuk memperoleh gelar Sarjana pada Program Studi Teknik Informatika, Universitas Pasundan. 

Keberhasilan penyusunan laporan tugas akhir ini tidak akan terwujud tanpa adanya kontribusi dan dukungan dari berbagai pihak. Oleh karena itu, dengan hati yang tulus penulis mengucapkan terima kasih kepada: 

1. Orang tua tercinta dan segenap keluarga besar yang tak pernah lelah memberikan doa restu, semangat, serta pengorbanan baik secara moral maupun finansial. 

2. Ibu Dr. Ayi Purbasari, ST., MT. sebagai pembimbing akademik yang telah memberikan bimbingan, arahan, dan masukan yang sangat berharga selama penyusunan laporan ini. 

3. Seluruh staff di Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut yang telah membantu dan mendukung penulis selama masa kerja praktik berlangsung. 

4. Teman - teman yang telah menjadi partner diskusi dan penyemangat dalam perjalanan akademik ini. 

Penulis menyadari laporan ini belum sempurna dan dengan rendah hati terbuka untuk kritik, koreksi, dan saran dari pembaca. Diharapkan hasil tugas akhir ini dapat bermanfaat bagi penulis dan bagi perkembangan teknologi. 

Bandung,  24 April 2026 

Moch Zuhdi Maulana Nabilah 

ii 

## **DAFTAR ISI** 

LEMBAR PENGESAHAN ................................................................................................................ i KATA PENGANTAR ......................................................................................................................... ii DAFTAR ISI ..................................................................................................................................... iii DAFTAR ISTILAH ........................................................................................................................... v DAFTAR TABEL ............................................................................................................................. vi DAFTAR GAMBAR ....................................................................................................................... vii BAB 1 PENDAHULUAN .............................................................................................................. 1-1 1.1 Latar Belakang ...................................................................................................................... 1-1 1.2 Identifikasi Masalah .............................................................................................................. 1-3 1.3 Tujuan Tugas Akhir ............................................................................................................... 1-3 1.4 Lingkup Tugas Akhir ............................................................................................................ 1-3 1.5 Metodologi Tugas Akhir ....................................................................................................... 1-4 1.6 Sistematika Penulisan Laporan Tugas Akhir ......................................................................... 1-5 BAB 2 KAJIAN PUSTAKA ........................................................................................................... 2-1 2.1 Teori Yang Digunakan ........................................................................................................... 2-1 2.1.1 Website ........................................................................................................................... 2-1 2.1.2 Portal Informasi .............................................................................................................. 2-1 2.1.3 Model Waterfall .............................................................................................................. 2-1 2.1.4 Wawancara ..................................................................................................................... 2-2 2.1.5 Laravel ........................................................................................................................... 2-2 2.1.6 Model-View-Controller (MVC) ..................................................................................... 2-3 2.1.7 MySQL ........................................................................................................................... 2-3 2.1.8 WebSocket ...................................................................................................................... 2-3 2.1.9 Live Chat Hybrid............................................................................................................ 2-4 2.1.10 Chatbot ......................................................................................................................... 2-4 2.1.11 Gemini AI ..................................................................................................................... 2-5 

iii 

2.1.12 Laravel Reverb ............................................................................................................. 2-6 2.1.13 Black Box Testing ........................................................................................................ 2-6 2.2 Penelitian Terdahulu .............................................................................................................. 2-6 BAB 3 SKEMA PENELITIAN ...................................................................................................... 3-1 3.1 Alur Penyelesaian Tugas Akhir ............................................................................................. 3-1 3.2 Perumusan Masalah .............................................................................................................. 3-4 3.2.1 Analisis Masalah ............................................................................................................ 3-4 3.2.2 Solusi Masalah ............................................................................................................... 3-5 3.3 Skema Analisis ...................................................................................................................... 3-6 3.4 Gambaran Produk Tugas Akhir ............................................................................................. 3-7 3.5 Profil Tempat Penelitian ........................................................................................................ 3-7 3.5.1 Visi dan Misi .................................................................................................................. 3-8 KESIMPULAN ................................................................................. **Error! Bookmark not defined.** DAFTAR PUSTAKA ........................................................................................................................ xi LAMPIRAN .................................................................................................................................... xiii 

iv 

## **DAFTAR ISTILAH** 

|**Istilah **|**Keterangan **|
|---|---|
|Website|Website merupakan sekumpulan halaman digital yang saling terhubung dan memuat berbagai jenis<br>informasi, seperti teks, gambar, video, maupun bentuk konten lainnya. Seluruh informasi tersebut dapat<br>diakses secara luas oleh pengguna melalui jaringan internet, tanpa dibatasi oleh lokasi maupun waktu,<br>selama tersedia perangkat dan koneksi yang mendukung|
|Live Chat|Fitur komunikasi berbasis teks secara langsung antara pengguna dan sistem melalui website.|
|Live Chat Hybrid|Kombinasi antara respons otomatis oleh chatbot dan intervensi admin melalui mekanisme handover dalam<br>satu kanal percakapan.|
|Chatbot|Aplikasi komputer yang dirancang untuk berinteraksi dengan manusia melalui media percakapan berbasis<br>teks maupun suara.|
|Handover|Mekanisme pengalihan percakapan dari chatbot kepada admin ketika pertanyaan memerlukan<br>penanganan lebih lanjut.|
|Fishbone|Metode berbentuk tulang ikan yang digunakan untuk menggambarkan analisis masalah dan solusi<br>masalah.|



v 

## **DAFTAR TABEL** 

Tabel 2. 1 Penelitian Terdahulu ....................................................................................................... 2-6 Tabel 3. 1 Alur Penyelesaian Tugas Akhir ...................................................................................... 3-1 Tabel 3. 2 Analisis Masalah ............................................................................................................ 3-4 Tabel 3. 3 Analisis Solusi ................................................................................................................ 3-5 Tabel 3. 4 Skema Analisis ............................................................................................................... 3-7 

vi 

## **DAFTAR GAMBAR** 

Gambar 1. 1 Metodologi Penyelesaian Tugas Akhir ....................................................................... 1-4 Gambar 2. 1 Model Waterfall .......................................................................................................... 2-1 Gambar 3. 1 Fishbone Analisis Masalah ......................................................................................... 3-4 Gambar 3. 2 Fishbone Analisis Solusi ............................................................................................ 3-5 Gambar 3. 3 Skema Analisis ........................................................................................................... 3-6 

vii 

## **BAB 1 PENDAHULUAN** 

## **1.1 Latar Belakang** 

Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut merupakan instansi pemerintah daerah yang berperan dalam pembangunan dan pemeliharaan infrastruktur wilayah. Seiring berkembangnya teknologi informasi, instansi pemerintah memanfaatkan website dan platform digital sebagai sarana penyampaian informasi publik, pelayanan, serta komunikasi dengan masyarakat [MUT24]. Website menjadi salah satu media utama karena mampu menyediakan informasi yang dapat diakses oleh masyarakat kapan saja dan di mana saja. 

Sebagai bagian dari kegiatan Kerja Praktik yang telah dilaksanakan sebelumnya, peneliti telah membangun Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut  yang dirancang untuk menyediakan berbagai fitur seperti profil dinas, berita, pengumuman, dokumen publik, formulir pengaduan, dan formulir kontak sebagai media layanan informasi. Sistem ini telah disesuaikan dengan kebutuhan instansi, namun demikian, hingga penelitian ini dilakukan, website tersebut belum dioperasionalkan secara resmi dan masih berada pada tahap pengembangan, serta berfungsi sebagai media penyampaian informasi satu arah yang belum mendukung komunikasi interaktif secara langsung. 

Kondisi ini mencerminkan permasalahan yang lebih luas terkait keterbatasan saluran komunikasi antara Dinas PUPR Kabupaten Garut dengan masyarakat secara umum. Keterbatasan saluran komunikasi tersebut sempat menjadi perhatian publik melalui sebuah video yang beredar luas di media sosial. Dalam video tersebut, seorang warga mendapati bahwa sama sekali tidak tersedia saluran komunikasi yang dapat dihubungi selain hadir langsung ke kantor, termasuk tidak adanya nomor telepon maupun _hotline_ yang dapat diakses oleh masyarakat. Warga dalam video tersebut secara eksplisit mempertanyakan ketiadaan saluran komunikasi alternatif bagi masyarakat yang berasal dari wilayah jauh seperti Garut Selatan maupun yang sedang berada di luar kota. Merespons video yang beredar luas tersebut, Dinas PUPR Kabupaten Garut kemudian menyediakan WhatsApp _hotline_ dinas sebagai saluran komunikasi bagi masyarakat. 

Meskipun demikian, berdasarkan hasil wawancara dengan petugas pelayanan Dinas PUPR Kabupaten Garut, diketahui bahwa pelayanan informasi kepada masyarakat masih dilakukan secara langsung di kantor maupun melalui media komunikasi seperti WhatsApp hotline dinas. Mekanisme ini memiliki keterbatasan karena respons sangat bergantung pada ketersediaan petugas. Dalam beberapa kondisi, jawaban baru dapat diberikan setelah beberapa jam bahkan 

1-1 

1-2 

hingga keesokan harinya. Selain itu, jumlah petugas yang terbatas menyebabkan pelayanan menjadi kurang optimal, terutama ketika jumlah pertanyaan yang masuk meningkat. Sebagian besar pertanyaan yang diajukan masyarakat juga bersifat berulang, terutama berkaitan dengan persyaratan, prosedur, dan informasi dasar layanan, sehingga petugas harus memberikan jawaban yang sama secara manual berulang kali. 

Kondisi tersebut menunjukkan adanya kesenjangan antara sistem yang tersedia dengan kebutuhan masyarakat akan layanan yang cepat dan interaktif. Masyarakat membutuhkan layanan informasi yang praktis, cepat, dan dapat diakses secara interaktif tanpa harus selalu datang langsung ke kantor atau menunggu balasan dari petugas. Dalam konteks ini, teknologi web memungkinkan penerapan fitur live chat sebagai media komunikasi dua arah dalam satu kanal percakapan. Namun, penerapan live chat secara konvensional tetap bergantung pada ketersediaan sumber daya manusia dan berpotensi menghadapi kendala dalam responsivitas layanan [ANU25]. Di sisi lain, perkembangan teknologi artificial intelligence (AI) memungkinkan sistem memberikan respons otomatis terhadap pertanyaan yang bersifat umum melalui pemanfaatan chatbot. Implementasi chatbot sebagai bagian dari AI dapat meningkatkan kecepatan, akurasi, dan interaktivitas layanan informasi [ALV25]. 

Berdasarkan kondisi tersebut, pendekatan live chat hybrid, yaitu kombinasi antara respons otomatis oleh chatbot dan intervensi admin melalui mekanisme _handover_ , dapat digunakan untuk mendukung komunikasi dua arah serta mengakomodasi keterbatasan sumber daya manusia. Dalam pendekatan ini, chatbot digunakan untuk menangani pertanyaan yang bersifat umum dan berulang, sedangkan pertanyaan yang memerlukan penjelasan lebih spesifik dan tidak dapat dijawab hanya berdasarkan informasi umum dapat dialihkan kepada admin. 

Website Portal Informasi dan Publikasi yang telah dibangun pada kegiatan Kerja Praktik merupakan sistem yang dirancang khusus sesuai dengan kebutuhan Dinas PUPR Kabupaten Garut, sehingga pengembangan fitur pada sistem yang sama dilakukan sebagai bagian dari pengembangan lanjutan terhadap sistem yang telah ada. Integrasi fitur live chat secara langsung pada website yang sudah ada akan memberikan pengalaman yang lebih terpadu bagi masyarakat, karena pengguna dapat mengakses informasi sekaligus berinteraksi dalam satu platform yang sama tanpa harus berpindah ke media komunikasi lain seperti WhatsApp atau datang langsung ke kantor. Dengan demikian, penelitian ini difokuskan pada pengembangan modul _live chat hybrid_ berbasis chatbot Gemini AI pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut sebagai upaya untuk menyediakan mekanisme komunikasi dua arah dalam satu platform layanan informasi. 

1-3 

## **1.2 Identifikasi Masalah** 

Berdasarkan latar belakang penelitian tersebut, berikut adalah permasalahan yang dimunculkan dalam penelitian ini: 

1. Bagaimana menyediakan mekanisme komunikasi dua arah pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut sehingga masyarakat dapat melakukan interaksi secara interaktif serta memperoleh tanggapan terhadap pertanyaan yang diajukan melalui satu kanal percakapan tanpa harus datang ke kantor atau menunggu balasan melalui WhatsApp hotline? 

2. Bagaimana mengembangkan sistem komunikasi berbasis website yang mampu menangani pertanyaan masyarakat yang bersifat umum atau berulang secara otomatis serta menyediakan mekanisme pengalihan percakapan kepada admin ketika pertanyaan memerlukan penanganan lebih lanjut? 

## **1.3 Tujuan Tugas Akhir** 

Berdasarkan poin pada identifikasi masalah, maka dapat diperoleh tujuan dari tugas akhir ini yaitu sebagai berikut: 

1. Mengembangkan modul _live chat hybrid_ pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut menggunakan framework Laravel sehingga masyarakat dapat melakukan interaksi secara langsung melalui satu kanal percakapan tanpa harus datang ke kantor atau menunggu balasan melalui WhatsApp hotline. 

2. Mengintegrasikan Chatbot Gemini AI pada modul _live chat hybrid_ yang mampu menangani pertanyaan masyarakat yang bersifat umum atau berulang secara otomatis serta menyediakan mekanisme pengalihan percakapan kepada admin ketika pertanyaan memerlukan penanganan lebih lanjut. 

## **1.4 Lingkup Tugas Akhir** 

1. Penelitian ini dibatasi pada pengembangan modul _live chat hybrid_ dengan integrasi Chatbot Gemini AI pada Website Portal Informasi dan Publikasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut yang telah dibangun oleh peneliti pada kegiatan Kerja Praktik menggunakan _framework_ Laravel 

2. Modul yang dikembangkan difokuskan sebagai fitur komunikasi dua arah pada website dalam satu kanal percakapan. 

3. Pemanfaatan API Gemini AI dilakukan dengan mengambil konten yang tersedia pada database website sebagai konteks dalam menghasilkan respons chatbot secara otomatis 

1-4 

4. Chatbot dirancang untuk merespons pertanyaan yang berkaitan dengan informasi, sedangkan pertanyaan yang memerlukan penanganan lebih lanjut dapat dialihkan kepada admin melalui mekanisme _handover_ . 

## **1.5 Metodologi Tugas Akhir** 

Dalam proses perancangan hingga pengembangan modul _live chat hybrid_ dengan integrasi Chatbot Gemini AI pada Website Portal Informasi dan Publikasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut akan mengadaptasi model waterfall sebagai metode pengembangan perangkat lunaknya : 

Gambar 1. 1 Metodologi Penyelesaian Tugas Akhir 

Berikut merupakan rincian dari metodologi tugas akhir ini, diantaranya: 

## **1. Identifikasi Masalah** 

Pada tahap ini dilakukan identifikasi terhadap keterbatasan pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut yang belum menyediakan fitur komunikasi dua arah secara langsung dalam satu kanal percakapan. Sistem yang tersedia masih mengandalkan formulir kontak dan formulir pengaduan melalui email sehingga interaksi belum dapat dilakukan secara langsung melalui website. 

## **2. Pengumpulan Data** 

Pada tahap ini dilakukan pengumpulan data melalui studi literatur dan wawancara. Studi literatur dilakukan untuk memperoleh landasan teori terkait layanan informasi publik digital, chatbot berbasis Artificial Intelligence, serta metode pengembangan perangkat lunak. Wawancara dilakukan dengan pihak terkait di Dinas PUPR 

1-5 

Kabupaten Garut untuk memperoleh informasi mengenai mekanisme pelayanan informasi yang berjalan serta kebutuhan sistem. 

**3. Analisis dan Perancangan** 

Pada tahap ini, setelah data terkumpul dilakukan analisis kebutuhan sistem untuk mengidentifikasi fungsi dan kebutuhan yang diperlukan dalam pengembangan fitur komunikasi pada website. Berdasarkan hasil analisis tersebut, selanjutnya dilakukan perancangan modul _live chat hybrid_ yang meliputi perancangan arsitektur sistem berbasis Laravel, perancangan alur interaksi antara pengguna, chatbot Gemini AI, dan admin, perancangan struktur database, serta desain antarmuka pengguna. Perancangan ini bertujuan untuk memastikan bahwa sistem yang dikembangkan mampu mengatasi keterbatasan komunikasi satu arah pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut. 

**4. Implementasi dan Pengujian** 

Pada tahap ini dilakukan proses implementasi sistem berdasarkan hasil perancangan yang telah dibuat pada tahap sebelumnya. Setelah proses implementasi selesai, dilakukan pengujian sistem menggunakan metode Black Box Testing yang berfokus pada pengujian fungsionalitas sistem, meliputi pengujian fitur _live chat_ , respons chatbot terhadap pertanyaan pengguna, serta mekanisme _handover_ percakapan kepada admin. 

**5. Kesimpulan dan Saran** 

Pada tahap ini dilakukan penarikan kesimpulan dari hasil penelitian yang telah dilakukan berdasarkan permasalahan yang telah diidentifikasi, serta penyusunan saran yang dapat menjadi masukan bagi pengembangan dan penelitian selanjutnya. 

## **1.6 Sistematika Penulisan Laporan Tugas Akhir** 

Laporan tugas akhir ini disusun secara sistematis menjadi 6 bab yang berisi sub bab yang dibutuhkan agar laporan tugas akhir tersusun secara terstruktur dan mudah dipahami. Adapun sistematika penulisan laporan tugas akhir ini adalah sebagai berikut: 

## **BAB 1 PENDAHULUAN** 

Bab ini berisi gambaran umum mengenai penelitian yang dilakukan. Pembahasan dalam bab ini meliputi latar belakang penelitian, identifikasi masalah, tujuan penelitian, lingkup penelitian, metodologi tugas akhir, serta sistematika penulisan laporan. 

## **BAB 2 KAJIAN PUSTAKA** 

1-6 

Bab ini memuat uraian mengenai definisi, landasan teori, dan konsep-konsep yang mendukung pelaksanaan tugas akhir. Selain itu, disajikan pula tinjauan terhadap penelitian atau jurnal ilmiah terdahulu yang relevan dan memiliki keterkaitan dengan topik yang dibahas dalam tugas akhir ini. 

## **BAB 3 SKEMA PENELITIAN** 

Bab ini berisi penjelasan mengenai alur penyelesaian tugas akhir, perumusan masalah, skema analisis, gambaran produk tugas akhir, serta profil tempat penelitian 

## **BAB 4 ANALISIS DAN PERANCANGAN** 

Bab ini membahas hasil analisis kebutuhan sistem serta proses perancangan sistem yang akan dikembangkan. Pembahasan meliputi identifikasi kebutuhan sistem, perancangan arsitektur sistem, perancangan database, perancangan alur sistem, serta desain antarmuka pengguna. 

## **BAB 5 IMPLEMENTASI DAN PENGUJIAN** 

Bab ini menjelaskan proses implementasi sistem berdasarkan perancangan yang telah dibuat sebelumnya. Selain itu, pada bab ini juga dibahas proses pengujian sistem untuk memastikan bahwa sistem yang dikembangkan dapat berjalan sesuai dengan kebutuhan yang telah ditentukan. 

## **BAB 6 PENUTUP** 

Bab ini berisi kesimpulan dari hasil penelitian yang telah dilakukan serta saran yang dapat menjadi bahan pertimbangan untuk pengembangan sistem pada penelitian selanjutnya. 

1-7 

## **BAB 2 KAJIAN PUSTAKA** 

Bab Kajian Pustaka berisi uraian mengenai teori – teori dan konsep serta penelitian terdahulu yang relevan dengan penelitian ini. Pembahasan tersebut dijadikan dasar teoritis dalam pengembangan tugas akhir ini. 

## **2.1 Teori Yang Digunakan** 

## **2.1.1 Website** 

Website merupakan sekumpulan halaman digital yang saling terhubung dan memuat berbagai jenis informasi, seperti teks, gambar, video, maupun bentuk konten lainnya. Seluruh informasi tersebut dapat diakses secara luas oleh pengguna melalui jaringan internet, tanpa dibatasi oleh lokasi maupun waktu, selama tersedia perangkat dan koneksi yang mendukung [RAH23]. 

## **2.1.2 Portal Informasi** 

Portal informasi merupakan sebuah sistem terintegrasi yang dirancang untuk menyediakan berbagai informasi kepada masyarakat secara terstruktur dan mudah dijangkau. Dengan hadirnya portal ini, masyarakat dapat mengakses informasi yang diperlukan tanpa harus pergi langsung ke kantor, sehingga meningkatkan efektivitas dan efisiensi dalam pelayanan publik [NAS25]. 

## **2.1.3 Model Waterfall** 

Gambar 2. 1 Model _Waterfall_ 

Model Waterfall menggambarkan pendekatan pengembangan perangkat lunak yang dilakukan secara sistematis dan berurutan, dimulai dari proses penentuan kebutuhan oleh pengguna. Selanjutnya proses pengembangan dilanjutkan melalui tahap perencanaan, perancangan, pembangunan sistem, hingga implementasi, yang kemudian diakhiri dengan dukungan atau pemeliharaan terhadap perangkat lunak yang telah selesai dikembangkan [PRE10]. 

2-1 

2-2 

## **2.1.4 Wawancara** 

Wawancara merupakan teknik pengumpulan data yang digunakan apabila peneliti ingin melakukan studi pendahuluan untuk menemukan permasalahan yang harus diteliti, serta apabila peneliti ingin mengetahui hal-hal dari responden secara lebih mendalam dengan jumlah responden yang relatif sedikit. Teknik ini mendasarkan diri pada _self-report_ atau informasi langsung dari responden mengenai pengalaman, pengetahuan, dan keyakinan pribadi [SUG17]. Dalam penelitian ini, wawancara terstruktur dilakukan secara langsung ( _face to face_ ) dengan stakeholder yang berinteraksi langsung dengan masyarakat dalam pelayanan informasi, yaitu petugas pelayanan dinas PUPR Kabupaten Garut. Wawancara dilakukan untuk memperoleh informasi terkait mekanisme penyampaian informasi kepada masyarakat, jenis pertanyaan yang sering diajukan oleh masyarakat, serta kendala yang dihadapi dalam proses pelayanan informasi yang berkaitan dengan layanan pemerintah daerah, khususnya yang berhubungan dengan Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut. 

Penggunaan wawancara terstruktur dipilih karena: 

1. Penelitian ini bertujuan menggali informasi yang spesifik dan terarah mengenai kebutuhan layanan komunikasi antara masyarakat dan instansi melalui website, serta jenis pertanyaan yang sering diajukan oleh masyarakat. 

2. Jumlah narasumber terbatas dan memiliki pengalaman langsung dalam memberikan pelayanan informasi kepada masyarakat. 

3. Data yang diperoleh digunakan sebagai dasar dalam proses analisis kebutuhan sistem. 

4. Informasi yang dikumpulkan akan dikaitkan langsung dengan proses perancangan modul live chat yang terintegrasi dengan chatbot berbasis Gemini AI pada website portal informasi. 

Dengan demikian, wawancara terstruktur dalam penelitian ini berfungsi sebagai dasar analisis kebutuhan sistem untuk mendukung pengembangan modul _live chat hybrid_ pada Website Portal Informasi dan Publikasi Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut. 

## **2.1.5 Laravel** 

Laravel adalah framework aplikasi web yang menyediakan struktur dasar dengan sintaks yang mudah dipahami dan elegan, sehingga memudahkan pengembang dalam membangun aplikasi tanpa harus terlalu memikirkan detail teknis. _Framework_ ini menawarkan berbagai fitur canggih, seperti dependency injection yang kuat, lapisan abstraksi database yang jelas, sistem antrian dan penjadwalan tugas, serta kemampuan pengujian unit dan integrasi. Laravel dirancang agar cocok digunakan oleh pengembang pemula maupun yang sudah berpengalaman, memungkinkan mereka 

2-3 

untuk terus berkembang dan membangun aplikasi web dengan lebih efisien dan terstruktur. Pendekatan ini sejalan dengan tujuan framework untuk memberikan pengalaman pengembangan yang produktif sekaligus memudahkan pengelolaan aplikasi secara menyeluruh [LAR25]. 

## **2.1.6 Model-View-Controller (MVC)** 

Model-View-Controller (MVC) merupakan arsitektur perangkat lunak yang banyak digunakan dalam pengembangan aplikasi web. Model berfungsi sebagai lapisan yang merepresentasikan data dan berinteraksi langsung dengan basis data melalui kelas Eloquent. View bertugas menyajikan data dalam bentuk halaman web yang dapat dilihat oleh pengguna, dengan memanfaatkan bahasa template Blade untuk mempermudah pembuatan tampilan yang konsisten dan mudah dikelola. Sedangkan Controller bertindak sebagai penghubung antara Model dan View, mengelola logika aplikasi dengan menerima permintaan dari pengguna, melakukan validasi, memproses data, dan mengarahkan hasil ke View yang sesuai. Dengan pembagian tugas yang jelas pada tiap komponen ini, arsitektur MVC mendukung pengembangan aplikasi yang lebih terstruktur, modular, dan mudah dipelihara [HUY22]. 

## **2.1.7 MySQL** 

MySQL adalah sistem manajemen basis data relasional (RDBMS) sumber terbuka yang paling populer di dunia dan berfungsi sebagai repositori data penting untuk berbagai aplikasi perangkat lunak. Basis data menyimpan informasi seperti hasil pencarian web, data akun, dan transaksi untuk diakses kembali di kemudian hari, dan MySQL unggul dalam pengelolaan data tersebut. SQL, atau Structured Query Language, adalah bahasa pemrograman yang digunakan untuk mengambil, memperbarui, menghapus, serta memanipulasi data dalam basis data relasional. MySQL, yang sering diucapkan "My ess-cue-el" atau "my sequel," dirancang untuk menyimpan dan mengelola data terstruktur dalam format tabel yang terorganisir. Selain itu, MySQL kini mendukung tipe data modern seperti JSON, berkat penambahan fitur dari Oracle, sehingga semakin meningkatkan fleksibilitasnya dalam mengelola berbagai jenis data. Sistem ini tidak hanya efisien dalam penyimpanan dan pengelolaan data, tetapi juga menyediakan fitur keamanan, replikasi, dan pemulihan data yang membuatnya andal untuk berbagai kebutuhan aplikasi web dan perangkat lunak lainnya [ORA25]. 

## **2.1.8 WebSocket** 

WebSocket merupakan protokol komunikasi berbasis HTML5 yang memungkinkan pertukaran data secara dua arah ( _full-duplex_ ) antara client dan server dalam satu koneksi yang sama. Berbeda dengan komunikasi berbasis HTTP yang bersifat _request-response_ , WebSocket memungkinkan kedua pihak untuk saling mengirim dan menerima data secara langsung tanpa harus menunggu permintaan terlebih dahulu [EKA24]. 

2-4 

Secara teknis, WebSocket berjalan di atas protokol TCP dan menggunakan koneksi yang bersifat persisten. Proses komunikasi diawali dengan mekanisme _handshake_ antara client dan server, setelah itu koneksi akan tetap terbuka sehingga memungkinkan pertukaran data secara berkelanjutan tanpa perlu membangun koneksi ulang setiap kali terjadi komunikasi [EKA24]. 

Dengan karakteristik tersebut, WebSocket mampu memberikan komunikasi yang lebih cepat dan efisien, terutama dalam sistem yang membutuhkan interaksi secara _real-time_ . Hal ini menjadikan WebSocket sesuai untuk diterapkan pada fitur seperti _live chat_ , karena mampu meningkatkan responsivitas sistem serta memberikan pengalaman interaksi yang lebih optimal bagi pengguna [EKA24] 

## **2.1.9 Live Chat Hybrid** 

Konsep _live chat hybrid_ didasarkan pada pandangan bahwa kecerdasan buatan (AI) dan agen manusia merupakan dua elemen yang saling melengkapi dalam suatu ekosistem layanan, bukan sebagai pihak yang saling bersaing. Dalam konteks ini, chatbot digunakan untuk menangani permintaan dengan volume tinggi dan tingkat kompleksitas rendah guna meningkatkan efisiensi serta skalabilitas layanan [DEC24]. 

Di sisi lain, agen manusia memiliki peran penting dalam menangani interaksi yang memerlukan empati, personalisasi, serta kemampuan adaptif dalam menyelesaikan permasalahan yang lebih kompleks. Dengan demikian, kombinasi antara AI dan manusia memungkinkan pemanfaatan sumber daya yang lebih optimal, sekaligus meningkatkan kualitas pengalaman pengguna yang berdampak pada kepuasan dan loyalitas dalam jangka Panjang [DEC24]. 

## **2.1.10 Chatbot** 

Chatbot merupakan salah satu bentuk pengembangan aplikasi komputer yang dirancang untuk berinteraksi dengan manusia melalui media percakapan, baik dalam bentuk teks maupun suara. Sistem ini dilengkapi dengan teknologi kecerdasan buatan serta pemrosesan bahasa alami yang memungkinkan chatbot memahami dan merespons pertanyaan dari pengguna. Chatbot umumnya dikembangkan untuk membantu manusia dalam berbagai layanan informasi, seperti pelayanan pelanggan ( _customer service_ ), dengan topik tertentu yang telah ditentukan [YUN19]. Dalam penerapannya, chatbot dibedakan menjadi dua pendekatan, yaitu chatbot biasa dan chatbot AI. Meskipun chatbot biasa dapat mengambil data dari database, jawabannya tetap terbatas pada pertanyaan yang sudah ditentukan sebelumnya, sehingga apabila terdapat informasi baru yang belum ditentukan, program chatbot harus diperbarui secara manual agar dapat mengakses informasi 

2-5 

tersebut. Sementara itu, chatbot AI mampu membaca seluruh konten database dan memahami konteksnya secara otomatis, sehingga ketika terdapat informasi baru pada database, chatbot langsung dapat menjawab pertanyaan terkait tanpa perlu perubahan program apapun. Oleh karena itu, dalam penelitian ini digunakan pendekatan chatbot AI mengingat informasi Dinas PUPR Kabupaten Garut mencakup banyak bidang seperti irigasi, jalan, perizinan, dan pengaduan yang variasi pertanyaannya tidak dapat diprediksi sepenuhnya. 

## **2.1.11 Gemini AI** 

Gemini AI merupakan keluarga model kecerdasan buatan generatif yang dikembangkan oleh Google DeepMind. Model ini termasuk dalam kategori _Large Language Model_ (LLM) yang dirancang untuk memahami instruksi dalam bahasa alami serta menghasilkan respons yang relevan berdasarkan konteks yang diberikan oleh pengguna. Dengan kemampuan tersebut, Gemini dapat dimanfaatkan dalam berbagai aplikasi berbasis percakapan digital seperti chatbot dan sistem layanan informasi otomatis [GEM25]. 

Secara teknis, Gemini dibangun menggunakan arsitektur _Transformer_ yang memungkinkan model memahami hubungan antar kata dalam suatu kalimat sehingga dapat menghasilkan respons yang koheren dan sesuai dengan konteks pertanyaan pengguna. Selain itu, Gemini juga dirancang sebagai model _multimodal_ yang mampu memproses berbagai jenis data seperti teks, gambar, audio, dan video secara terintegrasi. Dalam implementasinya, Gemini tersedia dalam beberapa varian model, yaitu Gemini Ultra, Gemini Pro, dan Gemini Nano, yang dikembangkan untuk menangani berbagai tingkat kompleksitas tugas dan kebutuhan komputasi yang berbeda [GEM25]. 

Pemilihan Gemini AI dalam penelitian ini didasarkan pada ketersediaan layanan API resmi yang didukung oleh infrastruktur Google serta kredibilitas Google sebagai perusahaan teknologi yang telah dikenal luas, sehingga memberikan tingkat kepercayaan yang tinggi terhadap kualitas dan keandalan model yang digunakan. Kemampuan Gemini AI dalam memahami konteks percakapan serta menghasilkan respons yang relevan menjadikannya sesuai untuk diterapkan sebagai chatbot pada sistem layanan informasi publik, di mana konten database website dimanfaatkan sebagai konteks dalam menghasilkan respons secara otomatis tanpa perlu pelatihan model secara khusus. Dari sisi pembiayaan, Gemini API menyediakan Free Tier yang memungkinkan penggunaan secara gratis. Meskipun demikian, Free Tier memiliki batasan jumlah permintaan per hari yang perlu diperhatikan apabila sistem dioperasionalkan secara penuh. Untuk itu, Gemini API juga menyediakan Paid Tier dengan harga yang terjangkau, sehingga sistem tetap dapat dikembangkan secara berkelanjutan sesuai dengan kebutuhan operasional di masa mendatang. 

2-6 

## **2.1.12 Laravel Reverb** 

Laravel Reverb merupakan teknologi yang menyediakan komunikasi _real-time_ berbasis WebSocket dengan performa yang cepat dan dapat diskalakan langsung pada aplikasi Laravel. Teknologi ini juga terintegrasi secara mulus dengan fitur _event broadcasting_ yang telah tersedia dalam ekosistem Laravel, sehingga memudahkan pengembang dalam mengelola komunikasi data secara langsung antara server dan pengguna aplikasi [LAR26]. 

## **2.1.13 Black Box Testing** 

_Black Box Testing_ , yang juga dikenal sebagai _behavioural testing_ , merupakan metode pengujian perangkat lunak yang berfokus pada perilaku sistem tanpa memperhatikan struktur atau kode internal program. Pengujian ini dilakukan dengan mengevaluasi kesesuaian antara input yang diberikan dengan output yang dihasilkan oleh sistem. Pendekatan ini digunakan untuk memastikan bahwa setiap fungsi dalam perangkat lunak berjalan sesuai dengan spesifikasi kebutuhan yang telah ditentukan dari sudut pandang pengguna. Selain itu, metode ini memiliki kelebihan karena penguji tidak perlu memiliki pengetahuan khusus mengenai bahasa pemrograman maupun detail implementasi sistem [PUT24]. 

## **2.2 Penelitian Terdahulu** 

Berikut merupakan daftar penelitian-penelitian terdahulu yang mendukung dan memiliki kemiripan dengan tugas akhir ini. 

Tabel 2. 1 Penelitian Terdahulu 

|**No**|**Peneliti**|**Judul Penelitian**|**Hasil Penelitian**|**Relevansi dengan proyek**|
|---|---|---|---|---|
|1|A. Alvin, R.<br>Robet, F.<br>A. Tarigan|Implementasi Chatbot<br>Otomatis Akademik<br>Berbasis Web<br>Menggunakan LLM dan<br>Rule-Based System|Penelitian ini menghasilkan chatbot<br>akademik berbasis web yang mampu<br>menjawab pertanyaan mahasiswa secara<br>otomatis menggunakan kombinasi Large<br>Language Model dan rule-based system<br>untuk meningkatkan efisiensi layanan<br>informasi akademik.|Relevan karena menggunakan<br>pendekatan chatbot berbasis<br>LLM pada sistem web yang<br>serupa dengan penggunaan<br>Gemini AI pada modul live chat<br>dalam penelitian ini.|
|2|S. A.<br>Talaohu et<br>al.|Implementasi LLM Pada<br>Chatbot PMB Universitas<br>Muhammadiyah Sorong<br>Menggunakan Retrieval-<br>Augmented Generation|Sistem chatbot berbasis LLM mampu<br>memberikan jawaban yang kontekstual<br>terhadap pertanyaan pengguna dengan<br>tingkat usability sebesar 88,5% sehingga<br>meningkatkan kualitas layanan informasi<br>bagi pengguna.|Penelitian ini menunjukkan<br>bahwa teknologi LLM dapat<br>digunakan untuk memberikan<br>layanan informasi secara<br>otomatis melalui chatbot, yang<br>sejalan dengan penerapan<br>Gemini AI pada penelitian ini.|



2-7 

|3|E. Yuniar<br>dan H.<br>Purnomo|Implementasi Chatbot<br>“ALITTA” Asisten Virtual<br>dari Balittas sebagai Pusat<br>Informasi|Penelitian mengembangkan chatbot<br>sebagai asisten virtual untuk memberikan<br>informasi kepada pengguna secara<br>otomatis sehingga meningkatkan efisiensi<br>pelayanan informasi pada instansi terkait.|Relevan karena memanfaatkan<br>chatbot sebagai media<br>penyampaian informasi digital<br>pada suatu institusi, serupa<br>dengan penerapan chatbot pada<br>portal informasi Dinas PUPR.|
|---|---|---|---|---|



## **BAB 3 SKEMA PENELITIAN** 

Bab ini berisi penjelasan alur penyelesaian tugas akhir, analisis persoalan dan manfaat tugas akhir, kerangka pemikiran teoritis, dan profil penelitian. 

## **3.1 Alur Penyelesaian Tugas Akhir** 

Alur penyelesaian tugas akhir ini dilakukan berdasarkan diagram alur penyelesaian. Berikut ini merupakan alur penyelesaian tugas akhir: 

Tabel 3. 1 Alur Penyelesaian Tugas Akhir 

|**Tahap dan Hasil**|**Langkah Penelitian**|**Literarur dan Referensi**|
|---|---|---|
|**Tahap 1:**<br>Tahap pendahuluan dilakukan untuk<br>memahami kondisi komunikasi pada<br>Website Portal Informasi dan Publikasi<br>Dinas PUPR Kabupaten Garut yang<br>belum menyediakan fitur komunikasi dua<br>arah secara langsung. Pada tahap ini<br>dilakukan<br>identifikasi<br>permasalahan,<br>penentuan tujuan, batasan, dan lingkup<br>penelitian, serta pengumpulan data awal<br>melalui studi literatur dan wawancara..<br>**Hasil :**<br>- Identifikasi permasalahan komunikasi<br>informasi<br>pada<br>Website<br>Portal<br>Informasi Dinas PUPR Kabupaten<br>Garut<br>- Rumusan tujuan penelitian untuk<br>mengembangkan modul_live chat_<br>_hybrid_berbasis chatbot Gemini AI<br>- Penentuan batasan dan lingkup<br>penelitian terkait pengembangan fitur<br>komunikasi pada website<br>- Pemahaman literatur terkait chatbot,<br>_live chat hybrid_, artificial intelligence,<br>dan layanan informasi berbasis web<br>- Data<br>hasil<br>wawancara<br>terkait<br>kebutuhan komunikasi<br>**Kontribusi :**<br>Tahap ini menghasilkan pemahaman<br>mengenai permasalahan dan kebutuhan<br>sistem komunikasi melalui website. Hasil<br>dari tahap ini digunakan sebagai dasar<br>dalam proses analisis kebutuhan sistem<br>pada pengembangan modul_live chat_<br>_hybrid_yang terintegrasi dengan chatbot<br>Gemini AIpada Website Portal Informasi|Identifikasi Masalah<br>Studi Literatur|[MUT24], [ANU25], [SUG17]|



3-1 

3-2 

|dan Publikasi Dinas PUPR Kabupaten<br>Garut.|||
|---|---|---|
|**Tahap 2:**<br>Tahap ini dilakukan untuk menganalisis<br>kebutuhan sistem dan merancang modul<br>_live chat hybrid_berbasis chatbot Gemini<br>AI. Pada tahap ini dilakukan identifikasi<br>kebutuhan fungsional dan non-fungsional<br>sistem. Selanjutnya dirancang arsitektur<br>sistem, alur interaksi antar komponen,<br>struktur<br>database,<br>serta<br>desain<br>antarmuka pengguna.<br>**Hasil :**<br>- Daftar kebutuhan pengguna sistem<br>- Spesifikasi kebutuhan fungsional<br>dan non-fungsional<br>- Rancangan arsitektur sistem<br>- Rancangan alur interaksi<br>pengguna, chatbot Gemini AI, dan<br>admin<br>- Perancangan struktur database<br>- Desain antarmuka pengguna (UI)<br>modul live chat<br>**Kontribusi :**<br>Menghasilkan spesifikasi kebutuhan dan<br>rancangan<br>sistem<br>yang<br>terstruktur<br>sebagai dasar pengembangan_modul live_<br>_chat hybrid_, serta memastikan aspek<br>interaktivitas,<br>keamanan<br>data<br>percakapan, dan mekanisme_handover_<br>telah terakomodasi dengan baik dalam<br>desain sistem.|Analisis dan<br>Perancangan|[ALV25], [PRE10], [LAR25], [HUY22],<br>[ORA25]|
|**Tahap 3:**<br>Tahap<br>ini<br>dilakukan<br>untuk<br>mengimplementasikan modul_live chat_<br>_hybrid_berdasarkan hasil perancangan<br>yang<br>telah<br>dibuat.<br>Implementasi<br>mencakup pengembangan fitur live chat<br>menggunakan<br>framework<br>Laravel,<br>integrasi WebSocket melalui Laravel<br>Reverb untuk komunikasi real-time, serta<br>integrasi API Gemini AI.<br>**Hasil :**<br>- Implementasi modul_live chat_<br>_hybrid_pada website berbasis<br>Laravel<br>- Integrasi WebSocket (Laravel<br>Reverb) untuk komunikasi real-<br>time<br>- Integrasi API Gemini AI sebagai<br>responden otomatis pertanyaan<br>pengguna<br>- Fitur_handover_percakapan dari<br>chatbot kepada admin dinas<br>- Antarmuka live chat untuk<br>pengguna dan dashboard admin<br>-||[LAR25], [EKA24], [GEM25], [ LAR26]<br> -|



3-3 

|**Kontribusi :**<br>Menghasilkan modul_live chat hybrid_<br>yang fungsional dan siap diuji, dengan<br>kemampuan<br>merespons<br>pertanyaan<br>pengguna secara otomatis melalui<br>chatbot Gemini AI serta mekanisme<br>pengalihan percakapan kepada admin<br>sesuai kebutuhan.|||
|---|---|---|
|**Tahap 4:**<br>Tahap<br>pengujian<br>dilakukan<br>untuk<br>memastikan seluruh fungsi modul_live_<br>_chat hybrid_berjalan sesuai dengan<br>kebutuhan<br>yang<br>telah<br>ditetapkan.<br>Pengujian<br>dilakukan<br>menggunakan<br>metode Black Box Testing yang berfokus<br>pada pengujian fungsionalitas sistem.<br>**Hasil :**<br>- Dokumentasi test case pengujian<br>modul li_ve chat hybrid_<br>- Hasil pengujian fitur live chat,<br>respons chatbot Gemini AI, dan<br>mekanisme_handover_<br>- Laporan hasil Black Box Testing<br>**Kontribusi :**<br>Memvalidasi fungsionalitas modul_live_<br>_chat hybrid_dan memastikan sistem<br>berjalan sesuai kebutuhan yang telah<br>ditentukan, meliputi fitur percakapan real-<br>time, respons otomatis chatbot, dan<br>mekanisme<br>pengalihan<br>percakapan<br>kepada admin.<br>~~-~~||[ PUT24]<br>~~-~~|
|**Tahap 5:**<br>Pada tahap ini dilakukan penarikan<br>kesimpulan dari hasil penelitian yang<br>telah<br>dilakukan<br>berdasarkan<br>permasalahan yang telah diidentifikasi,<br>serta penyusunan saran yang dapat<br>menjadi masukan bagi pengembangan<br>dan penelitian selanjutnya.<br>**Hasil :**<br>- Kesimpulan hasil pengembangan<br>modul_live chat hybrid_dengan<br>chatbot Gemini AI<br>- Saran<br>pengembangan<br>fitur<br>tambahan<br>untuk<br>penelitian<br>selanjutnya<br>**Kontribusi :**<br>Memberikan<br>kesimpulan<br>mengenai<br>pengembangan modul_live chat hybrid_<br>pada Website Portal Informasi Dinas<br>PUPR Kabupaten Garut serta saran<br>untuk peningkatan dan pengembangan<br>sistem di masa depan sebagai referensi<br>penelitian berikutnya<br>~~- ~~|<br>Kesimpulan dan<br>Saran|~~-~~|



3-4 

## **3.2 Perumusan Masalah** 

Perumusan masalah merupakan salah satu bagian dalam penulisan tugas akhir yang bertujuan untuk mengetahui permasalahan yang terdapat pada penelitian tugas akhir. Perumusan masalah ini terbagi menjadi dua kelompok, yaitu: 

1. Identifikasi sebab dan akibat dari suatu permasalahan serta faktor penyebabnya 

2. Solusi yang memungkinkan terkait dengan penyebab masalah yang telah dipetakan pada bagian pertama. Penyampaian pada bagian ini dijelaskan dengan menggunakan diagram fishbone. 

## **3.2.1 Analisis Masalah** 

Analisis terhadap faktor-faktor yang menyebabkan permasalahan dalam sistem menjadi fokus utama dalam tahap ini. 

Gambar 3. 1 Fishbone Analisis Masalah 

Tabel 3. 2 Analisis Masalah 

|Aspek|Penyebab|Deskripsi Masalah|
|---|---|---|
|Manusia|Keterbatasan petugas<br>dalam menangani<br>pertanyaan berulang secara<br>manual|Jumlah petugas yang tersedia untuk melayani pertanyaan masyarakat sangat terbatas,<br>sehingga pelayanan menjadi kurang optimal terutama ketika jumlah pertanyaan yang<br>masuk meningkat dan tidak semua pertanyaan dapat ditangani secara tepat waktu,<br>Sebagian besar pertanyaan yang diajukan masyarakat bersifat berulang, terutama<br>berkaitan dengan persyaratan, prosedur, dan informasi dasar layanan, sehingga<br>petugas harus memberikanjawabanyangsama secara manual berulangkali.|
|Metode|Mekanisme Layanan Masih<br>Bersifat Manual|Pelayanan informasi kepada masyarakat masih dilakukan secara langsung di kantor<br>maupun melalui WhatsApp hotline dinas. Mekanisme ini memiliki keterbatasan karena<br>respons sangat bergantung pada ketersediaan petugas, sehingga jawaban baru dapat<br>diberikansetelahbeberapa jambahkan hinggakeesokan harinya.|



3-5 

|Teknologi|Website hanya dibangun<br>dengan fitur komunikasi satu<br>arah|Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut hanya<br>menyediakan formulir kontak dan pengaduan yang dikirimkan melalui email, sehingga<br>interaksi antara masyarakat dan instansi belum dapat berlangsung secara langsung<br>dalam satu kanal percakapan|
|---|---|---|



## **3.2.2 Solusi Masalah** 

Permasalahan yang telah diidentifikasi perlu disertai dengan solusi yang mampu mengatasi 

setiap aspek permasalahan secara tepat. Setiap solusi yang dirumuskan saling berkaitan untuk memberikan jawaban yang komprehensif terhadap permasalahan yang ada. Adapun solusi yang diusulkan adalah sebagai berikut: 

Gambar 3. 2 Fishbone Analisis Solusi 

Tabel 3. 3 Analisis Solusi 

|Aspek|Solusi|Deskripsi Solusi|
|---|---|---|
|Manusia|Penerapan sistem respons<br>otomatis berbasis chatbot<br>untuk mengurangi beban kerja<br>petugas|Dikembangkan chatbot berbasis Gemini AI yang diintegrasikan pada modul live chat<br>untuk menangani pertanyaan yang bersifat berulang dan berkaitan dengan informasi<br>dasar layanan. Dengan adanya sistem ini, petugas tidak perlu lagi memberikan<br>jawaban yang sama secara manual, sehingga beban kerja dapat berkurang dan<br>petugas dapat lebih difokuskan pada penanganan pertanyaan yang memerlukan<br>penjelasan lebih lanjut.|
|Metode|Penerapan<br>mekanisme<br>komunikasi dua arah berbasis<br>live<br>chat<br>dengan<br>fitur<br>_handover_antara chatbot dan<br>admin|Dikembangkan mekanisme komunikasi dua arah dalam satu kanal percakapan<br>melalui modul live chat pada website. Sistem ini dilengkapi dengan fitur_handove_r<br>yang memungkinkan percakapan dialihkan dari chatbot kepada admin ketika<br>pertanyaan tidak dapat ditangani secara otomatis. Dengan demikian, proses<br>komunikasi tidak lagi sepenuhnya bergantung pada mekanisme manual seperti<br>WhatsApp atau layanan tatap muka, tetapi dapat dilakukan secara terintegrasi melalui<br>website.|
|Teknologi|Pengembangan modul_live_<br>_chat hybrid_terintegrasi pada<br>Website Portal Informasi dan<br>Publikasi|Dilakukan pengembangan modul_live chat hybrid_yang diintegrasikan langsung pada<br>website berbasis Laravel yang telah dibangun sebelumnya. Modul ini memanfaatkan<br>teknologi WebSocket untuk mendukung komunikasi secara real-time, serta integrasi<br>API Gemini AI untuk menghasilkan respons otomatis berdasarkan konteks informasi<br>yang tersedia pada sistem. Dengan adanya modul ini, website tidak hanya berfungsi<br>sebagai media penyampaian informasi, tetapi juga sebagai sarana interaksi dua arah<br>dalam satu platform yang sama.|



3-6 

## **3.3 Skema Analisis** 

Skema analisis merupakan representasi alur proses analisis yang dilakukan dalam penelitian tugas akhir. Skema analisis ini menunjukkan input yang diperlukan untuk kebutuhan analisis dan serta hasil yang diperoleh atau output . Dalam skema analisis tersebut terdapat tiga komponen utama yaitu : 

1. **Input** , yaitu bagian yang menjelaskan data atau informasi yang digunakan sebagai landasan dan referensi dalam proses analisis. 

2. **Analisis** , yaitu tahapan yang berisi proses pengolahan, pengkajian, dan penelaahan data untuk memperoleh gambaran kondisi aktual dari objek penelitian. 

3. **Output** , yaitu bagian yang menjelaskan hasil atau keluaran yang dihasilkan setelah seluruh proses selesai dilakukan. 

Adapun gambar berikut menunjukkan skema analisis dari penelitian tugas akhir yang dilakukan: 

Gambar 3. 3 Skema Analisis 

3-7 

Selanjutnya akan dijelaskan mengenai skema analisis. Penjelasan mengenai Skema Analisis 

Tabel 3. 4 Skema Analisis 

|**Langkah Analisis**|**Objek Analisis**|**Hasil Analisis**|**Maksud Analisis**|
|---|---|---|---|
|Identifikasi dan Perancangan Modul_Live_<br>_Chat Hybrid_dengan Chatbot Gemini AI<br>pada Website Portal Informasi dan<br>Publikasi Dinas PUPR Kabupaten Garut<br>Berbasis Laravel|Studi Literatur|Analisis dan<br>Perancangan|Merancang modul_live chat_<br>_hybrid_yang sesuai dengan<br>kebutuhan pada Website Portal<br>Informasi dan Publikasi Dinas<br>PUPR Kabupaten Garut|
||Wawancara|||
|Implementasi<br>Modul_Live_<br>_Chat_<br>_Hybrid_dengan Chatbot Gemini AI pada<br>Website Portal Informasi dan Publikasi<br>Dinas PUPR Kabupaten Garut Berbasis<br>Laravel|Analisis dan<br>Perancangan|_Modul Live Chat_<br>_Hybrid dengan_<br>_Chatbot Gemini AI_|Membangun modul_live chat_<br>_hybrid_sesuai dengan spesifikasi<br>kebutuhan yang telah ditentukan.|
|Pengujian Modul_Live Chat Hybrid_dengan<br>Chatbot Gemini AI pada Website Portal<br>Informasi dan Publikasi Dinas PUPR<br>Kabupaten Garut Berbasis Laravel|Modul_Live Chat_<br>_Hybrid_dengan<br>Chatbot Gemini AI|Hasil Testing|Memvalidasi fungsionalitas<br>modul_live chat hybrid_dan<br>memastikan sistem berjalan sesuai<br>kebutuhan.|



## **3.4 Gambaran Produk Tugas Akhir** 

Tugas akhir ini membahas pengembangan modul _live chat hybrid_ berbasis chatbot Gemini AI yang diintegrasikan pada Website Portal Informasi dan Publikasi Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut yang dibangun menggunakan framework Laravel. Modul ini dikembangkan untuk menyediakan sarana komunikasi dua arah secara langsung antara masyarakat dan instansi melalui website sehingga pengguna dapat memperoleh informasi secara interaktif. Sistem ini memungkinkan pengguna mengajukan pertanyaan terkait layanan maupun informasi, kemudian pertanyaan tersebut akan ditangani oleh chatbot berbasis Gemini AI untuk menjawab pertanyaan secara otomatis, serta menyediakan mekanisme pengalihan percakapan kepada admin apabila diperlukan penanganan lebih lanjut. Dengan adanya modul ini, diharapkan proses penyampaian informasi dan interaksi antara masyarakat dan instansi dapat berlangsung secara dua arah melalui platform website 

## **3.5 Profil Tempat Penelitian** 

Penelitian ini dilaksanakan di Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut. Dinas Pekerjaan Umum dan Penataan Ruang Kabupaten Garut merupakan instansi pemerintah daerah yang bertugas di bidang: Pengelolaan Sistem Irigasi Pertanian, Pengelolaan dan Pembangunan di Kawasan Sub Daerah Aliran Sungai (DAS), Pengembangan dan Pembangunan Embung, Situ, Danau dan Bangunan Penampung Air Lainnya, Pengelolaan dan Pembangunan 

3-8 

Kawasan Muara dan Pantai, Pengelolaan Sistem Drainase atau Saluran Pengaliran Penggelontoran Limbah Domestik, Industri, dan Kawasan Perkotaan, Pembangunan Kanal Banjir, Pembangunan Pembangkit Tenaga Listrik, Pengelolaan Usaha Pertambangan, Peningkatan Aparatur Pemerintah dan Kelembagaan di Bidang Energi dan Sumber Daya Mineral, Pengelolaan Sistem Informasi Pertambangan, Pengelolaan Potensi Energi Panas Bumi dan Bagi Hasil Panas Bumi, Pembangunan Listrik Perdesaan, dan Penataan Ruang Wilayah. 

Adapun lokasi dari perusahaan ini, yang merupakan tempat kerja praktik peneliti terletak di Jl. Raya Samarang No.117, Sukagalih, Kec. Tarogong Kidul, Kabupaten Garut, Jawa Barat. 

## **3.5.1 Visi dan Misi** 

## **Visi** 

Terwujudnya Infrastruktur Pekerjaan Umum dan Penataan Ruang yang Berkualitas dalam Mendukung Kabupaten Garut Bermartabat, Nyaman dan Sejahtera. 

## **Misi** 

1. Meningkatkan kualitas aparatur sipil negara yang profesional dan beretika. 

2. Meningkatkan tata kelola organisasi dalam perencanaan, pelaksanaan dan pengawasan yang terpadu dan tepat. 

3. Mewujudkan infrastruktur jalan, permukiman, sumber daya air, bangunan, yang berkualitas dan memadai dengan berbasis penataan ruang. 

4. Meningkatkan kualitas dan kuantitas sarana Penunjang sumber daya manusia dan infrastruktur. 

## **BAB 4** 

## **ANALISIS DAN PERANCANGAN** 

Bab analisis dan perancangan ini menjelaskan proses awal awal pengembangan Modul Live Chat Hybrid dengan integrasi Chatbot Gemini AI pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut yang terdiri dari tahap analisis dan perancangan. Proses analisis terdiri dari pengumpulan data, analisis sistem yang sedang berjalan, analisis kebutuhan pengguna, analisis aktor bisnis, business use case diagram, analisis kebutuhan fungsional, analisis kebutuhan non-fungsional, dan identifikasi use case. Sedangkan proses perancangan perangkat lunak terdiri dari perancangan data, perancangan antarmuka, dan perancangan arsitektur sistem. 

## **4.1 Analisis Perangkat Lunak** 

Analisis perangkat lunak bertujuan untuk mengidentifikasi, menganalisis, dan mendefinisikan seluruh kebutuhan sistem pada modul live chat hybrid dengan integrasi Chatbot Gemini AI yang dikembangkan pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut berbasis Laravel secara terstruktur. Kebutuhan sistem tersebut diperoleh melalui proses pengumpulan data yang dilakukan menggunakan metode studi literatur dan wawancara. 

## **4.1.1 Pengumpulan Data** 

Proses pengumpulan data pada penelitian ini dilakukan melalui beberapa pendekatan untuk memperoleh informasi yang dibutuhkan dalam pengembangan modul live chat hybrid dengan integrasi Chatbot Gemini AI pada Website Portal Informasi dan Publikasi Dinas PUPR Kabupaten Garut. 

## a. Studi Literatur 

Studi literatur dilakukan dengan mengkaji berbagai sumber referensi yang relevan, seperti jurnal ilmiah, buku, dokumentasi teknis, dan penelitian terdahulu yang berkaitan dengan topik penelitian. Literatur yang dipelajari meliputi konsep layanan informasi publik berbasis digital, teknologi chatbot berbasis Artificial Intelligence (AI), implementasi Google Gemini AI, pengembangan aplikasi web menggunakan framework Laravel, arsitektur Model-View-Controller (MVC), serta konsep live chat sebagai media komunikasi interaktif antara pengguna dan instansi. 

## b. Wawancara 

Wawancara dilakukan dengan pihak Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut yang terlibat dalam pengelolaan Website Portal Informasi dan Publikasi. Wawancara bertujuan untuk memperoleh informasi mengenai mekanisme layanan informasi yang 

4-1 

4-2 

berjalan saat ini, kendala yang dihadapi dalam proses komunikasi dengan masyarakat, serta kebutuhan sistem yang diperlukan untuk mendukung komunikasi dua arah melalui modul live chat hybrid. 

Data yang diperoleh dari hasil studi literatur dan wawancara digunakan sebagai dasar dalam mengidentifikasi kebutuhan sistem, menyusun kebutuhan fungsional dan nonfungsional, serta merancang modul live chat hybrid yang mampu mengintegrasikan chatbot Gemini AI dengan mekanisme handover kepada admin dalam satu kanal percakapan yang berkelanjutan. 

## **4.2 Analisis Sistem yang Sedang Berjalan** 

Analisis sistem yang sedang berjalanan memperlihatkan aktivitas sistem yang diterapkan saat ini berikut hasil wawancara yang telah dilakukan untuk mengamati aktivitas-aktivitas yang terjadi. 

**Aktivitas Penyampaian Informasi** 

4-3 

## **Deskripsi** 

Pada Gambar diatas menjelaskan alur pelayanan informasi yang terjadi di Dinas PUPR Kabupaten Garut antara masyarakat dengan petugas pelayanan melalui dua saluran komunikasi yang tersedia. Masyarakat yang mencari informasi dapat memilih untuk datang langsung secara tatap muka ke kantor Dinas PUPR dengan mendatangi kantor dinas dan menemui petugas secara langsung, atau menghubungi petugas melalui WhatsApp hotline dinas dengan membuka aplikasi WhatsApp dan mengirim pertanyaan ke nomor hotline dinas. Berdasarkan hasil wawancara, masalah yang sering terjadi pada alur ini adalah masyarakat yang berasal dari wilayah jauh seperti Garut Selatan maupun yang sedang berada di luar kota harus menempuh jarak yang cukup jauh apabila memilih datang langsung ke kantor. Sedangkan bagi masyarakat yang menghubungi melalui WhatsApp hotline, respons sangat bergantung pada ketersediaan petugas sehingga masyarakat harus menunggu dan jawaban baru dapat diberikan setelah beberapa jam bahkan hingga keesokan harinya. Selain itu, keterbatasan jumlah petugas menyebabkan pelayanan menjadi kurang optimal terutama ketika jumlah pertanyaan yang masuk meningkat, ditambah sebagian besar pertanyaan yang diterima bersifat berulang sehingga petugas harus memberikan jawaban yang sama secara manual berkali-kali. 

## **4.3 Business Use Case Diagram** 

Business Use case merupakan model yang menggambarkan proses bisnis dari sebuah organisasi dan interaksi proses tersebut dengan pihak luar. Proses bisnis ini merupakan sekumpulan aktivitas yang dirancang untuk menghasilkan output tertentu bagi pelanggan. Berikut merupakan penggambaran business use case pada Dinas PUPR Kabupaten Garut. 

## **Proses Bisnis Penyampaian Informasi Dinas PUPR Kabupaten Garut** 

## **Deskripsi** 

Pada Gambar di atas menjelaskan proses bisnis penyampaian informasi yang terjadi di Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kabupaten Garut antara Masyarakat dan Petugas Pelayanan sebelum pengembangan sistem dilakukan. Masyarakat yang membutuhkan informasi dapat memperoleh layanan dengan datang langsung ke kantor Dinas PUPR Kabupaten Garut atau menghubungi WhatsApp Hotline yang tersedia. Selanjutnya, Petugas Pelayanan menerima pertanyaan yang diajukan masyarakat dan memberikan informasi atau jawaban sesuai dengan kebutuhan layanan yang diminta. Pada alur proses 

4-4 

bisnis ini, berdasarkan hasil wawancara dengan petugas pelayanan Dinas PUPR Kabupaten Garut ditemukan beberapa permasalahan yang sering terjadi, yaitu masyarakat yang berasal dari wilayah yang jauh harus datang langsung ke kantor untuk memperoleh informasi, sedangkan pada layanan WhatsApp Hotline waktu respons sangat bergantung pada ketersediaan petugas sehingga masyarakat sering kali harus menunggu beberapa jam bahkan hingga keesokan hari untuk mendapatkan jawaban. Selain itu, keterbatasan jumlah petugas menyebabkan pelayanan informasi menjadi kurang optimal ketika jumlah pertanyaan meningkat, ditambah sebagian besar pertanyaan yang diterima bersifat berulang sehingga petugas harus memberikan jawaban yang sama secara manual berkali-kali. 

## **4.3.1 Deskripsi Business Use Case** 

Business use case pada gambar dapat dijelaskan lebih detail. Penjelasan business use case dapat dilihat pada tabel deskripsi business use case. 

|**Nomor Business Use Case**|**Nama Business Use Case**|**Deskripsi**|
|---|---|---|
|BUC - 01|Penyampaian Informasi|BUC - 01 adalah kegiatan penyampaian<br>informasi layanan Dinas PUPR<br>Kabupaten Garut kepada masyarakat<br>yang dilakukan secara konvensional,<br>yaitu melalui kunjungan langsung ke<br>kantor atau melalui WhatsApp hotline<br>dinas, yang sangat bergantung pada<br>ketersediaan petugas pelayanan.|



## **4.3.2 Deskripsi Business Actor** 

Business use case pada gambar dapat dijelaskan lebih detail. Penjelasan business Actor dapat dilihat pada tabel deskripsi business use case. 

|**Nomor Business Actor**|**Nama Business Actor**|**Deskripsi**|
|---|---|---|
|BA - 01|Masyarakat|BA - 01 adalah pihak eksternal Dinas<br>PUPR Kabupaten Garut yang<br>membutuhkan informasi terkait layanan<br>dinas dan memicu terjadinya proses<br>bisnis penyampaian informasi, baik<br>dengan datang langsung ke kantor<br>maupun melalui WhatsApp hotline dinas.|



## **4.3.3 Deskripsi Worker Actor** 

Business use case pada gambar dapat dijelaskan lebih detail. Penjelasan business Actor dapat dilihat pada tabel deskripsi business use case. 

4-5 

|**Nomor Business Worker**|**Nama Business Worker**|**Deskripsi**|
|---|---|---|
|BW- 01|Petugas|BW - 01 adalah pihak internal Dinas<br>PUPR Kabupaten Garut yang bertugas<br>melayani masyarakat secara langsung di<br>kantor maupun melalui WhatsApp hotline<br>dinas, memberikan jawaban atas<br>pertanyaan yang diajukan masyarakat<br>terkait informasi dan layanan dinas<br>secara konvensional.|



## **4.4 Analisis Kebutuhan Pengguna** 

Analisis Kebutuhan Pengguna Analisis kebutuhan pengguna dilakukan untuk menentukan fitur dan fungsionalitas yang dibutuhkan pengguna dari sistem yang akan dibangun. Proses ini bertujuan untk mengidentifikasi dan mendokumentasikan kebutuhan pengguna yang nantinya akan menjadi dasar pengembangan sistem. Rincian kebutuhan pengguna tersebut dipaparkan dalam tabel berikut: 

|**Kode**|**User Requirement**|
|---|---|
|UR-01|Masyarakat ingin dapat mengirimkan pertanyaan melalui fitur live chat pada website tanpa harus datang langsung ke<br>kantor atau menghubungi WhatsApp hotline|
|UR-02|Masyarakat ingin mendapatkan jawaban otomatis dengan cepat dari chatbot terhadap pertanyaan umum yang diajukan|
|UR-03|Masyarakat ingin pertanyaan yang tidak dapat dijawab oleh chatbot dapat dialihkan kepada admin agar tetap dapat<br>ditangani dengan baik|
|UR-04|Masyarakat ingin dapat melanjutkan percakapan dalam satu kanal yang sama meskipun terjadi peralihan dari chatbot ke<br>admin|
|UR-05|Admin ingin menerima notifikasi ketika terjadi handover percakapan dari chatbot agar dapat segera menindaklanjuti<br>pertanyaan masyarakat|
|UR-06|Admin ingin dapat memantau seluruh percakapan yang masuk melalui dashboard pengelolaan percakapan|
|UR-07|Admin ingin dapat membalas pesan masyarakat secara langsung melalui sistem setelah menerima handover dari chatbot|
|UR-08|Admin ingin dapat mengakhiri sesi percakapan setelah pertanyaan masyarakat selesai ditangani|



## **4.4.1 Analisis Kebutuhan Fungsional** 

Analisis kebutuhan fungsional dilakukan untuk menentukan fungsi-fungsi spesifik yang harus dimiliki oleh sistem. Tahap ini bertujuan untuk mengidentifikasi dan mendefinisikan fitur-fitur sistem yang akan dikembangkan berdasarkan kebutuhan pengguna yang telah dianalisis sebelumnya. Detail kebutuhan fungsional tersebut disajikan dalam tabel berikut: 

|**Kode**|**User Reuirement**|**Kode**|**Software Requirement**|
|---|---|---|---|
|UR-01|Masyarakat ingin dapat mengirimkan pertanyaan<br>melalui fitur live chat pada website tanpa harus<br>datang langsung ke kantor atau menghubungi<br>WhatsApp hotline|SR-01|Perangkat lunak harus dapat menampilkan widget live<br>chat yang dapat diakses oleh masyarakat pada<br>halaman website Portal Informasi dan Publikasi Dinas<br>PUPR Kabupaten Garut|



4-6 

|||SR-02|Perangkat<br>lunak<br>harus<br>dapat<br>memungkinkan<br>masyarakat mengirimkan pesan pertanyaan melalui<br>antarmuka live chat tanpa perlu melakukan registrasi<br>akun|
|---|---|---|---|
|UR-02|Masyarakat ingin mendapatkan jawaban otomatis<br>dengan cepat dari chatbot terhadap pertanyaan<br>umum yang diajukan|SR-03|Perangkat lunak harus dapat meneruskan pesan<br>pertanyaan masyarakat ke Chatbot Gemini AI untuk<br>diproses<br>dan<br>menghasilkan<br>respons<br>otomatis<br>berdasarkan konteks informasi yang tersedia pada<br>sistem|
|||SR-04|Perangkat lunak harus dapat menampilkan respons<br>chatbot kepada masyarakat dalam satu kanal<br>percakapan secara real-time|
|UR-03|Masyarakat ingin pertanyaan yang tidak dapat<br>dijawab oleh chatbot dapat dialihkan kepada admin<br>agar tetap dapat ditangani dengan baik|SR-05|Perangkat lunak harus dapat menyediakan mekanisme<br>handover yang memungkinkan percakapan dialihkan<br>dari chatbot kepada admin ketika pertanyaan<br>memerlukan penanganan lebih lanjut|
|||SR-06|Perangkat lunak harus dapat mendeteksi permintaan<br>handover baik secara otomatis maupun berdasarkan<br>permintaan masyarakat|
|UR-04|Masyarakat ingin dapat melanjutkan percakapan<br>dalam satu kanal yang sama meskipun terjadi<br>peralihan dari chatbot ke admin|SR-07|Perangkat lunak harus dapat mempertahankan riwayat<br>percakapan dalam satu kanal yang sama selama<br>proses handover berlangsung sehingga masyarakat<br>tidak perlu mengulang pertanyaan|
|UR-05|Admin ingin menerima notifikasi ketika terjadi<br>handover percakapan dari chatbot agar dapat<br>segera menindaklanjuti pertanyaan masyarakat|SR-08|Perangkat lunak harus dapat mengirimkan notifikasi<br>kepada admin ketika terjadi handover percakapan dari<br>chatbot|
|||SR-09|Perangkat lunak harus dapat menampilkan indikator<br>status percakapan pada dashboard admin untuk<br>membedakan percakapan yang ditangani chatbot dan<br>yang memerlukan intervensi admin|
|UR-06|Admin ingin dapat memantau seluruh percakapan<br>yang masuk melalui dashboard pengelolaan<br>percakapan|SR-10|Perangkat lunak harus dapat menyediakan dashboard<br>pengelolaan<br>percakapan<br>bagi<br>admin<br>yang<br>menampilkan seluruh sesi percakapan yang sedang<br>aktif maupun yang telah selesai|
|||SR-11|Perangkat lunak harus dapat memungkinkan admin<br>memfilter dan mencari percakapan berdasarkan status<br>maupun waktu|
|UR-07|Admin ingin dapat membalas pesan masyarakat<br>secara langsung melalui sistem setelah menerima<br>handover dari chatbot|SR-12|Perangkat lunak harus dapat memungkinkan admin<br>membalas pesan masyarakat secara langsung melalui<br>dashboard setelah menerima handover dari chatbot|



4-7 

|||SR-13|Perangkat lunak harus dapat menampilkan pesan<br>balasan admin kepada masyarakat secara real-time<br>dalam kanal percakapan yang sama|
|---|---|---|---|
|UR-08|Admin ingin dapat mengakhiri sesi percakapan<br>setelah pertanyaan masyarakat selesai ditangani|SR-14|Perangkat lunak harus dapat memungkinkan admin<br>mengakhiri sesi percakapan setelah pertanyaan<br>masyarakat selesai ditangani|
|||SR-15|Perangkat lunak harus dapat menyimpan riwayat<br>percakapan yang telah selesai ke dalam sistem sebagai<br>rekam jejak layanan|



## **4.4.2 Analisis Kebutuhan Non Fungsional** 

Kebutuhan non-fungsional mendefinisikan batasan dan standar kualitas yang harus dipenuhi sistem dalam beroperasi. Kebutuhan ini tidak berhubungan langsung dengan fungsi-fungsi spesifik, melainkan mengatur cara sistem harus beroperasi dan teknologi yang digunakan. 

|**Kode**|**Kategori**|**Deskripsi**|
|---|---|---|
|NFR-01|Technology Constraint|Sistem dibangun menggunakan framework Laravel dengan basis data MySQL,<br>mengintegrasikan Gemini AI API sebagai mesin chatbot, serta memanfaatkan Laravel<br>Reverb dan WebSocket untuk komunikasi real-time antar pengguna dan admin|
|NFR-02|Availability|Sistem harus dapat diakses oleh masyarakat kapan saja melalui website Portal Informasi<br>dan Publikasi Dinas PUPR Kabupaten Garut selama server dalam kondisi aktif|
|NFR-03|Usability|Antarmuka live chat harus sederhana dan mudah digunakan oleh masyarakat umum<br>tanpa memerlukan pengetahuan teknis khusus, serta dapat diakses melalui berbagai<br>perangkat baik desktop maupun mobile|
|NFR-04|Security|Sistem harus menerapkan autentikasi berbasis akun untuk admin guna membatasi akses<br>pengelolaan percakapan hanya kepada pihak yang berwenang di Dinas PUPR<br>Kabupaten Garut|
|NFR-05|Performance|Sistem harus mampu menampilkan respons chatbot kepada masyarakat dalam waktu<br>singkat agar tidak menimbulkan kesan lambat dalam layanan informasi, serta<br>mendukung komunikasi real-time yang responsif antara masyarakat dan admin|
|NFR-06|Reliability|Sistem harus memastikan mekanisme handover berjalan secara konsisten sehingga<br>tidak ada percakapan yang terputus atau tidak tertangani ketika terjadi peralihan dari<br>chatbot kepada admin|



## **4.4.3 Identifikasi Use Case** 

Identifikasi use case dilakukan untuk menentukan interaksi-interaksi yang terjadi antara pengguna dengan sistem. Tahap ini bertujuan untuk mengidentifikasi dan mendokumentasikan semua fungsi yang dapat dilakukan oleh aktor dalam sistem berdasarkan kebutuhan fungsional yang telah dianalisis. Rincian identifikasi use case tersebut disajikan dalam tabel berikut: 

4-8 

|**Kode**<br>**SR**|**Software Requirement**|**Kode**<br>**UC**|**`Nama Use Case**|**Aktor**|
|---|---|---|---|---|
|SR-01|Perangkat lunak harus dapat menampilkan widget live chat yang<br>dapat diakses pada halaman website|UC-01|Mengirim Pertanyaan<br>melalui Live Chat|Masyarakat|
|SR-02|Perangkat lunak harus dapat memungkinkan masyarakat<br>mengirimkan pesan pertanyaan melalui antarmuka live chat tanpa<br>perlu registrasi akun||||
|SR-03|Perangkat lunak harus dapat meneruskan pesan pertanyaan<br>masyarakat ke Chatbot Gemini AI untuk diproses dan<br>menghasilkan respons otomatis|UC-02|Menerima<br>Jawaban<br>Chatbot|Masyarakat|
|SR-04|Perangkat lunak harus dapat menampilkan respons chatbot kepada<br>masyarakat dalam satu kanal percakapan secara real-time||||
|SR-05|Perangkat lunak harus dapat menyediakan mekanisme handover<br>yang memungkinkan percakapan dialihkan dari chatbot kepada<br>admin|UC-03|Mengalihkan<br>Percakapan|Masyarakat,<br>Admin|
|SR-06|Perangkat lunak harus dapat mendeteksi permintaan handover baik<br>secara otomatis maupun berdasarkan permintaan masyarakat||||
|SR-07|Perangkat lunak harus dapat mempertahankan riwayat percakapan<br>dalam satu kanal yang sama selama proses handover berlangsung||||
|SR-08|Perangkat lunak harus dapat mengirimkan notifikasi kepada admin<br>ketika terjadi handover percakapan dari chatbot|UC-04|Mengelola<br>Percakapan|Admin|
|SR-09|Perangkat lunak harus dapat menampilkan indikator status<br>percakapan pada dashboard admin||||
|SR-10|Perangkat lunak harus dapat menyediakan dashboard pengelolaan<br>percakapan bagi admin yang menampilkan seluruh sesi<br>percakapan aktif maupun selesai||||
|SR-11|Perangkat lunak harus dapat memungkinkan admin memfilter dan<br>mencari percakapan berdasarkan status maupun waktu||||
|SR-12|Perangkat lunak harus dapat memungkinkan admin membalas<br>pesan masyarakat secara langsung melalui dashboard setelah<br>menerima handover|UC-05|Membalas Pesan|Admin|
|SR-13|Perangkat lunak harus dapat menampilkan pesan balasan admin<br>kepada masyarakat secara real-time dalam kanal percakapan yang<br>sama||||
|SR-14|Perangkat lunak harus dapat memungkinkan admin mengakhiri<br>sesi percakapan setelah pertanyaan masyarakat selesai ditangani|UC-06|Mengakhiri<br>Sesi<br>Percakapan|Admin|
|SR-15|Perangkat lunak harus dapat menyimpan riwayat percakapan yang<br>telah selesai ke dalam sistem sebagai rekam jejak layanan||||



4-9 

## **4.5 Pemodelan Berbasis Skenario** 

Pemodelan berbasis skenario digunakan untuk merepresentasikan sebuah interaksi antar aktor dengan sistem. Terdapat beberapa sub bab dalam pemodelan berbasis skenario antara lain membuat use case, skenario use case dan diagram swimlane yang akan dijelaskan pada poin poin berikut. 

## **4.5.1 Use Case Diagram** 

Use case diagram menggambarkan interaksi antara aktor dengan sistem yang dikembangkan. Aktor merupakan pihak yang berinteraksi secara langsung dengan sistem, baik sebagai pengguna maupun pengelola sistem. Sementara itu, use case merepresentasikan fungsi atau layanan yang harus disediakan oleh sistem berdasarkan kebutuhan pengguna yang telah diidentifikasi pada tahap analisis. Gambar use case tersbut disajikan dalam table berikut: 

**==> picture [68 x 10] intentionally omitted <==**

**----- Start of picture text -----**<br>
Use Case Diagram<br>**----- End of picture text -----**<br>


4-10 

**Deskripsi** 

## **DAFTAR PUSTAKA** 

- [ALV25] Alvin, A., Robet, R., dan Tarigan, F. A., "Implementasi Chatbot Otomatis Akademik Berbasis Web Menggunakan LLM dan Rule-Based System Studi Kasus: STMIK Time", _JIKO (Jurnal Informatika dan Komputer)_ , Vol. 9, Nomor 3, 2025. 

- [ANU25] Anugrah, I. K., Almahdhar, S. M. R., Nurraniah, S., Kamil, R. R., dan Darmawan, I., "Implementasi dan Tantangan Sistem Pemerintahan Berbasis Elektronik (SPBE) melalui Aplikasi SALAMAN dalam Mewujudkan Transformasi Digital Pemerintahan Kota Bandung", _Jurnal Penelitian Nusantara_ , Vol. 1, 2025. 

- [DEC24] K. Decelis, “From Expectations to Satisfaction A Comparative Study of Customer Interactions with AI Chatbots vs Human Agents in e-Commerce Settings,” pp. 179– 190, 2024. 

- [EKA24] Eka Putra, F. P., Muslim, F., Hasanah, N., Holipah, Paradina, R., dan Alim, R., "Analisis Komparasi Protokol Websocket dan MQTT Dalam Proses Push Notification", _Jurnal Sistim Informasi dan Teknologi_ , Vol. 5, 2024. 

- [GEM25] Gemini Team _et al._ , “Gemini: A Family of Highly Capable Multimodal Models,” pp. 1–90, 2025, [Online]. Available: http://arxiv.org/abs/2312.11805 

- [HUY22] Huynh, T. S., Tran, D. T., Vu, Q. H. N., dan Nguyen, L. A. T., "Design and Implementation of Web Application Based on MVC Laravel Architecture", _European Journal of Electrical Engineering and Computer Science_ , Vol. 6, Nomor 4, Agustus 2022. 

- [LAR25] Laravel, “Installation - Laravel 12.x - The PHP Framework For Web Artisans.” Accessed: Nov. 28, 2025. [Online]. Available: https://laravel.com/docs/12.x#whylaravel 

- [LAR26] Laravel, “Laravel Reverb | Laravel 12.x - The clean stack for Artisans and agents.” Accessed: Mar. 08, 2026. [Online]. Available: https://laravel.com/docs/12.x/reverb 

- [MUT24] Mutiarin, D., Khaerah, N., Nyssa, A. V. I., dan Nasrulhaq, N., "E-Government Development: Catalysing Agile Governance Transformation in Indonesia", _Journal of Contemporary Governance and Public Policy_ , Vol. 5, Nomor 1, 2024. 

- [NAS25] Nasukha, A., Zulhidayat, Z., Nizar, D. A., Saputri, I., Ilham, R., dan Pratama, R., 

xi 

   - "Perancangan Prototipe Portal Informasi Kementerian Agama Kota Jambi", _RIGGS Journal of Artificial Intelligence and Digital Business_ , Vol. 4, Nomor 2, 2025. 

- [ORA25] Oracle, “MySQL: Understanding What It Is and How It’s Used.” Accessed: Nov. 28, 2025. [Online]. Available: https://www.oracle.com/mysql/what-is-mysql/ 

- [PRE10] Pressman, R. S., _Software Engineering: A Practitioner’s Approach_ , 7th ed. New York, 2010. doi: 10.1145/336512.336521. 

- [PUT24] Putri, S. J., Putri, D. G. P., dan Putra, W. H. N., "Analisis Komparasi pada Teknik Black Box Testing (Studi Kasus: Website Lars)", _Journal of Internet Software Engineering_ , Vol. 5, Nomor 1, 2024. 

- [RAH23] Rahmi, E. R., Yumami, E., dan Hidayasari, N., "Analisis Metode Pengembangan Sistem Informasi Berbasis Website: Systematic Literature Review", _REMIK_ , Vol. 7, Nomor 1, Januari 2023. 

- [SUG17] Sugiyono, _Metode Penelitian Kuantitatif, Kualitatif, dan R&D_ , Alfabeta, Bandung, 2017. 

- [TAL25] S. Aliphadji Talaohu, R. Soekarta, and M. Surahmanto, “Implementasi LLM Pada Chatbot PMB Universitas Muhammadiyah Sorong Menggunakan Metode RAG Berbasis Website,” _J. Ilmu Komput. dan Inform._ , vol. 03, no. 02, pp. 1–11, 2025. 

- [YUN19] Yuniar, E. dan Purnomo, H., "Implementasi Chatbot 'ALITTA' Asisten Virtual dari Balittas sebagai Pusat Informasi di Balittas", _Antivirus: Jurnal Ilmiah Teknik Informatika_ , Vol. 13, Nomor 1, 2019. 

xii 

## **LAMPIRAN** 

xiii 

xiv 

xv 

xvi 

xvii 

