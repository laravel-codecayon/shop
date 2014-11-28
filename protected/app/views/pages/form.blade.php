{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/jquery.tinymce.js')}}
{{ HTML::script('sximo/js/plugins/tinymce/jscripts/tiny_mce/tiny_mce.js')}}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>

	
		  <ul class="breadcrumb">
			<li><a href="{{ URL::to('dashboard') }}">{{ Lang::get('core.home'); }}</a></li>
			<li><a href="{{ URL::to('pages') }}">{{ $pageTitle }}</a></li>
			<li class="active"> Add </li>
		  </ul>
		 
	  
    </div>

<div class="page-content-wrapper">
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
		
		<ul class="parsley-error-list">
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		 {{ Form::open(array('url'=>'pages/save/'.SiteHelpers::encryptID($row['pageID']), 'class'=>'form-vertical row ','files' => true , 'parsley-validate'=>'','novalidate'=>' ')) }}

			<div class="col-sm-8 ">
				<div class="sbox">
					<div class="sbox-title">Page Content </div>	
					<div class="sbox-content">				
						
					  <div class="form-group  " >
						
						<div class="" style="background:#fff;">
						  <textarea name='content' rows='35' id='content'    class='form-control mceEditor'  
							 >{{ $row['content'] }}</textarea> 
						 </div> 
					  </div> 	
					 </div>
				</div>	
		 	</div>		 
		 
		 <div class="col-sm-4 ">
			<div class="sbox">
				<div class="sbox-title">Page Info </div>	
				<div class="sbox-content">						
				  <div class="form-group hidethis " style="display:none;">
					<label for="ipt" class=""> PageID </label>
					
					  {{ Form::hidden('pageID', $row['pageID'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
					
				  </div> 					
				  <div class="form-group  " >
					<label for="ipt" > Title </label>
					
					  {{ Form::text('title', $row['title'],array('class'=>'form-control', 'placeholder'=>'', 'required'=>'true'  )) }} 
					
				  </div> 					




				  <div class="form-group hidethis " style="display:none;">
					<label for="ipt" class=" control-label col-md-4 text-right"> Created </label>
					<div class="col-md-8">
					  {{ Form::text('created', $row['created'],array('class'=>'form-control', 'placeholder'=>'',   )) }} 
					 </div> 
				  </div> 					
	
				  <div class="form-group  " >
					<label> Status </label>
					<label class="radio">					
					  <input  type='radio' name='status'  value="1" required
					  @if( $row['status'] =='1')  	checked	  @endif				  
					   /> 
					  Enable
					</label> 
					<label class="radio">					
					  <input  type='radio' name='status'  value="0" required
					   @if( $row['status'] =='0')  	checked	  @endif				  
					   /> 
					  Disabled
					</label> 					 
				  </div> 

				  
			  <div class="form-group">
				
				<button type="submit" class="btn btn-primary ">  Submit </button>
				 
		
			  </div> 
			  </div>
			  </div>				  				  
				  		
			</div>

		 {{ Form::close() }}
	</div>
</div>	

<style type="text/css">
.note-editor .note-editable { height:500px;}
</style>			 	 
<script type="text/javascript">
	$(function(){
		tinymce.init({	
			mode : "specific_textareas",
			editor_selector : "mceEditor",
			 plugins : "openmanager",
			 file_browser_callback: "openmanager",
			 open_manager_upload_path: '../../../../../../../../uploads/images/',
		 });
	});
</script>