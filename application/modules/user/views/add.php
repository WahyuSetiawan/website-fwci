<div class="panel-heading action">
    <span><i class="icon-fixed-width icon-user"></i> Add User</span>  
    <a href="javascript: save();"><i class="icon-fixed-width icon-save icon-2x"></i></a>
    <a href="<?php echo site_url(); ?>user"><i class="icon-fixed-width icon-mail-reply-all icon-2x"></i></a>    
</div>
<div class="panel-body">
    
<form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>user/add" id="validate">
        
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" id="nama" data-rule-required="true" value="<?php echo set_value('nama'); ?>" placeholder="Enter Nama">
        </div>
        <span class="help-block"> <?php echo form_error('nama'); ?> </span>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" data-rule-minlength="6" data-rule-required="true" value="<?php echo set_value('username'); ?>" placeholder="Enter Username">
        </div>
        <span class="help-block"> <?php echo form_error('username'); ?> </span>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" data-rule-minlength="6" data-rule-required="true" placeholder="Enter Password">
        </div>
        <span class="help-block"> <?php echo form_error('password'); ?> </span>
        <div class="form-group">
            <label for="confPassword">Confirmasi Password</label>
            <input type="password" class="form-control" name="confPassword" id="confPassword" data-rule-minlength="6" data-rule-required="true" placeholder="Enter Confirmasi Password">
        </div>
        <span class="help-block"> <?php echo form_error('confPassword'); ?> </span>
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" data-rule-required="true" value="<?php echo set_value('email'); ?>" placeholder="Enter Username">
        </div>
        <span class="help-block"> <?php echo form_error('email'); ?> </span>
        <div class="form-group">
            <label for="userGroup">User Group</label>
            <select class="form-control" name="userGroup" id="userGroup"  data-rule-required="true">
                <option value="">Select User Group</option>
                <?php foreach ($userGroup->result() as $value) { ?>
                <option value="<?php echo $value->id_usergroup; ?>"><?php echo $value->usergroup; ?></option>
                <?php } ?>
            </select>
        </div>
        <span class="help-block"> <?php echo form_error('userGroup'); ?> </span>
        
</form>
    
</div>

