<!-- Hero Section -->
<section id="beranda" class=" bg-gray-50 shadow-sm" data-aos="fade-up">
    <div
        class="container mx-auto flex flex-col-reverse lg:flex-row items-center pt-12 pb-56 px-4 lg:px-28">
        <!-- Text Content -->
        <div class="lg:w-1/2 space-y-6 text-left">
            <!-- Badge -->
            <div
                class="w-fit small-badge flex flex-row bg-gray-100 rounded-full py-2 px-3 gap-x-2 items-center">
                <svg
                    width="25"
                    height="25"
                    viewBox="0 0 25 25"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.5 22.5C18.0228 22.5 22.5 18.0228 22.5 12.5C22.5 6.97715 18.0228 2.5 12.5 2.5C6.97715 2.5 2.5 6.97715 2.5 12.5C2.5 18.0228 6.97715 22.5 12.5 22.5Z"
                        stroke="#080C2E"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M8.50001 3.5H9.50001C7.55001 9.34 7.55001 15.66 9.50001 21.5H8.50001"
                        stroke="#080C2E"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M15.5 3.5C17.45 9.34 17.45 15.66 15.5 21.5"
                        stroke="#080C2E"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M3.5 16.5V15.5C9.34 17.45 15.66 17.45 21.5 15.5V16.5"
                        stroke="#080C2E"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M3.5 9.50001C9.34 7.55001 15.66 7.55001 21.5 9.50001"
                        stroke="#080C2E"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <p class="text-xs sm:text-xs font-semibold">
                    Cari Lowongan Kerja? Temui Peluang Karir Yang Sesuai Denganmu Disini
                </p>
            </div>

            <!-- Title -->
            <h1
                class="text-3xl lg:text-5xl font-black text-gray-800 mb-6 leading-normal lg:leading-normal">
                SELAMAT DATANG DI
                <span
                    class="text-purple-500 bg-purple-200 px-2 py-0 rounded-lg inline-block">
                    WEBSITE BKK
                </span>
                SMKN 1 PANGKALAN KERINCI
            </h1>

            <!-- Subtitle -->
            <p
                class="text-gray-600 text-sm lg:text-base text-start italic leading-normal lg:leading-relaxed">
                <?php if (!empty($data['beranda']) && isset($data['beranda']['title'])): ?>
                    <?= $data['beranda']['title'] ?>
                <?php else: ?>
                    "Proses mencari pekerjaan mungkin panjang, tapi percayalah, usaha
                    yang tak kenal lelah akan membawa hasil."
                <?php endif; ?>
            </p>

            <!-- Buttons -->
            <div class="flex flex-row justify-start gap-4">
                <!-- Get Started Button -->
                <a href="<?= base_url ?>/#tentang-kami"
                    class="bg-purple-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-purple-600 hover:shadow-xl transition duration-200 mb-4 lg:mb-0">
                    Get Started
                </a>

                <!-- Video Button -->
                <button
                    id="videoButton"
                    class="border-2 border-yellow-500 text-yellow-500 px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-500 hover:border-yellow-500 hover:text-white hover:shadow-xl transition duration-200 ease-in mb-4 lg:mb-0">
                    <i class="bx bx-play-circle text-base"></i> Panduan Pendaftaran
                </button>
            </div>
        </div>

        <!-- Image Content -->
        <div class="lg:w-1/2 flex justify-center">
            <img
                src="<?= !empty($data['beranda']['gambar']) ? base_url . '/uploads/beranda/gambar/' . $data['beranda']['gambar'] : base_url . '/assets/img/3.section_beranda.png' ?>"
                alt="Beranda Photo"
                class="flexible-img w-full max-w-lg lg:max-w-none" />
        </div>
    </div>
</section>

<!-- Banner Image Section -->
<section class="mt-[-170px]" data-aos="fade-up" data-aos-delay="50">
    <div class="container mx-auto px-4 lg:px-28">
        <!-- Banner Image -->
        <div class="flex justify-center">
            <img
                src="<?= !empty($data['beranda']['banner']) ? base_url . '/uploads/beranda/banner/' . $data['beranda']['banner'] : base_url . '/assets/img/4. section_banner.png' ?>"
                alt="Banner Image"
                class="w-full max-w-screen-xl h-40 md:h-80 max-h-[200px] md:max-h-[300px] object-fit rounded-lg shadow-xl" />
        </div>
    </div>
</section>

