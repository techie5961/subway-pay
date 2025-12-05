@extends('layout.admins.app')
@section('title')
    User
@endsection
@section('css')
    <style>
        .action.active{
            border-bottom:3px solid var(--primary);
          
        }
        form.column{
            display:none;
        }
        form.column.active{
            display:flex;
        }
    </style>
@endsection
@section('main')
 
    <section class="w-full p-10 g-10 column pc-grid pc-grid-2">
      
                <div class="column p-10 bg-light grid-full w-full br-10 g-10">
                    <div class="row w-full g-10 space-between">
                        <div class="photo" style="background-image:url('{{ asset('images/users/'.$user->photo.'') }}')"></div>
                    <div class="column m-right-auto">
                      <div class="row g-5 align-center"><b>{{ ucfirst($user->username) }}</b>@if ($user->type === 'promoter')
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffd700" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>
                      @endif</div> 
                        <span class="text-small text-dim row align-center break-word"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Registered {{ $user->frame }}</span>
                    <span class="text-small break-word text-dim row align-center break-word"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-8,144H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>{{ $user->email }}</span>
                    </div>
                   <div class="status {{ $user->status == 'active' ? 'green' : ($user->status == 'banned' ? 'gold' : 'red') }}">{{ $user->status }}</div>
                    </div>
                    <hr>
                    <div class="grid grid-2 no-select g-10 w-full">
                        <div class="bg p-10 w-full align-center br-10 column align-center">
                            <b class="c-primary">Deposit Balance</b>
                            <b class="font-1">&#8358;{{ number_format($user->deposit,2) }}</b>
                        </div>
                         <div class="bg p-10 w-full align-center text-center br-10 column align-center">
                            <b class="c-primary">Withdraw Balance</b>
                            <b class="font-1">&#8358;{{ number_format($user->withdrawal,2) }}</b>
                        </div>
                         <div class="bg p-10 w-full align-center br-10 column align-center">
                            <b class="c-primary">Total Deposit</b>
                            <b class="font-1">&#8358;{{ number_format($user->total_deposit,2) }}</b>
                        </div>
                         <div class="bg p-10 w-full align-center text-center br-10 column align-center">
                            <b class="c-primary">Total Withdrawn</b>
                            <b class="font-1">&#8358;{{ number_format($user->total_withdrawn,2) }}</b>
                        </div>
                    </div>
                    <div class="column bg br-10 w-full p-10">
                         <div class="row w-full g-10">
                        <strong class="c-primary">Uniqid:</strong>
                        <b>{{ $user->uniqid ?? '' }}</b>
                    </div>
                        <div class="row w-full g-10">
                        <strong class="c-primary">Referred By:</strong>
                        <b>{{ ucfirst($user->ref) ?? '' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Mobile Number:</strong>
                        <b>{{ $user->mobile ?? 'null' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Full Name:</strong>
                        <b>{{ ucwords($user->name) ?? '' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Bank Details:</strong>
                        <b>{{ $user->bank->account_number ?? 'null' }} / {{ $user->bank->bank_name ?? 'null' }} / {{ $user->bank->account_name ?? 'null' }}</b>
                    </div>
                       <div class="row w-full g-10">
                        <strong class="c-primary">Total Referred:</strong>
                        <b>{{ number_format($user->total_ref) ?? '' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Total Referral Earnings:</strong>
                        <b>&#8358;{{ number_format($user->total_ref_earnings,2) ?? '0.00' }}</b>
                    </div>
                    <div class="row w-full g-10">
                        <strong class="c-primary">Total Second Level Referrals:</strong>
                        <b>{{ number_format($user->total_second_ref) ?? '' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Total Second Level Earnings:</strong>
                        <b>&#8358;{{ number_format($user->total_second_level_earnings,2) ?? '0.00' }}</b>
                    </div>
                    <div class="row w-full g-10">
                        <strong class="c-primary">Total Purchase:</strong>
                        <b>{{ number_format($user->total_purchase) ?? '' }}</b>
                    </div>
                      <div class="row w-full g-10">
                        <strong class="c-primary">Total Purchase Amount:</strong>
                        <b>&#8358;{{ number_format($user->total_purchase_amount,2) ?? '' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Total Active Products:</strong>
                        <b>{{ number_format($user->total_active_purchase) ?? '' }}</b>
                    </div>
                     <div class="row w-full g-10">
                        <strong class="c-primary">Total Daily Income:</strong>
                        <b>&#8358;{{ number_format($user->total_daily_income,2) ?? '' }}</b>
                    </div>
                   
                    </div>
                   @if ($user->type == 'promoter')
                        <button onclick="window.location.href='{{ url('admins/get/mark/as/promoter?user_id='.$user->id.'') }}'" class="btn-gold m-left-auto">UnMark As Promoter</button>
                   @else
                        <button onclick="window.location.href='{{ url('admins/get/mark/as/promoter?user_id='.$user->id.'') }}'" class="btn-green m-left-auto">Mark As Promoter</button>
                   @endif
                   <div class="row w-full space-between g-10">
                     <a href="{{ url('admins/ban/user?id='.$user->id.'') }}" class="btn-red-3d no-u clip-5 br-5">{{ $user->status == 'active' ? 'Ban User' : 'UnBan User' }}</a>
                     <a target="_blank" href="{{ url('admins/login/as/user?id='.$user->id.'') }}" class="btn-blue-3d no-u clip-5 br-5">Login as User</a>
             
                   </div>
                </div>
                <div class="card">
                    <div class="row no-select space-between">
                    <div onclick="ToggleForm(this,document.querySelector('.credit_form'))" class="w-full action pointer p-10 br-10 clip-10 text-center active">Credit User</div>
                    <div onclick="ToggleForm(this,document.querySelector('.debit_form'))" class="w-full action pointer p-10 br-10 clip-10 text-center">Debit User</div>
                    </div>
                    <hr>
                    <form action="{{ url('admins/post/credit/user/process') }}" method="POST" onsubmit="PostRequest(event,this,CallBack)" class="w-full active credit_form g-10 column">
                        <input type="hidden" value="{{ $user->id }}" name="user_id" class="inp input">
                         <input type="hidden" value="{{ csrf_token() }}" name="_token" class="inp input">
                        <div class="cont required">
                        <select style="font-family: poppins;" name="wallet" class="inp input">
                            <option selected disabled value="">Select Wallet....</option>
                            <option value="deposit">Deposit Wallet</option>
                            <option value="withdrawal">Withdrawal Wallet</option>
                        </select>
                        @include('components.sections',[
                            'required' => true
                        ])
                        </div>
                         <div class="cont required">
                       <input name="amount"  placeholder="Credit Amount" type="text" class="inp input">
                        @include('components.sections',[
                            'required' => true
                        ])
                        </div>
                        <button style="background:greenyellow;color:black" class="post">Credit User</button>
                    </form>
                     <form action="{{ url('admins/post/debit/user/process') }}" method="POST" onsubmit="PostRequest(event,this,CallBack)" class="w-full debit_form g-10 column">
                        <input type="hidden" value="{{ $user->id }}" name="user_id" class="inp input">
                         <input type="hidden" value="{{ csrf_token() }}" name="_token" class="inp input">
                        <div class="cont required">
                        <select style="font-family: poppins;" name="wallet" class="inp input">
                            <option selected disabled value="">Select Wallet....</option>
                            <option value="deposit">Deposit Wallet</option>
                            <option value="withdrawal">Withdrawal Wallet</option>
                        </select>
                        @include('components.sections',[
                            'required' => true
                        ])
                        </div>
                         <div class="cont required">
                       <input name="amount"  placeholder="Debit Amount" type="text" class="inp input">
                        @include('components.sections',[
                            'required' => true
                        ])
                        </div>
                        <button style="background:red;" class="post">Debit User</button>
                    </form>
                </div>
                
          
    </section>
@endsection
@section('js')
    <script>
        function ToggleForm(element,form){
            document.querySelectorAll('.action').forEach((action)=>{
                action.classList.remove('active');
            });
           element.classList.add('active');
           document.querySelectorAll('form').forEach((forms)=>{
            forms.classList.remove('active');

           });
           form.classList.add('active');
        }
        function CallBack(response){
            if(JSON.parse(response).status == 'success'){
                window.location.reload();
            }
        }
    </script>
@endsection