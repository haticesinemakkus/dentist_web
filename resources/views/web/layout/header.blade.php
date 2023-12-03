    <!--header area start-->
    <header class="header_area">

        <!--header middel start-->
        <div class="header_middel">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-5">
                        <div class="logo">
                            <a href="{{route('index')}}"><img src="{{asset('frontend/assets/img/logo/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="search_bar">
                            <form action="#">
                                <input placeholder="Arayın..." type="text">
                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header middel end-->

        <!--header bottom satrt-->
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="header_static">
                            <div class="main_menu_inner">
                                <div class="main_menu">
                                    <div class="navigation active">
                                        <div>
                                            <div id="divUcTopMenu">
                                                <div class="TempMenu">
                                                    <div></div>
                                                </div>

                                                <ul id="ResimliMenu1" class="ResimliMenu1 navUl">
                                                    <li>
                                                        <a target="_self" href="{{ route('index') }}"
                                                            title="#ANASAYFA"><img
                                                                src="{{ env('CDN_URL') . '/frontend/assets/img/menuresim2.png' }}"
                                                                class="loaded"><span>ANASAYFA</span></a>
                                                    </li>
                                                    <li>
                                                        <a target="_self" href="{{ route('about-us') }}"
                                                            title="#HAKKIMIZDA"><span>HAKKIMIZDA</span></a>
                                                    </li>
                                                    <li>
                                                        <a target="_self" href="{{ route('categories') }}"
                                                            title="#ÜRÜNLER"><span>ÜRÜNLER</span></a>
                                                    </li>
                                                    <li>
                                                        <a target="_self" href="{{ route('references') }}"
                                                            title="#REFERANSLAR"><span>REFERANSLAR</span></a>
                                                    </li>
                                                    {{-- <li>
                                                        <a target="_self" href="{{ route('contact') }}"
                                                            title="#ÜRETİM"><span>ÜRETİM</span></a>
                                                    </li> --}}
                                                    <li>
                                                        <a target="_self" href="{{ route('contact') }}"
                                                            title="#İLETİŞİM"><span>İLETİŞİM</span></a>
                                                    </li>
                                                </ul>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--header bottom end-->
    </header>
    <!--header area end-->
