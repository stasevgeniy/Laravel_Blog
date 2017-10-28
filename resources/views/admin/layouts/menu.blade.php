
<nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'home/add' ? 'active' : '' }}" href="{{ url('home/add') }}">Новая запись</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() == 'home/edit' || Route::currentRouteName() == 'EditPost' ? 'active' : '' }}" href="{{ url('home/edit') }}">Редактирование записей</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ url('/logout') }}">Выход</a>
            </li>
        </ul>
 </nav>