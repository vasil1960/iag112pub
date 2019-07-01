<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>ИАГ 112</title>
	<!-- bootstrap Lib -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<!-- datatable Lib -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>

	<div class="title text-center mt-3">
		<h4>Изпълнителна агенция по горите</h4>
	</div>

	<div class="container text-center my-5">
		<h1>Център 112</h1> 
		<h6 class="mt-5">Подадени сигнали за извършени нарушения чрез републикански телефон номер 112 към Изпълнителна агенция по горите</h6> 
	</div>
		
	<div class="container pb-5">
			
		<table width="99%" class="table list_table table-responsive table-striped table-sm table-bordered" id="tblSignali">
			<thead class="thead-light">
				<tr>
					<th width="5%">ID:</th>
					<!--<th width="80">Тел.</th>-->

					<!--<th width="100">РДГ</th>-->
					<th width="5">Дата:</th>
					<!--<th width="100">Подател</th>-->
					<th width="40%">Описание на сигнала:</th>
					<th width="5%">В обхват на:</th>
					<th width="5%">Предаден на:</th>
					<th width="40%">Резултати от проверката:</th>
					<!--<th width="5%">Про- верен</th>-->
					<!--<th width="16"></th>-->
					<!--<th width="20"></th>-->
					<!--<th width="20"></th>-->
				</tr>
			</thead>
				</tbody>


				</tbody>

		</table>
	</div class="">
		
		<script type="text/javascript" language="javascript">

	$(document).ready(function() {
		
		//-------------------------------------------------------
		$('#tblSignali').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax": "../core/fetch.php",
			"order": [[ 0, "desc" ]],
			//"scrollX" : "100%",
	//		"scrollY" : 600,	
			"pageLength": 25,
			"language":{
				"url":"../core/BulgarianDataTables.json",
	//			"sProcessing" : "<img src='/images/loading_bar.gif'>"
			},
			"columnDefs": [
				//---- ---------------
				{
					targets:[0],
					visible:false,
	//				render:function(data, type,row,meta)
	//				{
	//					return "<a class='btn btn-default' href='view_signal.php?view="+row[0]+"'>"+row[0]+"</a>";
	//				}
				},
				{
					targets:[6],
					visible:false,
					render:function(data, type,row,meta)
					{
	//					return "<a class='btn btn-default' href='view_signal.php?view="+row[0]+"'>"+row[0]+"</a>";
	//				  data[5] == 1?'Проверен':'Непроверен' ;
						return row[6]==1?'Да':'Не' ;
					}
				},
				//{
	//				targets:[1],
	//				sortable:false,
	//			},
	//			{
	//				targets:[6],
	//				sortable:false,
	//			},
	//			{
	//				targets:[7,8,9],
	//				visible:false,
	//			},
	//			{
	//				targets: [10],
	//				visible: true,
	//				searchable:false,
	//				sortable:false,
	//				render:function(data, type, row, meta)
	//				{
	//					if(access112() == 3)
	//					{
	//						return "<a class='btn btn-default' href='edit_signal.php?edit="+row[0]+"'><i class='glyphicon glyphicon-pencil'></i></a>";
	//					}
	//					
	//					if(access112() == 2)
	//					{
	//						if(row[7] == 1)
	//						{
	//							return "<a class='btn btn-default' href='edit_otchet_signal.php?edit_otchet="+row[0]+"'><i class='glyphicon glyphicon-pencil'></i></a>"
	//						} else {
	//							return "<a class='btn btn-default' href='otchet_signal.php?otchet="+row[0]+"'><i class='glyphicon glyphicon-list-alt'></i></a>"
	//						}
	//					}
	//					
	//					return "";
	//				}
	//			},			
			],   
			
			"createdRow": function( row, data, dataIndex ) {
				console.log(data);
				
				data[6] == 1?$(row).addClass( 'alert alert-success  table-success' ):$(row).addClass( 'alert alert-primary' );
	//			if ( data[5] == 1 ) {
	//			  $(row).addClass( 'alert alert-success font-weight-bold' )
	//			} else {
	//			  $(row).addClass( 'alert alert-primary' )
	//			}
			}
		});	
		
		//----------------------------------------
		// 	
	//	function access112(){
	//		return $("#hidden1").val();
	//	}
		
	});
		
	</script>

		
	</body>
</html>