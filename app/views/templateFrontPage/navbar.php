<!-- Navbar -->
<nav
    id="navbar"
    class="sticky top-0 bg-gray-50 shadow-none transition-all duration-300 z-50"
    data-aos="fade-up">
    <div
        class="container mx-auto flex justify-between items-center py-4 px-4 lg:px-28">
        <!-- Logo -->
        <a href="<?= base_url ?>/">
            <img
                src="<?= !empty($data['logo']['logo_bkk']) ? base_url . '/uploads/logo/logobkk/' . $data['logo']['logo_bkk'] : base_url . '/assets/img/1._Logo_BKK-removebg-preview.png' ?>"
                class="w-28 h-16"
                alt="Logo" />
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex space-x-6 mx-auto">
            <a
                href="<?= base_url ?>/#beranda"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Beranda</a>
            <a
                href="<?= base_url ?>/#tentang-kami"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Tentang Kami</a>
            <a
                href="<?= base_url ?>/#tujuan"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Tujuan</a>
            <a
                href="<?= base_url ?>/#perusahaan"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Perusahaan</a>
            <a
                href="<?= base_url ?>/#event"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Event</a>
            <a
                href="<?= base_url ?>/#gallery"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Gallery</a>
            <a
                href="<?= base_url ?>/#pengumuman"
                class="text-sm font-semibold hover:font-bold text-gray-600 hover:text-[#44808B]">Pengumuman</a>
        </div>

        <!-- Desktop Button -->
        <div class="hidden lg:block">
            <a href="<?= base_url ?>/landing/statistik"
                class="text-sm bg-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-purple-600 hover:shadow-xl transition duration-200 cursor-pointer">
                Statistik Alumni
            </a>
        </div>

        <!-- Hamburger Button (Mobile) -->
        <button class="lg:hidden text-gray-800 text-3xl" id="hamburger-btn">
            <i class="bx bx-menu"></i>
        </button>
    </div>

    <!-- Mobile Menu (hidden by default) -->
    <div
        class="lg:hidden hidden transition-all duration-300 ease-in-out transform opacity-0 translate-y-10"
        id="mobile-menu">
        <a
            href="<?= base_url ?>/#beranda"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Beranda</a>
        <a
            href="<?= base_url ?>/#tentang-kami"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Tentang Kami</a>
        <a
            href="<?= base_url ?>/#tujuan"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Tujuan</a>
        <a
            href="<?= base_url ?>/#perusahaan"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Perusahaan</a>
        <a
            href="<?= base_url ?>/#event"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Event</a>
        <a
            href="<?= base_url ?>/#gallery"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Gallery</a>
        <a
            href="<?= base_url ?>/#pengumuman"
            class="block text-sm font-semibold text-gray-600 hover:text-[#44808B] py-2 px-4">Pengumuman</a>
        <div class="text-center py-4">
            <a
                class="text-sm bg-purple-500 text-white px-4 py-2 rounded-full shadow-lg hover:bg-purple-600 hover:shadow-xl transition duration-200 cursor-pointer">
                Statistik Alumni
            </a>
        </div>
    </div>
</nav>