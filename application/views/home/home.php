<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background-color: #fafafa">
    <!-- Content Header (Page header) -->
  </div>
  <!-- /.content-wrapper -->
<script >
  <?php
  if ($alert) {  
  ?>
 
    var message1="<?php echo $message1; ?>";
    var message2="<?php echo $message2; ?>";
    var typealert="<?php echo $typealert; ?>";
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: true,
      //timer: 3000
    });
    Toast.fire({
        icon: typealert,
        title: '&nbsp;'+message1
      }).then((result) => {
  if (result.value) {
    window.location = "<?php echo base_url('profile/gantipass?id=5'); ?>";
  }
})
 
  <?php

  }
?>
</script>