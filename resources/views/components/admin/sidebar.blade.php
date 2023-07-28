<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.index')) active @endif" aria-current="page" href="{{ route('admin.index') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.categories.index')) active @endif" href="{{ route('admin.categories.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.news.index')) active @endif" href="{{ route('admin.news.index') }}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Новости
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.profile.index')) active @endif" href="{{ route('admin.profile.index') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Профиль
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.users.index')) active @endif" href="{{ route('admin.users.index') }}">
                    <span data-feather="user" class="align-text-bottom"></span>
                    Пользователи
                </a>
            </li>
        </ul>
    </div>
</nav>