<!-- Apa itu Website BKK Section -->
<section id="tentang-kami" class=" py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Apa itu Website BKK -->
        <div class="flex flex-col lg:flex-row items-center gap-8">
            <!-- Right Content (Gambar) -->
            <div
                class="lg:w-1/2 flex justify-center mb-8 lg:mb-0"
                data-aos="fade-right" data-aos-delay="50">
                <img
                    src="<?= base_url ?>/assets/img/5.  default_gambar.png"
                    alt="Apa itu Website BKK"
                    class="flexible-img rounded-lg w-full max-w-sm lg:max-w-none" />
            </div>

            <!-- Left Content (Teks) -->
            <div class="lg:w-1/2 text-left space-y-6" data-aos="fade-left" data-aos-delay="50">
                <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                    Informasi & Fasilitas Terbaik untuk Siswa Kami
                </p>
                <h2 class="text-3xl font-extrabold text-gray-800">
                    Apa itu
                    <span
                        class="text-purple-500 bg-purple-200 px-2 py-1 rounded-lg inline-block">
                        Website BKK
                    </span>
                    SMKN 1 Pangkalan Kerinci
                </h2>
                <p
                    class="text-sm lg:text-base text-gray-600 leading-relaxed text-justify">
                    <?php if (!empty($data['about']) && isset($data['about']['penjelasan'])): ?>
                        <?= $data['about']['penjelasan'] ?>
                    <?php else: ?>
                        Bursa Kerja Khusus (BKK) adalah platform yang disediakan oleh SMKN
                        1 Pangkalan Kerinci untuk membantu siswa dan alumni mendapatkan
                        informasi seputar lowongan kerja, pelatihan, serta penyaluran
                        tenaga kerja. Sebagai mitra Dinas Tenaga Kerja dan Transmigrasi,
                        BKK berperan sebagai penghubung antara sekolah dengan dunia
                        industri, mendukung siswa siap kerja dan memperluas peluang karir
                        mereka.
                    <?php endif; ?>
                </p>
                <!-- Button -->
                <a
                    href="<?= base_url ?>/#event"
                    class="inline-block text-sm bg-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-purple-600 hover:shadow-xl transition duration-200">
                    Temukan Pekerjaan
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Tujuan Website BKK Section -->
<section id="tujuan" class=" py-8 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Tujuan Website BKK -->
        <div class="flex flex-col lg:flex-row-reverse items-center gap-8">
            <!-- Right Content (Gambar) -->
            <div
                class="lg:w-1/2 flex justify-center mb-8 lg:mb-0"
                data-aos="fade-left" data-aos-delay="50">
                <img
                    src="<?= base_url ?>/assets/img/5.default-tujuan.png"
                    alt="Tujuan Website BKK"
                    class="flexible-img rounded-lg w-full max-w-sm lg:max-w-none" />
            </div>

            <!-- Left Content (Teks) -->
            <div
                class="lg:w-1/2 mx-auto text-left space-y-4"
                data-aos="fade-right" data-aos-delay="50">
                <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                    Mewujudkan Karir Impian Alumni
                </p>
                <h2 class="text-3xl font-extrabold text-gray-800 uppercase">
                    Tujuan
                    <span
                        class="text-purple-500 bg-purple-200 px-2 py-1 rounded-lg inline-block">
                        Website BKK
                    </span>
                    SMKN 1 Pangkalan Kerinci
                </h2>
                <?php foreach ($data['tujuan'] as $row): ?>
                    <ul class="space-y-4">
                        <li class="flex items-start lg:items-center gap-3">
                            <span
                                class="text-white bg-purple-500 flex items-center justify-center w-8 h-8 rounded-full font-bold shrink-0">
                                <i class="bx bx-check-shield text-lg"></i>
                            </span>
                            <p class="text-gray-600 lg:text-base text-sm text-start">
                                <?= $row['tujuan']; ?>
                            </p>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- Partner Kami Section -->
