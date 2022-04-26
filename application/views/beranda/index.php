<!-- Awal Carousel -->
<section class="carousel-section">
    <div class="row">
        <div class="col-lg-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <?php $index = 0; ?>
            <?php foreach($slider as $sld): ?>
                
                <?php if($index == 0){ ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>" class="active"></li>
                <?php }else{ ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index; ?>"></li>
                <?php } ?>
                <?php $index++; ?>
            <?php endforeach; ?>
            </ol>
            <div class="carousel-inner">
                <?php $index = 0; ?>
                <?php foreach($slider as $sld): ?>
                    <?php if($index == 0){ ?>
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="<?= base_url("assets/"); ?>img/gambar/images/<?= $sld['slider']; ?>" alt="First slide">
                            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(23,23,23,0.9);border-radius:7px;">
                                <h5><?= $sld['judul_slider']; ?></h5>
                            </div>
                        </div> 
                        <?php }else{ ?>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="<?= base_url("assets/"); ?>img/gambar/images/<?= $sld['slider']; ?>" alt="First slide">
                            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(23,23,23,0.9);border-radius:7px;">
                                <h5><?= $sld['judul_slider']; ?></h5>
                            </div>
                        </div> 
                        <?php } ?>
                <?php $index++; ?>
                <?php endforeach; ?>              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            
        </div>
    </div>
</section>
<!-- Akhir Carousel -->

<!-- Content -->
<section class="content-section">    
    <div class="row">
        <div class="col-lg-8">
            <div class="sub-judul">
                <h4>Berita Terbaru</h4>
            </div>
            <?php foreach($artikel as $art): ?>
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-lg-3 text-center">
                        <?php if($art['gambar_sampul'] != ''): ?>
                            <img src="<?= base_url("assets/"); ?>img/gambar/images/<?= $art['gambar_sampul'] ?>" alt="" class="card-img-top img-left">
                        <?php else: ?>
                            <img src="<?= base_url("assets/"); ?>img/gambar/images/noimage.png" alt="" class="card-img-top img-left">
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-9">
                        <div class="card-body">
                            <h5 class="card-title"><?= $art['judul_artikel'] ?></h5>
                            <p class="card-text"><?= mb_strimwidth($art['isi_artikel'], 0, 300, "...<a href='".base_url()."artikel/index/".$art['id_artikel']."'> Selengkapnya >></a>"); ?></p>
                            <p class="card-text"><small class="text-muted">Diupload : <?= $art['tgl_upload'] ?></small> </p>
                        </div>
                    </div>
                </div>
            </div> 
            <?php endforeach; ?>
            <div class="sub-judul">
                <h4>Foto Terbaru</h4>
            </div>
            <div class="row">
                <?php foreach($foto as $ft): ?>
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="<?= base_url("assets/"); ?>img/gambar/images/<?= $ft['foto']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $ft['judul_foto'] ?></h5>
                        </div>                
                    </div>
                </div>   
                <?php endforeach; ?>              
            </div> 
            <div class="sub-judul">
                <h4>Video Terbaru</h4>
            </div>
            <div class="row">
            <?php foreach($vidio as $vd): ?>
            <?php 
                    if(substr_count($vd['url_vidio'],'=') > 0){
                        $id_vidio_youtube_arr = explode('=',$vd['url_vidio']);
                        $id_vidio_youtube_arr1 = $id_vidio_youtube_arr[1];
                        $id_vidio_youtube_arr2 = explode('&',$id_vidio_youtube_arr1);
                        $id_vidio_youtube = $id_vidio_youtube_arr2[0];
                    }else{
                        $id_vidio_youtube='';
                    }
                ?>
                <div class="col-lg-6 yt-video">
                    <iframe src="https://www.youtube.com/embed/<?= $id_vidio_youtube; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>   
                </div> 
            <?php endforeach; ?>
            </div>           
        </div>
        <?php include "halaman_sambutan.php"; ?>
    </div>
</section>
<!-- akhir content -->

    