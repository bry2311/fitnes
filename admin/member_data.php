<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-archive" aria-hidden="true"></i>&nbsp;Data Member
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Data Member</li>
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
          <h3 class="box-title">Semua data Member </h3>
          <div class="text-right">
            <a href="member_add.php" class="btn btn-primary" target="__blank"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Member Baru</a>
          </div>
        </div>
        <div class="box-body">
        <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">No</th>                    
                    <th>Nomor Kartu</th>
                    <th>Nama</th>                    
                                  
                    <th>Status member</th>                                        
                    <th width="20%">Opsi</th>                                        
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM tbl_member");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['kode_member']; ?></td>                      
                      <td><?php echo $d['nama_member']; ?></td>
                   
                      <td> 
                      <?php
                       $hari_ini=new DateTime();
                       $akhir_tgl=new DateTime($d['berlaku_member']);
                       $telat=$akhir_tgl->diff($hari_ini); 
                      ?>
                        <?php
                        if($akhir_tgl <= $hari_ini){
                          echo "<span class='label label-default'>Telah Habis Masa Langganan</span>";
                        }else if($akhir_tgl >= $hari_ini){
                          echo "<span class='label label-success'>Berlangganan</span>";
                        }
                        ?>                                              
                                            
                      </td>
                      <td>
                      <a title="lihat detail" class="btn btn-success btn-sm" href="member_detail.php?id=<?php echo $d['id_member'] ?>"><i class="fa fa-search"></i></a>              

                        <a title="hapus member" class="btn btn-danger btn-sm" href="member_hapus.php?id=<?php echo $d['id_member'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>              
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


