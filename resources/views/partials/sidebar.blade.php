<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-text mx-3">{{ __('Homepage') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('admin/dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
        @can('permission_access')
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('User Management') }}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}" href="{{ route('admin.permissions.index') }}"> <img src="{{ asset('frontend/assets/img/icon-img/user.png') }}" width="17" alt=""> {{ __('Permissions') }}</a>
                        <a class="collapse-item {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}"><img src="{{ asset('frontend/assets/img/icon-img/employee.png') }}" width="17" alt=""> {{ __('Roles') }}</a>
                        <a class="collapse-item {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"> <i class="fa fa-user mr-2"></i> {{ __('Users') }}</a>
                    </div>
                </div>
            </li>
        @endcan

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Product Management') }}</span>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/categories') || request()->is('admin/categories/*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"> <i class="fa fa-list mr-2"></i> {{ __('Categories') }}</a>
                        <a class="collapse-item {{ request()->is('admin/tags') || request()->is('admin/tags/*') ? 'active' : '' }}" href="{{ route('admin.tags.index') }}"><i class="fa fa-tags mr-2"></i> {{ __('Tags') }}</a>
                        <a class="collapse-item {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}"> <img src="{{ asset('frontend/assets/img/icon-img/brand-identity.png') }}" width="17" alt=""> {{ __('Products') }}</a>
                        <a class="collapse-item {{ request()->is('admin/reviews') || request()->is('admin/reviews/*') ? 'active' : '' }}" href="{{ route('admin.reviews.index') }}"> <img src="{{ asset('frontend/assets/img/icon-img/positive-review.png') }}" width="17" alt=""> {{ __('Reviews') }}</a>
                        <a class="collapse-item {{ request()->is('admin/slides') || request()->is('admin/slides/*') ? 'active' : '' }}" href="{{ route('admin.slides.index') }}"> <img src="{{ asset('frontend/assets/img/icon-img/slide.png') }}" width="17" alt=""> {{ __('Slides') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Order Management') }}</span>
                </a>
                <div id="collapseOrder" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/orders') || request()->is('admin/orders/*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}"> <img src="{{ asset('frontend/assets/img/icon-img/checkout.png') }}" width="17" alt=""> {{ __('Orders') }}</a>
                        <a class="collapse-item {{ request()->is('admin/shipments') || request()->is('admin/shipmentss/*') ? 'active' : '' }}" href="{{ route('admin.shipments.index') }}"> <img src="{{ asset('frontend/assets/img/icon-img/distribution.png') }}" width="17" alt=""> {{ __('Shipments') }}</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseTwo">
                    <span>{{ __('Report Management') }}</span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ request()->is('admin/reports/revenue') ? 'active' : '' }}" href="{{ route('admin.reports.revenue') }}"> <img src="{{ asset('frontend/assets/img/icon-img/growth.png') }}" width="17" alt=""> {{ __('Revenues') }}</a>
                    </div>
                </div>
            </li>


        </ul>