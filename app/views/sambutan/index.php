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
            <form action="<?= base_url; ?>/admin/sambutan/updateSambutan" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= isset($data['sambutan'][0]['id']) ? $data['sambutan'][0]['id'] : ''; ?>" />
                <input type="hidden" name="foto_kepsek_lama" value="<?= isset($data['sambutan'][0]['foto_kepsek']) ? $data['sambutan'][0]['foto_kepsek'] : ''; ?>" />


                <!--Nama Kepsek -->
                <div class="mb-5">
                    <label for="nama_kepsek" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kepala Sekolah <span class="text-red-500">*</span></label>
                    <input maxlength="100" type="text" id="nama_kepsek" name="nama_kepsek" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" value="<?= !empty($data['sambutan'][0]['nama_kepsek']) ? $data['sambutan'][0]['nama_kepsek'] : 'H. Nasril, M.Pd'; ?>" required />
                </div>

                <!-- Sambutan Dari Kepsek -->
                <div class="mb-5">
                    <label for="sambutan_kepsek" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Kata Sambutan Dari Kepala Sekolah <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="sambutan_kepsek"
                        name="sambutan_kepsek"
                        class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        rows="10"
                        cols="50"
                        required><?= !empty($data['sambutan'][0]['sambutan_kepsek']) ? $data['sambutan'][0]['sambutan_kepsek'] : 'Assalaamualaikum Wr. Wb. Selamat Datang di SMKN 1 Pangkalan Kerinci. SMK yang mengedepankan kualitas, lingkungan belajar yang nyaman serta penanaman nilai-nilai Agama. Kami berkomitmen untuk memberikan layanan pendidikan yang terbaik bagi anak bangsa, mendidik dengan sepenuh hati, mengajar dengan kompetensi dan membimbing dengan budi pekerti. Kami bertekad mendidik penerus bangsa yang tidak hanya cerdas, tetapi juga kreatif, inovatif dan juga Pancasilais.'; ?></textarea>
                </div>

                <!-- Foto Kepsek -->
                <div class="mb-5">
                    <label for="foto_kepsek" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto Kepala Sekolah <span class="text-red-500">*</span>
                        <!-- <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Rekomendasi ukuran foto_kepsek </span> -->
                    </label>
                    <input type="file" id="foto_kepsek" name="foto_kepsek" class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                        <?php
                        $foto_kepsek = !empty($data['sambutan'][0]['foto_kepsek']) && file_exists('uploads/sambutan/' . $data['sambutan'][0]['foto_kepsek'])
                            ? $data['sambutan'][0]['foto_kepsek']
                            : 'default-kepsek.jpeg';
                        ?>
                        <img src="<?= base_url; ?>/uploads/sambutan/<?= $foto_kepsek; ?>" alt="Photo Kepala Sekolah"
                            class="mt-2 h-20 w-20 rounded-sm object-cover shadow-md mb-4">
                    </div>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Update Sambutan</button>
            </form>
        </div>
        <!-- Form Section End -->
    </div>
</main>