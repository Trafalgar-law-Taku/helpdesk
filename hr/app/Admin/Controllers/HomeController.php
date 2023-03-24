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
            $user = User::all()->count();
            $news = operations::all()->count();
            $approved = operations::WHERE("Gm","=","Approved")->count();
            $hr = operations::WHERE("verified","=","yui")->count();
            $notapproved = operations::WHERE("Gm","=","Denied")->count();
            $waiting = operations::WhereNull('Gm')->count();

            $infoBox = new InfoBox('Users', '', 'orange', 'admin/users', $user);
            $infoBox2 = new InfoBox('Leave Applications','', 'green', 'admin/operations', $news);
            $infoBox3 = new InfoBox('Approved By GM','',  'red', 'admin/operations', $approved);
            $infoBox4 = new InfoBox('Denied By GM','',  'black', 'admin/operations', $notapproved);
            $infoBox5 = new InfoBox('Waiting For GM','',  'aqua', 'admin/operations', $waiting);
            $infoBox6 = new InfoBox('Approved By HR','',  'blue', 'admin/operations', $hr);
         
            $row->column(4, $infoBox->render());
            $row->column(4, $infoBox2->render());
            $row->column(4, $infoBox3->render());
            $row->column(4, $infoBox4->render());
            $row->column(4, $infoBox5->render());
            $row->column(4, $infoBox6->render());

         
        });
       
       
    }
}
