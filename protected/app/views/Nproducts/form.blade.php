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

<script id="imageTemplate_multi" type="text/x-jquery-tmpl">
	<div  class="alert alert-warning fade in block-inner">
	    <button class="close" type="button" data-dismiss="alert" onclick="remove_upload('${count}')">
	        ×
	    </button>
			<figure>
				<img width="100px" src="${filePath}"/>
				<figcaption>
				</figcaption>
			</figure>
	</div>
</script>

{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/jquery.tinymce.js')}}
{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js')}}
{{ HTML::style('protected/app/views/blog/blog.css')}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('Nproducts?md='.$filtermd) }}">{{ $pageTitle }}</a></li>
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
		 {{ Form::open(array('url'=>'Nproducts/save/'.SiteHelpers::encryptID($row['ProductID']).'?md='.$filtermd.$trackUri, 'class'=>'form-horizontal','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}
				<div class="col-md-12">
						<fieldset><legend> Products</legend>
									<input type="hidden" name="action" value="{{$id}}" />
								  	<input type="hidden" name="ProductID" value="{{$row['ProductID']}}" />
								  	<input type="hidden" name="image" value="{{$row['image']}}" />
								  <div class="form-group  " >
									<label for="Picture" class=" control-label col-md-4 text-left"> {{ Lang::get('core.product_image') }} </label>
									<div class="col-md-6">
									  <input id="upload" name="file" type="file" />
									  	<div id="result">
											@if($row['image'] != "")
												<img width="150px" src="/uploads/products/thumb/{{$row['image']}}">
											@endif
										</div>
									 </div> 
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="Picture" class=" control-label col-md-4 text-left"> {{ Lang::get('core.product_image_multi') }} </label>
									<div class="col-md-6">
										<span class="label label-primary" style="cursor:pointer" id="btnmultiimage">Choose images</span>
									  <input id="uploadmt" name="multi_file[]" type="file" multiple style="display: none;"/>
									  @if(count($list_image) > 0)
									  		@foreach($list_image as $image)
												<div class="alert alert-warning fade in block-inner">
												    <button class="close" type="button" data-dismiss="alert" onclick="remove_image('{{$image->id}}')">
												        ×
												    </button>
														<figure>
															<img width="100px" src="{{URL::to('/uploads/images_product/thumb')}}/{{$image->name}}"/>
															<figcaption>
															</figcaption>
														</figure>
												</div>
											@endforeach
										@endif
									  <div id="results">
										</div>
									 </div> 
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="ProductName" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_name') }} </label>
									<div class="col-md-6">
									  {{ Form::text('ProductName', $row['ProductName'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div>
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="id_promotion" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_promotion') }} </label>
									<div class="col-md-6">
									  <select name='id_promotion' rows='5' id='id_promotion' code='{$id_promotion}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="CategoryID" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_category') }} </label>
									<div class="col-md-6">
									  <select name='CategoryID' rows='5' id='CategoryID' code='{$CategoryID}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="UnitPrice" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_price') }} </label>
									<div class="col-md-6">
									  {{ Form::text('UnitPrice', $row['UnitPrice'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="UnitsInStock" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_stock') }} </label>
									<div class="col-md-6">
									  {{ Form::text('UnitsInStock', $row['UnitsInStock'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="description" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_description') }} </label>
									<div class="col-md-6">
									  <textarea name='description' rows='5' style="width:100%;"  >{{ $row['description'] }}</textarea>
									 </div> 
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									 <div class="form-group  " >
									<label for="Discontinued" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_content') }} </label>
									<div class="col-md-6">
									  <textarea name='Content' rows='15' id='editor' style="width:100%;" class='mceEditor form-control'  >{{ $row['Content'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div>
								  </div>
								  <div class="form-group  " >
									<label for="Status" class=" control-label col-md-4 text-left"> {{ Lang::get('core.table_status') }} </label>
									<div class="col-md-6">
									  <label class='checked'>
										<input type='radio' name='status' value ='0' required @if($row['status'] == '0' || $row['status'] == '') checked="checked" @endif > {{ Lang::get('core.disable') }} </label>
										<label class='checked'>
										<input type='radio' name='status' value ='1' required @if($row['status'] == '1') checked="checked" @endif > {{ Lang::get('core.enable') }} </label> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> </fieldset>
			</div>
			
			
			<div style="clear:both"></div>	
				
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<input type="submit" name="apply" class="btn btn-info" value="{{ Lang::get('core.sb_apply') }} " />
				<input type="submit" name="submit" class="btn btn-primary" value="{{ Lang::get('core.sb_save') }}  " />
				<button type="button" onclick="location.href='{{ URL::to('Nproducts?md='.$masterdetail["filtermd"].$trackUri) }}' " id="submit" class="btn btn-success ">  {{ Lang::get('core.sb_cancel') }} </button>
				</div>	  
		
			  </div> 
		 
		 {{ Form::close() }}
		</div>
	</div>	
</div>	
</div>			 
   <script type="text/javascript">

   	function remove_upload(id){
   		var file = $("#uploadmt")[0].files;
   		$("#uploadmt").after('<input type="hidden" name="remove_image[]" value="'+file[id].name+'" />');
   		//$("#now_"+id).remove();
   	}

   	function remove_image(id){
   		var link = "{{ URL::to('Nproducts/delimage?idimg=') }}"+id;
   		$.get(link,function(data,status){
	  });
   	}

	$(document).ready(function() { 
		$("#id_promotion").jCombo("{{ URL::to('Nproducts/comboselect?filter=promotion:id_promotion:name') }}",
		{  selected_value : '{{ $row["id_promotion"] }}' });
		
		$("#CategoryID").jCombo("{{ URL::to('Nproducts/comboselect?filter=categories:CategoryID:CategoryName') }}",
		{  selected_value : '{{ $row["CategoryID"] }}' });
		 


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