      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <li class="active treeview">
          <a href="{{route('adminStartPage')}}">
            <i class="fa fa-dashboard"></i> <span>Strona domowa</span>
          </a>
          
        </li>
         <li class="treeview">
          <a href="{{route('adminCustomers')}}">
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
            <li><a href="{{route('adminAddProduct')}}"><i class="fa fa-circle-o"></i> Dodaj Produkt</a></li>
            <li><a href="{{route('adminAllProduct')}}"><i class="fa fa-circle-o"></i> Pokaż wszytskie</a></li>
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
				<li><a href="{{route('adminCurrentOrders')}}"><i class="fa fa-circle-o"></i> Bieżące zamówienia</a></li>
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
            <li><a href="{{route('chartProduct')}}"><i class="fa fa-circle-o"></i> Wykres Produktów</a></li>
            <li><a href="{{route('chartSold')}}"><i class="fa fa-circle-o"></i> Wykres sprzedaży</a></li>
            <li><a href="{{route('chartDelivery')}}"><i class="fa fa-circle-o"></i> Wykres dostaw</a></li>
            <li><a href="{{route('chartPaying')}}"><i class="fa fa-circle-o"></i> Wykres płatności</a></li>
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
            <li><a href="{{route('addRole')}}"><i class="fa fa-circle-o"></i>Zarządzaj rolami</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{route('kinds')}}">
            <i class="fa fa-dashboard"></i> <span>Zarządzaj kategoriami</span>
          </a>
        </li>
        <li class="treeview">
          <a href="{{url('/admin/newsletter')}}">
            <i class="fa fa-dashboard"></i> <span>Wyślij newsletter</span>
          </a>
        </li>
      </ul>