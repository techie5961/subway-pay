@extends('layout.admins.auth')
@section('title')
    Login
@endsection
@section('main')
    <form method="POST" onsubmit="PostRequest(event,this,MyFunc.call_back)" action="{{ url()->to('admins/post/login/process') }}" class="form">
    
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
        <img src="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}" width="100" alt="">
        <b class="text-desc desc">Admin Login</b>
        <div class="cont required">
           <div  style="padding:10px;"> 
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
          
        </div>
            <input type="text" name="tag" placeholder="Admin Tag" class="inp input">
            <div class="prompt"><i>Required</i></div>
        </div>
          <div class="cont required">
         <div  style="padding:10px;">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="white" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm40-104a40,40,0,1,0-65.94,30.44L88.68,172.77A8,8,0,0,0,96,184h64a8,8,0,0,0,7.32-11.23l-13.38-30.33A40.14,40.14,0,0,0,168,112ZM136.68,143l11,25.05H108.27l11-25.05A8,8,0,0,0,116,132.79a24,24,0,1,1,24,0A8,8,0,0,0,136.68,143Z"></path></svg>
         </div> 
            <input type="password" name="password" placeholder="Password" class="inp input">
          <div class="prompt"><i>Required</i></div>
        </div>
        <button style="font-family:pacifico;font-weight:bold;background:#ffd700;" class="btn top-20 bottom-20">Login Safely</button>
    </form>
@endsection
@section('js')
    <script>
        let MyFunc={
            call_back : function(response){
                if(JSON.parse(response).status == 'success'){
                    window.location.href=JSON.parse(response).url;
                }
            }
        }
    </script>
@endsection