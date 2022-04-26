

<!-- Content -->
<section class="content-section">    
    <div class="row">
        <div class="col-lg-12">
            <div class="sub-judul">
                <h4>Sambutan Kepala Sekolah</h4>
            </div>           
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 pt-2">
                                <?php if($pengaturan['foto_kepsek'] != ''): ?>
                                    <img src="<?= base_url("assets/"); ?>img/foto/<?= $pengaturan['foto_kepsek'] ?>" alt="" class="card-img-top img-left">
                                <?php else: ?>
                                    <img src="<?= base_url("assets/"); ?>img/foto/noimage.png" alt="" class="card-img-top img-left">
                                <?php endif; ?>
                            </div>
                        </div>
                    
                        <div class="card-body">                            
                            <p class="card-text"><?= $pengaturan['sambutan_kepala_sekolah']; ?></p>
                        </div>
                    </div>
                </div>
            </div> 
            

                    
                   
        </div>
    </div>
</section>
<!-- akhir content -->

    