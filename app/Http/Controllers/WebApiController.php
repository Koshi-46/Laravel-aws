<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Sqs\SqsClient;
use App\Jobs\sqs;

class WebApiController extends Controller
{
    //
    public function sendSqs()
    {
        // laravelで設定している認証情報でクライアントを作成
        $sqs = app()->make('aws')->createClient('sqs');

        // SQSのメッセージに渡したい文字列を用意する
        $value = "test";

        $queueUrl = "https://sqs.ap-northeast-1.amazonaws.com/{AccountID}/{QueueName}"; #状況に応じて変更

        // SDKのAPIで渡すためのパラメータを用意
        $params = [
            'DelaySeconds' => 0,
            'MessageBody' => $value,
            'QueueUrl' => $queueUrl,
        ];

        $sqs->sendMessage($params);
        
        return view('welcome');
        
    }
    
    public function job(Request $request)
    {
        sqs::dispatch($request);
        
        return view('upload');
    }
}
