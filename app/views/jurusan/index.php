<!-- ===== Main Content Start ===== -->
<main>
  <div class="mx-auto w-screen-2xl p-4 md:p-6 2xl:p-10">
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
          <li class="font-medium text-primary"><?= $data['title']; ?></li>
        </ol>
      </nav>
    </div>
    <!-- Breadcrumb End -->

    <div class="flex flex-col justify-center h-full">
      <?php Flasher::Message(); ?>
      <!-- Table -->
      <div class="w-full max-w-2xl mx-auto bg-white shadow-lg rounded-lg dark:bg-boxdark dark:drop-shadow-none">
        <div class="px-5 py-5 border-b border-gray-100 flex flex-row justify-between gap-2 items-center">
          <!-- Tombol Tambah Data -->
          <a href="<?= base_url ?>/jurusan/tambah" class="px-3 py-2 font-medium text-sm bg-primary text-white rounded-lg">Tambah Data</a>

          <!-- Search Box -->
          <form action="<?= base_url; ?>/jurusan/cari" method="post" class="flex justify-end px-3 py-2 rounded-md border-2 border-blue-500 overflow-hidden max-w-xs md:max-w-sm w-100px md:w-auto">
            <input type="text" name="key" placeholder="Search Something..." class="w-full outline-none bg-transparent text-gray-600 text-sm" />
            <button type="submit" class="bg-primary text-sm px-3 py-1 rounded-lg text-white">
              Search
            </button>
          </form>
        </div>

        <div class="p-3">
          <div class="overflow-x-auto">
            <table class="table-auto w-full">
              <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                <tr>
                  <th class="p-2 whitespace-nowrap text-center">No</th>
                  <th class="p-2 whitespace-nowrap text-left">Nama Jurusan</th>
                  <th class="p-2 whitespace-nowrap text-center">Action</th>
                </tr>
              </thead>

              <tbody class="text-sm divide-y divide-gray-100">
                <?php $no = 1; ?>
                <?php foreach ($data['jurusan'] as $row) : ?>
                  <tr>
                    <td class="p-2 whitespace-nowrap text-center"><?= $no; ?></td>
                    <td class="p-2 whitespace-nowrap"><?= $row['nama_jurusan']; ?></td>
                    <td class="p-2 whitespace-nowrap text-center">
                      <a href="<?= base_url ?>/jurusan/edit/<?= $row['id'] ?>" class="text-lg text-warning-600 dark:text-warning-500 hover:underline"><i class='bx bxs-edit'></i></a>
                      <a href="<?= base_url ?>/jurusan/hapus/<?= $row['id'] ?>"
                        class="text-lg text-red-600 dark:text-red-500 hover:underline"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus jurusan ini?');">
                        <i class='bx bx-trash'></i>
                      </a>
                    </td>
                  </tr>
                <?php $no++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



</main>