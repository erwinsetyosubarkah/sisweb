<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Rapor</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?= base_url("assets/"); ?>bootstrap/css/bootstrap.min.css">
        
</head>
<body>
<div class="container-fluid pt-2">
           
            <table class="table table-borderless">
                <tr class="text-center">
                <th>
                    <img src="<?= base_url("assets/"); ?>img/icon/<?= $pengaturan['logo']; ?>" width="100">
                </th>
                    <th>
                            <h5 class="mt-0 mb-0">PEMERINTAH KOTA BEKASI</h5>
                            <h5 class="mt-0 mb-0">DINAS PENDIDIKAN</h5>
                        <h2 class="mt-0 mb-0"><?= $pengaturan['nama_sekolah']; ?></h2>
                        
                        <small>
                            <?= $pengaturan['jalan']; ?> RT. <?= $pengaturan['nama_sekolah']; ?> RW. <?= $pengaturan['nama_sekolah']; ?> Kel. <?= $pengaturan['kelurahan']; ?> Kec. <?= $pengaturan['kecamatan']; ?>
                            <br><?= $pengaturan['kabupaten_kota']; ?>
                        </small>
                    </th>                  
                    
                </tr>
            </table>
            <hr class="mb-4">
            <h4 class="text-center mb-3">RAPOR AKHIR <?= strtoupper($semester['semester']); ?> TAHUN PELAJARAN <?= strtoupper($tahun_pelajaran['tahun_pelajaran']); ?></h4>
            <table>
                <tr>
                    <td>Nama Sekolah</td>
                    <td>: <?= $pengaturan['nama_sekolah']; ?></td>
                    <td width="400"></td>
                    <td>Kelas</td>
                    <td>: <?= $kelas['kelas']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= $pengaturan['jalan']; ?> RT.<?= $pengaturan['rt']; ?> RW. <?= $pengaturan['rw']; ?></td>
                    <td></td>
                    <td>Semester</td>
                    <td>: <?= $semester['semester']; ?></td>
                </tr>
                <tr>
                    <td>Nama Siswa</td>
                    <td>: <?= $siswa['nama_siswa']; ?></td>
                    <td></td>
                    <td>Tahun Pelajaran</td>
                    <td>: <?= $tahun_pelajaran['tahun_pelajaran']; ?></td>
                </tr>
                <tr>
                    <td>No Induk/NISN</td>
                    <td>: <?= $siswa['nis_siswa'].'/'.$siswa['nisn_siswa']; ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        
            
        
    </div>

        <table class="table table-sm table-bordered mt-2">
            <tr class="align-middle text-center">
                <th rowspan="2" colspan="2" class="align-middle">Mata Pelajaran</th>
                
                <th rowspan="2" class="align-middle">KKM</th>
                <th colspan="2">Pengetahuan</th>
                
                <th colspan="2">Keterampilan</th>
                
            </tr>
            <tr class="align-middle text-center">
                
                <th>Nilai</th>
                <th>Predikat</th>
                <th>Nilai</th>
                <th>Predikat</th>
            </tr>
            <?php $no = 1; ?>
            <?php foreach($nilai_siswa as $ns): ?>
            <tr>
                <td class="text-center"><?= $no; ?></td>
                <td><?= $ns['mata_pelajaran']; ?></td>
                <td class="text-center"><?= $ns['kkm_mata_pelajaran']; ?></td>
                <td class="text-center"><?= $ns['pengetahuan_nilai']; ?></td>
                <td class="text-center"><?= $ns['predikat_pengetahuan']; ?></td>
                <td class="text-center"><?= $ns['keterampilan_nilai']; ?></td>
                <td class="text-center"><?= $ns['predikat_keterampilan']; ?></td>
            </tr>
            <?php $no++; ?>
            <?php endforeach; ?>

        </table>

        <table>
            <tr>
                <td width="300px">
                    <table class="table table-bordered table-sm">
                        <tr class="text-center">
                            <th>Extrakurikuler</th>
                            <th>Nilai</th>
                        </tr>
                        <tr  class="text-center">
                            <td><?= $nilai_exkul['nama_extrakurikuler']; ?></td>
                            <td><?= $nilai_exkul['nilai_extrakurikuler']; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="600px" class="pl-4 pr-4">
                     <table class="table table-bordered table-sm">
                        <tr class="text-center">
                            <th colspan="4">Predikat</th>
                            
                        </tr>
                        <tr class="text-center">
                            <?php foreach($predikat as $pr): ?>
                            <th><?= $pr['predikat_rentang_nilai'].' = '.$pr['keterangan_rentang_nilai']; ?></th>                            
                            <?php endforeach; ?>
                        </tr>
                        <tr class="text-center">                            
                            <?php foreach($predikat as $pr): ?>
                            <th><?= $pr['dari_rentang_nilai'].' - '.$pr['sampai_rentang_nilai']; ?></th>                            
                            <?php endforeach; ?>
                        </tr>
                     </table>               
                </td>
                <td width="400px"></td>
            </tr>
        </table>

        <table class="table table-borderless">
            <tr class="text-center">
                <td> <br>Orang Tua/Wali</td>
                <td>Mengetahui<br>Kepala <?= $pengaturan['nama_sekolah']; ?> <?= $pengaturan['kabupaten_kota']; ?></td>
                <td>Bekasi, <?= $tanggal; ?><br>Wali Kelas</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>         
            <tr class="text-center">
                <td>..........................................</td>
                <th><?= $pengaturan['nama_kepsek']; ?><br>-</th>
                <th><?= $wali_kelas['nama_guru']; ?><br>NIP. <?= $wali_kelas['nik_guru']; ?></th>
            </tr>
        </table>

    </div>


        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url("assets/"); ?>bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?= base_url("assets/"); ?>bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url("assets/"); ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<script>
    window.print();
</script>