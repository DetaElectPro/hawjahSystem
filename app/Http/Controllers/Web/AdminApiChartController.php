<?php

namespace App\Http\Controllers\Api\AdminApp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Booking;
class AdminApiChartController extends Controller
{
    public function sumYearly()
    {
        $year = date("Y");
        $ch= DB::select("SELECT month(booking_date) AS month, sum(totalPrice) AS sum
                                FROM bookings
                                WHERE year(booking_date) = ''+$year AND (status = 4 OR status = 3)
                                group by month(booking_date)
                                ORDER BY month(booking_date) ASC");

        return response()->json($ch, '200');
//        return response()->json(["data"=> $ch], '200');


    }

    public function sumMonthly()
    {
        $year = date("Y");
        $month = date("m");

        $ch= DB::select("SELECT DAY(booking_date) as d, sum(totalPrice) as s
                                from bookings
                                WHERE year(booking_date) = ''+$year AND month(booking_date) = ''+$month 
                                AND (status = 4 OR status = 3)
                                group by DAY(booking_date)
                                ORDER BY DAY(booking_date) ASC");
        return response()->json($ch, '200');

    }


    public function usersYearly()
    {
        $year = date("Y");
        $ch= DB::select("SELECT MONTH(booking_date) as month, COUNT(*) as r from bookings
                                WHERE year(booking_date) = ''+$year
                                AND (status = 4 OR status = 3)
                                group by month(booking_date)
                                ORDER BY month(booking_date) ASC");
        return response()->json($ch, '200');
    }

    public function usersMonthly()
    {
        $year = date("Y");
        $month = date("m");

        $ch= DB::select("SELECT DAY(booking_date) as day, COUNT(*) as r from bookings
                                WHERE year(booking_date) = ''+$year AND month(booking_date) = ''+$month
                                AND (status = 4 OR status = 3)
                                group by DAY(booking_date)
                                ORDER BY DAY(booking_date) ASC");
        return response()->json($ch, '200');

    }


}
