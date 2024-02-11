<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Massage;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class WhatsappController extends Controller
{
    public function index()
    {
        return Massage::all();
    }


    public function send_massages(Request $request)
    {
        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);
        // Get the assigned user
        $user_token = $token->tokenable;
$user = User::with('subscrip')->find($user_token->id);
if(is_null($user->subscrip )){
    return "انت غير مشترك ";
}else{

$startDate=$user->subscrip->start_at;
$endDate=$user->subscrip->end_at;
$dateToCheck = Carbon::now();
if ($dateToCheck->between($startDate, $endDate)) {

    $device = DB::table('devices')->select('id', 'name', 'status')->where('user_id', $user->id)->first();
    $response = Http::withHeaders([
        'Content-Type' => 'application/json'
    ])->post(
        env('URL_WA_SERVER') . '/' . $device->name . '/messages/send',
        [
            'jid' => $request->number . "@s.whatsapp.net",
            'type' => "number",
            'message' =>  ['text' => $request->body]
        ]
    );
    $res = json_decode($response->getBody());
    try{
        if($res->error == "Session not found"){

            return $res;
        }
    }catch(Exception $e){
            $massage = new Massage();
            $massage->massage = $request->body;
            $massage->device_id =  $device->id;
            $massage->status = "sended";
            $massage->type = 'text';
            $massage->save();
            return $res;



}


}



    }}
    public function send_massages1(Request $request)
    {
        $device = DB::table('devices')->select('id', 'name', 'status')->where('user_id', $request->id)->first();

        $user = User::find($request->id);
        if ($user->status === "test") {
            $massege = Massage::where('device_id', $device->id)->count();
            if ($massege > 5) {
                return "You must subscribe to one of the packages";
            }else{
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json'
                ])->post(
                    env('URL_WA_SERVER') . '/' . $device->name . '/messages/send',
                    [
                        'jid' => $request->number . "@s.whatsapp.net",
                        'type' => "number",
                        'message' =>  ['text' => $request->body]
                    ]
                );
                $res = json_decode($response->getBody());


                $massage = new Massage();

                $massage->massage = $request->body;
                $massage->device_id =  $device->id;
                $massage->status = "Sended";
                $massage->type = 'test';
                $massage->save();
                return $res;
            }
        }else{
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post(
                env('URL_WA_SERVER') . '/' . $device->name . '/messages/send',
                [
                    'jid' => $request->number . "@s.whatsapp.net",
                    'type' => "number",
                    'message' =>  ['text' => $request->body]
                ]
            );
            $res = json_decode($response->getBody());


            $massage = new Massage();

            $massage->massage = $request->body;
            $massage->device_id =  $device->id;
            $massage->status = "Sended";
            $massage->type = 'text';
            $massage->save();
            return $res;
        }


    }
}
