@isset($required)
    <div class="prompt"><i>This field is required</i></div>
@endisset
@isset($RenderTrxPopup)
    @if ($trx->type == 'deposit')
             @if ($action == 'approve')
             <div class="svg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M243.28,68.24l-24-23.56a16,16,0,0,0-22.59,0L104,136.23l-36.69-35.6a16,16,0,0,0-22.58.05l-24,24a16,16,0,0,0,0,22.61l71.62,72a16,16,0,0,0,22.63,0L243.33,90.91A16,16,0,0,0,243.28,68.24ZM103.62,208,32,136l24-24a.6.6,0,0,1,.08.08l42.35,41.09a8,8,0,0,0,11.19,0L208.06,56,232,79.6Z"></path></svg>
                </div>
                <span class="text-center">
                    Are you sure you want to approve this deposit? <b class="c-green">{{$trx->user->username }}</b> would get credited &#8358;{{ number_format($trx->amount,2) }} into his/her deposit wallet,this action cannot be undone.
                </span>
                <button onclick="GetRequest(event,'{{ url()->to('admins/get/action/transactions?type='.$trx->type.'&action=approve&id='.$trx->id.'') }}',this,MyFunc.Actioned)" class="btn-green w-full br-1000 clip-1000">Approve Deposit</button>
                @else
                 <div class="svg-red">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                    </div>
                <span class="text-center">
                    Are you sure you want to reject this deposit,this action cannot be undone.
                </span>
                <button onclick="GetRequest(event,'{{ url()->to('admins/get/action/transactions?type='.$trx->type.'&action=reject&id='.$trx->id.'') }}',this,MyFunc.Actioned)" class="btn-red w-full br-1000 clip-1000">Reject Deposit</button>
           
                @endif
    @else
          @if ($action == 'approve')
             <div class="svg-green">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M243.28,68.24l-24-23.56a16,16,0,0,0-22.59,0L104,136.23l-36.69-35.6a16,16,0,0,0-22.58.05l-24,24a16,16,0,0,0,0,22.61l71.62,72a16,16,0,0,0,22.63,0L243.33,90.91A16,16,0,0,0,243.28,68.24ZM103.62,208,32,136l24-24a.6.6,0,0,1,.08.08l42.35,41.09a8,8,0,0,0,11.19,0L208.06,56,232,79.6Z"></path></svg>
                </div>
                <span class="text-center">
                  
                    Are you sure you want to approve this withdrawal? ,this action cannot be undone.
                </span>
                <button onclick="GetRequest(event,'{{ url()->to('admins/get/action/transactions?type='.$trx->type.'&action=approve&id='.$trx->id.'') }}',this,MyFunc.Actioned)" class="btn-green w-full br-1000 clip-1000">Approve Withdrawal</button>
                @else
                 <div class="svg-red">
                  <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M205.66,194.34a8,8,0,0,1-11.32,11.32L128,139.31,61.66,205.66a8,8,0,0,1-11.32-11.32L116.69,128,50.34,61.66A8,8,0,0,1,61.66,50.34L128,116.69l66.34-66.35a8,8,0,0,1,11.32,11.32L139.31,128Z"></path></svg>
                    </div>
                <span class="text-center">
                    Are you sure you want to reject this withdrawal? <b class="c-green">{{$trx->user->username }}</b> would get refunded back &#8358;{{ number_format($trx->amount,2) }} into his/her withdrawal wallet,this action cannot be undone.
                </span>
                <button onclick="GetRequest(event,'{{ url()->to('admins/get/action/transactions?type='.$trx->type.'&action=reject&id='.$trx->id.'') }}',this,MyFunc.Actioned)" class="btn-red w-full br-1000 clip-1000">Reject Withdrawal</button>
           
                @endif
    @endif
