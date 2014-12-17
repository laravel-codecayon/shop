{{--*/ usort($tableGrid, "SiteHelpers::_sort") /*--}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
	  
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
        <li class="active">{{ $pageTitle }}</li>
      </ul>	  
 	
	</div>
	
	<div class="page-content-wrapper">
    <div class="toolbar-line">
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('users/add') }}" class="tips btn btn-xs btn-primary"  title="{{ Lang::get('core.btn_create') }}">
			<i class="icon-plus-circle2"></i>&nbsp; {{ Lang::get('core.btn_create') }}</a>
			@endif  
			@if($access['is_remove'] ==1)
			<a href="javascript://ajax"  onclick="SximoDelete();" class="tips btn btn-xs btn-danger" title="{{ Lang::get('core.btn_remove') }}">
			<i class="icon-bubble-trash"></i>&nbsp; {{ Lang::get('core.btn_remove') }}</a>
			@endif 		
			@if($access['is_excel'] ==1 && 1==2)
			<a href="{{ URL::to('users/download') }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_download') }}">
			<i class="icon-folder-download2"></i>&nbsp;{{ Lang::get('core.btn_download') }} </a>
			@endif		
		 	@if(Session::get('gid') ==1 && 1==2)
			<a href="{{ URL::to('module/config/users') }}" class="tips btn btn-xs btn-default"  title="{{ Lang::get('core.btn_config') }}">
			<i class="icon-cog"></i>&nbsp; {{ Lang::get('core.btn_config') }}</a>
			@endif  	  
	</div>  	  
	  
   
	
	
	
	
	<ul class="nav nav-tabs" style="margin-bottom:10px;">
	  <li class="active"><a href="#"> {{Lang::get('core.user')}} </a></li>
	  <li ><a href="{{ URL::to('groups')}}">{{Lang::get('core.group')}}</a></li>
	</ul>	
		
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	

	
	 {{ Form::open(array('url'=>'users/destroy/', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	 <div class="table-responsive">
    <table class="table table-striped  ">
        <thead>
			<tr>
				<th> {{ Lang::get('core.table_no') }}  </th>
				<th> <input type="checkbox" class="checkall" /></th>
				@foreach ($test as $t)
						<th>{{ $t['label'] }}</th>
				@endforeach
				<th>{{ Lang::get('core.btn_action') }}</th>
			  </tr>
        </thead>

        <tbody>
			<tr id="sximo-quick-search" >
				@if($access['is_detail'] ==1)<td> </td>@endif
				<td> </td>
				@foreach ($test as $t)
					<td>						
						{{ SiteHelpers::transFormsearch($t) }}								
					</td>
				@endforeach
				<td style="width:100px;">
				<input type="hidden"  value="Search">
				<button type="button"  class=" do-quick-search btn btn-sx btn-info"> GO</button></td>
			  </tr>			
            @foreach ($rowData as $row)
                <tr>
					<td width="50"> {{ ++$i }} </td>
					<td width="50"><input type="checkbox" class="ids" name="id[]" value="{{ $row->id }}" />  </td>								
				 @foreach ($test as $field)
					 <td>					 
					 	{{ SiteHelpers::transSelect($field,$row) }}
					 </td>
				 @endforeach
				 <td>
				
					{{--*/ $id = SiteHelpers::encryptID($row->id) /*--}}
				 	@if($access['is_detail'] ==1)
					<a href="{{ URL::to('users/show/'.$id)}}"  class="tips btn btn-xs btn-primary"  title="{{ Lang::get('core.btn_view') }}"><i class="fa  fa-search"></i> </a>
					@endif
					@if($access['is_edit'] ==1)
					<a  href="{{ URL::to('users/add/'.$id)}}"  class="tips btn btn-xs btn-success"  title="{{ Lang::get('core.btn_edit') }}"> <i class="fa  fa-search"></i></a>
					@endif
						
					
				</td>				 
                </tr>
					@include('users.inlineview')
            @endforeach
              
        </tbody>
      
    </table>
	</div>
	@include('footer_new')
	{{ Form::close() }}
	
	
	
	
	
	</div>	
</div>	
<script>
$(document).ready(function(){

	$('.do-quick-search').click(function(){
		$('#SximoTable').attr('action','{{ URL::to("users/multisearch")}}');
		$('#SximoTable').submit();
	});

	$("#filter_footer").click(function(){
		$('#SximoTable').attr('action','{{ URL::to("users/multisearch")}}');
		$('#SximoTable').submit();
	});
	
});	
</script>	  