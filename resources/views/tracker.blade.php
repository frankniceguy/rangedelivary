@extends('layouts.app')

@section('content')
<div class="flex md:items-center z-[100] items-start h-[calc(100vh_-_180px)] md:h-[calc(80vh_-_80px)] justify-center px-5 md:px-0 min-h-[10rem] flex-col">
    <h2 data-aos="fade-up" data-aos-duration="1000"  class="font-[500] md:font-[800] text-3xl md:text-4xl md:text-center fs-1 w-full md:w-2/3 leading-[2.7rem] md:leading-[3.5rem] text-center">
      Enter Your tracking ID
    </h2>
    <div data-aos="fade-up" data-aos-duration="1000" class="flex w-full items-center justify-start md:justify-center mt-10 space-x-4 md:space-x-10">
      <form action="{{ route('tracking-info') }}" class="w-full md:w-fit mx-auto" method="POST">
        @csrf
        <input type="text" name="id" placeholder="Enter Tracking ID" required class="text-gray-800 px-3 mb-4 py-3 bg-white border focus:border-main rounded shadow outline-none text-md w-full md:w-[29rem]">
        <button type="submit" class="px-6 py-3 bg-main md:w-fit w-full">Track</button>
      </form>      
    </div>
</div>

@endsection