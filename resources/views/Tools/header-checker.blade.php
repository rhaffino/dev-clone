@extends('layouts.app')

@section('title', Lang::get('headerchecker.meta-title'))

@section('meta-desc', Lang::get('headerchecker.meta-desc'))

@section('conical','/en/http-header-checker')

@section('en-link')
en/http-header-checker
@endsection

@section('id-link')
id/http-header-checker
@endsection

@if ($local == 'id')
    @php
        $listData = [
        ["title" => "Content-Type", "desc" => "Tunjukkan formulir media"],
        ["title" => "Date", "desc" => "Mengekstrak informasi Tanggal dan Waktu dari respons yang diberikan"],
        ["title" => "Server", "desc" => "Detail mengenai perangkat lunak server"],
        ["title" => "Set Cookie", "desc" => "Mendistribusikan cookie server ke klien"],
        ["title" => "Connection", "desc" => "Mengelola koneksi jaringan"],
        ["title" => "Content-Encoding", "desc" => "Menunjukkan jenis kompresi"],
        ["title" => "Vary", "desc" => "Menjelaskan proses untuk memutuskan apakah akan menggunakan data yang di-cache alih-alih meminta respons baru dari server"],
        ["title" => "Cache Control", "desc" => "Memberikan informasi tentang pilihan cache dalam permintaan dan respons"],
        ["title" => "Transfer-Encoding", "desc" => "Pengkodean yang digunakan untuk transfer data"],
        ["title" => "Expires", "desc" => "Menunjukkan kapan respons menjadi usang"],
        ["title" => "Content-Length", "desc" => "Menentukan ukuran sumber daya dalam byte"],
        ["title" => "X-Powered-By", "desc" => "Potensi penggunaan oleh Hosting dan Framework Server Backend yang dapat mengekspos detail sensitif seperti versi dan perangkat lunak"],
        ["title" => "Link", "desc" => "Menserialisasikan beberapa tautan dalam header HTTP"],
        ["title" => "Pragma", "desc" => "Berbagai implementasinya yang terkait dengan caching"],
        ["title" => "Keep-Alive", "desc" => "Mendefinisikan durasi di mana sebuah continuous tetap aktif"],
        ["title" => "Last-Modified", "desc" => "Tanggal modifikasi terbaru dari sumber daya yang membantu dalam caching"],
        ["title" => "X-Content-Type-Options", "desc" => "Menonaktifkan MIME Sniffing untuk memaksa browser mengikuti jenis yang ditunjukkan dalam ‘Content-Type'"],
        ["title" => "ETag", "desc" => "Tag Validasi Cache: Selain itu berfungsi untuk memantau pengguna yang menonaktifkan cookie"],
        ["title" => "X-Frames-Options", "desc" => "Menentukan apakah browser harus menampilkan halaman dalam iFrame"],
        ["title" => "Strict-Transport-Security", "desc" => "Menerapkan penggunaan HTTPS untuk komunikasi (bukan HTTP)"],
        ["title" => "X-XSS-Protection", "desc" => "Mengaktifkan pemfilteran untuk mencegah Cross Site Scripting (XSS)"],
        ["title" => "Expect-CT", "desc" => "Melaporkan dan menerapkan Certificate Transparency, mencegah penggunaan sertifikat yang dikeluarkan secara tidak benar untuk situs yang ada di log CT publik"],
        ["title" => "Accept-Ranges", "desc" => "Dapat merespons permintaan untuk bagian tertentu dari sebuah file, yang juga dikenal sebagai 'byte-range requests'"],
        ["title" => "X-Cache", "desc" => "Digunakan oleh CDN untuk menunjukkan apakah sumber daya dalam cache CDN cocok dengan yang ada di server"],
        ["title" => "set-cookie", "desc" => "Mentransfer cookie dari server ke klien"],
        ["title" => "Age", "desc" => "Durasi dalam hitungan detik saat sumber daya telah disimpan dalam cache proxy"],
        ["title" => "Upgrade", "desc" => "Salah satu metode untuk bertransisi dari HTTP ke HTTPS"],
        ["title" => "Content-Language", "desc" => "Menjelaskan bahasa yang dimaksudkan untuk dokumen"],
        ["title" => "Content-Security-Policy CSP", "desc" => "Mengelola sumber daya mana yang diizinkan untuk dimuat oleh klien untuk halaman"],
        ["title" => "Alt-Svc", "desc" => "Menyebutkan pendekatan alternatif untuk mengakses layanan"],
        ["title" => "Access-Control-Allow-Origin", "desc" => "Menunjukkan apakah respons dapat dibagikan"],
        ["title" => "Referrer-Policy", "desc" => "Menetapkan aturan yang mengatur bagaimana informasi pengarah yang disediakan di header pengarah disertakan dengan permintaan"],
        ["title" => "X-Request-Id", "desc" => "ID permintaan yang berbeda yang menghubungkan permintaan HTTP antara klien dan server"],
        ["title" => "X-Dc", "desc" => "Mengacu pada kode atau pengenal yang menunjukkan pusat data atau lokasi server tempat permintaan HTTP tertentu diproses atau dilayani"],
        ["title" => "X-Cache-Hits", "desc" => "Data berhasil ditemukan di memori cache"],
        ["title" => "X-Varnish", "desc" => "ID permintaan saat ini dan ID permintaan yang mengisi cache Varnish"],
        ["title" => "X-Generator", "desc" => "Mengekspos informasi / meta data tentang situs seperti versi perangkat lunak"],
        ["title" => "X-Powered-CMS", "desc" => "Memperlihatkan nama dan versi CMS"],
        ["title" => "X-Server-Cache", "desc" => "Berkaitan dengan masalah cache non-standar"],
        ["title" => "Cache-control", "desc" => "Menentukan mekanisme untuk caching dalam request dan respons"],
        ["title" => "X-Server-Powered-By", "desc" => "Mengungkapkan informasi perangkat lunak sisi server"],
        ["title" => "X-Host", "desc" => "Header host non-standar"],
        ["title" => "X-Nginx-Cache-Status", "desc" => "Header untuk cache Nginx"]
        ];
    @endphp
