
<div id="content">
  <div class="container-fluid">


    <div class="row-fluid">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>


        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span6">


             <?=$this->session->flashdata('pesan')?>

              <form class="form-horizontal" method="post" action="<?=site_url()?>api/simpan" name="basic_validate" id="basic_validate" novalidate="novalidate" method="POST">



                                        <div class="form-group row">
                                       <label class="col-sm-2 col-form-label">Userkey</label>
                                          <div class="col-sm-3">
                                           <input type="text" name="userkey" value="<?=$phonebooklist->userkey?>"><br>
                                        </div>
                                        </div>

                                        <div class="form-group row">
                                         <label class="col-sm-2 col-form-label">Passkey</label>
                                        <div class="col-sm-3">
                                           <input type="text" name="passkey" value="<?=$phonebooklist->passkey?>"><br>

                                        </div>



                                    </div>

                                    <div class="form-actions">
                                        <input type="submit" value="Simpan" class="btn btn-success">
                                    </div>
                                </form>

            </div>


          </div>
        </div>
    </div>
    <hr>



  </div>
