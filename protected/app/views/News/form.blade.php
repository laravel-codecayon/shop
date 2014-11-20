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
{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/jquery.tinymce.js')}}
{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js')}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('News?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'News/save/'.SiteHelpers::encryptID($row['news_id']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> News</legend>
									
									  {{ Form::hidden('news_id', $row['news_id'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									  {{ Form::hidden('news_picture', $row['news_picture'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 

								  <div class="form-group  " >
									<label for="News Name" class=" control-label col-md-4 text-left"> Name </label>
									<div class="col-md-6">
									  {{ Form::text('news_name', $row['news_name'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="Picture" class=" control-label col-md-4 text-left"> {{ Lang::get('core.product_image') }} </label>
									<div class="col-md-6">
									  <input id="upload" name="file" type="file" />
									  	<div id="result">
											@if($row['news_picture'] != "")
												<img width="150px" src="/uploads/news/thumb/{{$row['news_picture']}}">
											@endif
										</div>
									 </div> 
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="News Description" class=" control-label col-md-4 text-left"> Description </label>
									<div class="col-md-6">
									  <textarea name='news_description' rows='2' id='news_description' class='form-control '  
				           >{{ $row['news_description'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="News Content" class=" control-label col-md-4 text-left"> Content </label>
									<div class="col-md-6">
									  <textarea name='news_content' rows='2' id='news_content' class='mceEditor form-control'
				           >{{ $row['news_content'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Status" class=" control-label col-md-4 text-left"> Status </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='news_status' value ='0' required @if($row['news_status'] == '0' || $row['news_status'] == '') checked="checked" @endif > Disable </label>
										<label class='checked'>
										<input type='radio' name='news_status' value ='1' required @if($row['news_status'] == '1') checked="checked" @endif > Enable </label> 
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
				<button type="button" onclick="location.href='{{ URL::to('News?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>	
</div>			 
   <script type="text/javascript">
	$(document).ready(function() { 
		 $(function(){
		tinymce.init({	
			mode : "specific_textareas",
			editor_selector : "mceEditor",
			 plugins : "openmanager",
			 file_browser_callback: "openmanager",
			 open_manager_upload_path: '../../../../../../../../uploads/images/',
		 });
	});
	});
	</script>		 