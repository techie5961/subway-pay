@extends('layout.users.app') 
@section('title')
    Deposit
@endsection
@section('css')
    <style class="css">
        body,main{
            overflow:hidden;
            
        }
          .auto.active{
            animation:bounce 0.5s linear forwards;
            background:#4caf50;
            color:white;
        }
        @keyframes bounce {
             0%,100%{
                transform:scale(1);
             }
             50%{
                transform:scale(1.1)
             }
        }
    
    </style>
@endsection
@section('main')
    <section id="x" class="column align-center bg average">
       
       <div class="column flex-auto w-full overflow m-x-auto p-10 g-5">
        <div class=" br-10 p-10 top-20 w-full max-w-500 m-x-auto column g-5">
            <div style="border  :1px solid var(--bg-lighter)" class="cont w-full br-0">
             <b style="padding:10px 20px;background:transparent;border-right:0.1px solid rgba(255,255,255,0.1)" class="row h-full justify-center p-10">&#x20a6;</b>
                <input oninput="MyFunc.AutoDetect(this)" placeholder="0.00" type="number" name="amount" class="inp amount input">
            </div>
        </div>
        <div class="grid-3 grid w-full max-w-500 m-x-auto no-select g-5">
            <div onclick="
                    document.querySelector('input[name=amount]').value=1000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 1,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=2000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 2,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=5000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 5,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=10000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 10,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=20000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    "  class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 20,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=50000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 50,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=75000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 75,000
            </div>
               <div onclick="
                    document.querySelector('input[name=amount]').value=100000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 100,000
            </div>
              <div onclick="
                    document.querySelector('input[name=amount]').value=200000;
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center br-0 pointer clip-0 text-bold">
               &#8358; 200,000
            </div>
        </div>
       </div>
       @isset($bank)
          <div class="column w-full p-10 g-10">
            <strong style="font-weight:900;font-size:1.5rem;" class="desc">Current Bank Details</strong>
             <div style="border:1px solid var(--bg-lighter)" class="w-full column g-5 bg-light p-10">
        <div class="row align-center">Account Number : {{ $bank->account_number }}</div>
        <div class="row align-center">Bank Name : {{ $bank->bank_name }}</div>
        <div class="row align-center">Account Name : {{ $bank->account_name }}</div>
      <div style="border-bottom:2px solid var(--primary-dark)" onclick="spa(event,'{{ url('users/bank') }}')" class="w-fit pointer h-50 bg-primary p-x-20 p-10 m-left-auto primary-text row justify-center">
        UPDATE
        <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M8.51192 4.43057C8.82641 4.161 9.29989 4.19743 9.56946 4.51192L15.5695 11.5119C15.8102 11.7928 15.8102 12.2072 15.5695 12.4881L9.56946 19.4881C9.29989 19.8026 8.82641 19.839 8.51192 19.5695C8.19743 19.2999 8.161 18.8264 8.43057 18.5119L14.0122 12L8.43057 5.48811C8.161 5.17361 8.19743 4.70014 8.51192 4.43057Z" fill="CurrentColor"></path>
</svg>

       </div>
    </div>
       
          </div>
     @endisset

      @if ($portal == 'active')
           <button onclick="MyFunc.Initiate(this)"class="btn withdraw-btn clip-0 br-0 m-x-auto disabled" style="width:calc(100% - 20px);margin:10px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80Zm-80,84a12,12,0,1,1,12-12A12,12,0,0,1,128,164Zm32-84H96V56a32,32,0,0,1,64,0Z"></path></svg>

       Withdraw Funds</button> 
      @else
          <div class="w-full p-10">
            <div style="border:1px solid red;background:rgba(255,0,0,0.1);color:rgb(241, 78, 78)" class="w-full br-5 p-10 column g-10">
                <div class="row align-center g-10">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M12 6.25C12.4142 6.25 12.75 6.58579 12.75 7V13C12.75 13.4142 12.4142 13.75 12 13.75C11.5858 13.75 11.25 13.4142 11.25 13V7C11.25 6.58579 11.5858 6.25 12 6.25Z" fill="CurrentColor"></path>
<path d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z" fill="CurrentColor"></path>
<path fill-rule="evenodd" clip-rule="evenodd" d="M1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12ZM12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75Z" fill="CurrentColor"></path>
</svg>
<strong>Withdrawal portal closed</strong>
                </div>
                <div class="w-full" style="color:rgb(240, 96, 96)">Withdrawal portal is currrently closed,please check back later or contact support for more information.</div>
          </div>
          </div>
      @endif

    
    

    </section>
@endsection
@section('js')
    <script class="js">
        window.MyFunc={
            AutoFocus : function(){
                document.querySelector('input[name=amount]').focus();
            },
            AutoDetect : function(input){
               try{
             
                 if(input.value !== ''){
                    document.querySelector('.btn').classList.remove('disabled');
                } else{
                    document.querySelector('.btn').classList.add('disabled');
                }
               } catch(error){
                alert(error.stack);
               }
            },
            call_back : function(amount,input){
                  if(input.value !== ''){
                    document.querySelector('.btn').classList.remove('disabled');
                } else{
                    document.querySelector('.btn').classList.add('disabled');
                }
            },
            Initiate : function(){
                let amount=document.querySelector('input[name=amount]').value.trim();
                
                GetRequest(event,`{{ url()->to('users/withdraw/initiate') }}?amount=${amount}`,document.querySelector('.withdraw-btn'),MyFunc.initiated)
            }
            ,
            initiated : function(response){
               
              let data=JSON.parse(response);
              if(data.status == 'success'){
                spa(event,data.url);
              }else{
               CreateNotify(data.status,data.message);
              }
            }

        }
        MyFunc.AutoFocus();
    </script>
@endsection