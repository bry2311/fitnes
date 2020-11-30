<?php include "header.php";?>


<div class="content-wrapper">
  <section class="content-header">
    <h1>
   <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Email Baru
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Email baru</li>
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
          <h3 class="box-title">Input Custom Email</h3>
      
        </div>
        <div class="box-body">
        <form class="form-horizontal" action="member_send_custom.php" method="post" enctype="multipart/form-data">
          <div class="box-body">
                               
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" required="required" name="subject" placeholder="subject">
              </div>
            </div> 
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Body</label>
              <div class="col-sm-10">
                <textarea class="form-control" required="required" name="body"></textarea>
              </div>
            </div> 
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="KIRIM">
          </div>
          <!-- /.box-footer -->  
     </div>
     <br/>
   </div>
 </section>
</div>
</section>
</div>
<?php include 'footer.php'; ?>


