<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('backendAsset') }}/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Manage Category
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('admin.slider.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Slider</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.category.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Category</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.subCategory.index') }}" class="nav-link ">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Sub Category</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.childCategory.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Child Category</p>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Ecommerce
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.vendor.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Vendor Profile</p>
                        </a>
                    </li>
                </ul>
            </li>
                <li class="nav-item ">
                  <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-copy"></i>
                      <p>
                          Manage Product
                          <i class="fas fa-angle-left right"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="{{ route('admin.banner.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>brand</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.product.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Product</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.subCategory.index') }}" class="nav-link ">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Sub Category</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ route('admin.childCategory.index') }}" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Child Category</p>
                          </a>
                      </li>
                  </ul>
              </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
