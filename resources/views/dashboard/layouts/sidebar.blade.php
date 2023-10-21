 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">

         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}  " href="/dashboard">
                 <i class="bi bi-grid"></i>
                 <span>Dashboard</span>
             </a>
         </li><!-- End Dashboard Nav -->
         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/kunjungan') ? '' : 'collapsed' }}"
                 href="/dashboard/kunjungan?filter={{ date('Y-m') }}&waktu=Bulan Ini">
                 <i class="bi bi-box-arrow-in-right"></i>
                 <span>Kunjungan</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/karyawan') ? '' : 'collapsed' }}"
                 href="/dashboard/karyawan?filter={{ date('Y-m') }}&waktu=Bulan Ini">
                 <i class="bi bi-people-fill"></i>
                 <span>Kunjungan Karyawan</span>
             </a>
         </li><!-- End Dashboard Nav -->

         <li class="nav-heading">Pages</li>

         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/ruangan*') ? '' : 'collapsed' }}" data-bs-target="#kelas"
                 data-bs-toggle="collapse" href="#">
                 <i class="bi bi-houses"></i></i><span>Kelas</span><i class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="kelas" class="nav-content {{ Request::is('dashboard/ruangan*') ? '' : 'collapse' }} "
                 data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="/dashboard/ruangan?kelas=7"
                         class="{{ Request::is('dashboard/ruangan?kelas=7') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Kelas VII</span>
                     </a>
                 </li>
                 <li>
                     <a href="/dashboard/ruangan?kelas=8"
                         class="{{ Request::is('dashboard/ruangan?kelas=8') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Kelas VIII</span>
                     </a>
                 </li>
                 <li>
                     <a href="/dashboard/ruangan?kelas=9"
                         class="{{ Request::is('dashboard/ruangan?kelas=9') ? 'active' : '' }}">
                         <i class="bi bi-circle"></i><span>Kelas IX</span>
                     </a>
                 </li>
             </ul>
         </li><!-- End Icons Nav -->

         <li class="nav-item">
             <a class="nav-link {{ Request::is('dashboard/statistik') ? '' : 'collapsed' }}"
                 href="/dashboard/statistik?dari={{ date('Y') }}-07-01&sampai={{ date('Y', strtotime('+1 year')) }}-07-01">
                 <i class="bi bi-bar-chart-line"></i>
                 <span>Analisa</span>
             </a>
         </li><!-- End Profile Page Nav -->


     </ul>

 </aside><!-- End Sidebar-->
