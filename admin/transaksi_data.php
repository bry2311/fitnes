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
        $data_tr = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran");
        $cx=mysqli_fetch_array($data_tr);
    ?>
    <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa  fa-credit-card"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pendapatan Hari ini</span>
              <span class="info-box-number">
              <?php
                 $hsh=mysqli_query($koneksi,"SELECT SUM(jumlah_pembayaran) FROM tbl_pembayaran where date(tgl_pembayaran)=date(NOW())");
                 $jumlah_hari_ini = mysqli_fetch_row($hsh);
                 $total_hari_ini = $jumlah_hari_ini[0];

                 if(isset($cx['jumlah_pembayaran'])){
                   echo "Rp.".number_format($total_hari_ini);
                 }else{
                   echo "Rp.0";
                 }
              ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bulan Ini</span>
              <span class="info-box-number">
              <?php
                 $hsb=mysqli_query($koneksi,"SELECT SUM(jumlah_pembayaran) FROM tbl_pembayaran where Month(tgl_pembayaran)=Month(NOW())");
                 $jumlah_bulan = mysqli_fetch_row($hsb);
                 $total_bulan = $jumlah_bulan[0];

                 if(isset($cx['jumlah_pembayaran'])){
                   echo "Rp.".number_format($total_bulan);
                 }else{
                   echo "Rp.0";
                 }
              ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          </div>
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-line-chart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bulan Lalu</span>
             
              <span class="info-box-number">
              <?php
                 $hsbl=mysqli_query($koneksi,"SELECT SUM(jumlah_pembayaran) FROM tbl_pembayaran where YEAR(tgl_pembayaran) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(tgl_pembayaran) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) ");
                 $jumlah_bulan_lalu = mysqli_fetch_row($hsbl);
                 $total_bulan_lalu = $jumlah_bulan_lalu[0];

                 if(isset($cx['jumlah_pembayaran'])){
                   echo "Rp.".number_format($total_bulan_lalu);
                 }else{
                   echo "Rp.0";
                 }
              ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          </div>
          
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-bar-chart-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tahun <?php echo date('Y')?></span>
              <span class="info-box-number">
              <?php
                 $hsx=mysqli_query($koneksi,"SELECT SUM(jumlah_pembayaran) FROM tbl_pembayaran where year(tgl_pembayaran)=Year(NOW())");
                 $jumlah_all = mysqli_fetch_row($hsx);
                 $total_all = $jumlah_all[0];

                 if(isset($cx['jumlah_pembayaran'])){
                   echo "Rp.".number_format($total_all);
                 }else{
                   echo "Rp.0";
                 }
              ?>
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          </div>
    </div>
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
                                  
                    <th width="20%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tbl_pembayaran ORDER BY id_pembayaran DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['tgl_pembayaran']; ?></td>                      
                      <td>Rp.<?php echo number_format($d['jumlah_pembayaran']); ?></td>
                   
                      <td> 
                       <?php echo $d['ket_pembayaran'];?>               
                      </td>
                      <td>
                      <a title="lihat detail" class="btn btn-success btn-sm" href=""><i class="fa fa-search"></i></a>              
                      <a title="hapus" class="btn btn-danger btn-sm" href="transaksi_delete.php?id=<?php echo $d['id_pembayaran']; ?>"><i class="fa fa-trash"></i></a>              

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


