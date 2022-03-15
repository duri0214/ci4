<?php

namespace App\Libraries;

class Postal
{
    private string $prefecture;
    private string $municipality;
    
    /**
     * 郵便番号から「都道府県」「市町村」「その他」に分けます
     * @param $postalCode
     * @return $this
     */
    public function getByCode($postalCode): self
    {
        // CSV取得元: https://www.post.japanpost.jp/zipcode/dl/kogaki-zip.html
        // TODO: CSVでマスタとして整備した住所リストから検索する（CSV取り込みの仕組みを作ってからだね）
        // static にしたほうがいいのかな？
        // $this->prefecture = "";
        // $this->municipality = "";
        //
        // return $this;
    }
}
