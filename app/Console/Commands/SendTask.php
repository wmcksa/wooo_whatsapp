<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class SendTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mu:send-task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $protected = User::where('protected', 1)->get();
        $protect = User::where('protect', 1)->get();

        foreach ($protected as $u) {
            foreach ($protect as $pro) {
                $data[] = [
                    'jid' => $pro->phone . '@s.whatsapp.net',
                    'type' => 'number',
                    'delay' => 500,
                    'message' =>  ['text' => "aaa"]
                ];
            }
            $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])->post(
                env('URL_WA_SERVER') . '/' . $u->id . '/messages/send/bulk',
                $data
            );
        }



        // $res = json_decode($response->getBody());
        // dd($res);
    }
}
