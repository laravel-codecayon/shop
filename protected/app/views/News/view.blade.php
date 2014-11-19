<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('News?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('News?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('News/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>News Id</td>
						<td>{{ $row->news_id }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>News Name</td>
						<td>{{ $row->news_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>News Description</td>
						<td>{{ $row->news_description }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>News Content</td>
						<td>{{ $row->news_content }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>News Status</td>
						<td>@if($row->news_status == 1) Enable @else Disable @endif </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>News Picture</td>
						<td><img src="/uploads/news/thumb/{{ $row->news_picture }}" /> </td>
						
					</tr>
				
					<!--<tr>
						<td width='30%' class='label-view text-right'>Cat Id</td>
						<td>{{ $row->cat_id }} </td>
						
					</tr>-->
				
					<tr>
						<td width='30%' class='label-view text-right'>Created</td>
						<td>{{date('Y-m-d',$row->created)}}</td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  