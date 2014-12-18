{{ HTML::script('sximo/themes/shop/js/jquery.cookie.js') }}
<div id="content">
      <!--Breadcrumb Part Start-->
      <div class="breadcrumb"> <a href="{{URL::to('')}}">Trang chủ</a> » <a href="javascript:">Kết quả từ khóa "{{$search}}"</a></div>
      <!--Breadcrumb Part End-->
      <h1>{{$search}}</h1>
      <div class="product-filter">
        <div class="display"><b>Display:</b> <a href="javascript:" onclick="display('gird')"><span class="list1-icon" title="Grid View">Grid</span></a><a href="javascript:" onclick="display('list')" class="grid-icon" title="List View">List</a></div>
        <form id="formsort" method="get" action="{{URL::to('')}}/search.html">
        	<input type="hidden" name="search" value="{{$search}}" />
	        <div class="limit"><b>Show:</b>
	          <select id="numpage" name="numpage">
	          	<option selected="selected"  value="12">12</option>
	            <option   value="16">16</option>
	            <option value="25">25</option>
	            <option value="50">50</option>
	            <option value="75">75</option>
	            <option value="100">100</option>
	          </select>
	        </div>
	        <div class="sort"><b>Sort By:</b>
	          <select id="sort" name="sort">
	            <option  selected="selected" value="">Sắp sếp</option>
	            <option value="ProductName-asc">Tên sản phẩm (A - Z)</option>
	            <option value="ProductName-desc">Tên sản phẩm (Z - A)</option>
	            <option value="UnitPrice-asc">Giá (Low &gt; High)</option>
	            <option value="UnitPrice-desc">Giá (High &gt; Low)</option>
	          </select>
	        </div>
	      </div>
	      <input type="hidden" id="page" name="page" value="{{$page}}" />
      </form>
      <script type="text/javascript">
      	$( document ).ready(function() {
		    $(".product-filter select").change(function(event) {

		    	$("#formsort").submit();
		    });
		    var sort = '{{$sort}}';
		    var numpage = '{{$numpage}}';
		    var search = '{{$search}}';
			$('#sort option[value='+sort+']').attr('selected','selected');
		    $('#numpage option[value='+numpage+']').attr('selected','selected');
		});
      </script>
      <!--Product Grid Start-->
      <div class="product-grid">
        @foreach($data as $item)
                {{ SiteHelpers::templateProduct($item) }}
            @endforeach
      </div>
      <!--Product Grid End-->
      <!--Pagination Part Start-->
      <div class="pagination">
        <div class="links"> {{ $pagination->appends(array("sort"=>"$sort","numpage"=>$numpage,"page"=>$page,"search"=>$search))->links('pagination_site') }}</div>
        <div class="results">{{Lang::get('core.grid_displaying') }} {{ $pagination->getFrom() }} {{Lang::get('core.grid_to') }} {{ $pagination->getTo() }} {{ Lang::get('core.grid_of') }} {{ $pagination->getTotal() }}</div>
      </div>
      <!--Pagination Part End-->
    </div>
<script type="text/javascript"><!--
function display(view) {
	if (view == 'list') {
		$('.product-grid').attr('class', 'product-list');
		
		$('.product-list > div').each(function(index, element) {
			html  = '<div class="right">';
			html += '  <div class="cart">' + $(element).find('.cart').html() + '</div>';
			//html += '  <div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
			//html += '  <div class="compare">' + $(element).find('.compare').html() + '</div>';
			html += '</div>';			
			
			html += '<div class="left">';
			
			var image = $(element).find('.image').html();
			
			if (image != null) { 
				html += '<div class="image">' + image + '</div>';
			}
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
					
			html += '  <div class="name">' + $(element).find('.name').html() + '</div>';
			html += '  <div class="description">' + $(element).find('.description').html() + '</div>';
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}
				
			html += '</div>';

						
			$(element).html(html);
		});		
		
		$('.display').html('<b>Display:</b> <span class="grid1-icon">List</span> <a title="Grid" class="list-icon" onclick="display(\'grid\');">Grid</a>');
		
		$.cookie('display', 'list'); 
	} else {
		$('.product-list').attr('class', 'product-grid');
		
		$('.product-grid > div').each(function(index, element) {
			html = '';
			
			var image = $(element).find('.image').html();
			
			if (image != null) {
				html += '<div class="image">' + image + '</div>';
			}
			
			html += '<div class="name">' + $(element).find('.name').html() + '</div>';
			html += '<div class="description">' + $(element).find('.description').html() + '</div>';
			
			var price = $(element).find('.price').html();
			
			if (price != null) {
				html += '<div class="price">' + price  + '</div>';
			}
			
			var rating = $(element).find('.rating').html();
			
			if (rating != null) {
				html += '<div class="rating">' + rating + '</div>';
			}
						
			html += '<div class="cart">' + $(element).find('.cart').html() + '</div>';
			//html += '<div class="wishlist">' + $(element).find('.wishlist').html() + '</div>';
			//html += '<div class="compare">' + $(element).find('.compare').html() + '</div>';
			
			$(element).html(html);
		});	
					
		$('.display').html('<b>Display:</b> <a title="List" class="grid-icon" onclick="display(\'list\');">List</a><span class="list1-icon">Grid</span>');
		
		$.cookie('display', 'grid');

	}

}

view = $.cookie('display');

if (view) {
	display(view);
} else {
	display('grid');
}
//--></script>