<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use App\Models\User;
use App\Models\operations;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Layout\Row;
use Encore\Admin\Facades\Admin;

Admin::js('/vendor/chartjs/dist/Chart.min.js');

class HomeController extends Controller
{
    public function index(Content $content)
    {

        $content->header('Back-end Admin Panel');
        $content->description('Admin Pannel Created By Takudzwa Chirume');


        return $content->row(function (Row $row) {
 
            $hr = 1;


            $infoBox = new InfoBox('Your Applications', '', 'orange', 'admin/operations', $hr);
            $infoBox2 = new InfoBox('Approved Applications', '', 'green', 'admin/operation', '0');
            $infoBox3 = new InfoBox('Days Left', '', 'red', 'admin/operation', '20');
            $infoBox4 = new InfoBox('Days Applied', '', 'aqua', 'admin/operation', '10');

            $row->column(6, $infoBox->render());
            $row->column(6, $infoBox2->render());
            $row->column(6, $infoBox3->render());
          $row->column(6, $infoBox4->render());
        });
       
       
    }
}
