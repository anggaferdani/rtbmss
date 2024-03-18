<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      RTBMSS
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      RTBMSS
    </div>
    <ul class="sidebar-menu">
      <li class="{{ Route::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-quote-right"></i><span>Dashboard</span></a>
      </li>
      <li class="{{ Route::is('customer.*', 'cdr.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('customer.index') }}"><i class="fas fa-quote-right"></i><span>Customer</span></a>
      </li>
      <li class="{{ Route::is('product-rate.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('product-rate.index') }}"><i class="fas fa-quote-right"></i><span>Product Rate</span></a>
      </li>
    </ul>
  </aside>
</div>