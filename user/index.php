<?php include 'header.php'; ?>
<div class="content-wrapper" ng-app="">
  <section class="content-header">
    <h1>
      Dashboard
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
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
          <?php 
            include '../koneksi.php';
            $tmpId = $_SESSION['id'];
            $tmpMember = mysqli_query($koneksi,"SELECT * FROM tbl_member WHERE id_member = $tmpId limit 1");
            $member=mysqli_fetch_array($tmpMember);
            $berlaku = $member['berlaku_member'];
            $ultah = $member['tanggal_ultah'];
            $bulanBerlaku = date("m",strtotime($berlaku));
            $bulanUltah = date("m",strtotime($ultah));
            if($bulanBerlaku == $bulanUltah){
              ?>
        <div class="box box-info">
          <div class="box-header">
            <p>Selamat berulang tahun! Anda mendapatkan kesempatan diskon 15% pada bulan ini sebagai hadiah dari kami :). Silahkan hubungi admin untuk proses lebih lanjut ya :)</p>
          </div>
        </div>
            <?php }; ?>
        <div class="box box-info">
          <?php 
            include '../koneksi.php';
              $tmpId = $_SESSION['id'];
              $tmpMember = mysqli_query($koneksi,"SELECT * FROM tbl_member WHERE id_member = $tmpId limit 1");
              $member=mysqli_fetch_array($tmpMember);
          ?>
          <div class="box-header">
            <p>Status Member <?= $member['status_member'];?></p>
            <p>Berlaku Sejak = <?= $member['tgl_member'];?></p>
            <p>Berlaku Sampai = <?= $member['berlaku_member'];?></p>
            <div class="box-footer">
            <!-- <a href="" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Ubah Data</a> -->
            <a href="#modelId" data-toggle="modal"  class="btn btn-danger pull-right">Perpanjang Member&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
          </div>
          </div>
        </div>
        <div class="box box-info">
          <div class="box-header">
          Transaksi User
          </div>
          <div class="box-body">
            <div class="text-center main-lbl-beli">
              <span>Total Transaksi</span>
              <label class="lbl-beli">
              
              <?php 
                include '../koneksi.php';
                 $data3 = mysqli_query($koneksi,"SELECT * FROM tbl_order");
                 $cx=mysqli_fetch_array($data3);
                $tmpId = $_SESSION['id'];
                 $hsx=mysqli_query($koneksi,"SELECT SUM(harga_order) FROM tbl_order WHERE id_customer = $tmpId AND status = 'keranjang'");
                 $jumlah = mysqli_fetch_row($hsx);
                 $total = $jumlah[0];

                 if(isset($cx['harga_order'])){
                   echo "Rp.".number_format($total);
                 }else{
                   echo "Rp.0";
                 }
              ?>
              
              </label>
            </div>  

             <form action="keranjang_bayar_act.php" method="post">
            <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="table-datatable-jlh">
                      <thead>
                        <tr>
                          <th width="1%">No</th>                    
                          <th>Nama Order</th>
                          <th>Harga</th> 
                          <th width="10%">Opsi</th>                                        
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                         include '../koneksi.php';
                         $no=1;
                      $tmpId = $_SESSION['id'];
                        
                         $data2 = mysqli_query($koneksi,"SELECT * FROM tbl_order WHERE status != 'order' AND id_customer = $tmpId");
                          while($d2 = mysqli_fetch_array($data2)){
                          ?>
                          <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d2['nama_order']; ?></td>                      
                            <td>Rp.<?php echo number_format($d2['harga_order']); ?></td>
                        
                            <td>
                              <a title="Keranjang" class="btn btn-danger btn-sm" href="keranjang_delete.php?id=<?php echo $d2['id_order'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>              
                            </td>                                          
                          </tr>
                          <?php 
                        }
                        ?>
                      </tbody>
                    </table>
            </div>
          
                    <textarea type="text" name="dibeli" hidden>
                    <?php 
                      $tmpId = $_SESSION['id'];

                      $datax = mysqli_query($koneksi,"SELECT * FROM tbl_order WHERE status != 'order' AND id_customer = $tmpId");
                      while($dxs = mysqli_fetch_array($datax)){
                      echo $dxs['nama_order']."&nbsp;||&nbsp;"; 
                        }
                    ?>
                    </textarea>
                    <input type="text" name="total_beli" value="<?php echo $total;?>" hidden>

          <?php if($cx > 0){?>
            <div class="text-center">
                <button type="submit" class="btn btn-success"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; Lanjut Bayar</button>
            </div>
          <?php }else{?>
          <?php }?>

              </form>
          </div>
      <br/>
          </div>
<!-- end pakeetan harga -->

  <section class="col-lg-6 col-md-6 col-sm-12 col-12">
        <?php 
        if(isset($_GET['alert'])){
          if($_GET['alert'] == "update"){
            echo "<div class='alert alert-success text-center'>Profil telah diupdate.</div>";
          }
        }
        ?>
        <div class="box box-info">
          <div class="box-header">
          Produk yang dijual
          </div>
          <div class="box-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable-1">
                <thead>
                  <tr>
                    <th width="1%">No</th>
                    <th>Kode</th>                    
                    <th>Nama</th>
                    <th>Harga</th>                    
                                  
                    <th width="10%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data1 = mysqli_query($koneksi,"SELECT * FROM tbl_produk WHERE kategori = 'online'");
                  while($d1 = mysqli_fetch_array($data1)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d1['kode_produk']; ?></td>
                      <td><?php echo $d1['nama_produk']; ?></td>                      
                      <td>Rp.<?php echo number_format($d1['harga_produk']); ?></td>
                   
                     
                      <td>
                        <a title="Keranjang" class="btn btn-success btn-sm" href="keranjang_act_produk.php?id=<?php echo $d1['kode_produk'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>              
                      </td>                                          
                    </tr>
                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
      <br/>
    </div>

  </section>
  
  </div>
  </section>
</div>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perpanjang Paket Member</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form class="form-horizontal" action="perpanjang_paket.php" method="post">
      <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
            <?php
             $id = $_SESSION['id'];    
            ?>
                  <input type="text" name="id_member_panjang" value="<?php echo $id; ?>" hidden>
                <label for="inputEmail3" class="control-label">Paket</label>
        
                        <input type="hidden" name="id_member" value="<?= $id ;?>">
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