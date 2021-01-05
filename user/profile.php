<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile Member
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Profile</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
    <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "update"){
          echo "<div class='alert alert-success text-center'>Profil telah diupdate.</div>";
        }
      }
      ?>
      <section class="col-lg-6">
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Data Profile</h3>
      
        </div>
        <div class="box-body">
        <form action="profile_act.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
              <?php
              $id=$_SESSION['id'];
              $dataMember=mysqli_query($koneksi,"select * from tbl_member where id_member='$id' ");
               while($da = mysqli_fetch_array($dataMember)){
              ?>                 
            <div class="form-group">
                <input type="text" name="id_member" value="<?php echo $id?>" hidden>
                <label for="inputEmail3" class=" control-label">Nomer handphone</label>
                <input type="text" class="form-control" required="required" name="jk" value="<?php echo $da['hp_member']?>" readonly>  
                <label for="inputEmail3" class=" control-label">Nama</label>
                <input type="text" class="form-control" required="required" name="nama" value="<?php echo $da['nama_member']?>">  
                <label for="inputEmail3" class=" control-label">Alamat</label>
                <input type="text" class="form-control" required="required" name="alamat" value="<?php echo $da['alamat_member']?>"> 
                <label for="inputEmail3" class=" control-label">Jenis Kelamin</label>
                <input type="text" class="form-control" required="required" name="jk" value="<?php echo $da['jk_member']?>"> 
                <label for="inputEmail3" class=" control-label">Email</label>
                <input type="email" class="form-control" required="required" name="email" value="<?php echo $da['email']?>"> 
                <label for="inputEmail3" class=" control-label">Tanggal Ultah</label>
                <input type="date" class="form-control" required="required" name="ultah" value="<?php echo $da['tanggal_ultah']?>">    
                <label for="inputEmail3" class=" control-label">Foto Profil</label>
                <input type="file" class="form-control" name="foto" value="<?php echo $da['foto_member']?>">             
            </div>
            <?php }?>      
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" name="admin" class="btn btn-info pull-right" value="SIMPAN">
          </div>
          </form>
          <!-- /.box-footer -->  
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
<div class="modal fade" id="fitnes_profile" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ganti Profile Fitness</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      
      <form action="profile_act.php" method="post">
      <?php 
        include '../koneksi.php';

        $data1 = mysqli_query($koneksi,"SELECT * FROM tbl_pengaturan");
        while($d1= mysqli_fetch_array($data1)){
        ?>
      <div class="modal-body">
          <div class="box-body">
          <div class="form-group">
              <label for="inputEmail3" class="control-label">Nama Fitness</label>
              <input type="text" name="id_fitnes" value="<?php echo $d1['id_pengaturan']?>" hidden>
              
                <input type="text" class="form-control" required="required" name="nama_fitnes" value="<?php echo $d1['nama_gym']; ?>">
             
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="control-label">Alamat Fitness</label>
             
                <input type="text" class="form-control" required="required" name="alamat_fitnes" value="<?php echo $d1['alamat_gym']; ?>">
            
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="control-label">Ketua Fitness</label>
             
                <input type="text" class="form-control" required="required" name="ketua_fitnes" value="<?php echo $d1['ketua_gym']; ?>">
             
            </div>    
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <input type="submit" name="fitnes" class="btn btn-info pull-right" value="SIMPAN">
      </div>
        <?php }?>
      </form>
    </div>
  </div>
</div>
<!--end perpanjang modal -->

<?php include 'footer.php'; ?>


