{{--*/ $menus = SiteHelpers::menus('top') /*--}}
<div id="menu"><span>Menu</span>
    <ul>
      <li class="home"><a  title="Home" href="index-2.html"><span>Home</span></a></li>
      @foreach ($menus as $menu)

          <li>
            <a
              @if($menu['menu_type'] =='external')
                href="{{ URL::to($menu['module'])}}" 
              @else
                href="{{ URL::to($menu['module'])}}" 
              @endif
            >{{$menu['menu_name']}}</a>

          @if(count($menu['childs']) > 0)
              <div>
                <ul>
                  @foreach($menu['childs'] as $menu2)
                    <li><a 
                      @if($menu['menu_type'] =='external')
                        href="{{ URL::to($menu2['module'])}}" 
                      @else
                        href="{{ URL::to($menu2['module'])}}" 
                      @endif
                    >{{$menu2['menu_name']}}</a></li>
                  @endforeach
                </ul>
              </div>
          @endif
          </li>
      @endforeach  

      
    </ul>
  </div>