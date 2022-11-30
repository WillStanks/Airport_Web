<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

// src/Controller/CountriesController.php
class CountriesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Authorization->skipAuthorization();
    }

    public function index()
    {
        $this->Authorization->skipAuthorization();
        $countries = $this->Countries->find('all')->all();
        $this->set('countries', $countries);
        $this->viewBuilder()->setOption('serialize', ['countries']);
    }

    public function view($id)
    {
        $country = $this->Countries->get($id);
        $this->set('country', $country);
        $this->viewBuilder()->setOption('serialize', ['country']);
    }

    public function add()
    {
        $this->request->allowMethod(['post', 'put']);
        $country = $this->Countries->newEntity($this->request->getData());
        if ($this->Countries->save($country)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'country' => $country,
        ]);
        $this->viewBuilder()->setOption('serialize', ['country', 'message']);
    }

    public function edit($id)
    {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $country = $this->Countries->get($id);
        $country = $this->Countries->patchEntity($country, $this->request->getData());
        if ($this->Countries->save($country)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'country' => $country,
        ]);
        $this->viewBuilder()->setOption('serialize', ['country', 'message']);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['delete']);
        $country = $this->Countries->get($id);
        $message = 'Deleted';
        if (!$this->Countries->delete($country)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }
}
