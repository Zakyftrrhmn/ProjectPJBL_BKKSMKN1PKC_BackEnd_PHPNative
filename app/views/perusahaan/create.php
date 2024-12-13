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
            <form action="<?= base_url; ?>/admin/perusahaan/simpanPerusahaan" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <!-- Nama Perusahaan -->
                <div class="mb-5">
                    <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Perusahaan <span class="text-red-500">*</span></label>
                    <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan nama perusahaan" required />
                </div>

                <!-- Email Perusahaan -->
                <div class="mb-5">
                    <label for="email_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Perusahaan <span class="text-red-500">*</span></label>
                    <input type="email" id="email_perusahaan" name="email_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan email Perusahaan (contoh : email@perusahaan.com)" required />
                </div>

                <!-- Alamat Perusahaan -->
                <div class="mb-5">
                    <label for="alamat_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Perusahaan <span class="text-red-500">*</span></label>
                    <input id="alamat_perusahaan" name="alamat_perusahaan" rows="3"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan alamat lengkap perusahaan" required></input>
                </div>

                <!-- Telepon Perusahaan -->
                <div class="mb-5">
                    <label for="telepon_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon Perusahaan <span class="text-red-500">*</span></label>
                    <input type="text" id="telepon_perusahaan" name="telepon_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Masukkan Telepon Perusahaan (contoh : 08xxxxxxxxxx)" required />
                </div>

                <!-- Logo Perusahaan -->
                <div class="mb-5">
                    <label for="logo_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo Perusahaan <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Opsional</span></label>
                    <input type="file" id="logo_perusahaan" name="logo_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        accept="image/*" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Unggah file dalam format .jpg, .png, atau .jpeg.</p>
                </div>

                <!-- Industri Perusahaan -->
                <div class="mb-5">
                    <label for="industry_perusahaan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Industri Perusahaan <span class="text-red-500">*</span></label>
                    <input type="text" id="industry_perusahaan" name="industry_perusahaan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        placeholder="Industri perusahaan (contohnya: Teknologi, Keuangan, dll.)" required />
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Perusahaan</button>

                <a href="<?= base_url; ?>/admin/perusahaan" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
            </form>


        </div>
        <!-- Table Section End -->
    </div>