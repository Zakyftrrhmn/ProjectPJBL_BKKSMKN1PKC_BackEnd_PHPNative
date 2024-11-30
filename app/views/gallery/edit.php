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
                    <li class="font-medium"><?= $data['title']; ?></li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <?php Flasher::flash(); ?>

        <!-- Table Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">

            <!-- Responsive Table -->
            <form action="<?= base_url; ?>/admin/gallery/updateGallery" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= $data['gallery']['id']; ?>" />
                <input type="hidden" name="gambar_lama" value="<?= $data['gallery']['gambar']; ?>" />

                <!--Keterangan -->
                <div class="mb-5">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">keterangan</label>
                    <input type="text" id="keterangan" name="keterangan"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= $data['gallery']['keterangan']; ?>" placeholder="Masukkan Keterangan Photo" required />
                </div>

                <!-- Masukkan Photo -->
                <div class="mb-5">
                    <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Masukkan Photo
                        <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Rekomendasi photo 550x550</span>
                    </label>

                    <!-- edit photo -->
                    <input type="file" id="gambar" name="gambar"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        accept="image/*" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Unggah file dalam format .jpg, .png, atau .jpeg.</p>

                    <!-- Display Existing Photo (If Available) -->
                    <?php if (!empty($data['gallery']) && !empty($data['gallery']['gambar'])) : ?>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                            <img src="<?= base_url; ?>/uploads/gallery/<?= $data['gallery']['gambar']; ?>"
                                alt="Photo Gallery"
                                class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                        </div>
                    <?php endif; ?>


                    <!-- Tombol Submit -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Update Gallery</button>

                    <a href="<?= base_url; ?>/admin/gallery" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Kembali</a>
            </form>
        </div>
        <!-- Table Section End -->
    </div>