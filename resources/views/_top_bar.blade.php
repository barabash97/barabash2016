 <!-- ___Start Top Bar___ -->
                    <div class="top-bar">
                        <div class="top-bar-head">
                            <div class="search">
                                <i class="pe-7s-search showSingle" id="1"></i>
                                <p>Che cosa stai cercando?</p>
                            </div>


                            <div class="login-mail pull-right showSingle" id="3">
                                <i class="pe-7s-user"></i>
                            </div>
                        </div>
                        <!-- End Top Bar Head -->

                        <!-- ___Start Top Bar Body___ -->
                        <div class="top-bar-body">
                            <div class="search-body targetDiv" id="div1">
                                <p>Che cosa stai cercando?</p>
                                <form name="search" action="/search" method="get">
                                    <input type="text" name="query_search" class="form-control no-radius" placeholder="Esempio: Che cos'è Vladicms?">
                                </form>
                            </div>

                            <!-- ___Start Profile Body___ -->
                            <div class="mail-body targetDiv" id="div3">
                                <div class="row">
                                    <img src="{{asset('user_images/'.Auth::user()->path_image)}}" width="60" height="60">
                                    <a href="/user/{{Auth::user()->id}}/gravatar">Cambiare immagine</a>
                                    <h2> {{Auth::user()->firstname}} {{Auth::user()->lastname}}</h2>
                                    <p><strong>E-mail: </strong>{{Auth::user()->email}}</br>
                                        <strong>Username: </strong>{{Auth::user()->username}}</br>
                                        <a href="/logout">Logout</a></p>
                                </div><!-- End Row -->
                            </div><!-- End Profile Body -->
                        </div><!-- End Top Bar Body -->
                    </div>
                    <!-- End Top Bar -->