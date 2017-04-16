<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url(); ?>generator/crud">
  <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Tabel Induk</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="tabelinduk" id="tabelinduk" value="<?php echo $tabelinduk; ?>" disabled>  
        <input type="hidden" class="form-control" name="tabelinduk" id="tabelinduk" value="<?php echo $tabelinduk; ?>">  
    </div>
  </div>
  <hr><hr>
     
    <?php
    if($jumlahfieldinduk!="" || $jumlahfieldinduk!=0)
    for ($i = 1; $i <= $jumlahfieldinduk; $i++) {
    
?>
     <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Field</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="fieldinduk[<?php echo $i; ?>]" id="tabelinduk">
</div>
  </div>
    
    <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Type Field</label>
    <div class="col-lg-10">
        <select class="form-control" name="typefieldinduk[<?php echo $i; ?>]">
          <option value="none">None</option>  
          <option value="PK">Primary Key</option>
          <option value="FK">Foreign Key</option>
        </select>
</div>
  </div>
    
<!--      <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Type Input</label>
    <div class="col-lg-10">
        <select class="form-control" name="typeinputinduk[<?php echo $i; ?>]">
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
    <?php } ?>
    <hr>
<?php
    if($jumlahtabelrelasi!="" || $jumlahtabelrelasi!=0)
    for ($i = 1; $i <= $jumlahtabelrelasi; $i++) {
    
?>
  <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Tabel Relasi</label>
    <div class="col-lg-10">
        <input type="text" class="form-control" name="tabelanak[<?php echo  $i; ?>]" id="tabelinduk">
    </div>
  </div>
    
  <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Jumlah Field Tabel Relasi</label>
    <div class="col-lg-10">
        <input type="number" class="form-control" name="jumlahfieldanak[<?php echo  $i; ?>]" id="tabelinduk">
    </div>
  </div>  
    <?php
}   
?>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Next</button>
    </div>
  </div>
</form>