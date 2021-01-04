<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Data Instruktur
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Instruktur</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "add"){
          echo "<div class='alert alert-success text-center'>Data instruktur telah disimpan.</div>";
        }
      }
      if(isset($_GET['status'])){
        echo "<div class='alert alert-success text-center'>".$_GET['status']."</div>";
      }

      ?>
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Semua data Instruktur </h3>
          <div class="text-right">
            <a href="instruktur_add.php" class="btn btn-primary" target="__blank"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Instruktur Baru</a>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>        
                    <th>Nama</th>                                                   
                    <th>Foto</th>                                                   
                    <th width="20%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tbl_instruktur");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>                   
                      <td><?php echo $d['name']; ?></td>
                      <td><img src="../assets/photos/<?php echo $d['photo'];?>" style="width:100px;height:100px"></td>

                      <td>
                        <a title="lihat detail" class="btn btn-success btn-sm" href="instruktur_detail.php?id=<?php echo $d['id'] ?>"><i class="fa fa-search"></i></a>   
                        <a title="hapus instruktur" class="btn btn-danger btn-sm" href="instruktur_hapus.php?id=<?php echo $d['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>              
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


