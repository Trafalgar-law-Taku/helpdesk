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
        $content->description('Laravel Inpired Admin Pannel Created By Webiconic');
    

        return $content->row(function(Row $row) {
$user= User::all()->count();
$news = operations::all()->count();

            $infoBox = new InfoBox('Users', 'user', 'orange', 'admin/users', $user);
            $infoBox2 = new InfoBox('Jobs', 'newspaper-o', 'green', 'admin/operations', $news);
            $infoBox3 = new InfoBox('Departments', 'newspaper-o', 'green', 'admin/operations', '13');
            $infoBox4 = new InfoBox('Techncians', 'newspaper-o', 'green', 'admin/operations', '8');

            $row->column(4, $infoBox->render());
            $row->column(4, $infoBox2->render());
            $row->column(4, $infoBox3->render());
            $row->column(4, $infoBox4->render());
          
        });
        
        $content->body(view('admin.charts.bar'));

            
    }
}
