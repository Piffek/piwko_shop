      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li class="active treeview">
          <a href="{{url('/admin')}}">
            <i class="fa fa-dashboard"></i> <span>Strona domowa</span>
          </a>
          
        </li>
         <li class="treeview">
          <a href="{{url('/admin/customers')}}">
            <i class="fa fa-dashboard"></i> <span>Zarządzaj klientami</span>
          </a>
          
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Zarządzaj produktami</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/add_product')}}"><i class="fa fa-circle-o"></i> Dodaj Produkt</a></li>
            <li><a href="{{url('/admin/all_product')}}"><i class="fa fa-circle-o"></i> Pokaż wszytskie</a></li>
          </ul>
        </li>
       <li>
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Zamówienia</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
				<li><a href="{{url('/admin/current_orders')}}"><i class="fa fa-circle-o"></i> Bieżące zamówienia</a></li>
				<li><a href="{{url('/admin/chart/accomplish_orders')}}"><i class="fa fa-circle-o"></i> Zrealizowane</a></li>
				
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Wykresy</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/chart/chart_product')}}"><i class="fa fa-circle-o"></i> Wykres Produktów</a></li>
            <li><a href="{{url('/admin/chart/chart_sold')}}"><i class="fa fa-circle-o"></i> Wykres sprzedaży</a></li>
            <li><a href="{{url('/admin/chart/chart_delivery')}}"><i class="fa fa-circle-o"></i> Wykres dostaw</a></li>
            <li><a href="{{url('/admin/chart/chart_paying')}}"><i class="fa fa-circle-o"></i> Wykres płatności</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Role na stronie</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/admin/roles/add_role')}}"><i class="fa fa-circle-o"></i> Dodaj role</a></li>
            <li><a href="{{url('/admin/roles/edit_role')}}"><i class="fa fa-circle-o"></i> Edytuj role</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{url('/admin/newsletter')}}">
            <i class="fa fa-dashboard"></i> <span>Wyślij newsletter</span>
          </a>
          
        </li>
      </ul>