<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('pages.admin') }}">管理首页</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('news.index') }}">新闻管理</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('teams.index') }}">队伍管理</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('games.index') }}">赛事管理</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('photos.index') }}">图片管理</a></li>
            </ul>

            <ul class="navbar-nav navbar-right">
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
                @else
                    <a class="dropdown-item" id="logout" href="#">
                        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('您确定要退出吗？');">
                            {{ csrf_field() }}
                            <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                        </form>
                    </a>
                @endguest
            </ul>
        </div>
    </div>
</nav>