<!-- Event Terbaru Section -->
<section class="py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Title -->
        <div
            class="flex justify-start gap-4 lg:justify-between items-center mb-6 flex-col lg:flex-row"
            data-aos="fade-right" data-aos-delay="50">
            <div class="flex flex-col w-full lg:w-[60%]">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-1">
                    Semua Event
                </h2>
                <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                    Temukan berbagai lowongan, Pelatihan Serta Job Fair di Website ini
                </p>
            </div>
        </div>

        <!-- Event Cards (max 6 items) -->
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

            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-y-10 gap-x-10">
                <!-- Loop over event data here -->
                <?php foreach ($data['event'] as $row): ?>
                    <!-- Card Design -->
                    <div
                        class="max-w-md p-5 bg-white shadow-lg rounded-lg border border-gray-200"
                        data-aos="fade-up"
                        data-aos-delay="50">
                        <div class="flex gap-4">
                            <!-- Image -->
                            <img
                                src="<?= !empty($row['logo_perusahaan']) ? base_url . '/uploads/perusahaan/' . $row['logo_perusahaan'] : base_url . '/assets/img/6.default-logo-perusahaan.png' ?>"
                                alt="<?= htmlspecialchars($row['nama_perusahaan']); ?>"
                                class="w-16 h-16 object-contain rounded-lg" />

                            <!-- Status Badge -->
                            <div class="flex flex-col gap-y-1">
                                <span
                                    class="w-fit  <?php
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
                                    <span class="inline-block ml-1 text-blue-500"><i class="bx bxs-badge-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Job Info -->
                        <div class="mt-4">
                            <!-- Salary and Location -->
                            <div class="mt-4 flex flex-col justify-between gap-2">
                                <div class="flex justify-between">
                                    <p class="text-sm font-bold">Gaji</p>
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
                            <a
                                href="<?= base_url; ?>/landing/pendaftaran/<?= $row['uuid'] ?>"
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