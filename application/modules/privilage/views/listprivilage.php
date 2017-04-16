<div class="panel-heading action">
    <span><i class="icon-fixed-width icon-unlock-alt"></i> Setting Privilage</span>  
    <a href="javascript: save();"><i class="icon-fixed-width icon-save icon-2x"></i></a>
    <a href="<?php echo site_url(); ?>privilage"><i class="icon-fixed-width icon-mail-reply-all icon-2x"></i></a>    
</div>
<form name="formcrud" action='<?php echo site_url() ?>privilage/save' method='post' id="validate"> 
<div class="panel-body">

<ul class="nav nav-tabs" id="myTab">
   <?php 
      if(count($typemodul->result()) > 0) {
      foreach($typemodul->result() as $rowtypemodul){
    ?>
    <li><a href="#<?php echo $rowtypemodul->id_typemodul; ?>"><?php echo $rowtypemodul->typemodul; ?></a></li>        
    <?php 
      }}else{
        echo "<div class='alert alert-error'> Data Tidak Tersedia </div>";  
      }
    ?>  
</ul>

<div class="tab-content">
     <?php 
      if(count($typemodul->result()) > 0) {
      foreach($typemodul->result() as $rowtypemodul2){
    ?>
    <div class="tab-pane" id="<?php echo $rowtypemodul2->id_typemodul; ?>">
                    <!-- isi -->
                    <table class="table table-striped table-bordered table-hover"> 
                    <thead>
                    <tr>
                        <th width="50"><div align="center">#</div></th>
                        <th>Modul / Aksi</th>   
                    <?php 
                    if(count($detailaction->result()) > 0) {
                    foreach($detailaction->result() as $rowdetailaction){
                    if($rowtypemodul2->id_typemodul==$rowdetailaction->id_typemodul){  
                    ?>  
                        <th width="100"><div align="center"><?php echo $rowdetailaction->action; ?></div></th> 
                    <?php 
                    }}}else{
                    echo "<div class='alert alert-error'> Data Tidak Tersedia </div>";  
                    }
                    ?>
                    </tr>  
                    </thead> 
                    <tbody> 
                   
                    <?php 
                    if(count($modul->result()) > 0) {
                    $no = 1;
                    foreach($modul->result() as $rowmodul){
                    if($rowtypemodul2->id_typemodul==$rowmodul->id_typemodul){  
                    ?>
                    <tr>
                      <td><div align="center"><?php echo $no; ?></div></td>
                      <td>
                        <?php echo $rowmodul->modul; ?>
                      </td>
                        <?php 
                        if(count($detailaction->result()) > 0) {
                        foreach($detailaction->result() as $rowdetailaction2){
                        if($rowtypemodul2->id_typemodul==$rowdetailaction2->id_typemodul){  
                        ?>  
                                <td><div align="center">                                
                                <?php 
                                foreach($privilage->result() as $rowprivilage){
                                if($rowmodul->id_modul==$rowprivilage->id_modul && $rowdetailaction2->id_detailaction==$rowprivilage->id_detailaction){
                                    
                                    if($rowprivilage->status==1){
                                ?> 
                                <input type="hidden" name="aksi[<?php echo $rowprivilage->id_privilage.'-'.$rowmodul->id_modul; ?>]"  value='0' id="textcheckbox" checked>
                                <input type="checkbox" name="aksi[<?php echo $rowprivilage->id_privilage.'-'.$rowmodul->id_modul; ?>]"  value='1' id="textcheckbox" checked>
                                <?php }else{ ?>
                                <input type="hidden" name="aksi[<?php echo $rowprivilage->id_privilage.'-'.$rowmodul->id_modul; ?>]"  value='0' id="textcheckbox">
                                <input type="checkbox" name="aksi[<?php echo $rowprivilage->id_privilage.'-'.$rowmodul->id_modul; ?>]"  value='1' id="textcheckbox">
                                <?php }}} ?> 
                                </div></td>      
                        <?php 
                        }}}else{
                        echo "<div class='alert alert-error'> Data Tidak Tersedia </div>";  
                        }
                        ?>
                    </tr>
                    <?php 
                    $no++;
                    }}}else{
                    echo "<div class='alert alert-error'> Data Tidak Tersedia </div>";  
                    }
                    ?>
                                     
                    </tbody> 
                    <tfoot>
                    <tr>
                        <th width="50"><div align="center">#</div></th>
                        <th>Modul / Aksi</th>   
                    <?php 
                    if(count($detailaction->result()) > 0) {
                    foreach($detailaction->result() as $rowdetailaction3){
                    if($rowtypemodul2->id_typemodul==$rowdetailaction3->id_typemodul){  
                    ?>  
                        <th width="100"><div align="center"><?php echo $rowdetailaction3->action; ?></div></th> 
                    <?php 
                    }}}else{
                    echo "<div class='alert alert-error'> Data Tidak Tersedia </div>";  
                    }
                    ?>
                    </tr>  
                    </tfoot> 
                    </table>
                    
                <!-- isi -->           
        
    </div>
    <?php 
      }}else{
        echo "<div class='alert alert-error'> Data Tidak Tersedia </div>";  
      }
    ?>  
</div>
</div>
</form>      
<script>
 $('#myTab a:first').tab('show');
 $('#myTab a').click(function (e) {
     
  e.preventDefault();
  $(this).tab('show');
});

</script>