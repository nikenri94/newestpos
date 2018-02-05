@extends('include.include')
@section('content')
	<body>
		<div class="container">
			<section class="panel">
				<div class="panel panel-footer">
				<header class="panel panel-default">
					<h3>Sale to ..</h3>
					
				</header>
					
				</div>
				<div class="
				panel panel-footer">
				{!!Form::open(array('route'=>'insert','id'=>'frmsave','method'=>'post'))!!}
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" class="form-control" name="fn" placeholder="first name">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<input type="text" class="form-control" name="ln" placeholder="last name">
							</div> 
						</div><!-- col -->
						<div class="col-lg-2">
							<div class="form-group">
								<select class="form-control sex" name="sex">
									<option class="0" disabled="true" selected="true">----Gender----</option>
									<option class="1">Male</option>
									<option class="1">Female</option>
								</select>	
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<input type="text" class="form-control" name="email" placeholder="email">
							</div> 
						</div><!-- col -->
						<div class="col-lg-3">
							<div class="form-group">
								<input type="text" class="form-control" name="phone" placeholder="phone">
							</div> 
						</div><!-- col -->
						<div class="col-lg-3">
							<div class="form-group">
								<input type="text" class="form-control" name="location" placeholder="location">
							</div> 
						</div><!-- col -->
						<div class="col-lg-2 col-sm-2">
							<div class="form-group">
								{!!Form::submit('Save',array('class'=>'btn btn-primary'))!!}
							</div>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="form-group">
								<table class="table table-bordered">
									<thead>
										<th>Product name</th>
										<th>Stock</th>
										<th>Qty</th>
										<th>Satuan</th>
										<th>id</th>
										<th>konversi</th>
										<th>tot_qty</th>
										<th>Price</th>
										<th>Disc</th>
										<th>Amount</th>
										<th style="text-align: center;background: #eee"><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
									</thead>	
									<tbody>
										<tr>
											<td>
												<select class="form-control productname" name="productname[]" id="productname">
												<option value="0" selected="true" disabled="true">Select Product</option>
												@foreach($product_lists as $key => $p)
												<option value="{!!$key!!}">{!!$p!!}</option>
												@endforeach
												</select>			
											</td>
											<td><input type="text" name="stock[]" class="form-control stock"></td>
											<td><input type="text" name="qty[]" class="form-control qty"></td>
											<td>
												<select class="form-control satuan" name="satuan[]" id="satuan">
													<option value="0" selected="true" disabled="true">Select Product</option>
												</select>	
											</td>
											<td><input type="text" name="idsatuan[]" class="form-control idsatuan"></td>
											<td><input type="text" name="konversi[]" class="form-control konversi"></td>
											<td><input type="text" name="tot_qty[]" class="form-control tot_qty"></td>
											<td><input type="text" name="price[]" class="form-control price"></td>
											<td><input type="text" name="dis[]" class="form-control dis"></td>
											<td><input type="text" name="amount[]" class="form-control amount" readonly="true"></td>
											<td><a href="#" class="btn btn-danger btn-sm remove remove"><i class="glyphicon glyphicon-remove"></i></a></td>
										</tr>
									</tbody>
									<tfoot>
										<tr>
											<td style="border:none;"></td>
											<td style="border:none;"></td>
											<td style="border:none;"></td>
											<td><b>Total</b></td>
											<td><b class="total"></b></td>
											<td></td>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div> <!-- row -->
				{!!Form::hidden('_token',csrf_token())!!}
				{!!Form::close()!!}
				</div>
			</section>
		</div>
	</body>
	<script type="text/javascript">
	$('tbody').delegate('.productname','change',function(){
		var tr = $(this).parent().parent();
		var id = tr.find('.productname').val();
		var dataId = {'id' :id};
		$.ajax({
			type	: 'GET',
			url		: '{!!URL::route('findPrice')!!}',
			dataType: 'json',
			data    : dataId,
			success :function(data){
				tr.find('.price').val(data.price);
				tr.find('.stock').val(data.qty);
					//ajax2
					$.ajax({
					type	: 'GET',
					url		: '{!!URL::route('findSatuan')!!}',
					dataType: 'json',
					data    : dataId,
					success :function(data){
						var $satuan = $(".satuan");
						//$satuan.remove(($("<option></option>")));
						$satuan.empty();
						$.each(data, function(value, key) {
		                $satuan.append($("<option></option>").attr("value", value.id).text(key.name_unit)); 
		                $satuan.select(); //reload the list and select the first option
		                //console.log('value', key);
		            	});
					}
				});
			}
		});
	}).trigger('change');

	$('tbody').delegate('.satuan','change',function(){
		var tr = $(this).parent().parent();
		var satuan = tr.find('.satuan').val();
		var dataSatuan = {'satuan' : "satuan"};
		var id = tr.find('.productname').val();
		var dataId = {'id' :id};
		
		//var satuan = tr.find(".satuan option:selected").text();
		//var dataIdsatuan = {'name_unit':satuan};
		
		console.log('satuan', dataSatuan);

		$.ajax({
			type	: 'GET',
			url		: '{!!URL::route('findConvertion')!!}',
			dataType: 'json',
			data    : dataSatuan,
			success :function(data){
				//tr.find('.idsatuan').val(data.id);
				//tr.find('.konversi').val(data.conversi);
				console.log('json',data);
			}
		});
	});

	$('tbody').delegate('.productname','change',function(){
		var tr=$(this).parent().parent();
		tr.find('.qty').focus();
	});
	$('tbody').delegate('.qty,.price,.dis','keyup',function(){
		var tr =$(this).parent().parent();
		var qty = tr.find('.qty').val();
		var price = tr.find('.price').val();
		var dis = tr.find('.dis').val();
		var amount = (qty*price)-(qty*price*dis)/100;
		tr.find('.amount').val(amount);
		total();
	});
	$('.addRow').on('click',function(){
		addRow();
	});

	findRowNumOnly('.qty');
	findRowNum('price');
	findRowNumOnly('.dis');
	numberOnly('.phone');

	function total(){
		var total = 0;
		$('.amount').each(function(i,e){
			var amount = $(this).val()-0;
			total += amount;
		})
		$('.total').html("Rp. " + total);
	};

	//---------format number-----------//
	/*Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator){
		var n = this,
		decPlaces = isNan(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
		decSeparator = decSeparator == undefined ? "." : decSeparator,
		thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
		sign = n < 0 ? "-" : "",
		i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
		j = (j = i.length) > 3 ? j % 3 : 0;
		return sign + (j ? i.substr(0,j) + thouSeparator : "") +i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
	};*/
	//---------format number-----------//

	function addRow	(){
		var tr = '<tr>'+
					'<td>'+
					'<select class="form-control productname" name="productname[]" id="productname">'+
					'<option value="0" selected="true" disabled="true">Select Product</option>'+
					'@foreach($product_lists as $key => $p)'+
					'<option value="{!!$key!!}">{!!$p!!}</option>'+
					'@endforeach'+
					'</select>'+
					'</td>'+
					'<td><input type="text" name="stock[]" class="form-control stock"></td>'+
					'<td><input type="text" name="qty[]" class="form-control qty"></td>'+
					'<td><input type="text" name="satuan[]" class="form-control satuan"></td>'+
					'<td><input type="text" name="price[]" class="form-control price"></td>'+
					'<td><input type="text" name="dis[]" class="form-control dis"></td>'+
					'<td><input type="text" name="amount[]" class="form-control amount" readonly="true"></td>'+
					'<td><a href="#" class="btn btn-danger btn-sm remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
					'</tr>';
		$('tbody').append(tr);
	};
	function findRowNum(input){
		$('tbody').delegate(input,'keydown',function(){
			var tr =$(this).parent().parent();
			number(tr.find(input));
		});
	};
	function findRowNumOnly(input){
		$('tbody').delegate(input,'keydown',function(){
			var tr =$(this).parent().parent();
			numberOnly(tr.find(input));
		});
	};

	$('body').on('click', '.remove' ,function(){
		var l=$('tbody tr').length;
		if (l==1)
		{
			alert('gaboleh di hapus');
		}else{
			$(this).parent().parent().remove();
			total();
		}
			
	});
	function number(input){
		$(input).keypress(function(evt){
			var theEvent = evt || window.event;
			var key = theEvent.keyCode || theEvent.which;
			key = String.fromCharCode(key);
			var regex = /[-\d\.]/;
			var objRegex = /^-?\d*[\.]?\d*$/;
			var val = $(evt.target).val();
			if(!regex.test(key) || !objRegex.test(val+key) || !theEvent.keyCode == 46 || !theEvent.keyCode == 8){
				if(theEvent.preventDefault) theEvent.preventDefault();
			};
		});
	};
	function numberOnly(input){
		$(input).keypress (function (evt){
			var e = event || evt;
			var charCode = e.which || e.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
				return false;
			return true;
		});
	};
	</script> 
@stop