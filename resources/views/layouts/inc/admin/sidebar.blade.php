<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="mdi mdi-home menu-icon"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>

      {{--  <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-circle-outline menu-icon"></i>
          <span class="menu-title">UI Elements</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li>  --}}

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">Add Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('admin/brands') }}">Brand Category</a></li>
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Products</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">Add Products</a></li>
              {{--  <li class="nav-item"> <a class="nav-link" href="{{ url('admin/brands') }}">Brand Category</a></li>  --}}
            </ul>
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/sliders') }}">
            <i class="fa fa-sliders" aria-hidden="true"></i>
          <span class="menu-title">Slider</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contacts.index') }}">
          <span class="menu-title">Contact Message</span>
        </a>
      </li>
    </ul>
  </nav>
