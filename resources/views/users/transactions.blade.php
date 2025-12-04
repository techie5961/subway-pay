@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('css')
    <style class="css">
        body,main{
            overflow:hidden;
            
        }
    
    </style>
@endsection
@section('main')
    <section class="overflow-m-y-auto column w-full bg">
    <strong style="margin-bottom:10px;">Transaction History</strong>
     <section class="body w-full align-center overflow-m-y-auto column flex-auto pos-stick">
          <section class="w-full infinite-section overflow-m-y-auto max-500 column g-10 br-10">
        @if ($trx->isEmpty())
            @include('components.sections',[
                'null' => 'No Transactions Found'
            ])
        @else
            @foreach ($trx as $data)
                 <div class="row w-full bg-light br-5 p-10 align-center p-y-10 space-between g-5">
            @if ($data->class == 'credit')
                <div class="svg credit">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M200.49,72.48,93,180h75a12,12,0,0,1,0,24H64a12,12,0,0,1-12-12V88a12,12,0,0,1,24,0v75L183.51,55.51a12,12,0,0,1,17,17Z"></path></svg>
            </div>
            @else
                <div class="svg debit">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M204,64V168a12,12,0,0,1-24,0V93L72.49,200.49a12,12,0,0,1-17-17L163,76H88a12,12,0,0,1,0-24H192A12,12,0,0,1,204,64Z"></path></svg>
            </div>
            @endif
            <div class="column g-5 m-right-auto">
                <b>{{ ucfirst($data->type) }}</b>
                <span class="text-dim text-small">{{ $data->frame }}</span>
            </div>
            <div class="column">
            <strong>&#8358;{{ number_format($data->amount,2) }}</strong>
            <div class="status {{ $data->status == 'pending' ? 'gold' : ($data->status == 'rejected' ? 'red' : 'green') }} m-left-auto">{{ $data->status }}</div>
            </div>
        </div>
            @endforeach
                  @endif
         
       </section>
     </section>
    </section>
@endsection
