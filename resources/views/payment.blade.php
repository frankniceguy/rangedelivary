@extends('layouts.service')

@section('title')
Make Payments
@endsection

@section('content')
<div class="flex items-center px-3 justify-center min-h-[10rem] bg-gray-100 py-[5rem] flex-col">
  <div class="md:w-[80%] w-full px-3 rounded py-4 bg-blue-400 border border-blue-500 text-center text-white font-[500]">
    Card Payments are currently unavailable at the moment
  </div>
  <div class="md:w-[80%] w-full bg-white rounded min-h-[10rem] p-4">
      {!! \App\Models\Message::first()->message !!}
  </div>
</div>
@endsection