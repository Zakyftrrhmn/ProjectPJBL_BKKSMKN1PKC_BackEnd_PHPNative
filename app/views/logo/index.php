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

        <!-- Form Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="<?= base_url; ?>/logo/updateLogo" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= isset($data['logo'][0]['id']) ? $data['logo'][0]['id'] : ''; ?>" />
                <input type="hidden" name="logo_bkk_lama" value="<?= isset($data['logo'][0]['logo_bkk']) ? $data['logo'][0]['logo_bkk'] : ''; ?>" />
                <input type="hidden" name="logo_sekolah_lama" value="<?= isset($data['logo'][0]['logo_sekolah']) ? $data['logo'][0]['logo_sekolah'] : ''; ?>" />


                <!-- Input Logo BKK -->
                <div class="mb-5">
                    <label for="logo_bkk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo BKK (Bursa Kerja Khusus )</label>
                    <input type="file" id="logo_bkk" name="logo_bkk" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <?php if (!empty($data['logo']) && !empty($data['logo']['logo_bkk'])) : ?>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                            <img src="<?= base_url; ?>/uploads/logo/logobkk/<?= $data['logo']['logo_bkk']; ?>"
                                alt="Logo BKK"
                                class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                        </div>
                    <?php else: ?>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Logo BKK saat ini :</p>
                            <img src="<?= base_url; ?>/uploads/logo/logobkk/default-logobkk.png"
                                alt="Logo BKK"
                                class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Input Logo Sekolah -->
                <div class="mb-5">
                    <label for="logo_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo Sekolah</label>
                    <input type="file" id="logo_sekolah" name="logo_sekolah" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                    <?php if (!empty($data['logo']) && !empty($data['logo']['logo_sekolah'])) : ?>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Logo sekolah saat ini:</p>
                            <img src="<?= base_url; ?>/uploads/logo/logosekolah/<?= $data['logo']['logo_sekolah']; ?>"
                                alt="Logo Sekoah"
                                class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                        </div>
                    <?php else: ?>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                            <img src="<?= base_url; ?>/uploads/logo/logosekolah/default-logosekolah.jpg"
                                alt="Default Logo Sekolah"
                                class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                        </div>
                    <?php endif; ?>
                </div>

                <!-- nama sekolah -->
                <div class="mb-5">
                    <label for="nama_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sekolah</label>
                    <input type="text" id="nama_sekolah" name="nama_sekolah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['logo'][0]['nama_sekolah']) ? $data['logo'][0]['nama_sekolah'] : 'SMKN 1 Pangkalan Kerinci'; ?>" required />
                </div>

                <!-- alamat sekolah -->
                <div class="mb-5">
                    <label for="alamat_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Sekolah</label>
                    <input type="text" id="alamat_sekolah" name="alamat_sekolah"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['logo'][0]['alamat_sekolah']) ? $data['logo'][0]['alamat_sekolah'] : ' Makmur, Pangkalan Kerinci, Pelalawan Regency, Riau 28654'; ?>" required />
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Update Beranda</button>
            </form>
        </div>
        <!-- Form Section End -->
    </div>
</main>