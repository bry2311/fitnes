<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Produk
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Produk</li>
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
          <h3 class="box-title">Detail produk</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="product_update_act.php" method="POST">
        <?php
             $id = $_GET['id'];
             $data = mysqli_query($koneksi,"SELECT * FROM tbl_produk WHERE id_produk='$id'");
             while ($d = mysqli_fetch_array($data)) {
        ?>
          <input type="hidden" name="id" value="<?= $id;?>">
          <div class="box-body">                  
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Kode</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" value="<?php echo $d['kode_produk'];?>" name="kode_produk">
              </div>
            </div>  
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" value="<?php echo $d['nama_produk'];?>" name="nama_produk">
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Harga</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" value="<?php echo $d['harga_produk'];?>" name="harga_produk">
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
              <div class="col-sm-10">
                <select name="kategori" class="form-control" required="required">
                  <option value="online" <?= $d['kategori'] == "online" ? "selected" : "";?> >online</option>
                  <option value="offline" <?= $d['kategori'] == "offline" ? "selected" : "";?> >offline</option>
                </select>
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



<?php include 'footer.php'; ?>


