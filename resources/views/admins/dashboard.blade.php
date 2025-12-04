@extends('layout.admins.app')
@section('title')
    Dashboard
@endsection
@section('main') 
    <section class="w-full pc-grid pc-grid-2 p-10 column no-select g-10">
        {{-- NEW CARD --}}
        <div onclick="window.location.href='{{ url('admins/users/all') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">{{ number_format($users) }}</strong>
                <span class="text-light">Total Users</span>
            
            </div>
            <div style="background:rgba(108,92,230,0.2);" class="p-10 h-fit w-fit br-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#6c5ce6" viewBox="0 0 256 256"><path d="M64.12,147.8a4,4,0,0,1-4,4.2H16a8,8,0,0,1-7.8-6.17,8.35,8.35,0,0,1,1.62-6.93A67.79,67.79,0,0,1,37,117.51a40,40,0,1,1,66.46-35.8,3.94,3.94,0,0,1-2.27,4.18A64.08,64.08,0,0,0,64,144C64,145.28,64,146.54,64.12,147.8Zm182-8.91A67.76,67.76,0,0,0,219,117.51a40,40,0,1,0-66.46-35.8,3.94,3.94,0,0,0,2.27,4.18A64.08,64.08,0,0,1,192,144c0,1.28,0,2.54-.12,3.8a4,4,0,0,0,4,4.2H240a8,8,0,0,0,7.8-6.17A8.33,8.33,0,0,0,246.17,138.89Zm-89,43.18a48,48,0,1,0-58.37,0A72.13,72.13,0,0,0,65.07,212,8,8,0,0,0,72,224H184a8,8,0,0,0,6.93-12A72.15,72.15,0,0,0,157.19,182.07Z"></path></svg>
            </div>
           </div>
        </div>

        {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/promoters') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">{{ number_format($promoters) }}</strong>
                <span class="text-light">Total Promoters</span>
           
            </div>
            <div style="background:rgba(0, 255, 255, 0.2);" class="p-10 h-fit w-fit br-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="aqua" viewBox="0 0 256 256"><path d="M152,160a24,24,0,1,1-24-24A24,24,0,0,1,152,160ZM208,40V216a16,16,0,0,1-16,16H64a16,16,0,0,1-16-16V40A16,16,0,0,1,64,24H192A16,16,0,0,1,208,40ZM116,68a12,12,0,1,0,12-12A12,12,0,0,0,116,68Zm52,92a40,40,0,1,0-40,40A40,40,0,0,0,168,160Z"></path></svg>
            </div>
           </div>
        </div>
        {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/deposits/pending') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">&#8358;{{ number_format($pending_deposits,2) }}</strong>
                <span class="text-light">Pending Deposits</span>
             
            </div>
            <div style="background:rgba(255, 217, 0, 0.2)" class="p-10 h-fit w-fit br-10">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffd700" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>
              </div>
           </div>
        </div>
        {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/withdrawals/pending') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">&#8358;{{ number_format($pending_withdrawals,2) }}</strong>
                <span class="text-light">Pending Withdrawals</span>
             
            </div>
            <div style="background:rgba(255, 217, 0, 0.2)" class="p-10 h-fit w-fit br-10">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#ffd700" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
               </div>
           </div>
        </div>
        {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/deposits/success') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">&#8358;{{ number_format($successfull_deposits,2) }}</strong>
                <span class="text-light">Successfull Deposits</span>
             
            </div>
            <div style="background:rgba(0,255, 0, 0.2)" class="p-10 h-fit w-fit br-10">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>
              </div>
           </div>
        </div>
         {{-- NEW CARD --}}
          <div  onclick="window.location.href='{{ url('admins/withdrawals/success') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">&#8358;{{ number_format($successfull_withdrawals,2) }}</strong>
                <span class="text-light">Successfull Withdrawals</span>
             
            </div>
            <div style="background:rgba(0,255, 0, 0.2)" class="p-10 h-fit w-fit br-10">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#4caf50" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
               </div>
           </div>
        </div>
         {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/deposits/rejected') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">&#8358;{{ number_format($rejected_deposits,2) }}</strong>
                <span class="text-light">Rejected Deposits</span>
             
            </div>
            <div style="background:rgba(255,0, 0, 0.2)" class="p-10 h-fit w-fit br-10">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="coral" viewBox="0 0 256 256"><path d="M232,198.65V240a8,8,0,0,1-16,0V198.65A74.84,74.84,0,0,0,192,144v58.35a8,8,0,0,1-14.69,4.38l-10.68-16.31c-.08-.12-.16-.25-.23-.38a12,12,0,0,0-20.89,11.83l22.13,33.79a8,8,0,0,1-13.39,8.76l-22.26-34-.24-.38c-.38-.66-.73-1.33-1.05-2H56a8,8,0,0,1-8-8V96A16,16,0,0,1,64,80h48v48a8,8,0,0,0,16,0V80h48a16,16,0,0,1,16,16v27.62A90.89,90.89,0,0,1,232,198.65ZM128,35.31l18.34,18.35a8,8,0,0,0,11.32-11.32l-32-32a8,8,0,0,0-11.32,0l-32,32A8,8,0,0,0,93.66,53.66L112,35.31V80h16Z"></path></svg>
              </div>
           </div>
        </div>
         {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/withdrawals/rejected') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">&#8358;{{ number_format($rejected_withdrawals,2) }}</strong>
                <span class="text-light">Rejected Withdrawals</span>
             
            </div>
            <div style="background:rgba(255,0, 0, 0.2)" class="p-10 h-fit w-fit br-10">
             <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="coral" viewBox="0 0 256 256"><path d="M128,56H112V16a8,8,0,0,1,16,0Zm64,67.62V72a16,16,0,0,0-16-16H128v60.69l18.34-18.35a8,8,0,0,1,11.32,11.32l-32,32a8,8,0,0,1-11.32,0l-32-32A8,8,0,0,1,93.66,98.34L112,116.69V56H64A16,16,0,0,0,48,72V200a8,8,0,0,0,8,8h74.7c.32.67.67,1.34,1.05,2l.24.38,22.26,34a8,8,0,0,0,13.39-8.76l-22.13-33.79A12,12,0,0,1,166.4,190c.07.13.15.26.23.38l10.68,16.31A8,8,0,0,0,192,202.31V144a74.84,74.84,0,0,1,24,54.69V240a8,8,0,0,0,16,0V198.65A90.89,90.89,0,0,0,192,123.62Z"></path></svg>
               </div>
           </div>
        </div>
         {{-- NEW CARD --}}
          <div onclick="window.location.href='{{ url('admins/products/manage') }}'" class="card">
           <div class="row w-full space-between">
            <div class="column g-5">
                <strong class="desc">{{ number_format($packages) }}</strong>
                <span class="text-light">Total Packages</span>
             
            </div>
            <div style="background:rgba(0,0,255, 0.2)" class="p-10 h-fit w-fit br-10">
           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="aqua" viewBox="0 0 256 256"><path d="M224,64H176V56a24,24,0,0,0-24-24H104A24,24,0,0,0,80,56v8H32A16,16,0,0,0,16,80v28a4,4,0,0,0,4,4H64V96.27A8.17,8.17,0,0,1,71.47,88,8,8,0,0,1,80,96v16h96V96.27A8.17,8.17,0,0,1,183.47,88,8,8,0,0,1,192,96v16h44a4,4,0,0,0,4-4V80A16,16,0,0,0,224,64Zm-64,0H96V56a8,8,0,0,1,8-8h48a8,8,0,0,1,8,8Zm80,68v60a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V132a4,4,0,0,1,4-4H64v16a8,8,0,0,0,8.53,8A8.17,8.17,0,0,0,80,143.73V128h96v16a8,8,0,0,0,8.53,8,8.17,8.17,0,0,0,7.47-8.25V128h44A4,4,0,0,1,240,132Z"></path></svg>
             </div>
           </div>
        </div>
    </section>
@endsection