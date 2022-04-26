

<!-- Content -->
<section class="content-section">    
    <div class="row">
        <div class="col-lg-8">
            <div class="sub-judul">
                <h4>Berita Terbaru</h4>
            </div>           
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-lg-12">
                        <?php if($artikel['gambar_sampul'] != ''): ?>
                            <img src="<?= base_url("assets/"); ?>img/gambar/images/<?= $artikel['gambar_sampul'] ?>" alt="" class="card-img-top img-left">
                        <?php else: ?>
                            <img src="<?= base_url("assets/"); ?>img/gambar/images/noimage.png" alt="" class="card-img-top img-left">
                        <?php endif; ?>
                    
                        <div class="card-body">
                            <h5 class="card-title"><?= $artikel['judul_artikel'] ?></h5>
                            <p class="card-text"><small class="text-muted">Diupload : <?= $artikel['tgl_upload'] ?></small> </p>
                            <p class="card-text"><?= $artikel['isi_artikel']; ?></p>
                        </div>
                    </div>
                </div>
            </div> 
            

                    
                   
        </div>
        <?php include "halaman_sambutan.php"; ?>
    </div>
</section>
<!-- akhir content -->

    