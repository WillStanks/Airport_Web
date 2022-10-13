<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * ObecCities Controller
 *
 * @property \App\Model\Table\ObecCitiesTable $ObecCities
 * @method \App\Model\Entity\ObecCity[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ObecCitiesController extends AppController {

    public function findObecCities() {
        $this->Authorization->skipAuthorization();
        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->getQuery('term');
            $results = $this->ObecCities->find('all', array(
                'conditions' => array('ObecCities.nazev LIKE ' => '%' . $name . '%')
            ));
//debug($results); exit;
            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['nazev'], 'value' => $result['id']);
            }
            echo json_encode($resultArr);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();
        $this->paginate = [
            'contain' => ['KrajRegions', 'OkresCounties'],
        ];
        $obecCities = $this->paginate($this->ObecCities);

        $this->set(compact('obecCities'));
    }

    /**
     * View method
     *
     * @param string|null $id Obec City id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $obecCity = $this->ObecCities->get($id, [
            'contain' => ['KrajRegions', 'OkresCounties', 'Articles'],
        ]);

        $this->set(compact('obecCity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $this->Authorization->skipAuthorization();
        $obecCity = $this->ObecCities->newEmptyEntity();
        if ($this->request->is('post')) {
            $obecCity = $this->ObecCities->patchEntity($obecCity, $this->request->getData());
            if ($this->ObecCities->save($obecCity)) {
                $this->Flash->success(__('The obec city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The obec city could not be saved. Please, try again.'));
        }
        $krajRegions = $this->ObecCities->KrajRegions->find('list', ['limit' => 200]);
        $okresCounties = $this->ObecCities->OkresCounties->find('list', ['limit' => 200]);
        $this->set(compact('obecCity', 'krajRegions', 'okresCounties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Obec City id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $obecCity = $this->ObecCities->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $obecCity = $this->ObecCities->patchEntity($obecCity, $this->request->getData());
            if ($this->ObecCities->save($obecCity)) {
                $this->Flash->success(__('The obec city has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The obec city could not be saved. Please, try again.'));
        }
        $krajRegions = $this->ObecCities->KrajRegions->find('list', ['limit' => 200]);
        $okresCounties = $this->ObecCities->OkresCounties->find('list', ['limit' => 200]);
        $this->set(compact('obecCity', 'krajRegions', 'okresCounties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Obec City id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $obecCity = $this->ObecCities->get($id);
        if ($this->ObecCities->delete($obecCity)) {
            $this->Flash->success(__('The obec city has been deleted.'));
        } else {
            $this->Flash->error(__('The obec city could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
