    <div class="sidebar" id="sidebar">
        <div class="logo">
            <a href="#">
                <img class="logo__image" width="85" src="{{ asset('vendor/layout-package/img/admin-panel.png') }}"
                    alt="logo"></a>
            <i class="bi bi-list burger" id="burger"></i>
        </div>
        <nav class="nav flex-column sidebar-nav" style="margin-top: 5px;">
            @foreach (config('admin-menu.menu_items', []) as $menuItem)
                @if (
                    !isset($menuItem['permission']) ||
                        $menuItem['permission'] === null ||
                        (auth()->check() && auth()->user()->can($menuItem['permission'])))
                    @if (!isset($menuItem['submenu']))
                        @if (isset($menuItem['url']))
                            <a class="nav-link" href="{{ $menuItem['url'] }}"
                                @if (isset($menuItem['target'])) target="{{ $menuItem['target'] }}" @endif>
                                <i class="bi {{ $menuItem['icon'] }} me-2" style='margin-left: 5px;'></i>
                                <span class="menu-span">{{ $menuItem['title'] }}</span>
                            </a>
                        @else
                            <a class="nav-link {{ isset($menuItem['active_pattern']) && request()->is($menuItem['active_pattern']) ? 'active' : '' }}"
                                href="{{ route($menuItem['route']) }}">
                                <i class="bi {{ $menuItem['icon'] }} me-2" style='margin-left: 5px;'></i>
                                <span class="menu-span">{{ $menuItem['title'] }}</span>
                            </a>
                        @endif
                    @else
                        <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ isset($menuItem['active_pattern']) && request()->is($menuItem['active_pattern']) ? 'active' : '' }}"
                                href="#" role="button" data-bs-toggle="collapse"
                                data-bs-target="#submenu-{{ $loop->index }}" aria-expanded="false">
                                <i class="bi {{ $menuItem['icon'] }} me-2" style='margin-left: 5px;'></i>
                                <span class="menu-span">{{ $menuItem['title'] }}</span>
                            </a>
                            <div class="collapse" id="submenu-{{ $loop->index }}">
                                <div class="submenu">
                                    @foreach ($menuItem['submenu'] as $subItem)
                                        <a class="nav-link submenu-link {{ isset($subItem['active_pattern']) && request()->is($subItem['active_pattern']) ? 'active' : '' }}"
                                            href="{{ route($subItem['route']) }}" style="padding-left: 50px;">
                                            <span class="menu-span">{{ $subItem['title'] }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            @endforeach
        </nav>
    </div>


    <div class="header" id="header">
        <p class="title-header text-gray-400 text-[20px]! font-bold!">@yield('title')</p>
        <div class="profile">
            <div class="dropdown">
                <a class="nav-link d-flex" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="profile-img">
                        <i class="bi bi-person-circle" style="font-size: 2rem;"></i>
                    </div>
                    <div class="profile-name ms-2 text-[16px]! text-black">
                        <p class="name-user">Admin</p>
                    </div>

                    <i class="bi bi-chevron-down mt-1 ms-2" style="font-size: 1.2rem; color: #666;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex" href="#"><img
                                src="{{ asset('vendor/layout-package/img/exit.svg') }}" alt="logout"
                                style="padding-right: 7px;">Выход</a></li>
                </ul>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const header = document.getElementById('header');
            const content = document.getElementById('content');
            const burger = document.getElementById('burger');

            const isCollapsed = localStorage.getItem('sidebar_collapsed') === 'true';

            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                document.documentElement.classList.add('sidebar-collapsed');
                header.style.left = '100px';
                header.style.width = 'calc(100% - 100px)';
                content.style.setProperty('margin-left', '100px', 'important');
            }

            burger.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                const collapsedNow = sidebar.classList.contains('collapsed');
                localStorage.setItem('sidebar_collapsed', collapsedNow);

                if (collapsedNow) {
                    document.documentElement.classList.add('sidebar-collapsed');
                    header.style.left = '100px';
                    header.style.width = 'calc(100% - 100px)';
                    content.style.setProperty('margin-left', '100px', 'important');
                } else {
                    document.documentElement.classList.remove('sidebar-collapsed');
                    header.style.left = '330px';
                    header.style.width = 'calc(100% - 330px)';
                    content.style.setProperty('margin-left', '330px', 'important');
                }
            });
        });
    </script>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
