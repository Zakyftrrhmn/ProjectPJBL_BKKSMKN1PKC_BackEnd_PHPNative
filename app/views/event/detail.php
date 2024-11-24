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
                        <a class="font-medium" href="<?= base_url; ?>/dashboard">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary"><?= $data['title']; ?></li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <!-- Flash Messages -->
        <?php Flasher::flash(); ?>

        <!-- Detail Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Informasi Lengkap Event</h3>
            <div class="w-full mx-auto">
                <div class="mb-5">
                    <label class=" block  text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                    <input type="text" value="<?= $data['event']['posisi']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                    <?php foreach ($data['perusahaan'] as $row): ?>
                        <?php if ($row['id'] == $data['event']['id_perusahaan']): ?>
                            <input type="text" value="<?= $row['nama_perusahaan']; ?>" disabled
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Event</label>
                    <input type="text" value="<?= $data['event']['lokasi']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Event</label>
                    <input type="text" value="<?= $data['event']['tipe']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji</label>
                    <input type="text" value="<?= $data['event']['gaji']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline</label>
                    <input type="text" value="<?= $data['event']['tanggal_terakhir']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <!-- Job Description -->
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Pekerjaan</label>
                    <textarea disabled
                        class="list-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        rows="4" required><?= $data['event']['job_description']; ?></textarea>
                </div>

                <!-- Kualifikasi -->
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kualifikasi</label>
                    <textarea disabled
                        class="list-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        rows="4" required><?= $data['event']['kualifikasi']; ?></textarea>
                </div>

            </div>
            <!-- Back Button -->
            <div class="mt-6">
                <a href="<?= base_url; ?>/event"
                    class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Kembali
                </a>
            </div>
        </div>
        <!-- Detail Section End -->
    </div>