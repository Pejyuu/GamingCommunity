<!-- Sidebar -->
<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
            <a class="sidebar-brand" href="{{ route('index') }}" alt="Go to site" title="Go to Site">
                OppLANere <i class="fas fa-sign-out-alt"></i>
            </a>

        <h6>Administrasjon</h6>

            <a href="{{route('dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

        <h6>Filer og Media</h6>
            <a href="{{route('filemanager')}}"><i class="far fa-file-alt"></i> File Manager</a>
            <a href="{{route('gallery')}}"><i class="far fa-images"></i> Media Gallery</a>

            @can('manage.users')

            <h6>Brukeradministrasjon</h6>
            <button class="dropdown-btn"><i class="fas fa-users"></i> Users <i class="fa fa-caret-down"></i></button>
            <div class="dropdown-container">
              <a href="{{ route('user.index') }}">Users</a>
              <a href="{{route('role.index')}}">Roles</a>
              <a href="{{route('permission.index')}}">Permissions</a>
            </div>
            @endcan

      <h6>Redaksjonen</h6>
        <a href="{{ route('page.index')}}" ><i class="far fa-file-alt"></i> Pages</a>
        <a href="{{ route('post.index')}}" ><i class="far fa-newspaper"></i> Poster</a>


      <h6>Kommende features</h6>


        <a href="#" class="disabled"><i class="far fa-times-circle"></i> Butikk</a>
        <a href="#" class="disabled"><i class="far fa-times-circle"></i> Events</a>

    </ul>
</div>
<!-- /#sidebar-wrapper -->
