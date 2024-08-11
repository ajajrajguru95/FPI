export default class EnquiryPopUpBlock {
  constructor() {
    this.init();
  }

  init = () => {
    this.setDomMap();
    this.bindEvents();
  };

  setDomMap = () => {
    this.window = $(window);
    this.body = $("body");
  };

  bindEvents = () => {
      if(localStorage.getItem('pdfLink') == ''){
        console.log('local storate ther');
        $('.download-item .primary-btn').removeClass('sign-up');
        $('.download-item .primary-btn').attr('download', '');

      }

      $(document).on(
        "click",
        ".make-enquiry,.sign-up",
        function (e) {
          e.preventDefault();
          if($(this).hasClass('sign-up')){
            $(".sign-up-form").addClass("active");
            // $(':root').css('--pdfLink', $(this).attr('href'));
            localStorage.setItem('pdfLink', $(this).attr('href'));
            // console.log($(this).attr('href'));
          }
          else{
            $(".form-pop-up:not(.sign-up-form)").addClass("active");
          }
          $("body").addClass("popup-active");
        }
      );

    $(document).on(
      "click",
      ".form-pop-up .close-btn",
      function () {
        $(".form-pop-up").removeClass("active");
        $("body").removeClass("popup-active");
      }
    );
  };
}
