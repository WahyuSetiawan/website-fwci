<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor/ckeditor.js"></script>
<textarea id="editor1" name="editor1" cols="80" id="editor1" name="editor1" rows="10">
&lt;h1&gt;Hello&lt;/h1&gt;
</textarea>
<script type="text/javascript">
//CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor1',
{
filebrowserBrowseUrl: '<?php echo base_url(); ?>assets/ckeditor/kcfinder/browse.php?type=files',
filebrowserImageBrowseUrl: '<?php echo base_url(); ?>assets/ckeditor/kcfinder/browse.php?type=images',
filebrowserFlashBrowseUrl: '<?php echo base_url(); ?>assets/ckeditor/kcfinder/browse.php?type=flash',
filebrowserUploadUrl: '<?php echo base_url(); ?>assets/ckeditor/kcfinder/upload.php?type=files',
filebrowserImageUploadUrl: '<?php echo base_url(); ?>assets/ckeditor/kcfinder/upload.php?type=images',
filebrowserFlashUploadUrl: '<?php echo base_url(); ?>assets/ckeditor/kcfinder/upload.php?type=flash'
}
);
</script>