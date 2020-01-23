<script type="text/javascript">
     jQuery(function($) {
       //initiate dataTables plugin
       var myTable =
       $('#dynamic-table')
       //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
       .DataTable( {
         bAutoWidth: false,
         "aoColumns": [
           null, null, null, null, null,

           { "bSortable": false }
         ],
         "aaSorting": [],

         } );
     })
   </script>

<div id="content">
  <div class="container-fluid">
    <div class="row-fluid">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <button type = "button" class = "btn btn-primary" onclick="add_phonebook()" data-toggle="modal"><i class="fa fa-plus"></i>  <i class=""></i>  Tambah Buku Telepon</button>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span12">

             <?=$this->session->flashdata('pesan')?>
            <table id="dynamic-table" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama </th>
                  <th>nomor hp</th>
                  <th>email</th>
                  <th>Group</th>
                  <th>Aksi</th>

                </tr>
              </thead>

              <tbody>
              <?php $no=1;?>
              <?php foreach($phonebooklist as $phonebook ) : ?>
                <tr class="gradeX">
                <td><?=$no++;?></td>
                <td><?=$phonebook->namakontak?></td>
                <td><?=$phonebook->no_hp?></td>
                <td><?=$phonebook->email?></td>
                <td><?=$phonebook->nama?></td>
                <td>

                  <a href="<?=site_url('phonebook/kirimsms/')?><?=$phonebook->no_hp?>" class="btn btn-warning"> SMS</a>
                  <button class="btn btn-warning" onclick="edit_phonebook(<?=$phonebook->phonebook_id;?>)"><span class="" title="Edit">Edit</span>
                      </button>
                      <button class="btn btn-danger" onclick="delete_phonebook(<?=$phonebook->phonebook_id;?>)"><span class="" title="Hapus">Hapus</span>
                      </button>
                </td>
                </tr>
                 <?php endforeach; ?>
              </tbody>
            </table>
            </div>

          </div>
        </div>
    </div>
    <hr>
  </div>

  <script type="text/javascript">
     var save_method; //for save method string
      var table;
      function add_phonebook()
        {
          save_method = 'add';
          $('#form')[0].reset(); // reset form on modals
          $('#modal_form').modal('show'); // show bootstrap modal
          $('.modal-title').text('Tambah Buku Telepon '); // Set Title to Bootstrap modal title
        }
     $(document).ready(function(){
          $("#form").validate({
            rules:{
              namakontak:{required:true},
              no_hp:{required:true},
              email:{
                      required:true,
                      email: true
                    },
              group:{required:true}

            }
           });
      });
      function save()
        {
          var form = $("#form");
          var url;
          if (!form.valid())
            {
              document.getElementById('form').focus();
            }
            else{
              if (save_method == 'add') {
                url="<?=site_url('phonebook/save')?>";
              }else{
                url="<?=site_url('phonebook/updateaction')?>";
              }
            $.ajax({
              url:url,
              type:"POST",
              data:$('#form').serialize(),
              dataType:"JSON",
              success:function(data)
                {
                  $('#modal_form').modal('hide');
                  location.reload();
                },
              error:function ()
                {
                  alert('Terdapat Kesalahan');
                }
            });
        }}
        function delete_phonebook(phonebook_id)
         {
            if (confirm('Anda Yakin Menghapus data Data ini?'))
            {
              $.ajax
              ({
                url:"<?=site_url('phonebook/delete')?>/"+phonebook_id,
                type:"POST",
                dataType:"JSON",
                success :function(data)
                {
                  location.reload();
                },
                error:function(jqXHR, textStatus, errorThrown)
                {
                  alert('Terdapat Kesalahan Dalam Menghapus Data');
                }
              });
            }
         }
         function edit_phonebook(phonebook_id)
         {
            save_method='update';
            $('#form')[0].reset();
            $.ajax
            ({
                url:"<?=site_url('phonebook/update')?>/"+phonebook_id,
                type:"GET",
                dataType:"JSON",
                success:function(data)
                {
                  $('[name="phonebook_id"]').val(data.phonebook_id);
                  $('[name="namakontak"]').val(data.namakontak);
                  $('[name=no_hp]').val(data.no_hp);
                  $('[name=email').val(data.email);
                  $('[name=groupid').val(data.groupid);
                  $('#modal_form').modal('show');
                  $('.modal-title').text('Edit Data Buku Telepon');
                },
                error:function(jqXHR, textStatus, errorThrown)
                {
                  alert('Gagal dalam pengambilan data');
                }
            });
         }


      </script>
</div>
 <div class="modal fade bs-example-modal-lg " id="modal_form" role="dialog"">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" role="document">
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title w-100" id="exampleModalLabel">Buku Telepon</h3>

      </div>
      <div class="modal-body form">
        <form action="#" id="form" name="form" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate">
        <input type="hidden" value="" name="phonebook_id" id="phonebook_id" />
          <div class="control-group">
            <label class="control-label col-md-3" >Nama </label>
            <div class="controls">
            <input type="text" name="namakontak" id="namakontak" required="" title="Field Categori Harus Diisi">
            </div>
          </div>
           <div class="control-group">
            <label class="control-label col-md-3" >Nomor HP</label>
            <div class="controls">
            <input type="text" name="no_hp" id="no_hp" required="" title="Field Nomor HP Harus Diisi">
            </div>
          </div>
           <div class="control-group">
            <label class="control-label col-md-3" >Email </label>
            <div class="controls">
            <input type="text" name="email" id="email" required="" title="Field Email Harus Diisi">
            </div>
          </div>
          <?php
          $as=array();
          $option=array();
          $option['']='Pilih Group Kontak';
          foreach ($group as $listgroup){

              $option[$listgroup->group_id]=$listgroup->nama;

            }

        ?>
           <div class="control-group">
            <label class="control-label col-md-3" >Group </label>
            <div class="controls">
           <?php echo form_dropdown('groupid',$option,$as,'id="groupid"  required="" title="Field Group Harus Diisi"'); ?>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
           <button type="button" id="btnSave" onclick="save()" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-arrow-left"></span>Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    <!-- sms -->
