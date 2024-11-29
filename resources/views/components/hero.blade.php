<style>
  #hero{
    background-color: white;
    background-image: url('/assets/images/ship2-min.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position-y: -200px;
    position: relative;
    }

@media (max-width: 900px){
    #hero{
        background-position-y:0px;
    }
}


</style>

<div id='hero' class="relative flex md:items-center z-[100] items-start h-[calc(100vh_-_230px)] md:h-[calc(100vh_-_80px)] justify-center  md:px-0 min-h-[10rem] flex-col">
    <h3 class="text-white text-5xl display-5 text-center mx-auto w-fit font-[300] mb-6">
        Welcome to {{ config('site.name') }}
    </h3>
    <div class="hidden md:block md:relative w-full">
        <div class="flex items-center justify-center w-fit mx-auto">
            <a href="/services">
                <div class="rounded cursor flex items-center flex-col space-y-3 justify-center w-[168px] h-[120px] bg-white">
                    <img src="/assets/images/service.png" class="w-[3rem]" alt="">
                    <p class="text-xl font-[600] text-gray-800">Services</p>
                </div>
            </a>
                <div class="rounded cursor flex items-center flex-col space-y-3 text-white justify-center w-[178px] h-[150px] bg-primary">
                    <img src="/assets/images/track.png" class="w-[3rem]" alt="">
                    <p class="text-xl font-[600]">Track</p>
                </div>
            </a>
            <a href="/about">
                <div class="rounded cursor flex items-center flex-col space-y-3 justify-center w-[168px] h-[120px] bg-white">
                    <img src="/assets/images/about.png" class="w-[3rem]" alt="">
                    <p class="text-xl font-[600] text-gray-800">About Us</p>
                </div>
            </a>
        </div>

        <div class="rounded p-4 mx-auto w-fit">
            <form action="{{ route('tracking-info') }}" method="POST" class="flex items-center justify-between ">
                <div class="flex items-center justify-between space-x-2">
                    <input placeholder="TRACKING ID" name="id" type="text" class="bg-white px-3 font-[600] outline-none py-4 md:w-[26rem] rounded">
                    <button class="text-white font-[600] bg-secondary hover:bg-secondary px-10 rounded py-4">Track</button>
                </div>
            </form>
        </div>
    </div>

</div>