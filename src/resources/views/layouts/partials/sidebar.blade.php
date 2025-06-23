    {{-- СДЕСЬ МОЖНО ДОБАВЛЯТЬ ИЩЕ ПУНКТЫ МЕНЮ --}}
    
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <a href="#">
                <img class="logo__image" width="85" src="{{ asset('vendor/layout-package/img/admin-panel.png') }}"
                    alt="logo"></a>
            <i class="bi bi-list burger" id="burger"></i>
        </div>
        <nav class="nav flex-column sidebar-nav" style="margin-top: 5px;">
            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}"
           href="{{ route('dashboard.index') }}">
                <i class="bi bi-speedometer2 me-2" style='margin-left: 5px;'></i><span class="menu-span">Dashboard</span>
            </a>
            <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
           href="{{ route('users.index') }}">
                <i class="bi bi-people me-2" style='margin-left: 5px;'></i><span class="menu-span">Users</span>
            </a>
        </nav>
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
