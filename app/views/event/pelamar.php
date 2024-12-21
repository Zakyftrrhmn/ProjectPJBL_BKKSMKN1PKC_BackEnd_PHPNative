<main>
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <!-- Breadcrumb Start -->
        <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <h2 class="text-lg font-bold text-black dark:text-white">
                <?= $data['title']; ?> di <?php foreach ($data['perusahaan'] as $row): ?>
                    <?php if ($row['id'] == $data['event']['id_perusahaan']): ?>
                        <?= $row['nama_perusahaan']; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                - <?= $data['event']['posisi']; ?>
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

        <!-- Table Section Start -->
        <div class="bg-white w-full dark:bg-gray-800 shadow rounded-lg p-6">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-4">
                <!-- Tambah Event Button -->
                <div class="flex space-x-2">
                    <a href="<?= base_url; ?>/admin/event"
                        class="flex items-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 px-3 py-2 rounded-lg 
              dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                        Kembali
                    </a>
                    <a href="<?= base_url; ?>/admin/event/cetakPelamar/<?= $data['event']['uuid']; ?>"
                        class="flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 text-sm rounded-lg px-4 py-2 
          dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                        Cetak
                    </a>

                </div>

                <!-- Form Search -->
                <h2 class="text-sm">Total Pelamar : <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full"><?= $data['totalPelamar'] ?> peserta</span> </h2>

            </div>


            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-white">

                    <?php if (empty($data['pelamar'])): ?>
                        <div class="w-full flex items-center flex-wrap justify-center gap-10 pt-14" data-aos="fade-up" data-aos-delay="50">
                            <div class="grid gap-4 w-full">
                                <div class="w-20 h-20 mx-auto bg-green-200 rounded-full shadow-sm justify-center items-center inline-flex">
                                    <!-- Icon (You can replace this with any other icon you prefer) -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33" height="32" viewBox="0 0 33 32" fill="none">
                                        <g id="File Serch">
                                            <path id="Vector" d="M19.9762 4V8C19.9762 8.61954 19.9762 8.92931 20.0274 9.18691C20.2379 10.2447 21.0648 11.0717 22.1226 11.2821C22.3802 11.3333 22.69 11.3333 23.3095 11.3333H27.3095M18.6429 19.3333L20.6429 21.3333M19.3095 28H13.9762C10.205 28 8.31934 28 7.14777 26.8284C5.9762 25.6569 5.9762 23.7712 5.9762 20V12C5.9762 8.22876 5.9762 6.34315 7.14777 5.17157C8.31934 4 10.205 4 13.9762 4H19.5812C20.7604 4 21.35 4 21.8711 4.23403C22.3922 4.46805 22.7839 4.90872 23.5674 5.79006L25.9624 8.48446C26.6284 9.23371 26.9614 9.60833 27.1355 10.0662C27.3095 10.524 27.3095 11.0253 27.3095 12.0277V20C27.3095 23.7712 27.3095 25.6569 26.138 26.8284C24.9664 28 23.0808 28 19.3095 28ZM19.3095 16.6667C19.3095 18.5076 17.8171 20 15.9762 20C14.1352 20 12.6429 18.5076 12.6429 16.6667C12.6429 14.8257 14.1352 13.3333 15.9762 13.3333C17.8171 13.3333 19.3095 14.8257 19.3095 16.6667Z" stroke="#4F46E5" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="text-center text-black text-base font-semibold leading-relaxed pb-1">
                                        Uppss, Belum ada yang melamar event ini :(
                                    </h2>
                                    <p class="text-center text-black text-sm font-normal leading-snug pb-4">
                                        Tidak ada data Pelamar yang tersedia saat ini. <br />
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                            <tr>
                                <th scope="col" class="px-2 py-1">No</th>
                                <th scope="col" class="px-6 py-3">Nama Lengkap</th>
                                <th scope="col" class="px-6 py-3">Nomor KTP</th>
                                <th scope="col" class="px-6 py-3">No. Handphone</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data['pelamar'] as $row): ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="px-2 py-2 text-center"><?= $no; ?></td>
                                    <td class="px-6 py-4"><?= $row['nama_lengkap']; ?></td>
                                    <td class="px-6 py-4"><?= $row['nomor_ktp']; ?></td>
                                    <td class="px-6 py-4"><?= $row['no_handphone']; ?></td>
                                    <td class="px-6 py-4"><?= $row['email']; ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="<?= base_url; ?>/admin/event/detailpelamar/<?= $row['uuid'] ?>" class="text-sm flex items-center gap-1 text-blue-700 dark:text-blue-500"><i class='bx bx-show'></i>detail</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            endforeach; ?>
                        <?php endif; ?>

                        </tbody>
                </table>
            </div>

        </div>
        <!-- Table Section End -->
    </div>