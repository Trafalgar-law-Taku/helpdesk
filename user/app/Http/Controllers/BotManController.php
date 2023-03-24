<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('hi', function (BotMan $bot) {
            $bot->reply("Hello How are You");
        });
        $botman->hears('I am fine and you', function (BotMan $bot) {
            $bot->reply("Im quite Well Thank you");
        });
  

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
 
    }
