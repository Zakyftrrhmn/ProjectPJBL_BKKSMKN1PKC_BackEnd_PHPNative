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

        <!-- Form Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="<?= base_url; ?>/admin/beranda/updateBeranda" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= isset($data['beranda'][0]['id']) ? $data['beranda'][0]['id'] : ''; ?>" />
                <input type="hidden" name="gambar_lama" value="<?= isset($data['beranda'][0]['gambar']) ? $data['beranda'][0]['gambar'] : ''; ?>" />
                <input type="hidden" name="banner_lama" value="<?= isset($data['beranda'][0]['banner']) ? $data['beranda'][0]['banner'] : ''; ?>" />


                <!-- Input Video -->
                <div class="mb-5">
                    <label for="video" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Video Tutorial</label>
                    <input type="text" id="video" name="video" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="<?= !empty($data['beranda'][0]['video']) ? $data['beranda'][0]['video'] : 'https://www.youtube.com/watch?v=Dyv8h-0-K2Y'; ?>" required />
                </div>

                <!-- Input Title -->
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="<?= !empty($data['beranda'][0]['title']) ? $data['beranda'][0]['title'] : 'Proses mencari pekerjaan mungkin panjang, tapi percayalah, usaha yang tak kenal lelah akan membawa hasil.'; ?>" required />
                </div>

                <div class="mb-5">
                    <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Rekomendasi ukuran gambar (450px x 450px)</span></label>
                    <input type="file" id="gambar" name="gambar" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                        <?php
                        $gambar = !empty($data['beranda'][0]['gambar']) && file_exists('uploads/beranda/gambar/' . $data['beranda'][0]['gambar'])
                            ? $data['beranda'][0]['gambar']
                            : 'default-gambar.png';
                        ?>
                        <img src="<?= base_url; ?>/uploads/beranda/gambar/<?= $gambar; ?>" alt="Photo Beranda"
                            class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                    </div>
                </div>


                <!-- Input Banner -->
                <div class="mb-5">
                    <label for="banner" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banner <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Rekomendasi ukuran gambar (1056px x 300px)</span></label>
                    <input type="file" id="banner" name="banner" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                        <?php
                        $gambar = !empty($data['beranda'][0]['banner']) && file_exists('uploads/beranda/banner/' . $data['beranda'][0]['banner'])
                            ? $data['beranda'][0]['banner']
                            : 'default-banner.png';
                        ?>
                        <img src="<?= base_url; ?>/uploads/beranda/banner/<?= $gambar; ?>" alt="Photo Beranda"
                            class="mt-2 w-auto h-20 rounded-sm object-fit shadow-md mb-4">
                    </div>
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Update Beranda</button>
            </form>
        </div>
        <!-- Form Section End -->
    </div>
</main>