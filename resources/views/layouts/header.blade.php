
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.html" class="brand-logo">
                <img class="logo-abbr" src="{{ url('images/logo-white.png')}}" alt="">
                <img class="logo-compact" src="{{ url('images/logo-text-white.png')}}" alt="">
                <img class="brand-title" src="{{ url('images/logo-text-white.png')}}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">


                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">

                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Bienvenue {{ Auth::user()->name }}</li>

        @if (Auth::user()->user_type == 1)

                    <li><a class="ai-icon @if(Request::segment(2) == 'dashboard') active @endif" href="{{ url('admin/dashboard') }}" aria-expanded="false" >
							<i class="la la-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>

					<li><a class="ai-icon @if(Request::segment(2) == 'admin') active @endif" href="{{ url('admin/admin/list') }}" aria-expanded="false">
							<i class="la la-table"></i>
							<span class="nav-text">Admin</span>
						</a>
                    </li>

                    <li><a class="ai-icon @if(Request::segment(2) == 'student') active @endif" href="{{ url('admin/student/list') }}" aria-expanded="false">
                        <i class="la la-users"></i>
                        <span class="nav-text">Etudiant</span>
                    </a>
                    </li>

					<li><a class="ai-icon @if(Request::segment(2) == 'teacher') active @endif" href="{{ url('admin/teacher/list') }}" aria-expanded="false">
							<i class="la la-user"></i>
							<span class="nav-text">Enseignant</span>
						</a>
                    </li>

					<li><a class="ai-icon @if(Request::segment(2) == 'filiere') active @endif" href="{{ url('admin/filiere/list') }}" aria-expanded="false">
							<i class="la la-graduation-cap"></i>
							<span class="nav-text">Filière</span>
						</a>
                    </li>

					<li><a class="ai-icon @if(Request::segment(2) == 'matiere') active @endif" href="{{ url('admin/matiere/list') }}" aria-expanded="false">
							<i class="la la-book"></i>
							<span class="nav-text">Matière</span>
						</a>
                    </li>

                    <li><a class="ai-icon @if(Request::segment(2) == 'assign_subject') active @endif" href="{{ url('admin/assign_subject/list') }}" aria-expanded="false">
                        <i class="la la-plus-square-o @if(Request::segment(2) == 'assign_subject') active @endif"></i>
                        <span class="nav-text"> Assigner Matière</span>
                    </a>
                   </li>

                    <li><a class="ai-icon @if(Request::segment(2) == 'class_timetable') active @endif" href="{{ url('admin/class_timetable/list') }}" aria-expanded="false">
                        <i class="la la-calendar @if(Request::segment(2) == 'admin') active @endif"></i>
                        <span class="nav-text"> Emploi du temps</span>
                    </a>
                    </li>

    @elseif (Auth::user()->user_type == 2)


                <li><a class="ai-icon @if(Request::segment(2) == 'dashboard') active @endif" href="{{ url('teacher/dashboard') }}" aria-expanded="false" >
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
               </li>

               <li><a class="ai-icon @if(Request::segment(2) == 'my_student') active @endif" href="{{ url('teacher/my_student') }}" aria-expanded="false">
                <i class="la la-users"></i>
                <span class="nav-text">Mes étudiants</span>
               </a>
              </li>

                <li><a class="ai-icon @if(Request::segment(2) == 'addFile') active @endif" href="{{ url('teacher/my_timetable') }}" aria-expanded="false">
                    <i class="la la-calendar @if(Request::segment(2) == 'admin') active @endif"></i>
                    <span class="nav-text"> Mon emploi du temps</span>
                </a>
                </li>

                <li><a class="ai-icon @if(Request::segment(2) == 'my_timetable') active @endif" href="{{ url('teacher/addFile') }}" aria-expanded="false">
                    <i class="fa fa-upload @if(Request::segment(2) == 'admin') active @endif"></i>
                    <span class="nav-text"> Ajouter des documents</span>
                </a>
                </li>
                {{-- <i class="fa fa-upload color-success"></i> --}}

    @elseif (Auth::user()->user_type == 3)

                <li><a class="ai-icon @if(Request::segment(2) == 'dashboard') active @endif" href="{{ url('student/dashboard') }}" aria-expanded="false" >
                    <i class="la la-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li><a class="ai-icon @if(Request::segment(2) == 'mysubject') active @endif" href="{{ url('student/mysubject') }}" aria-expanded="false">
                <i class="la la-book"></i>
                <span class="nav-text">Mes Matières</span>
                </a>
                </li>

             <li><a class="ai-icon @if(Request::segment(2) == 'my_timetable') active @endif" href="{{ url('student/my_timetable') }}" aria-expanded="false">
                <i class="la la-calendar @if(Request::segment(2) == 'admin') active @endif"></i>
                <span class="nav-text"> Emploi du temps</span>
            </a>
            </li>
            <li><a class="ai-icon @if(Request::segment(2) == 'readFile') active @endif" href="{{ url('student/readFile') }}" aria-expanded="false">
                <i class="fa fa-download @if(Request::segment(2) == 'readFile') active @endif"></i>
                <span class="nav-text"> Télécharger les cours disponibles</span>
            </a>
            </li>
            {{-- <i class="fa fa-download"></i> --}}

    @endif

            <li><a class="ai-icon" href="{{ url('logout') }}" aria-expanded="false">
                <svg id="icon-logout" style="color: black !important"xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" style="stroke-dasharray: 29px, 49px; stroke-dashoffset: 0px; color: black !important"></path><path d="M16,17L21,12L16,7" style="stroke-dasharray: 15px, 35px; stroke-dashoffset: 0px;"></path><path d="M21,12L9,12" style="stroke-dasharray: 12px, 32px; stroke-dashoffset: 0px;"></path></svg>
                <span class="nav-text">Déconnexion</span>
            </a>
          </li>






			    </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


