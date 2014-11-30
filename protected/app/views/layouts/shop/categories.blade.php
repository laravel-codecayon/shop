
{{--*/ $cats = SiteHelpers::GetCategories() /*--}}
<div class="box">
        <div class="box-heading">Categories</div>
        <div class="box-content box-category">
          <ul id="custom_accordion">
            @foreach($cats as $cat)
              <li class="category57"><a class="nochild " href="{{ URL::to("category/$cat->alias"."-$cat->CategoryID".".html") }}">{{$cat->CategoryName}}</a></li>
            @endforeach
            
          </ul>
        </div>
      </div>