<?php $theme = wp_get_theme(); ?>
  <footer class="b-footer">
    <section class="footer_about">
      <img class="about_image" src="<?= get_stylesheet_directory_uri() ?>/img/facey.jpg" srcset="<?= get_stylesheet_directory_uri() ?>/img/facey.jpg, <?= get_stylesheet_directory_uri() ?>/img/facey@2x.jpg 2x" alt="Timo Mämecke" width="94" height="94">
      <p>Hi!<br>Ich bin Timo Mämecke, so ein Entwickler und Student. Ich bin immer müde und spreche ziemlich laut. <a href="/timo">mehr…</a></p>
    </section>
    <section class="footer_links">
      <div class="inner">
        <ul class="links_social">
          <li><a class="social_circle type-twitter" href="//twitter.com/timomeh" data-type="twitter" data-link="twitter.com/timomeh">
            <svg><use xlink:href="#shape-twitter"></use></svg>
          </a></li>
          <li><a class="social_circle type-facebook" href="//facebook.com/timo.maemecke" data-type="facebook" data-link="fb.me/timo.maemecke">
            <svg><use xlink:href="#shape-facebook"></use></svg>
          </a></li>
          <li><a class="social_circle type-instagram" href="//instagram.com/timomeh" data-type="instagram" data-link="instagr.am/timomeh">
            <svg><use xlink:href="#shape-instagram"></use></svg>
          </a></li>
          <li><a class="social_circle type-github" href="//github.com/timomeh" data-type="github" data-link="github.com/timomeh">
            <svg><use xlink:href="#shape-github"></use></svg>
          </a></li>
        </ul>
        <a href="/impressum" data-link="/impressum" class="imprint">Impressum</a>
      </div>
    </section>
  </footer>
  <!--<script>function loadCSS(e,t,n){"use strict";function r(){for(var t,i=0;i<d.length;i++)d[i].href&&d[i].href.indexOf(e)>-1&&(t=!0);t?o.media=n||"all":setTimeout(r)}var o=window.document.createElement("link"),i=t||window.document.getElementsByTagName("script")[0],d=window.document.styleSheets;return o.rel="stylesheet",o.href=e,o.media="only x",i.parentNode.insertBefore(o,i),r(),o}
  loadCSS("/wp-content/themes/livingroom/css/style.min.css?v=<?= $theme->get('Version'); ?>");</script>
  <noscript><link rel="stylesheet" href="/wp-content/themes/livingroom/css/style.min.css?v=<?= $theme->get('Version'); ?>"></noscript>-->
  <script src="<?= get_stylesheet_directory_uri() ?>/js/script.min.js?v=<?= $theme->get('Version'); ?>" async></script>
</body>
</html>