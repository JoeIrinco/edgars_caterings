<section data-bs-version="5.1" class="footer6 cid-tk1DSknmNY" once="footers" id="footer6-29">

    

    

    <div class="container">
        <div class="row content mbr-white">
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7">
                    <strong>Address</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style display-7">Calipahan, Talavera, Philippines, 3114</p> <br>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 mt-4 display-7">
                    <strong>Contacts</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-7">
                    Email: admin@edc.com<br>
                    Phone: 0956 368 3322<br></p>
            </div>
            <div class="col-12 col-md-3 mbr-fonts-style display-7">
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 display-7"></h5>
                <ul class="list mbr-fonts-style mb-4 display-4"></ul>
                <h5 class="mbr-section-subtitle mbr-fonts-style mb-2 mt-5 display-7">
                    <strong><br></strong><br><strong>Feedback</strong>
                </h5>
                <p class="mbr-text mbr-fonts-style mb-4 display-7">
                    Please send us your ideas, bug reports, suggestions! Any feedback would be appreciated.
                </p>
            </div>
            <div class="col-12 col-md-6">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCZI5F_k6S1k46ujh0SNrapM89f7mJxd30&amp;q=Calipahan, Talavera, Philippines, 3114" allowfullscreen=""></iframe></div>
            </div>
            <div class="col-md-6">
                <div class="social-list align-left">
                    <div class="soc-item">
                        <a href="https://twitter.com" target="_blank">
                            <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.facebook.com" target="_blank">
                            <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://www.youtube.com" target="_blank">
                            <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    <div class="soc-item">
                        <a href="https://instagram.com" target="_blank">
                            <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                        </a>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="col-sm-12 copyright pl-0">
                <p class="mbr-text mbr-fonts-style mbr-white display-7">
                    © Copyright 2022 EDC- All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mainly scripts -->
<script src="{{url('local/public/assets/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('local/public/assets/js/popper.min.js')}}"></script>
<script src="{{url('local/public/assets/js/bootstrap.js')}}"></script>
<script src="{{url('local/public/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{url('local/public/assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{url('local/public/assets/js/inspinia.js')}}"></script>
<script src="{{url('local/public/assets/js/plugins/pace/pace.min.js')}}"></script>
<script src="{{url('local/public/assets/js/plugins/wow/wow.min.js')}}"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '#navbar',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
            $("#navbar").collapse('hide');
        });
    });

    var cbpAnimatedHeader = (function() {
        var docElem = document.documentElement,
                header = document.querySelector( '.navbar-default' ),
                didScroll = false,
                changeHeaderOn = 200;
        function init() {
            window.addEventListener( 'scroll', function( event ) {
                if( !didScroll ) {
                    didScroll = true;
                    setTimeout( scrollPage, 250 );
                }
            }, false );
        }
        function scrollPage() {
            var sy = scrollY();
            if ( sy >= changeHeaderOn ) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }
        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }
        init();

    })();

    // Activate WOW.js plugin for animation on scrol
    new WOW().init();

</script>

{{-- <script src="local/public/assets/bootstrap/js/bootstrap.bundle.min.js"></script>   --}}
<script src="{{public_path('assets/smoothscroll/smooth-scroll.js')}}"></script>  
<script src="{{public_path('assets/ytplayer/index.js')}}"></script>
<script src="{{public_path('assets/dropdown/js/navbar-dropdown.js')}}"></script>  
{{-- <script src="local/public/assets/theme/js/script.js"></script>   --}}

</body>
</html>
