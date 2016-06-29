<!-- ___Start Bottom___ -->
                    <div class="bottom container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="useful-links widget">
                                    <h3>Link</h3>
                                    <ul class="pull-left">
                                        <li><a href="/">Home</a></li>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#">Blogs</a></li>
                                    </ul>
                                    <ul class="pull-right">
                                        <li><a href="#">Contatti</a></li>
                                        <li><a href="#">Licenza & Privacy</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- ___Contact Us___ -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="bottom-contact widget">
                                    <h3>Contatti</h3>
                                    <div class="contact-info">
                                        <p><strong>Email :</strong> barabash97@gmail.com</p>
                                        <p><strong>Tel :</strong> +39 388 423 3639</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- ___News Letter___ -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="newsletter widget">
                                    <h3>Newsletter</h3>
                                    <form name="newsletter" action="/subscribe" method="post">
                                        
                                        {!! csrf_field() !!}
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control no-radius" placeholder="Indirizzo E-mail">
                                            <span class="input-group-btn  no-radius">
                                                <button class="btn btn-default" type="submit">Iscriviti</button>
                                            </span>
                                        </div><!-- /input-group -->
                                    </form>
                                    <p>Iscriviti per ricevere news del giorno.</p>
                                </div>
                            </div>
                            <!-- End Column -->

                            <!-- ___Start Social Icons Column___ -->
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <!-- ___Start Social Icons___ -->
                                <div class="bottom-social widget">
                                    <h3>Segui su:</h3>
                                    <div class="social-icon">
                                        <ul>
                                            <li>
                                                <a href="#0" class="connect-with-us facebook">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#0" class="connect-with-us twitter">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#0" class="connect-with-us youtube">
                                                    <i class="fa fa-youtube-play"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#0" class="connect-with-us instagram">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <p>Unisciti al nostro community per ricevere gli ultimi aggiornamenti</p>
                                </div><!-- End Social Icons -->
                            </div><!-- End Column -->
                        </div><!-- End Row -->
                    </div>
                    <!-- End Bottom -->