<!-- ===== Main Content Start ===== -->
<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-title-md2 font-bold text-black dark:text-white">
                Edit <?= $data['title']; ?>
            </h2>

            <nav>
                <ol class="flex items-center gap-2">
                    <li>
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">
                        Edit <?= $data['title']; ?>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <div class="flex flex-col justify-center h-full">
            <?php Flasher::Message(); ?>
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg dark:bg-boxdark dark:drop-shadow-none p-6">
                <form class="max-w-2xl mx-auto p-4" method="POST" action="<?= base_url ?>/perusahaan/updatePerusahaan" enctype="multipart/form-data">

                    <!-- Hidden Input for ID Perusahaan -->
                    <input type="hidden" name="id" value="<?= $data['perusahaan']['id']; ?>">
                    <input type="hidden" name="logo_lama" value="<?= $data['perusahaan']['logo_perusahaan']; ?>">

                    <!-- Nama Perusahaan -->
                    <div class="mb-5">
                        <label for="nama_perusahaan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Nama Perusahaan
                        </label>
                        <input
                            type="text"
                            id="nama_perusahaan"
                            name="nama_perusahaan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?= $data['perusahaan']['nama_perusahaan']; ?>"
                            required />
                    </div>

                    <!-- Alamat Perusahaan -->
                    <div class="mb-5">
                        <label for="alamat_perusahaan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Alamat Perusahaan
                        </label>
                        <input
                            type="text"
                            id="alamat_perusahaan"
                            name="alamat_perusahaan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?= $data['perusahaan']['alamat_perusahaan']; ?>"
                            required />
                    </div>

                    <!-- Email Perusahaan -->
                    <div class="mb-5">
                        <label for="email_perusahaan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Email Perusahaan
                        </label>
                        <input
                            type="email"
                            id="email_perusahaan"
                            name="email_perusahaan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?= $data['perusahaan']['email_perusahaan']; ?>"
                            required />
                    </div>

                    <!-- Telepon Perusahaan -->
                    <div class="mb-5">
                        <label for="telepon_perusahaan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Telepon Perusahaan
                        </label>
                        <input
                            type="tel"
                            id="telepon_perusahaan"
                            name="telepon_perusahaan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?= $data['perusahaan']['telepon_perusahaan']; ?>"
                            required />
                    </div>

                    <!-- Logo Perusahaan -->
                    <div class="mb-5">
                        <label for="logo_perusahaan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Logo Perusahaan
                        </label>
                        <input
                            type="file"
                            id="logo_perusahaan"
                            name="logo_perusahaan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <small class="text-gray-500">Max size: 1MB, Format: JPG, PNG, JPEG</small>
                        <p class="mt-2 text-sm text-gray-600">Current Logo: <img src="<?= base_url ?>/uploads/perusahaan/<?= $data['perusahaan']['logo_perusahaan']; ?>" alt="Logo Perusahaan" class="inline-block h-12" /></p>
                    </div>

                    <!-- Industri Perusahaan -->
                    <div class="mb-5">
                        <label for="industry_perusahaan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Bidang Perusahaan
                        </label>
                        <input
                            type="text"
                            id="industry_perusahaan"
                            name="industry_perusahaan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="<?= $data['perusahaan']['industry_perusahaan']; ?>"
                            required />
                    </div>

                    <!-- Submit Button -->
                    <div class="">
                        <button
                            type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-primary rounded-lg shadow 
               hover:bg-primaryhover focus:outline-none focus:ring-2 focus:ring-blue-500 
               dark:bg-primarydark dark:hover:bg-primaryhover dark:focus:ring-offset-gray-800">
                            Update Perusahaan
                        </button>
                        <a
                            href="<?= base_url ?>/perusahaan"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-black rounded-lg shadow 
               hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 
               dark:bg-primarydark dark:hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</main>
<!-- ===== Main Content End ===== -->