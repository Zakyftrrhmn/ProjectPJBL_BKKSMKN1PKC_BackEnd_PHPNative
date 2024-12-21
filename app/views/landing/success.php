<section class="py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <div class="w-full flex items-center flex-wrap justify-center gap-10 pt-14" data-aos="fade-up" data-aos-delay="50">
            <div class="grid gap-4 w-full">
                <div class="w-20 h-20 mx-auto bg-green-200 rounded-full shadow-sm justify-center items-center inline-flex">
                    <!-- Icon Success -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 24 24" fill="none" stroke="#4F46E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                        <path d="M9 12l2 2l4-4"></path>
                        <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                </div>
                <div>
                    <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">
                        Pendaftaran Berhasil! Data Telah Disimpan.
                    </h2>
                    <p class="text-center text-black text-sm font-normal leading-snug pb-4">
                        Anda dapat mencetak bukti pendaftaran dengan menekan tombol di bawah ini.
                    </p>
                </div>
                <div class="flex justify-center gap-3">
                    <!-- Button Cetak Laporan -->
                    <a href="<?= base_url ?>/" class="px-6 py-2 bg-gray-600 text-white text-sm font-medium rounded shadow hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Kembali
                    </a>

                    <a href="<?= base_url ?>/landing/buktiPendaftaran/<?= $data['pelamar']['uuid'] ?>" class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Cetak Bukti Pendaftaran
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>