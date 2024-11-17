    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
      <!-- ===== Sidebar Start ===== -->
      <aside
        :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
        class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
        @click.outside="sidebarToggle = false">
        <!-- SIDEBAR HEADER -->
        <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
          <a href="index.html">
            <img src="<?= base_url ?>/assets/src/images/logo/logo.svg" alt="Logo" />
          </a>

          <button
            class="block lg:hidden"
            @click.stop="sidebarToggle = !sidebarToggle">
            <svg
              class="fill-current"
              width="20"
              height="18"
              viewBox="0 0 20 18"
              fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                fill="" />
            </svg>
          </button>
        </div>
        <!-- SIDEBAR HEADER -->

        <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
          <!-- Sidebar Menu -->
          <nav class="mt-5 px-4 py-4 lg:mt-9 lg:px-6" x-data="{selected: $persist('Dashboard')}">
            <!-- Menu Group -->
            <div>
              <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">MENU</h3>

              <ul class="mb-6 flex flex-col gap-1.5">
                <!-- Menu Item Dashboard -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    :class="{ 'bg-graydark dark:bg-meta-4': page === 'dashboard' }">
                    <i class="bx bx-home text-xl"></i> Dashboard
                  </a>
                </li>

                <!-- Event Item Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Event' ? '':'Event')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Event') && (page === 'event') }">
                    <i class="bx bx-calendar-event text-xl"></i> Event
                  </a>
                </li>

                <!-- Pengumuman Item Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Pengumuman' ? '':'Pengumuman')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Pengumuman') && (page === 'pengumuman') }">
                    <i class='bx bx-bell'></i> Pengumuman
                  </a>
                </li>

                <!-- Perusahaan Item Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click.prevent="selected = (selected === 'Perusahaan' ? '':'Perusahaan')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Perusahaan') || (page === 'perusahaan') }">
                    <i class="bx bx-buildings text-xl"></i> Perusahaan
                  </a>
                </li>

                <!-- Jurusan Item Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Jurusan' ? '':'Jurusan')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Jurusan') || (page === 'jurusan') }">
                    <i class="bx bx-book text-xl"></i> Jurusan
                  </a>
                </li>

                <!-- Alumni Item Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Alumni' ? '':'Alumni')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Alumni') && (page === 'alumni') }">
                    <i class="bx bx-group text-xl"></i> Alumni
                  </a>
                </li>
              </ul>
            </div>

            <!-- Others Group -->
            <div>
              <h3 class="mb-4 ml-4 text-sm font-medium text-bodydark2">Setting Front Page</h3>

              <ul class="mb-6 flex flex-col gap-1.5">
                <!-- Menu Beranda Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Beranda' ? '':'Beranda')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Beranda') && (page === 'beranda') }">
                    <i class="bx bx-home-alt text-xl"></i> Beranda
                  </a>
                </li>

                <!-- Menu Banner Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#l"
                    @click="selected = (selected === 'Banner' ? '':'Banner')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Banner') && (page === 'banner') }">
                    <i class="bx bx-image text-xl"></i> Banner
                  </a>
                </li>

                <!-- Menu Tentang Kami Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'TentangKami' ? '':'TentangKami')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'TentangKami') && (page === 'tentangKami') }">
                    <i class="bx bx-info-circle text-xl"></i> Tentang Kami
                  </a>
                </li>

                <!-- Menu Tujuan Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Tujuan' ? '':'Tujuan')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Tujuan') && (page === 'tujuan') }">
                    <i class="bx bx-target-lock text-xl"></i> Tujuan
                  </a>
                </li>

                <!-- Menu Contact Tables -->
                <li>
                  <a
                    class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                    href="#"
                    @click="selected = (selected === 'Contact' ? '':'Contact')"
                    :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Contact') && (page === 'contact') }">
                    <i class="bx bx-envelope text-xl"></i> Contact
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- Sidebar Menu -->
        </div>
      </aside>
      <!-- ===== Sidebar End ===== -->