<div class="container">
  <nav class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ URL::route('home') }}">FOS - Full of Sh... Stock :)</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
      <ul class="nav navbar-nav">
        <li><a href="{{ URL::route('home') }}">Início</a></li>
        @if(Auth::check())
          @if(Auth::user()->role == 'admin')
            @include('layout.navigation.admin')
          @elseif(Auth::user()->role == 'super')
            @include('layout.navigation.super')
          @else
            @include('layout.navigation.user')
          @endif
        @else
          <li><a href="{{ URL::route('login-page') }}">Entrar</a></li>
        @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
          <!-- LOGOUT BUTTON -->
          <li><a href="{{ URL::route('logout-page') }}">Sair</a></li>
          @if(Auth::user()->role == 'admin' || Auth::user()->role == 'super')
            @if(Notification::getNotifications() >= 1)
              <li ><a href="{{ URL::route('notif-page') }}"><i  style="cursor:pointer;color:#b60000" class="glyphicon glyphicon-exclamation-sign">{{ Notification::getNotifications() }}</i></a></li>
            @else
              <li><a><i style="cursor:pointer" class="glyphicon glyphicon-exclamation-sign"></i></a></li>
            @endif
          @endif
        @endif
        <li><a class="pull-left">
          @if(Auth::check())
            @if(Auth::user()->role == 'admin')
              {{ 'Administrador' }}
            @elseif(Auth::user()->role == 'super')
              {{ 'Supervisor' }}
            @else
              {{ 'Cliente' }}
            @endif
          @endif
        </a></li>
      </ul>
  </nav>
</div> <!--.container-fluid -->
