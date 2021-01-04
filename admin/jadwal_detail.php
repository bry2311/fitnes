<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Jadwal
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Jadwal</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "update"){
          echo "<div class='alert alert-success text-center'>Profil telah diupdate.</div>";
        }
      }
      ?>
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Detail Jadwal</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="jadwal_update_act.php" method="post">
        <?php
          $id = $_GET['id'];
          $data = mysqli_query($koneksi,"SELECT i.id AS idInstruktur ,i.name AS nameInstruktur, j.* FROM tbl_jadwal j JOIN tbl_instruktur i ON i.id = j.id_instruktur WHERE j.id ='$id'");
          while ($d = mysqli_fetch_array($data)) {
        ?>
        <div class="box-body">         
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <?php
              $no=1;
              $dataa = mysqli_query($koneksi,"SELECT * FROM tbl_instruktur");
              ?>
              <select name="nama_instruktur" class="form-control">
                <?php 
                  while($di = mysqli_fetch_array($dataa)){
                ?>
                  <option value="<?php echo $di['id']?>" <?php if($d['idInstruktur']==$di['id']){ echo 'selected';}?>><?php echo $di['name']?></option>
                <?php }?> 
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Hari</label>
            <div class="col-sm-10">
              <select name="nama_hari" class="form-control">
                <option value="Minggu" <?php if($d['hari']=='Minggu'){echo 'selected';}?>>Minggu</option>
                <option value="Senin" <?php if($d['hari']=='Senin'){echo 'selected';}?>>Senin</option>
                <option value="Selasa" <?php if($d['hari']=='Selasa'){echo 'selected';}?>>Selasa</option>
                <option value="Rabu" <?php if($d['hari']=='Rabu'){echo 'selected';}?>>Rabu</option>
                <option value="Kamis" <?php if($d['hari']=='Kamis'){echo 'selected';}?>>Kamis</option>
                <option value="Jumat" <?php if($d['hari']=='Jumat'){echo 'selected';}?>>Jumat</option>
                <option value="Sabtu" <?php if($d['hari']=='Sabtu'){echo 'selected';}?>>Sabtu</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jam Mulai</label>
            <div class="col-sm-10">
              <input type="time" value="<?php echo $d['jam_mulai']?>" class="form-control" required="required" name="jam_mulai">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jam Selesai</label>
            <div class="col-sm-10">
              <input type="time" class="form-control" value="<?php echo $d['jam_selesai']?>"  required="required" name="jam_selesai">
            </div>
          </div>
          <?php }?>
        </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <input type="hidden" class="btn btn-primary" value="<?php echo $id;?>" name="id">

              <input type="submit" class="btn btn-primary" value="Ubah Data">
              <!-- <a href="#modelId" data-toggle="modal"  class="btn btn-danger pull-right">Perpanjang Instruktur&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a> -->
            </div>
            <!-- /.box-footer --> 
        </form>  
      </div>
     <br/>
   </div>
 </section>
</div>
</section>
</div>


<!-- start perpanjang modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perpanjang Paket Instruktur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form class="form-horizontal" action="perpanjang_paket.php" method="post">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
                  <input type="text" name="id_instruktur_panjang" value="<?php echo $id; ?>" hidden>
                <label for="inputEmail3" class="control-label">Paket</label>
                        <?php
                          $id = $_SESSION['id'];
                        ?>
                        <input type="hidden" name="id_instruktur" value="<?= $id ;?>">
                  <select name="paket_instruktur_panjang" class="form-control"  required="required">
                  <option value="">--Pilih Paket--</option>
                  <?php
                    $paket_harga = mysqli_query($koneksi, "select * from tbl_harga");
                    while($ph = mysqli_fetch_array($paket_harga)){
                      ?>
                      <option value="<?php echo $ph['id_harga'] ?>"><?php echo $ph['kategori_harga']; ?> @Rp.<?php echo number_format($ph['nilai_harga'])?></option>
                      <?php
                    }
                   ?>
                 </select>
            </div>  
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--end perpanjang modal -->


<?php include 'footer.php'; ?>


