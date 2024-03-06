<?php

namespace App\Filament\Resources\DeviceResource\Pages;

use App\Filament\Resources\DeviceResource;
use Exception;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Request;

use Symfony\Contracts\Service\Attribute\Required;

class Scan extends Page
{
    protected static string $resource = DeviceResource::class;
    public $reloadpage;
    public $image;


    public function mount()
    {
        $id = auth('web')->user()->id;
        $device = DB::table('devices')->select('name', 'status')->where('user_id', $id)->first();
        // cek device ready?
        $find = Http::get('http://173.249.40.211:3000/sessions/' . $device->name . '/status');

        $cek = json_decode($find->getBody());

            try {
                if ($cek->status == "AUTHENTICATED") {

                    $image = asset('image/connect.png');
                    DB::table('devices')->where('user_id', $id)->update(['status' => "AUTHENTICATED", 'updated_at' => now()]);
                    // return redirect()->back()->with('success', 'Session found.');
                    $reloadpage = "";
                    $this->image = $image ;

                }
              } catch (Exception $e) {
                $d =  DB::table('devices')->where('user_id', $id)->update(['status' => "disconnect", 'updated_at' => now()]);
                $response = Http::post(env('URL_WA_SERVER') . '/sessions/add', ['sessionId' => $device->name]);
                $res = json_decode($response->getBody());
                try{
                     $this->image = $res->qr ;
                }catch(Exception $e){
                    if($res->error == "Session already exists"){
                        //delete session if already exist
                        $hapus = Http::delete(env('URL_WA_SERVER').'/sessions/'.$device->name);
                        $res = json_decode($hapus->getBody());

                        $newsessionID = $device->name . rand(10,100);
                        sleep(1);
                        // request qr ulang
                        $response = Http::post(env('URL_WA_SERVER').'/sessions/add', ['sessionId' => $newsessionID]);
                        $res = json_decode($response->getBody());
                        // update db device name
                        DB::table('devices')->where('user_id', $id)->update(['name' => $device->name]);
                        // dd($res);
                        $this->image = $res->qr ;

                    }

                }

                $reloadpage = 'setTimeout(function(){window.location.reload(1);}, 20000);';
                $this->reloadpage = $reloadpage;
              }


        $data = [];
    }
    protected static string $view = 'filament.resources.device-resource.pages.scan';
}
