<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Paket
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Paket</li>
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
          <h3 class="box-title">Detail paket</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="paket_update_act.php" method="POST">
        <?php
             $id = $_GET['id'];
             $data = mysqli_query($koneksi,"SELECT * FROM tbl_harga WHERE id_harga='$id'");
             while ($d = mysqli_fetch_array($data)) {
        ?>
          <input type="hidden" name="id" value="<?= $id;?>">
          <div class="box-body">                    
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" value="<?php echo $d['kategori_harga'];?>" name="nama_harga">
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" value="<?php echo $d['nilai_harga'];?>" name="nilai_harga">
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Hari</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" value="<?php echo $d['hari_harga'];?>" name="hari_harga">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <!-- <a href="" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Ubah Data</a> -->
            <input type="submit" class="btn btn-danger pull-right" value="Update">
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

<!--end perpanjang modal -->


<?php include 'footer.php'; ?>


