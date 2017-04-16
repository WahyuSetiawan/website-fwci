<form role="form" method="POST" name="generator" action="<?php echo site_url(); ?>generator/tes">
<div class="radio">
  <label>
    <input type="radio" name="options" value="0" checked>
    CRUD + CI SYSTEM
  </label>
</div>
<div class="radio">
  <label>
    <input type="radio" name="options" value="1">
    JUST CRUD 
  </label>
</div>

<table class="table table-bordered table-hover">
<thead>
  <tr>
    <th colspan="2">View</th>
    <th colspan="4">Add</th>
    <th colspan="4">Update</th>
  </tr>
</thead>
<tbody>
<?php 
//echo 'Nama tabel utama : '.$tabelutama.'<br/>';
    foreach ($fieldutama as $keyfieldutama => $valfieldutama) {
        foreach ($valfieldutama as $valfieldutamas) {
        $exvalfieldutama = explode("-", $valfieldutamas);
            
?>
    <tr>
    <?php if($exvalfieldutama[1]!="FK"){ ?>
    <td width="10px"><input type="checkbox" name="view[<?php echo $keyfieldutama; ?>][]" value="<?php echo $valfieldutamas; ?>"></td>
    <td><?php  echo $valfieldutamas;?></td>
    <?php }else{ ?>
    <td colspan="2">Tabel Relasi</td>
    <?php } ?>
    <td><?php echo $valfieldutamas; ?></td>
    
    <td>
        <select class="form-control" name="typeinputadd[<?php echo $valfieldutamas; ?>]">
        <?php 
        if($exvalfieldutama[1]=="PK"){ ?>
          <option value="text">Text</option>
          <option value="email">Email</option>
          <option value="number">Number</option>
        <?php 
        }elseif($exvalfieldutama[1]=="FK"){
        foreach ($fieldrelasi as $keyfieldrelasi => $valfieldrelasi) {
        foreach ($valfieldrelasi as $valfieldrelasis) {
        $exvalfieldrelasis = explode("-", $valfieldrelasis);
        if($exvalfieldrelasis[0]==$exvalfieldutama[0]){    
        ?>
          <option value="select-<?php echo $keyfieldrelasi; ?>">Select</option>
          <!--<option value="radio-<?php echo $keyfieldrelasi; ?>">Radio</option>-->
        <?php }}}}else{ ?>
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
          <option value="email">Email</option>
          <option value="date">Date</option>
          <option value="number">Number</option>
          <option value="url">Url</option>
          <option value="password">Password</option>
        <?php } ?>  
    </td>
    
    <td>
     <?php 
        if($exvalfieldutama[1]=="PK"){ ?>
        <select name="autoadd[<?php echo $valfieldutamas; ?>]" class="form-control">
          <option value="0">Otomatis</option>
          <option value="1">Manual</option>
        </select>
      <?php }elseif($exvalfieldutama[1]=="FK"){?>
      <select name="fieldviewrelasiadd[<?php echo $valfieldutamas; ?>]" class="form-control">
      <?php  
      foreach ($fieldrelasi as $keyfieldrelasi => $valfieldrelasi2) {
      foreach ($valfieldrelasi2 as $valfieldrelasis2) {
      $exvalfieldrelasis2 = explode("-", $valfieldrelasis2);    
      if($exvalfieldrelasis2[1]!="PK"){    
      ?>
      <option value="<?php echo $valfieldrelasis2; ?>"><?php echo $valfieldrelasis2; ?></option>
      <?php }}} ?>
       </select>
      <?php } ?>  
    </td>
    <td>
        <select multiple name="validationadd[<?php echo $valfieldutamas; ?>][]" class="form-control">
        <option value="required" selected>required</option>
        <!--<option value="min_length">min_length</option>-->
        <!--<option value="max_length">max_length</option>-->
        <!--<option value="exact_length">exact_length</option>-->
        <!--<option value="greater_than">greater_than</option>-->
        <!--<option value="matches">matches</option>-->
        <!--<option value="is_unique">is_unique</option>-->
        <!--<option value="less_than">less_than</option>-->
        <option value="alpha">alpha</option>
        <option value="alpha_numeric">alpha_numeric</option>
        <option value="alpha_dash">alpha_dash</option>
        <option value="numeric">numeric</option>
        <option value="integer">integer</option>
        <option value="decimal">decimal</option>
        <option value="is_natural">is_natural</option>
        <option value="is_natural_no_zero">is_natural_no_zero</option>
        <option value="valid_email">valid_email</option>
        <!--<option value="valid_emails">valid_emails</option>-->
        <!--<option value="valid_ip">valid_ip</option>-->
        <option value="xss_clean">xss_clean</option>
        </select>
    </td>
    <td><?php echo $valfieldutamas; ?></td>
       <td>
        <select class="form-control" name="typeinputupdate[<?php echo $valfieldutamas; ?>]">
        <?php 
        $exvalfieldutama = explode("-", $valfieldutamas);
        if($exvalfieldutama[1]=="PK"){ ?>
          <option value="text">Text</option>
          <option value="email">Email</option>
          <option value="number">Number</option>
        <?php 
        }elseif($exvalfieldutama[1]=="FK"){
        foreach ($fieldrelasi as $keyfieldrelasi => $valfieldrelasi) {
        foreach ($valfieldrelasi as $valfieldrelasis) {
        $exvalfieldrelasis = explode("-", $valfieldrelasis);
        if($exvalfieldrelasis[0]==$exvalfieldutama[0]){    
        ?>
          <option value="select-<?php echo $keyfieldrelasi; ?>">Select</option>
          <!--<option value="radio-<?php echo $keyfieldrelasi; ?>">Radio</option>-->
        <?php }}}}else{ ?>
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
          <option value="email">Email</option>
          <option value="date">Date</option>
          <option value="number">Number</option>
          <option value="url">Url</option>
          <option value="password">Password</option>
        <?php } ?>  
    </td>
    
    <td>
     <?php 
        $exvalfieldutama = explode("-", $valfieldutamas);
        if($exvalfieldutama[1]=="PK"){ ?>
        <select name="autoupdate[<?php echo $valfieldutamas; ?>]" class="form-control">
          <option value="0">Otomatis</option>
          <option value="1">Manual</option>
        </select>
      <?php }elseif($exvalfieldutama[1]=="FK"){?>
      <select name="fieldviewrelasiupdate[<?php echo $valfieldutamas; ?>]" class="form-control">
      <?php  
      foreach ($fieldrelasi as $keyfieldrelasi => $valfieldrelasi3) {
      foreach ($valfieldrelasi3 as $valfieldrelasis3) {
      $exvalfieldrelasis3 = explode("-", $valfieldrelasis3);    
      if($exvalfieldrelasis3[1]!="PK"){    
      ?>
      <option value="<?php echo $valfieldrelasis3; ?>"><?php echo $valfieldrelasis3; ?></option>
      <?php }}} ?>
      </select>
      <?php } ?>    
    </td>
       <td>
        <select multiple name="validationupdate[<?php echo $valfieldutamas; ?>][]" class="form-control">
        <option value="required" selected>required</option>
        <!--<option value="min_length">min_length</option>-->
        <!--<option value="max_length">max_length</option>-->
        <!--<option value="exact_length">exact_length</option>-->
        <!--<option value="greater_than">greater_than</option>-->
        <!--<option value="matches">matches</option>-->
        <!--<option value="is_unique">is_unique</option>-->
        <!--<option value="less_than">less_than</option>-->
        <option value="alpha">alpha</option>
        <option value="alpha_numeric">alpha_numeric</option>
        <option value="alpha_dash">alpha_dash</option>
        <option value="numeric">numeric</option>
        <option value="integer">integer</option>
        <option value="decimal">decimal</option>
        <option value="is_natural">is_natural</option>
        <option value="is_natural_no_zero">is_natural_no_zero</option>
        <option value="valid_email">valid_email</option>
        <!--<option value="valid_emails">valid_emails</option>-->
        <option value="valid_ip">valid_ip</option>
        <option value="xss_clean">xss_clean</option>
        </select>
    </td>
  </tr>
<?php }} ?>
<?php
 foreach ($fieldrelasi as $keyfieldrelasi => $valfieldrelasi) {
        foreach ($valfieldrelasi as $valfieldrelasis) {
        $exvalfieldrelasi = explode("-", $valfieldrelasi[0]);    
?>
  <tr>
    <td width="10px"><input type="checkbox" name="view[<?php  echo $keyfieldrelasi.'-'.$exvalfieldrelasi[0]; ?>][]" value="<?php  echo $valfieldrelasis; ?>"></td>
    <td><?php  echo $valfieldrelasis; ?></td>
  </tr>
<?php   
        }
    }
?>  

</tbody>
<tfoot>
     
</tfoot>
</table>
<button type="submit" class="btn btn-primary">Create Your CRUD</button>    
</form>    