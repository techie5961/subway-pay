 @extends('layout.users.auth')
 @section('title')
     Login
 @endsection 
 @section('main')
     <section class="justify-center column w-full p-10">
     <img style="width:150px;" src="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}" alt="LOGO">
   
     <form method="POST" action="{{ url('users/post/login/process') }}" onsubmit="PostRequest(event,this,call_back)" style="margin-top:20px" action="" class="w-full c-primary column g-10">
     <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
       
      
       
        <div class="cont br-0 bg-light required row">
            <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="id" type="text" placeholder="Username or Mobile Number">
                @include('components.sections',[
          'required' => true
        ])
        </div>
       
      
        <div class="cont br-0 row">
            <input autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="password" type="password" placeholder="Password">
                @include('components.sections',[
          'required' => true
        ])
        </div>
      <button class="post pointer bold clip-0 select-none top-10 br-0"><div class="content">Login Safely</div></button>
     </form>
     <div class="row g10 top-10 bottom-10 m-left-auto space-between">
       <span>
       Dont have an account? <a href="{{ url('register') }}" class="c-primary m-left-auto select-none">Create Account</a>
        
      </span> 
    </div>
     </section>
 @endsection
 @section('js')
     <script class="js">
      window.MyFunc=function(){
        window.call_back=function(response){
          if(JSON.parse(response).status == 'success'){
            window.location.href=JSON.parse(response).url;
          }
        }
      }
      MyFunc();
     </script>
 @endsection