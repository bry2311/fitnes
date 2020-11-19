<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
  <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Password admin
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Ubah Password</li>
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
          <h3 class="box-title">Data Admin</h3>
      
        </div>
        <div class="box-body">
        <form action="ganti_pass_act.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
              <?php
              $id=$aa['id_admin'];
              $data_admin=mysqli_query($koneksi,"select *from admin where id_admin='$id' ");
               while($da = mysqli_fetch_array($data_admin)){
              ?>                 
            <div class="form-group">
              <label for="inputEmail3" class="control-label">Password baru</label>
                <input type="text" name="id_admin" value="<?php echo $id?>" hidden>
                <input type="password" class="form-control" required="required" name="pass_admin" placeholder="input disini">
              
            </div>

          
            
          
                <?php }?>      
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="SIMPAN">
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



<?php include 'footer.php'; ?>


