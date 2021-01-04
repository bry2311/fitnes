<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Jadwal Baru
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Jadwal baru</li>
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
          <h3 class="box-title">Input Jadwal Baru</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="jadwal_add_act.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
                               
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <?php
                $no=1;
                $data = mysqli_query($koneksi,"SELECT * FROM tbl_instruktur");
                ?>
                <select name="nama_instruktur" class="form-control">
                  <?php 
                    while($d = mysqli_fetch_array($data)){
                  ?>
                    <option value="<?php echo $d['id']?>"><?php echo $d['name']?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Hari</label>
              <div class="col-sm-10">
                <select name="nama_hari" class="form-control">
                  <option value="Minggu">Minggu</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jam Mulai</label>
              <div class="col-sm-10">
                <input type="time" class="form-control" required="required" name="jam_mulai">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jam Selesai</label>
              <div class="col-sm-10">
                <input type="time" class="form-control" required="required" name="jam_selesai">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="SIMPAN">
          </div>
          <!-- /.box-footer -->  
     </div>
     <br/>
   </div>
 </section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>


