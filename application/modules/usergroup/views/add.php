<div class="panel-heading action">
    <span><i class="icon-fixed-width icon-group"></i> Add User Group</span>  
    <a href="javascript: save();"><i class="icon-fixed-width icon-save icon-2x"></i></a>
    <a href="<?php echo site_url(); ?>usergroup"><i class="icon-fixed-width icon-mail-reply-all icon-2x"></i></a>    
</div>
<div class="panel-body">
    
<form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>usergroup/add" id="validate">
        
        <div class="form-group">
            <label for="userGroup">User Group</label>
            <input type="text" class="form-control" name="userGroup" id="userGroup" data-rule-required="true" value="<?php echo set_value('userGroup'); ?>" placeholder="Enter user Group">
        </div>
        <span class="help-block"> <?php echo form_error('userGroup'); ?> </span>
        
        <div class="form-group">
            <label for="parent">Parent</label>
            <select class="form-control" name="parent" id="parent"  data-rule-required="true">
                <?php foreach ($userGroup->result() as $value) { ?>
                <option value="<?php echo $value->parent; ?>"><?php echo $value->usergroup; ?></option>
                <?php } ?>
            </select>
        </div>
</form>
    
</div>

