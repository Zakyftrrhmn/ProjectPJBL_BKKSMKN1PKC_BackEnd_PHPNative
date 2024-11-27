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
            <?php foreach ($data['about'] as $row) : ?>
                <!-- Responsive Table -->
                <form action="<?= base_url; ?>/about/updateAbout" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>" />
                    <input type="hidden" name="id" value="<?= $data['about'][0]['id']; ?>" />

                    <div class="mb-5">
                        <label for="penjelasan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Penjelasan Apa itu BKK?</label>
                        <textarea id="penjelasan" name="penjelasan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required> <?= $data['about'][0]['penjelasan']; ?></textarea>
                    </div>

                    <!-- Tombol Submit -->
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-3">Update Contact</button>
                </form>
            <?php endforeach; ?>
        </div>
        <!-- Table Section End -->
    </div>