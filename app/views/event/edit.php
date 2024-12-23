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

        <!-- Form Edit Event Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="<?= base_url; ?>/admin/event/updateEvent" method="post" class="w-full mx-auto" id="form">
                <input type="hidden" name="uuid" value="<?= $data['event']['uuid']; ?>">

                <!-- Tipe event -->
                <div class="mb-5">
                    <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Event <span class="text-red-500">*</span></label>
                    <select id="tipe" name="tipe"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option value="" disabled>Pilih tipe event</option>
                        <option value="Magang" <?= $data['event']['tipe'] == 'Magang' ? 'selected' : ''; ?>>Magang</option>
                        <option value="Lowongan Kerja" <?= $data['event']['tipe'] == 'Lowongan Kerja' ? 'selected' : ''; ?>>Lowongan Kerja</option>
                        <option value="Job Fair" <?= $data['event']['tipe'] == 'Job Fair' ? 'selected' : ''; ?>>Job Fair</option>
                        <option value="Program Lainnya" <?= $data['event']['tipe'] == 'Program Lainnya' ? 'selected' : ''; ?>>Program Lainnya</option>
                    </select>
                </div>

                <!-- Posisi -->
                <div class="mb-5">
                    <label for="posisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi <span class="text-red-500">*</span></label>
                    <input maxlength="100" type="text" id="posisi" name="posisi"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="<?= $data['event']['posisi']; ?>" required />
                </div>

                <!-- Pilih Perusahaan -->
                <div class="mb-5">
                    <label for="id_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan <span class="text-red-500">*</span></label>
                    <select id="id_perusahaan" name="id_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option value="" disabled>Pilih Perusahaan</option>
                        <?php foreach ($data['perusahaan'] as $row): ?>
                            <option value="<?= $row['id']; ?>" <?= $row['id'] == $data['event']['id_perusahaan'] ? 'selected' : ''; ?>>
                                <?= $row['nama_perusahaan']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Lokasi -->
                <div class="mb-5">
                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Event <span class="text-red-500">*</span></label>
                    <input maxlength="100" type="text" id="lokasi" name="lokasi"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="<?= $data['event']['lokasi']; ?>" required />
                </div>

                <!-- Gaji -->
                <div class="mb-5">
                    <label for="gaji" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji <span class="text-red-500">*</span></label>
                    <input maxlength="50" type="text" id="gaji" name="gaji"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="<?= $data['event']['gaji']; ?>" required />
                </div>

                <!-- Tanggal terakhir -->
                <div class="mb-5">
                    <label for="tanggal_terakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline <span class="text-red-500">*</span></label>
                    <input type="date" id="tanggal_terakhir" name="tanggal_terakhir"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        value="<?= $data['event']['tanggal_terakhir']; ?>" required />
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <label for="jobDescriptionInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Deskripsi Pekerjaan <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center mb-2">
                        <input id="jobDescriptionInput" type="text"
                            class="list-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Deskripsi" />
                        <button type="button" id="addJobDescriptionButton"
                            class="ml-2 text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-4 py-2">
                            Tambah
                        </button>
                    </div>
                    <ul id="jobDescriptionListEdit" class="list-disc pl-5 text-gray-900">
                        <!-- Item dari PHP akan dimasukkan di sini -->
                    </ul>
                    <textarea id="job_description" name="job_description" rows="4" hidden required></textarea>
                </div>

                <!-- Kualifikasi -->
                <div class="mb-5">
                    <label for="kualifikasiInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kualifikasi <span class="text-red-500">*</span>
                    </label>
                    <div class="flex items-center mb-2">
                        <input id="kualifikasiInput" type="text"
                            class="list-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Masukkan Kualifikasi" />
                        <button type="button" id="addKualifikasiButton"
                            class="ml-2 text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-4 py-2">
                            Tambah
                        </button>
                    </div>
                    <ul id="kualifikasiListEdit" class="list-disc pl-5 text-gray-900">
                        <!-- Item dari PHP akan dimasukkan di sini -->
                    </ul>
                    <textarea id="kualifikasi" name="kualifikasi" rows="4" hidden required></textarea>
                </div>


                <!-- Tombol Submit -->
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Update Event</button>
                <a href="<?= base_url; ?>/admin/event"
                    class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-2.5">Kembali</a>
            </form>
        </div>
        <!-- Form Edit Event End -->
    </div>