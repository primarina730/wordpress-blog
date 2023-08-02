var ActiveSlideNum = 0;//現在のスライドの位置
var count = jQuery("li").length;//スライドの数
var imgWidth = jQuery("img").width();//imgのwidthを取得

jQuery(".next-btn").after("<div class='index-btns'></div>");

for (var i = 0; i < count; i++) {
	jQuery(".index-btns").append("<button class='index-btn'>" + (i + 1) + "</button>");
}

jQuery(".index-btn").eq(0).addClass("js-btn-active");

//現在のスライドが何枚目かによって前後のボタンを消去する関数
function toggleChangeBtn() {
	var slideIndex = jQuery(".index-btn").index(jQuery(".js-btn-active"));

	jQuery(".change-btn").show();
	if (slideIndex == 0) {
		jQuery(".prev-btn").hide();
	} else if (slideIndex == count - 1) {
		jQuery(".next-btn").hide();
	}
}

//change-btnクラスを持つボタンをクリックしたときの処理
jQuery(".change-btn").click(function () {
	var jQuerydisplaySlide = jQuery(".js-btn-active");

	jQuerydisplaySlide.removeClass("js-btn-active");
	if (jQuery(this).hasClass("next-btn")) {
		ActiveSlideNum++;
		jQuery("li").css("transform","translateX(" + -imgWidth * ActiveSlideNum + "px)");
		jQuerydisplaySlide.next().addClass("js-btn-active");
	} else {
		ActiveSlideNum--;
		jQuery("li").css("transform","translateX(" + -imgWidth * ActiveSlideNum + "px)");
		jQuerydisplaySlide.prev().addClass("js-btn-active");
	}
	toggleChangeBtn();
});

//index-btnクラスを持つボタンをクリックした時の処理
jQuery(".index-btn").click(function () {
	var clickedIndex = jQuery(".index-btn").index(jQuery(this));

	jQuery(".js-btn-active").removeClass("js-btn-active");
	jQuery(".index-btn").eq(clickedIndex).addClass("js-btn-active");

	ActiveSlideNum = clickedIndex;
	jQuery("li").css("transform","translateX(" + -imgWidth * ActiveSlideNum + "px)");
	toggleChangeBtn();
});