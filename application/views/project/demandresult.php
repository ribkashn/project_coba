              <div class="card-body">
                <div class="row">
                  <div class="col-sm-2">
                  <form action="<?php echo base_url('project') ?>/demanddetail?id=7&aksi=Tambah" method="post">
                    <button type="submit" class="btn btn-progo-orange" <?php if (($NPP=='') or ($this->session->userdata('kelompok')!='BNP')) echo 'disabled'; ?>><i class="fa fa-plus"></i>&nbsp;Tambah Demand</button>
                  </form>
                </div>
                <div class="col-sm-3">
                  <form action="<?php echo base_url('project') ?>/uploaddemand?id=7" method="post">
                    <button type="submit" class="btn btn-progo-orange" <?php if (($NPP=='') or ($this->session->userdata('kelompok')!='BNP')) echo 'disabled'; ?>>Upload Demand Sign Off</button>
                  </form>
                </div>
              </div>

                <br>
                <div class="row">
                  <div class="col-sm-12">
                  <table id="mytable" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                    <tr>
                      <th class="th-datatables">Demand ID</th>
                      <th class="th-datatables">Nama/Deskripsi Demand</th>
                      <!-- <th class="th-datatables">Nama Project</th> -->
                      <th class="th-datatables">Divisi</th>
                      <th class="th-datatables">Memo Req</th>
                      <th class="th-datatables">Jenis</th>
                      <th class="th-datatables">Status</th>
                      <th class="th-datatables">Tim Member</th>
                      <th class="th-datatables">Eks Implementasi</th>
                      <th class="th-datatables">No CR</th>
                      <th class="th-datatables">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                  </table>
                </div>
                </div>
              </div>

<script type="text/javascript">
  $(function () {
    $('#mytable').DataTable( {
      "processing": true, // for show progress bar
      "serverSide": true, // for process server side
      "dom": "<'row'<'col-sm-5'B><'col-sm-3 text-center'l><'col-sm-4'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-6'i><'col-sm-6'p>>",
      "buttons": [{
                    extend: 'copy',
                    text: 'Copy',
                    action: serverSideButtonAction
                },{
                    extend: 'csv',
                    text: 'CSV',
                    action: serverSideButtonAction
                }, {
                    extend: 'excel',
                    text: 'Excel',
                    action: serverSideButtonAction
                },{
                    extend: 'pdf',
                    text: 'PDF',
                    action: serverSideButtonAction
                }, "colvis"],
      "oSearch": {"sSearch": "<?php echo $cari;?>"}, 
      "deferRender": true,
      "ajax": {
                "url": "<?php echo base_url('project/get_data_user') ;?>",
                "type": "POST"
            },
       "columnDefs": [ {
            "targets": -1,
            "data": null,
            "render": function ( data, type, row, meta ) {
              var demandid="'"+data[0]+"'";
      return '<a href="javascript:detaildemand(1,'+demandid+')" data-toggle="tooltip" title="View"><i class="far fa-eye"></i></a><?php if ($NPP<>"") { ?>
              <a href="javascript:detaildemand(2,'+demandid+')" data-toggle="tooltip" title="Edit"><i class="far fa-edit"></i></a><a href="javascript:hapusdemand('+demandid+')" data-toggle="tooltip" title="Hapus"><i class="far fa-trash-alt"></i></a><?php } ?>';
        } }], 
      "fnDrawCallback": function( oSettings ) {
            Removeclass();
        }
    } );
  });

  function serverSideButtonAction(e, dt, node, config) {
 
        var me = this;
        var button = config.text.toLowerCase();
        if (typeof $.fn.dataTable.ext.buttons[button] === "function") {
            button = $.fn.dataTable.ext.buttons[button]();
        }
        var len = dt.page.len();
        var start = dt.page();
        dt.page(0);
 
        // Assim que ela acabar de desenhar todas as linhas eu executo a função do botão.
        // ssb de serversidebutton
        dt.context[0].aoDrawCallback.push({
            "sName": "ssb",
            "fn": function () {
                $.fn.dataTable.ext.buttons[button].action.call(me, e, dt, node, config);
                dt.context[0].aoDrawCallback = dt.context[0].aoDrawCallback.filter(function (e) { return e.sName !== "ssb" });
            }
        });
        dt.page.len(999999999).draw();
        setTimeout(function () {
            dt.page(start);
            dt.page.len(len).draw();
        }, 5000);
    }

function detaildemand(jenis,demandid) {
  if (jenis==1)
    window.location.href = "<?php echo base_url('project/demanddetail');?>"+"?id=7&aksi=View&demandid="+ demandid;
  if (jenis==2)
    window.location.href = "<?php echo base_url('project/demanddetail');?>"+"?id=7&aksi=Edit&demandid="+ demandid;
  }

function hapusdemand(Id) {
Swal.fire({
  title: '',
  text: "Demand "+Id+" akan dihapus?",
  showCancelButton: true,
  confirmButtonText: 'Hapus',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
          url: "<?php echo base_url('project'); ?>/hapusdemand",
          type: 'GET', 
          data: {demandid: Id},
          dataType: "json",
          success: function(data){
            getData();
            Swal.fire(
              '',
              'Dokumen sudah berhasil dihapus',
              'success'
            );
          }
        });
  }
})
}

</script>
