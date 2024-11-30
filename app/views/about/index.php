<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                <?= $data['title']; ?>
            </h2>
            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium text-primary" href="<?= base_url; ?>/admin/dashboard">Dashboard /</a>
                    </li>
                    <li class="font-medium "><?= $data['title']; ?></li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <?php Flasher::flash(); ?>

        <!-- Table Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <!-- Responsive Table -->
            <form action="<?= base_url; ?>/admin/about/updateAbout" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= isset($data['about'][0]['id']) ? $data['about'][0]['id'] : ''; ?>" />


                <div class="mb-5">
                    <label for="penjelasan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjelasan Apa itu BKK?</label>
                    <textarea id="penjelasan" name="penjelasan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required><?= !empty($data['about'][0]['penjelasan']) ? $data['about'][0]['penjelasan'] : 'Bursa Kerja Khusus (BKK) adalah platform yang disediakan oleh SMKN 1 Pangkalan Kerinci untuk membantu siswa dan alumni dalam mendapatkan informasi seputar lowongan kerja, pelatihan, serta penyaluran tenaga kerja. Sebagai mitra Dinas Tenaga Kerja dan Transmigrasi, BKK berperan sebagai penghubung antara sekolah dengan dunia industri, mendukung siswa siap kerja dan memperluas peluang karir mereka.'; ?></textarea>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">Update Penjelasan</button>
            </form>
        </div>
        <!-- Table Section End -->
    </div>