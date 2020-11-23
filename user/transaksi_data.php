<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Transaksi Record
    </h1>
    <br>
    <div class="row">
    <?php
        include '../koneksi.php';
        $tmpId = $_SESSION['id'];
        $data_tr = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran WHERE id_member = $tmpId");
        $cx=mysqli_fetch_array($data_tr);
    ?>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Transaksi</li>
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
          <h3 class="box-title">Semua data transaksi </h3>
          
        </div>
        <div class="box-body">
        <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Tanggal</th>                                        
                    <th>Jumlah</th>
                    <th>Keterangan</th>                                                  
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran WHERE id_member = $tmpId ORDER BY id_pembayaran DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tgl_pembayaran']; ?></td>                      
                      <td>Rp.<?php echo number_format($d['jumlah_pembayaran']); ?></td>
                   
                      <td> 
                       <?php echo $d['ket_pembayaran'];?>               
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


