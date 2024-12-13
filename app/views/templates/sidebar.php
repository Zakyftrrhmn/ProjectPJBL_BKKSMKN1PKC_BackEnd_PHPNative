<?php $role = $_SESSION['role'] ?? ''; ?>
<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
  <!-- ===== Sidebar Start ===== -->
  <aside
    :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false">

    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
      <a href="<?= base_url ?>/admin/dashboard">
        <img src="<?= !empty($data['logo']['logo_bkk']) ? base_url . '/uploads/logo/logobkk/' . $data['logo']['logo_bkk'] : base_url . '/assets/img/1._Logo_BKK-removebg-preview.png' ?>" alt="logo" class='bg-white rounded-lg px-3 w-50 inline-block shadow-lg object-cover' />
      </a>
      <button class=" block lg:hidden" @click.stop="sidebarToggle = !sidebarToggle">
        <svg class="fill-current" width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
            fill="" />
        </svg>
      </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
      <!-- Sidebar Menu -->
      <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{page: window.location.pathname}">

        <!-- Menu Group -->
        <div>
          <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

          <ul class="mb-6 flex flex-col gap-1.5">
            <!-- Conditional Menu Items Based on Role -->
            <?php if ($role === 'Super Admin'): ?>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/dashboard"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/dashboard') }">
                  <i class="bx bx-home text-xl"></i> Dashboard
                </a>
              </li>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/event"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/event') }">
                  <i class="bx bx-calendar-event text-xl"></i> Event
                </a>
              </li>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/pengumuman"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/pengumuman') }">
                  <i class='bx bx-bell'></i> Pengumuman
                </a>
              </li>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/perusahaan"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/perusahaan') }">
                  <i class="bx bx-buildings text-xl"></i> Perusahaan
                </a>
              </li>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/jurusan"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/jurusan') }">
                  <i class="bx bx-book text-xl"></i> Jurusan
                </a>
              </li>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/user"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/user') }">
                  <i class='bx bxs-user'></i> Users
                </a>
              </li>
            <?php endif; ?>

            <!-- Alumni Item for Admin and Super Admin -->
            <?php if ($role === 'Admin' || $role === 'Super Admin'): ?>
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/alumni"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/alumni') }">
                  <i class="bx bx-group text-xl"></i> Alumni
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>

        <!-- Settings Group -->
        <div>
          <?php if ($role === 'Super Admin'): ?>
            <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">Setting Front Page</h3>
          <?php endif; ?>
          <ul class="mb-6 flex flex-col gap-1.5">
            <?php if ($role === 'Super Admin'): ?>
              <!-- Beranda -->
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/beranda"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/beranda') }">
                  <i class="bx bx-home text-xl"></i> Beranda
                </a>
              </li>

              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/sambutan"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/sambutan') }">
                  <i class='bx bxs-chalkboard text-xl'></i> Sambutan
                </a>
              </li>


              <!-- About -->
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/about"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/about') }">
                  <i class='bx bx-question-mark'></i> Apa itu bkk?
                </a>
              </li>

              <!-- Tujuan -->
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/tujuan"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/tujuan') }">
                  <i class="bx bx-bullseye text-xl"></i> Tujuan
                </a>
              </li>

              <!-- Gallery -->
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/gallery"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/gallery') }">
                  <i class="bx bx-image-alt text-xl"></i> Gallery
                </a>
              </li>

              <!-- Info -->
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/info"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/info') }">
                  <i class="bx bx-info-square text-xl"></i> Info
                </a>
              </li>

              <!-- Logo -->
              <li>
                <a
                  class="group relative flex items-center gap-2.5 rounded-full px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                  href="<?= base_url ?>/admin/logo"
                  :class="{ 'bg-graydark dark:bg-meta-4': page.includes('/logo') }">
                  <i class="bx bx-star text-xl"></i> Logo
                </a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </nav>
    </div>
  </aside>
  <!-- ===== Sidebar End ===== -->