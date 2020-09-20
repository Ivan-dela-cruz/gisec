@extends('base.base')
@section('title')
    GIS ECUCIENCIA
@endsection

@section('content')
    <!-- header-->
    <header class="main-header dark-header fs-header sticky">
        <div class="header-inner">
            <div class="logo-holder">
                <a href="{{\Illuminate\Support\Facades\URL::to('/')}}"><img src="images/logo.png" alt=""></a>
            </div>
            <form action="{{route('filter')}}" method="GET" autocomplete="off" role="search">
                <div class="header-search vis-header-search">
                    <div class="header-search-input-item">
                        <input name="description" type="text" placeholder="Palabras clave" value="@if(isset($query)){{$query}}@else @endif"/>
                        <input hidden name="title" type="text" placeholder="Palabras clave" value="0"/>
                        <input hidden name="location" type="text" placeholder="Palabras clave" value="0"/>
                    </div>
                    <div class="header-search-select-item">

                    </div>
                    <button type="submit" class="header-search-button">Buscar</button>
                </div>
                <div class="show-search-button"><i class="fa fa-search"></i> <span>Buscar</span></div>
            </form>
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
                            <h3>Resultados:
                                <span>
                                    @if(isset($query))
                                        {{$query}}
                                    @endif
                                </span>
                            </h3>
                            <div class="listing-view-layout">
                                <ul>
                                    <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                    <li><a class="list" href="#"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- listsearch-input-wrap  -->
                        <div class="listsearch-input-wrap fl-wrap">
                            <form action="{{route('filter')}}" method="GET" autocomplete="off" role="search">

                                <div class="listsearch-input-item">
                                    <i class="mbri-key single-i"></i>
                                    <input name="description" type="text" placeholder="Palabras clave?"
                                           value="@if(isset($query)){{$query}}@else @endif"/>
                                </div>
                                <div class="listsearch-input-item">
                                    <select name="title" data-placeholder="Location" class="chosen-select">
                                        <option value="0">Todas las localizaciones</option>
                                        <option value="Universidad">Universidad</option>
                                        <option value="Departamento">Departamento</option>
                                        <option value="Facultad">Facultad</option>
                                        <option value="Extensión">Extensión</option>
                                        <option value="Matriz">Matriz</option>
                                    </select>
                                </div>
                                <div class="listsearch-input-item">
                                    <select name="location" data-placeholder="All Categories" class="chosen-select">
                                        <option value="0">Todas las categorías</option>
                                        <option value="Centro de investigación">Centro de investigación</option>
                                        <option value="Area de Docentes">Area de Docentes</option>
                                        <option value="Departamento de desarrollo Ecuciencia">Departamento de desarrollo
                                            Ecuciencia
                                        </option>
                                        <option value="Biblioteca de la UTC">Biblioteca de la UTC</option>
                                    </select>
                                </div>

                                <div class="listsearch-input-text" id="autocomplete-container">


                                </div>
                                <input type="submit" class="button fs-map-btn" value="Actualizar"/>

                            </form>
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
