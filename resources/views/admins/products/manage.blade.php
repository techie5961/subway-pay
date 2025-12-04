@extends('layout.admins.app')
@section('title')
    Manage Products
@endsection
@section('main')
    <section class="section1 column pc-grid pc-grid-2 w-full p-10 g-10">
     
        @if ($products->isEmpty())
          @include('components.sections',[
            'null' => 'No Products available to show'
          ])  
        @else
           <strong class="desc grid-full text-gradient">Manage Products</strong>
            @foreach ($products as $data)
                <div class="column p-10 bg-light w-full br-10 g-10">
           <img src="{{ asset('products/'.$data->photo.'') }}" alt="" class="h-100 w-100 br-10">
        <hr>
        <div class="row space-between w-full g-10 align-center">
            <div class="column">
                <strong class="c-primary">{{ $data->name }}</strong>
                <span class="text-light">Product Name</span>
            </div>
               <div class="column">
                <strong class="c-primary m-left-auto">&#8358;{{ number_format($data->price,2) }}</strong>
                <span class="text-light m-left-auto">Product Price</span>
            </div>
        </div>
        <div class="row space-between w-full g-10 align-center">
            <div class="column">
                <strong class="c-primary">&#8358;{{ number_format($data->return,2) }}</strong>
                <span class="text-light">Daily Return</span>
            </div>
               <div class="column">
                <strong class="c-primary m-left-auto">{{ number_format($data->validity) }} days</strong>
                <span class="text-light m-left-auto">Product Validity</span>
            </div>
        </div>
         <div class="row space-between w-full g-10 align-center">
            <div class="column">
                <strong class="c-primary">{{ number_format($data->limit) }}</strong>
                <span class="text-light">Purchase Limit</span>
            </div>
               <div class="column">
                <strong class="c-primary m-left-auto">{{ $data->date }}</strong>
                <span class="text-light m-left-auto">Created On</span>
            </div>
        </div>
        <hr class="gradient">
        <div class="row space-between w-full g-10">
            <button onclick="DeleteProduct('{{ url('admins/product/delete?id='.$data->id.'') }}')" class="btn-red h-50 c-white">Delete Product</button>
            <button onclick="window.location.href='{{ url()->to('admins/products/edit?id='.$data->id.'') }}'" class="btn-green h-50 c-white">Edit Product</button>
        </div>
        </div>
            @endforeach
        @endif
        @include('components.sections',[
            'paginate' => 'true',
            'current' => $products->currentPage(),
            'last' => $products->lastPage()
        ])
    </section>
   
@endsection
@section('popup_child')
    <div class="column align-center text-center g-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#ff0505" viewBox="0 0 256 256"><path d="M200,56V208a8,8,0,0,1-8,8H64a8,8,0,0,1-8-8V56Z" opacity="0.2"></path><path d="M216,48H176V40a24,24,0,0,0-24-24H104A24,24,0,0,0,80,40v8H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM96,40a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96Zm96,168H64V64H192ZM112,104v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Zm48,0v64a8,8,0,0,1-16,0V104a8,8,0,0,1,16,0Z"></path></svg>
    <span>Are you sure you want to delete this product?this action cannot be undone.</span>
    <button class="btn-red delete-btn w-full">Yes Delete Product</button>
    </div>
@endsection
@section('js')
    <script>
        
        function DeleteProduct(url){
           try{
            PopUp();
             document.querySelector('.delete-btn').onclick=function(){
                window.location.href=url;
                
            }
           }catch(error){
            alert(error.stack)
           }
        }
    </script>
@endsection