<section class="py-14 px-4 lg:px-28">
    <div class="container mx-auto">
        <!-- Title -->
        <div
            class="flex justify-start gap-4 lg:justify-between items-center mb-6 flex-col lg:flex-row"
            data-aos="fade-right" data-aos-delay="50">
            <div class="flex flex-col w-full lg:w-[60%]">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-800 mb-1">
                    Formulir Pendaftaran
                </h2>
                <p class="text-xs sm:text-sm font-bold italic text-[#44808B]">
                    Silakan isi formulir pendaftaran dengan data pribadi Anda.
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <!-- Kualifikasi dan Job Description Section -->
            <div
                class="p-6 col-span-1 flex flex-col gap-y-11"
                data-aos="fade-right"
                data-aos-delay="50">
                <!-- Card Design -->
                <div
                    class="max-w-sm p-5 bg-white shadow-lg rounded-lg border border-gray-200">
                    <div class="flex gap-4 text-sm items-center">
                        <!-- Image -->
                        <?php foreach ($data['perusahaan'] as $row): ?>
                            <?php if ($row['id'] == $data['event']['id_perusahaan']): ?>
                                <img
                                    src="<?= !empty($row['logo_perusahaan']) ? base_url . '/uploads/perusahaan/' . $row['logo_perusahaan'] : base_url . '/assets/img/6.default-logo-perusahaan.png' ?>"
                                    alt="Logo Perusahaan"
                                    class="w-16 h-16 object-contain rounded-lg" />
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <!-- Status Badge -->
                        <div class="flex flex-col gap-y-1">
                            <span
                                class="w-fit <?php
                                                if ($data['event']['tipe'] == 'Magang') {
                                                    echo 'bg-green-300 text-green-800 text-sm rounded-full px-4 py-1';
                                                } elseif ($data['event']['tipe'] == 'Lowongan Kerja') {
                                                    echo 'bg-blue-300 text-blue-800 text-sm rounded-full px-4 py-1';
                                                } elseif ($data['event']['tipe'] == 'Job Fair') {
                                                    echo 'bg-orange-300 text-orange-800 text-sm rounded-full px-4 py-1';
                                                } else {
                                                    echo 'bg-gray-300 text-gray-800 text-sm rounded-full px-4 py-1';
                                                }
                                                ?>"><?= $data['event']['tipe']; ?></span>
                            <h3 class="text-md font-bold text-gray-800"><?= $data['event']['posisi']; ?></h3>
                            <div class="flex gap-x-1">
                                <p class="text-sm font-semibold text-black">


                                    <?php foreach ($data['perusahaan'] as $row): ?>
                                        <?php if ($row['id'] == $data['event']['id_perusahaan']): ?>
                                            <?= $row['nama_perusahaan']; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </p>
                                <span class="inline-block ml-1 text-blue-500">
                                    <i class="bx bxs-badge-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Job Info -->
                    <div class="mt-4">
                        <!-- Salary and Location -->
                        <div class="mt-4 flex flex-col justify-between gap-2">
                            <div class="flex justify-between">
                                <p class="text-sm font-bold">Perkiraan gaji</p>
                                <p class="text-sm text-gray-600">
                                    <?= 'Rp ' . number_format($data['event']['gaji'], 0, ',', '.'); ?>
                                </p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-sm font-bold">Location</p>
                                <p class="text-sm text-gray-600"><?= $data['event']['lokasi']; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-200 w-full h-0.5 mt-4"></div>

                    <!-- Date -->
                    <div class="mt-4 flex items-center text-xs text-gray-500">
                        <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">
                            masih berlangsung hingga <?php echo date('d M Y', strtotime($data['event']['tanggal_terakhir'])); ?>
                        </span>
                    </div>

                </div>

                <div
                    class="max-w-md p-5 bg-white shadow-lg rounded-lg border border-gray-200">
                    <div class="mb-5">
                        <h3 class="text-lg font-bold mb-2">Kualifikasi</h3>
                        <?= $data['event']['kualifikasi']; ?>
                    </div>
                    <div class="mb-5">
                        <h3 class="text-lg font-bold mb-2">Job Description</h3>
                        <?= $data['event']['job_description']; ?>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md col-span-1" data-aos="fade-left" data-aos-delay="50">
                <h3 class="text-2xl font-bold mb-4">Form Pendaftaran</h3>
                <form action="<?= base_url ?>/landing/pendaftaranSimpan/<?= $data['event']['id'] ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_event" value="<?= $data['event']['id'] ?>">
                    <div class="space-y-5">
                        <?php Flasher::flash(); ?>
                        <!-- Nama Lengkap -->
                        <div>
                            <label for="nama_lengkap" class="block text-xs font-semibold text-gray-700">Nama Lengkap</label>
                            <input type="text" id="nama_lengkap" name="nama_lengkap" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Nomor KTP -->
                        <div>
                            <label for="nomor_ktp" class="block text-xs font-semibold text-gray-700">Nomor KTP (NIK)</label>
                            <input type="number" id="nomor_ktp" name="nomor_ktp" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label for="tanggal_lahir" class="block text-xs font-semibold text-gray-700">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Tempat Lahir -->
                        <div>
                            <label for="tempat_lahir" class="block text-xs font-semibold text-gray-700">Tempat Lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Usia -->
                        <div>
                            <label for="usia" class="block text-xs font-semibold text-gray-700">Usia</label>
                            <input type="number" id="usia" name="usia" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label for="jenis_kelamin" class="block text-xs font-semibold text-gray-700">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="text-xs w-full p-2 border rounded-md mt-1">
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- No Handphone -->
                        <div>
                            <label for="no_handphone" class="block text-xs font-semibold text-gray-700">No Handphone</label>
                            <input type="text" id="no_handphone" name="no_handphone" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-xs font-semibold text-gray-700">Email Aktif</label>
                            <input type="email" id="email" name="email" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Agama -->
                        <div>
                            <label for="agama" class="block text-xs font-semibold text-gray-700">Agama</label>
                            <input type="text" id="agama" name="agama" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Tinggi Badan -->
                        <div>
                            <label for="tinggi_badan" class="block text-xs font-semibold text-gray-700">Tinggi Badan</label>
                            <input type="number" id="tinggi_badan" name="tinggi_badan" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Berat Badan -->
                        <div>
                            <label for="berat_badan" class="block text-xs font-semibold text-gray-700">Berat Badan</label>
                            <input type="number" id="berat_badan" name="berat_badan" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label for="alamat_sekarang" class="block text-xs font-semibold text-gray-700">Alamat Sekarang</label>
                            <input type="text" id="alamat_sekarang" name="alamat_sekarang" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Asal Sekolah -->
                        <div>
                            <label for="asal_sekolah" class="block text-xs font-semibold text-gray-700">Asal Sekolah</label>
                            <input type="text" id="asal_sekolah" name="asal_sekolah" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- jurusan -->
                        <div>
                            <label for="jurusan" class="block text-xs font-semibold text-gray-700">jurusan</label>
                            <input type="text" id="jurusan" name="jurusan" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- tahun_lulus -->
                        <div>
                            <label for="tahun_lulus" class="block text-xs font-semibold text-gray-700">Tahun Lulus</label>
                            <input type="number" id="tahun_lulus" name="tahun_lulus" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>



                        <!-- Foto KK -->
                        <div>
                            <label for="foto_kk" class="block text-xs font-semibold text-gray-700">Foto KK</label>
                            <input type="file" id="foto_kk" name="foto_kk" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- Foto KP -->
                        <div>
                            <label for="foto_ktp" class="block text-xs font-semibold text-gray-700">Foto KTP </label>
                            <input type="file" id="foto_ktp" name="foto_ktp" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>

                        <!-- CV -->
                        <div>
                            <label for="file_cv" class="block text-xs font-semibold text-gray-700">CV Anda </label>
                            <input type="file" id="file_cv" name="file_cv" class="text-xs w-full p-2 border rounded-md mt-1" required />
                        </div>


                        <!-- CV -->
                        <div>
                            <label for="sertifikat" class="block text-xs font-semibold text-gray-700">Sertifikat Pendukung <span class="bg-green-200 text-green-800 rounded-full px-2 py-1">Opsional</span></label>
                            <input type="file" id="sertifikat" name="sertifikat" class="text-xs w-full p-2 border rounded-md mt-1" />
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-center gap-4 mt-6">
                            <button type="submit" class="text-sm text-center w-full font-medium bg-[#44808B] text-white px-8 py-2 rounded-lg shadow-lg hover:bg-[#30626b] hover:shadow-xl transition duration-200 cursor-pointer">
                                Kirim Formulir
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>