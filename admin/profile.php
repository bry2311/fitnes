<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Profile Admin
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
              $id=$aa['id_admin'];
              $data_admin=mysqli_query($koneksi,"select *from admin where id_admin='$id' ");
               while($da = mysqli_fetch_array($data_admin)){
              ?>                 
            <div class="form-group">
              <label for="inputEmail3" class=" control-label">Nama admin</label>
                <input type="text" name="id_admin" value="<?php echo $id?>" hidden>
                <input type="text" class="form-control" required="required" name="nama_admin" value="<?php echo $da['nama_admin']?>">
              
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

    <section class="col-lg-6 col-md-6 col-12">
    <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Profile Fitness</h3>
      
        </div>
        <div class="box-body">
        
          <div class="box-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                                      
                    <th>Nama Fitness</th>
                    <th>Ketua Fitness</th>                    
                    <th>Alamat Fitness</th>                                        
                    <th width="20%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tbl_pengaturan");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                  
                      <td><?php echo $d['nama_gym']; ?></td>                      
                      <td><?php echo $d['ketua_gym']; ?></td>
                      <td><?php echo $d['alamat_gym']; ?></td>
                   
                      <td>
                      <a title="ubah" class="btn btn-success btn-sm" href="#fitnes_profile" data-toggle="modal"><i class="fa fa-pencil" aria-hidden="true"></i></a>              

                      </td>                                          
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>   
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
           
          </div>
     
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


