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
                <!-- Tambah Alumni Button -->
                <a href="<?= base_url; ?>/alumni/tambah" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <i class="bx bx-group text-lg mr-2"></i> Tambah Alumni
                </a>

                <!-- Form Search -->
                <form action="<?= base_url; ?>/alumni/cari" method="post" class="flex items-center w-full max-w-lg gap-2">
                    <input type="text" id="voice-search" name="key"
                        class="flex-grow bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-3 py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search Alumni..."
                        value="<?= isset($data['key']) ? htmlspecialchars($data['key']) : ''; ?>"
                        required>

                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <i class='bx bx-search-alt-2'></i> Search
                    </button>

                    <a href="<?= base_url; ?>/alumni" class="inline-flex items-center px-3 py-2 text-sm font-medium text-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:text-white dark:focus:ring-blue-800">
                        <i class='bx bx-reset'></i> Reset
                    </a>
                </form>

            </div>


            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="px-1 py-1">No</th>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">NISN</th>
                            <th scope="col" class="px-6 py-3">Jurusan</th>
                            <th scope="col" class="px-6 py-3">T.Lulus</th>
                            <th scope="col" class="px-6 py-3 text-center">Status</th>
                            <th scope="col" class="px-6 py-3 ">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['alumni'] as $row) : ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-1 py-1 text-center"><?= $no; ?></td>
                                <td class="px-6 py-4 whitespace-nowrap"><?= $row['nama']; ?></td>
                                <td class="px-6 py-4"><?= $row['nisn']; ?></td>
                                <td class="px-6 py-4"><?= $row['nama_jurusan']; ?></td>
                                <td class="px-6 py-3"><?= $row['tahun_lulus']; ?></td>
                                <td class="px-6 py-4 text-center">
                                    <span class="
        <?php
                            if ($row['status'] == 'Kuliah') {
                                echo 'bg-green-300 text-green-700  text-sm rounded-full px-4 py-1 spacing'; // Warna hijau dan efek hover jika statusnya kuliah
                            } elseif ($row['status'] == 'Bekerja') {
                                echo 'bg-blue-300 text-blue-700  text-sm rounded-full px-4 py-1 spacing'; // Warna biru dan efek hover jika statusnya bekerja
                            } else {
                                echo 'bg-red-300 text-red-700  text-sm rounded-full px-4 py-1 spacing'; // Warna merah dan efek hover jika statusnya tidak diketahui
                            }
        ?>
    ">
                                        <?= $row['status']; ?>
                                    </span>
                                </td>



                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="<?= base_url; ?>/alumni/detail/<?= $row['id'] ?>" class="text-lg text-blue-700 dark:text-blue-500"><i class='bx bx-show'></i></a>
                                    <a href="<?= base_url; ?>/alumni/edit/<?= $row['id'] ?>" class="text-lg text-yellow-500 dark:text-blue-500"><i class='bx bxs-edit'></i></a>
                                    <a href="javascript:void(0);" data-modal-target="popup-modal" data-delete-url="<?= base_url; ?>/alumni/hapus/<?= $row['id'] ?>" class="text-lg text-red-500 dark:text-blue-500 btn-delete">
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