@extends('layout.admins.app')
@section('title')
    Users
@endsection
@section('main')
 <section class="column p-10 w-full no-select g-10">
        <div class="card">
           <div class="row space-between align-center">
             <div class="column">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path></svg>
                         <span>Total Users</span>
            </div>
            <strong class="desc">{{ number_format($total) }}</strong>
           </div>
        </div>
        
         <div class="card">
           <div class="row space-between align-center">
             <div class="column">
               <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M117.25,157.92a60,60,0,1,0-66.5,0A95.83,95.83,0,0,0,3.53,195.63a8,8,0,1,0,13.4,8.74,80,80,0,0,1,134.14,0,8,8,0,0,0,13.4-8.74A95.83,95.83,0,0,0,117.25,157.92ZM40,108a44,44,0,1,1,44,44A44.05,44.05,0,0,1,40,108Zm210.14,98.7a8,8,0,0,1-11.07-2.33A79.83,79.83,0,0,0,172,168a8,8,0,0,1,0-16,44,44,0,1,0-16.34-84.87,8,8,0,1,1-5.94-14.85,60,60,0,0,1,55.53,105.64,95.83,95.83,0,0,1,47.22,37.71A8,8,0,0,1,250.14,206.7Z"></path></svg>
                      <span>Active Users</span>
            </div>
            <strong class="desc">{{ number_format($active) }}</strong>
           </div>
        </div>
         <div class="card">
           <div class="row space-between align-center">
             <div class="column">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-64-56a16,16,0,1,1-16-16A16,16,0,0,1,144,152Z"></path></svg>
                    <span>Todays SignUps</span>
            </div>
            <strong class="desc">{{ number_format($today) }}</strong>
           </div>
        </div>
        <div class="cont required">
            <div class="h-full perfect-square column align-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#4caf50" viewBox="0 0 256 256"><path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path></svg>
            </div>
            <input oninput="SearchRequest(this,'{{ url()->to('admins/search/users/'.$status.'?search=true') }}')" type="search" placeholder="Search by username,Email or Full Name" class="inp input">
            <div class="search-result">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                    <span class="right-auto">Techie5961</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
                </a>
                
            </div>
        </div>
    </section>
    <section class="w-full p-10 g-10 column pc-grid pc-grid-2">
        @if ($users->isEmpty())
            @include('components.sections',[
                'null' => 'No Users Found'
            ])
        @else
            @foreach ($users as $data)
                <div class="column p-10 bg-light w-full br-10 g-10">
                    <div class="row w-full g-10 space-between">
                        <div class="photo" style="background-image:url('{{ asset('images/users/'.$data->photo.'') }}')"></div>
                    <div class="column m-right-auto">
                       <div class="row g-5 align-center"><b>{{ ucfirst($data->username) }}</b>@if ($data->type === 'promoter')
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffd700" viewBox="0 0 256 256"><path d="M248,80a28,28,0,1,0-51.12,15.77l-26.79,33L146,73.4a28,28,0,1,0-36.06,0L85.91,128.74l-26.79-33a28,28,0,1,0-26.6,12L47,194.63A16,16,0,0,0,62.78,208H193.22A16,16,0,0,0,209,194.63l14.47-86.85A28,28,0,0,0,248,80ZM128,40a12,12,0,1,1-12,12A12,12,0,0,1,128,40ZM24,80A12,12,0,1,1,36,92,12,12,0,0,1,24,80ZM220,92a12,12,0,1,1,12-12A12,12,0,0,1,220,92Z"></path></svg>
                      @endif</div> 
                        <span class="text-small text-dim row align-center break-word"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>Registered {{ $data->frame }}</span>
                    <span class="text-small break-word text-dim row align-center break-word"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M224,48H32a8,8,0,0,0-8,8V192a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A8,8,0,0,0,224,48Zm-8,144H40V74.19l82.59,75.71a8,8,0,0,0,10.82,0L216,74.19V192Z"></path></svg>{{ $data->email }}</span>
                    </div>
                   <div class="status {{ $data->status == 'active' ? 'green' : ($data->status == 'banned' ? 'gold' : 'red') }}">{{ $data->status }}</div>
                    </div>
                    <hr>
                    <div class="grid grid-2 no-select g-10 w-full">
                        <div class="bg p-10 w-full align-center br-10 column align-center">
                            <b class="c-primary">Deposit Balance</b>
                            <b class="font-1">&#8358;{{ number_format($data->deposit,2) }}</b>
                        </div>
                         <div class="bg p-10 w-full align-center text-center br-10 column align-center">
                            <b class="c-primary">Withdraw Balance</b>
                            <b class="font-1">&#8358;{{ number_format($data->withdrawal,2) }}</b>
                        </div>
                         <div class="bg p-10 w-full align-center br-10 column align-center">
                            <b class="c-primary">Total Deposit</b>
                            <b class="font-1">&#8358;{{ number_format($data->total_deposit,2) }}</b>
                        </div>
                         <div class="bg p-10 w-full align-center text-center br-10 column align-center">
                            <b class="c-primary">Total Withdrawn</b>
                            <b class="font-1">&#8358;{{ number_format($data->total_withdrawn,2) }}</b>
                        </div>
                    </div>
                    <div class="column bg br-10 w-full p-10">
                        <div class="row w-full g-10">
                        <strong class="c-primary">Referred By:</strong>
                        <b>{{ ucfirst($data->ref) ?? '' }}</b>
                    </div>
                       <div class="row w-full g-10">
                        <strong class="c-primary">Total Referred:</strong>
                        <b>{{ number_format($data->total_ref) ?? '' }}</b>
                    </div>
                    <div class="row w-full g-10">
                        <strong class="c-primary">Total Purchase:</strong>
                        <b>{{ number_format($data->total_purchase) ?? '' }}</b>
                    </div>
                      <div class="row w-full g-10">
                        <strong class="c-primary">Total Purchase Amount:</strong>
                        <b>&#8358;{{ number_format($data->total_purchase_amount,2) ?? '' }}</b>
                    </div>
                   
                    </div>
                     <a href="{{ url('admins/user?id='.$data->id.'') }}" class="c-gold m-left-auto">View More....</a>
                </div>
            @endforeach
        @endif
        @include('components.sections',[
            'paginate' => true,
            'current' => $users->currentPage(),
            'last' => $users->lastPage()
        ])
    </section>
@endsection