@endisset
@isset($null)
     <section class="grid-full column g-10 align-center m-y-auto m-x-auto">
             <svg height="200" width="200" viewBox="0 0 1024 1024" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M696.2 411.6C498.7 368.3 660.6 94.4 390 117.1s-527.2 645.8-46.8 791.7 727.9-414.9 353-497.2z" fill="#464BD8"></path><path d="M391.4 235.6l-98.6 501.9V235.6zM407 235.6L303.8 761l-11-2.2v-21.3l98.6-501.9z" fill="#2E2E42"></path><path d="M421.1 235.6l1.4 0.3L318.8 764l-15-3L407 235.6z" fill="#2D2D41"></path><path d="M318.831263 764.004291l103.752737-528.002821 15.012903 2.95004L333.844166 766.954332z" fill="#2D2D40"></path><path d="M333.78964 766.951693l103.752737-528.002821L452.55528 241.898912 348.802543 769.901734z" fill="#2C2C3F"></path><path d="M348.846315 769.916588l103.752736-528.002821L467.611954 244.863807 363.859218 772.866629z" fill="#2B2B3E"></path><path d="M363.805673 772.863183l103.752736-528.002821 15.012903 2.95004L378.818576 775.813224z" fill="#2A2A3D"></path><path d="M378.862174 775.829867l103.752736-528.002822 15.012903 2.950041L393.875077 778.779907z" fill="#2A2A3C"></path><path d="M393.820725 778.77548l103.752736-528.002821 15.012903 2.95004L408.833628 781.725521z" fill="#29293B"></path><path d="M408.780083 781.722075l103.752736-528.002822 15.012903 2.950041L423.792986 784.672116z" fill="#28283A"></path><path d="M423.855057 784.589654l103.752737-528.002822 15.012903 2.950041L438.86796 787.539694z" fill="#282839"></path><path d="M438.814416 787.536248l103.752736-528.002821 15.012903 2.95004L453.827319 790.486289z" fill="#272738"></path><path d="M453.871897 790.502125l103.752737-528.002822 15.012903 2.950041L468.8848 793.452165z" fill="#262637"></path><path d="M468.828486 793.449353l103.752736-528.002822 15.012903 2.950041L483.841389 796.399393z" fill="#252536"></path><path d="M483.885968 796.415229l103.752736-528.002822 15.012903 2.950041L498.898871 799.365269z" fill="#252534"></path><path d="M498.844519 799.360842l103.752736-528.002821 15.012903 2.95004L513.857422 802.310883z" fill="#242433"></path><path d="M513.902 802.326719l103.752737-528.002822 15.012903 2.950041L528.914903 805.276759z" fill="#232332"></path><path d="M528.860377 805.274121l103.752737-528.002822 15.012903 2.950041L543.87328 808.224161z" fill="#222231"></path><path d="M543.917052 808.239016l103.752736-528.002822 15.012903 2.950041L558.929955 811.189056z" fill="#222230"></path><path d="M558.875429 811.186418l103.752736-528.002822 15.012903 2.950041L573.888332 814.136458z" fill="#21212F"></path><path d="M573.932911 814.152294l103.752736-528.002822 15.012903 2.950041L588.945814 817.102334z" fill="#20202E"></path><path d="M588.891462 817.097907l103.752736-528.002821 15.012903 2.95004L603.904365 820.047948z" fill="#20202D"></path><path d="M603.947962 820.064591l103.752736-528.002822 15.012903 2.950041L618.960865 823.014631z" fill="#1F1F2C"></path><path d="M618.90732 823.011186l103.752737-528.002822L737.67296 297.958405 633.920223 825.961226z" fill="#1E1E2B"></path><path d="M633.964802 825.977062l103.752736-528.002822L752.730441 300.924281 648.977705 828.927102z" fill="#1D1D2A"></path><path d="M752.7 300.8l15 2.9-103.2 525.4h-14.1l-1.5-0.3z" fill="#1D1D29"></path><path d="M767.7 303.7l11 2.2v21.3l-98.6 501.9h-15.6zM680.1 829.1l98.6-501.9v501.9z" fill="#1C1C28"></path><path d="M646 807.5c-1.6 0-3.2-0.2-4.8-0.5l-307-60.3c-6.4-1.3-12-4.9-15.6-10.4-3.6-5.4-5-12-3.7-18.4l86.6-441c2.3-11.5 12.3-19.8 24-19.8 1.6 0 3.2 0.2 4.8 0.5l307 60.3c13.3 2.6 21.9 15.5 19.3 28.7l-86.6 441c-2.3 11.6-12.4 19.9-24 19.9z" fill="#FFFFFF"></path><path d="M646 807.5c-1.6 0-3.2-0.2-4.8-0.5l-307-60.3c-6.4-1.3-12-4.9-15.6-10.4-3.6-5.4-5-12-3.7-18.4l86.6-441c2.3-11.5 12.3-19.8 24-19.8 1.6 0 3.2 0.2 4.8 0.5l307 60.3c13.3 2.6 21.9 15.5 19.3 28.7l-86.6 441c-2.3 11.6-12.4 19.9-24 19.9z" fill="#FFFFFF"></path><path d="M640.2 793.7c-1.4 0-2.8-0.1-4.2-0.4l-269.8-53c-5.6-1.1-10.5-4.3-13.7-9.1-3.2-4.8-4.4-10.5-3.2-16.2l76.1-387.5c2-10.1 10.8-17.4 21.1-17.4 1.4 0 2.8 0.1 4.2 0.4l269.8 53c11.6 2.3 19.3 13.6 17 25.3l-76.1 387.5c-2.1 10.1-10.9 17.4-21.2 17.4z" fill="#2AEFC8"></path><path d="M674.4 274.5c1.4-2.7 2.6-5.6 3.2-8.8 3.6-17.8-8.1-35.1-25.9-38.6l-90.4-17.8c-17.8-3.5-35.1 8.1-38.6 25.9-0.6 3.1-0.6 6.1-0.4 9.1-24.4-3-45.2 4.5-48.4 21.2l234.2 47.6c3.2-16-11.6-31.6-33.7-38.6z" fill="#514DDF"></path><path d="M708.1 322.1c-0.6 0-1.2-0.1-1.8-0.2l-234.1-47.6c-4.8-1-7.9-5.7-7-10.5 3.6-18.6 22.6-30 48.6-29.1 0.1-0.4 0.1-0.8 0.2-1.3 4.4-22.6 26.5-37.4 49.1-33l90.4 17.8c11 2.2 20.5 8.5 26.7 17.8 6.2 9.3 8.4 20.4 6.2 31.3-0.1 0.6-0.3 1.2-0.4 1.9 21.9 9.9 34.4 27.8 30.9 45.6-0.5 2.3-1.8 4.4-3.8 5.7-1.5 1.1-3.3 1.6-5 1.6z m-220.4-62.8L697.9 302c-3.7-7.7-13.3-14.9-26.2-19-2.5-0.8-4.5-2.7-5.6-5.1-1-2.4-0.9-5.2 0.3-7.5 1.2-2.4 2-4.4 2.4-6.3 1.3-6.3 0-12.6-3.6-17.9-3.6-5.3-9-9-15.3-10.2l-90.4-17.8c-13-2.5-25.5 5.9-28.1 18.9-0.4 1.9-0.4 4-0.2 6.6 0.2 2.7-0.8 5.3-2.7 7.2-1.9 1.9-4.6 2.7-7.3 2.4-14.5-1.9-26.8 0.5-33.5 6z" fill="#29293A"></path><path d="M602 269.5c-8.3-1.6-13.6-9.6-12-17.9 1.6-8.3 9.6-13.6 17.9-12 8.3 1.6 13.6 9.6 12 17.9-1.7 8.3-9.7 13.6-17.9 12z" fill="#FFFFFF"></path><path d="M550.515 420.205l150.843 31.03-2.62 12.734-150.843-31.03zM428.579 445.695l262.8 54.062-2.62 12.734-262.8-54.063zM418.577 494.19l262.8 54.063-2.62 12.734-262.8-54.063zM408.596 542.589l262.8 54.062-2.62 12.734-262.8-54.063zM398.595 591.085l262.8 54.062-2.62 12.734-262.8-54.063zM388.009 642.725l188.651 38.81-2.62 12.733-188.65-38.81z" fill="#514DDF"></path></g></svg>
                <strong class="desc text-center">{!! $null !!}</strong>
          </section>
