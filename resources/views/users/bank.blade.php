@extends('layout.users.app')
@section('title')
    Bank Account
@endsection
@section('css')
    <style class="css">
      body{
        overflow: hidden;
      }
    </style>
@endsection
@section('main')
    <section class="pos-fixed top-0 left-0 right-0 bottom-0 overflow-m-y-auto bg column align-center average">
          <div class="p-10 row pos-stick stick-top space-between bg w-full align-center">
        <svg class="pc-pointer" onclick="spa(event,'{{ url()->previous() == request()->fullUrl() ? url()->to('users/dashboard') : url()->previous() }}')" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256"><path d="M228,128a12,12,0,0,1-12,12H69l51.52,51.51a12,12,0,0,1-17,17l-72-72a12,12,0,0,1,0-17l72-72a12,12,0,0,1,17,17L69,116H216A12,12,0,0,1,228,128Z"></path></svg>
        <b>Bank Account</b>
        <span></span>
       </div>
       <form onsubmit="PostRequest(event,this)" action="{{ url()->to('users/post/bank/update/process') }}" method="POST" class="column w-full  max-w-500 g-10 p-10 flex-auto">
        <input type="hidden" class="input" name="_token" value="{{ csrf_token() }}">
        <div style="border:1px solid var(--bg-lighter)" class="cont bg-light br-0 max-500 required">
            <div style="border-right:0.1px solid #708090" class="p-10 h-full bg-transparent perfect-square column justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256"><path d="M224,88H175.4l8.47-46.57a8,8,0,0,0-15.74-2.86l-9,49.43H111.4l8.47-46.57a8,8,0,0,0-15.74-2.86L95.14,88H48a8,8,0,0,0,0,16H92.23L83.5,152H32a8,8,0,0,0,0,16H80.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,80,224a8,8,0,0,0,7.86-6.57l9-49.43H144.6l-8.47,46.57a8,8,0,0,0,6.44,9.3A7.79,7.79,0,0,0,144,224a8,8,0,0,0,7.86-6.57l9-49.43H208a8,8,0,0,0,0-16H163.77l8.73-48H224a8,8,0,0,0,0-16Zm-76.5,64H99.77l8.73-48h47.73Z"></path></svg>
            </div>
            <input value="{{ $bank->account_number ?? '' }}" name="account_number" placeholder="10 Digits Account Number" type="number" class="inp input">
             @include('components.sections',[
            'required' => true
           ])
        </div>
        
        <div style="border:1px solid var(--bg-lighter)" class="cont br-0 bg-light max-500 required">
          <div style="border-right:0.1px solid #708090" class="p-10 column h-full bg-transparent perfect-square">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" viewBox="0 0 256 256"><path d="M24,104H48v64H32a8,8,0,0,0,0,16H224a8,8,0,0,0,0-16H208V104h24a8,8,0,0,0,4.19-14.81l-104-64a8,8,0,0,0-8.38,0l-104,64A8,8,0,0,0,24,104Zm40,0H96v64H64Zm80,0v64H112V104Zm48,64H160V104h32ZM128,41.39,203.74,88H52.26ZM248,208a8,8,0,0,1-8,8H16a8,8,0,0,1,0-16H240A8,8,0,0,1,248,208Z"></path></svg>
          </div>
          <select style="font-family:poppins" name="bank_key" id="" class="inp input">
            <option value="">Select Bank...</option>
            @foreach (Banks() as $data => $key)
                <option {{ ($bank->bank_key ?? '') == $data ? 'selected' : '' }} value="{{ $data }}">{{ $key->name }}</option>
            @endforeach
          </select>
           @include('components.sections',[
            'required' => true
           ])
        </div>
         <div style="border:1px solid var(--bg-lighter)" class="cont bg-light br-0 max-500 required">
            <div style="border-right:0.1px solid #708090" class="p-10 h-full bg-transparent perfect-square column justify-center">
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
              </div>
            <input value="{{ $bank->account_name ?? '' }}" name="account_name" placeholder="Account Name" type="text" class="inp input">
              @include('components.sections',[
            'required' => true
           ])
        </div>
        <button class="m-top-auto clip-0 br-0 btn bg-gradient"><div class="content">Add Bank</div></button>
       </form>


     
    </section>
@endsection
@section('js')
    <script class="js">
     
    </script>
@endsection