{{ HTML::script('sximo/js/plugins/jquery.nestable.js') }}
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ Lang::get('core.t_menu') }} <small>{{ Lang::get('core.t_menusmall') }}</small></h3>
      </div>
    </div>
 	
	@if(Session::has('message'))	  
		   {{ Session::get('message') }}
	@endif	
	
	<div class="page-content-wrapper">  
	<ul class="nav nav-tabs" style="margin:10px 0;">
		<li @if($active == 'top') class="active" @endif ><a href="{{ URL::to('menu?pos=top')}}"><i class="icon-paragraph-justify2"></i> {{ Lang::get('core.tab_topmenu') }} </a></li>
		<!--<li @if($active == 'sidebar') class="active" @endif><a href="{{ URL::to('menu?pos=sidebar')}}"><i class="icon-paragraph-justify2"></i> {{ Lang::get('core.tab_sidemenu') }}</a></li>	-->
	</ul>  	
	
	
		<div class="col-sm-5">

		<div class="box ">
 <div class="infobox infobox-info fade in">
  <button type="button" class="close" data-dismiss="alert"> x </button>  
  <p> {{ Lang::get('core.t_tipsdrag') }}</p>	
</div>

            <div id="list2" class="dd" style="min-height:350px;">
              <ol class="dd-list">
			@foreach ($menus as $menu)
				  <li data-id="{{$menu['menu_id']}}" class="dd-item dd3-item">
					<div class="dd-handle dd3-handle"></div><div class="dd3-content">{{$menu['menu_name']}}
						<span class="pull-right">
						<a href="{{ URL::to('menu/index/'.$menu['menu_id'].'?pos='.$active)}}"><i class="icon-cogs"></i></a></span>
					</div>
					@if(count($menu['childs']) > 0)
						<ol class="dd-list" style="">
							@foreach ($menu['childs'] as $menu2)
							 <li data-id="{{$menu2['menu_id']}}" class="dd-item dd3-item">
								<div class="dd-handle dd3-handle"></div><div class="dd3-content">{{$menu2['menu_name']}}
									<span class="pull-right">
									<a href="{{ URL::to('menu/index/'.$menu2['menu_id'].'?pos='.$active)}}"><i class="icon-cogs"></i></a></span>
								</div>
								@if(count($menu2['childs']) > 0)
								<ol class="dd-list" style="">
									@foreach($menu2['childs'] as $menu3)
									 	<li data-id="{{$menu3['menu_id']}}" class="dd-item dd3-item">
											<div class="dd-handle dd3-handle"></div><div class="dd3-content">{{ $menu3['menu_name'] }}
												<span class="pull-right">
												<a href="{{ URL::to('menu/index/'.$menu3['menu_id'].'?pos='.$active)}}"><i class="icon-cogs"></i></a>
												</span>
											</div>
										</li>	
									@endforeach
								</ol>
								@endif
							</li>							
							@endforeach
						</ol>
					@endif
				</li>
			@endforeach			  
              </ol>
            </div>
		 {{ Form::open(array('url'=>'menu/saveorder/', 'class'=>'form-horizontal','files' => true)) }}	
			<input type="hidden" name="reorder" id="reorder" value="" />
 <div class="infobox infobox-danger fade in">
 <p> {{ Lang::get('core.t_tipsnote') }}	</p>
