@extends('layouts.master')
@section('title', 'Detail Jurusan RPL')
@section('content')
    <!-- Pengantar Jurusan -->
    <section class="bg-white py-8 ">
        <div class="container mx-auto px-4">
            <div class="flex flex-col gap-6 items-center">
                <div class="w-full">
                    <h2 class="text-2xl font-bold text-gray-800 mb-1">Jurusan</h2>
                    <h3 class="text-xl text-gray-700 mb-2">Rekayasa Perangkat Lunak</h3>
                    <div class="border-b-2 border-black mb-6 w-full"></div>
                <div class="w-full mb-6 flex justify-center">
                    <img
                        src="{{ asset('images/coding3.jpg') }}"
                        alt="Mahasiswa RPL"
                        class="rounded-lg shadow-md"
                        style="width: 400px; height: 250px; object-fit: cover;"
                    >
                </div>
                </div>
                <div class="w-full">
                    <p class="text-gray-600">
                        Rekayasa Perangkat Lunak (RPL) adalah salah satu jurusan dalam rumpun Teknologi Informasi dan Komunikasi (TIK) yang fokus pada pengembangan, perancangan, analisis, implementasi, pengujian, dan pemeliharaan perangkat lunak. Jurusan ini tidak hanya membekali peserta didik dengan keterampilan teknis seperti pemrograman dan database, tetapi juga memperkenalkan mereka pada prinsip-prinsip rekayasa, manajemen proyek, serta metodologi pengembangan perangkat lunak modern seperti Agile, Scrum, dan DevOps.
                    </p>
                    <br>
                    <p class="text-gray-600">Dalam RPL, siswa akan belajar untuk membuat solusi digital dalam bentuk aplikasi desktop, web, mobile, hingga sistem informasi berbasis cloud. Materi yang diajarkan mencakup berbagai bahasa pemrograman (seperti Java, Python, PHP, JavaScript, dan Kotlin), desain UI/UX, struktur data dan algoritma, hingga keamanan siber dan pengujian perangkat lunak (software testing).</p>
                    <br>
                    <p class="text-gray-600">Selain aspek teknis, RPL juga menekankan pada kemampuan analitis, pemecahan masalah, kolaborasi tim, dan komunikasi profesional. Hal ini penting karena pengembangan perangkat lunak sering kali dilakukan secara tim dan membutuhkan pemahaman akan kebutuhan pengguna serta kemampuan untuk menuangkannya ke dalam bentuk solusi digital yang efektif.</p>
                    <br>
                    <p class="text-gray-600">Jurusan ini juga mendorong siswa untuk mengikuti perkembangan teknologi terbaru seperti kecerdasan buatan (AI), machine learning, internet of things (IoT), dan pengembangan berbasis platform modern. Dengan pendekatan ini, lulusan RPL diharapkan tidak hanya siap memasuki dunia kerja sebagai programmer, software engineer, system analyst, QA tester, UI/UX designer, atau devops engineer, tetapi juga mampu berwirausaha di bidang teknologi digital secara mandiri.</p>
                    <br>
                    <p class="text-gray-600">RPL menjadi pilihan tepat bagi siswa yang memiliki minat dalam dunia teknologi, logika, inovasi, dan penciptaan solusi berbasis perangkat lunak. Lulusan jurusan ini sangat dibutuhkan di era digital saat ini karena hampir semua sektor industri memerlukan dukungan sistem informasi dan aplikasi untuk mendukung operasional dan inovasi bisnis mereka.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Fokus Pembelajaran -->
    <section class="bg-gray-50 py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i data-feather="target" class="mr-2"></i> Fokus Pembelajaran
            </h2>
            <div class="border-b-2 border-black mb-6 w-full"></div>
            <p class="mb-6">Jurusan RPL tidak hanya mengajarkan tentang cara membuat software, tetapi juga memahami siklus hidup pengembangan perangkat lunak dari awal hingga akhir. Materi yang dipelajari antara lain:</p>

            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i data-feather="clipboard" class="mr-2 text-purple-600"></i> 1. Perencanaan Sistem
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Identifikasi kebutuhan pengguna dan tujuan pembuatan software</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Penyusunan jadwal pengembangan, anggaran, dan sumber daya</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i data-feather="search" class="mr-2 text-purple-600"></i> 2. Analisis Kebutuhan
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Menentukan fitur dan fungsi yang harus dimiliki aplikasi</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Melakukan survei atau wawancara pengguna untuk mengumpulkan kebutuhan</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i data-feather="layout" class="mr-2 text-purple-600"></i> 3. Perancangan Sistem (Design)
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Mendesain struktur sistem secara umum dan rinci (flowchart, DFD, UML)</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Mendesain tampilan antarmuka pengguna (UI/UX design)</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i data-feather="code" class="mr-2 text-purple-600"></i> 4. Pemrograman (Coding)
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Menulis kode program sesuai desain dan kebutuhan.</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Menggunakan berbagai bahasa pemrograman seperti Java, Python, PHP, JavaScript, dan lainnya.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i data-feather="activity" class="mr-2 text-purple-600"></i> 5. Pengujian Software
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Melakukan pengujian fungsionalitas (unit testing, integration testing).</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Mendeteksi dan memperbaiki bug atau kesalahan dalam program.</span>
                        </li>
                    </ul>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-4 flex items-center">
                        <i data-feather="airplay" class="mr-2 text-purple-600"></i> 6. Implementasi dan Pemeliharaan
                    </h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Menginstal dan menjalankan software pada lingkungan pengguna.</span>
                        </li>
                        <li class="flex items-start">
                            <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                            <span>Melakukan update, perbaikan, dan penyesuaian jika dibutuhkan di masa depan.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Mata Pelajaran Produktif -->
    <section class="bg-white py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i data-feather="book" class="mr-2"></i> Mata Pelajaran Produktif
            </h2>
            <div class="border-b-2 border-black mb-6 w-full"></div>
            <div class="grid md:grid-cols-3 gap-4">
                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="code" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Dasar-Dasar Pemrograman</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="layers" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Pemrograman Berorientasi Objek (PBO)</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="globe" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Pemrograman Web dan Perangkat Bergerak (PWPB)</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="database" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Basis Data</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="figma" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Desain UI/UX</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="server" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Pemrograman Web Dinamis</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="activity" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Analisis dan Perancangan Sistem</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="settings" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Rekayasa Perangkat Lunak</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="check-circle" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Software Testing & Debugging</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="briefcase" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Manajemen Proyek Perangkat Lunak</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="award" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Produk Kreatif dan Kewirausahaan (PKK)</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="monitor" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Pemrograman Desktop</span>
                    </div>
                </div>

                <div class="bg-purple-50 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="shield" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Keamanan Aplikasi</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Teknologi dan Tools -->
    <section class="bg-gray-900 text-white py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-6 flex items-center">
                <i data-feather="tool" class="mr-2"></i> Teknologi dan Tools yang Dipelajari
            </h2>
            <div class="border-b-2 border-white mb-6 w-full"></div>

            <p class="mb-4">Beberapa tools dan teknologi yang biasa diajarkan di jurusan RPL meliputi:</p>
            <ul class="list-disc pl-6 space-y-2 ml-8">
                <li>Database: MySQL</li>
                <li>Bahasa Pemrograman: HTML, CSS, JavaScript, PHP, Java, Python</li>
                <li>Framework: Laravel, Flutter</li>
                <li>Desain UI/UX: Figma</li>
                <li>Version Control: Git</li>
            </ul>
            <div class="overflow-x-hidden mb-8 mt-[50px]">
                <div class="animate-marquee-img whitespace-nowrap" style="gap: 3rem;">
                    @for ($i = 0; $i < 3; $i++)
                        <img src="{{ asset('images/icons/mysql.png') }}" alt="MySQL" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/java.png') }}" alt="JAVA" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/php.png') }}" alt="PHP" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/laravel.png') }}" alt="Laravel" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/flutter.png') }}" alt="Flutter" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/js.jpg') }}" alt="JavaScript" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/html.png') }}" alt="HTML" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/css.png') }}" alt="CSS" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/python.png') }}" alt="Python" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/figma.png') }}" alt="FIGMA" class="h-24 inline-block mx-8">
                        <img src="{{ asset('images/icons/git.png') }}" alt="Git" class="h-24 inline-block mx-8">
                    @endfor
                </div>
            </div>
            <style>
                @keyframes marquee-img {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-33.333%); }
                }
                .animate-marquee-img {
                    display: flex;
                    width: max-content;
                    animation: marquee-img 30s linear infinite;
                    align-items: center;
                }
            </style>

            <style>
                @keyframes marquee-img {
                    0% { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
                .animate-marquee-img {
                    display: flex;
                    width: max-content;
                    animation: marquee-img 30s linear infinite;
                }
            </style>
        </div>
    </section>

    <!-- Prospek Karier -->
    <section class="bg-white py-8">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <i data-feather="briefcase" class="mr-2"></i> Prospek Karier Lulusan RPL
            </h2>
            <div class="border-b-2 border-black mb-6 w-full"></div>

            <p class="mb-6">Lulusan jurusan RPL memiliki prospek kerja yang sangat luas di era digital saat ini. Beberapa pilihan karier meliputi:</p>

            <div class="grid md:grid-cols-3 gap-4 mb-8">
                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="code" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Software Developer / Programmer</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="globe" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Web Developer</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="smartphone" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Mobile App Developer</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="layout" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">UI/UX Designer</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="database" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Database Administrator</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="activity" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">System Analyst</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="settings" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">DevOps Engineer</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="help-circle" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">IT Support</span>
                    </div>
                </div>

                <div class="border border-gray-200 p-4 rounded-lg">
                    <div class="flex items-center mb-2">
                        <i data-feather="check-circle" class="mr-2 text-purple-600"></i>
                        <span class="font-semibold">Software Tester / QA Engineer</span>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 p-6 rounded-lg">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Kelebihan Jurusan RPL</h3>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                        <span>Menyediakan keterampilan yang sangat dibutuhkan di dunia kerja modern.</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                        <span>Cocok untuk siswa yang kreatif, logis, dan suka teknologi.</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                        <span>Berpotensi untuk bekerja secara freelance atau membuka startup sendiri.</span>
                    </li>
                    <li class="flex items-start">
                        <i data-feather="check" class="mr-2 h-5 w-5 text-green-500 mt-0.5"></i>
                        <span>Dapat bekerja remote dari mana saja.</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Script untuk inisialisasi Feather Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
        });
    </script>
@endsection
