@extends('layout.admins.app')
@section('title')
    Bank Details
@endsection

@section('main')
    <section class="section1 column w-full p-10 g-10">
       <div class="column p-10 bg-light w-full br-10 g-10">
       <div class="row g-5 align-center">
         <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M24,108H44v48H32a12,12,0,0,0,0,24H224a12,12,0,0,0,0-24H212V108h20a12,12,0,0,0,6.29-22.22l-104-64a12,12,0,0,0-12.58,0l-104,64A12,12,0,0,0,24,108Zm44,0H92v48H68Zm72,0v48H116V108Zm48,48H164V108h24ZM128,46.09,189.6,84H66.4ZM252,208a12,12,0,0,1-12,12H16a12,12,0,0,1,0-24H240A12,12,0,0,1,252,208Z"></path></svg>
        <strong class="c-primary text-gradient desc">Bank Details</strong>
       </div>
       <form onsubmit="PostRequest(event,this)" action="{{ url('admins/post/add/bank/process') }}" method="POST" class="w-full column">
        <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
        <label class="top-10" for="">Account Number</label>
        <div class="cont required">
            <input value="{{ $details->account_number ?? '' }}" placeholder="Eg 5005016577" type="number" name="account_number" class="inp input">
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <label class="top-10" for="">Account Bank</label>
        <div class="cont required">
           <select name="bank_name" id="" style="font-family:poppins" class="inp input">
            <option value="">Select Bank....</option>
         @foreach ($banks as $data)
             <option {{ $data->code == ($details->bank_code ?? '') ? 'selected' : '' }} value="{{ $data->code }}">{{ $data->name }}</option>
         @endforeach
           </select>
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <label class="top-10" for="">Account Name</label>
        <div class="cont required bottom-20">
            <input value="{{ $details->account_name ?? '' }}" placeholder="Eg {{ config('app.name') }}" type="text" name="account_name" class="inp input">
            @include('components.sections',[
                'required' => true
            ])
        </div>
        <button class="post"><div class="content">Add Bank Account</div></button>
       </form>
       </div>
       
       
        <ul  style="background-color: #fff3cd; border-left: 4px solid #ffa800; padding: 12px 16px; border-radius: 5px; color: #856404;" class="w-full">
             <div class="row g-5 align-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="#ffa800" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm-4,48a12,12,0,1,1-12,12A12,12,0,0,1,124,72Zm12,112a16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40a8,8,0,0,1,0,16Z"></path></svg>
            <strong class="font-1" style="#ffa800;">Note</strong>
        </div>
             <li>Make sure this is the correct bank account you want to use.</li>
    <li>Double-check all account details before clicking save.</li>
    <li>Once added, all user deposits will be sent to this account.</li>
    <li>Ensure the account is active and able to receive funds.</li>
    <li>This account will be shown to users for manual payment.</li>
        </ul>
      
    </section>
@endsection
@section('js')
    <script>
        
        function verified(response){
            let data=JSON.parse(response);
            if(data.status == 'error'){
                CreateNotify(data.status,data.message);
            }else{
                document.querySelector('input[name=account_name]').value=data.message;
            }

        }
    </script>
@endsection