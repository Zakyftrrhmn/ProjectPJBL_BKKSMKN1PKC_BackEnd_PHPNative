<section class="py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Grid untuk Desktop, dan Satu Kolom untuk Mobile -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-center">
            <!-- Kolom Kiri untuk Text -->

            <div class="lg:col-span-6 col-span-12" data-aos="fade-right" data-aos-delay="50">

                <h2 class="text-4xl sm:text-6xl font-extrabold text-gray-800 mb-7">
                    Statitstik Alumni
                </h2>

                <p class="text-md sm:text-lg font-bold text-[#44808B] italic">
                    Berikut adalah statistik mengenai status alumni SMK Negeri 1 Pangkalan Kerinci yang sudah bekerja, kuliah, dan yang statusnya tidak diketahui.
                </p>
            </div>

            <!-- Kolom Kanan untuk Statistik -->
            <div class="lg:col-span-6 col-span-12" data-aos="fade-left" data-aos-delay="50">
                <div class="bg-white rounded-lg shadow-lg px-5 py-7.5">
                    <!-- Canvas untuk Grafik Statistik -->
                    <div class="mb-5">
                        <canvas id="chartThree" class="mx-auto"></canvas>
                    </div>

                    <!-- Statistik Daftar Alumni -->
                    <div class="flex flex-col gap-y-3">
                        <div class="flex items-center">
                            <span class="block w-2.5 h-2.5 mr-2 rounded-full bg-[#859a28]"></span>
                            <p class="text-sm text-black dark:text-white font-medium flex justify-between w-full">
                                <span>Bekerja</span>
                                <span><?= $data['bekerja'] ?> Alumni (<?= number_format(($data['bekerja'] / $data['totalAlumni']) * 100, 2) ?>%)</span>
                            </p>
                        </div>
                        <div class="flex items-center">
                            <span class="block w-2.5 h-2.5 mr-2 rounded-full bg-[#8FD0EF]"></span>
                            <p class="text-sm text-black dark:text-white font-medium flex justify-between w-full">
                                <span>Kuliah</span>
                                <span><?= $data['kuliah'] ?> Alumni (<?= number_format(($data['kuliah'] / $data['totalAlumni']) * 100, 2) ?>%)</span>
                            </p>
                        </div>
                        <div class="flex items-center">
                            <span class="block w-2.5 h-2.5 mr-2 rounded-full bg-[#0FADCF]"></span>
                            <p class="text-sm text-black dark:text-white font-medium flex justify-between w-full">
                                <span>Unknown</span>
                                <span><?= $data['unknown'] ?> Alumni (<?= number_format(($data['unknown'] / $data['totalAlumni']) * 100, 2) ?>%)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>