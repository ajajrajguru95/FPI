import { gsap } from "gsap";
import { SplitText }  from "gsap/SplitText";
import { ScrollTrigger } from "gsap/ScrollTrigger";
// import Lenis from 'lenis'

gsap.registerPlugin(ScrollTrigger) 


import { Navigation, Pagination, EffectFade } from 'swiper/modules';

import Swiper from "swiper";


export default class Test {

    constructor(){
        this.init();
    }

    init = () => {
        this.setDomMap();
        this.bindEvents();
        this.fadeUp();
    }

    setDomMap = () => {
        this.sectionBanner = document.querySelectorAll('.home-banner');
        this.sectionHeading = document.querySelectorAll('.banner-title');
        this.listHover = document.querySelectorAll('.list-hover li');
        this.imageGroup = document.querySelector('.imageGroup');
    }

    bindEvents = () => {
        const ham = document.querySelectorAll('.mobile-menu');
        ham.forEach((hamm) => {
            hamm.addEventListener("click", this.mobileMenu);
        })
        this.animateBanner();
        this.textAnimation();
        this.customSlider();
        this.stickySection();
        this.listHoverr();
    }

    mobileMenu = () => {
        lenis && lenis.stop();
        console.log('lenis stopeed');
    }

    animateBanner = () => {
        const tl = gsap.timeline({
            defaults: {
                duration: 1,
                ease: "Power3.easeOut",
            },
            onComplete: () =>{
                // console.log('completed');
            }
        })
        tl.to(this.sectionBanner,{
            clipPath: "polygon(0 100%, 100% 100%, 100% 0%, 0 0%)",
        });
        tl.to(this.sectionBanner,{
            scale: 1,
        }, "-=0.8");
        // tl.add(this.textAnimation());
        tl.from(this.textAnimation(), {
            autoAlpha: 0,
            stagger: 0.2,
            y:  "50%",
        },">-0.5")


    }


    textAnimation = () => {
        const headingAnimate = new SplitText(this.sectionHeading,{
            type: "lines,words"
        });
        return headingAnimate.lines;
    }


    fadeUp = () => {
        console.log('working');
        const fadeClass = document.querySelectorAll('.fadeUp');

        fadeClass.forEach((item)=> {

            let tl = gsap.timeline({
                scrollTrigger: {
                    trigger: item,
                    start: "15% 100%"
                },
            })
            let delay = item.getAttribute('data-delay');

            tl.from(item,{
                    autoAlpha: 0,
                    y: "40px",
                    duration: 1,
                },
                delay
            );

        });


    }

    customSlider = () => {
        const swiperCount = $('.slide-count');//document.querySelectorAll(".slide-count");
        const swiper = new Swiper('.custom-slider .swiper', {
            // Optional parameters
            // direction: 'vertical',
            slidesPerView: 1,
            speed: 1000,
            // loop: true,
            effect: "fade",
            allowTouchMove: false,
            modules: [Navigation,Pagination,EffectFade],
          
            // If we need pagination
            pagination: {
              el: '.swiper-pagination',
              type: "progressbar",
            },
          
            // Navigation arrows
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },

            on: {
                slideChange:  (e) => {
                    console.log(e);
                    const getIndex = e.realIndex + 1;

                    gsap.to(swiperCount, {
                        y: "-50%",
                        // delay: 0.4,
                        duration: 0.4,
                        ease: "power3.in",
                        autoAlpha: 0,
                        // stagger: 0.1
                    })
                    

                    setTimeout(() => {
                        swiperCount.text(getIndex);
                        gsap.fromTo(swiperCount, {
                            y: "50%"
                        },{
                            y: 0,
                            duration: 0.6,
                            ease: "power3.out",
                            autoAlpha: 1,
                            // stagger: 0.1,
                        })
                    },600);

                    
                    
                },
               
            }
          
            
          });
    }


    stickySection = () => {
        ScrollTrigger.create({
            trigger: ".sticky-section .count",
            pin: true,
            markers: true,
            start: "top 20%",
            endTrigger: '.sticky-section',
        });

        const rowTrigger = document.querySelectorAll('.value-row');


        rowTrigger.forEach((row, idx)=>{
            const getNumber = row.getAttribute("data-number");
            gsap.to(row,{
                scrollTrigger: {
                    trigger: row,
                    markers: true,
                    start: "top 20%",
                    toggleClass: "active",
                    // toggleActions: "play none reverse none",
                    onEnter: () => {
                        if (idx == 0) return;
                        this.counterAnim(getNumber);
                     
                    },
                    onEnterBack: () => {
                        console.log(getNumber);
                        this.counterAnim(getNumber);
                    }
                }
            })
        })

    }


    counterAnim = (getNumber) => {
        gsap.to('.count span', {
            y: "-50%",
            // delay: 0.4,
            duration: 0.4,
            ease: "power3.in",
            autoAlpha: 0,
            // stagger: 0.1
        })
        

        setTimeout(() => {
            // swiperCount.text(getIndex);
            gsap.fromTo('.count span', {
                y: "50%"
            },{
                y: 0,
                duration: 0.4,
                ease: "power3.out",
                autoAlpha: 1,
                // stagger: 0.1,
            })
            $('.count span').text(getNumber);
        },400);

        return getNumber;
    }


    listHoverr = () => {
        let hoverTimeout;
        this.listHover.forEach((list) => {
            list.addEventListener('mouseenter', (e) => {
                clearTimeout(hoverTimeout);
                hoverTimeout = setTimeout(() => {
                let rect = list.getBoundingClientRect();
                console.log(rect);
                $('.list-hover .desc').slideUp("1000");
                $(list).find('.desc').slideDown("1000");
                const ImagePos = (this.imageGroup.getBoundingClientRect().height / 2);
                setTimeout(() => {
                    let Y = rect.top;
                    gsap.to('.imageGroup',{
                        y: Y - ImagePos,
                        duration: 0.8,
                        // ease: "linear"
                    })
                }, 300);
            }, 300);
            })
        })
    }

}