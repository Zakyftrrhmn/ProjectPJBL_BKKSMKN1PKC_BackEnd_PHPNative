<!-- Footer Section -->
<footer
    class="bg-[#44808B] text-white pt-20 pb-4 py-2 lg:px-8 px-1 relative z-10"
    data-aos="fade-up" data-aos-delay="50">
    <div
        class="container mx-auto px-4 lg:px-28 flex items-center justify-between">
        <p class="text-xs sm:text-sm">
            &copy; 2024 ZFR.Design - SMKN 1 Pangkalan Kerinci
        </p>
        <div class="flex lg:gap-4 gap-2">
            <a
                href="<?= !empty($data['info']) && isset($data['info']['link_facebook']) ? $data['info']['link_facebook'] : 'https://www.facebook.com/' ?>"
                class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-blue-500 hover:text-white rounded-full flex items-center justify-center transition ease-in"><i class="bx bxl-facebook"></i></a>
            <a
                href="<?= !empty($data['info']) && isset($data['info']['link_instagram']) ? $data['info']['link_instagram'] : 'https://www.instagram.com/' ?>"
                class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-orange-500 hover:text-white rounded-full flex items-center justify-center transition ease-in"><i class="bx bxl-instagram"></i></a>
            <a
                href="<?= !empty($data['info']) && isset($data['info']['link_youtube']) ? $data['info']['link_youtube'] : 'https://www.youtube.com/' ?>"
                class="text-white text-lg h-8 w-8 bg-blue-300 text-blue-500 hover:bg-red-800 hover:text-white rounded-full flex items-center justify-center transition ease-in"><i class="bx bxl-youtube"></i></a>
        </div>
    </div>
</footer>


<!-- modal script -->
<div
    id="modal"
    class="z-50 fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">

    <!-- Modal Content -->
    <div class="bg-white w-full max-w-lg sm:max-w-xl md:max-w-2xl lg:max-w-3xl rounded-lg shadow-lg overflow-hidden">
        <!-- Modal Header -->
        <div class="p-4 border-b">
            <h2 class="text-lg md:text-xl font-semibold text-gray-800">Panduan Pendaftaran</h2>
        </div>

        <!-- Modal Body -->
        <div class="p-4">
            <img
                src="<?= !empty($data['beranda']['banner']) ? base_url . '/uploads/beranda/banner/' . $data['beranda']['banner'] : base_url . '/assets/img/panduan.png' ?>"
                alt="Banner Image"
                class="w-full h-auto rounded-lg shadow-md object-contain" />
        </div>

        <!-- Modal Footer -->
        <div class="flex justify-end p-4 border-t">
            <button
                class="px-4 py-2 text-gray-700 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none focus:ring focus:ring-gray-400"
                onclick="toggleModal()">
                Close
            </button>
        </div>
    </div>
</div>



<script>
    // Function to toggle modal visibility
    function toggleModal() {
        const modal = document.getElementById('modal');
        modal.classList.toggle('hidden');
    }
</script>


<script>
    // Get hamburger button and mobile menu
    const hamburgerBtn = document.getElementById("hamburger-btn");
    const mobileMenu = document.getElementById("mobile-menu");

    // Toggle mobile menu visibility with smooth transition
    hamburgerBtn.addEventListener("click", () => {
        // Toggle the "hidden" class to show/hide the menu
        mobileMenu.classList.toggle("hidden");

        // Add or remove transition classes for smooth slide-in/out
        if (mobileMenu.classList.contains("hidden")) {
            mobileMenu.classList.remove("opacity-100", "translate-y-0");
            mobileMenu.classList.add("opacity-0", "translate-y-10");
        } else {
            mobileMenu.classList.remove("opacity-0", "translate-y-10");
            mobileMenu.classList.add("opacity-100", "translate-y-0");
        }
    });
</script>