@else
    @php
    $listData = [
        [
            'title' => 'Content-Type',
            'desc' => 'Indicate the form of media',
        ],
        [
            'title' => 'Date',
            'desc' => 'Extract the Date and Time information from the given response',
        ],
        [
            'title' => 'Server',
            'desc' => 'Details regarding the server software',
        ],
        [
            'title' => 'Set Cookie',
            'desc' => 'Distributes cookie the server to the client',
        ],
        [
            'title' => 'Connection',
            'desc' => 'Manages the network connection',
        ],
        [
            'title' => 'Content-Encoding',
            'desc' => 'Indicates the type of compression',
        ],
        [
            'title' => 'Vary',
            'desc' => 'Explains the process of deciding whether to utilize cached data instead of requesting a new response from the server',
        ],
        [
            'title' => 'Cache Control',
            'desc' => 'Provides information about caching choices in request and response',
        ],
        [
            'title' => 'Transfer-Encoding',
            'desc' => 'The encode utilized for data transfer',
        ],
        [
            'title' => 'Expires',
            'desc' => 'Indicating when the response becomes outdated',
        ],
        [
            'title' => 'Content-Length',
            'desc' => 'Specifying the resource size in bytes',
        ],
        [
            'title' => 'X-Powered-By',
            'desc' => 'Potential usage by Hosting and Backend Server Frameworks that could expose sensitive details like version and software',
        ],
        [
            'title' => 'Link',
            'desc' => 'Serializing multiple links within HTTP headers',
        ],
        [
            'title' => 'Pragma',
            'desc' => 'Its various implementations tied to caching',
        ],
        [
            'title' => 'Keep-Alive',
            'desc' => 'Defines the duration for which a continuous remains active',
        ],
        [
            'title' => 'Last-Modified',
            'desc' => 'The date of latest modification of a resource which aids in caching',
        ],
        [
            'title' => 'X-Content-Type-Options',
            'desc' => 'Turns off MIME Sniffing to compel the browser to follow the type indicated in the "Content-Type"',
        ],
        [
            'title' => 'CF-RAY',
            'desc' => 'CloudFlare Header. Encodes a hashed value that contains details about the data center and the request',
        ],
        [
            'title' => 'ETag',
            'desc' => 'Cache Validation Tag: Additionally serves for monitoring users who have cookies disabled',
        ],
        [
            'title' => 'X-Frames-Options',
            'desc' => 'Determines if the browser ought to display the page within an iFrame',
        ],
        [
            'title' => 'CF-Cache-Status',
            'desc' => 'CloudFlare header indicates whether a resource is stored in the cache',
        ],
        [
            'title' => 'Accept-Ranges',
            'desc' => 'Can respond to requests for specific portions of a file, also known as "byte-range requests."',
        ],
        [
            'title' => 'Strict-Transport-Security',
            'desc' => 'Enforce the use of HTTPS for communication (not HTTP)',
        ],
        [
            'title' => 'X-XSS-Protection',
            'desc' => 'Activate filtering to prevent Cross Site Scripting (XSS)',
        ],
        [
            'title' => 'Expect-CT',
            'desc' => 'Report and enforce Certificate Transparency, preventing the usage of improperly issued certificates for the site are present in public CT logs',
        ],
        [
            'title' => 'X-Cache',
            'desc' => 'Employed by CDNs to indicate whether the resource in the CDN cache matches the one on the server',
        ],
        [
            'title' => 'Set-Cookie',
            'desc' => 'Transfer cookies from the server to the client',
        ],
        [
            'title' => 'Age',
            'desc' => 'Duration in seconds that a resource has been stored in the proxy cache',
        ],
        [
            'title' => 'Upgrade',
            'desc' => 'One method to transition from HTTP to HTTPS',
        ],
        [
            'title' => 'Content-Language',
            'desc' => 'Describes the intended language(s) for the document',
        ],
        [
            'title' => 'P3P',
            'desc' => 'A privacy protocol that saw limited adoption',
        ],
        [
            'title' => 'Content-Security-Policy CSP',
            'desc' => 'Manage which resources the client is permitted to load for the page',
        ],
        [
            'title' => 'Via',
            'desc' => 'Appended by proxies, useful for both forward and reverse proxies (requests and responses)',
        ],
        [
            'title' => 'Alt-Svc',
            'desc' => 'Enumerate alternative approaches to access the service',
        ],
        [
            'title' => 'X-AspNet-Version',
            'desc' => 'Specifies the version of ASP.NET currently in use',
        ],
        [
            'title' => 'Access-Control-Allow-Origin',
            'desc' => 'Indicates whether the response can be shared',
        ],
        [
            'title' => 'X-UA-Compatible',
            'desc' => 'Compatibility header for older versions of Microsoft Internet Explorer (IE) and Edge',
        ],
        [
            'title' => 'Referrer-Policy',
            'desc' => 'Establish rules governing how referrer information provided in the referrer header is included with request',
        ],
        [
            'title' => 'Report-To',
            'desc' => 'Header utilized to include troubleshooting information',
        ],
        [
            'title' => 'NEL',
            'desc' => 'Offer developers an option to configure network error reporting',
        ],
        [
            'title' => 'X-Download-Options',
            'desc' => 'Exclusive to IE8, prevents downloads from opening directly in the browser',
        ],
        [
            'title' => 'X-Permitted-Cross-Domain-Policies',
            'desc' => 'Refers to a security directive that outlines which types of cross-domain interactions are allowed for a web application.',
        ],
        [
            'title' => 'X-Proxy-Cache',
            'desc' => 'Active caching within the NGINX reverse proxy',
        ],
        [
            'title' => 'Etag',
            'desc' => 'Employed for HTTP Cache validation and condition requests through If-Match and Id-None-Match',
        ],
        [
            'title' => 'X-Request-Id',
            'desc' => 'Distinct request ID that links HTTP requests between a client and a server',
        ],
        [
            'title' => 'X-Cacheable',
            'desc' => 'Unconventional header linked to caching, with usage differing across various proxy and CDN networks',
        ],
        [
            'title' => 'X-Dc',
            'desc' => 'Refers to a code or identifier that indicates the data center or server location where a particular HTTP request is being processed or served from.',
        ],
        [
            'title' => 'X-Sorting-Hat-PodId',
            'desc' => 'Related to Shopify',
        ],
        [
            'title' => 'X-Shopify-Stage',
            'desc' => 'Related to Shopify',
        ],
        [
            'title' => 'X-ShopId',
            'desc' => 'Related to Shopify',
        ],
        [
            'title' => 'X-Sorting-Hat-ShopId',
            'desc' => 'Related to Shopify',
        ],
        [
            'title' => 'X-ShardId',
            'desc' => 'Related to Shopify',
        ],
        [
            'title' => 'X-Alternate-Cache-Key',
            'desc' => 'Related to Shopify',
        ],
        [
            'title' => 'X-Cache-Hits',
            'desc' => 'Data successfully located in cache memory',
        ],
        [
            'title' => 'X-Varnish',
            'desc' => 'ID of the current request and the ID of the request that populated the Varnish cache',
        ],
        [
            'title' => 'X-Pass-Why',
            'desc' => 'Provides reason for a "MISS" result in the x-cache',
        ],
        [
            'title' => 'X-Generator',
            'desc' => 'Exposes information/meta data about the site such as version of software',
        ],
        [
            'title' => 'X-Cache-Group',
            'desc' => 'Tags the clients about the cache-group to which they belong',
        ],
        [
            'title' => 'X-Powered-By-Plesk',
            'desc' => 'Plesk Hosting Software',
        ],
        [
            'title' => 'X-AspNetMvc-Version',
            'desc' => 'Shows the version of the framework',
        ],
        [
            'title' => 'X-Powered-CMS',
            'desc' => 'Exposes name and version of CMS',
        ],
        [
            'title' => 'X-Served-By',
            'desc' => 'Caching related',
        ],
        [
            'title' => 'expires',
            'desc' => 'Constains the date/time after which the response object is considered stale',
        ],
        [
            'title' => 'X-Amz-Cf-Pop',
            'desc' => 'Amazon CloudFront',
        ],
        [
            'title' => 'X-Amz-Cf-Id',
            'desc' => 'Amazon CloudFront ID (CloudFront requires this information for debugging)',
        ],
        [
            'title' => 'X-Drupal-Cache',
            'desc' => 'Indicates if request was served from Drupal Cache (Hit or Miss)',
        ],
        [
            'title' => 'X-Xss-Protection',
            'desc' => 'Internet explorer header compatibility filter for blocking XSS',
        ],
        [
            'title' => 'Server-Timing',
            'desc' => 'Conveys information for request-response cycle',
        ],
        [
            'title' => 'content-encoding',
            'desc' => 'Header specificity compression (gzip / compress / deflates etc)',
        ],
        [
            'title' => 'X-Timer',
            'desc' => 'A "Fastly" header: end to end request timing information',
        ],
        [
            'title' => 'X-Runtime',
            'desc' => 'Reveals time application takes to serve a request',
        ],
        [
            'title' => 'X-ac',
            'desc' => 'Wordpress.com related',
        ],
        [
            'title' => 'Host-Header',
            'desc' => 'Maybe same as "Host": header ?',
        ],
        [
            'title' => 'Access-Control-Allow-Headers',
            'desc' => 'It allows the web page to include specific HTTP headers in the request when making a cross-origin request (a request to a different domain).',
        ],
        [
            'title' => 'server',
            'desc' => 'Information, including software version, utilized by server',
        ],
        [
            'title' => 'date',
            'desc' => 'Point in time when the HTTP response was generated and sent from the server. It provides information about when the server responded to the client\'s request.',
        ],
        [
            'title' => 'X-hacker',
            'desc' => 'Recruitment advertisement from automattic.com',
        ],
        [
            'title' => 'Access-Control-Allow-Methods',
            'desc' => 'It defines which types of interactions are permitted between different domains, ensuring controlled and secure communication.',
        ],
        [
            'title' => 'X-Litespeed-cache',
            'desc' => 'The term "X-Litespeed-cache" in an HTTP Header context refers to a marker or indicator that provides information about caching mechanisms utilized by the LiteSpeed web server.',
        ],
        [
            'title' => 'X-Turbo-Charged-By',
            'desc' => 'Added in the presence of Cloudflare usage',
        ],
        [
            'title' => 'strict-transport-security',
            'desc' => 'HSTS instructs the browser to utilize HTTPS rather than HTTP',
        ],
        [
            'title' => 'etag',
            'desc' => 'Identification an object (including version) for caching intentions',
        ],
        [
            'title' => 'X-Robots-Tag',
            'desc' => 'Allow selection of content accessible for search engines to index on the site',
        ],
        [
            'title' => 'X-seen-By',
            'desc' => 'It gives insight into the route the request or response has taken through various network nodes.',
        ],
        [
            'title' => 'X-Wix-Request-Id',
            'desc' => 'Identification for WIX hosting requests',
        ],
        [
            'title' => 'x-contextid',
            'desc' => 'The term "x-contextid" in an HTTP Header context likely represents a unique identifier or token associated with a specific context or session.',
        ],
        [
            'title' => 'X-Mod-Pagespeed',
            'desc' => 'Apache (and nginx) module for enhanced performance',
        ],
        [
            'title' => 'X-Cache-Status',
            'desc' => 'The term "X-Cache-Status" in an HTTP Header context indicates whether the response was retrieved from a cache or generated directly by the server.',
        ],
        [
            'title' => 'Status',
            'desc' => 'Non-standard HTTP response status (Status: 200 OK)',
        ],
        [
                    'title' => 'X-Server-Cache',
            'desc' => 'Pertaining to non-standard caching matters',
        ],
        [
            'title' => 'x-ray',
            'desc' => 'Associated with Cloudflare',
        ],
        [
            'title' => 'Cache-control',
            'desc' => 'Specifies mechanisms for caching in request and responses',
        ],
        [
            'title' => 'X-Cache-Enabled',
            'desc' => 'Indicates if caching is enabled (True / False)',
        ],
        [
            'title' => 'Access-Control-Allow-Credentials',
            'desc' => 'Header instructs the browser whether to expose the response to frontend Javascript',
        ],
        [
            'title' => 'X-Server-Powered-By',
            'desc' => 'Reveals server-side software information',
        ],
        [
            'title' => 'X-Adblock-Key',
            'desc' => 'Employed by websites to bypass ad blocker plugins',
        ],
        [
            'title' => 'X-Host',
            'desc' => 'Non-standard host header',
        ],
        [
            'title' => 'X-Nginx-Cache-Status',
            'desc' => 'Header for Nginx caching',
        ],
    ];
    @endphp
