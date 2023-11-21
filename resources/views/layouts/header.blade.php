<nav class="navbar navbar-expand navbar-light bg-success topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link  rounded-circle mr-3">
      <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="検索..." aria-label="検索" aria-describedby="basic-addon2">
          <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
              </button>
          </div>
      </div>
  </form>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

      {{-- ホームページ --}}
      <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" target="_blank" data-toggle="tooltip" data-placement="bottom" title="ホーム" role="button">
              <i class="fas fa-home fa-fw"></i>
          </a>
      </li>

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- ナビゲーションアイテム - ユーザー情報 -->
      <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
              @if(0)
                  <img class="img-profile rounded-circle" src="">
              @else
                  <img class="img-profile rounded-circle" src="{{asset('template/img/avatar.png')}}">
              @endif
          </a>
          <!-- ドロップダウン - ユーザー情報 -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  プロフィール
              </a>
              <a class="dropdown-item" href="">
                  <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  パスワードの変更
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                  {{ __('ログアウト') }}
              </a>

              <form id="logout-form" action="#" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>

  </ul>

</nav>
