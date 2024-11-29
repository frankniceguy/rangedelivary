<div>

    <header class="py-3 px-3 md:px-32 bg-white">
        <div class=" w-full flex items-center justify-between">
            <div>
                <span>
                    support{{ config('site.email_domain')}} 
                </span>
            </div>
            <a href="/contact" class="px-10 py-2 hidden sm:block rounded font-[500] bg-secondary text-white">
                Get Started
            </a>
        </div>
    </header>
    <!-- Desktop Nav -->
    <nav
        class="hidden md:flex items-center  justify-between px-3 md:px-32 py-6 {{ request()->is('/') && (explode('.', request()->getHost()))[0] == config('app.app_domain')? 'bg-primary': 'bg-[#00000033]' }}   backdrop-blur text-white">
        <h2 class="">
            <img src="/assets/images/{{ config('site.light') }}" class="w-[7rem]" alt="logo">
        </h2>
        <ul class="flex space-x-10 font-[500]">
            <li>
                <a href="/"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('/') ? 'text-secondary' : '' }}">Home</a>
            </li>
            <li>
                <a href="/about"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('about') ? 'text-secondary' : '' }}">About
                    Us</a>
            </li>
            <li>
                <a href="/services"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('services') ? 'text-secondary' : '' }}">Services</a>
            </li>
            <li>
                <a href="/contact"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('contact') ? 'text-secondary' : '' }}">Contact
                    Us</a>
            </li>
        </ul>
    </nav>

    <!-- Mobile Nav -->

    <div id="side-nav"
        class="fixed inset-0 bg-white z-[1000] flex-col translate-x-full duration-1000 rounded-l-[30rem] overflow-hidden">
        <div class="py-5 flex items-center justify-between bg-primary px-10 md:px-10 relative">
            <img src="/assets/images/g2-1.png" class="w-[7rem]" alt="logo">
            <button id="close-btn">
                <i class="fas fa-close text-white text-2xl"></i>
            </button>
        </div>
        <ul class="flex space-y-10 font-[500] px-10 py-10 flex-col">
            <li>
                <a href="/"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('/') ? 'text-secondary' : '' }}">Home</a>
            </li>
            <li>
                <a href="/about"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('about') ? 'text-secondary' : '' }}">About
                    Us</a>
            </li>
            <li>
                <a href="/services"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('services') ? 'text-secondary' : '' }}">Services</a>
            </li>
            <li>
                <a href="/contact"
                    class="hover:text-secondary duration-300 border-secondary {{ request()->is('contact') ? 'text-secondary' : '' }}">Contact
                    Us</a>
            </li>
        </ul>
    </div>
    <nav id="side-nav"
        class="flex md:hidden items-center justify-between px-3 md:px-32 py-6 {{ request()->is('/') && (explode('.', request()->getHost()))[0] == config('app.app_domain')? 'bg-primary': 'bg-[#00000033]' }}   backdrop-blur text-white">
        <h2 class="">
            <img src="/assets/images/g2-1.png" class="w-[7rem]" alt="logo">
        </h2>
        <button id="open-btn">
            <i class="fas fa-bars text-white text-xl"></i>
        </button>
    </nav>
</div>