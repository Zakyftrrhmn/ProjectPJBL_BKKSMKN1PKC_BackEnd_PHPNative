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
          <a href="<?= base_url ?>/perusahaan/tambah" class="px-3 py-2 font-medium text-sm bg-primary text-white rounded-lg">Tambah Data</a>

          <!-- Search Box -->
          <form action="<?= base_url; ?>/perusahaan/cari" method="post" class="flex justify-end px-3 py-2 rounded-md border-2 border-blue-500 overflow-hidden max-w-xs md:max-w-sm w-100px md:w-auto">
            <input type="text" name="key" placeholder="Search Something..." class="w-full outline-none bg-transparent text-gray-600 text-sm" />
            <button type="submit" class="bg-primary text-sm px-3 py-1 rounded-lg text-white">
              Search
            </button>
          </form>
        </div>

        <div class="p-3">
          <div class="overflow-x-auto">
            <table class="table-auto w-full">
              <thead class="text-xs font-semibold uppercase  bg-gray-50">
                <tr>
                  <th class="p-2 whitespace-nowrap text-center">No</th>
                  <th class="p-2 whitespace-nowrap text-left ">Perusahaan</th>
                  <th class="p-2 whitespace-nowrap text-left">Email</th>
                  <th class="p-2 whitespace-nowrap text-left">Alamat</th>
                  <th class="p-2 whitespace-nowrap text-left">No.Telp</th>
                  <th class="p-2 whitespace-nowrap text-left">Bidang</th>
                  <th class="p-2 whitespace-nowrap text-center">Action</th>
                </tr>
              </thead>

              <tbody class="text-sm divide-y divide-gray-100">
                <?php $no = 1; ?>
                <?php foreach ($data['perusahaan'] as $row) : ?>
                  <tr>
                    <td class="p-2 whitespace-nowrap text-center"><?= $no; ?></td>
                    <td class="p-2 whitespace-nowrap flex items-center">
                      <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3 rounded-sm overflow-hidden bg-gray-100">
                        <?php if (!empty($row['logo_perusahaan'])): ?>
                          <img class="w-full h-full object-contain" src="<?= base_url ?>/uploads/perusahaan/<?= $row['logo_perusahaan']; ?>" alt="Logo <?= $row['nama_perusahaan']; ?>">
                        <?php else: ?>
                          <img class="w-full h-full object-contain" src="<?= base_url ?>/uploads/perusahaan/default-logo.png" alt="Default Logo">
                        <?php endif; ?>
                      </div>
                      <div class="font-medium"><?= $row['nama_perusahaan']; ?></div>
                    </td>
                    <td class="p-2 whitespace-nowrap"><?= $row['email_perusahaan']; ?></td>
                    <td class="p-2 whitespace-nowrap"><?= $row['alamat_perusahaan']; ?></td>
                    <td class="p-2 whitespace-nowrap"><?= $row['telepon_perusahaan']; ?></td>
                    <td class="p-2 whitespace-nowrap"><?= $row['industry_perusahaan']; ?></td>
                    <td class="p-2 whitespace-nowrap text-center">
                      <a href="<?= base_url ?>/perusahaan/edit/<?= $row['id'] ?>" class="text-lg text-warning-600 dark:text-warning-500 hover:underline"><i class='bx bxs-edit'></i></a>
                      <a href="<?= base_url ?>/perusahaan/hapus/<?= $row['id'] ?>"
                        class="text-lg text-red-600 dark:text-red-500 hover:underline"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus perusahaan ini?');">
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