<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?=isActive('dashboard')?>">
            <a class="nav-link" href="#" onclick="window.location = '<?=routes('dashboard')?>'">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <hr>
        </li>
        <li class="nav-item <?=isActive('form')?>">
            <a class="nav-link" href="#" onclick="window.location = '<?=routes('form')?>'">
                <span class="menu-title">Data Form</span>
                <i class="mdi mdi-clipboard-check menu-icon"></i>
            </a>
        </li>
        <li class="nav-item <?=isActive('pasien')?>">
            <a class="nav-link" href="#" onclick="window.location = '<?=routes('pasien')?>'">
                <span class="menu-title">Data Pasien</span>
                <i class="mdi mdi-clipboard-account menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <hr>
        </li>
        <li class="nav-item <?=isActive('pegawai')?>">
            <a class="nav-link" href="#" onclick="window.location = '<?=routes('pegawai')?>'">
                <span class="menu-title">Data Pegawai</span>
                <i class="mdi mdi-account-card-details menu-icon"></i>
            </a>
        </li>
        <li class="nav-item <?=isActive('term')?>">
            <a class="nav-link" href="#" onclick="window.location = '<?=routes('term')?>'">
                <span class="menu-title">Data General Term</span>
                <i class="mdi mdi-clipboard-text menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>