@endif

@section('content')
@if ($is_maintenance)
    @include('components.maintenance')
@else
<div class="container container-tools mb-10">
    <div class="d-flex flex-column-fluid">
        <div class="container-fluid px-0">
            <div class="d-flex justify-content-between">
                <div>
                    <h1 class="text-darkgrey font-weight-normal">@lang('headerchecker.title')</h1>
                    <p class="text-darkgrey h4 font-weight-normal mb-10">@lang('headerchecker.sub-title')</p>
                </div>
                <div class="d-lg-block d-none">
                    <a href="https://chromewebstore.google.com/detail/http-header-checker-cmlab/anheghnibajoikjegiciidlmnnffecha"
                        target="_blank" rel="noopener noreferrer noindex"
                        class="btn button-outline button-primary-70 b1-400">
                        <i class="bx text-primary-70 bx-extension"></i>
                        @lang('home.get-extension')
                    </a>
                </div>
            </div>

            @include('components.alert_limit')

            <div class="header-blue mt-10 mb-5 px-5 py-1">
                <input type="hidden" id="#count-tools" autocomplete="off" value="{{ $access_count }}" >
                <div class="row d-flex align-items-center">
                    <div class="col-sm-9 col-md-10 col-lg-9 col-xl-10 d-flex align-items-center py-1">
                        <i id="empty-url" class='bx bxs-shield text-white bx-md mr-3'></i>
                        <i id="secure-url" class='bx bxs-check-shield text-white bx-md mr-3' style="display: none"></i>
                        <i id="unsecure-url" class='bx bxs-shield-x text-white bx-md mr-3' style="display: none"></i>
                        <input type="url" class="form-control lookup-url" name="" value="" placeholder="@lang('headerchecker.headerchecker-placeholder')" id="input-url" autocomplete="off">
                    </div>
                    <div class="col-sm-3 col-md-2 col-lg-3 col-xl-2 d-flex justify-content-end py-1">
                        @if (session()->has('logged_in') || session()->get('logged_in') == 'true')
                            <button id="crawl-btn" type="button" class="btn btn-crawl" name="button" data-theme="dark">@lang('headerchecker.headerchecker-btn')</button>
                        @elseif (isset($access_limit) && $access_limit > 0)
                            <button disabled="disabled" type="button" class="btn btn-crawl" name="button" data-toggle="tooltip" data-theme="dark" title="@lang('headerchecker.headerchecker-btn-tooltip')">@lang('headerchecker.headerchecker-btn')</button>
                        @else
                            <button id="crawl-btn" class="next-button" style="display: none"></button>
                            <button id="process-button" type="button" class="btn btn-crawl check-limit-button analysist-button-guest" name="button" data-toggle="tooltip" data-theme="dark" title="@lang('headerchecker.headerchecker-btn-tooltip')">@lang('headerchecker.headerchecker-btn')</button>
                        @endif
                        {{-- <button id="crawlButtonDisabled" type="button" class="btn btn-crawl-disabled" name="button" data-toggle="tooltip" data-theme="dark" title="Currently your are reached the limit!">PLEASE WAIT 59:12</button>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="px-2 mb-3 d-flex">
                        <span class="text-black font-15px font-weight-bolder mr-2">@lang('headerchecker.result')</span>
                        <span class="font-15px font-weight-bolder d-flex align-items-center" id="http-header-result-status"></span>
                    </div>
                    <div class="card card-custom" id="http-header-result-container">
                        <div class="card-body py-4 px-0">
                            <div class="" id="http-header-empty">
                                <div class="text-center">
                                    <p class="d-block">@lang('headerchecker.result-none')</p>
                                    <a href="#seo-booster" class="links">@lang('layout.learn-how-to-use')</a>
                                </div>
                            </div>
                            <div class="http-header-result-list mx-5 my-2" id="http-header-result-list" style="display: none">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="local-collection-desktop" class="local-collection">
                        <div class="local-collection-header d-flex justify-content-between px-2 mb-3">
                            <div class="d-flex flex-row align-items-center">
                                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                                <span class="text-black font-15px">@lang('layout.local-history')</span>
                            </div>
                            <div>
                                <span class="clear-all font-15px pointer mr-3 clear-history--btn">@lang('layout.clear-all')</span>
                            </div>
                        </div>
                        <div class="local-collection-body">
                            <ul class="list-group flex-column-reverse" id="local-history">
                            </ul>
                        </div>
                    </div>
                    <div class="desktop-version">
                        <div class="accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
                            <div class="card bg-transparent" style="">
                                <div class="card-header" id="headingOne2">
                                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                                        @lang('layout.version') 1.0
                                    </div>
                                </div>
                                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                                    <div class="card-body">
                                        <p>@lang('headerchecker.highlight')</p>
                                        <div class="d-flex align-items-center">
                                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 21 Aug, 2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="w-100">
    <div class="local-collection-mobile bg-white py-5">
        <div class="local-collection-header d-flex justify-content-between mb-3 w-100 px-5">
            <div class="d-flex flex-row align-items-center">
                <i class='bx bxs-collection bx-sm text-darkgrey mr-2'></i>
                <span class="text-black font-15px">@lang('layout.local-history')</span>
            </div>
            <div>
                <span class="clear-all font-15px pointer clear-history--btn">@lang('layout.clear-all')</span>
            </div>
        </div>
        <div class="local-collection-body mt-3 px-5 d-flex flex-wrap-reverse" id="local-history-mobile"></div>
        <div id="mobile-version" class="px-5 accordion accordion-light accordion-toggle-arrow custom-features-accordion" id="accordionExample2">
            <div class="card bg-transparent" style="">
                <div class="card-header" id="headingOne2">
                    <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseOne2">
                        @lang('layout.version') 1.0
                    </div>
                </div>
                <div id="collapseOne2" class="collapse" data-parent="#accordionExample2">
                    <div class="card-body">
                        <p>@lang('headerchecker.highlight')</p>
                        <div class="d-flex align-items-center">
                            <i class='bx bxs-check-circle text-darkgrey mr-1'></i>
                            <span class="text-darkgrey h6 mb-0">@lang('layout.updated') 21 Aug, 2023</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@component('layouts.new_ui_design', ['local' => $local, 'blogs' => $blogs, 'seo_terms' => $seo_terms, 'seo_guidelines' => $seo_guidelines])
    @slot('title', 'HTTP Header Checker')
    @slot('subcontent_1')
        <div class="" id="description-tab-1">
            <h2 class="text-black">@lang('headerchecker.desc-1')</h2>
            <p class="text-black">@lang('headerchecker.desc-1-1')</p>
            <p class="text-black">@lang('headerchecker.desc-1-2')</p>
            <p class="text-black">@lang('headerchecker.desc-1-3')</p>
        </div>
    @endslot
    @slot('subcontent_2')
        <div class="d-none" id="description-tab-2">
            <p class="text-black">@lang('headerchecker.desc-1-4')</p>
            <p class="text-black">@lang('headerchecker.desc-1-5')</p>
            <p class="text-black">@lang('headerchecker.desc-1-6')</p>
            <p class="text-black">@lang('headerchecker.desc-1-7')</p>
            <h2 class="text-black">@lang('headerchecker.desc-2')</h2>
            <p class="text-black">@lang('headerchecker.desc-2-1')</p>
            <ul>
                <li><p class="text-black">@lang('headerchecker.desc-2-1-1')</p></li>
                <li><p class="text-black">@lang('headerchecker.desc-2-1-2')</p></li>
                <li><p class="text-black">@lang('headerchecker.desc-2-1-3')</p></li>
                <li><p class="text-black">@lang('headerchecker.desc-2-1-4')</p></li>
            </ul>
            <h2 class="text-black">@lang('headerchecker.desc-table-title')</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">HTTP Header</th>
                            <th scope="col">@lang('headerchecker.table-header')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach (collect($listData)->chunk(2) as $index => $item)
                        @foreach ($item as $listTable)
                        <tr>
                            <th scope="row">{!! $listTable['title'] !!}</th>
                            <td>{!! $listTable['desc'] !!}</td>
                        </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    @endslot
    @slot('how_to_content')
        <div class="d-none" id="how-to">
            @lang('headerchecker.howto-title')
            @lang('headerchecker.howto1')
            <div class="expand-text">
                @lang('headerchecker.howto2')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_1.webp')}}" alt="HowTo-http_header-1" width="80%">
                @lang('headerchecker.howto3')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_2.webp')}}" alt="HowTo-http_header-2" width="80%">
                @lang('headerchecker.howto4')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_3.webp')}}" alt="HowTo-http_header-3" width="80%">
                @lang('headerchecker.howto5')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_4.webp')}}" alt="HowTo-http_header-4" width="80%">
                @lang('headerchecker.howto6')
                @lang('headerchecker.howto7')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_5.webp')}}" alt="HowTo-http_header-5" width="80%">
                @lang('headerchecker.howto8')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_6.webp')}}" alt="HowTo-http_header-6" width="80%">
                @lang('headerchecker.howto9')
                <img class="mb-4" src="{{asset('/media/images/http_header_instruction_7.webp')}}" alt="HowTo-http_header-7" width="80%">
                @lang('headerchecker.howto10')
            </div>
        </div>
    @endslot
    @slot('read_more')
        <p class="b1-400 b1-m-400 read-more" id="read-more-button">@lang('layout.read-more')</p>
    @endslot
@endcomponent
@endsection

@push('script')
<script type="text/javascript">
    $('#toggle_button_webmaster').click();
    $('a[href*="#"]:not([href="#"])').click(function() {
        var offset = -80;
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top + offset
                }, 400);
                return false;
            }
        }
    });
