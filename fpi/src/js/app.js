import Header from './components/Header';
import ContactMap from "./components/Maps/types/ContactMap";
import BlockMain from "./Blocks/BlockMain";
import DynamicImports from './components/DynamicImports';
import Animation from "./components/Animation";
import Lenis from "@studio-freight/lenis";
import { gsap } from "gsap";

import { inVP } from "./utils";

// window.lenisInstance = new Lenis();

export default new (class App {
  constructor() {
    this.setDomMap();
    this.previousScroll = 0;

    // dom ready shorthand
    $(() => {
      this.domReady();
       jQuery(document).bind('gform_post_render', function(event, form_id, current_page) {
        console.log('working');
       });
       

      //  this.lenis = new Lenis(); // Make lenis an instance property

      //  // this.lenis.on('scroll', (e) => {
      //  //     console.log(e)
      //  // })

      //  const raf = (time) => {
      //      this.lenis.raf(time);
      //      requestAnimationFrame(raf);
      //  }
      //  requestAnimationFrame(raf);
      //  console.log('working test');

    });
  }

  domReady = () => {
    this.initComponents();
    this.captchaLoad();
    this.handleUserAgent();
    this.windowResize();
    this.bindEvents();
    this.handleInputFocus();
    this.handleSplashScreen();
    this.initLenis(); // Initialize Lenis
    this.categorySwitch();
  };

  initComponents = () => {
    new Header({
      header: this.header,
      htmlBody: this.htmlBody,
    });

    if (this.mapContact.length) {
      new ContactMap({
        mapContact: this.mapContact,
      });
    }

    new BlockMain();

    new DynamicImports();
    new Animation();

  };

  captchaLoad = () => {
    $(window).on("scroll load", () => {
      if (inVP(this.formidable) && !this.formidable.hasClass("formInview")) {
        this.formidable.addClass('formInview');
      }
    });
  };

  setDomMap = () => {
    this.window = $(window);
    this.htmlNbody = $('body, html');
    this.html = $('html');
    this.htmlBody = $('body');
    this.siteLoader = $('.site-loader');
    this.header = $('header');
    this.siteBody = $('.site-body');
    this.footer = $('footer');
    this.gotoTop = $('#gotoTop');
    this.gRecaptcha = $('.g-recaptcha');
    this.wrapper = $('.wrapper');
    this.pushDiv = this.wrapper.find('.push');
    this.mapContact = $('#map_contact');
    this.formidable = $('.formidable');
    this.inputs = $('input, textarea').not('[type="checkbox"], [type="radio"]');
    this.searchBtn = $('.search-btn');
    this.searchTopBlock = $('.search-top-block');
    this.searchCloseBtn = $('.search-top-block .close-btn');
  };

  bindEvents = () => {
    // Window Events
    this.window.resize(this.windowResize).scroll(this.windowScroll);

    // General Events
    const $container = this.wrapper;

    $container.on('click', '.disabled', () => false);


    // Search click
    this.searchBtn.on('click', () => {
            this.searchTopBlock.toggleClass('active');
    });

    this.searchCloseBtn.on('click', () => {
            this.searchTopBlock.toggleClass('active');
    });

    // Specific Events
    this.gotoTop.on('click', () => {
      this.htmlNbody.animate({
        scrollTop: 0,
      });
    });


    // Blue header
    if($(".no-banner,.error404").length){
      this.htmlBody.addClass("blue-header");
    }

     //set cookie for site
     function setCookie(cname, cvalue) {
            var d = new Date();
            d.setTime(d.getTime() + 2160000000);
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
     }

     if (document.cookie.indexOf("visited=") == -1) {
            $(".cookie-preference .accept").click(function(){
               setCookie("visited", "1");
               $('.cookie-preference').fadeOut();
            })
            $(".cookie-preference .reject").click(function(){
               $('.cookie-preference').fadeOut();
            })
            setTimeout(() => {
                $('.cookie-preference').fadeIn();
            }, 4000);
    }


  };

  windowResize = () => {
    this.screenWidth = this.window.width();
    this.screenHeight = this.window.height();

    // calculate footer height and assign it to wrapper and push/footer div
    if (this.pushDiv.length){
      this.footerHeight = this.footer.outerHeight();
      this.wrapper.css('margin-bottom', -this.footerHeight);
      this.pushDiv.height(this.footerHeight);
    }
  };



  windowScroll = () => {
    const topOffset = this.window.scrollTop();

    this.header.toggleClass('top', topOffset > 300);
    this.header.toggleClass('sticky', topOffset > 600);
    if (topOffset > this.previousScroll || topOffset < 500) {
      this.header.removeClass('sticky');
    } else if (topOffset < this.previousScroll) {
      this.header.addClass('sticky');
      // Additional checking so the header will not flicker
      if (topOffset > 250) {
        this.header.addClass('sticky');
      } else {
        this.header.removeClass('sticky');
      }
    }

    this.previousScroll = topOffset;
    this.gotoTop.toggleClass(
      'active',
      this.window.scrollTop() > this.screenHeight / 2,
    );
  };

  handleInputFocus() {
      this.inputs
        .on({
          focus: e => {
            const self = $(e.currentTarget);
            self.closest('.gfield').addClass('active');
          },
          blur: e => {
            const self = $(e.currentTarget);
            if (self.val() !== '') {
              self.closest('.gfield').addClass('active');
            } else {
              self.closest('.gfield').removeClass('active');
            }
          },
        })
      .trigger('blur');
  }

  handleSplashScreen() {
    this.htmlBody.find('.logo-middle').fadeIn(500);
    this.siteLoader.delay(1500).fadeOut(500);
  }

  handleUserAgent = () => {
    // detect mobile platform
    if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
      this.htmlBody.addClass('ios-device');
    }
    if (navigator.userAgent.match(/Android/i)) {
      this.htmlBody.addClass('android-device');
    }

    // detect desktop platform
    if (navigator.appVersion.indexOf('Win') !== -1) {
      this.htmlBody.addClass('win-os');
    }
    if (navigator.appVersion.indexOf('Mac') !== -1) {
      this.htmlBody.addClass('mac-os');
    }


    // detect IE Edge
    if (/Edge\/\d./i.test(navigator.userAgent)) {
      this.html.addClass('ieEdge');
    }


    const isIPadPro = /Macintosh/i.test(navigator.userAgent) && 'ontouchend' in document;
    if (isIPadPro) {
        // Code for iPad Pro
        this.htmlBody.addClass("mobile-tablet-device");
        this.htmlBody.addClass("ipad-pro");
    }
  };




  initLenis = () => {
    lenis = new Lenis();
    
    // Uncomment and use this for debugging if needed
    // this.lenis.on('scroll', (e) => {
    //   console.log(e);
    // });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
      }

      requestAnimationFrame(raf);

    console.log('Lenis initialized');
  };


  categorySwitch = () => {
      const downloadBlock = document.querySelectorAll('.downloads-sections');
      downloadBlock.forEach((download) => {
        const select = download.querySelector('select'); 
        const tl = gsap.timeline({
          defaults: {
            duration: 0.5,
          }
        });
        $(select).on('change', (e) => {
          const selectSlug = e.target.value;
          tl.set('.downloads-sections .slides', {
            autoAlpha: 0,
          })
          tl.to('.downloads-sections .slides', {
            display: 'none',
            ease: 'power1.easeOut',
            autoAlpha: 0,
          });
          tl.to(`#${selectSlug}`,{
            autoAlpha: 1,
            display: 'grid',
            ease: 'power1.easeIn',
          })
        })
      })
  }


})();
