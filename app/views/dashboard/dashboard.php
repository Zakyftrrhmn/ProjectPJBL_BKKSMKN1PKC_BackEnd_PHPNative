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
                </ol>
            </nav>
        </div>
        <!-- Breadcrumb End -->

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
            <!-- Card Item Start -->
            <div class="rounded-sm border-b-4 border-blue-400 bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <i class="bx bx-calendar-event text-primary dark:text-white text-2xl"></i>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white"><?= $data['totalEvent'] ?></h4>
                        <span class="text-sm font-medium">Total Event</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="rounded-sm border-b-4 border-yellow-400 border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <i class="bx bx-buildings text-primary dark:text-white text-2xl"></i>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white"><?= $data['totalPerusahaan'] ?></h4>
                        <span class="text-sm font-medium">Total Perusahaan</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="rounded-sm border-b-4 border-red-400 border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <i class="bx bx-group text-primary dark:text-white text-2xl"></i>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white"><?= $data['totalAlumni'] ?></h4>
                        <span class="text-sm font-medium">Total Alumni</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->

            <!-- Card Item Start -->
            <div class="rounded-sm border-b-4 border-gray-500 border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
                <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                    <i class="bx bx-book text-primary dark:text-white text-2xl"></i>
                </div>
                <div class="mt-4 flex items-end justify-between">
                    <div>
                        <h4 class="text-title-md font-bold text-black dark:text-white"><?= $data['totalJurusan'] ?></h4>
                        <span class="text-sm font-medium">Total Jurusan</span>
                    </div>
                </div>
            </div>
            <!-- Card Item End -->
        </div>


        <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
            <div class="col-span-12 rounded-sm border border-stroke bg-white px-5 pb-5 pt-7.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:col-span-5">
                <div class="mb-3 justify-between gap-4 sm:flex">
                    <div>
                        <h4 class="text-xl font-bold text-black dark:text-white">
                            Alumni Statistik
                        </h4>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="mb-2">
                    <canvas id="chartThree" class="mx-auto flex justify-center"></canvas>
                </div>
                <div class="-mx-8 flex flex-col items-center justify-center gap-y-3">
                    <div class="w-full px-8 ">
                        <div class="flex w-full items-center">
                            <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#6577F3]"></span>
                            <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                                <span> Bekerja </span>
                                <span> <?= $data['bekerja'] ?> Alumni (<?= number_format(($data['bekerja'] / $data['totalAlumni']) * 100, 2) ?>%) </span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-8 ">
                        <div class="flex w-full items-center">
                            <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#8FD0EF]"></span>
                            <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                                <span> Kuliah </span>
                                <span> <?= $data['kuliah'] ?> Alumni (<?= number_format(($data['kuliah'] / $data['totalAlumni']) * 100, 2) ?>%) </span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-8 ">
                        <div class="flex w-full items-center">
                            <span class="mr-2 block h-3 w-full max-w-3 rounded-full bg-[#859a28]"></span>
                            <p class="flex w-full justify-between text-sm font-medium text-black dark:text-white">
                                <span> Unknown </span>
                                <span> <?= $data['unknown'] ?> Alumni (<?= number_format(($data['unknown'] / $data['totalAlumni']) * 100, 2) ?>%) </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>