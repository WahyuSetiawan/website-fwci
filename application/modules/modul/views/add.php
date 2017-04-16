<div class="panel-heading action">
    <span><i class="icon-fixed-width icon-briefcase"></i> Add Modul</span>  
    <a href="javascript: save();"><i class="icon-fixed-width icon-save icon-2x"></i></a>
    <a href="<?php echo site_url(); ?>modul"><i class="icon-fixed-width icon-mail-reply-all icon-2x"></i></a>    
</div>
<div class="panel-body">
    
<form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>modul/add" enctype="multipart/form-data" id="validate">
        
        <div class="form-group">
            <label for="nama">Upload Modul</label>
            <input type="file" class="form-control" name="userfile" id="userfile" data-rule-required="true">
        </div>
        <span class="help-block">
        <?php 
        if(isset($error_upload)){
            echo $error_upload;
        }
        ?>
        </span>
        
</form>
    
</div>

