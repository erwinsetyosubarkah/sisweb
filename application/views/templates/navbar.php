<nav class="navbar navbar-expand-lg navbar-dark bg-primary pt-4 pb-4 align-middle sticky-top">
    <div class="container">
        <img src="<?= base_url("assets/"); ?>img/icon/<?= $pengaturan['logo']; ?>" class="nav-brand">
        <a class="navbar-brand" href="#"><?= $pengaturan['nama_sekolah']; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>beranda/index">Beranda <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>profil/index">Profil</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>sejarah/index">Sejarah</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>visi_misi/index">Visi dan Misi</a>
                </li>                
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url(); ?>struktur/index">Struktur</a>
                </li>                
                
                <li class="nav-item active">
                    <a class="nav-link btn btn-success" href="<?= base_url(); ?>beranda-admin">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>