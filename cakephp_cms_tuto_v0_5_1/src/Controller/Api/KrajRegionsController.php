<?php

namespace App\Controller\Api;

use App\Controller\Api\AppController;

// src/Controller/KrajRegionsController.php
class KrajRegionsController extends AppController {

    public function initialize(): void {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->Authorization->skipAuthorization();
    }

    public function index() {
//        $this->Authorization->skipAuthorization();

        $krajRegions = $this->KrajRegions->find('all')->all();
        $this->set('krajRegions', $krajRegions);
        $this->viewBuilder()->setOption('serialize', ['krajRegions']);
    }

    public function view($id) {
        $krajRegion = $this->KrajRegions->get($id);
        $this->set('krajRegion', $krajRegion);
        $this->viewBuilder()->setOption('serialize', ['krajRegion']);
    }

    public function add() {
        $this->request->allowMethod(['post', 'put']);
        $krajRegion = $this->KrajRegions->newEntity($this->request->getData());
        if ($this->KrajRegions->save($krajRegion)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'krajRegion' => $krajRegion,
        ]);
        $this->viewBuilder()->setOption('serialize', ['krajRegion', 'message']);
    }

    public function edit($id) {
        $this->request->allowMethod(['patch', 'post', 'put']);
        $krajRegion = $this->KrajRegions->get($id);
        $krajRegion = $this->KrajRegions->patchEntity($krajRegion, $this->request->getData());
        if ($this->KrajRegions->save($krajRegion)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set([
            'message' => $message,
            'krajRegion' => $krajRegion,
        ]);
        $this->viewBuilder()->setOption('serialize', ['krajRegion', 'message']);
    }

    public function delete($id) {
        $this->request->allowMethod(['delete']);
        $krajRegion = $this->KrajRegions->get($id);
        $message = 'Deleted';
        if (!$this->KrajRegions->delete($krajRegion)) {
            $message = 'Error';
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
    }

}
