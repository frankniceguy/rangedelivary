<footer class="bg-[#040404] text-white py-8 pt-16 justify-between md:px-20 px-3">
        <div class="w-full flex md:flex-row flex-col md:space-y-0 space-y-10 justify-between">
            <div class="text-sm font-[400] flex space-y-3 flex-col">
                <img src="{{ asset('/assets/images/g2-1.png') }}" class="w-[13rem] mb-4" alt="brand logo">

                <div class="contact-info flex space-x-2">
                    <i class="fas text-secondary fa-phone"></i>
                    <span class="">Call us:</span>
                    <a href="tel:+18035466354" class="hover:text-blue-700">+1 (803) 546-6354</a>
                </div>
                <div class="contact-info flex space-x-2">
                    <i class="fas text-secondary fa-envelope"></i>
                    <span class="">Mail: </span>
                    <a href="mailto:support@" class="hover:text-blue-700">support{{ config('site.email_domain') }}</a>
                </div>
                
            </div>
            <div class="">
                <p class="font-[500]">Navigation Links</p>
                <ul class="flex mt-3 text-sm flex-col space-y-2  font-semibold">
                    <a href="/"><li class="font-[400] hover:text-secondary duration-300  {{ request()->is('/') ? 'text-secondary ' : '' }}">Home</li></a>
                    <a href="/services"><li class="font-[400] hover:text-secondary duration-300  {{ request()->is('services') ? 'text-secondary ' : '' }}">Services</li></a>
                    <a href="/about"><li class="font-[400] hover:text-secondary duration-300  {{ request()->is('about') ? 'text-secondary ' : '' }}">About Us</li></a>
                    <a href="/contact"><li class="font-[400] hover:text-secondary duration-300  {{ request()->is('contact') ? 'text-secondary ' : '' }}">Contact Us</li></a>
                </ul>
            </div>

            <form method="POST" action="{{ route('subscribe') }}" class="flex flex-col md:w-[24rem] w-full">
                @csrf
                <p for="">
                    Signup to our newsletters
                </p>
                <input name="email" class="w-full px-3 py-2 my-3 text-gray-900 outline-none" type="email" placeholder="Enter Email">
                <button class="w-full py-2 bg-secondary">
                    Sign Up
                </button>
            </form>
        </div>
        <div class="text-sm mx-auto mt-10 w-fit relative bottom-0">
          Copyright @ {{ date('Y')}} <span class="text-secondary ">{{ config('site.name') }} Services</span>, All Right Reserved
        </div>
    </footer>
