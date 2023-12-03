<footer>
    <div id="footer">
        <div class="footerTop">

        </div>
        <div class="footerCenter">
            <div class="FooterMiddle">
                <div class="ticiContainer">
                    <div class="linkler">
                        <div class="blink">
                            <ul>
                                <li><span><a href="{{ route('index') }}">Anasayfa</a></span>
                                </li>
                                <li><span><a href="{{ route('about-us') }}">Hakkımızda</a></span>
                                </li>
                                <li><span><a href="{{ route('categories') }}">Ürünler</a></span>
                                </li>
                                <li><span><a href="{{ route('references') }}">Referanslar</a></span>
                                </li>
                                {{-- <li><span><a href="#">Üretim</a></span> --}}
                                </li>
                                <li><span><a href="{{ route('contact') }}">İletişim</a></span>

                                </li>
                                <li><span><a href="javascript:void(0)">Bizi Takip Edin</a></span>
                                        <div class="socialdiv">
                                            <ul>
                                                <li><a href="{{$setting->facebook_link}}"
                                                        target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{$setting->twitter_link}}" target="_blank"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li><a href="{{$setting->instagram_link}}" target="_blank"><i
                                                            class="fab fa-instagram"></i></a></li>
                                                <li><a href="{{$setting->linkedin_link}}"
                                                        target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                            </ul>
                                        </div>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="FooterBottom">
                <div class="copy">© Copyright 2023 Querry Software Development
                </div>
            </div>
            <div class="product-social-icon-wrapper" id="paylasModal" style="display: none;">
                <div class="pcon">
                    <div class="paylasTitle">
                        <p>SOSYAL MEDYA</p>
                        <ul>
                            <li><a class="product_social_icons" content="facebook" href="javascript:;"><i
                                        class="fa fa-facebook-f"></i></a></li>
                            <li><a class="product_social_icons" content="twitter" href="javascript:;"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a class="product_social_icons" content="pinterest" href="javascript:;"><i
                                        class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
