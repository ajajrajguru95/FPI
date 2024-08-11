<section class="fixed cookie-preference hidden right-5 bottom-5 bg-white rounded-3xl p-7 max-md:p-5 w-[31.5rem] max-md:w-[calc(100%-2.5rem)] shadow-2xl z-50">
    <h2 class="text-3xl max-md:text-xl"><?= _e('Cookies Preference'); ?></h2>
    <p class="text-xl max-md:text-[0.875rem] max-md:leading-6 mt-2 text-[#1A0A0C] [&>a]:text-darkorange [&>a:hover]:text-[#1A0A0C] [&>a]:transition-all [&>a]:duration-700 [&>a]:cursor-pointer"><?= _e('Our website uses cookies to make your browsing experience better. by using our site you agree to the use of cookies, visit', T_PREFIX) ?> <a href="/cookie-policy"><?= _e('Cookies Policy page', T_PREFIX); ?></a>. </p>
    <div class="btn-wrap  flex max-md:flex-col  gap-8 max-md:gap-3 mt-6">
        <a href="#" class="primary-btn max-md:w-auto accept">
            <span class="btn-text max-md:w-[calc(100%-2.68rem)] max-md:text-center"><span><?= _e('Accept'); ?></span></span>
            <span class="btn-arrow">
                <span class="icon-arrow-right"></span>
            </span>
        </a>
        <a href="#" class="primary-btn bordered max-md:w-auto reject">
            <span class="btn-text max-md:w-[calc(100%-2.68rem)] max-md:text-center"><span><?= _e('Reject'); ?></span></span>
            <span class="btn-arrow">
                <span class="icon-arrow-right"></span>
            </span>
        </a>
    </div>
</section>