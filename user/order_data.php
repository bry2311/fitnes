<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Status Order
    </h1>
    <br>
    <div class="row">
    <?php
        include '../koneksi.php';
        $data_tr = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran");
        $cx=mysqli_fetch_array($data_tr);
    ?>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Order</li>
    </ol>
  </section>
  
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "add"){
          echo "<div class='alert alert-success text-center'>Data member telah disimpan.</div>";
        }
      }
      ?>
      <div class="box box-info">
        <div class="box-header">
          <div class="text-center main-lbl-beli">
              <span>Total Transaksi</span>
              <label class="lbl-beli"> 
              <?php 
                include '../koneksi.php';
                 $data3 = mysqli_query($koneksi,"SELECT * FROM tbl_order");
                 $cx=mysqli_fetch_array($data3);
                $tmpId = $_SESSION['id'];
                 $hsx=mysqli_query($koneksi,"SELECT SUM(harga_order) FROM tbl_order WHERE id_customer = $tmpId AND status = 'order'");
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
            <form action="upload_bukti_act.php" method="post" enctype="multipart/form-data">
              <p>Upload bukti pembayaran <input type="file" name="bukti"></p>
              <p><input type="submit" value="submit" name="submit"></p>
            </form>
        </div>
      </div>
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Bukti Order </h3>   
        </div>
        <table class="table table-bordered table-striped">
          <thead>
              <tr>
                <th>No</th>
                <th>Bukti</th>
              </tr>
          </thead>
          <tbody>
              <?php 
              include '../koneksi.php';
              $no=1;
              $tmpId = $_SESSION['id'];
              $data = mysqli_query($koneksi,"SELECT * FROM tbl_bukti WHERE  id_member = $tmpId");
              while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><image src="../images/bukti/<?= $d['bukti']; ?>" style="width:150px;height:150px"/></td>
                </tr>
              <?php }; ?>
          </tbody>
        </table> 
      </div>
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Semua data order </h3>   
        </div>
        <div class="box-body">
        <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Kode</th>                                        
                    <th>Nama</th>
                    <th>Harga</th>                    
                    <th>Jenis</th>                                                       
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $tmpId = $_SESSION['id'];
                  $data = mysqli_query($koneksi,"SELECT a.*,b.nama_member FROM tbl_order a JOIN tbl_member b ON a.id_customer = b.id_member WHERE a.status ='order' AND a.id_customer = $tmpId");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kode_order']; ?></td>                      
                      <td><?php echo $d['nama_order']; ?></td>                      
                      <td><?php echo number_format($d['harga_order']); ?></td>                     
                      <td><?php echo $d['jenis_order'];?>                    
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


