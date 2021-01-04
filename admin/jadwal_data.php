<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Data Jadwal
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Jadwal</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "add"){
          echo "<div class='alert alert-success text-center'>Data jadwal telah disimpan.</div>";
        }
      }
      if(isset($_GET['status'])){
        echo "<div class='alert alert-success text-center'>".$_GET['status']."</div>";
      }

      ?>
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Semua data Jadwal </h3>
          <div class="text-right">
            <a href="jadwal_add.php" class="btn btn-primary" target="__blank"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Jadwal Baru</a>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>        
                    <th>Instruktur</th>                                                   
                    <th>Hari</th>                                                   
                    <th>Jam Mulai</th>                                                   
                    <th>Jam Selesai</th>                                                   
                    <th width="20%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT j.*,i.name FROM tbl_jadwal j JOIN tbl_instruktur i ON j.id_instruktur = i.id");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>                   
                      <td><?php echo $d['name']; ?></td>
                      <td><?php echo $d['hari']; ?></td>
                      <td><?php echo $d['jam_mulai']; ?></td>
                      <td><?php echo $d['jam_selesai']; ?></td>
                      <td>
                        <a title="lihat detail" class="btn btn-success btn-sm" href="jadwal_detail.php?id=<?php echo $d['id'] ?>"><i class="fa fa-search"></i></a>   
                        <a title="hapus jadwal" class="btn btn-danger btn-sm" href="jadwal_hapus.php?id=<?php echo $d['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>              
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


