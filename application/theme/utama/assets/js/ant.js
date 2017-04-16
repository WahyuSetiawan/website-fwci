//Menu
$(document).ready(function() {

// Store variables

var accordion_head = $('.accordion > li > a'),
        accordion_body = $('.accordion li > .sub-menu');

// Open the first tab on load

accordion_head.first().addClass('active').next().slideDown('normal');

// Click function

accordion_head.on('click', function(event) {

        // Disable header links

        event.preventDefault();

        // Show and hide the tabs on click

        if ($(this).attr('class') !== 'active'){
                accordion_body.slideUp('normal');
                $(this).next().stop(true,true).slideToggle('normal');
                accordion_head.removeClass('active');
                $(this).addClass('active');
        }

});

});


// CheckBox
$(function () {
    $("#checkAll").click(function () {
        if ($("#checkAll").is(':checked')) {
            $(".chk").prop("checked", true);
        } else {
           $(".chk").prop("checked", false);
        }
    });
});  

//action
function del(){
 id_array=new Array();
 i=0;
$("input.chk:checked").each(function(){
	            id_array[i]=$(this).val();
	            i++;
});
if(id_array < 1){
alertify.alert("Anda Belum Memilih");  
}else{
alertify.confirm("Apakah Anda Yakin Akan Menghapus Data ini !", function (e) {
    if (e) {
        var form_url = $("#formcrud").attr("action");
        $("#formcrud").attr("action",form_url+"delete"); 
        $('#formcrud').submit();
    } else {
        // user clicked "cancel"
    }
});
}
}

function upd(){
 id_array=new Array();
 i=0;
$("input.chk:checked").each(function(){
	            id_array[i]=$(this).val();
	            i++;
});
if(i === 0 ){
alertify.alert("Anda Belum Memilih");
}else if(i >= 2 ){
alertify.alert("Update Data Tidak Boleh Lebih dari 1");
}else{
    
var form_url = $("#formcrud").attr("action");
  $("#formcrud").attr("action",form_url+"update");
  
  $('#formcrud').submit();
}
}


function setting(){
 id_array=new Array();
 i=0;
$("input.chk:checked").each(function(){
	            id_array[i]=$(this).val();
	            i++;
});
if(i === 0 ){
alertify.alert("Anda Belum Memilih");
}else if(i >= 2 ){
alertify.alert("Update Data Tidak Boleh Lebih dari 1");
}else{
    
var form_url = $("#formcrud").attr("action");
  $("#formcrud").attr("action",form_url+"setting");
  
  $('#formcrud').submit();
}
}

function save(){
$('#validate').submit();
}