@endisset
@isset($paginate)
      <setion {!! $last <= 1 ? 'style="display:none"' : '' !!} class="paginate">
    <a class="{{ $current <= 1 ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current-1 ])) }}">&laquo;</a>
    <a>{{ $current }}</a>
    <a class="{{ $current >= $last ? 'disabled' : '' }}" href="{{ url()->current().'?'.http_build_query(array_merge(request()->query(),[ 'page' => $current + 1 ])) }}">&raquo;</a>
       </setion>
@endisset
@isset($search_trx)
    @if ($trx->isEmpty())
          <a>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path></svg>
                    <span class="right-auto">No transactions found</span>
                            </a>
    @else
         @foreach ($trx as $data)
              <a href="{{ ($data->url ?? '' ) == '' ? url()->to('admins/transactions?user_id='.$data->user_id.'') : $data->url }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                    <span class="right-auto">{{ $data->username }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
                </a>
         @endforeach
    @endif
@endisset
@isset($purchase_product)
    <div class="bg-light w-full no-select br-10 p-10 g-10 column">
        <strong class="desc">Confirm Purchase</strong>
        <div class="row space-between">
            <span class="text-light text-dim">Product Name:</span>
            <b class="">{{ $product->name }}</b>
        </div>
         <div class="row space-between">
            <span class="text-light text-dim">Daily Earnings:</span>
            <b class="">&#8358;{{ number_format($product->return,2) }}</b>
        </div>
         <div class="row space-between">
            <span class="text-light text-dim">Total Earnings:</span>
            <b class="">&#8358;{{ number_format($product->return*$product->validity,2) }}</b>
        </div>
         <div class="row space-between">
            <span class="text-light text-dim">Expires After:</span>
            <b class="">{{ number_format($product->validity) }} Days</b>
        </div>
         <div class="row space-between">
            <span class="text-light text-dim">Product Price:</span>
            <b class="">&#8358;{{ number_format($product->price,2) }}</b>
        </div>
        <hr>
         <div class="row space-between">
            <span class="text-light text-dim">SubTotal:</span>
            <b class=" desc">&#8358;{{ number_format($product->price,2) }}</b>
        </div>
        <div class="row space-between">
            <button onclick="GetRequest(event,'{{ url('users/get/purchase/product/confirm?id='.$product->id.'') }}',this,MyFunc.Confirmed)" class="btn-green-3d c-white clip-5 br-5 m-left-auto w-fit h-fit p-10">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm45.66,85.66-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35a8,8,0,0,1,11.32,11.32Z"></path></svg>Confirm Purchase</button>
        </div>
    </div>
@endisset
@isset($search_users)
    @if ($users->isEmpty())
          <a>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path></svg>
                    <span class="right-auto">No user found</span>
                            </a>
    @else
         @foreach ($users as $data)
              <a href="{{ ($data->url ?? '' ) == '' ? url()->to('admins/transactions?user_id='.$data->user_id.'') : $data->url }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                    <span class="right-auto">{{ $data->username }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
                </a>
         @endforeach
    @endif
@endisset
@isset($search_promoters)
    @if ($promoters->isEmpty())
          <a>
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path></svg>
                    <span class="right-auto">No Promoter found</span>
                            </a>
    @else
         @foreach ($promoters as $data)
              <a href="{{ ($data->url ?? '' ) == '' ? url()->to('admins/transactions?user_id='.$data->user_id.'') : $data->url }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path></svg>
                    <span class="right-auto">{{ $data->username }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="CurrentColor" viewBox="0 0 256 256"><path d="M200,64V168a8,8,0,0,1-16,0V83.31L69.66,197.66a8,8,0,0,1-11.32-11.32L172.69,72H88a8,8,0,0,1,0-16H192A8,8,0,0,1,200,64Z"></path></svg>
                </a>
         @endforeach
    @endif
@endisset