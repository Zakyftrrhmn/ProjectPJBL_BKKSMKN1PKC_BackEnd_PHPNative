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

        <!-- Flash Messages -->
        <?php Flasher::flash(); ?>

        <!-- Detail Section Start -->
        <!-- Detail Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <h3 class="mb-4 text-lg font-medium leading-none text-gray-900 dark:text-white">Informasi Lengkap Pelamar</h3>
            <div class="w-full mx-auto">
                <!-- Nama Lengkap -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                    <input type="text" value="<?= $data['pelamar']['nama_lengkap']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Nomor KTP -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Nomor KTP</label>
                    <input type="text" value="<?= $data['pelamar']['nomor_ktp']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                    <input type="text" value="<?= $data['pelamar']['tanggal_lahir']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Tempat Lahir -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" value="<?= $data['pelamar']['tempat_lahir']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Usia -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Usia</label>
                    <input type="text" value="<?= $data['pelamar']['usia']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                    <input type="text" value="<?= $data['pelamar']['jenis_kelamin']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- No Handphone -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">No Handphone</label>
                    <input type="text" value="<?= $data['pelamar']['no_handphone']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="text" value="<?= $data['pelamar']['email']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Agama -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                    <input type="text" value="<?= $data['pelamar']['agama']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Tinggi Badan -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Tinggi Badan</label>
                    <input type="text" value="<?= $data['pelamar']['tinggi_badan']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Berat Badan -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Berat Badan</label>
                    <input type="text" value="<?= $data['pelamar']['berat_badan']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Alamat Sekarang -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Alamat Sekarang</label>
                    <input type="text" value="<?= $data['pelamar']['alamat_sekarang']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Asal Sekolah -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Asal Sekolah</label>
                    <input type="text" value="<?= $data['pelamar']['asal_sekolah']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Jurusan -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                    <input type="text" value="<?= $data['pelamar']['jurusan']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Tahun Lulus -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Tahun Lulus</label>
                    <input type="text" value="<?= $data['pelamar']['tahun_lulus']; ?>" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>

                <!-- Foto KK -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Foto KK</label>
                    <a href="<?= base_url; ?>/uploads/pelamar/<?= $data['pelamar']['foto_kk']; ?>"
                        class="text-blue-500" download target="_blank"><?= $data['pelamar']['foto_kk']; ?></a>
                </div>

                <!-- Foto KTP -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Foto KTP</label>
                    <a href="<?= base_url; ?>/uploads/pelamar/<?= $data['pelamar']['foto_ktp']; ?>"
                        class="text-blue-500" download target="_blank"><?= $data['pelamar']['foto_ktp']; ?></a>
                </div>

                <!-- CV -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">CV</label>
                    <a href="<?= base_url; ?>/uploads/pelamar/<?= $data['pelamar']['file_cv']; ?>"
                        class="text-blue-500" download target="_blank"><?= $data['pelamar']['file_cv']; ?></a>
                </div>

                <!-- Sertifikat -->
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Sertifikat</label>
                    <?php if (!empty($data['pelamar']['sertifikat'])): ?>
                        <a href="<?= base_url; ?>/uploads/pelamar/<?= $data['pelamar']['sertifikat']; ?>"
                            class="text-blue-500" download target="_blank"><?= $data['pelamar']['sertifikat']; ?></a>
                    <?php else: ?>
                        <span class="text-gray-500">Tidak Terisi</span>
                    <?php endif; ?>
                </div>



                <!-- Back Button -->
                <div class="mt-6">
                    <a href="<?= base_url; ?>/admin/event/pelamar/<?= $data['pelamar']['id_event'] ?>"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                        Kembali
                    </a>
                </div>
            </div>
            <!-- Detail Section End -->
        </div>