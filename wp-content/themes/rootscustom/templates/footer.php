<div class="page-footer">
    <div class="container">
      <div class="row">
        <div class="span3">
          <div class="widget">
            <span style="font-size: 24px; color: #889D07 !important; text-shadow: rgba(0,0,0,0.1) 0px 1px 1px">Bit</span><span style="font-size: 24px; color: #FA6801 !important; text-shadow: rgba(0,0,0,0.9) 0px 1px 1px">Crunched!</span></p>
            <address>
              <strong>BitCrunched!</strong><br>
              50 N Main St<br>
              Keyser, WV 26726
            </address>
            <p>
              <i class="icon-phone"></i> (304) 702-1720<br>
              <i class="icon-envelope-alt"></i> info@BitCrunched.com
            </p>
          </div>
        </div>
        <div class="span4">
          <div class="widget">
            <h5 class="widgetheading">From The Blog</h5>
            <?php query_posts('showposts=5'); ?>
            <?php while (have_posts()) : the_post(); ?>
            <ul>
              <li>

            <a href="<?php the_permalink() ?>" rel="bookmark" title="Go to <?php the_title(); ?>">
            <?php the_title(); ?>
            </a></li>
          </ul>
            <?php endwhile;?>

          </div>
        </div>

        <div class="span3">
          <div class="widget">
            <h5 class="widgetheading">Stay updated</h5>
            <p>
            Enter your email to subcribe to our newsletter.
            </p>
            <form class="subscribe">
              <div class="input-append">
                <input type="text" id="appendedInputButton" class="span2">
                <button type="submit" class="btn btn-warning">Subscribe</button>
              </div>
            </form>


            <h5 class="widgetheading">Social network</h5>
            <ul class="social-network">
              <li><a title="" data-placement="bottom" href="#" data-original-title="Twitter"><i class="icon-twitter-sign icon-2x"></i></a></li>
              <li><a title="" data-placement="bottom" href="#" data-original-title="Facebook"><i class="icon-facebook-sign icon-2x"></i></a></li>
              <li><a title="" data-placement="bottom" href="#" data-original-title="Linkedin"><i class="icon-linkedin-sign icon-2x"></i></a></li>
              <li><a title="" data-placement="bottom" href="#" data-original-title="Pinterest"><i class="icon-pinterest-sign icon-2x"></i></a></li>
              <li><a title="" data-placement="bottom" href="#" data-original-title="Google plus"><i class="icon-google-plus icon-2x"></i></a></li>
              <li><a title="" data-placement="bottom" href="#" data-original-title="Behance"><i class="font-icon-social-behance icon-circled active"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
  <div class="sub-footer">
      <div class="container">



            <p class="span pull-left"><span>&copy;2013 BitCrunched! All right reserved</span></p>





            <p class="span pull-right">Designed by <a target="_blank" href="http://www.bitcrunched.com">BitCrunched!</a></p>


</div>
    </div>
    <script type="text/javascript" charset="utf-8">
  // Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    direction: "horizontal"
  });
});
</script>

<?php wp_footer(); ?>
