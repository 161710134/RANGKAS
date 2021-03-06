<aside class="main-sidebar sidebar-dark-success elevation-4">
  <a href="index3.html" class="brand-link">
      <img src="{{ asset('icon.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><font color = "green">SiMiRangKas</font></span>
    </a>

  <div class="sidebar" data-color="purple" data-image="{{ asset('sidebar-5.jpg')}}">
      <!-- Sidebar user panel (optional) -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-users"></i>
              <p>
                {{ Auth::user()->name }}
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                 </form>
              </li>
            </ul>
            </li>
          </ul>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-table"></i>
              <p>
                Tables
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{route('barang.index')}}" class="nav-link">
                  <i class="fa fa-briefcase"></i>
                  <p>Barang</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('anggota.index') }}" class="nav-link">
                  <i class="fa fa-users"></i>
                  <p>Anggota</p>
                </a>
             </li>

              <li class="nav-item">
                <a href="{{ route('peminjaman.index') }}" class="nav-link">
                  <i class="fa fa-building sub-icon-mg"></i>
                  <p>Peminjam</p>
                </a>
             </li>
             
              <li class="nav-item">
                <a href="{{ route('pengembalian.index') }}" class="nav-link">
                  <i class="fa fa-folder"></i>
                  <p>Pengembalian</p>
                </a>
             </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Laporan
              <i class="fa fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
               <li class="nav-item">
                <a href="{{url('admin/laporan/anggota')}}" class="nav-link">
                  <i class="fa fa-female sub-icon-mg"></i>
                  <p>Data Anggota</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/laporan/barang')}}" class="nav-link">
                  <i class="fa fa-briefcase"></i>
                  <p>Data Barang</p>
                </a>
             </li>
             
              <li class="nav-item">
                <a href="{{ url('admin/laporan/peminjaman') }}" class="nav-link">
                  <i class="fa fa-building sub-icon-mg"></i>
                  <p>Data Peminjam</p>
                </a>
             </li>
             
              <li class="nav-item">
                <a href="{{ url('admin/laporan/pengembalian') }}" class="nav-link">
                  <i class="fa fa-folder"></i>
                  <p>Data Pengembalian</p>
                </a>
             </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
