<div id="menu-area" class="menu-area toogle-sidebar-sections">
    <div class="menu-head">
        <a href="#0" class="accordion-toggle">Menu <span class="toggle-icon"><i class="fa fa-bars"></i></span></a>
        <div class="accordion-content">
            <div class="menu-body">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="sm-post"><a href="#0">Gestione del blog</a>
                        <ul class="drop-menu">
                            <li><a href="{{route('user_blogs', ['id' => Auth::user()->id])}}">Miei Blogs</a></li>
                            <li><a href="/addblog">Creare un nuovo blog</a></li>
                            
                        </ul>
                        <li><a href="/blogs">Blogs</a></li>
                    <li><a href="/users">Utenti</a></li>
                    <li><a href="/dialogs">Conversazioni</a></li>
                    </li>

                </ul>
            </div><!-- End Menu Body -->
        </div><!-- End According Content -->
    </div><!-- End Menu Head -->
</div>