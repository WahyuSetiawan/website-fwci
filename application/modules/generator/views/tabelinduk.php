<form class="form-horizontal" role="form" method="POST" action="<?php echo site_url(); ?>generator/tabelinduk">
  <div class="form-group">
    <label for="tabelinduk" class="col-lg-2 control-label">Tabel Induk</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" name="tabelinduk" id="tabelinduk" >
    </div>
  </div>
  <div class="form-group">
    <label for="fieldinduk" class="col-lg-2 control-label">Jumlah Field Induk</label>
    <div class="col-lg-10">
      <input type="number" class="form-control" name="jumlahfieldinduk" id="jumlahfieldinduk">
    </div>
  </div> 
  <div class="form-group">
    <label for="tabelanak" class="col-lg-2 control-label">Jumlah Tabel Relasi</label>
    <div class="col-lg-10">
      <input type="number" class="form-control" name="jumlahtabelrelasi" id="jumlahtabelrelasi" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-default">Next</button>
    </div>
  </div>
</form>