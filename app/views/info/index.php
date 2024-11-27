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
            <form action="<?= base_url; ?>/info/updateInfo" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <input type="hidden" name="id" value="<?= isset($data['info'][0]['id']) ? $data['info'][0]['id'] : ''; ?>" />

                <div class="mb-5">
                    <label for="link_facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Facebook</label>
                    <input type="text" id="link_facebook" name="link_facebook"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['info'][0]['link_facebook']) ? $data['info'][0]['link_facebook'] : 'https://www.facebook.com/'; ?>" required />
                </div>

                <div class="mb-5">
                    <label for="link_instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Instagram</label>
                    <input type="text" id="link_instagram" name="link_instagram"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['info'][0]['link_instagram']) ? $data['info'][0]['link_instagram'] : 'https://www.instagram.com/'; ?>" required />
                </div>

                <div class="mb-5">
                    <label for="link_youtube" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link Youtube</label>
                    <input type="text" id="link_youtube" name="link_youtube"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['info'][0]['link_youtube']) ? $data['info'][0]['link_youtube'] : 'https://www.youtube.com/'; ?>" required />
                </div>

                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Sekolah</label>
                    <input type="text" id="email" name="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['info'][0]['email']) ? $data['info'][0]['email'] : 'SMKN1PKC@gmail.com'; ?>" required />
                </div>

                <div class="mb-5">
                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telepon Sekolah</label>
                    <input type="text" id="telepon" name="telepon"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= !empty($data['info'][0]['telepon']) ? $data['info'][0]['telepon'] : '0812xxxxx'; ?>" required />
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">Update Contact</button>
            </form>
        </div>
        <!-- Table Section End -->
    </div>