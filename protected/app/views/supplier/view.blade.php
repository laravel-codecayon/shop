<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('supplier?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('supplier?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('supplier/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>SupplierID</td>
						<td>{{ $row->SupplierID }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>CompanyName</td>
						<td>{{ $row->CompanyName }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ContactName</td>
						<td>{{ $row->ContactName }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>ContactTitle</td>
						<td>{{ $row->ContactTitle }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address</td>
						<td>{{ $row->Address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>City</td>
						<td>{{ $row->City }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Region</td>
						<td>{{ $row->Region }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>PostalCode</td>
						<td>{{ $row->PostalCode }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Country</td>
						<td>{{ $row->Country }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Phone</td>
						<td>{{ $row->Phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Fax</td>
						<td>{{ $row->Fax }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>HomePage</td>
						<td>{{ $row->HomePage }} </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  