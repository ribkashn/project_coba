<div class="row">
  <div class="modal fade" id="modal-photo">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
                <h4 class="modal-title">Ganti Photo Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              </div>
        <div class="modal-body">
          <div class="row">
              <img id="image-preview" alt="image preview" style="display:none;
              width : 300px;margin-left: auto;margin-right: auto;" />
              <br/>
          </div>
          <form action="javascript:do_upload()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="row">
              <div class="form-group" id="crir_grp" style="padding-top: 5px;">
                <div class="col-sm-4">
                  <input type="file" name="userfile" id="userfile" 
                  onchange="previewImage();" style="padding: 10px" />
                </div>
              </div>
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="simpan" onclick="return ceksimpan();">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(function () {
    //Date  picker
    $("#jadwal").datepicker({
      format: 'yyyy/mm/dd',
      todayHighlight: true,
      autoclose: true
    })
  })
</script>
</body>
</html> 
