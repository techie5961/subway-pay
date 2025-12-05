@extends('layout.users.app')
@section('title')
    Bank Account
@endsection

@section('main')
    <section class=" bg column average">
      <strong class="desc">Add Bank Account</strong>
       <form onsubmit="PostRequest(event,this,MyFunc.Linked)" action="{{ url()->to('users/post/bank/update/process') }}" method="POST" class="column w-full  max-w-500 g-10 p-10 flex-auto">
        <input type="hidden" class="input" name="_token" value="{{ csrf_token() }}">
        <div style="border:1px solid var(--bg-lighter)" class="cont bg-light br-0 max-500 required">
            
            <input oninput="
            try{
            document.querySelector('.add-btn').classList.add('disabled');
            document.querySelector('input[name=account_name]').value='';
            if((this.value).length == 10 && document.querySelector('select[name=bank_key]').value !== ''){
                  document.querySelector('input[name=account_name]').value='Verifying account name,please wait...';
            GetRequest(event,'{{ url('users/get/paystack/bank/auto/verify') }}?account_number=' + this.value + '&bank_id=' + document.querySelector('select[name=bank_key]').value,document.createElement('div'),MyFunc.Verified);
                
            }
            }catch(error){
            alert(error.stack);
            }
            " name="account_number" placeholder="10 Digits Account Number" type="number" class="inp input">
             @include('components.sections',[
            'required' => true
           ])
        </div>
        
        <div style="border:1px solid var(--bg-lighter)" class="cont br-0 bg-light max-500 required">
         
          <select onchange="
            try{
            document.querySelector('.add-btn').classList.add('disabled');
            document.querySelector('input[name=account_name]').value='';
            if((document.querySelector('input[name=account_number]').value).length == 10 && this.value !== ''){
                document.querySelector('input[name=account_name]').value='Verifying account name,please wait...';
            GetRequest(event,'{{ url('users/get/paystack/bank/auto/verify') }}?account_number=' + document.querySelector('input[name=account_number].value') + '&bank_id=' + this.value,document.createElement('div'),MyFunc.Verified);
                
            }
            }catch(error){
            alert(error.stack);
            }
            " style="font-family:poppins" name="bank_key" id="" class="inp input">
            <option value="">Select Bank...</option>
            @foreach (PaystackBanks()->data as $data)
                <option value="{{ $data->id }}">{{ $data->name }}</option>
            @endforeach
          </select>
           @include('components.sections',[
            'required' => true
           ])
        </div>
         <div style="border:1px solid var(--bg-lighter)" class="cont bg-light br-0 max-500 required">
          
            <input name="account_name" readonly placeholder="Account Name" type="text" class="inp input">
              @include('components.sections',[
            'required' => true
           ])
        </div>
        <button class="m-top-auto add-btn disabled clip-0 br-0 btn bg-gradient"><div class="content">Add Bank</div></button>
       </form>
     @isset($bank)
          <div class="column p-10 g-10">
            <strong style="font-weight:900;font-size:1.5rem;" class="desc">Current Bank Details</strong>
             <div style="border:1px solid var(--bg-lighter)" class="w-full column g-5 bg-light p-10">
        <div class="row align-center">Account Number : {{ $bank->account_number }}</div>
        <div class="row align-center">Bank Name : {{ $bank->bank_name }}</div>
        <div class="row align-center">Account Name : {{ $bank->account_name }}</div>
       </div>
          </div>
     @endisset


     
    </section>
@endsection
@section('js')
    <script class="js">
     window.MyFunc = {
      Verified : function(response){
      let data=JSON.parse(response);
      if(data.status == 'success'){
        document.querySelector('input[name=account_name]').value=data.message;
        document.querySelector('.add-btn').classList.remove('disabled');

      }else{
        document.querySelector('input[name=account_name]').value=data.message;
        document.querySelector('.add-btn').classList.add('disabled');
      }
      },
      Linked : function(response){
        let data=JSON.parse(response);
        if(data.status == 'success'){
          spa(event,'{{ url()->current() }}');
        }
      }
     }
    </script>
@endsection