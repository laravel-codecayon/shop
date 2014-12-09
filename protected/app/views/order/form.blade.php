
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
						<fieldset><legend> Order</legend>
									
								  <div class="form-group  " >
									<label for="OrderID" class=" control-label col-md-4 text-left"> OrderID </label>
									<div class="col-md-6">
									  {{ Form::text('OrderID', $row['OrderID'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="CustomerID" class=" control-label col-md-4 text-left"> CustomerID </label>
									<div class="col-md-6">
									  {{ Form::text('CustomerID', $row['CustomerID'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="EmployeeID" class=" control-label col-md-4 text-left"> EmployeeID </label>
									<div class="col-md-6">
									  {{ Form::text('EmployeeID', $row['EmployeeID'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="OrderDate" class=" control-label col-md-4 text-left"> OrderDate </label>
									<div class="col-md-6">
									  
				{{ Form::text('OrderDate', $row['OrderDate'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="RequiredDate" class=" control-label col-md-4 text-left"> RequiredDate </label>
									<div class="col-md-6">
									  
				{{ Form::text('RequiredDate', $row['RequiredDate'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShippedDate" class=" control-label col-md-4 text-left"> ShippedDate </label>
									<div class="col-md-6">
									  
				{{ Form::text('ShippedDate', $row['ShippedDate'],array('class'=>'form-control datetime', 'style'=>'width:150px !important;')) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipVia" class=" control-label col-md-4 text-left"> ShipVia </label>
									<div class="col-md-6">
									  {{ Form::text('ShipVia', $row['ShipVia'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Freight" class=" control-label col-md-4 text-left"> Freight </label>
									<div class="col-md-6">
									  {{ Form::text('Freight', $row['Freight'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipName" class=" control-label col-md-4 text-left"> ShipName </label>
									<div class="col-md-6">
									  {{ Form::text('ShipName', $row['ShipName'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipAddress" class=" control-label col-md-4 text-left"> ShipAddress </label>
									<div class="col-md-6">
									  {{ Form::text('ShipAddress', $row['ShipAddress'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipCity" class=" control-label col-md-4 text-left"> ShipCity </label>
									<div class="col-md-6">
									  {{ Form::text('ShipCity', $row['ShipCity'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipRegion" class=" control-label col-md-4 text-left"> ShipRegion </label>
									<div class="col-md-6">
									  {{ Form::text('ShipRegion', $row['ShipRegion'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipPostalCode" class=" control-label col-md-4 text-left"> ShipPostalCode </label>
									<div class="col-md-6">
									  {{ Form::text('ShipPostalCode', $row['ShipPostalCode'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ShipCountry" class=" control-label col-md-4 text-left"> ShipCountry </label>
									<div class="col-md-6">
									  {{ Form::text('ShipCountry', $row['ShipCountry'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
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
		 
	});
	</script>		 