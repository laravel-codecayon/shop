<div class="box">
        <div class="box-heading">Featured</div>
        <div class="box-content">
          <div class="box-product">
            @foreach($items as $item)
                {{ SiteHelpers::templateProduct($item) }}
            @endforeach
            
          </div>
        </div>
      </div>