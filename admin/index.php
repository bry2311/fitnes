<?php include 'header.php'; ?>
<script type="text/javascript">
  var x = 0;
  function changeIdMember(selectObject){
    var value = selectObject.value;  
    alert(x);

  }
</script>
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
        <div class="box box-info">
          <div class="box-header">
          Transaksi 
          </div>
          <div class="box-body">
            <div class="text-center main-lbl-beli">
              <span>Total Transaksi</span>
              <label class="lbl-beli">
              
              <?php 
                include '../koneksi.php';
                $tmpId = $_SESSION['id'];

                 $data3 = mysqli_query($koneksi,"SELECT * FROM tbl_order WHERE status != 'order' AND id_customer = $tmpId");
                 $cx=mysqli_fetch_array($data3);
                 $hsx=mysqli_query($koneksi,"SELECT SUM(harga_order) FROM tbl_order");
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

  </section>
      <!-- end jumlah -->
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
            Paketan Gym
          </div>
          <!-- <div class="box-body">
          Member
          <select onchange="changeIdMember(this)">
            <option>-- Pilih Member --</option>
            <?php 
              include '../koneksi.php';
              $no=1;
              $data = mysqli_query($koneksi,"SELECT * FROM tbl_member WHERE status_member = 'aktif'");
              while($d = mysqli_fetch_array($data)){
              ?>
                <option value="<?= $d['id_member'];?>"><?= $d['nama_member'];?></option>
              <?php };?>
              </select>
          </div> -->
          <div class="box-body">
          <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Paket</th>
                    <th>Harga</th> 
                                   
                    <th width="10%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tbl_harga");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kategori_harga']; ?></td>                      
                      <td>Rp.<?php echo number_format($d['nilai_harga']); ?></td>
                      <td>
                        <a title="hapus" class="btn btn-success btn-sm" href="keranjang_act_paket.php?id=<?php echo $d['id_harga'] ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>              
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
                  $data1 = mysqli_query($koneksi,"SELECT * FROM tbl_produk");
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
<?php include 'footer.php'; ?>