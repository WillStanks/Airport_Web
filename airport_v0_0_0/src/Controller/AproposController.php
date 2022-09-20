<?php

namespace App\Controller;

use App\Controller\AppController;


class AproposController extends AppController
{
    public function index()
    {
        $this->Authorization->skipAuthorization();
        $this->set(null);
    }
}
