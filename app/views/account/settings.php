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
            <form action="<?= base_url; ?>/admin/account/updateAccount" method="post" class="w-full mx-auto" enctype="multipart/form-data" id="form">
                <!-- Hidden Input for User ID -->
                <input type="hidden" name="id" value="<?= $data['user']['id']; ?>">

                <!-- Nama -->
                <div class="mb-5">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="nama" name="nama"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= $data['user']['nama']; ?>" required />
                </div>

                <!-- Username -->
                <div class="mb-5">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <input type="text" id="username" name="username"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= $data['user']['username']; ?>" required />
                </div>

                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" id="email" name="email"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        value="<?= $data['user']['email']; ?>" required />
                </div>

                <!-- password -->
                <div class="mb-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password
                        <span class="bg-red-200 text-red-800 rounded-full px-2 py-1">Abaikan Jika Tidak Diubah</span>
                    </label>
                    <input type="password" id="password" name="password"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
                </div>


                <!-- Role -->
                <div class="mb-5">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <select id="role" name="role"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option value="Admin" <?= $data['user']['role'] === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                        <option value="Super Admin" <?= $data['user']['role'] === 'Super Admin' ? 'selected' : ''; ?>>Super Admin</option>
                    </select>
                </div>

                <!-- Photo Profile -->
                <div class="mb-5">
                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Photo Profile
                        <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Opsional</span>
                    </label>

                    <!-- Input File for New Photo -->
                    <input type="file" id="photo" name="photo"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        accept="image/*" />
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Unggah file dalam format .jpg, .png, atau .jpeg.</p>

                    <!-- Display Existing Photo (If Available) -->
                    <?php if (!empty($data['user']['photo'])) : ?>
                        <div class="mt-3">
                            <p class="text-sm text-gray-600 dark:text-gray-400">Foto saat ini:</p>
                            <img src="<?= base_url; ?>/uploads/user/<?= $data['user']['photo']; ?>"
                                alt="Photo Profile"
                                class="mt-2 h-20 w-20 rounded-full object-cover shadow-md">
                        </div>
                        <!-- Checkbox to Delete Existing Photo -->
                        <div class="mt-3">
                            <input type="checkbox" id="hapus_photo" name="hapus_photo" value="1"
                                class="text-blue-600 border-gray-300 focus:ring-blue-500">
                            <label for="hapus_photo" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                Hapus foto saat ini
                            </label>
                        </div>
                    <?php endif; ?>

                    <!-- Hidden Input to Store Existing Photo -->
                    <input type="hidden" name="photo_lama" value="<?= $data['user']['photo']; ?>" />
                </div>


                <!-- Tombol Submit -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan Perubahan</button>
            </form>

        </div>
        <!-- Table Section End -->
    </div>