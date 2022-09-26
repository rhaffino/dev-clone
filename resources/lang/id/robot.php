<?php
return [
    "meta-title" => "Robots.txt Generator SEO - Kustom & Cek File robots.txt Gratis disini!",
    "meta-desc" => "Gunakan robots.txt generator untuk mengatur indexing status laman. Bantu Google mengoptimasi dan tingkat performa web Anda.",
    "title" => "ROBOT.TXT GENERATOR",
    "subtitle" => "Buat file robots.txt dengan mudah",
    "label-robot-access" => "Akses robot default",
    "placeholder-robot-access" => "Pilih akses",
    "robot-access-opt-1" => "Izinkan",
    "robot-access-opt-2" => "Jangan izinkan",
    "label-crawl-delay" => "Penundaan crawl",
    "placeholder-crawl-delay" => "Pilih penundaan",
    "crawl-delay-opt-1" => "Tidak Ada Penundaan",
    "crawl-delay-opt-2" => "5 detik",
    "crawl-delay-opt-3" => "10 detik",
    "crawl-delay-opt-4" => "20 detik",
    "crawl-delay-opt-5" => "60 detik",
    "crawl-delay-opt-6" => "120 detik",
    "label-sitemap" => "Sitemap",
    "label-sitemap-helper" => "(biarkan kosong jika Anda tidak punya)",
    "label-directive" => "Pengarahan",
    "btn-add" => "TAMBAH DIRECTIVE",
    "highlight" => "Pada versi terbaru ini kami melengkapi tools Robot TXT Generator dengan fittur export dan fitur useragent. Fitur export akan memudahkan Anda dalam memeriksa kode di Google Rich Result. Sedangkan fitur useragent akan memungkinkan Anda untuk menambah lebih banyak perintah di Robot TXT Generator. Hal ini memudahkan Robot txt lebih spesifik memilah mana konten yang ingin Anda tutup dan mana yang ditampilkan.",
    "desc-1" => "Apa itu Robots.txt Generator?",
    "desc-1-1" => "Robots.txt generator adalah sebuah tool yang berfungsi untuk memudahkan Anda dalam membuat konfigurasi pada file robots.txt. <br> <br>
    Robots.txt generator dari cmlabs telah memuat segala perintah yang bisa Anda gunakan untuk membuat file robots.txt, mulai dari menentukan <i style='font-size: inherit; color:black;'>user-agent</i>, memasukkan path sitemap, menentukan izin akses (allow atau disallow), hingga mengatur <i style='font-size: inherit; color:black;'>crawl-delay</i>.",
    "desc-2" => "Mengapa Anda Membutuhkan Robots.txt Generator?",
    "desc-2-1" => "Dengan menggunakan  <a href='https://tools.cmlabs.co/id/robotstxt-generator'>robots.txt generator</a>, Anda tidak perlu menuliskan file robots.txt secara manual. Cukup masukkan perintah yang ingin Anda berikan pada web crawler, lalu atur halaman mana yang diizinkan maupun dilarang untuk dirayapi. Cara menggunakan robots.txt generator pun cukup mudah, hanya dengan beberapa klik saja.",
    "desc-3" => "Fungsi Robots.txt Untuk Website Anda",
    "desc-3-1" => "Robots.txt adalah file berisi perintah tertentu yang memutuskan apakah user-agent (web crawler dari tiap search engine) diizinkan atau tidak untuk merayapi (crawl) elemen website. Adapun beberapa fungsi robots.txt untuk website Anda adalah sebagai berikut:",
    "desc-3-1-1" => "Memberi tahu crawler URL halaman mana yang boleh atau tidak boleh diakses",
    "desc-3-1-2" => "Membantu website terhindar dari beban permintaan crawl yang terlalu banyak",
    "desc-3-1-3" => "Membantu mengelola traffic crawler menuju website Anda",
    "desc-4" => "Lokasi File Robots.txt Dalam Website",
    "desc-4-1" => "Umumnya, lokasi file robots.txt berada dalam direktori utama website (e.g domain root atau homepage). Sebelum Anda menambahkannya, file robots.txt sudah ada di dalam folder root di server penyimpanan file (public_html).",
    "desc-4-2" => "Namun Anda tidak akan menemukan file tersebut ketika membuka public_html. Sebab, file ini bersifat virtual dan tidak dapat dimodifikasi atau diakses dari direktori lain. Untuk mengubah perintah di robots.txt, Anda perlu menambahkan file robots.txt baru dan simpan dalam folder public_html. Dengan cara ini, konfigurasi pada file baru akan menggantikan file sebelumnya.",
    "desc-5" => "Syntax Pada Robots.txt",
    "desc-5-1" => "Syntax robots.txt dapat diartikan sebagai perintah yang Anda gunakan untuk memberi tahu web crawler. Robots.txt generator dari cmlabs juga telah menyediakan syntax yang dikenali web crawler tersebut. Lima istilah yang biasa ditemukan dalam sebuah file robots.txt adalah sebagai berikut:",
    "desc-5-1-1" => "User-Agent",
    "desc-5-1-2" => "Yang dimaksud dengan <i style='font-size: inherit; color:black;'>user-agent</i> dalam robots.txt adalah jenis web crawler spesifik yang Anda beri perintah untuk melakukan perayapan (crawling). Web crawler ini biasanya berbeda-beda tergantung search engine yang digunakan.",
    "desc-5-1-3" => "Beberapa contoh <i style='font-size: inherit; color:black;'>user-agent</i> yang sering digunakan yaitu Googlebot, Googlebot-Mobile, Googlebot-Image, Bingbot, Baiduspider, Gigabot, Yandex, dan sebagainya.",
    "desc-5-2-1" => "Disallow",
    "desc-5-2-2" => "Perintah yang digunakan untuk memberi tahu user-agent agar tidak melakukan perayapan (crawling) pada path URL yang ditentukan. Pastikan Anda telah memasukan path yang tepat, sebab perintah ini membedakan huruf besar/kecil (misal: “/File” dan “/file” dianggap sebagai path berbeda). Anda hanya bisa menggunakan satu perintah “Disallow” untuk tiap URL. ",
    "desc-5-3-1" => "Allow",
    "desc-5-3-2" => "Perintah ini digunakan untuk memberi tahu web crawler bahwa mereka diizinkan untuk mengakses path halaman atau subfolder meskipun halaman induk dari halaman atau subfolder tersebut tidak diizinkan (disallow). Pada praktiknya, perintah allow dan disallow selalu diikuti dengan perintah “directive: [path]” untuk menentukan path yang boleh atau tidak boleh dirayapi. Penulisan path harus benar-benar diperhatikan karena perintah ini membedakan huruf besar/kecil (misal: “/File” dan “/file” dianggap sebagai path berbeda).",
    "desc-5-4-1" => "Crawl-Delay",
    "desc-5-4-2" => "Fungsi perintah ini pada robots.txt adalah untuk memberi tahu web crawler bahwa mereka harus menunggu beberapa saat sebelum memuat dan merayapi (crawl) konten halaman. Perintah ini tidak berlaku untuk Googlebot, namun kecepatan perayapan bisa Anda atur melalui Google Search Console.",
    "desc-5-5-1" => "Sitemap",
    "desc-5-5-2" => "Perintah ini digunakan untuk memanggil lokasi sitemap XML yang terkait dengan suatu URL. Penulisan perintah sitemap juga harus diperhatikan, sebab perintah ini membedakan huruf besar/kecil (misal: “/Sitemap.xml” dan “/sitemap.xml” dianggap sebagai path berbeda).",
    "desc-6" => "Contoh Robots.txt",
    "desc-6-1" => "Setelah memahami perintah yang bisa Anda berikan kepada web crawler, selanjutnya kami akan menunjukkan contoh robots.txt milik website <a href='http://www.example.com/'>www.example.com</a>, yang disimpan dalam direktori <a href='http://www.example.com/robots.txt'>www.example.com/robots.txt</a> berikut:",
    "desc-6-2" => "Baris pertama dan kedua merupakan perintah yang memberi tahu default web crawler bahwa mereka diizinkan untuk merayapi (crawl) URL. Sementara itu, baris ketiga digunakan untuk memanggil lokasi sitemap yang terkait dengan URL tersebut.",
    "desc-6-3" => "Baris keempat dan kelima adalah perintah yang diberikan kepada web crawler milik Google. Perintah tersebut tidak mengizinkan Googlebot untuk merayapi direktori website Anda (melarang Google merayapi (crawl) path file “/nogooglebot”).",
    "desc-7" => "Batasan Robots.txt",
    "desc-7-1" => "Sebelum membuat robots.txt, Anda perlu mengetahui batasan yang dimiliki file robots.txt berikut:",
    "desc-7-1-1" => "Mungkin tidak didukung pada search engine tertentu",
    "desc-7-1-2" => "Meskipun Google dan search engine ternama liannya telah mematuhi perintah dalam file robots.txt, beberapa crawler milik search engine lain mungkin tidak mematuhinya. ",
    "desc-7-2-1" => "Crawler yang berbeda menafsirkan syntax dengan cara berbeda",
    "desc-7-2-2" => "Masing-masing search engine memiliki web crawler yang berbeda, setiap crawler mungkin menafsirkan perintah dengan cara berbeda. Walaupun sejumlah crawler ternama telah mengikuti syntax yang ditulis dalam file robots.txt, namun beberapa crawler mungkin tidak memahami perintah tertentu.",
    "desc-7-3-1" => "Halaman yang tidak diizinkan pada robots.txt masih bisa diindeks jika ditautkan pada halaman lain",
    "desc-7-3-2" => "Meskipun Google tidak merayapi (crawl) atau mengindeks konten yang tidak diizinkan oleh robots.txt, namun Google masih bisa menemukan dan mengindeks URL tersebut jika ditautkan dari website lain. Sehingga, alamat URL dan informasi yang tersedia secara publik bisa muncul di hasil penelusuran Google.",
    "desc-7-3-3" => "Demikian pembahasan mengenai robots.txt generator dari cmlabs. Dengan memanfaatkan tool ini, Anda bisa menyederhanakan alur kerja dalam membuat file robots.txt. Hanya dengan beberapa klik, Anda bisa menambahkan konfigurasi pada file robots.txt yang baru.",
    "whats-new-1" => "Pada versi terbaru ini, kami melengkapi tools Robot TXT Generator dengan fitur export. Fitur ini memudahkan pengguna untuk langsung memeriksa kode di Google Rich Result. Proses merayapi situs web dan meninjau semua konten kini lebih cepat dan tepat. Anda dapat mempelajari lebih dalam tentang fitur ini dengan mencobanya secara langsung.",
    "whats-new-2" => "Pada update versi terbaru ini, kami menambahkan lebih banyak fitur useragent. Fitur ini memungkinkan lebih banyak perintah yang dapat diterima oleh Robot TXT Generator. Sehingga, Robot.txt lebih spesifik dalam memilah mana konten yang ingin Anda tutup dan mana yang ingin Anda tampilkan. Kami berharap pembaruan ini memudahkan pekerjaan Anda.",
];
