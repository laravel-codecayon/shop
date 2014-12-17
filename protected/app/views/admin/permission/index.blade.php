
<div class="page-content row">
    <!-- Page header -->
    <div class="page-header ">
      <div class="page-title">
        <h3> {{ Lang::get('core.t_module') }} <small>{{ Lang::get('core.t_modulesmall') }}</small></h3>
      </div>
    </div>
	<div class="page-content-wrapper">
	<div class="ribon-sximo">
	</div>
	


	


		
	@if(Session::has('message'))
		   {{ Session::get('message') }}
	@endif	
	      <div class="white-bg p-sm m-b unziped" style=" border:solid 1px #ddd; display:none;">
		   {{ Form::open(array('url'=>'module/install/', 'class'=>'breadcrumb-search','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
			<h3>Select File ( Module zip installer ) </h3>
            <p>  <input type="file" name="installer" required style="float:left;">  <button type="submit" class="btn btn-primary btn-xs" style="float:left;"  ><i class="icon-upload"></i> Install</button></p>
            </form>
			<div class="clr"></div>
          </div>
		  	
	
	 {{ Form::open(array('url'=>'module/package#', 'class'=>'form-horizontal' ,'ID' =>'SximoTable' )) }}
	<div class="table-responsive ibox-content" style="min-height:400px;">
	@if(count($rowData) >=1) 
		<table class="table table-striped ">
			<thead>
			<tr>
				<th>{{ Lang::get('core.btn_action') }}</th>					
				<!--<th><input type="checkbox" class="checkall" /></th>-->
				<th>{{ Lang::get('core.btn_module') }}</th>
				<th>{{ Lang::get('core.btn_controller') }}</th>
				<th>{{ Lang::get('core.btn_database') }}</th>
		
			</tr>
			</thead>
        <tbody>
		@foreach ($rowData as $row)
			<tr>		
				<td>
				<div class="btn-group">
				<button class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
				<I class="icon-cogs"></I> <span class="caret"></span>
				</button>
					<ul style="display: none;" class="dropdown-menu icons-right">
						<li><a href="{{ URL::to($row->module_name)}}"><i class="icon-grid"></i> {{ Lang::get('core.btn_view') }} Module </a></li>
						<li><a href="{{ URL::to($module.'/config/'.$row->module_name)}}"><i class="icon-pencil3"></i> {{ Lang::get('core.btn_edit') }}</a></li>
					</ul>
				</div>					
				</td>
				<!--<td>-->
				 @if($type !='core')
				<!--<input type="checkbox" class="ids" name="id[]" value="{{ $row->module_id }}" /> @endif</td>-->
				<td>{{ $row->module_title }} </td>
				<td>{{ $row->module_name }} </td>
				<td>{{ $row->module_db }} </td>
			</tr>
		@endforeach	
	</tbody>		
	</table>
	
	@else
		
		<p class="text-center" style="padding:50px 0;">{{ Lang::get('core.norecord') }} 
		<br /><br />
		<a href="{{ URL::to('module/add')}}" class="btn btn-default "><i class="icon-plus-circle2"></i> New module </a>
		 </p>	
	@endif
	</div>	
	{{ Form::close() }}
	</div>	

</div>	  
	  
  <script language='javascript' >
  jQuery(document).ready(function($){
    $('.post_url').click(function(e){
      e.preventDefault();
      if( ( $('.ids',$('#SximoTable')).is(':checked') )==false ){
        alert( $(this).attr('data-title') + " not selected");
        return false;
      }
      $('#SximoTable').attr({'action' : $(this).attr('href') }).submit();
    })
  })
  </script>	  
