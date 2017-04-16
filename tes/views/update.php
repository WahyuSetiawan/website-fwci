
        <?php 
        $baris = $user->row();
        ?>
        <div class="panel panel-default">
        <div class="panel-heading">Update</div>
        <form name="form-validate" class="form-validate" method="post" action="<?php echo site_url(); ?>user/update/<?php echo $baris->id_user; ?>">
                
                    <div class="form-group">
                          <label for="nama_user">nama_user</label>
                          <input type="text" class="form-control" name="nama_user" value="<?php echo set_value('nama_user'); ?>" placeholder="Enter nama_user">
                    </div>
                    <span class="help-block"> <?php echo form_error('nama_user'); ?> </span>
                    

                    <div class="form-group">
                    <label for="id_usergroup">usergroup</label>
                    <select class="form-control" name="id_usergroup">
                        <option value="">Pilih usergroup</option>
                        <?php foreach ($usergroup->result() as $valusergroup) {
                        if($baris->id_usergroup==$valusergroup->id_usergroup){
                        ?>
                        <option value="<?php echo $valusergroup->usergroup; ?>" selected><?php echo $valusergroup->usergroup; ?></option>
                        <?php }else{ ?>
                        <option value="<?php echo $valusergroup->usergroup; ?>"><?php echo $valusergroup->usergroup; ?></option>
                        <?php }} ?>
                    </select>
                    </div>
                    <span class="help-block"> <?php echo form_error('id_usergroup'); ?> </span>     
                    
                <button type="submit" class="btn btn-default">Save</button>
        </form>
        </div>      
        