<script>
    document.querySelectorAll('[data-dismiss-target]').forEach(button => {
        button.addEventListener('click', function() {
            const target = this.getAttribute('data-dismiss-target');
            document.querySelector(target).remove();
        });
    });
</script>

<!-- nav link jika pengen -->
<!-- <script>
    document.addEventListener("DOMContentLoaded", () => {
        const navLinks = document.querySelectorAll(".nav-link");
        const sections = document.querySelectorAll("section");

        // Fungsi untuk mengatur menu aktif berdasarkan posisi scroll
        function setActiveMenu() {
            let currentSection = "";

            sections.forEach((section) => {
                const sectionTop = section.offsetTop - 120; // Offset agar lebih akurat
                const sectionHeight = section.clientHeight;

                if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                    currentSection = section.getAttribute("id");
                }
            });

            // Hapus semua class 'active', lalu tambahkan ke link yang sesuai
            navLinks.forEach((link) => {
                link.classList.remove("active");
                if (link.getAttribute("href").includes(currentSection)) {
                    link.classList.add("active");
                }
            });
        }

        // Event Listener saat scroll
        window.addEventListener("scroll", setActiveMenu);

        // Trigger fungsi sekali saat halaman dimuat
        setActiveMenu();
    });
</script> -->

<!-- JavaScript to toggle visibility of extra images -->
<script>
    const albumItems = document.querySelectorAll(".album-item");

    // Hide images beyond the 8th item
    albumItems.forEach((item, index) => {
        if (index >= 8) {
            item.classList.add("hidden");
        }
    });
</script>

<!-- Logic to hide cards beyond 6 items -->
<script>
    const eventCards = document.querySelectorAll(".event-card");
    eventCards.forEach((card, index) => {
        if (index >= 6) {
            card.style.display = "none";
        }
    });
</script>

<script>
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            // Scroll 50px atau lebih
            navbar.classList.add("shadow-md");
            navbar.classList.remove("shadow-none");
        } else {
            navbar.classList.add("shadow-none");
            navbar.classList.remove("shadow-md");
        }
    });
</script>

<script>
    // Ambil data dari PHP yang sudah dihitung di controller
    const bekerja = <?= $data['bekerja'] ?? 0 ?>;
    const kuliah = <?= $data['kuliah'] ?? 0 ?>;
    const unknown = <?= $data['unknown'] ?? 0 ?>;
    const totalAlumni = <?= $data['totalAlumni'] ?? 0 ?>;

    // Pastikan totalAlumni tidak nol untuk menghindari pembagian dengan nol
    if (totalAlumni > 0) {
        // Menghitung persentase
        const persentaseBekerja = (bekerja / totalAlumni) * 100;
        const persentaseKuliah = (kuliah / totalAlumni) * 100;
        const persentaseUnknown = (unknown / totalAlumni) * 100;

        // Membuat grafik menggunakan Chart.js
        const ctx = document.getElementById('chartThree').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'doughnut', // Jenis grafik donut
            data: {
                datasets: [{
                    label: 'Alumni Statistik',
                    data: [persentaseBekerja, persentaseKuliah, persentaseUnknown], // Data persentase
                    backgroundColor: ['#859a28', '#8FD0EF', '#0FADCF'], // Warna untuk tiap kategori
                    borderColor: ['#859a28', '#8FD0EF', '#0FADCF'],
                    borderWidth: 1
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%'; // Format persentase di tooltip
                            }
                        }
                    }
                },
                cutout: '70%', // Menambahkan efek donat dengan lubang tengah
            }
        });
    } else {
        // Jika totalAlumni adalah nol, tampilkan pesan
        document.getElementById('chartThree').innerHTML = `
        <p style="text-align: center; color: #666;">Tidak ada data untuk ditampilkan.</p>
    `;
    }
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({
        duration: 1000, // Animation duration (ms)
        once: true, // Animation only happens once when the element comes into view
        delay: 100, // Delay for each element (optional)
        offset: 100, // How far before the element comes into view to start animating (optional)
    });
</script>
</body>

</html>