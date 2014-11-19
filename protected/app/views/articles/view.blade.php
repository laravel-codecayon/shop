<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('articles?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('articles?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('articles/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>Article Id</td>
						<td>{{ $row->article_id }} </td>
						
					</tr>

					<tr>
						<td width='30%' class='label-view text-right'>Article Image</td>
						<td><img src="/uploads/articles/thumb/{{ $row->article_image }}" /> </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Article Name</td>
						<td>{{ $row->article_name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Article Description</td>
						<td>{{ $row->article_description }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Article Content</td>
						<td>{{ $row->article_content }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Cat Id</td>
						<td>{{ SiteHelpers::transNameOfId("article_categories",$row->cat_id,"cat_id","name") }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Created</td>
						<td>{{date('Y-m-d',$row->created)}}  </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Article Status</td>
						<td>@if($row->article_status == 1) Enable @else Disable @endif  </td>
						
					</tr>
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  