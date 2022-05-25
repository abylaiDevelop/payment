<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * @param Request $request
     * @return void
     */
    public function payment(Request $request) {
//        $business = Business::create([
//            "name" => "test",
//            "account" => "1234",
//            "bin" => "1234",
//            "money" => $request->get("amount"),
//            "user_id" => 1
//        ]);
        $arr = $request->toArray();
        $this->wr_file($arr);

    }

    public function array_to_string($var)
    {
        ob_start();
        print_r($var);
        $result = ob_get_clean();
        return $result;
    }

    public function wr_file($var, $filename = "log_zerone")
    {
        $sFile = $_SERVER['DOCUMENT_ROOT'] . "/log/" . $filename . ".txt";
        $rsHandler = fopen($sFile, "a+");
        fwrite($rsHandler, $this->array_to_string($var) . PHP_EOL);
        fwrite($rsHandler, "-----------------------------------------------------------" . PHP_EOL);
        fclose($rsHandler);
    }
}
