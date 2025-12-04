@extends('layout.admins.app')
@section('title')
    Purchased Products
@endsection
@section('main')
    <section class="section1 column pc-grid pc-grid-2 g-10 p-10">
    @if ($purchased->isEmpty())
        @include('components.sections',[
            'null' => 'No Products Purchased yet'
        ])
    @else
        <strong class="desc grid-full c-primary">Purchased Products</strong>
       @foreach ($purchased as $data)
           <div class="card">
            <div class="row g-10 space-between">
                <div class="photo" style="background-image: url('{{ asset('images/users/'.$data->user->photo.'') }}')"></div>
                <div class="column m-right-auto">
                    <b class="font-1"><a class="c" href="{{ url('admins/user?id='.$data->user_id.'') }}">{{ $data->user->username }}</a></b>
                    <div class="row align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
                    <span class="text-dim text-small">Purchased {{ $data->frame }}</span>
                    </div>
                </div>
                <div class="status {{ $data->status == 'active' ? 'green' : 'gold' }}">{{ $data->status }}</div>
            </div>
            <hr>
            <div class="row w-full space-between g-5">
               <div class="column">
                <b class="c-primary m-right-auto text-start">{{ $data->json->name }}</b>
                <span class="text-light m-right-auto">Product Name</span>
               </div>
               <div class="column">
                <b class="c-primary m-left-auto text-end">&#8358;{{ number_format($data->json->price,2) }}</b>
                <span class="text-light text-end m-left-auto">Purchased for</span>
               </div>
            </div>
             <div class="row w-full space-between g-5">
               <div class="column">
                <b class="c-primary m-right-auto text-start">&#8358;{{ number_format($data->json->return,2) }}</b>
                <span class="text-light m-right-auto">Daily Income</span>
               </div>
               <div class="column">
                <b class="c-primary m-left-auto text-end">&#8358;{{ number_format($data->json->return*$data->json->validity,2) }}</b>
                <span class="text-light text-end m-left-auto">Total Income</span>
               </div>
            </div>
            <div class="row w-full space-between g-5">
               <div class="column">
                <b class="c-primary m-right-auto text-start">{{ $data->status == 'active' ? $data->next_income : 'Expired' }}</b>
                <span class="text-light m-right-auto">Next Income</span>
               </div>
               <div class="column">
                <b class="c-primary m-left-auto text-end">{{ $data->expires }}</b>
                <span class="text-light text-end m-left-auto">{{ $data->status == 'expired' ? 'Expired on' : 'Expires' }}</span>
               </div>
            </div>
           @if ($data->status !== 'expired')
           <hr class="gradient">
               @if ($data->status == 'active')
                    
            <button onclick="AlterProduct('suspend','{{ url('admins/product/alter?status='.$data->status.'&id='.$data->id.'') }}')" class="btn-gold m-left-auto">Suspend</button>
               @else
                  <button onclick="AlterProduct('active','{{ url('admins/product/alter?status='.$data->status.'&id='.$data->id.'') }}')" class="btn-green m-left-auto">Re-Enable</button>
              
               @endif
           @endif
           </div>
       @endforeach 
    @endif    
     @include('components.sections',[
        'paginate' => 'true',
        'current' => $purchased->currentPage(),
        'last' => $purchased->lastPage()
    ])    
    </section>
   
@endsection
@section('js')
    <script>
        let prompt='';
        function AlterProduct(action,url){
            if(action == 'suspend'){
            prompt=` <div class="column align-center text-center g-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>
    <span>Are you sure you want to suspend this product?the user would not be able to earn from this product until you re-enable it.</span>
    <button onclick="window.location.href='${url}'" class="btn-gold delete-btn w-full">Yes, Suspend Product</button>
    </div>`;
            }else{
prompt=` <div class="column align-center text-center g-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80V192a16,16,0,0,0,16,16H224a16,16,0,0,0,16-16V80A16,16,0,0,0,224,64ZM96,56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8v8H96ZM224,80v32H192v-8a8,8,0,0,0-16,0v8H80v-8a8,8,0,0,0-16,0v8H32V80Zm0,112H32V128H64v8a8,8,0,0,0,16,0v-8h96v8a8,8,0,0,0,16,0v-8h32v64Z"></path></svg>
    <span>Are you sure you want to re-enable this product?the user would continue to earn from this product.</span>
    <button onclick="window.location.href='${url}'" class="btn-green delete-btn w-full">Yes, Re-Enable Product</button>
    </div>`;
            }
            PopUp(prompt);
        }
    </script>
@endsection