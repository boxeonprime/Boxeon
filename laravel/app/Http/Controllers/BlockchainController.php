<?php

namespace App\Http\Controllers;
use RenokiCo\LaravelWeb3\Web3Facade as Web3;
Web3::eth()->hashRate();
use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    public function __contruct(){
        
       

    }

    public function connect(){

        return 1;
    }
}
