@extends('layout.users.app')
@section('title')
    Referrals
@endsection
@section('main')
    <section class="section1 column w-full p-10 g-10 pc-grid pc-grid-2">
        
      @if ($referrals->isEmpty())
          @include('components.sections',[
            'null' => 'You Havent referred any user yet'
          ])
      @else
            <strong class="desc grid-full">My Team</strong>
            @foreach ($referrals as $data)
                <div class="bg-light w-full p-10 column g-10 br-10">
                    <div class="row g-10 space-between">
                        <div style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')" class="photo"></div>
                        <div class="column m-right-auto">
                            <strong>{{ ucfirst($data->username) }}</strong>
                            <span class="text-small text-dim text-light row align-center">
                                Registered {{ $data->frame }}
                            </span>
                        </div>
                        <div class="status green">{{ $data->status }}</div>
                    </div>
                    <hr class="gradient">
                    <div class="row space-between w-full g-10">
                        <div class="column">
                            <strong class="font-1 text-start">&#8358;{{ number_format($data->total_purchase,2) }}</strong>
                            <span class="text-light m-right-auto text-dim">Total Purchase</span>
                        </div>
                         <div class="column">
                            <strong class="font-1 m-left-auto text-start">&#8358;{{ number_format($data->total_commission,2) }}</strong>
                            <span class="text-light m-left-auto text-dim">Total Commission</span>
                        </div>
                    </div>
                </div>
            @endforeach
      @endif
      
    </section>
@endsection