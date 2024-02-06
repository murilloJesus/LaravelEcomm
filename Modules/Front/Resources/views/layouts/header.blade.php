@php use Modules\Core\Helpers\Helper; @endphp
<header class="header shop">
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <div class="mobile-nav"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                  
                        <div class="col-lg-3">
                            <div class="all-category">
                                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
                                <ul class="main-category">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('product-cat',$category->slug) }}">{{ $category->title }}
                                                <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                            <ul class="sub-category">
                                                @foreach ($category->childrenCategories as $childCategory)
                                                    @include('front::layouts.child_category', ['child_category' => $childCategory])
                                                @endforeach
                                            </ul>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg navbar-light ">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <a href="{{ route('home') }}"><img src="images/logo.png" alt=""></a>
                                                    </div>
                                                </div>
                                             
                                                
                                                @auth
                                                    @if(Auth::user()->hasRole('super-admin'))
                                                        <li> <a href="{{route('admin')}}" target="_blank">DASHBOARD</a></li>
                                                    @else
                                                    <!-- Aqui estava a rota como user -->
                                                        <li> <a href="{{route('admin')}}" target="_blank">DASHBOARD</a></li>
                                                    @endif
                                                        <li><a href="{{route('logout')}}">LOGOUT</a></li>
                                                    @else
                                                        <li><a href="{{route('login')}}">LOGIN</a> </li>
                                                        <li><a href="{{route('register')}}">REGISTRAR</a></li>
                                                @endauth
                                         

                                                <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif">
                                                    <a href="{{route('product-grids')}}">PRODUTOS</a><span
                                                            class="new">Novos</span></li>

                                                

                                                <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a
                                                            href="{{route('contact')}}">ENTRE EM CONTATO</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>