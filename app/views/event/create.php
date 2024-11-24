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

        <?php Flasher::flash(); ?>

        <!-- Form Tambah Event Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="<?= base_url; ?>/event/simpanEvent" method="post" class="w-full mx-auto" id="form">

                <!-- Tipe event -->
                <div class="mb-5">
                    <label for="tipe" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipe Event</label>
                    <select id="tipe" name="tipe"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option value="" disabled selected>Pilih tipe event</option>
                        <option value="Magang">Magang</option>
                        <option value="Lowongan Kerja">Lowongan Kerja</option>
                        <option value="Job Fair">Job Fair</option>
                        <option value="Program Lainnya">Program Lainnya</option>
                    </select>
                </div>

                <!-- Posisi -->
                <div class="mb-5">
                    <label for="posisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Posisi</label>
                    <input type="text" id="posisi" name="posisi"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan posisi pekerjaan" required />
                </div>

                <!-- Pilih Perusahaan -->
                <div class="mb-5">
                    <label for="id_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan</label>
                    <select id="id_perusahaan" name="id_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <option value="" disabled selected>Pilih Perusahaan</option>
                        <?php foreach ($data['perusahaan'] as $row): ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama_perusahaan']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Lokasi -->
                <div class="mb-5">
                    <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi Event</label>
                    <input type="text" id="lokasi" name="lokasi"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan Lokasi event (Contoh : Pekanbaru)" required />
                </div>

                <!-- Gaji -->
                <div class="mb-5">
                    <label for="gaji" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gaji</label>
                    <input type="number" id="gaji" name="gaji" pattern="[0-9]*" inputmode="numeric"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukkan gaji (dalam IDR)" required />
                </div>

                <!-- Tanggal terakhir -->
                <div class="mb-5">
                    <label for="tanggal_terakhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline</label>
                    <input type="date" id="tanggal_terakhir" name="tanggal_terakhir"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required />
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <label for="job_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Pekerjaan</label>
                    <textarea id="job_description" name="job_description"
                        class="list-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        rows="4" required></textarea>
                </div>

                <!-- Kualifikasi -->
                <div class="mb-5">
                    <label for="kualifikasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kualifikasi</label>
                    <textarea id="kualifikasi" name="kualifikasi"
                        class="list-input shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=""
                        rows="4" required></textarea>
                </div>


                <!-- Tombol Submit -->
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Tambah
                    Event</button>
                <a href="<?= base_url; ?>/event"
                    class="text-white bg-gray-800 hover:bg-gray-900 font-medium rounded-lg text-sm px-5 py-2.5">Kembali</a>
            </form>
        </div>
        <!-- Form Tambah Event End -->
    </div>