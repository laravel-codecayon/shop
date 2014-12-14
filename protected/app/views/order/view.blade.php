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
						<td width='30%' class='label-view text-right'>OrderID</td>
						<td>{{ $row->OrderID }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Customer</td>
						<td>{{ $row->name }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Email</td>
						<td>{{ $row->email }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Phone</td>
						<td>{{ $row->phone }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Address</td>
						<td>{{ $row->address }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Status</td>
						<td>
							@if($row->status == 0) New 
							@elseif($row->status == 1) Waiting 
							@elseif($row->status == 2) Finish 
							@elseif($row->status == 3) Destroy 
							@endif 
						</td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>City</td>
						<td>{{ SiteHelpers::getNameaddress($row->provinceid,'province','provinceid') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>District</td>
						<td>{{ SiteHelpers::getNameaddress($row->districtid,'district','districtid') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Ward</td>
						<td>{{ SiteHelpers::getNameaddress($row->wardid,'ward','wardid') }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Order Date</td>
						<td>{{ $row->OrderDate }} </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Sex</td>
						<td>@if($row->sex == 1) Nam @else Nu @endif </td>
						
					</tr>
				
					<tr>
						<td width='30%' class='label-view text-right'>Note</td>
						<td>{{ $row->content }} </td>
						
					</tr>
					@if(count($items) > 0)
					<tr>
						<td width='30%' class='label-view text-right'>Order Detail</td>
						<td>
							<table class="table table-bordered table-striped">
								          <thead class="no-border">
								            <tr>
								              <th style="width:50%;">Name</th>
								              <th>SL</th>
								              <th class="text-right">Price</th>
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
	  