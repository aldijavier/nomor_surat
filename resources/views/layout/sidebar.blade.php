
<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-light-indigo elevation-4">
     <!-- Brand Logo -->
     <a href="" class="brand-link">
         <span class="brand-text font-weight-light">PT NAP Info Lintas Nusa</span>
     </a>


     <!-- Sidebar -->
     <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" style="margin: 0 auto;">
                <img src="{{ asset('frontend')}}/dist/img/matrixlogos.png" style="width:100px;" class="img-circle elevation-20" alt="User Image">
                <br>Hi, {{ Auth::user()->name }} !<br>
            </div>
        </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Nomor Surat -->
                <li class="nav-item has-treeview">
                    <a href="/surat" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Nomor Surat
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/surat/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Generate Nomor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/surat" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Nomor Surat</p>
                            </a>
                        </li>
                    </ul> -->
                </li>

                @if (auth()->user()->level=="Super Admin")
                <li class="nav-item">
                    <a href="{{ route('userindex')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manajemen Akun User</p>
                    </a>
                </li>
                @endif

                @if (auth()->user()->level=="Super Admin")
                <li class="nav-item">
                    <a href="{{ route('deptuser')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manajemen Dept User</p>
                    </a>
                </li>
                @endif

                {{-- <li class="nav-item">
                    <a href="/setting-akun" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>Setting Akun Password</p>
                    </a>
                </li> --}}
                

                <!-- Sales Support -->
                <!-- <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Sales Support
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/quotation/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quotation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/surat" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer</p>
                            </a>
                        </li>
                    </ul>
                </li> -->
            </ul>
        </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>