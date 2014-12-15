<div class="page-content row">
    <!-- Page header -->
    <div class="page-header">
      <div class="page-title">
        <h3> {{ $pageTitle }} <small>{{ $pageNote }}</small></h3>
      </div>
      <ul class="breadcrumb">
        <li><a href="{{ URL::to('config/dashboard') }}">{{ Lang::get('core.home') }}</a></li>
		<li><a href="{{ URL::to('order?md='.$masterdetail["filtermd"]) }}">{{ $pageTitle }}</a></li>
        <li class="active"> {{ Lang::get('core.detail') }} </li>
      </ul>
	 </div>  
	 
	 
 	<div class="page-content-wrapper">   
	   <div class="toolbar-line">
	   		<a href="{{ URL::to('order?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-default" title="{{ Lang::get('core.btn_back') }}"><i class="icon-table"></i>&nbsp;{{ Lang::get('core.btn_back') }}</a>
			@if($access['is_add'] ==1)
	   		<a href="{{ URL::to('order/add/'.$id.'?md='.$masterdetail["filtermd"].$trackUri) }}" class="tips btn btn-xs btn-primary" title="{{ Lang::get('core.btn_edit') }}"><i class="icon-pencil3"></i>&nbsp;{{ Lang::get('core.btn_edit') }}</a>
			@endif  		   	  
		</div>
	<div class="table-responsive">
	<table class="table table-striped table-bordered" >
		<tbody>	
	
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_id') }}</td>
						<td>{{ $row->OrderID }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_customer') }}</td>
						<td>{{ $row->name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_email') }}</td>
						<td>{{ $row->email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_phone') }}</td>
						<td>{{ $row->phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_address') }}</td>
						<td>{{ $row->address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_status') }}</td>
						<td>
							@if($row->status == 0) {{ Lang::get('core.order_new') }} 
							@elseif($row->status == 1) {{ Lang::get('core.order_wait') }} 
							@elseif($row->status == 2) {{ Lang::get('core.order_finish') }} 
							@elseif($row->status == 3) {{ Lang::get('core.order_des') }} 
							@endif 
						</td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_city') }}</td>
						<td>{{ SiteHelpers::getNameaddress($row->provinceid,'province','provinceid') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_district') }}</td>
						<td>{{ SiteHelpers::getNameaddress($row->districtid,'district','districtid') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_ward') }}</td>
						<td>{{ SiteHelpers::getNameaddress($row->wardid,'ward','wardid') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_date') }}</td>
						<td>{{ $row->OrderDate }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.sex') }}</td>
						<td>@if($row->sex == 1) Nam @else Nu @endif </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.table_note') }}</td>
						<td>{{ $row->content }} </td>
						
					</tr>
					@if(count($items) > 0)
					<tr>
						<td width='30%' class='label-view text-right'>{{ Lang::get('core.detail_order') }}</td>
						<td>
							<table class="table table-bordered table-striped">
								          <thead class="no-border">
								            <tr>
								              <th style="width:50%;">{{ Lang::get('core.table_name') }}</th>
								              <th>{{ Lang::get('core.table_sl') }}</th>
								              <th class="text-right">{{ Lang::get('core.table_price') }}</th>
								            </tr>
								          </thead>
								          <tbody class="no-border-y">
								          	@foreach($items as $item)
								          	{{--*/ $product = DB::table('products')->where("ProductID","=",$item->ProductID)->first(); /*--}}
								            <tr>
								              <td style="width:30%;">{{$product->ProductName}}</td>
								              <td>
								              	{{$item->Quantity}}
								              	
								              </td>
								              <td class="text-right">{{number_format(($item->UnitPrice * $item->Quantity),0,',','.') }}</td>
								            </tr>
								            @endforeach
								          </tbody>
								        </table> 
						</td>
						
					</tr>
					@endif
				
		</tbody>	
	</table>    
	</div>
	</div>
</div>
	  