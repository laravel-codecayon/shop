<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('order?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('order?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('order/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>OrderID</td>
						<td>{{ $row->OrderID }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>CustomerID</td>
						<td>{{ $row->CustomerID }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>EmployeeID</td>
						<td>{{ $row->EmployeeID }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>OrderDate</td>
						<td>{{ $row->OrderDate }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>RequiredDate</td>
						<td>{{ $row->RequiredDate }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShippedDate</td>
						<td>{{ $row->ShippedDate }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipVia</td>
						<td>{{ $row->ShipVia }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Freight</td>
						<td>{{ $row->Freight }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipName</td>
						<td>{{ $row->ShipName }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipAddress</td>
						<td>{{ $row->ShipAddress }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipCity</td>
						<td>{{ $row->ShipCity }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipRegion</td>
						<td>{{ $row->ShipRegion }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipPostalCode</td>
						<td>{{ $row->ShipPostalCode }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ShipCountry</td>
						<td>{{ $row->ShipCountry }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  