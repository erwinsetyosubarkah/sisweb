    </div>
    <!-- Akhir container utama -->

    <!-- footer -->
    <section class="section-footer">
        <div class="container footer-info">
            <div class="row">
                <div class="col-lg-4 col-footer">
                    <h5 class="sub-judul-footer">Hubungi Kami</h5>
                    <hr>
                    <p><?= $pengaturan['nama_sekolah']; ?> ⋅ <?= $pengaturan['motto']; ?></p>
                    <div class="row">                        
                        <div class="col-lg-3 caption-footer"><span><i class="fa fa-street-view" aria-hidden="true"></i> Alamat.</span></div>
                        <div class="col-lg-9"><p><?= $pengaturan['jalan']; ?> RT.<?= $pengaturan['rt']; ?> RW.<?= $pengaturan['rw']; ?> Kel. <?= $pengaturan['kelurahan']; ?> Kec. <?= $pengaturan['kecamatan']; ?> <?= $pengaturan['kabupaten_kota']; ?> - <?= $pengaturan['provinsi']; ?> <?= $pengaturan['kode_pos']; ?><p></div>
                    </div>
                    <div class="row">                        
                        <div class="col-lg-3 caption-footer"><span><i class="fa fa-phone" aria-hidden="true"></i> Telp.</span></div>
                        <div class="col-lg-9"><?= $pengaturan['telp']; ?></div>
                    </div>
                    <div class="row">                        
                        <div class="col-lg-3 caption-footer"><span><i class="fa fa-envelope" aria-hidden="true"></i> Email</span></div>
                        <div class="col-lg-9"><?= $pengaturan['email']; ?></div>
                    </div>
                </div>
                <div class="col-lg-4 col-footer">
                    <h5 class="sub-judul-footer">Tag</h5>
                    <hr>
                    <?php foreach($kategori_artikel as $ktart): ?>
                    <span class="tags-footer"><a href="<?= base_url(); ?>beranda/index/<?= $ktart['id_kategori_artikel']; ?>" class="link-tags"><?php echo $ktart['kategori']; ?></a></span> 
                    <?php endforeach; ?>                   
                </div>
                <div class="col-lg-4 col-footer">
                    <h5 class="sub-judul-footer">Ikuti Kami</h5>
                    <hr>
                    <a href="<?= $pengaturan['youtube']; ?>" class="link-footer-sosmed"><span class="footer-sosmed merah"><i class="fa fa-youtube" aria-hidden="true"></i></span></a>
                    <a href="<?= $pengaturan['instagram']; ?>" class="link-footer-sosmed"><span class="footer-sosmed kuning"><i class="fa fa-instagram" aria-hidden="true"></i></span></a>
                    <a href="<?= $pengaturan['twitter']; ?>" class="link-footer-sosmed"><span class="footer-sosmed biru-muda"><i class="fa fa-twitter" aria-hidden="true"></i></span></a>
                    <a href="<?= $pengaturan['facebook']; ?>" class="link-footer-sosmed"><span class="footer-sosmed biru"><i class="fa fa-facebook" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="footer-copyright text-center text-white">
            <span>Copyright &copy; 2020 </span><span style="color: red;">&hearts;</span><span> Iswatun Hasanah</span>
        </div>
    </section>
    <!-- Akhir Footer -->

    
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url("assets/"); ?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?= base_url("assets/"); ?>bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url("assets/"); ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>