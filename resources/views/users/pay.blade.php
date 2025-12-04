@extends('layout.users.app') 
@section('title')
   Deposit | Pay
@endsection
@section('css')
    <style class="css">
        body,main{
            overflow:hidden;
            
        }
    
    </style>
@endsection
@section('main')
    <section id="x" class="pos-fixed top-0 left-0 right-0 bottom-0 column align-center bg z-index-4000">
       <div class="p-10 row pos-stick stick-top space-between bg w-full align-center">
        <svg class="pc-pointer" onclick="spa(event,'{{ url()->previous() == request()->fullUrl() ? url()->to('users/dashboard') : url()->previous() }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
        <b>Deposit</b>
         <svg onclick="spa(event,'{{ url()->to('users/dashboard') }}')" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 256 256"><path d="M224,120v96a8,8,0,0,1-8,8H40a8,8,0,0,1-8-8V120a15.87,15.87,0,0,1,4.69-11.32l80-80a16,16,0,0,1,22.62,0l80,80A15.87,15.87,0,0,1,224,120Z"></path></svg>

       </div>
       <div class="column flex-auto w-full align-center overflow m-x-auto p-10 g-5">
       <div style="padding:20px 10px" class="w-full align-center max-500 p-10 g-10 column bg-light">
      <div class="w-full">
        <strong class="desc">Deposit Bank Details</strong>
      </div>
       <div class="column w-full space-between">
            <span class="text-dim">Amount:</span>
            <span class="font-1">&#8358;{{ number_format($amount,2) }}</span>
        </div>
         <div class="column w-full space-between">
            <span class="text-dim">Account Number:</span>
           <div class="row g-5 align-center">
             <span class="font-1">{{ $bank->account_number }}</span>
            <div onclick="copy('{{ $bank->account_number }}')" class="pc-pointer pos-sticky h-full perfect-square column align-center justify-center">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M20.0616 12.6473L20.5793 10.7154C21.1835 8.46034 21.4856 7.3328 21.2581 6.35703C21.0785 5.58657 20.6744 4.88668 20.097 4.34587C19.3657 3.66095 18.2381 3.35883 15.9831 2.75458C13.728 2.15033 12.6004 1.84821 11.6247 2.07573C10.8542 2.25537 10.1543 2.65945 9.61351 3.23687C9.02709 3.86298 8.72128 4.77957 8.26621 6.44561C8.18979 6.7254 8.10915 7.02633 8.02227 7.35057L8.02222 7.35077L7.50458 9.28263C6.90033 11.5377 6.59821 12.6652 6.82573 13.641C7.00537 14.4115 7.40945 15.1114 7.98687 15.6522C8.71815 16.3371 9.84569 16.6392 12.1008 17.2435L12.1008 17.2435C14.1334 17.7881 15.2499 18.0873 16.165 17.9744C16.2652 17.9621 16.3629 17.9448 16.4592 17.9223C17.2296 17.7427 17.9295 17.3386 18.4703 16.7612C19.1552 16.0299 19.4574 14.9024 20.0616 12.6473Z" fill="CurrentColor"></path>
<path d="M2.50458 14.715L3.02222 16.6469C3.62647 18.902 3.92859 20.0295 4.61351 20.7608C5.15432 21.3382 5.85421 21.7423 6.62466 21.9219C7.60044 22.1494 8.72798 21.8473 10.9831 21.2431C13.2381 20.6388 14.3657 20.3367 15.097 19.6518C15.1577 19.5949 15.2164 19.5363 15.2733 19.4761C14.9391 19.448 14.602 19.3942 14.2594 19.3261C13.5633 19.1877 12.7362 18.9661 11.758 18.704L11.6512 18.6753L11.6264 18.6687C10.5621 18.3835 9.67281 18.1448 8.96277 17.8883C8.21607 17.6185 7.5376 17.286 6.96148 16.7464C6.16753 16.0028 5.61193 15.0404 5.36491 13.9811C5.18567 13.2123 5.23691 12.4585 5.37666 11.6769C5.51058 10.928 5.75109 10.0305 6.03926 8.95515L6.03926 8.95514L6.57365 6.96077L6.59245 6.89062C4.6719 7.40799 3.66101 7.71408 2.98687 8.34548C2.40945 8.88629 2.00537 9.58617 1.82573 10.3566C1.59821 11.3324 1.90033 12.4599 2.50458 14.715Z" fill="CurrentColor"></path>
</svg>
  </div>
           </div>
        </div>
            <div class="column w-full space-between">
            <span class="text-dim">Bank:</span>
            <span class="font-1">{{ $bank->bank }}</span>
        </div>
            <div class="column w-full space-between">
            <span class="text-dim">Account Name:</span>
            <span class="font-1">{{ $bank->account_name }}</span>
        </div>
        <span class="text-dim top-10 bottom-10 text-center">
            Send the exact amount into the account details above and fill the form below
        </span>
       </div>
     
       </div>
        <form class="column w-full p-10 g-10"  method="POST" onsubmit="PostRequest(event,this,MyFunc.Submitted)" action="{{ url('users/post/complete/deposit/process') }}">
       <input type="hidden" name="amount" value="{{ $amount }}" class="input">
          <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
        
        <label for="">Name of Bank used in transfer</label>
        <div style="border:1px solid var(--bg-lighter)" class="cont br-0 required">
            <input type="text" name="account_name" placeholder="E.g First Bank PLC" class="inp required input">
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <label for="">Name on Bank used in transfer</label>
        <div style="border:1px solid var(--bg-lighter)" class="cont br-0 required">
            <input type="text" name="bank_name" placeholder="E.g {{ ucwords(Auth::guard('users')->user()->name) }}" class="inp required input">
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <button class="post clip-0 br-0" >
      I Have Paid</button> 
    </form>
      

    
    

    </section>
@endsection
@section('slideup_child')
    <form class="column w-full g-10"  method="POST" onsubmit="PostRequest(event,this,MyFunc.Submitted)" action="{{ url('users/post/complete/deposit/process') }}">
       <input type="hidden" name="amount" value="{{ $amount }}" class="input">
          <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
        <strong class="c-primary desc">Complete Deposit</strong>
        <label for="">Name of Bank used in transfer</label>
        <div class="cont required">
            <input type="text" name="account_name" placeholder="E.g First Bank PLC" class="inp input">
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <label for="">Name on Bank used in transfer</label>
        <div class="cont required">
            <input type="text" name="bank_name" placeholder="E.g {{ ucwords(Auth::guard('users')->user()->name) }}" class="inp input">
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <button class="post">Submit Deposit</button>
    </form>
@endsection
@section('js')
  <script class="js">
    MyFunc = {
        Paid : function(element){
            document.querySelector('.bg-whitesmoke.details').classList.add('display-none');
            document.querySelector('.bg-whitesmoke.complete').classList.remove('display-none');
            element.onclick=function(){
                MyFunc.Back(element)
            }
            element.innerHTML='Show Deposit details';
        },
        Back : function(element){
             document.querySelector('.bg-whitesmoke.details').classList.remove('display-none');
            document.querySelector('.bg-whitesmoke.complete').classList.add('display-none');
            element.onclick=function(){
                MyFunc.Paid(element)
            }
             element.innerHTML='I have made the transfer';
        },
        Submitted : function(response,event){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href=data.url;
            }
        }
    }
  </script>
@endsection