@extends('layouts.service')

@section('title')
Our Services
@endsection

@section('content')
<div class="bg-white px-3 md:px-32 py-20">
        <div class="mt-4 text-center">
            <h3 data-aos="fade-up" data-aos-delay="1000" class="uppercase font-bold text-2xl md:text-3xl text-center text-black">UNBEATABLE TRUCKING AND TRANSPORT SERVICES</h3>

            <div data-aos="fade-up" data-aos-delay="1000" class="w-[4rem] mx-auto border-b-2 border-main mt-2"></div>
            <p data-aos="fade-up" data-aos-delay="1000" class="text-sm text-gray-500 mt-4 font-light mx-auto md:w-1/2 ">
              {{ config('site.name') }} Courier Services is the world’s leading logistic service company, We have a wide experience in overland industry-specific logistic solutions like pharmaceutical logistics, retail and automotive logistics by train or road.
            </p>
        </div>


        <div class="mt-24 py-20">
          <div class="flex md:flex-row flex-col justify-between">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-1.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      ROAD FREIGHT FORWARDING
                    </p>
                    <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                  </div>
                  <p class="font-small text-gray-700 text-center">
                    Cargo are transported at some stage of their journey along the world’s roads where we give you a presence.
                  </p>
                </div>
              </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-2.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      OCEAN FREIGHT FORWARDING
                    </p>
                    <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                  </div>
                  <p class="font-small text-gray-700 text-center">
                    Ocean Freight plays perhaps the most vital role in most transportation and supply chain solutions.
                  </p>
                </div>
              </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-3.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      AIR FREIGHT FORWARDING
                    </p>
                      <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                    </div>
                    <p class="font-small text-gray-700 text-center">
                      As a leader in global air freight forwarding, {{ config('site.name') }} Courier Services excels in providing tailored transportation
                  </p>
                </div>
              </div>
          </div>

          <div class="flex md:flex-row mt-5 flex-col justify-between">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-7.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      WAREHOUSING
                    </p>
                    <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                  </div>
                  <p class="font-small text-gray-700 text-center">
                    Package and store your things effectively and securely to make sure them in storage, have certified warehouse.
                  </p>
                </div>
              </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-5.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      DOOR TO DOOR DELIVERY
                    </p>
                    <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                  </div>
                  <p class="font-small text-gray-700 text-center">
                    Our expertise in transport management and planning allows us to design a solution. hand over the parcel at your door.
                  </p>
                </div>
              </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-6.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      GROUND TRANSPORT
                    </p>
                      <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                    </div>
                    <p class="font-small text-gray-700 text-center">
                      Ground transportation options for all visitors, no matter your needs, schedule or destination.
                    </p>
                </div>
                </div>
          </div>

          <div class="flex md:flex-row mt-5 flex-col justify-between">
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/pexels-andrea-piacquadio-3769138.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      WORLDWIDE TRANSPORT
                    </p>
                    <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                  </div>
                  <p class="font-small text-gray-700 text-center">
                    Specialises in international freight forwarding of merchandise and associated general and all logistic services.
                  </p>
                </div>
              </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-8.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                      CARGO SERVICE
                    </p>
                    <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                  </div>
                  <p class="font-small text-gray-700 text-center">
                  Delivery of any freight from one place to another place quickly to save your cost and save your valuable time.
                  </p>
                </div>
              </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600" class="md:w-[20rem] mb-3">
                <img class="rounded-t-[2rem]" src="/assets/images/serv-9.jpg" alt="">
                <div class="p-4 border h-[16rem]">
                  <div class="my-8">
                    <p class="text-xl text-center font-[500] text-gray-800">
                    PACKAGING & STORAGE
                    </p>
                      <div class="mx-auto w-[4rem] border-b-2 border-orange-500 py-3"></div>
                    </div>
                    <p class="font-small text-gray-700 text-center">
                      Package and store your things effectively and securely to make sure them in storage, We guranteed for 100%.
                    </p>
                </div>
                </div>
          </div>
        </div>
</div>

<div class="bg-transparent backdrop-blur px-3">
    <div class="flex items-center flex-col justify-around md:flex-row">
        <div class="flex space-x-4 w-full md:w-1/3 h-fit pt-10 md:pt-0 md:h-[20rem] justify-center items-center mb-10 md:mb-0 border-gray-500 md:border-r">
          <div class="flex space-x-4 h-[11rem]">
            <!-- <i class="fa-solid text-[4rem] text-red-600 shrink-0 fa-earth-asia"></i> -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="md:w-[18rem]">
              <p class="text-secondary text-lg font-[500] capitalize mb-2 px-3 rounded bg-gray-100 w-fit py-1">Fast worldwide delivery</p>
              <p class="text-gray-300 text-md font-[400]">
                Global Speed: Reach any corner of the world, fast. Track deliveries live, choose options for any need, and experience 24/7 support. Ditch delays, embrace speed.
              </p>
            </div>
          </div>
        </div>


        <div class="flex space-x-4 w-full md:w-1/3 h-fit pt-10 md:pt-0 md:h-[20rem] justify-center items-center mb-10 md:mb-0">
          <div class="flex space-x-4 h-[11rem]">
            <!-- <i class="fa-solid text-[4rem] text-red-600 fa-shield-halved shrink-0"></i> -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="md:w-[18rem]">
              <p class="text-secondary text-lg font-[500] capitalize mb-2 px-3 rounded bg-gray-100 w-fit py-1">Safe and Secure</p>
              <p class="text-gray-300 text-md font-[400]">
                Secure Every Step: From booking to delivery, your valuables are protected. Trust encrypted systems, secure facilities, and dedicated support for worry-free deliveries.
              </p>
            </div>
          </div>
        </div>

        <div class="flex space-x-4 w-full md:w-1/3 h-fit pt-10 md:pt-0 md:h-[20rem] justify-center items-center mb-10 md:mb-0 border-gray-500 md:border-l">
          <div class="flex space-x-4 h-[11rem]">
            <!-- <i class="fa-solid text-[4rem] text-red-600 shrink-0 fa-phone"></i> -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="md:w-[18rem]">
              <p class="text-secondary text-lg font-[500] capitalize mb-2 px-3 rounded bg-gray-100 w-fit py-1">24/7 customer support</p>
              <p class="text-gray-300 text-md font-[400]">
               Questions? Concerns? Our team is always here, day or night, for a smooth and stress-free experience.
              </p>
            </div>
          </div>
        </div>

    </div>
</div>
@endsection