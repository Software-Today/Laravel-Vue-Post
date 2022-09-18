<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="{{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}">
                <a class="nav-link dropdown" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="menu-header"></li>
            <li class="{{ Route::current()->getName() == 'post' ? 'active' : '' }}">
                <a class="nav-link dropdown" href="{{ route('post') }}">Manage Post</a>
            </li>
            <li class="{{ Route::current()->getName() == 'category' ? 'active' : '' }}">
                <a class="nav-link dropdown" href="{{ route('category') }}">Manage Category</a>
            </li>

            <!-- <li class="dropdown {{ Route::current()->getName() == 'post' || Route::current()->getName() == 'category' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Post</span></a>
                <ul class="dropdown-menu"
                    style="display: {{ Route::current()->getName() == 'post' || Route::current()->getName() == 'category' ? 'block' : 'none' }}">
                    <li class="{{ Route::current()->getName() == 'post' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('post') }}">Manage Post</a></li>
                    <li class="{{ Route::current()->getName() == 'category' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('category') }}">Manage Category</a></li>
                </ul>
            </li> -->

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                    <span>Components</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="components-article.html">Article</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
