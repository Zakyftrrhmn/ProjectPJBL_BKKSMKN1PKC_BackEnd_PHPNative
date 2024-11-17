<!-- ===== Main Content Start ===== -->
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
                        <a class="font-medium" href="index.html">Dashboard /</a>
                    </li>
                    <li class="font-medium text-primary">
                        <?= $data['title']; ?>
                    </li>
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <div class="flex flex-col justify-center h-full">
            <?php Flasher::Message(); ?>
            <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg dark:bg-boxdark dark:drop-shadow-none p-6">
                <form class="max-w-2xl mx-auto p-4" method="POST" action="<?= base_url ?>/jurusan/simpanJurusan" enctype="multipart/form-data">
                    <!-- Nama Jurusan -->
                    <div class="mb-5">
                        <label for="nama_jurusan" class="block mb-2 text-sm font-medium text-black dark:text-white">
                            Nama Jurusan
                        </label>
                        <input
                            type="text"
                            id="nama_jurusan"
                            name="nama_jurusan"
                            class="w-full p-2.5 bg-gray-50 border border-gray-300 text-black text-sm rounded-lg shadow-sm focus:ring-primary focus:border-primary dark:bg-gray-700 dark:border-gray-600 dark:text-black dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nama Jurusan"
                            required />
                    </div>

                    <!-- Submit Button -->
                    <div class="">
                        <button
                            type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-primary rounded-lg shadow 
               hover:bg-primaryhover focus:outline-none focus:ring-2 focus:ring-blue-500 
               dark:bg-primarydark dark:hover:bg-primaryhover dark:focus:ring-offset-gray-800">
                            Tambah Jurusan
                        </button>
                        <a
                            href="<?= base_url ?>/jurusan"
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