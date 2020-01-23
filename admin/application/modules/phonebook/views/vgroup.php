
<div id="content">
  <div class="container-fluid">







             <?=$this->session->flashdata('pesan')?>

              <form class="form-horizontal" method="post" action="<?=site_url()?>phonebook/sendgroup" name="basic_validate" id="basic_validate" novalidate="novalidate" method="POST">

          <div class="form-group row">
          <?php
          $as=array();
          $option=array();
          $option['']='Pilih Group Kontak';
          foreach ($group as $listgroup){

              $option[$listgroup->group_id]=$listgroup->nama;

            }

        ?>
          <label class="col-sm-2 col-form-label">Group</label>
            <div class="col-sm-3">
           <?php echo form_dropdown('groupid',$option,$as,'id="groupid"  required="" title="Field Group Harus Diisi"'); ?>
          </div>
        </div>

          <div class="form-group row">
          <label class="col-sm-2 col-form-label">Isi Pesan</label>
          <div class="col-sm-3">
          <textarea id="isi"  class="form-control" name="isi"></textarea>
          </div>
          </div>

                                    <div class="form-actions">
                                        <input type="submit" value="Validate" class="btn btn-success">
                                    </div>
                                </form>
