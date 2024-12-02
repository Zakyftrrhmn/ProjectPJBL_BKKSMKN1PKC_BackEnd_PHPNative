<section
    class="pt-14 mb-[-50px] px-4 lg:px-28 relative z-20"
    data-aos="fade-up" data-aos-delay="50">
    <div
        class="bg-white px-8 py-8 rounded-lg flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center gap-3">
            <img
                src="<?= !empty($data['logo']['logo_bkk']) ? base_url . '/uploads/logo/logosekolah/' . $data['logo']['logo_bkk'] : base_url . '/assets/img/1._Logo_BKK-removebg-preview.png' ?>"
                alt="Logo"
                class="md:w-24 md:h-16 w-20 h-14 object-contain" />
            <img
                src="<?= !empty($data['logo']['logo_sekolah']) ? base_url . '/uploads/logo/logosekolah/' . $data['logo']['logo_sekolah'] : base_url . '/assets/img/2._Logo_SMKN_1_PKC.png' ?>"
                alt="Logo"
                class="md:w-16 md:h-16 w-14 h-14" />
            <div class="md:block hidden">
                <h1 class="text-lg font-bold uppercase">
                    <?php if (!empty($data['logo']) && isset($data['logo']['nama_sekolah'])): ?>
                        <?= $data['logo']['nama_sekolah'] ?>
                    <?php else: ?>
                        SMKN 1 Pangkalan Kerinci
                    <?php endif; ?>
                </h1>
                <p class="text-xs text-gray-600">
                    <?php if (!empty($data['logo']) && isset($data['logo']['alamat_sekolah'])): ?>
                        <?= $data['logo']['alamat_sekolah'] ?>
                    <?php else: ?>
                        Makmur, Pangkalan Kerinci, Pelalawan Regency, Riau 28654
                    <?php endif; ?>
                </p>
            </div>
        </div>
        <a href="<?= base_url ?>/landing/pengumuman"
            class="text-xs font-medium bg-[#44808B] text-white px-8 py-2 rounded-lg shadow-lg hover:bg-[#30626b] hover:shadow-xl transition duration-200 cursor-pointer">
            Lihat Pengumuman
        </a>
    </div>
</section>