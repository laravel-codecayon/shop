
  <div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
          <h3> {{ Lang::get('core.edit_module') }} : {{ $row->module_name }}</h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('') }}">{{ Lang::get('core.home') }}</a></li>
        <li ><a href="{{ URL::to( $module ) }}">{{ $pageTitle }}</a></li>
		<li class="active"> {{ $row->module_name }}</li>
      </ul>		  
	  
    </div>
	<div class="page-content-wrapper m-t"> 
	<!--@include('admin.module.tab',array('active'=>'permission'))-->

@if(Session::has('message'))
       {{ Session::get('message') }}
@endif

 {{ Form::open(array('url'=>$module.'/savepermission/'.$module_name, 'class'=>'form-horizontal')) }}

<div class="sbox">
	<div class="sbox-title"><h5> {{ Lang::get('core.permission') }} </h5></div>
	<div class="sbox-content">	
		<table class="table table-striped table-bordered" id="table">
		<thead class="no-border">
  <tr>
	<th field="name1" width="20">{{ Lang::get('core.table_no') }}</th>
	<th field="name2">{{ Lang::get('core.group') }} </th>
	<?php foreach($tasks as $item=>$val) {?>	
	<th field="name3" data-hide="phone"><?php echo $val;?> </th>
	<?php }?>

  </tr>
</thead>  
<tbody class="no-border-x no-border-y">	
  <?php $i=0; foreach($access as $gp) {?>	
  	<tr>
		<td  width="20"><?php echo ++$i;?>
		<input type="hidden" name="group_id[]" value="<?php echo $gp['group_id'];?>" /></td>
		<td ><?php echo $gp['group_name'];?> </td>
		<?php foreach($tasks as $item=>$val) {?>	
		<td  class="">
		
		<label >
			<input name="<?php echo $item;?>[<?php echo $gp['group_id'];?>]" class="c<?php echo $gp['group_id'];?>" type="checkbox"  value="1"
			<?php if($gp[$item] ==1) echo ' checked="checked" ';?> />
		</label>	
		</td>

		<?php }?>
	</tr>  
	<?php }?>
  </tbody>
</table>	


<button type="submit" class="btn btn-success"> Save Changes </button>	
	
<input name="module_id" type="hidden" id="module_id" value="<?php echo $row->module_id;?>" />
</div>	</div>
 {{ Form::close() }}	
	

</div>	</div>

<script>
	$(document).ready(function(){
	
		$(".checkAll").click(function() {
			var cblist = $(this).attr('rel');
			var cblist = $(cblist);
			if($(this).is(":checked"))
			{				
				cblist.prop("checked", !cblist.is(":checked"));
			} else {	
				cblist.removeAttr("checked");
			}	
			
		});  	
	});
</script>