<script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
{{ HTML::script('sximo/js/preview-image/modernizr.custom.js')}}
{{ HTML::script('sximo/js/preview-image/script.js')}}
<script id="imageTemplate" type="text/x-jquery-tmpl"> 
    <div class="imageholder">
		<figure>
			<img src="${filePath}" alt="${fileName}"/>
			<figcaption>
			</figcaption>
		</figure>
	</div>
</script>
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('Slideshow?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'Slideshow/save/'.SiteHelpers::encryptID($row['slideshow_id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> Slide shows</legend>
									
									  {{ Form::hidden('slideshow_id', $row['slideshow_id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									  {{ Form::hidden('slideshow_image', $row['slideshow_image'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
								  <div class="form-group  " >
									<label for="Slideshow Name" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_name') }} </label>
									<div class="col-md-6">
									  {{ Form::text('slideshow_name', $row['slideshow_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="Picture" class=" control-label col-md-4 text-left"> {{ Lang::get('core.product_image') }} </label>
									<div class="col-md-6">
									  <input id="upload" name="file" type="file" />
									  	<div id="result">
											@if($row['slideshow_image'] != "")
												<img width="150px" src="/uploads/slideshow/thumb/{{$row['slideshow_image']}}">
											@endif
										</div>
									 </div> 
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="Slideshow Link" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_link') }} </label>
									<div class="col-md-6">
									  {{ Form::text('slideshow_link', $row['slideshow_link'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Slideshow Status" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_status') }} </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='slideshow_status' value ='0' required @if($row['slideshow_status'] == '0' || $row['slideshow_status'] == '') checked="checked" @endif > {{ Lang::get('core.disable') }} </label>
										<label class='checked'>
										<input type='radio' name='slideshow_status' value ='1' required @if($row['slideshow_status'] == '1') checked="checked" @endif > {{ Lang::get('core.enable') }} </label> 
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
				<button type="button" onclick="location.href='{{ URL::to('Slideshow?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
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