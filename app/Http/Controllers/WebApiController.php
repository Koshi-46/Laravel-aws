<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\Sqs\SqsClient;
use App\Jobs\sqs;
use App;
use AWS;

class WebApiController extends Controller
{
    //
    public function sendSqs()
    {
        // laravelで設定している認証情報でクライアントを作成
        $sqs = app()->make('aws')->createClient('sqs');

        // SQSのメッセージに渡したい文字列を用意する
        $value = "test";

        $queueUrl = "https://sqs.ap-northeast-1.amazonaws.com/795600592301/simplehoiku-queue"; #状況に応じて変更

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
    

    public function send(Request $request){
        $original_encoding = mb_internal_encoding();
        $to = iconv_mime_encode(mb_convert_encoding($request->input('name'),"ISO-2022-JP",$original_encoding), 'ISO-2022-JP')." <".$request->input('email').">";
        
        $ses = AWS::createClient('ses');
        $ses->sendEmail([
            'Source' => '<送信元メールアドレス>',
            'Destination' => [
              'ToAddresses' => [
                $to,
              ],
            ],
            'Message' => [
              'Subject' => [
                'Charset' => 'UTF-8',
                'Data' => $request->input('subject'),
              ],
              'Body' => [
                'Text' => [
                  'Charset' => 'UTF-8',
                  'Data' => $request->input('comments'),
                ],
              ],
            ],
          ]);
        return view('upload');
    }
}
