<script type="text/javascript">
      $(function(){
        $('#example').dataTable( {

//        "oLanguage": {
//          "sLengthMenu": "Display _MENU_ records per page",
//          "sZeroRecords": "Nothing found - sorry",
//          "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
//          "sInfoEmpty": "Showing 0 to 0 of 0 records",
//          "sInfoFiltered": "(filtered from _MAX_ total records)"
//        },

//        "bProcessing": true,
        "bServerSide": true,
        "sPaginationType": "bs_four_button",
//        "sScrollY": 373,
//        "sScrollX": "100%",
//        "sScrollXInner": "100%",
        //"bFilter": false,
//        "bInfo": false,
        "sAjaxSource": "<?php echo site_url('usergroup/get_data'); ?>",
        "aoColumns": [  
          { "sWidth": "7%","sClass": "left","bSortable": false },
          { "sClass": "left" }
               
        ],
        "aaSorting": [[1, 'asc']],

        //checbox
        "aoColumnDefs":[ { 
                       "aTargets": [0],
                       "fnRender": function ( oObj ) {
       return '<input class="chk" type="checkbox" name="chk[]" value="'+ oObj.aData[0] +'"/>';
                                                     }
                                                  }
                                                 ]

        });
        
        $('#example').each(function(){
                                    var datatable = $(this);
                                    // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                                    var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                                    search_input.attr('placeholder', 'All Keyword');
                                    search_input.addClass('form-control');
                                    // LENGTH - Inline-Form control
                                    var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                                    length_sel.addClass('form-control');
                            });
        $('#example').dataTable()

            .columnFilter({aoColumns:[
                       null,
                      { sSelector: "#userGroup" }
                    ]}
            ); 
        }); 
</script>

 <div class="panel-heading action">
    <span><i class="icon-fixed-width icon-group"></i> User Group</span>  
    <a href="<?php echo site_url(); ?>usergroup/add"><i class="icon-fixed-width icon-file-alt icon-2x"></i></a>
                
    <a href="javascript: upd();"><i class="icon-fixed-width  icon-edit icon-2x"></i></a>

    <a href="javascript: del();"><i class="icon-fixed-width icon-trash icon-2x"></i></a>

  </div>
<div class="panel-body">
<form name="formcrud" method="post" action="<?php echo site_url(); ?>usergroup/" id="formcrud">
<table class="table table-striped table-bordered table-hover" id="example">
    
	<thead>
		<tr>
                    
			<th>#</th>
                        <th id="userGroup">User Group</th>
		</tr>
                <tr>
			<th><input type="checkbox" name="chkAll" id="checkAll" /></th>
                        <th>User Group</th>
		</tr>
	</thead>
	<tfoot>
		<tr>

			<th>#</th>
                        <th>User Group</th>
		</tr>
	</tfoot>
	<tbody>
                <tr>
                    <td class="dataTables_empty" colspan="3">Loading data from server</td>
                </tr>
        </tbody>
</table> 
</form>
 </div>    