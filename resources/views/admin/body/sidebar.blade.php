<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            HJN<span>oi</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Menu Utama</li>
         
            {{-- menu dashboard --}}
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
        </li>
            {{-- menu dashboard end --}}

            {{-- menu pesan --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Pesan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/pesan/kirim') }}" class="nav-link">Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('admin/pesan/compose') }}" class="nav-link">Sent</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- menu pesan end --}}    

            
            <li class="nav-item nav-category">MENU MASTER</li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false"
                    aria-controls="uiComponents">
                    <i class="link-icon" data-feather="feather"></i>
                    <span class="link-title">UI Kit</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="uiComponents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button"
                    aria-expanded="false" aria-controls="advancedUI">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Advanced UI</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="advancedUI">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- menu data barang --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#forms" role="button" aria-expanded="false"
                    aria-controls="forms">
                    <i class="link-icon" data-feather="inbox"></i>
                    <span class="link-title">Data Barang</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- isi menu data barang --}}
                <div class="collapse" id="forms">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/forms/basic-elements.html" class="nav-link">Produk Makanan</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced-elements.html" class="nav-link">Produk Minuman</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link">Obat-obatan</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/wizard.html" class="nav-link">Lpg dan Galon</a>
                        </li>
                    </ul>
                </div>
                {{-- isi menu data barang end --}}
            </li>
            {{-- menu data barang end--}}

            {{-- menu spplier --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#formssupplier" role="button" aria-expanded="false"
                    aria-controls="forms">
                    <i class="link-icon" data-feather="anchor"></i>
                    <span class="link-title">Data Suppleir</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- isi menu data supplier --}}
                <div class="collapse" id="formssupplier">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/forms/basic-elements.html" class="nav-link">Supplier Pabrik</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced-elements.html" class="nav-link">Supplier Sales</a>
                        </li>
                    </ul>
                </div>
                {{-- isi menu data supplier end --}}
            </li>
            {{-- menu supplier end --}}

            {{-- menu role --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#formrole" role="button" aria-expanded="false"
                    aria-controls="forms">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="link-title">Role</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- isi menu data role --}}
                <div class="collapse" id="formrole">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ url('admin/users') }}" class="nav-link">Users Role</a>
                        </li>
                    </ul>
                </div>
                {{-- isi menu data role end --}}
            </li>
            {{-- menu role end --}}

            <li class="nav-item nav-category">MENU TRANSAKSI</li>
            {{-- menu transaksi --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#charts" role="button" aria-expanded="false"
                    aria-controls="charts">
                    <i class="link-icon" data-feather="pie-chart"></i>
                    <span class="link-title">Transaksi</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- isi menu transaksi --}}
                <div class="collapse" id="charts">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/charts/apex.html" class="nav-link">Transaksi Jual</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/charts/chartjs.html" class="nav-link">Transaksi Beli</a>
                        </li>
                    </ul>
                </div>
                {{-- isi menu transaksi end --}}
            </li>
            {{-- menu transaksi end --}}

            
            <li class="nav-item nav-category">MENU LAPORAN</li>
            {{-- menu laporan --}}
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#tables" role="button" aria-expanded="false"
                    aria-controls="tables">
                    <i class="link-icon" data-feather="layout"></i>
                    <span class="link-title">Laporan</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                {{-- isi menu laporan --}}
                <div class="collapse" id="tables">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/tables/basic-table.html" class="nav-link">Rekap Jual</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/tables/data-table.html" class="nav-link">Rekap Beli</a>
                        </li>
                    </ul>
                </div>
                {{-- isi menu laporan end--}}
            </li>
            {{-- menu laporan end --}}
            



            {{-- <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#icons" role="button" aria-expanded="false"
                    aria-controls="icons">
                    <i class="link-icon" data-feather="smile"></i>
                    <span class="link-title">Icons</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="icons">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/icons/feather-icons.html" class="nav-link">Feather Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/icons/flag-icons.html" class="nav-link">Flag Icons</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/icons/mdi-icons.html" class="nav-link">Mdi Icons</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Pages</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" role="button"
                    aria-expanded="false" aria-controls="general-pages">
                    <i class="link-icon" data-feather="book"></i>
                    <span class="link-title">Special pages</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="general-pages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/general/blank-page.html" class="nav-link">Blank page</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/faq.html" class="nav-link">Faq</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/invoice.html" class="nav-link">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/profile.html" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/pricing.html" class="nav-link">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/general/timeline.html" class="nav-link">Timeline</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#authPages" role="button"
                    aria-expanded="false" aria-controls="authPages">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Authentication</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="authPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/auth/login.html" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/auth/register.html" class="nav-link">Register</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button"
                    aria-expanded="false" aria-controls="errorPages">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="errorPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/error/404.html" class="nav-link">404</a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/error/500.html" class="nav-link">500</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li> --}}
            {{-- <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li> --}}
        </ul>
    </div>
</nav>
