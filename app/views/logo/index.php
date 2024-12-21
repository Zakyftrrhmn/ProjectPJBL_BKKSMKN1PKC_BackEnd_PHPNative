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
            <form action="<?= base_url; ?>/admin/logo/updateLogo" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= isset($data['logoo'][0]['id']) ? $data['logoo'][0]['id'] : ''; ?>" />
                <input type="hidden" name="logo_bkk_lama" value="<?= isset($data['logoo'][0]['logo_bkk']) ? $data['logoo'][0]['logo_bkk'] : ''; ?>" />
                <input type="hidden" name="logo_sekolah_lama" value="<?= isset($data['logoo'][0]['logo_sekolah']) ? $data['logoo'][0]['logo_sekolah'] : ''; ?>" />


                <!-- Nama Sekolah -->
                <div class="mb-5">
                    <label for="nama_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sekolah <span class="text-red-500">*</span></label>
                    <input maxlength="255" type="text" id="nama_sekolah" name="nama_sekolah" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="<?= !empty($data['logoo'][0]['nama_sekolah']) ? $data['logoo'][0]['nama_sekolah'] : 'SMKN 1 Pangkalan Kerinci'; ?>" required />
                </div>

                <!-- Alamat Sekolah -->
                <div class="mb-5">
                    <label for="alamat_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Sekolah <span class="text-red-500">*</span></label>
                    <input maxlength="255" type="text" id="alamat_sekolah" name="alamat_sekolah" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="<?= !empty($data['logoo'][0]['alamat_sekolah']) ? $data['logoo'][0]['alamat_sekolah'] : ' Makmur, Pangkalan Kerinci, Pelalawan Regency, Riau 28654'; ?>" required />
                </div>

                <!-- Input Logo BKK -->
                <div class="mb-5">
                    <label for="logo_bkk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo BKK (Bursa Kerja Khusus) <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Rekomendasi ukuran gambar (224px x 128px)</span></label>
                    <input maxlength="255" type="file" id="logo_bkk" name="logo_bkk" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                        <?php
                        $logo_bkk = !empty($data['logoo'][0]['logo_bkk']) && file_exists('uploads/logo/logobkk/' . $data['logoo'][0]['logo_bkk'])
                            ? $data['logoo'][0]['logo_bkk']
                            : 'default-logobkk.png';
                        ?>
                        <img src="<?= base_url; ?>/uploads/logo/logobkk/<?= $logo_bkk; ?>" alt="Logo BKK"
                            class="mt-2 w-28 h-16 rounded-sm object-cover shadow-md mb-4">
                    </div>
                </div>

                <!-- Input Logo Sekolah -->
                <div class="mb-5">
                    <label for="logo_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Logo Sekolah <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Rekomendasi ukuran gambar (128px x 128px)</span></label>
                    <input maxlength="255" type="file" id="logo_sekolah" name="logo_sekolah" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                        <?php
                        $logo_sekolah = !empty($data['logoo'][0]['logo_sekolah']) && file_exists('uploads/logo/logosekolah/' . $data['logoo'][0]['logo_sekolah'])
                            ? $data['logoo'][0]['logo_sekolah']
                            : 'default-logosekolah.jpg';
                        ?>
                        <img src="<?= base_url; ?>/uploads/logo/logosekolah/<?= $logo_sekolah; ?>" alt="Logo Sekolah"
                            class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                    </div>
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Update Identitas</button>
            </form>
        </div>
        <!-- Form Section End -->
    </div>
</main>