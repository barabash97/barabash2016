<!-- ___Lascia un commento___ -->
    <div data-scroll-index="5" class="each-section leave-a-comment">
        <h3>Lascia un commento</h3>
        <div class="comment-form common-border">
            <div class="row">
               
                    <!-- ___Send Message___ -->
                    <div class="col-lg-12">
                        <input type="hidden" name="token" id="_token" value="{!! csrf_token() !!}"/>
                        <div class="form-group">
                            <label for="message">Messaggio</label>
                            <textarea id="text_comment" rows="7" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="button" onclick="addComment()">Pubblicare</button>
                        </div>
                    </div>
                
            </div><!-- End Row -->
        </div><!-- End Contact Form -->
    </div>
    <!-- End Lascia un commento -->
    
   