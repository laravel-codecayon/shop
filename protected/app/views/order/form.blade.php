
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('order?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
        <li class="active">{{ Lang::get('core.addedit') }} </li>
      </ul>
	  	  
    </div>
 
 	<div class="page-content-wrapper">
	<div class="panel-default panel">
		<div class="panel-body">
		@if(Session::has('message'))	  
			   {{ Session::get('message') }}
		@endif	
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		 {{ Form::open(array('url'=>'order/save/'.SiteHelpers::encryptID($row['OrderID']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> {{ Lang::get('core.order') }} ({{$row['OrderID']}})</legend>


									  {{ Form::hidden('OrderID', $row['OrderID'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 

								  <div class="form-group  " >
									<label for="CustomerID" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_customer') }} </label>
									<div class="col-md-6">
									  {{ Form::text('name', $row['name'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="EmployeeID" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_address') }} </label>
									<div class="col-md-6">
									  {{ Form::text('address', $row['address'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="OrderDate" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_city') }} </label>
									<div class="col-md-6">
									  
				<select name='provinceid' rows='5' id='city' code='{$provinceid}' 
							class='select2 '    ></select>
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="RequiredDate" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_district') }} </label>
									<div class="col-md-6">
									  
				<select name='districtid' rows='5' id='district' code='{$districtid}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShippedDate" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_ward') }} </label>
									<div class="col-md-6">
									  
				<select name='wardid' rows='5' id='ward' code='{$wardid}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipVia" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_email') }} </label>
									<div class="col-md-6">
									  {{ Form::text('email', $row['email'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Freight" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_phone') }} </label>
									<div class="col-md-6">
									  {{ Form::text('phone', $row['phone'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipName" class=" control-label col-md-4 text-left"> {{ Lang::get('core.sex') }} </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='sex' value ='0' required @if($row['sex'] == '0' || $row['sex'] == '') checked="checked" @endif > {{ Lang::get('core.woman') }} </label>
										<label class='checked'>
										<input type='radio' name='sex' value ='1' required @if($row['sex'] == '1') checked="checked" @endif > {{ Lang::get('core.man') }} </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipAddress" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_note') }} </label>
									<div class="col-md-6">
									  {{ Form::textarea('content', $row['content'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipCity" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_status') }} </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='status' value ='0' required @if($row['status'] == '0' || $row['status'] == '') checked="checked" @endif > {{ Lang::get('core.order_new') }} </label>
										<label class='checked'>
										<input type='radio' name='status' value ='1' required @if($row['status'] == '1') checked="checked" @endif > {{ Lang::get('core.order_wait') }} </label> 
										<label class='checked'>
										<input type='radio' name='status' value ='2' required @if($row['status'] == '2') checked="checked" @endif > {{ Lang::get('core.order_finish') }} </label> 
										<label class='checked'>
										<input type='radio' name='status' value ='3' required @if($row['status'] == '3') checked="checked" @endif > {{ Lang::get('core.order_des') }} </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  @if(count($items) > 0)
								   <div class="form-group  " >
									<label for="ShipCity" class=" control-label col-md-4 text-left"> {{ Lang::get('core.detail_order') }} </label>
									<div class="col-md-6">
									  <table class="table table-bordered table-striped">
								          <thead class="no-border">
								            <tr>
								              <th style="width:50%;">{{ Lang::get('core.table_name') }}</th>
								              <th>{{ Lang::get('core.table_sl') }}</th>
								              <th class="text-right">{{ Lang::get('core.table_price') }}</th>
								            </tr>
								          </thead>
								          <tbody class="no-border-y">
								          	@foreach($items as $item)
								          	{{--*/ $product = DB::table('products')->where("ProductID","=",$item->ProductID)->first(); /*--}}
								            <tr>
								              <td style="width:30%;">{{$product->ProductName}}</td>
								              <td>
								              	<input type="text" id="item_{{$item->ProductID}}" value="{{$item->Quantity}}" size="3" />
								              	<a href="javascript:" onclick="update_order({{$item->ProductID}},{{$item->OrderID}})" title="{{ Lang::get('core.update') }}"><span class="badge">U</span></a>
								              	<a href="javascript:" onclick="del_order({{$item->ProductID}},{{$item->OrderID}})" title="{{ Lang::get('core.delete') }}"><span class="badge badge-danger">D</span></a>
								              </td>
								              <td class="text-right">{{number_format(($item->UnitPrice * $item->Quantity),0,',','.') }}</td>
								            </tr>
								            @endforeach
								          </tbody>
								        </table> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  @endif
								  </fieldset>
			</div>

			<div class="col-sm-6 col-md-6">

  </div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} " />
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('order?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		 $("#city").jCombo("{{ URL::to('Nproducts/comboselect?filter=province:provinceid:name') }}",
      {  selected_value : "{{$row['provinceid']}}" });
      $("#city").on('change', function() {
        var val = this.value ;
        $("#district").jCombo("{{ URL::to('Nproducts/comboselect?filter=district:districtid:name:') }}"+val,
      {  selected_value : "{{$row['districtid']}}" });
      });
      $("#district").on('change', function() {
        var val = this.value ; 
        $("#ward").jCombo("{{ URL::to('Nproducts/comboselect?filter=ward:wardid:name:') }}"+val,
      {  selected_value : "{{$row['wardid']}}" });
      });
	});
	function update_order(id,order){
		var val = $("#item_"+id).val();
		var link = "{{ URL::to('order/updateorder?id=') }}"+id+"&qual="+val+"&order="+order;
      		$.get(link,function(data,status){
      			if(data == 2){
      				$("#item_"+id).parent().parent().remove();
      			}
  	  		});
	}
	function del_order(id,order){
		var link = "{{ URL::to('order/delorder?id=') }}"+id+"&order="+order;
      		$.get(link,function(data,status){
      			if(data == 2){
      				$("#item_"+id).parent().parent().remove();
      			}
  	  		});
	}
	</script>		 