<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Instruktur
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Instruktur</li>
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
          <h3 class="box-title">Detail Instruktur</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="instruktur_update_act.php" method="post" enctype="multipart/form-data">
        <?php
             $id = $_GET['id'];
             $data = mysqli_query($koneksi,"SELECT * FROM tbl_instruktur WHERE id ='$id'");
             while ($d = mysqli_fetch_array($data)) {
        ?>
          <div class="box-body">                   
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input name="name" type="text" class="form-control" required="required" value="<?php echo $d['name'];?>" name="nama_instruktur">
              </div>
            </div>      
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Foto</label>
              <div class="col-sm-10">
                <input type="file" class="form-control" name="foto" value="<?php echo $da['photo']?>"> 
              </div>
            </div>             
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="hidden" class="btn btn-primary" value="<?php echo $id;?>" name="id">

            <input type="submit" class="btn btn-primary" value="Ubah Data">
            <!-- <a href="#modelId" data-toggle="modal"  class="btn btn-danger pull-right">Perpanjang Instruktur&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a> -->
          </div>
          <!-- /.box-footer -->  
                <?php }?> 
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


