<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * KrajRegions Controller
 *
 * @property \App\Model\Table\KrajRegionsTable $KrajRegions
 * @method \App\Model\Entity\KrajRegion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class KrajRegionsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() {
        $this->Authorization->skipAuthorization();
        $krajRegions = $this->KrajRegions->find('all')->all();
//        $krajRegions = $this->paginate($this->KrajRegions);

        $this->set(compact('krajRegions'));
        $this->viewBuilder()->setOption('serialize', ['krajRegions']);
//        $this->viewBuilder()->setLayout('krajRegionsSpa');
    }

    /**
     * View method
     *
     * @param string|null $id Kraj Region id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $krajRegion = $this->KrajRegions->get($id, [
            'contain' => ['ObecCities', 'OkresCounties'],
        ]);

        $this->set(compact('krajRegion'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $krajRegion = $this->KrajRegions->newEmptyEntity();
        if ($this->request->is('post')) {
            $krajRegion = $this->KrajRegions->patchEntity($krajRegion, $this->request->getData());
            if ($this->KrajRegions->save($krajRegion)) {
                $this->Flash->success(__('The kraj region has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kraj region could not be saved. Please, try again.'));
        }
        $this->set(compact('krajRegion'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Kraj Region id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null) {
        $krajRegion = $this->KrajRegions->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $krajRegion = $this->KrajRegions->patchEntity($krajRegion, $this->request->getData());
            if ($this->KrajRegions->save($krajRegion)) {
                $this->Flash->success(__('The kraj region has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The kraj region could not be saved. Please, try again.'));
        }
        $this->set(compact('krajRegion'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Kraj Region id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $krajRegion = $this->KrajRegions->get($id);
        if ($this->KrajRegions->delete($krajRegion)) {
            $this->Flash->success(__('The kraj region has been deleted.'));
        } else {
            $this->Flash->error(__('The kraj region could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
