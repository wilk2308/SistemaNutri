<?php
namespace App\Controllers;



class Home extends BaseController
{
   


 

    public function index()
    {
        if (!session()->get('user')) {
            return redirect()->to('/login');
        }

        return view('home', [
     
        ]);
    }
}
