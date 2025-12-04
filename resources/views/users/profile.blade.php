@extends('layout.users.app')
@section('title')
    Profile
@endsection
@section('css')
    <style class="css">
        .absolute{
            background:var(--primary);
            width:fit-content;
            height:fit-content;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:2px;
            position:absolute;
            bottom:0;
            right:0;
            border-radius:50%;
            transform:translate(-50%,-50%);
            border:1px solid var(--bg);
            cursor:pointer;
            clip-path: inset(0 round 50%);
        }
        .photo{
            position:relative;
        }
    </style>
@endsection
@section('main')
    <section class="section1 column w-full g-10 p-10 align-center max-500">
        <div class="photo" style="min-height:100px;min-width:100px;max-width:100px;max-height:100px;background-image:url('{{ asset('images/users/'.Auth::guard('users')->user()->photo.'') }}')">
        <label class="absolute">
             <input onchange="MyFunc.UpdatePhoto(this)" type="file" id="file" accept="image/*" class="display-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#000000" viewBox="0 0 256 256"><path d="M208,56H180.28L166.65,35.56A8,8,0,0,0,160,32H96a8,8,0,0,0-6.65,3.56L75.71,56H48A24,24,0,0,0,24,80V192a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V80A24,24,0,0,0,208,56Zm-44,76a36,36,0,1,1-36-36A36,36,0,0,1,164,132Z"></path></svg>
        </label>
       
        </div>
        <strong class="desc">{{ucfirst(strtolower(Auth::guard('users')->user()->username)) }}</strong>
        <span style="font-family:'cinzel decorative'" class="text-dim m-right-auto">Personal Information</span>
        <section class="bg-light w-full max-500 column p-10 br-10">
            <span class="text-dim">Full Name</span>
            <span class="m-bottom-10">{{ ucwords(Auth::guard('users')->user()->name) }}</span>
            
             <span class="text-dim">Email Address</span>
            <span class="m-bottom-10">{{ Auth::guard('users')->user()->email }}</span>
              <span class="text-dim">Registration Date</span>
            <span class="m-bottom-10">{{ $reg_date }}</span>
            <hr>
            <span onclick="SlideUp()" class="pointer br-10 clip-10 row align-center justify-center p-10 c-primary no-select">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H216a8,8,0,0,0,0-16H115.32l112-112A16,16,0,0,0,227.32,73.37ZM136,75.31,152.69,92,68,176.69,51.31,160ZM48,208V179.31L76.69,208Zm48-3.31L79.32,188,164,103.31,180.69,120Zm96-96L147.32,64l24-24L216,84.69Z"></path></svg>
                Update Password
            </span>
        </section>
        <span style="font-family:'cinzel decorative'" class="text-dim m-right-auto">Actions</span>
        <section class="column bg-light br-10 w-full clip-10 max-500">
            <div class="row w-full br-10 clip-10 p-10 g-5 no-select pointer space-between align-center">
                <div style="background:var(--bg-lighter)" class=" h-30 justify-center column perfect-square br-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M221.8,175.94C216.25,166.38,208,139.33,208,104a80,80,0,1,0-160,0c0,35.34-8.26,62.38-13.81,71.94A16,16,0,0,0,48,200H88.81a40,40,0,0,0,78.38,0H208a16,16,0,0,0,13.8-24.06ZM128,216a24,24,0,0,1-22.62-16h45.24A24,24,0,0,1,128,216Z"></path></svg>

                </div>
                <span class="m-right-auto">Notifications</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>
            </div>
             <div class="row w-full br-10 clip-10 p-10 g-5 no-select pointer space-between align-center">
                <div style="background:var(--bg-lighter)" class="bg-lighter h-30 justify-center column perfect-square br-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M196,96c0,29.47-24.21,54.05-56,59.06V156a12,12,0,0,1-24,0V144a12,12,0,0,1,12-12c24.26,0,44-16.15,44-36s-19.74-36-44-36S84,76.15,84,96a12,12,0,0,1-24,0c0-33.08,30.5-60,68-60S196,62.92,196,96Zm-68,92a20,20,0,1,0,20,20A20,20,0,0,0,128,188Z"></path></svg>
                </div>
                <span class="m-right-auto">Help and Support</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="var(--primary)" viewBox="0 0 256 256"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>
            </div>
             <div onclick="window.location.href='{{  url()->to('users/logout') }}'" class="row w-full br-10 clip-10 p-10 g-5 no-select pointer space-between align-center">
                <div class="duotone-red h-30 justify-center column perfect-square br-10">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="CurrentColor" viewBox="0 0 256 256"><path d="M124,216a12,12,0,0,1-12,12H48a12,12,0,0,1-12-12V40A12,12,0,0,1,48,28h64a12,12,0,0,1,0,24H60V204h52A12,12,0,0,1,124,216Zm108.49-96.49-40-40a12,12,0,0,0-17,17L195,116H112a12,12,0,0,0,0,24h83l-19.52,19.51a12,12,0,0,0,17,17l40-40A12,12,0,0,0,232.49,119.51Z"></path></svg>
                   </div>
                <span class="m-right-auto">Logout</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" viewBox="0 0 256 256"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>
            </div>
        </section>
    </section>
   
    @section('slideup_child')
        <form action="{{ url()->to('users/post/password/update') }}" onsubmit="PostRequest(event,this,MyFunc.Updated)" method="POST" class="column w-full g-10">
            <input type="hidden" class="input" name="_token" value="{{ csrf_token() }}">
            <label for="">Current Password</label>
             <div style="border:1px solid var(--bg-lighter)" class="cont br-0 required">
                <input name="current" type="password" placeholder="Enter Current Password" class="inp input">
                @include('components.sections',[
                    'required' => true
                ])
            </div>
              <label for="">New Password</label>
             <div style="border:1px solid var(--bg-lighter)" class="cont br-0 required">
                <input name="new" type="password" placeholder="Enter New Password" class="inp input">
                @include('components.sections',[
                    'required' => true
                ])
            </div>
             <label for="">Confirm New Password</label>
            <div style="border:1px solid var(--bg-lighter)" class="cont br-0 required">
                <input name="confirm" type="password" placeholder="Confirm New Password" class="inp input">
                @include('components.sections',[
                    'required' => true
                ])
            </div>
            <button class="btn br-0 clip-0 bg-gradient"><div class="content">Update Account Password</div></button>
        </form>

    @endsection
@endsection
@section('js')
<script class="js">
  
  MyFunc={
            UpdatePhoto : async function(element){
               try{
                 let file=element.files[0];
                if(file){
                    BallLoad();
                    let form=new FormData();
                    form.append('photo',file);
                    form.append('_token','{{ csrf_token() }}')
                    let response=await fetch('{{ url('users/post/update/photo/process') }}',{
                        method : 'POST',
                        body : form
                    });
                    if(response.ok){
                        let data=await response.json();
                       CreateNotify(data.status,data.message);
                       document.querySelector('header .photo').style.backgroundImage=`url('${data.photo}')`;
                        spa(event,'{{ url()->to('users/profile') }}');
                    }else{
                        alert(response.status);
                        HideBallLoad();
                    }

                }
               }catch(error){
                alert(error.stack);
               }
            },
            Updated : function(response,event){
                let data=JSON.parse(response);
                if(data.status  ==  'success'){
                    spa(event,data.url);
                }
            }
        }
    
       
</script>
    
    
@endsection