</div>			
		
			<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_reorder') }} </button>	
		 {{ Form::close() }}	
		 </div>
		</div>
		<div class="col-sm-7">
		 {{ Form::open(array('url'=>'menu/save/', 'class'=>'form-horizontal','files' => true)) }}
				<div class=" box">	

				
				<input type="hidden" name="menu_id" id="menu_id" value="{{ $row['menu_id'] }}" />									
				  <div class="form-group  ">
					<label for="ipt" class=" control-label col-md-4 text-right">  </label>
					<div class="col-md-8">
		 				<ul class="parsley-error-list">
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					 </div> 
				  </div> 
				
				<input type="hidden" name="menu_id" id="menu_id" value="{{ $row['menu_id'] }}" />									
				  <div class="form-group  " style="display:none;">
					<label for="ipt" class=" control-label col-md-4 text-right"> Parent Id </label>
					<div class="col-md-8">
					  {{ Form::text('parent_id', $row['parent_id'],array('class'=>'form-control', 'placeholder'=>'')) }} 
					 </div> 
				  </div> 
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right">{{ Lang::get('core.fr_mtitle') }}  </label>
					<div class="col-md-8">
					  {{ Form::text('menu_name', $row['menu_name'],array('class'=>'form-control', 'placeholder'=>'')) }} 
					 </div> 
				  </div>
				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right">Link  </label>
					<div class="col-md-8">
					  {{ Form::text('link', $row['module'],array('class'=>'form-control', 'placeholder'=>'')) }} 
					 </div> 
				  </div>
				  			  					
				  <!--<div class="form-group  ext-link" >
					<label for="ipt" class=" control-label col-md-4 text-right"> Url  </label>
					<div class="col-md-8">
					   {{ Form::text('url', $row['url'],array('class'=>'form-control', 'placeholder'=>' Type External Url')) }} 
					 </div> 
				  </div> 	-->
								  					
				  <div class="form-group  int-link" >
					<label for="ipt" class=" control-label col-md-4 text-right"> Module </label>
					<div class="col-md-8">
					  <select name='module' rows='5' id='module'  style="width:100%" 
							class='select-liquid '    >
							<option value=""> -- Select Module or Page -- </option>
							<!--<optgroup label="Module ">
							@foreach($modules as $mod)
								<option value="{{ $mod->module_name}}"
								@if($row['module']== $mod->module_name ) selected="selected" @endif
								>{{ $mod->module_title}}</option>
							@endforeach
							</optgroup>-->
							<optgroup label="Page CMS ">
							@foreach($pages as $page)
								<option value="{{ $page->alias}}"
								@if($row['module']== $page->alias ) selected="selected" @endif
								>Page : {{ $page->title}}</option>
							@endforeach	
							</optgroup>						
					</select> 		
					 </div> 
				  </div> 										
					



				  <div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4 text-right"> {{ Lang::get('core.fr_mactive') }}  </label>
					<div class="col-md-8">
					<input type="radio" name="active"  value="1" 
					@if($row['active']=='1' ) checked="checked" @endif /> {{ Lang::get('core.fr_mactive') }} 
					<input type="radio" name="active" value="0" 
					@if($row['active']=='0' ) checked="checked" @endif  /> {{ Lang::get('core.fr_minactive') }} 
										
					 
					 </div> 
				  </div> 



				  <!--<div class="form-group  " >
					<label for="ipt" class=" control-label col-md-4">{{ Lang::get('core.fr_mpublic') }}   </label>
					<div class="col-md-8">
					<label class="checkbox"><input  type='checkbox' name='allow_guest' 
 						@if($row['allow_guest'] ==1 ) checked  @endif	
					   value="1"	/> Yes  </lable>
					</label>   
				  </div>
				</div>-->
				  
			  <div class="form-group">
				<label class="col-sm-4 text-right">&nbsp;</label>
				<div class="col-sm-8">	
				<button type="submit" class="btn btn-primary ">  {{ Lang::get('core.sb_submit') }}  </button>
				@if($row['menu_id'] !='')
					<button type="button"onclick="SximoConfirmDelete('{{ URL::to('menu/destroy/'.$row->menu_id)}}')" class="btn btn-danger ">  Delete </button>
				@endif	
				</div>	  
		
			  </div> 
			
		</div>	  
		 
		 {{ Form::close() }}		
		
		
		
		</div>
		</div>
		<div style="clear:both;"></div>
		
	</div>


	
	
<script>
$(document).ready(function(){
	$('.dd').nestable();
    update_out('#list2',"#reorder");
    
    $('#list2').on('change', function() {
		var out = $('#list2').nestable('serialize');
		$('#reorder').val(JSON.stringify(out));	  

    });
		$('.ext-link').hide(); 

	$('.menutype input:radio').on('ifClicked', function() {
	 	 val = $(this).val();
  			mType(val);
	  
	});
	
	mType('<?php echo $row['menu_type'];?>'); 
	
			
});	

function mType( val )
{
		/*if(val == 'external') {
			$('.ext-link').show(); 
			$('.int-link').hide();
		} else {
			$('.ext-link').hide(); 
			$('.int-link').show();
		}	*/
}

	
function update_out(selector, sel2){
	
	var out = $(selector).nestable('serialize');
	$(sel2).val(JSON.stringify(out));

}
</script>		 
		 	  