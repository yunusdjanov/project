<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" target="_blank" class="brand-link">
        <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Nabishop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ $user->getImage() }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ $user->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @canany(['rule','help', 'analytic','seo'])
                <li class="nav-item">
                    <a href="{{ route('admin.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Главная</p>
                    </a>
                </li>
                @endcan
                    @canany(['rule','help','analytic','seo'])
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Профиль</p>
                    </a>
                </li>
                @endcan
                    @canany(['rule','help'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Категории
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('categories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список категории</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('categories.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новая категория</p>
                            </a>
                        </li>
                    </ul>
                </li>
                        @endcan
                    @canany(['rule','help'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Субкатегории
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subcategories.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список Субкатегории</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('subcategories.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новая Субкатегория</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @canany(['rule','help'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-import"></i>
                        <p>
                            Импорт продуктов
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('import.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Импорт через excel</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @canany(['rule','help'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-spray-can"></i>
                        <p>
                            Продукты
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список Продуктов</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('products.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новый Продукт</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('options.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список опции</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('options.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новая опция</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('branch.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавления свойтсва</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('branch.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список свойтсв</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @can('rule')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>
                            Купоны
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('coupons.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список купонов</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('coupons.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новый купон</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @canany(['rule', 'help','seo'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-newspaper"></i>
                        <p>
                            Блог
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('rubrics.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новая рубрика</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('rubrics.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список рубрик</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Новый пост</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('posts.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список постов</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @can('rule')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Пользователи
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @canany(['rule','help'])
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Баннеры
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('banners.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Добавить баннер</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('banners.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список баннеров</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
                    @canany(['rule','analytic'])

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-box-open"></i>
                        <p>
                            Заказы
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('orders.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>В ожидании</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('orders.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Список</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


