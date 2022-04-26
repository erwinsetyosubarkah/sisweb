<div class="col-lg-4">
            <div class="card">
                <img class="card-img-top" style="padding: 5%;" src="<?= base_url("assets/"); ?>img/foto/<?= $pengaturan['foto_kepsek']; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Sambutan Kepala Sekolah</h5>
                    <p class="card-text"><?= mb_strimwidth($pengaturan['sambutan_kepala_sekolah'], 0, 400, "...<a href='".base_url()."sambutan_kepala_sekolah/index'> Selengkapnya>></a>"); ?></p>
                </div>
            </div>
           
        </div>