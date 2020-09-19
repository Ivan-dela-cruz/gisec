@extends('base.base')
@section('title')
    GIS ECUCIENCIA
@endsection

@section('content')
    <!-- header-->
    <header class="main-header dark-header fs-header sticky">
        <div class="header-inner">
            <div class="logo-holder">
                <a href="#"><img src="images/logo.png" alt=""></a>
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
                <button class="header-search-button" onclick="window.location.href='listing.html'">Buscar</button>
            </div>
            <div class="show-search-button"><i class="fa fa-search"></i> <span>Buscar</span></div>

            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
            <!-- nav-button-wrap end-->
            <!--  navigation -->
            <div class="nav-holder main-menu">

            </div>
            <!-- navigation  end -->
        </div>
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    @if (Route::has('login'))

                        @auth
                            <li>
                                <a href="{{route('home')}}">Panel de control</a>
                            </li>
                        @else
                            <li>
                                <a href="{{route('login')}}">Iniciar sesión</a>
                            </li>
                            <li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Registrarse</a>
                                @endif

                            </li>

                        @endauth

                    @endif


                </ul>
            </nav>
        </div>
    </header>
    <!--  header end -->
    <!-- wrapper -->
    <div id="wrapper">
        <div class="content">
            <!-- Map -->
            <div class="map-container column-map right-pos-map">
                <div id="map-main"></div>
                <ul class="mapnavigation">
                    <li><a href="#" class="prevmap-nav">Anterior</a></li>
                    <li><a href="#" class="nextmap-nav">Siguiente</a></li>
                </ul>
                <div class="scrollContorl mapnavbtn" title="Enable Scrolling"><span><i class="fa fa-lock"></i></span>
                </div>
            </div>
            <!-- Map end -->
            <!--col-list-wrap -->
            <div class="col-list-wrap left-list">
                <div class="listsearch-options fl-wrap" id="lisfw">
                    <div class="container">
                        <div class="listsearch-header fl-wrap">
                            <h3>Resultados: <span>Artículo académico</span></h3>
                            <div class="listing-view-layout">
                                <ul>
                                    <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                    <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- listsearch-input-wrap  -->
                        <div class="listsearch-input-wrap fl-wrap">
                            <div class="listsearch-input-item">
                                <i class="mbri-key single-i"></i>
                                <input type="text" placeholder="Palabras clave?" value=""/>
                            </div>
                            <div class="listsearch-input-item">
                                <select data-placeholder="Location" class="chosen-select">
                                    <option>Todas las localizaciones</option>
                                    <option>Universidad</option>
                                    <option>Departamento</option>
                                    <option>Facultad</option>
                                    <option>Extensión</option>
                                    <option>Matriz</option>
                                </select>
                            </div>
                            <div class="listsearch-input-item">
                                <select data-placeholder="All Categories" class="chosen-select">
                                    <option>Todas las categorías</option>
                                    <option>Artículo</option>
                                    <option>Revista</option>
                                    <option>Libro</option>
                                    <option>Tesis</option>
                                    <option>Conferencia</option>
                                </select>
                            </div>
                            <div class="listsearch-input-text" id="autocomplete-container">
                                <label><i class="mbri-map-pin"></i> Ingrese la dirección </label>
                                <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input"
                                       class="qodef-archive-places-search" value=""/>
                                <a href="#" class="loc-act qodef-archive-current-location"><i
                                        class="fa fa-dot-circle-o"></i></a>
                            </div>

                            <button class="button fs-map-btn">Actualizar</button>

                        </div>
                        <!-- listsearch-input-wrap end -->
                    </div>
                </div>
                <!-- list-main-wrap-->
                <div class="list-main-wrap fl-wrap card-listing">
                    <a class="custom-scroll-link back-to-filters btf-l" href="#lisfw"><i
                            class="fa fa-angle-double-up"></i><span>Volver a filtro anterior</span></a>
                    <div class="container">
                        <!-- listing-item -->
                        <span hidden> {{$cont = 0}}</span>
                        @foreach($searches as $search)
                            <div class="listing-item">
                                <article class="geodir-category-listing fl-wrap">
                                    <div class="geodir-category-img">
                                        <img src="images/all/8.png" alt="">
                                        <div class="overlay"></div>
                                        <div class="list-post-counter"><span>{{$search->rating}}</span><i
                                                class="fa fa-heart"></i></div>
                                    </div>
                                    <div class="geodir-category-content fl-wrap">
                                        <a class="listing-geodir-category" href="#">
                                            Artículo académico
                                        </a>
                                        <div class="listing-avatar"><a href="author-single.html"><img
                                                    src="images/avatar/2.png" alt=""></a>
                                            <span
                                                class="avatar-tooltip">Publicado por   <strong>Lisa Smith</strong></span>
                                        </div>
                                        <h3><a href="#"> {{$search->title}}</a></h3>
                                        <p>Palabras clave : {{$search->description}}.</p>
                                        <div class="geodir-category-options fl-wrap">
                                            <div class="listing-rating card-popup-rainingvis"
                                                 data-starrating2="{{$search->rating}}">
                                                <span>({{$search->views}} vistas)</span>
                                            </div>
                                            <div class="geodir-category-location"><a href="#{{$cont}}" class="map-item"><i
                                                        class="fa fa-map-marker" aria-hidden="true"></i>
                                                    Laboratorios</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <span hidden>{{$cont ++}}</span>
                        @endforeach


                    </div>
                    <a class="load-more-button" href="#">Cargar más <i class="fa fa-circle-o-notch"></i> </a>
                </div>
                <!-- list-main-wrap end-->
            </div>
            <!--col-list-wrap -->
            <div class="limit-box fl-wrap"></div>
            <!--section -->
            <section class="gradient-bg">
                <div class="cirle-bg">
                    <div class="bg" data-bg="images/bg/circle.png"></div>
                </div>
                <div class="container">
                    <div class="join-wrap fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!--section end -->
        </div>
        <!--content end -->
    </div>
    <!-- wrapper end -->
@endsection

@section('scripts')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCleF-ZlouBtXF3CASe-9p7HklGPAlW0zc&libraries=places&callback=initAutocomplete"></script>
    <script type="text/javascript" src="{{asset('js/map_infobox.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/markerclusterer.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/maps.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {


        });
    </script>
@endsection
