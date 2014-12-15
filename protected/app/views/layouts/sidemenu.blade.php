	  {{--*/ $sidebar = SiteHelpers::menus('sidebar') /*--}}

<nav role="navigation" class="navbar-default navbar-static-side">
     <div class="sidebar-collapse">				  
       <ul id="sidemenu" class="nav expanded-menu">
		<li class="logo-header" >
		 <a class="navbar-brand" href="{{ URL::to('dashboard')}}">
			<img src="{{ asset('sximo/images/logo.png')}}" alt="{{ CNF_APPNAME }}" />
		 </a>
		</li>
		<li class="nav-header">
			<div class="dropdown profile-element" style="text-align:center;"> <span>
				{{ SiteHelpers::avatar()}}
				 </span>
				<a href="{{ URL::to('user/profile') }}" >
				<span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ Session::get('fid') }}</strong>
				 <br />
				{{ Lang::get('core.last_login') }} : <br />
				<small>{{ date("H:i F j, Y", strtotime(Session::get('ll'))) }}</small>				
				 </span> 
				 </span>
				 </a>
			</div>
			<div class="photo-header "> {{ SiteHelpers::avatar( 50 )}} </div>
		</li> 
		<!--@foreach ($sidebar as $menu)
			 <li @if(Request::is($menu['module'])) class="active" @endif>
			 	<a 
					@if($menu['menu_type'] =='external')
						href="{{ $menu['url'] }}" 
					@else
						href="{{ URL::to($menu['module'])}}" 
					@endif				
			 	
				 @if(count($menu['childs']) > 0 ) class="expand level-closed" @endif>
				 	<i class="{{$menu['menu_icons']}}"></i> <span class="nav-label">{{$menu['menu_name']}}</span><span class="fa arrow"></span>	 
				</a> 
				@if(count($menu['childs']) > 0)
					<ul class="nav nav-second-level">
						@foreach ($menu['childs'] as $menu2)
						 <li @if(Request::is($menu2['module'])) class="active" @endif>
						 	<a 
								@if($menu2['menu_type'] =='external')
									href="{{ $menu2['url']}}" 
								@else
									href="{{ URL::to($menu2['module'])}}"  
								@endif									
							>
								{{$menu2['menu_name']}}
							</a> 
							@if(count($menu2['childs']) > 0)
							<ul class="nav nav-third-level">
								@foreach($menu2['childs'] as $menu3)
									<li @if(Request::is($menu3['module'])) class="active" @endif>
										<a 
											@if($menu['menu_type'] =='external')
												href="{{ $menu3['url'] }}" 
											@else
												href="{{ URL::to($menu3['module'])}}" 
											@endif										
										
										>
											{{$menu3['menu_name']}}
										</a>
									</li>	
								@endforeach
							</ul>
							@endif							
						</li>							
						@endforeach
					</ul>
				@endif
			</li>
		@endforeach-->
		<li @if(Request::is('nproducts')) class="active" @endif>
			<a href="{{ URL::to('nproducts')}}"><i class="icon-drawer3"></i> <span class="nav-label">{{ Lang::get('core.product') }}</span><span class="fa arrow"></span></a>
		</li>
		<li @if(Request::is('ncategories')) class="active" @endif>
			<a href="{{ URL::to('ncategories')}}"><i class="icon-drawer2"></i> <span class="nav-label">{{ Lang::get('core.category') }}</span><span class="fa arrow"></span></a>
		</li>
		<li @if(Request::is('Promotion')) class="active" @endif>
			<a href="{{ URL::to('Promotion')}}"><i class="icon-drawer2"></i> <span class="nav-label">{{ Lang::get('core.promotion') }}</span><span class="fa arrow"></span></a>
		</li>
		<li @if(Request::is('Slideshow')) class="active" @endif>
			<a href="{{ URL::to('Slideshow')}}"><i class="icon-drawer2"></i> <span class="nav-label">{{ Lang::get('core.slideshow') }}</span><span class="fa arrow"></span></a>
		</li>
		<li @if(Request::is('pages')) class="active" @endif>
			<a href="{{ URL::to('pages')}}"><i class="icon-drawer2"></i> <span class="nav-label">{{ Lang::get('core.pages') }}</span><span class="fa arrow"></span></a>
		</li>
		<li @if(Request::is('order')) class="active" @endif>
			<a href="{{ URL::to('order')}}"><i class="icon-drawer2"></i> <span class="nav-label">{{ Lang::get('core.order') }}</span><span class="fa arrow"></span></a>
		</li>
		@if(Session::get('gid') ==1 || Session::get('gid') ==2)
			<li @if(Request::is('permission')) class="active" @endif>
				<a href="{{ URL::to('permission')}}"><i class="icon-drawer2"></i> <span class="nav-label">{{ Lang::get('core.permission') }}</span><span class="fa arrow"></span></a>
			</li>
			<li @if(Request::is('users')) class="active" @endif>
				<a href="{{ URL::to('users')}}"><i class="fa fa-user"></i> <span class="nav-label">{{ Lang::get('core.user') }}</span><span class="fa arrow"></span></a>
			</li>
			<li @if(Request::is('groups')) class="active" @endif>
				<a href="{{ URL::to('groups')}}"><i class="fa fa-users"></i> <span class="nav-label">{{ Lang::get('core.group') }}</span><span class="fa arrow"></span></a>
			</li>
			<li @if(Request::is('menu')) class="active" @endif>
				<a href="{{ URL::to('menu')}}"><i class="fa fa-users"></i> <span class="nav-label">{{ Lang::get('core.menu') }}</span><span class="fa arrow"></span></a>
			</li>
		@endif
      </ul>
	</div>
</nav>	  
	  
