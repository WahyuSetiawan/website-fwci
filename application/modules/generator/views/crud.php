<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url(); ?>generator/crudhasil">
  <?php foreach ($tabelanak  as $key => $value) {?>
  <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Tabel Relasi</label>
    <div class="col-lg-10">
         <input type="text" class="form-control" name="tabelrelasi[<?php echo $key; ?>]" id="tabelinduk" value="<?php echo $value; ?>" disabled>  
         <input type="hidden" class="form-control" name="tabelrelasi[<?php echo $key; ?>]" id="tabelinduk" value="<?php echo $value; ?>">  
   </div>
  </div>
  <hr><hr>
     
    <?php
    if($jumlahfieldanak[$key]!="" || $jumlahfieldanak[$key]!=0){
    for ($i = 1; $i <= $jumlahfieldanak[$key]; $i++) {
    ?>
     <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Field</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="fieldanak[<?php echo $key.'-'.$i; ?>]" id="tabelinduk">
</div>
  </div>
    
    <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Type Field</label>
    <div class="col-lg-10">
        <select class="form-control" name="typefieldanak[<?php echo $key.'-'.$i; ?>]">
          <option value="none">None</option>  
          <option value="PK">Primary Key</option>
          <option value="FK">Foreign Key</option>
        </select>
</div>
  </div>
    
<!--      <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Type Input</label>
    <div class="col-lg-10">
        <select class="form-control" name="typeinputanak[<?php echo $key.'-'.$i; ?>]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
          <option value="checkbox">Checkbox</option>
          <option value="radio">Radio</option>
          <option value="email">Email</option>
          <option value="date">Date</option>
          <option value="number">Number</option>
          <option value="url">Url</option>
          <option value="password">Password</option>
          <option value="select">Select</option>
          <option value="multipleselect">Multyple Select</option>
        </select>
</div>
  </div>-->
    
    <hr>
    <?php }} } ?>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Next</button>
    </div>
  </div>
</form>