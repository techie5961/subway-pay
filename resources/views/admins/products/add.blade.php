@extends('layout.admins.app')
@section('title')
    Add New Product
@endsection
@section('main')
    <section class="section1 p-10 w-full">
      <div class="column p-10 bg-light w-full br-10 g-10">
            <div class="row align-center g-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>
                <strong class="desc text-gradient">Add New Product</strong>
            </div>
            
            <form enctype="multipart/form-data" class="column" action="{{ url()->to('admins/post/add/product/process') }}" method="POST" onsubmit="PostRequest(event,this,MyFunc.CallBack)">
              <input type="hidden" name="_token" class="input" value="{{ csrf_token() }}">
                <label for="photo" class="br-20 max-w-200 pointer clip-20 column justify-center c-primary m-x-auto w-half border-dashed-2 perfect-square bg  bg-image">
                    <div class="column content p-10 text-center c no-select justify-center g-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M196.49,151.51a12,12,0,0,1-17,17L168,157v51a12,12,0,0,1-24,0V157l-11.51,11.52a12,12,0,1,1-17-17l32-32a12,12,0,0,1,17,0ZM160,36A92.08,92.08,0,0,0,79,84.37,68,68,0,1,0,72,220h28a12,12,0,0,0,0-24H72a44,44,0,0,1-1.81-87.95A91.7,91.7,0,0,0,68,128a12,12,0,0,0,24,0,68,68,0,1,1,132.6,21.29,12,12,0,1,0,22.8,7.51A92.06,92.06,0,0,0,160,36Z"></path></svg>
                        <span class="text-light">Upload Product Image</span>
                    </div>
                </label>
                <input required onchange="PreviewPhoto(this,document.querySelector('label[for=photo]'))" type="file" accept="image/*" name="photo" id="photo" class="file display-none">
                <label class="top-10" for="">Product Name</label>
                <div class="cont required">
                    <input type="text" placeholder="E.g Bronze Product" name="name" class="inp input">
                    @include('components.sections',[
                        'required' => 'true'
                    ])
                </div>
                 <label class="top-10" for="">Product Price (&#8358;)</label>
                <div class="cont required">
                    <input type="number" step="any" placeholder="E.g 100000" name="price" class="inp input">
                     @include('components.sections',[
                        'required' => 'true'
                    ])
                </div>
                <label class="top-10" for="">Daily Return (&#8358;)</label>
                <div class="cont required">
                    <input type="number" step="any" placeholder="E.g 500" name="return" class="inp input">
                     @include('components.sections',[
                        'required' => 'true'
                    ])
                </div>
                <label class="top-10" for="">Product Validity (days)</label>
                <div class="cont required">
                    <input type="number" placeholder="E.g 25" name="validity" class="inp input">
                     @include('components.sections',[
                        'required' => 'true'
                    ])
                </div>
                  <label class="top-10" for="">Purchase Limit</label>
                <div class="cont required">
                    <input type="number" placeholder="E.g 25" name="limit" class="inp input">
                     @include('components.sections',[
                        'required' => 'true'
                    ])
                </div>
                <button class="post"><div class="content">Add Product</div></button>
            </form>
        </div>
    </section>
@endsection
@section('js')
    <script>
        let MyFunc={
            CallBack : function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }
            }
        }
    </script>
@endsection