{{--*/ $items = SiteHelpers::randomProduct() /*--}}
<div class="box">
        <div class="box-heading">Latest</div>
        <div class="box-content">
          <div class="box-product">
          	@foreach($items as $item)
          		{{ SiteHelpers::templateProductSide($item) }}
          	@endforeach
          </div>
        </div>
      </div>