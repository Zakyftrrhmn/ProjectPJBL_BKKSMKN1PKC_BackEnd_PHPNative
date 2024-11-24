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

        <!-- Table Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">

            <!-- Responsive Table -->
            <form action="<?= base_url; ?>/alumni/updateAlumni" method="post" class="w-full mx-auto" enctype="multipart/form-data">

                <!-- ID (Hidden) -->
                <input type="hidden" name="id" value="<?= $data['alumni']['id']; ?>">

                <!-- NISN -->
                <div class="mb-5">
                    <label for="nisn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                    <input type="text" id="nisn" name="nisn"
                        inputmode="numeric" pattern="[0-9]*"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan NISN Anda" required
                        value="<?= $data['alumni']['nisn']; ?>"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                </div>

                <!-- NIS -->
                <div class="mb-5">
                    <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                    <input type="text" id="nis" name="nis"
                        inputmode="numeric" pattern="[0-9]*"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan NIS Anda" required
                        value="<?= $data['alumni']['nis']; ?>"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');" />
                </div>

                <!-- Nama Alumni -->
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Alumni</label>
                    <input type="text" id="nama" name="nama"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan Nama Alumni" required
                        value="<?= $data['alumni']['nama']; ?>" />
                </div>

                <!-- Jurusan -->
                <div class="mb-5">
                    <label for="id_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jurusan</label>
                    <select id="id_jurusan" name="id_jurusan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <option value="" disabled>Pilih Jurusan Alumni</option>
                        <?php foreach ($data['jurusan'] as $row): ?>
                            <option value="<?= $row['id']; ?>" <?= $row['id'] == $data['alumni']['id_jurusan'] ? 'selected' : ''; ?>>
                                <?= $row['nama_jurusan']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-5">
                    <label for="kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                    <select id="kelamin" name="kelamin"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <option value="" disabled>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" <?= $data['alumni']['kelamin'] == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="Perempuan" <?= $data['alumni']['kelamin'] == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
                <!-- Tempat Lahir -->
                <div class="mb-5">
                    <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir"
                        value="<?= $data['alumni']['tempat_lahir']; ?>"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan Tempat Lahir" required />
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-5">
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                        value="<?= $data['alumni']['tanggal_lahir']; ?>"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required />
                </div>

                <!-- Tahun Lulus -->
                <div class="mb-5">
                    <label for="tahun_lulus" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun Lulus</label>
                    <input type="text" id="tahun_lulus" name="tahun_lulus"
                        value="<?= $data['alumni']['tahun_lulus']; ?>"
                        maxlength="4" pattern="[0-9]*" inputmode="numeric"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Contoh: 2022" required />
                </div>

                <!-- Status -->
                <div class="mb-5">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="status" name="status"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option value="" disabled>Pilih Status Alumni Sekarang</option>
                        <option value="Unknown" <?= $data['alumni']['status'] === 'Unknown' ? 'selected' : ''; ?>>Unknown</option>
                        <option value="Kuliah" <?= $data['alumni']['status'] === 'Kuliah' ? 'selected' : ''; ?>>Kuliah</option>
                        <option value="Bekerja" <?= $data['alumni']['status'] === 'Bekerja' ? 'selected' : ''; ?>>Bekerja</option>
                    </select>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Alumni</button>

                <a href="<?= base_url; ?>/alumni" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
            </form>
        </div>
        <!-- Table Section End -->
    </div>