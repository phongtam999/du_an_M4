<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Shop Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
<h3 style="color:red">MENU</h3>
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('category.index')}}" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Thể loại</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('category.index')}}">Danh Mục</a>
            <a class="collapse-item" href="{{route('category.trash')}}">Thùng rác</a>
        </div>
    </div>
</li>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('category.index')}}" data-toggle="collapse" data-target="#collapseTwo1"
        aria-expanded="true" aria-controls="collapseTwo1">
        <i class="fas fa-fw fa-cog"></i>
        <span>Sản phẩm</span>
    </a>
    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('product.index')}}">Danh Sách Sản Phẩm</a>
            <a class="collapse-item" href="{{route('product.trash')}}">Thùng rác</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('group.index')}}" data-toggle="collapse" data-target="#collapseTwo8"
        aria-expanded="true" aria-controls="collapseTwo8">
        <i class="fas fa-fw fa-cog"></i>
        <span>Nhóm Quyền</span>
    </a>
    <div id="collapseTwo8" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('group.index')}}">Danh Sách Quyền</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('user.index')}}" data-toggle="collapse" data-target="#collapseTwo2"
        aria-expanded="true" aria-controls="collapseTwo2">
        <i class="fas fa-fw fa-cog"></i>
        <span>Quản Lý Nhân Viên</span>
    </a>
    <div id="collapseTwo2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('user.index')}}">Danh Sách Nhân Viên</a>
        </div>
    </div>
</li>


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('order.index')}}" data-toggle="collapse" data-target="#collapseTwo9"
        aria-expanded="true" aria-controls="collapseTwo9">
        <i class="fas fa-fw fa-cog"></i>
        <span>Đơn Hàng</span>
    </a>
    <div id="collapseTwo9" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('order.index')}}">Danh Sách Đơn hàng</a>
        </div>
    </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{route('order.index')}}" data-toggle="collapse" data-target="#collapseTwo3"
        aria-expanded="true" aria-controls="collapseTwo3">
        <i class="fas fa-fw fa-cog"></i>
        <span>Khách Hàng</span>
    </a>
    <div id="collapseTwo3" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('customer.index')}}">Danh Sách Khách Hàng</a>
        </div>
    </div>
</li>





<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->






</ul>