<section id="perusahaan" class=" py-14 px-4 lg:px-28 bg-gray-50">
    <div class="container mx-auto">
        <!-- Title -->
        <div class="flex flex-col w-full lg:w-[60%] mb-3" data-aos="fade-right" data-aos-delay="50">
            <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                Peluang Kerja Dengan Perusahaan Top
            </p>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-7">
                Daftar Perusahaan yang Bekerja Sama dengan BKK SMKN 1 Pangkalan
                Kerinci
            </h2>
        </div>

        <!-- Jika Data Kosong -->
        <?php if (empty($data['perusahaan'])): ?>
            <div class="w-full flex items-center flex-wrap justify-center gap-10 pt-14" data-aos="fade-up" data-aos-delay="50">>
                <div class="grid gap-4 w-60">
                    <div class="w-20 h-20 mx-auto bg-green-200 rounded-full shadow-sm justify-center items-center inline-flex">
                        <!-- Icon (You can replace this with any other icon you prefer) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                            <g id="File Serch">
                                <path id="Vector" d="M19.9762 4V8C19.9762 8.61954 19.9762 8.92931 20.0274 9.18691C20.2379 10.2447 21.0648 11.0717 22.1226 11.2821C22.3802 11.3333 22.69 11.3333 23.3095 11.3333H27.3095M18.6429 19.3333L20.6429 21.3333M19.3095 28H13.9762C10.205 28 8.31934 28 7.14777 26.8284C5.9762 25.6569 5.9762 23.7712 5.9762 20V12C5.9762 8.22876 5.9762 6.34315 7.14777 5.17157C8.31934 4 10.205 4 13.9762 4H19.5812C20.7604 4 21.35 4 21.8711 4.23403C22.3922 4.46805 22.7839 4.90872 23.5674 5.79006L25.9624 8.48446C26.6284 9.23371 26.9614 9.60833 27.1355 10.0662C27.3095 10.524 27.3095 11.0253 27.3095 12.0277V20C27.3095 23.7712 27.3095 25.6569 26.138 26.8284C24.9664 28 23.0808 28 19.3095 28ZM19.3095 16.6667C19.3095 18.5076 17.8171 20 15.9762 20C14.1352 20 12.6429 18.5076 12.6429 16.6667C12.6429 14.8257 14.1352 13.3333 15.9762 13.3333C17.8171 13.3333 19.3095 14.8257 19.3095 16.6667Z" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">
                            Uppss, Data Perusahaan Masih Kosong, Maaf :(
                        </h2>
                        <p class="text-center text-black text-sm font-normal leading-snug pb-4">
                            Tidak ada data perusahaan yang tersedia saat ini. <br />
                            Mohon tunggu beberapa saat atau hubungi kami untuk informasi lebih lanjut.
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Jika Data Ada -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 lg:gap-8">
                <!-- Partner 1 -->
                <?php foreach ($data['perusahaan'] as $row): ?>
                    <div class="p-4 bg-white shadow-md border border-transparent hover:border-[#44808B] transition duration-200 ease-in rounded-lg flex items-center"
                        data-aos="fade-up" data-aos-delay="50">
                        <img
                            src=" <?= !empty($row['logo_perusahaan']) ? base_url . '/uploads/perusahaan/' . $row['logo_perusahaan'] : base_url . '/assets/img/6.default-logo-perusahaan.png' ?>"
                            alt="<?= $row['nama_perusahaan']; ?>"
                            class="w-16 h-16 mr-4" />
                        <div class="text-left">
                            <h3 class="text-sm sm:text-base font-bold uppercase">
                                <?= $row['nama_perusahaan']; ?>
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600">
                                <?= $row['industry_perusahaan']; ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<!-- Event Terbaru Section -->
<section id="event" class=" py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Title -->
        <div
            class="flex justify-start gap-4 lg:justify-between items-center mb-6 flex-col lg:flex-row"
            data-aos="fade-right" data-aos-delay="50">
            <div class="flex flex-col w-full lg:w-[60%]">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-1">
                    Event Terbaru
                </h2>
                <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                    Temukan berbagai lowongan, Pelatihan Serta Job Fair di Website ini
                </p>
            </div>
            <!-- Button lihat semua lowongan -->
            <a
                href="<?= base_url ?>/landing/lowongan"
                class="w-fit lg:w-auto text-center lg:text-right border hover:bg-transparent hover:border-[#44808B] hover:text-[#44808B] px-4 py-2 text-sm rounded-lg transition bg-[#44808B] text-white mt-4 lg:mt-0">
                Lihat Semua Lowongan
            </a>
        </div>

        <!-- Jika Data Kosong -->
        <?php if (empty($data['event'])): ?>
            <div class="w-full flex items-center flex-wrap justify-center gap-10 pt-14" data-aos="fade-up" data-aos-delay="50">
                <div class="grid gap-4 w-full">
                    <div class="w-20 h-20 mx-auto bg-green-200 rounded-full shadow-sm justify-center items-center inline-flex">
                        <!-- Icon (You can replace this with any other icon you prefer) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                            <g id="File Serch">
                                <path id="Vector" d="M19.9762 4V8C19.9762 8.61954 19.9762 8.92931 20.0274 9.18691C20.2379 10.2447 21.0648 11.0717 22.1226 11.2821C22.3802 11.3333 22.69 11.3333 23.3095 11.3333H27.3095M18.6429 19.3333L20.6429 21.3333M19.3095 28H13.9762C10.205 28 8.31934 28 7.14777 26.8284C5.9762 25.6569 5.9762 23.7712 5.9762 20V12C5.9762 8.22876 5.9762 6.34315 7.14777 5.17157C8.31934 4 10.205 4 13.9762 4H19.5812C20.7604 4 21.35 4 21.8711 4.23403C22.3922 4.46805 22.7839 4.90872 23.5674 5.79006L25.9624 8.48446C26.6284 9.23371 26.9614 9.60833 27.1355 10.0662C27.3095 10.524 27.3095 11.0253 27.3095 12.0277V20C27.3095 23.7712 27.3095 25.6569 26.138 26.8284C24.9664 28 23.0808 28 19.3095 28ZM19.3095 16.6667C19.3095 18.5076 17.8171 20 15.9762 20C14.1352 20 12.6429 18.5076 12.6429 16.6667C12.6429 14.8257 14.1352 13.3333 15.9762 13.3333C17.8171 13.3333 19.3095 14.8257 19.3095 16.6667Z" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">
                            Uppss, Data Event Masih Kosong, Maaf :(
                        </h2>
                        <p class="text-center text-black text-sm font-normal leading-snug pb-4">
                            Tidak ada data lowongan pekerjaan | Magang | Job fair yang tersedia saat ini. <br />
                            Mohon tunggu beberapa saat atau hubungi kami untuk informasi lebih lanjut.
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <!-- Jika Data Ada -->
            <!-- Event Cards (max 6 items) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-10">
                <!-- Loop over event data here -->
                <?php foreach ($data['event'] as $row): ?>
                    <!-- Card Design -->
                    <div class="event-card max-w-md p-5 bg-white shadow-lg rounded-lg border border-gray-200"
                        data-aos="fade-up" data-aos-delay="50">
                        <div class="flex gap-4">
                            <!-- Image -->
                            <img
                                src="<?= !empty($row['logo_perusahaan']) ? base_url . '/uploads/perusahaan/' . $row['logo_perusahaan'] : base_url . '/assets/img/6.default-logo-perusahaan.png' ?>"
                                alt="<?= htmlspecialchars($row['nama_perusahaan']); ?>"
                                class="w-16 h-16 object-contain rounded-lg" />

                            <!-- Status Badge -->
                            <div class="flex flex-col gap-y-1">
                                <span class="w-fit 
                            <?php
                            if ($row['tipe'] == 'Magang') {
                                echo 'bg-green-300 text-green-800 text-sm rounded-full px-4 py-1';
                            } elseif ($row['tipe'] == 'Lowongan Kerja') {
                                echo 'bg-blue-300 text-blue-800 text-sm rounded-full px-4 py-1';
                            } elseif ($row['tipe'] == 'Job Fair') {
                                echo 'bg-orange-300 text-orange-800 text-sm rounded-full px-4 py-1';
                            } else {
                                echo 'bg-gray-300 text-gray-800 text-sm rounded-full px-4 py-1';
                            }
                            ?>">
                                    <?= $row['tipe']; ?>
                                </span>
                                <h3 class="text-md font-bold text-gray-800"><?= htmlspecialchars($row['posisi']); ?></h3>
                                <div class="flex gap-x-1">
                                    <p class="text-sm font-semibold text-black">
                                        <?= htmlspecialchars($row['nama_perusahaan']); ?>
                                    </p>
                                    <span class="inline-block ml-1 text-blue-500">
                                        <i class="bx bxs-badge-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Job Info -->
                        <div class="mt-4">
                            <!-- Salary and Location -->
                            <div class="mt-4 flex flex-col justify-between gap-2">
                                <div class="flex justify-between">
                                    <p class="text-sm font-bold">Perkiraan gaji</p>
                                    <p class="text-sm text-gray-600">
                                        <?= htmlspecialchars($row['gaji']); ?>
                                    </p>
                                </div>
                                <div class="flex justify-between">
                                    <p class="text-sm font-bold">Lokasi</p>
                                    <p class="text-sm text-gray-600"><?= htmlspecialchars($row['lokasi']); ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-200 w-full h-0.5 mt-4"></div>

                        <!-- Date -->
                        <div class="mt-4 flex items-center text-xs text-gray-500">
                            <?php
                            $currentDate = date('Y-m-d'); // Get current date
                            $endDate = date('Y-m-d', strtotime($row['tanggal_terakhir'])); // Convert to comparable format

                            // Check if the event has ended
                            if ($endDate < $currentDate) {
                                echo '<span class=" bg-red-200 text-red-800 rounded-full px-2 py-1">Event telah berakhir</span>';
                            } else {
                                echo '<span class=" bg-green-200 text-green-800 rounded-full px-2 py-1">masih berlangsung hingga ' . date('d M Y', strtotime($row['tanggal_terakhir'])) . '</span>';
                            }
                            ?>
                        </div>

                        <!-- Button -->
                        <div class="mt-6 mb-[-35px]">
                            <a href="<?= base_url; ?>/landing/pendaftaran/<?= $row['id'] ?>"
                                class="block text-sm bg-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-purple-600 hover:shadow-xl transition duration-200 cursor-pointer text-center">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<section id="gallery" class=" py-14 px-4 lg:px-28 bg-gray-50">
    <div class="container mx-auto">
        <!-- Title -->
        <div class="flex flex-col w-full lg:w-[60%] mb-3" data-aos="fade-right" data-aos-delay="50">
            <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                Galeri BKK SMKN 1 Pangkalan Kerinci
            </p>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-7">
                Daftar Foto Kegiatan dan Acara
            </h2>
        </div>

        <!-- Album Grid (max 8 items shown) -->
        <?php if (empty($data['gallery'])): ?>
            <div class="w-full flex items-center flex-wrap justify-center gap-10 pt-14" data-aos="fade-up" data-aos-delay="50">
                <div class="grid gap-4 w-full">
                    <div class="w-20 h-20 mx-auto bg-green-200 rounded-full shadow-sm justify-center items-center inline-flex">
                        <!-- Icon (You can replace this with any other icon you prefer) -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                            <g id="File Serch">
                                <path id="Vector" d="M19.9762 4V8C19.9762 8.61954 19.9762 8.92931 20.0274 9.18691C20.2379 10.2447 21.0648 11.0717 22.1226 11.2821C22.3802 11.3333 22.69 11.3333 23.3095 11.3333H27.3095M18.6429 19.3333L20.6429 21.3333M19.3095 28H13.9762C10.205 28 8.31934 28 7.14777 26.8284C5.9762 25.6569 5.9762 23.7712 5.9762 20V12C5.9762 8.22876 5.9762 6.34315 7.14777 5.17157C8.31934 4 10.205 4 13.9762 4H19.5812C20.7604 4 21.35 4 21.8711 4.23403C22.3922 4.46805 22.7839 4.90872 23.5674 5.79006L25.9624 8.48446C26.6284 9.23371 26.9614 9.60833 27.1355 10.0662C27.3095 10.524 27.3095 11.0253 27.3095 12.0277V20C27.3095 23.7712 27.3095 25.6569 26.138 26.8284C24.9664 28 23.0808 28 19.3095 28ZM19.3095 16.6667C19.3095 18.5076 17.8171 20 15.9762 20C14.1352 20 12.6429 18.5076 12.6429 16.6667C12.6429 14.8257 14.1352 13.3333 15.9762 13.3333C17.8171 13.3333 19.3095 14.8257 19.3095 16.6667Z" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">
                            Uppss, Gallery Masih Kosong, Maaf :(
                        </h2>
                        <p class="text-center text-black text-sm font-normal leading-snug pb-4">
                            Tidak ada data gallery yang tersedia saat ini. <br />
                        </p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div
                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4"
                id="album-grid"
                data-aos="fade-up" data-aos-delay="50">
                <?php foreach ($data['gallery'] as $row): ?>
                    <!-- Image 1 -->
                    <div class="album-item">
                        <img
                            class="h-60 w-full object-cover rounded-lg"
                            src="<?= base_url ?>/uploads/gallery/<?= $row['gambar'] ?>"
                            alt="Gambar <?= $row['keterangan'] ?>" />
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>


        <!-- Button to See All -->
        <div class="text-center mt-6">
            <a href="<?= base_url ?>/landing/gallery"
                class="w-fit mt-10 text-sm bg-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-purple-600 hover:shadow-xl transition duration-200 cursor-pointer">
                Lihat Semua Foto
            </a>
        </div>
    </div>
</section>