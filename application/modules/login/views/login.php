<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap2.min.css">
<div class="container">

  <div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
      <?php
        echo form_error('username');
        echo "<br>";
        echo form_error('password');
        if(isset($login_info))
        {
        echo $login_info;
        }
        ?>
      <form role="form" method="POST" action="<?php echo site_url(); ?>login">
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
      
  </div>
  <div class="col-md-4"></div>
</div>
</div>    