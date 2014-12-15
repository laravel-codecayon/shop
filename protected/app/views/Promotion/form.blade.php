
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('Promotion?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'Promotion/save/'.SiteHelpers::encryptID($row['id_promotion']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> Promotion</legend>

								{{ Form::hidden('id_promotion', $row['id_promotion'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 

								  <div class="form-group  " >
									<label for="Name" class=" control-label col-md-4 text-left"> {{Lang::get('core.table_name')}} </label>
									<div class="col-md-6">
									  {{ Form::text('name', $row['name'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Status" class=" control-label col-md-4 text-left"> {{Lang::get('core.table_status')}} </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='status' value ='0' required @if($row['status'] == '0' || $row['status'] == '') checked="checked" @endif > {{Lang::get('core.disable')}} </label>
										<label class='checked'>
										<input type='radio' name='status' value ='1' required @if($row['status'] == '1') checked="checked" @endif > {{Lang::get('core.enable')}} </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="Type" class=" control-label col-md-4 text-left"> {{Lang::get('core.table_type_promotion')}} </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='type' value ='0' required @if($row['type'] == '0' || $row['type'] == '') checked="checked" @endif > % </label>
										<label class='checked'>
										<input type='radio' name='type' value ='1' required @if($row['type'] == '1') checked="checked" @endif > VND </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="Promotion" class=" control-label col-md-4 text-left"> {{Lang::get('core.table_promotion')}} </label>
									<div class="col-md-6">
									  {{ Form::text('promotion', $row['promotion'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								   </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} " />
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('Promotion?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
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