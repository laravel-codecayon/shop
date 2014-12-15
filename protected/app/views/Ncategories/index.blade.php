{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>

      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>	  
	  
    </div>
	
	
	<div class="page-content-wrapper">
    <div class="toolbar-line ">
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('Ncategories/add?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-info"  title="{{ Lang::get('core.btn_create') }}">
			<i class="icon-plus-circle2"></i>&nbsp;{{ Lang::get('core.btn_create') }}</a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-xs btn-danger" title="{{ Lang::get('core.btn_remove') }}">
			<i class="icon-bubble-trash"></i>&nbsp;{{ Lang::get('core.btn_remove') }}</a>
			@endif 		
			@if($access['is_excel'] ==1  && 1 == 2)
			<a href="{{ URL::to('Ncategories/download?md='.$masterdetail["filtermd"]) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
			<i class="icon-folder-download2"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
			@endif		
		 	@if(Session::get('gid') ==1 && 1 == 2)
			<a href="{{ URL::to('module/config/Ncategories') }}" class="tips btn btn-xs btn-default"  title="{{ Lang::get('core.btn_config') }}">
			<i class="icon-cog"></i>&nbsp;{{ Lang::get('core.btn_config') }} </a>	
			@endif  			
	 
	</div> 	
	 
		
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	{{ $details }}
	
	 {{ Form::open(array('url'=>'Ncategories/destroy/', 'class'=>'form-horizontal' ,'id' =>'SximoTable' )) }}
	 <div class="table-responsive">
    <table class="table table-striped ">
        <thead>
			<tr>
				<th> {{ Lang::get('core.table_no') }} </th>
				<th> <input type="checkbox" class="checkall" /></th>
				
				@foreach ($test as $t)
						<th>{{ $t['label'] }}</th>
				@endforeach
				<th>{{ Lang::get('core.btn_action') }}</th>
			  </tr>
        </thead>

        <tbody>
			<tr id="sximo-quick-search" >
				<td> # </td>
				<td> </td>
				@foreach ($test as $t)
					<td>						
						{{ SiteHelpers::transFormsearch($t) }}								
					</td>
				@endforeach
				<td style="width:130px;">
				<input type="hidden"  value="Search">
				<button type="button"  class=" do-quick-search btn btn-sx btn-info"> GO</button></td>
			  </tr>				
            @foreach ($rowData as $row)
                <tr>
					<td width="50"> {{ ++$i }} </td>
					<td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->CategoryID }}" />  </td>									
				 @foreach ($test as $field)
					 <td>					 
					 	{{ SiteHelpers::transSelect($field,$row) }}
					 </td>
				 @endforeach
				 <td>
				 	
					{{--*/ $id = SiteHelpers::encryptID($row->CategoryID) /*--}}
				 	@if($access['is_detail'] ==1)
					<a href="{{ URL::to('Ncategories/show/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"  class="tips btn btn-xs btn-primary"  title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search"></i> </a>
					@endif
					@if($access['is_edit'] ==1)
					<a  href="{{ URL::to('Ncategories/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri)}}"  class="tips btn btn-xs btn-success"  title="{{ Lang::get('core.btn_edit') }}"> <i class="fa fa-edit"></i></a>
					@endif
					@foreach($subgrid as $md)
					<a href="{{ URL::to($md['module'].'?md='.$md['master'].'+'.$md['master_key'].'+'.$md['module'].'+'.$md['key'].'+'.$id) }}"  class="tips btn btn-xs btn-info"  title=" {{ $md['title'] }}">
						<i class="icon-eye2"></i></a>
					@endforeach							
					
				</td>				 
                </tr>
				
            @endforeach
              
        </tbody>
      
    </table>
	<input type="hidden" name="md" value="{{ $masterdetail['filtermd']}}" />
	</div>
	@include('footer_new')
	{{ Form::close() }}
	
	
	</div>	  
</div>	
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','{{ URL::to("Ncategories/multisearch")}}');
		$('#SximoTable').submit();
	});

	$("#filter_footer").click(function(){
		$('#SximoTable').attr('action','{{ URL::to("Ncategories/multisearch")}}');
		$('#SximoTable').submit();
	});
	
});	
</script>		