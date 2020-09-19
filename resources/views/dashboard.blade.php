@extends('base.base')
@section('title')
    Administración
@endsection
@section('content')
    <header class="main-header dark-header fs-header sticky">
        <div class="header-inner">
            <div class="logo-holder">
                <a href="{{\Illuminate\Support\Facades\URL::to('/')}}"><img src="{{asset('images/logo.png')}}"
                                                                            alt=""></a>
            </div>
            <div class="header-search vis-header-search">
                <div class="header-search-input-item">
                    <input type="text" placeholder="Palabras clave" value=""/>
                </div>
                <div class="header-search-select-item">
                    <select data-placeholder="Todas las categorías" class="chosen-select">
                        <option>Todas las categorías</option>
                        <option>Artículos</option>
                        <option>Revistas</option>
                        <option>Ivestigadores</option>
                        <option>Ponencias</option>
                        <option>Libros</option>
                    </select>
                </div>
                <button class="header-search-button" onclick="window.location.href='#'">Buscar</button>
            </div>
            <div class="show-search-button"><i class="fa fa-search"></i> <span>Buscar</span></div>


            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>

            <div class="nav-holder main-menu">
                <nav>
                    <ul>


                        @guest


                        @else
                            <li>
                                <a href="{{route('home')}}"> {{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>

                        @endguest


                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div id="wrapper">

        <div class="content">

            <section>

                <div class="container">

                    <div class="profile-edit-wrap">
                        <div class="profile-edit-page-header">
                            <h2>Gestión de artículos</h2>
                            <div class="breadcrumbs"><a href="#">Home</a><a
                                    href="#">Administración</a><span>Gestión de artículos</span></div>
                        </div>
                        @if (session('status'))
                            @if (session('status')!="error")
                                <div class="alert alert-success mr-3 ml-3">
                                    <a href="#" class="close" data-dismiss="alert"
                                       aria-label="close">&times;</a> {{ session('status') }}
                                </div>
                            @else
                                <div class="alert alert-danger mr-3 ml-3">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Se
                                    presentó un inconveniente con esta petición. Por favor contacta con el administrador
                                </div>

                            @endif
                        @endif
                        <form method="POST" action="{{ route('register-art') }}" role="form"
                              enctype="multipart/form-data">
                            @csrf()

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="fixed-bar fl-wrap">
                                        <div class="user-profile-menu-wrap fl-wrap">

                                            <div class="user-profile-menu">
                                                <h3>Panel de control</h3>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-gears"></i>Artículo</a>
                                                    </li>

                                                </ul>
                                            </div>

                                            <a href="#" class="log-out-btn">Salir</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">

                                    <div class="profile-edit-container">
                                        <div class="profile-edit-header fl-wrap">
                                            <h4>Mi artículos</h4>
                                        </div>
                                        <div class="custom-form">
                                            <label>Título <i class="fa fa-user-o"></i></label>
                                            <input name="title" type="text" placeholder="-----" value=""/>
                                            <label>Palabras clave<i class="fa fa-envelope-o"></i> </label>
                                            <input name="description" type="text" placeholder="Key 1; key 2; key 3;"
                                                   value=""/>
                                            <label>IP acceso<i class="fa fa-phone"></i> </label>
                                            <input name="ip" type="text" placeholder="0.0.0.0" value="{{$ip}}"/>
                                            <label> Localización <i class="fa fa-map-marker"></i> </label>
                                            <input name="location" type="text" placeholder="-----" value=""/>
                                            <label> URL buscador <i class="fa fa-globe"></i> </label>
                                            <input name="url" type="text" placeholder="www.buscador.com" value=""/>
                                            <label> Latitud <i class="fa fa-globe"></i> </label>
                                            <input name="latitude" type="text" placeholder="-0" value=""/>
                                            <label> Longitud <i class="fa fa-globe"></i> </label>
                                            <input name="longitude" type="text" placeholder="-0" value=""/>

                                            <label> Rating <i class="fa fa-globe"></i> </label>
                                            <input name="rating" type="text" placeholder="0" value=""/>

                                            <label> Vistas <i class="fa fa-globe"></i> </label>
                                            <input name="views" type="text" placeholder="0" value=""/>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-2">
                                    <div class="edit-profile-photo fl-wrap">
                                        <img id="respimg" src="images/avatar/1.jpg" class="respimg" alt="">
                                        <div class="change-photo-btn">
                                            <div class="photoUpload">
                                                <span><i class="fa fa-upload"></i> Imagen</span>
                                                <input id="img_art" name="image" type="file" class="upload">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn  big-btn  color-bg flat-btn">Guardar cambios<i
                                            class="fa fa-angle-right"></i></button>


                                </div>

                            </div>

                        </form>
                    </div>

                </div>

            </section>

            <div class="limit-box fl-wrap"></div>

            <section class="gradient-bg">
                <div class="cirle-bg">
                    <div class="bg" data-bg="images/bg/circle.png"></div>
                </div>
                <div class="container">
                    <div class="join-wrap fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Deseas volver al inicio?</h3>
                                <p>Pulsa en el botón.</p>
                            </div>
                            <div class="col-md-4"><a href="{{\Illuminate\Support\Facades\URL::to('/')}}"
                                                     class="join-wrap-btn">Inicio <i
                                        class="fa fa-envelope-o"></i></a></div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        function readFile() {
            if (this.files && this.files[0]) {
                var FR = new FileReader();
                FR.addEventListener("load", function (e) {
                    var_img_category = e.target.result;
                    document.getElementById("respimg").src = e.target.result;
                    //document.getElementById("b64").innerHTML = e.target.result;
                });
                FR.readAsDataURL(this.files[0]);
            }
        }

        document.getElementById("img_art").addEventListener("change", readFile);
    </script>
@endsection
