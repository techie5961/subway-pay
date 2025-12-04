@extends('layout.admins.app')
@section('title')
    System Logs
@endsection
@section('main')
    <section class="section1 column pc-grid pc-grid-2 g-10 p-10">
        @if ($logs->isEmpty())
            @include('components.sections',[
                'null' => 'No Logs to Show'
            ])
        @else
            <strong class="desc c-primary grid-full">System Logs</strong>
            @foreach ($logs as $data)
               <div class="column p-10 bg-light w-full br-10 g-10">
                    <div class="row w-full g-10 space-between">
                        <div style="background-image:url('{{ asset('images/users/'.$data->user->photo.'') }}')" class="photo"></div>
                         <div class="column m-right-auto">
                    <b><a href="{{ url('admins/user?id='.$data->user_id.'') }}" class="c-gold">{{ ucfirst($data->user->username) }}</a></b>
                   <div class="row align-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="#708090" viewBox="0 0 256 256"><path d="M128,40a96,96,0,1,0,96,96A96.11,96.11,0,0,0,128,40Zm0,176a80,80,0,1,1,80-80A80.09,80.09,0,0,1,128,216ZM173.66,90.34a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32-11.32l40-40A8,8,0,0,1,173.66,90.34ZM96,16a8,8,0,0,1,8-8h48a8,8,0,0,1,0,16H104A8,8,0,0,1,96,16Z"></path></svg>
<span class="text-dim text-small">Logged {{ $data->frame }}</span>
                   </div>
                    
                </div>
                <div class="status green">success</div>
                    </div>
                    <hr>
                    <div class="row align-center g-5">
                        <strong class="font-1 c-primary">IP Address:</strong>
                        <b>{{ $data->ip }}</b>
                    </div>
                </div>
            @endforeach
        @endif
        @include('components.sections',[
            'paginate' => 'true',
            'current' => $logs->currentPage(),
            'last' => $logs->lastPage()
        ])
    </section>
@endsection