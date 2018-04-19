/*imgLiquid*/
// $(".imgLiquidFill").imgLiquid();

/*about right dot*/
// $(function () {
//     $("a[href^=#]:not([href=#])").click(function() {
//         var target = $(this.hash);
//         $("html,body").animate({
//             scrollTop: target.offset().top
//         }, 1000);
//         return false;
//     });

// });

/*prodcut_intro_list*/
// $('#prodcut_intro_list').slick({
//     infinite: true,
//     speed: 300,
//     slidesToShow: 3,
//     slidesToScroll: 3,
//     responsive: [
//         {
//             breakpoint: 900,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 2
//             }
//         },
//         {
//             breakpoint: 550,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1
//             }
//         }
//     ]
// });
// $('#product_backoffice_unit').slick({
//     dots: true,
//     arrows: false,
//     infinite: true,
//     speed: 300,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     cssEase: 'linear'
// });

/*login-windows-height*/
$(function(){
  var h = $(window).height();
  $(".login_body").css("height", h);
});

$(function () {
  $(window).scroll(function () {
    var scrollVal = $(this).scrollTop();
    //console.log(scrollVal);
    if( scrollVal != 0 ){
      $('.header').css('background-color','rgba(21,25,45,0.88)');
      //$('.FaloLogo').css({ fill: "#a58316" });
      $(".FaloLogo").attr("src","../../../static/images/logoW2.png");
    }else{
      $('.header').css('background-color','transparent');
      //$('.FaloLogo path').css({ fill: "#fff" });
      $(".FaloLogo").attr("src","../../../static/images/logoW.png");
    }
  });
});
//logo list
$(function () {
  $('.menu').on('click', function() {
    $('.bar').toggleClass('animate');
    $('.titleList').slideToggle();
  });
  $(window).resize(function() {
    var wdth= $(window).width();
    if( parseInt(wdth) > 1050){
      $('.titleList').show();
    }
  });
});


