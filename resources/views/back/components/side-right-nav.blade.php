<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Аккаунт</h5>
        <ul class="nav flex-column">
            <li class="nav-item"><a href="#" class="nav-link pl-0"><em class="fa fa-cog mr-2"></em> Настройки</a></li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link pl-0" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><em class="fa fa-sign-out-alt mr-2"></em> Выход</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</aside>
