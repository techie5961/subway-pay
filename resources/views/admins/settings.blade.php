@extends('layout.admins.app')
@section('title')
    Site Settings
@endsection
@section('main')
   <section class="column p-10 no-select p-10 g-5 w-full">
     <div class="column p-10 bg-light w-full br-10 g-10">
        <div class="row g-5 align-center">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="rgb(108,92,230)" viewBox="0 0 256 256"><path d="M128,80a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Zm88-29.84q.06-2.16,0-4.32l14.92-18.64a8,8,0,0,0,1.48-7.06,107.21,107.21,0,0,0-10.88-26.25,8,8,0,0,0-6-3.93l-23.72-2.64q-1.48-1.56-3-3L186,40.54a8,8,0,0,0-3.94-6,107.71,107.71,0,0,0-26.25-10.87,8,8,0,0,0-7.06,1.49L130.16,40Q128,40,125.84,40L107.2,25.11a8,8,0,0,0-7.06-1.48A107.6,107.6,0,0,0,73.89,34.51a8,8,0,0,0-3.93,6L67.32,64.27q-1.56,1.49-3,3L40.54,70a8,8,0,0,0-6,3.94,107.71,107.71,0,0,0-10.87,26.25,8,8,0,0,0,1.49,7.06L40,125.84Q40,128,40,130.16L25.11,148.8a8,8,0,0,0-1.48,7.06,107.21,107.21,0,0,0,10.88,26.25,8,8,0,0,0,6,3.93l23.72,2.64q1.49,1.56,3,3L70,215.46a8,8,0,0,0,3.94,6,107.71,107.71,0,0,0,26.25,10.87,8,8,0,0,0,7.06-1.49L125.84,216q2.16.06,4.32,0l18.64,14.92a8,8,0,0,0,7.06,1.48,107.21,107.21,0,0,0,26.25-10.88,8,8,0,0,0,3.93-6l2.64-23.72q1.56-1.48,3-3L215.46,186a8,8,0,0,0,6-3.94,107.71,107.71,0,0,0,10.87-26.25,8,8,0,0,0-1.49-7.06Zm-16.1-6.5a73.93,73.93,0,0,1,0,8.68,8,8,0,0,0,1.74,5.48l14.19,17.73a91.57,91.57,0,0,1-6.23,15L187,173.11a8,8,0,0,0-5.1,2.64,74.11,74.11,0,0,1-6.14,6.14,8,8,0,0,0-2.64,5.1l-2.51,22.58a91.32,91.32,0,0,1-15,6.23l-17.74-14.19a8,8,0,0,0-5-1.75h-.48a73.93,73.93,0,0,1-8.68,0,8,8,0,0,0-5.48,1.74L100.45,215.8a91.57,91.57,0,0,1-15-6.23L82.89,187a8,8,0,0,0-2.64-5.1,74.11,74.11,0,0,1-6.14-6.14,8,8,0,0,0-5.1-2.64L46.43,170.6a91.32,91.32,0,0,1-6.23-15l14.19-17.74a8,8,0,0,0,1.74-5.48,73.93,73.93,0,0,1,0-8.68,8,8,0,0,0-1.74-5.48L40.2,100.45a91.57,91.57,0,0,1,6.23-15L69,82.89a8,8,0,0,0,5.1-2.64,74.11,74.11,0,0,1,6.14-6.14A8,8,0,0,0,82.89,69L85.4,46.43a91.32,91.32,0,0,1,15-6.23l17.74,14.19a8,8,0,0,0,5.48,1.74,73.93,73.93,0,0,1,8.68,0,8,8,0,0,0,5.48-1.74L155.55,40.2a91.57,91.57,0,0,1,15,6.23L173.11,69a8,8,0,0,0,2.64,5.1,74.11,74.11,0,0,1,6.14,6.14,8,8,0,0,0,5.1,2.64l22.58,2.51a91.32,91.32,0,0,1,6.23,15l-14.19,17.74A8,8,0,0,0,199.87,123.66Z"></path></svg>
  <strong class="desc text-gradient">General Settings</strong>
        </div>
      
        <hr class="w-full gradient">
        <form action="{{ url()->to('admins/post/general/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="w-full column g-5">
          <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
           <label for="">Daily Check-In (&#8358;)</label>
            <div class="cont required">
                <input value="{{ $general_settings->daily_check_in ?? '' }}" name="daily_check_in" placeholder="E.g 500" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
          <label for="">Signup Bonus (&#8358;)</label>
            <div class="cont required">
                <input value="{{ $general_settings->signup_bonus }}" name="signup_bonus" placeholder="E.g 500" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            
            
           
            <label for="">Whatsapp Group Link</label>
            <div class="cont required">
                <input value="{{ $general_settings->group_link }}" name="group_link" placeholder="E.g https://site-group-link.com" type="url" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label for="">Telegram Group Link</label>
            <div class="cont required">
                <input value="{{ $general_settings->popup_link ?? '' }}" name="popup_link" placeholder="E.g https://popup-link.com" type="url" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label for="">Popup Message</label>
            <div class="cont h-200 required">
            {{-- <input value="{{ $general_settings->group_link }}" name="group_link" placeholder="E.g https://site-group-link.com" type="url" class="inp input"> --}}
               <textarea style="font-family: poppins" placeholder="Enter Popup Message" name="popup_message" id="" class="inp p-10 no-resize input">{!! $general_settings->popup_message ?? '' !!}</textarea>
            <div class="prompt"><i>Required</i></div>
            </div>
            
            
            <button class="post"><div class="working">Loading....</div><div class="content">Update Settings</div></button>
        </form>
    </div>
     <div class="column p-10 bg-light w-full br-10 g-10">
        <div class="row g-5 align-center">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M224,72v48H160a32,32,0,0,1-64,0H32V72A16,16,0,0,1,48,56H208A16,16,0,0,1,224,72Z" opacity="0.2"></path><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48ZM40,96H216v16H160a8,8,0,0,0-8,8,24,24,0,0,1-48,0,8,8,0,0,0-8-8H40Zm8-32H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64ZM208,192H48a8,8,0,0,1-8-8V128H88.8a40,40,0,0,0,78.4,0H216v56A8,8,0,0,1,208,192Z"></path></svg>
  <strong class="desc text-gradient">Finance Settings</strong>
        </div>
      
        <hr class="w-full gradient">
        <form action="{{ url()->to('admins/post/finance/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="w-full column g-5">
          <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
            <label for="">Minimum Withdrawal (&#8358;)</label>
            <div class="cont required">
                <input value="{{ $finance_settings->min_withdrawal ?? 0 }}" name="min_withdrawal" placeholder="E.g 50000" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label>Minimum Deposit (&#8358;)</label>
            <div class="cont required">
                <input value="{{ $finance_settings->min_deposit ?? 0 }}" name="min_deposit" placeholder="E.g 50000" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label for="">Maximum Withdrawal (&#8358;)</label>
            <div class="cont required">
                <input value="{{ $finance_settings->max_withdrawal ?? 0 }}" name="max_withdrawal" placeholder="E.g 1000000" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label for="">Maximum Deposit (&#8358;)</label>
            <div class="cont required">
                <input value="{{ $finance_settings->max_deposit ?? 0 }}" name="max_deposit" placeholder="E.g 1000000" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label for="">Withdrawal Fee (%)</label>
            <div class="cont required">
                <input value="{{ $finance_settings->withdrawal_fee ?? 0 }}" name="withdrawal_fee" placeholder="E.g 5" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <input type="hidden" value="{{ $finance_settings->withdrawal_status ?? '' }}" name="withdrawal_status" class="input">
            <div class="w-full row space-between g-10">
                <label for="">Toggle on or Toggle off withdrawal portal</label>
                <div class="toggle {{ $finance_settings->withdrawal_status == 'active' ? 'active' : '' }}"><div onclick="Toggle(this,document.querySelector('input[name=withdrawal_status]'))" class="child pc-pointer"></div></div>
            </div>
            <button class="post"><div class="working">Loading....</div><div class="content">Update Settings</div></button>
        </form>
    </div>
      <div class="column p-10 bg-light w-full br-10 g-10">
        <div class="row g-5 align-center">
<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>  <strong class="desc text-gradient">Referral Settings</strong>
        </div>
      
        <hr class="w-full gradient">
        <form action="{{ url()->to('admins/post/referral/settings/process') }}" method="POST" onsubmit="PostRequest(event,this)" class="w-full column g-5">
          <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
            
            <label for="">Commission Method</label>
           <div class="cont required">
            <select style="font-family:poppins" name="method" id="" class="inp input">
                <option value="">Select Commission Method...</option>
                <option {{ $referral_settings->method == 'first' ? 'selected' : '' }} value="first">After first purchase only</option>
                <option {{ $referral_settings->method == 'infinite' ? 'selected' : '' }} value="infinite">After each purchase</option>
            </select>
            @include('components.sections',[
                'required' => true
            ])
           </div>
            <label for="">1st Level Commission (%)</label>
            <div class="cont required">
                <input value="{{ $referral_settings->first_level ?? '' }}" name="first_level" placeholder="E.g 10" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
            <label for="">2nd Level Commission (%)</label>
            <div class="cont required">
                <input value="{{ $referral_settings->second_level ?? '' }}" name="second_level" placeholder="E.g 5" type="number" step="any" class="inp input">
                <div class="prompt"><i>Required</i></div>
            </div>
         
            <button class="post"><div class="working">Loading....</div><div class="content">Update Settings</div></button>
        </form>
    </div>
   </section>
@endsection
