 @extends('layout.users.auth')
 @section('title')
     Register
 @endsection
 @section('main')
     <section class="justify-center column w-full p-10">
     <img style="width:150px;" src="{{ asset('images/logo.png?v='.config('versions.vite_version').'') }}" alt="LOGO">
  
     <form method="POST" action="{{ url('users/post/register/process') }}" onsubmit="PostRequest(event,this,call_back)" style="margin-top:20px" action="" class="w-full c-primary column g-10">
     <input type="hidden" name="_token" value="{{ csrf_token() }}" class="input">
        {{-- <div class="cont required br-0 align-center row">
        <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="email" type="email" placeholder="Email">
        @include('components.sections',[
          'required' => true
        ])
        </div> --}}
        {{-- MOBILE --}}
         <div class="cont br-0 required row">
          <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="mobile" type="number" placeholder="Mobile Number">
              @include('components.sections',[
          'required' => true
        ])
      </div>
      {{-- USERNAME --}}
       <div class="cont br-0 required row">
         <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="username" type="text" placeholder="Username">
    @include('components.sections',[
          'required' => true
        ])
       </div>
          {{-- FULL NAME --}}
        <div class="cont br-0 required row">
            <input autocomplete="off" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="name" type="text" placeholder="Full Name">
                @include('components.sections',[
          'required' => true
        ])
        </div>
       
      
      @if ($ref !== '')
           {{-- REFERRAL--}}
       <div class="cont br-0 required row">
             <input readonly class="input inp" value="{{ $ref }}" name="ref" type="text">
              
        </div>
      @endif
        {{-- PASSWORD --}}
        <div class="cont br-0 required row">
             <input autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="input inp required" name="password" type="password" placeholder="Password">
                @include('components.sections',[
          'required' => true
        ])
        </div>
      <button class="post br-0 pointer clip-0 select-none bold top-10 br-0"><div class="content">Register</div></button>
     </form>
     <div class="row g10 top-10 bottom-10 m-left-auto">
      <span>
        Have an Account?
      </span>
       <a href="{{ url('login') }}" class="c-primary select-none">Login</a>
     
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