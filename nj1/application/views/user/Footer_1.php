<footer class="footer" style="background: #FCFCFC">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Naija Coin
                        </a>
                    </li>
                    <li>
                        <a href="#">
                           About Us
                        </a>
                    </li>
                    <li>
                        <a href="#">
                           
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Terms & Conditions
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright pull-right">
                &copy; 2018, made with <i class="material-icons" style="color: darkred">favorite</i> by <a href="https://www.cryptolaunch.in/" target="_blank">cryptolaunch.in</a>
            </div>
        </div>
    </footer>
</div>

<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-simple">Nice Button</button>
                <button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--  End Modal -->


</body>
    <!--   Core JS Files   -->
    <script src="<?=base_url()?>assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="<?=base_url()?>assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="<?=base_url()?>assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="<?=base_url()?>assets/js/material-kit.js" type="text/javascript"></script>

    <script type="text/javascript">

        $().ready(function(){
            // the body of this function is in assets/material-kit.js
            materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }

        });
    </script>
</html>
