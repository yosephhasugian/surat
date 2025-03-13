<aside class="main-sidebar elevation-4" style="background: linear-gradient(135deg, rgb(0, 224, 30), #8e2de2); color: #ffffff; backdrop-filter: blur(5px); box-shadow: 5px 0px 15px rgba(0,0,0,0.3); position: fixed; height: 100vh; overflow-y: auto;">
    <a href="<?= base_url('dashboard') ?>" class="brand-link text-center" style="display: flex; align-items: center; justify-content: center; padding: 15px;">
        <img src="<?= site_url('assets/img/foto.jpeg') ?>" alt="Logo" class="brand-image img-circle elevation-3" style="width: 50px; height: 50px; border: 2px solid #ffffff;">
        <span class="brand-text font-weight-bold" style="color: #ffffff; font-size: 1.2rem; margin-left: 10px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Diary in my life</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-line" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Dashboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">
                            Surat
                            <i class="right fas fa-angle-left" style="color: #ffffff;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Surat_masuk') ?>" class="nav-link">
                                <i class="far fa-envelope nav-icon" style="color: #ffffff;"></i>
                                <p style="color: #ffffff;">Surat Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Surat_keluar') ?>" class="nav-link">
                                <i class="far fa-envelope nav-icon" style="color: #ffffff;"></i>
                                <p style="color: #ffffff;">Surat Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('paparan') ?>" class="nav-link">
                                <i class="far fa-file-alt nav-icon" style="color: #ffffff;"></i>
                                <p style="color: #ffffff;">Paparan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('dokumentasi') ?>" class="nav-link">
                                <i class="far fa-folder-open nav-icon" style="color: #ffffff;"></i>
                                <p style="color: #ffffff;">Dokumentasi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('Rekap') ?>" class="nav-link">
                    <i class="nav-icon fas fa-print" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Cetak</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Periode') ?>" class="nav-link">
                        <i class="nav-icon fas fa-print" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Rekapitulasi Data</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('profil') ?>" class="nav-link">
                        <i class="nav-icon fas fa-lock" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Password</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('logout') ?>" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt" style="color: #ffffff;"></i>
                        <p style="color: #ffffff;">Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <script>
        function createLeaf() {
            const leaf = document.createElement('div');
            leaf.classList.add('leaf');
            leaf.style.left = Math.random() * 100 + 'px';
            leaf.style.animationDelay = Math.random() * 5 + 's';
            document.querySelector('.main-sidebar').appendChild(leaf);
        }

        for (let i = 0; i < 15; i++) {
            createLeaf();
        }
    </script>
</aside>