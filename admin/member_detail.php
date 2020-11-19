<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-list" aria-hidden="true"></i>&nbsp;Member
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Member</li>
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
          <h3 class="box-title">Detail Member</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" >
        <?php
             $id = $_GET['id'];
             $data = mysqli_query($koneksi,"SELECT * FROM tbl_member WHERE id_member='$id'");
             while ($d = mysqli_fetch_array($data)) {
        ?>
          <div class="box-body">
                               
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" disabled class="form-control" required="required" value="<?php echo $d['nama_member'];?>" name="nama_member">
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-10">
                <input type="text" disabled class="form-control" required="required" value="<?php echo $d['alamat_member'];?>" name="alamat_member">
              </div>
            </div>

            
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-10">
                <select name="jk_member" class="form-control" required="required" disabled>
                  <option value="">--Pilih--</option>
                  <option value="pria" <?php if($d['jk_member'] == "pria"){echo "selected";}?>>Pria</option>
                  <option value="wanita" <?php if($d['jk_member'] == "wanita"){echo "selected";}?>>Wanita</option>

                </select>
              </div>
            </div>   

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Nomer Hp</label>
              <div class="col-sm-10">
                <input type="number" disabled class="form-control" name="nohp_member" value="<?php echo $d['hp_member'];?>">
              </div>
            </div>  
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Paket saat ini</label>
              <div class="col-sm-10">
              <?php 
              $paket_member=$d['paket_member'];
              $paket_harga = mysqli_query($koneksi, "select * from tbl_harga where id_harga='$paket_member'");
              $ph = mysqli_fetch_array($paket_harga);
              ?>
                <input type="text" disabled class="form-control" name="paket_member" value="<?php echo $ph['kategori_harga'];?> @Rp.<?php echo number_format($ph['nilai_harga']);?>">
              </div>
            </div> 

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Berlaku Sampai</label>
              <div class="col-sm-10">
                <input type="text" disabled class="form-control" name="berlaku_member" value="<?php $showtime=date("d F Y",strtotime($d['berlaku_member'])); echo $showtime;?>">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Status Member</label>
              <div class="col-sm-10">
               
                <?php
                       $hari_ini=new DateTime();
                       $akhir_tgl=new DateTime($d['berlaku_member']);
                       $telat=$akhir_tgl->diff($hari_ini); 
                ?>
                   <?php
                        if($akhir_tgl <= $hari_ini){
                          echo "<span class='label label-danger'>Telah Habis Masa Langganan</span>";
                        }else if($akhir_tgl >= $hari_ini){
                          echo "<span class='label label-success'>Berlangganan</span>";
                        }
                        ?> 
           
              </div>
            </div>
                  
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <!-- <a href="" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Ubah Data</a> -->
            <a href="#modelId" data-toggle="modal"  class="btn btn-danger pull-right">Perpanjang Member&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
        <h4 class="modal-title">Pepanjang Paket Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form class="form-horizontal" action="perpanjang_paket.php" method="post">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
                  <input type="text" name="id_member_panjang" value="<?php echo $id; ?>" hidden>
                <label for="inputEmail3" class="control-label">Paket</label>
                  <select name="paket_member_panjang" class="form-control"  required="required">
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