</script>
<script>
    const HTTP_HEADER_CHECK_API_URL = "{{ route('api.header-checker') }}";
</script>
<script src="{{asset('js/logic/header-checker.js')}}"></script>
<script type="application/ld+json">
    {
        "@context": "https://schema.org/",
        "@type": "BreadcrumbList",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "name": "@lang('layout.home')",
            "item": "{{url('/')}}/{{$local}}"
        }, {
            "@type": "ListItem",
            "position": 2,
            "name": "HTTP Header Checker",
            "item": "{{url('/')}}/{{$local}}/http-header-checker"
        }]
    }
</script>
@if (!session()->has('logged_in') || session()->get('logged_in') != 'true' && $access_limit <= 0)
    <script>
        $(function(){
            $('.check-limit-button').on('click', function(e) {
                var process_clicked = false;
                const submitbtn = document.querySelector(".analysist-button-guest");
                const alertLimit = document.getElementById('alert-limit');
                const toolsCount = document.getElementById("#count-tools");
                const countValue = document.getElementById("#count-tools").value;
                const loginModal = document.getElementById('loginModal');
                let totalClicked = parseInt(countValue) + 1;

                toolsCount.value = totalClicked;
                if(toolsCount.value <= 5){
                    e.preventDefault();
                    $.post('{{ route("api.count") }}', {
                        _token: $('meta[name=csrf-token]').attr('content'),
                    });
                    process_clicked = true; 
                    $('.next-button').trigger('click');
                    loginModal.innerHTML = `
                    <div
                        class="modal fade"
                        id="login-modal"
                        tabindex="-1"
                        role="dialog"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content" style="border-radius:16px">
                                <div class="modal-header border-0 pb-2">
                                    <h1 class="font-weight-bolder">
                                        @lang('modal.modal-login-title')
                                    </h1>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <i class="pb-2 bx bx-x bx-md"></i>
                                    </button>
                                </div>
                                <div class="modal-body py-2">
                                    @lang('modal.modal-login-text')
                                </div>
                                <div class="p-7">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-5">
                                            <a
                                                href="{{ env('MAIN_URL', 'https://cmlabs.co') }}/{{ App::isLocale('id') ? 'id-id' : 'en' }}/login/?logged_target={{ request()->url() }}"
                                                class="btn btn-primary btn-sm btn-block font-weight-bolder"
                                            >
                                                Continue
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `
                }else if(toolsCount.value == 6){
                    e.preventDefault();
                    $.post('{{ route("api.count") }}', {
                        _token: $('meta[name=csrf-token]').attr('content'),
                    });
                    submitbtn.disabled = true;
                    alertLimit.innerHTML = `
                    <div class="alert alert-limit d-flex justify-content-between align-items-center" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">
                    <div class=" d-flex align-items-center mr-2" style="color: #C29C13;">
                        <i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i> @lang('alert.alert-limit')
                    </div>
                        <a href="{{ env('MAIN_URL', 'https://cmlabs.co') }}/{{ App::isLocale('id') ? 'id-id' : 'en' }}/login/?logged_target={{ request()->url() }}" style="color: #C29C13; font-weight: 700;">Login</a>
                    </div>`
                    $(function(){
                        $('#login-modal').modal('show');
                    });
                }
                else{
                    if (process_clicked) {
                    process_clicked = false;
                    $('.next-button').trigger('click');
                    return;
                }
                e.preventDefault();
                $.post('{{ route("api.limit") }}', {
                    logged_target: '{{ request()->url() }}',
                    _token: $('meta[name=csrf-token]').attr('content'),
                }, function (response) {
                    if (response.statusCode === 200) {
                        if (response.data.limit == 1) {
                            var alert_html = '<div class="alert alert-limit d-flex justify-content-between align-items-center" role="alert" style="border-color: #C29C13; background-color: #FFF8DF; margin-bottom: 32px;">' + 
                                '<div class="d-flex align-items-center mr-2" style="color: #C29C13;">'+ 
                                    '<i class="icon pr-2 bx bxs-error-circle bx-sm"  style="color: #C29C13;"></i>' + 
                                    response.data.message + 
                                '</div>' + 
                                '<a href="'+ response.data.logged_target +'" style="color: #C29C13; font-weight: 700;">Login</a>' +
                            '</div>';
                            $('#alert-limit').html(alert_html);
                        } else {
                            process_clicked = true; 
                            $('.check-limit-button').trigger('click');
                        }
                    }
                });}
            });
        });
    </script>
@endif
<script>
    // Get the element by its id
    const read_more_button = document.getElementById('read-more-button');
    const description_1 = document.getElementById('description-tab-1');
    const description_2 = document.getElementById('description-tab-2');
    const how_to = document.getElementById('how-to');
    let read = false;

    // Add a click event listener
    read_more_button.addEventListener('click', function() {
        if(!read){
            description_1.style.display = 'block';
            description_2.style.display = 'block';
            how_to.style.display = 'block';
            description_1.classList.remove("d-none");
            description_2.classList.remove("d-none");
            how_to.classList.remove("d-none");
            read_more_button.innerHTML = @json( __('layout.show-less') );
            read = true;
        } else {
            description_2.style.display = 'none';
            how_to.style.display = 'none';
            description_2.classList.add("d-none");
            how_to.classList.add("d-none");
            read_more_button.innerHTML = @json( __('layout.read-more') );
            read = false;
        }
    });
</script>
@endpush

@push('style')
<link rel="stylesheet" href="{{asset('css/header-checker.css')}}">
@endpush

@section('header-checker')
active
@endsection

@section('test-n-checker')
active
@endsection