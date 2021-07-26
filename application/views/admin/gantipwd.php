  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ganti Password</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Ganti Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->  
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-md-6">
            <div class="card card-progo">
              <div class="card-header">
                <h3 class="card-title">Ganti Password</h3>
              </div>
              <form role="form" action="<?php echo base_url('profile/') ?>gantipass1" 
              method="post" name="frmChange" onsubmit="return validatepwd()" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="NPP">NPP</label>
                    <input type="text" class="form-control" id="NPP" name="NPP" placeholder="Enter NPP" readonly value="<?php echo $this->session->userdata('npp')?>">
                  </div>
                  <div class="form-group">
                    <label for="passwd">Password Lama</label>
                    <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Enter Password Lama">
                  </div>
                  <div class="form-group">
                    <label for="passwd2">Password Baru</label>
                    <input type="password" class="form-control" id="passwd1" name="passwd1" placeholder="Enter Password Baru">
                  </div>
                  <div class="form-group">
                    <label for="passwd2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="passwd2" name="passwd2" placeholder="Enter Konfirmasi Password Baru">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-progo-orange float-right">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

  </div>

<script type="text/javascript">
  function validatepwd(){
  var passwordlama,passwordbaru,konfirmasipwd,output = true;

    passwordlama=document.frmChange.passwd;
    passwordbaru=document.frmChange.passwd1;
    konfirmasipwd=document.frmChange.passwd2;
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 4000
    });

    if(passwordbaru.value != konfirmasipwd.value) {
      Toast.fire({
        icon: 'error',
        title: '&nbsp; Password baru dan konfirmasi berbeda'
      });
      output = false;
    } 

   if(passwordbaru.value == passwordlama.value) {
      Toast.fire({
        icon: 'error',
        title: 'Password baru tidak boleh sama dengan password lama'
      });

      //inputPassword1.focus();  
      output = false;
    } 


    return output;
  }
</script>

<?php
  if ($alert) {  
?>
  <script>
    var message1="<?php echo $message1; ?>";
    var message2="<?php echo $message2; ?>";
    var typealert="<?php echo $typealert; ?>";
    const Toast = Swal.mixin({
      toast: true,
      position: 'top',
      showConfirmButton: false,
      timer: 4000
    });
    Toast.fire({
        icon: typealert,
        title: '&nbsp;'+message1
      });
  </script>
  <?php
  }
?>
