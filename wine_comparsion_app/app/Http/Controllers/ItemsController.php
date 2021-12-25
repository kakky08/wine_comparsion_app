<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use RakutenRws_Client;


class ItemsController extends Controller
{
    public function getRakutenItems()
    {

        // require_once '/path/to/sdk-dir/autoload.php';
        $client = new RakutenRws_Client();
        // アプリID (デベロッパーID) をセットします
        $client->setApplicationId('1034852434718084917');

        // アフィリエイトID をセットします(任意)
        // $client->setAffiliateId('YOUR_AFFILIATE_ID');

        // IchibaItem/Search API から、keyword=うどん を検索します
        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => 'うどん'
        ));

        // レスポンスが正しいかを isOk() で確認することができます
        if (!$response->isOk()) {

            return 'Error:' . $response->getMessage();
        } else {
            $items = array();

            foreach ($response as $rekutenItem) {
                // 利用データを配列に代入
                $items['title'] = $rekutenItem['itemName'];
                $items['price'] = $rekutenItem['itemPrice'];
                if ($rekutenItem['imageFlag']) {
                    $imgSrc = $rekutenItem['mediumImageUrls'][0]['imageUrl'];
                    $items['img_src'] = preg_replace('/^http:/', 'https:', $imgSrc);
                }
            }
            // return response()->json($response->getData());
            // $test = 'aaa';
            return view('test')->with('items', $items);
            // return $items;
        }
    }
}
$test = new ItemsController;
echo $test->getRakutenItems();
