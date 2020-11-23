<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Paket Harga
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Paket dan Produk</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <section class="col-lg-12">
       <?php 
       if(isset($_GET['alert'])){
        if($_GET['alert'] == "hapus"){
          echo "<div class='alert alert-success text-center'>Telah berhasil dihapus.</div>";
        }
      }
      ?>

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Tambah Kategori Paket</h3>
                    </div>
                    <form action="kategori_paket_act.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3">Nama Paket</label>
                                    <input type="text" class="form-control" required="required" name="nama_paket" placeholder="misal: 1 bulan">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Harga Paket</label>
                                    <input type="number" class="form-control" required="required" name="harga_paket" >
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Jumlah Hari (satuan dalam hari)</label>
                                    <input type="number" class="form-control" required="required" name="hari_paket" placeholder="10">
                                </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                <br/>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">List Harga Paket</h3>
                        </div>
                    
                        <div class="box-body">
                             <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable">
                                        <thead>
                                        <tr>
                                            <th width="1%">No</th>                    
                                            <th>Nama Paket</th>
                                            <th>Harga Paket</th>                
                                            <th>Satuan Hari</th>                                        
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
                                            <td>Rp.&nbsp;<?php echo number_format($d['nilai_harga']); ?></td>
                                            <td> <?php echo $d['hari_harga']; ?> Hari </td>
                                            <td>                 
                                                <a title="ubah paket" class="btn btn-warning btn-sm" href="paket_detail.php?id=<?php echo $d['id_harga'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>              
                                                <a title="hapus harga" class="btn btn-danger btn-sm" href="kategori_paket_hapus.php?id=<?php echo $d['id_harga'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>              
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
            </div>

        </div>
   
 </section>
</div>
</section>

<!-- end paket -->

<section class="content-header">
    <h1>
   <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Produk 
    </h1>
  
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

        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="box box-info">
                    <div class="box-header">
                         <h3 class="box-title">Tambah produk</h3>
                    </div>
                    <form action="product_add_act.php" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3">Nama produk</label>
                                    <input type="text" class="form-control" required="required" name="nama_produk" placeholder="misal: Air Mineral 1500ml">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3">Harga produk</label>
                                    <input type="number" class="form-control" required="required" name="harga_produk" >
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3">Kategori produk</label>
                                    <select name="kategori" class="form-control" required="required">
                                        <option value="online">online</option>
                                        <option value="offline">offline</option>
                                    </select>
                                </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                <br/>
                </div>
            </div>

            <div class="col-lg-8 col-md-6 col-sm-12 col-12">
                <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">List Produk</h3>
                        </div>
                    
                        <div class="box-body">
                             <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="table-datatable-1">
                                        <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Kode produk</th>                
                                            <th>Nama produk</th>
                                            <th>Harga produk</th>                
                                            <th>Kategori produk</th>                
                                            <th width="20%">Opsi</th>                                        
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        include '../koneksi.php';
                                        $no=1;
                                        $data = mysqli_query($koneksi,"SELECT * FROM tbl_produk");
                                        while($d = mysqli_fetch_array($data)){
                                            ?>
                                            <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td> <?php echo $d['kode_produk']; ?></td>
                                            <td><?php echo $d['nama_produk']; ?></td>                      
                                            <td>Rp.&nbsp;<?php echo number_format($d['harga_produk']); ?></td>
                                            <td><?php echo $d['kategori']; ?></td>                      
                                            <td>    
                                                <a title="ubah produk" class="btn btn-warning btn-sm" href="product_detail.php?id=<?php echo $d['id_produk'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>              
                                                <a title="hapus produk" class="btn btn-danger btn-sm" href="product_hapus.php?id=<?php echo $d['id_produk'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>              
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
            </div>

        </div>
   
 </section>
</div>
</section>

<!-- end product -->
</div>

<?php include 'footer.php'; ?>


