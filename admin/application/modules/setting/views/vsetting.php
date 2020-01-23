
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?=site_url()?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="container-fluid">
   	
   
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
        
         
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span6">
            
             
             <?=$this->session->flashdata('pesan')?> 

              <form class="form-horizontal" method="post" action="<?=site_url()?>setting/simpan" name="basic_validate" id="basic_validate" novalidate="novalidate" method="POST">
             
                                    
                                  
           <div class="control-group">
                                         <label class="control-label">Nama Aplikasi</label>
                                        <div class="controls">
                                           <input type="text" name="namaaplikasi" value="<?=$Settinglist->namaaplikasi?>"><br>
                                           
                                        </div>
                                         
                                        
                                       
                                    </div>
                                        <div class="control-group">
                                         <label class="control-label">text Footer</label>
                                        <div class="controls">
                                           <input type="text" name="footer" value="<?=$Settinglist->footer?>"><br>
                                           
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
    </div>
    <hr>
    
    
    
  </div>
 