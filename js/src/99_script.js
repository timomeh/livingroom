$(function() {
  var type;
  var $footerLinks = $('.footer_links');
  var $imprintLink = $('.imprint');
  var imprintText = $imprintLink.text();
  var imprintUrl = $imprintLink.attr('href');
  var btiTime;

  function backToImprint() {
    btiTime = setTimeout(function() {
      $imprintLink.text(imprintText);
      $imprintLink.attr('href', imprintUrl);
    }, 600);
  }


  $('.social_circle').hover(function() {
    type = $(this).attr('data-type');
    $footerLinks.toggleClass('type-' + type);
    $footerLinks.toggleClass('is-highlighted');
    $imprintLink.text($(this).attr('data-link'));
    $imprintLink.attr('href', "//" + $(this).attr('data-link'));
    clearTimeout(btiTime);
  }, function() {
    type = $(this).attr('data-type');
    $footerLinks.toggleClass('type-' + type);
    $footerLinks.toggleClass('is-highlighted');
    backToImprint();
  });

  $(".m-article").fitVids({ customSelector: "iframe[src^='http://youtube.googleapis.com']" });

  // Fixed browser history bug
  $("iframe").each(function() {
    $(this).attr('src', $iframe.attr('src'));
  });
});