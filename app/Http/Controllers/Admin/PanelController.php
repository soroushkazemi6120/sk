<?php

namespace App\Http\Controllers\Admin;
use App\Payment;
use App\Permission;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    public function index()
    {
        $month = 12;
        $paymentSuccess = Payment::spanningPayment($month , true);
        $paymentUnSuccess = Payment::spanningPayment($month , false);

        $labels = $this->getLastMonths($month);

        $values['success'] = $this->CheckCount($paymentSuccess->pluck('published') , $month);
        $values['unsuccess'] = $this->CheckCount($paymentUnSuccess->pluck('published') , $month);

      //  return view('Admin.panel' , compact('labels' , 'values'));
        return response([
            "data"=>['labels','values'],
            'status'=>'ok'
        ],200);
    }
    private function getLastMonths($month)
    {
        for ($i = 0 ; $i < $month ; $i++) {
            $labels[] = jdate( Carbon::now()->subMonths($i))->format('%B');
        }
        return array_reverse($labels);
    }

    private function CheckCount($count, $month)
    {
        for ($i = 0 ; $i < $month ; $i++) {
            $new[$i] = empty($count[$i]) ? 0 : $count[$i];
        }
        return array_reverse($new);
    }



}




