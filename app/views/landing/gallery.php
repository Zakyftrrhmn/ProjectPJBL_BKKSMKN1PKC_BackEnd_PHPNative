<section class="py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Title -->
        <div
            class="flex justify-start gap-4 lg:justify-between items-center mb-6 flex-col lg:flex-row"
            data-aos="fade-right" data-aos-delay="50">
            <div class="flex flex-col w-full lg:w-[60%]">
                <p class="text-xs sm:text-sm font-bold text-[#44808B] italic">
                    Galeri BKK SMKN 1 Pangkalan Kerinci
                </p>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-7">
                    Daftar Foto Kegiatan dan Acara
                </h2>
            </div>
        </div>
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
            <!-- Album Grid (max 8 items shown) -->
            <div
                class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4"
                id="album-grid"
                data-aos="fade-up" data-aos-delay="50">
                <?php foreach ($data['gallery'] as $row): ?>
                    <!-- Image 1 -->
                    <div class="">
                        <img
                            class="h-60 w-full object-cover rounded-lg"
                            src="<?= $row['gambar'] ?>"
                            alt="Gambar <?= $row['keterangan'] ?>" />
                    </div>
                <?php endforeach ?>
            </div>
        <?php endif; ?>
    </div>
</section>