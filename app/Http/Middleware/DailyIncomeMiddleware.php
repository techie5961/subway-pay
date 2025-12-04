<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DailyIncomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      $purchased=DB::table('purchased')->where('status','active')->where('updated','<=',Carbon::now()->subDay());
        foreach($purchased->get() as $data){
            $diff=Carbon::parse($data->date)->diffInDays();
            $data->json=json_decode($data->json);
            DB::table('users')->where('id',$data->user_id)->update([
                'withdrawal' => DB::raw('withdrawal + '.$data->json->return.'')
            ]);
            DB::table('transactions')->insert([
            'uniqid' => strtoupper(uniqid('TRX')),
            'user_id' => $data->user_id,
            'type' => 'Daily Income',
            'class' => 'credit',
            'amount' => $data->json->return,
            'status' => 'success',
            'updated' => Carbon::now(),
            'date' => Carbon::now(),
            'json' => json_encode([
                $data->json
            ])
             ]);
             DB::table('purchased')->where('id',$data->id)->update([
                'updated' => Carbon::now()
             ]);
             if($diff >= $data->json->validity){
                DB::table('purchased')->where('id',$data->id)->update([
                'status' => 'expired'
             ]);
             }
            
        }
        return $next($request);
    }
}
