<?php

namespace App\Libraries;

class Slack
{
    private const TODAY = 0;
    private const TOKYO = 130010;
    
    /**
     * slackにメッセージを送ったあと、成功したら ok を返す
     * @param string $message
     * @return string
     */
    public function sendMessage(string $message): string
    {
        $url = env('slack.url');
    
        $post_fields = [
            "channel" => urlencode(env('slack.channel')),
            "text" => $message,
        ];
        
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true, // 実行結果を文字列で返す
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS =>
                http_build_query(
                    ['payload' => json_encode($post_fields)]
                )
        ];
        $conn = curl_init();
        curl_setopt_array($conn, $options);
        $res = curl_exec($conn);
        curl_close($conn);
        
        return $res;
    }
    
    /**
     * メッセージのネタは「天気」にしましょう！
     * @return string
     */
    public function sampleMessage(): string
    {
        // PHPのcurlでSSL certificate problemが出る場合
        // https://tm23forest.com/contents/php-curl-ssl-certificate-problem
        $url = 'https://weather.tsukumijima.net/api/forecast/city/' . self::TOKYO;
        $conn = curl_init();
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true, // 実行結果を文字列で返す
        ];
        curl_setopt_array($conn, $options);
        $res = json_decode(curl_exec($conn), true)["forecasts"][self::TODAY];
        curl_close($conn);
    
        return $res["date"] . PHP_EOL . $res["telop"];
    }
}
