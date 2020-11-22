<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Member Baru
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Member baru</li>
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
          <h3 class="box-title">Input member baru</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="member_add_act.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
                               
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" name="nama_member" placeholder="isi sesuai ktp">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" name="alamat_member" placeholder="isi sesuai ktp">
              </div>
            </div>

            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select name="jk_member" class="form-control"  required="required">
                  <option value="">--Pilih--</option>
                  <option value="pria">Pria</option>
                  <option value="wanita">Wanita</option>

                </select>
              </div>
            </div>   

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nomer Hp</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="nohp_member" >
              </div>
            </div>  
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="johnDoe@gmail.com">
              </div>
            </div>  
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_lahir" >
              </div>
            </div>  

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Paket Member</label>
              <div class="col-sm-10">
                <select name="paket_member" class="form-control"  required="required">
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


