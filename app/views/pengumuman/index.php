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
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-4">
                <!-- Tambah Pengumuman Button -->
                <a href="<?= base_url; ?>/pengumuman/tambah" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class='bx bx-bell text-lg mr-2'></i> Tambah Pengumuman
                </a>

                <!-- Form Search -->
                <form action="<?= base_url; ?>/pengumuman/cari" method="post" class="flex items-center w-full max-w-lg gap-2">
                    <input type="text" id="voice-search" name="key"
                        class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search  Pengumuman..."
                        value="<?= isset($data['key']) ? htmlspecialchars($data['key']) : ''; ?>"
                        required>

                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class='bx bx-search-alt-2'></i> Search
                    </button>

                    <a href="<?= base_url; ?>/pengumuman" class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:text-white dark:focus:ring-blue-800">
                        <i class='bx bx-reset'></i> Reset
                    </a>
                </form>

            </div>


            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-2 py-1">No</th>
                            <th scope="col" class="px-6 py-3">Nama Pengumuman</th>
                            <th scope="col" class="px-6 py-3">Tanggal Pengumuman</th>
                            <th scope="col" class="px-6 py-3">File Pengumuman</th>
                            <th scope="col" class="px-6 py-3 ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['pengumuman'] as $row) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-2 py-2 text-center"><?= $no; ?></td>
                                <td class="px-6 py-4"><?= $row['nama_pengumuman']; ?></td>
                                <td class="px-6 py-4"><?= $row['tanggal_pengumuman']; ?></td>
                                <td class="px-6 py-4">
                                    <a href="<?= base_url; ?>/uploads/pengumuman/<?= $row['file_pengumuman']; ?>"
                                        download="<?= $row['file_pengumuman']; ?>"
                                        class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                        Donwload File
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?= base_url; ?>/pengumuman/edit/<?= $row['id'] ?>" class="text-lg text-yellow-500 dark:text-blue-500"><i class='bx bxs-edit'></i></a>
                                    <a href="javascript:void(0);" data-modal-target="popup-modal" data-delete-url="<?= base_url; ?>/pengumuman/hapus/<?= $row['id'] ?>" class="text-lg text-red-500 dark:text-blue-500 btn-delete">
                                        <i class='bx bxs-trash'></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Table Section End -->
    </div>