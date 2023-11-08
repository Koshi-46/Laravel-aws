<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class SendSms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:sms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SMS送信のテスト';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $sns = App::make('aws')->createClient('sns');

        $sns->publish([
            'Message' => 'テスト',
            'PhoneNumber' => '+818000000000' // 電話番号を入れる
        ]);
    }
}
