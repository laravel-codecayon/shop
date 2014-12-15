<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('Ncategories?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('Ncategories?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('Ncategories/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_id') }}</td>
						<td>{{ $row->CategoryID }} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_name') }}</td>
						<td>{{ $row->CategoryName }} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_description') }}</td>
						<td>{{ $row->Description }} </td>

					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_image') }}</td>
						<td><img src="/uploads/categories/thumb/{{ $row->Picture }}" /> </td>

					</tr>
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_status') }}</td>
						<td>@if($row->status == 1) Enable @else Disable @endif </td>
						
					</tr>
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_created') }}</td>
						<td>{{date('Y-m-d',$row->created)}}</td>
						
					</tr>
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  