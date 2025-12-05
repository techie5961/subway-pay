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
    <section id="x" class=" column align-center bg average">
      
       <div class="column flex-auto w-full overflow m-x-auto p-10 g-5">
        <strong class="desc">Enter Deposit Amount</strong>
        {{-- <div class="bg-light br-10 p-10 top-20 w-full max-w-500 m-x-auto column g-5"> --}}
            <div style="border:1px solid var(--bg-lighter)" class="cont max-w-500 m-x-auto bg-light w-full br-0">
                <input oninput="
                if(this.value >= {{ $auto[0]->price }}){
                 document.querySelector('.btn').classList.remove('disabled');
                }else{
                 document.querySelector('.btn').classList.add('disabled');
                }
                " placeholder="0.00" type="number" name="amount" class="inp amount input">
            </div>
        {{-- </div> --}}
        <div class="grid-4 grid w-full max-w-500 m-x-auto no-select g-5">
          @if (!$auto->isEmpty())
              @foreach ($auto as $data)
                    <div onclick="
                    document.querySelector('input[name=amount]').value={{ $data->price }};
                    document.querySelectorAll('.auto').forEach((auto)=>{
                    auto.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.querySelector('.btn').classList.remove('disabled');
                    " class="bg-light auto p-10 w-full column justify-center pointer clip-0 text-bold">
               &#8358; {{ number_format($data->price,2) }}
            </div>
              @endforeach
          @endif
              
        </div>
       </div>
       <button onclick="MyFunc.Initiate(this)"class="btn m-x-auto clip-0 br-0 disabled" style="width:calc(100% - 20px);margin:10px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80Zm-80,84a12,12,0,1,1,12-12A12,12,0,0,1,128,164Zm32-84H96V56a32,32,0,0,1,64,0Z"></path></svg>

       Proceed</button> 

    
    

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
                let amount=(document.querySelector('input.amount').value).trim();
               spa(event,'{{ url('users/deposit/checkout') }}' + '?amount=' + amount);
                // GetRequest(event,`{{ url()->to('users/deposit/initiate/flutterwave') }}?amount=${amount}`,)
            }
            ,
            initiated : function(response){
              let data=JSON.parse(response);
              if(data.status == 'success'){
                
                window.location.href= data.url;
              }else{
               CreateNotify(data.status,data.message);
              }
            }

        }
        MyFunc.AutoFocus();
    </script>
@endsection