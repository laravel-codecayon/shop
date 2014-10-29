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
    <div class="imageholder">
		<figure>
			<img width="50px" src="${filePath}" alt="${fileName}"/>
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
								  	<input type="hidden" name="action" value="{{$row['ProductID']}}" />
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
									<label for="Picture" class=" control-label col-md-4 text-left"> {{ Lang::get('core.product_image') }} </label>
									<div class="col-md-6">
										<span class="label label-primary" style="cursor:pointer" id="btnmultiimage">Choose images</span>
									  <input id="uploadmt" name="multi_file" type="file" style="display: none;"/>
									  <div id="results">
											
										</div>
									 </div> 
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="ProductName" class=" control-label col-md-4 text-left"> ProductName </label>
									<div class="col-md-6">
									  {{ Form::text('ProductName', $row['ProductName'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div>
									 <div class="col-md-2">
									 </div>
								  </div>
								  <div class="form-group  " >
									<label for="SupplierID" class=" control-label col-md-4 text-left"> SupplierID </label>
									<div class="col-md-6">
									  <select name='SupplierID' rows='5' id='SupplierID' code='{$SupplierID}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="CategoryID" class=" control-label col-md-4 text-left"> CategoryID </label>
									<div class="col-md-6">
									  <select name='CategoryID' rows='5' id='CategoryID' code='{$CategoryID}' 
							class='select2 '    ></select> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="QuantityPerUnit" class=" control-label col-md-4 text-left"> QuantityPerUnit </label>
									<div class="col-md-6">
									  {{ Form::text('QuantityPerUnit', $row['QuantityPerUnit'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="UnitPrice" class=" control-label col-md-4 text-left"> UnitPrice </label>
									<div class="col-md-6">
									  {{ Form::text('UnitPrice', $row['UnitPrice'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="UnitsInStock" class=" control-label col-md-4 text-left"> UnitsInStock </label>
									<div class="col-md-6">
									  {{ Form::text('UnitsInStock', $row['UnitsInStock'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="UnitsOnOrder" class=" control-label col-md-4 text-left"> UnitsOnOrder </label>
									<div class="col-md-6">
									  {{ Form::text('UnitsOnOrder', $row['UnitsOnOrder'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="ReorderLevel" class=" control-label col-md-4 text-left"> ReorderLevel </label>
									<div class="col-md-6">
									  {{ Form::text('ReorderLevel', $row['ReorderLevel'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
								  </div> 					
								  <div class="form-group  " >
									<label for="Discontinued" class=" control-label col-md-4 text-left"> Discontinued </label>
									<div class="col-md-6">
									  {{ Form::text('Discontinued', $row['Discontinued'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
									 <div class="form-group  " >
									<label for="Discontinued" class=" control-label col-md-4 text-left"> Content </label>
									<div class="col-md-6">
									  <textarea name='Content' rows='15' id='editor' style="width:100%;" class='mceEditor form-control'  >{{ $row['Content'] }}</textarea> 
									 </div> 
									 <div class="col-md-2">
									 	
									 </div>
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
	$(document).ready(function() { 
		
		$("#SupplierID").jCombo("{{ URL::to('Nproducts/comboselect?filter=suppliers:SupplierID:CompanyName') }}",
		{  selected_value : '{{ $row["SupplierID"] }}' });
		
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