<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this Data?</h3>
                <button id="confirm-delete" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Yes, I'm sure
                </button>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
            </div>
        </div>
    </div>
</div>

</main>
<!-- ===== Main Content End ===== -->
</div>
<!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<script>
    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            searchable: true,
            sortable: false
        });
    }
</script>
<script>
    document.querySelectorAll('[data-dismiss-target]').forEach(button => {
        button.addEventListener('click', function() {
            const target = this.getAttribute('data-dismiss-target');
            document.querySelector(target).remove();
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.querySelector('#popup-modal');
        const confirmButton = document.querySelector('#confirm-delete');
        let deleteUrl = '';

        // Handle delete button click
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function() {
                deleteUrl = this.getAttribute('data-delete-url');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        });

        // Handle confirm delete
        confirmButton.addEventListener('click', function() {
            if (deleteUrl) {
                window.location.href = deleteUrl;
            }
        });

        // Handle close modal
        document.querySelectorAll('[data-modal-hide]').forEach(button => {
            button.addEventListener('click', function() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
        });
    });
</script>

<script>
    // Ambil data dari PHP yang sudah dihitung di controller
    const bekerja = <?= $data['bekerja'] ?>;
    const kuliah = <?= $data['kuliah'] ?>;
    const unknown = <?= $data['unknown'] ?>;
    const totalAlumni = <?= $data['totalAlumni'] ?>;

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
            }]
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
            // Menambahkan cutoutPercentage untuk membuat efek donat dengan lubang
            cutout: '70%', // Mengatur area kosong di tengah untuk membuat lubang donat
        }
    });
</script>

<script>
    function validateCharacterCount() {
        const textArea = document.getElementById('penjelasan');
        const warning = document.getElementById('char-warning');
        const charCount = textArea.value.trim().length; // Menghitung jumlah huruf

        if (charCount > 500) {
            warning.classList.remove('hidden'); // Tampilkan peringatan
            warning.textContent = `Jumlah huruf: ${charCount}. Jumlah huruf tidak boleh lebih dari 500.`;
            return false; // Mencegah pengiriman formulir
        } else {
            warning.classList.add('hidden'); // Sembunyikan peringatan jika valid
            return true;
        }
    }
</script>


<script defer src="<?= base_url ?>/assets/bundle.js"></script>
</body>

</html>