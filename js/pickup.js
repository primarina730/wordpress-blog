jQuery(function () {
  var rightButton = jQuery("#pickup .rightbutton"),
    leftButton = jQuery("#pickup .leftbutton"),
    scroll = jQuery("#pickup .scroll-left"),
    scrollContent = jQuery("#pickup .scroll-content"),
    scrollWrapper = jQuery("#pickup .scroll-wrapper");
  if (scrollContent.width() < scrollWrapper.width()) {
    rightButton.hide();
  } else {
  }
  //右へ
  rightButton.click(function () {
    scroll.animate(
      {
        scrollLeft: scroll.scrollLeft() + scroll.width(),
      },
      300
    );
    return false;
  });
  //左へスクロールで表示
  scroll.scroll(function () {
    if (jQuery(this).scrollLeft() < scrollContent.width() - scroll.width()) {
      rightButton.fadeIn();
    } else {
      rightButton.fadeOut();
    }
  });
  //左へ
  leftButton.click(function () {
    scroll.animate(
      {
        scrollLeft: scroll.scrollLeft() - scroll.width(),
      },
      300
    );
    return false;
  });
  //右へスクロールで表示
  scroll.scroll(function () {
    if (jQuery(this).scrollLeft() > 0) {
      leftButton.fadeIn();
    } else {
      leftButton.fadeOut();
    }
  });
});
