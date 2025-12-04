@extends('layout.users.app')
@section('title')
    Invite and Earn
@endsection
@section('css')
    <style class="css">
        .banner{
            height:200px;
            background-image:url('{{ asset('images/gift.svg') }}');
            background-size:cover;
            background-position:center;
            position:relative;
           
        }
        .banner::before{
            content:'';
            position:absolute;
            top:0;
            bottom:0;
            left:0;
            right:0;
            background:rgba(0,0,0,0.5);
            z-index:10;
            
        }
        
        @media(min-width:800px){
            .body{
                padding:10px 10vw;
            }
            
        }
    </style>
@endsection
@section('main')
    <section id="x" style="overflow:auto" class="column overflow-m-y-auto align-center bg">

       <div style="overflow:auto" class="column align-center body flex-auto w-full text-center no-select overflow-m-y-auto p-10 g-5">
       <section class="banner max-w-500 c-gold w-full">
        <div class="low justify-center column">
            <strong class="desc" style="font-family:'cinzel decorative">Invite and Earn Amazing Rewards</strong>
        </div>
       </section>
       <div class="h-50 bg-light br-0 overflow-hidden row align-center w-full max-w-500">
        <div style="width:calc(100% - 50px)" class="row align-center p-10 flex-auto ws-nowrap overflow m-x-auto h-full ">{{ url()->to('register?ref='.Auth::guard('users')->user()->uniqid.'') }}</div>
       <div onclick="copy('{{ url()->to('register?ref='.Auth::guard('users')->user()->uniqid.'') }}')" class="bg-primary pc-pointer h-full perfect-square column align-center justify-center c-black">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M216,32H88a8,8,0,0,0-8,8V80H40a8,8,0,0,0-8,8V216a8,8,0,0,0,8,8H168a8,8,0,0,0,8-8V176h40a8,8,0,0,0,8-8V40A8,8,0,0,0,216,32Zm-8,128H176V88a8,8,0,0,0-8-8H96V48H208Z"></path></svg>
       </div>
    </div>
    
    <div class="column pc-grid pc-grid-2 space-between g-10 align-center w-full max-w-500">
        <div class="row w-full space-between grid-full g-10">
             <strong class="top-10 m-right-auto c-gold grid-full" style="font-family:'cinzel decorative'">Commission Levels</strong>
             <span onclick="spa(event,'{{ url('users/referrals') }}')" class="c-gold u m-top-auto">My Referrals</span>
        </div>
        <div class="bg-light p-20 w-full br-0 column g-10">
            <span class="text-light">1st Level Commission</span>
           <strong class="desc c-primary">{{ $referral_settings->first_level }}%</strong>
           <span class="text-light text-dim">Direct Referrals</span>
        </div>
          <div class="dim p-20 w-full bg-light br-0 column g-10">
            <span class="text-light">2nd Level Commission</span>
           <strong class="desc c-primary">{{ $referral_settings->second_level }}%</strong>
           <span class="text-light text-dim">Friends of Friends</span>
        </div>
    </div>
    <div class="column w-full max-w-500 g-10 top-10">
        <strong class="top-10 m-right-auto c-gold" style="font-family:'cinzel decorative'">How It Works</strong>
        <div class="bg-light max-w-500 w-full p-10 column g-10 br-0">
            <div class="row g-10">
                <div class="h-30 perfect-square circle text-b column justify-center gradient">1</div>
                <div class="column text-start align-start">
                    <b class="c-primary">Share Your Link</b>
                    <span>Copy your unique referral link and share to your friends via social media or messaging apps.</span>
                </div>
            </div>
             <div class="row g-10">
                <div class="h-30 perfect-square circle text-b column justify-center gradient">2</div>
                <div class="column text-start align-start">
                    <b class="c-primary">Friends Sign Up</b>
                    <span>Your friends register using your link and become your level 1 referral.</span>
                </div>
            </div>
             <div class="row g-10">
                <div class="h-30 perfect-square circle text-b column justify-center gradient">3</div>
                <div class="column text-start align-start">
                    <b class="c-primary">Level 1 Commission</b>
                    <span>Your friend purchases an asset,you instantly earn {{ $referral_settings->first_level }}% commission which can be withdrawn anytime.I.e your friend purchases an asset worth &#8358;100,000.00 you earn &#8358;{{ number_format(($referral_settings->first_level*100000)/100,2) }} commission.</span>
                </div>
            </div>
             <div class="row g-10">
                <div class="h-30 gradient perfect-square circle text-b column justify-center">4</div>
                <div class="column text-start align-start">
                    <b class="c-primary">Level 2 Commission</b>
                    <span>Your friend refers another user and he/she purchases an asset,you instantly earn {{ $referral_settings->second_level }}% commission which can be withdrawn anytime.I.e your friends referral purchases an asset worth &#8358;100,000.00 your friend earns &#8358;{{ number_format(($referral_settings->first_level*100000)/100,2) }} and you earn &#8358;{{ number_format(($referral_settings->second_level*100000)/100,2) }}</span>
                </div>
            </div>
        </div>
    </div>
      
       </div>
       
    
    

    </section>
@endsection