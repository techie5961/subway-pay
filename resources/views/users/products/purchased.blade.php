@extends('layout.users.app')
@section('title')
    My Products
@endsection
@section('main')
    <section class="section1 column pc-grid pc-grid-2 w-full g-10 p-10">
        @if ($purchased->isEmpty())
            @include('components.sections',[
                'null' => 'You have no active product'
            ])
        @else
             <strong class="desc grid-full ">My Products</strong>
       @foreach ($purchased as $data)
            <div class="column bg-light p-10 g-10 br-10">
                <div class="row space-between w-full align-center">
                      <img src="{{ asset('products/'.$data->json->photo.'') }}" alt="" style="width:40%;" class="w-100 br-10 h-100">
                <svg height="100" width="100" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,20a9,9,0,1,1,9-9A9,9,0,0,1,12,21Z"/><rect x="11" y="6" rx="1" width="2" height="7"><animateTransform attributeName="transform" type="rotate" dur="9s" values="0 12 12;360 12 12" repeatCount="indefinite"/></rect><rect x="11" y="11" rx="1" width="2" height="9"><animateTransform attributeName="transform" type="rotate" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"/></rect></svg>
                </div>
           <div class="row space-between w-full g-10">
                <div class="column">
                    <strong class="font-1  m-right-auto">{{ $data->json->name }}</strong>
                    <span class="text-light text-dim m-right-auto">Name</span>
                </div>
                <div class="column">
                    <strong class="font-1  m-left-auto">&#8358;{{ number_format($data->json->price,2) }}</strong>
                <span class="text-light m-left-auto text-dim">Purchased For</span>
                </div>
            </div> 
            <div class="row space-between w-full g-10">
                <div class="column">
                    <strong class="font-1  m-right-auto">&#8358;{{ number_format($data->json->return,2) }}</strong>
                    <span class="text-light text-dim m-right-auto">Daily Earnings</span>
                </div>
                <div class="column">
                    <strong class="font-1  m-left-auto">&#8358;{{ number_format($data->json->return*$data->json->validity,2) }}</strong>
                <span class="text-light m-left-auto text-dim">Total Return</span>
                </div>
            </div>
            <div class="row space-between w-full g-10">
                <div class="column">
                    <strong class="font-1  m-right-auto">{{ $data->expires }}</strong>
                    <span class="text-light text-dim m-right-auto">Expires</span>
                </div>
                <div class="column">
                    <strong class="font-1  text-end m-left-auto">{{ $data->next_reward }}</strong>
                <span class="text-light m-left-auto text-dim">Next Income</span>
                </div>
            </div>
        </div>
       @endforeach
        @endif
       
    </section>
@endsection