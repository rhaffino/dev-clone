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
    "howto-title" => 'Cara Menggunakan Robots.txt Generator',
    "howto1" => '<h2>Cara Menggunakan Robots.txt Generator</h2>
                    <p>Adapun cara membuat file robots.txt menggunakan tool ini adalah sebagai berikut:</p>',
    "howto2" => '<h4 class="sub-titles">Buka Halaman Robots.txt Generator</h4>
                    <p>Salah satu cara membuat file robots.txt yaitu dengan mengunjungi halaman robots.txt generator. Pada halaman tersebut, Anda dapat mengatur perintah yang akan Anda berikan pada web crawler.</p>',
    "howto3" => '<p>Gambar 1: Tampilan halaman robots.txt generator dari cmlabs</p>
                    <h4 class="sub-titles">Pilih Izin Akses Untuk Robot Default</h4>
                    <p>Tentukan izin akses untuk default web crawler apakah mereka diizinkan untuk merayapi (crawl) URL atau tidak. Terdapat dua opsi yang bisa Anda pilih yaitu izinkan (allow) dan jangan izinkan (disallow).</p>',
    "howto4" => '<p>Gambar 2: Tampilan dropdown opsi izin yang diberikan kepada robot default</p>
                    <h4 class="sub-titles">Atur Penundaan Crawl (Crawl Delay)</h4>
                    <p>Anda bisa mengatur berapa lama penundaan perayapan (crawl delay) yang akan dilakukan oleh web crawler. Jika Anda mengatur crawl-delay maka web crawler akan menunggu beberapa waktu sebelum merayapi URL Anda. Robots.txt generator memungkinkan Anda untuk memilih tanpa penundaan crawl atau menunda selama 5 hingga 120 detik.</p>',
    "howto5" => '<p>Gambar 3: Tampilan dropdown opsi penundaan crawl yang diberikan kepada robot default</p>
                    <h4 class="sub-titles">Masukkan Sitemap (Jika Ada)</h4>
                    <p>Sitemap merupakan file yang memuat daftar URL dari website Anda, dengan file ini web crawler akan lebih mudah merayapi (crawl) dan mengindeks situs. Anda bisa memasukkan path sitemap ke dalam field yang disediakan.</p>
                    <p>Pastikan Anda telah memasukkan path sitemap yang tepat, sebab perintah ini membedakan huruf besar/kecil (misal: &#34;/Sitemap.xml&#34; dan &#34;/sitemap.xml&#34; dianggap sebagai path berbeda).</p>',
    "howto6" => '<p>Gambar 4: Tampilan field untuk memasukkan path sitemap yang terkait dengan URL Anda</p>
                    <h4 class="sub-titles">Tambahkan Directive Dalam Robots.txt</h4>
                    <p>Dengan menggunakan robots.txt generator, Anda bisa menambahkan beberapa directive pada file robots.txt dengan menekan tombol <b>&#34;Add Directive&#34;</b>. Directive adalah perintah yang diberikan kepada web crawler untuk memberi tahu apakah Anda mengizinkan atau menolak mereka untuk merayapi URL tertentu.</p>',
    "howto7" => '<p>Gambar 5: Tombol untuk menambahkan perintah yang akan dieksekusi oleh web crawler</p>
                    <p>Pada robots.txt generator, terdapat tiga aturan yang perlu Anda sesuaikan pada bagian directive, yaitu:
                    </p>
                    <h6 class="sub-titles">Atur Izin Akses</h6>
                    <p>Anda bisa mengatur izin akses yang diberikan kepada web crawler, apakah anda mengizinkan atau melarang mereka merayapi halaman web Anda. Opsi yang bisa digunakan yaitu izinkan (allow) dan jangan izinkan (disallow).</p>',
    "howto8" => '<p>Gambar 6: Pilihan izin akses yang akan diberikan kepada web crawler</p>
                    <h6 class="sub-titles">Pilih User-Agent</h6>
                    <p>User-agent adalah jenis web crawler yang akan Anda perintahkan untuk melakukan perayapan (crawling). Pilihan web crawler ini bergantung pada search engine yang digunakan, seperti Baiduspider, Bingbot, Googlebot, dan lainnya. Opsi web crawler dapat dipilih melalui dropdown user-agent yang tersedia.</p>',
    "howto9" => '<p>Gambar 7: Pilihan user agent yang tersedia di cmlabs robots.txt generator</p>
                    <h6 class="sub-titles">Masukkan Direktori / Path File</h6>
                    <p>Direktori atau path file adalah lokasi spesifik dari halaman yang boleh atau tidak boleh dirayapi oleh web crawler. Penulisan path harus benar-benar diperhatikan, sebab perintah ini membedakan huruf besar/kecil (misal: &#34;/File&#34; dan &#34;/file&#34; dianggap sebagai path berbeda).</p>',
    "howto10" => '<p>Gambar 8: Field untuk menambahkan path yang akan dirayapi (crawl) oleh crawler</p>
                    <h4 class="sub-titles">Salin Syntax Robots.txt</h4>
                    <p>Setelah menginputkan perintah untuk web crawler pada field yang disediakan, Anda akan melihat pratinjau file robots.txt pada bagian kanan. Anda bisa menyalin syntax yang telah dihasilkan tersebut dan menempelnya pada file robots.txt yang telah Anda buat.</p>',
    "howto11" => '<p>Gambar 9: Opsi menyalin syntax pada robots.txt generator.</p>
                    <h4 class="sub-titles">Ekspor Syntax Robots.txt</h4>
                    <p>Jika Anda tidak tahu cara membuat file robots.txt sendiri, Anda dapat mengekspor file yang telah dihasilkan cmlabs. Untuk mengunduh file robots tersebut, caranya cukup mudah. Anda bisa memilih opsi <b>&#34;Ekspor&#34;</b> yang terdapat dalam tools robots.text generator. Selanjutnya, tool ini akan memulai pengunduhan dan Anda akan menerima file robots.txt.</p>',
    "howto12" => '<p>Gambar 10: Opsi ekspor data pada robots.txt generator.</p>
                    <h4 class="sub-titles">Hapus Directive yang Tidak Diperlukan</h4>
                    <p>Jika Anda ingin menghapus directive yang tidak dibutuhkan, maka Anda bisa mengklik ikon silang yang ada di sebelah kanan field untuk memasukkan directive tersebut. Perlu diperhatikan, field yang dihapus tidak dapat dipulihkan kembali.</p>',
    "howto13" => '<p>Gambar 11: Opsi hapus data directive pada robots.txt generator</p>
                    <h4 class="sub-titles">Reset Robots.txt Generator</h4>
                    <p>Tool ini memiliki opsi yang memudahkan Anda dalam menemukan cara membuat file robots.txt lainnya. Klik opsi <b>&#34;Reset&#34;</b> untuk menghapus seluruh perintah yang Anda atur dalam robots.txt sebelumnya. Selanjutnya, Anda bisa membuat konfigurasi file robots.txt baru.</p>',
    "howto14" => '<p>Gambar 12: Opsi reset data pada robots.txt generator.</p>',
    "whats-new-1" => "Pada versi terbaru ini, kami melengkapi tools Robot TXT Generator dengan fitur export. Fitur ini memudahkan pengguna untuk langsung memeriksa kode di Google Rich Result. Proses merayapi situs web dan meninjau semua konten kini lebih cepat dan tepat. Anda dapat mempelajari lebih dalam tentang fitur ini dengan mencobanya secara langsung.",
    "whats-new-2" => "Pada update versi terbaru ini, kami menambahkan lebih banyak fitur useragent. Fitur ini memungkinkan lebih banyak perintah yang dapat diterima oleh Robot TXT Generator. Sehingga, Robots.txt lebih spesifik dalam memilah mana konten yang ingin Anda tutup dan mana yang ingin Anda tampilkan. Kami berharap pembaruan ini memudahkan pekerjaan Anda.",
];
