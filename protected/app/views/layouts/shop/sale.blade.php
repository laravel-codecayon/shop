{{--*/ $items = SiteHelpers::saleProducts() /*--}}
@if(count($items) > 0)
      <div class="box">
        <div class="box-heading">Specials</div>
        <div class="box-content">
          <div class="box-product">
            @foreach($items as $item)
              {{ SiteHelpers::templateProductSide($item) }}
            @endforeach
          </div>
        </div>
      </div>
@endif
