<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Planes Controller
 *
 * @property \App\Model\Table\PlanesTable $Planes
 * @method \App\Model\Entity\Plane[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PlanesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->Authorization->skipAuthorization();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $planes = $this->paginate($this->Planes);

        $this->set(compact('planes'));
    }

    /**
     * View method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $plane = $this->Planes->get($id, [
            'contain' => ['Reservations'],
        ]);

        $this->set(compact('plane'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        // Vérification en contexte i18n
        if ($this->request->getSession()->check('Config.language')) {
            $actualLanguage = $this->request->getSession()->read('Config.language'); // langue d'affichage actuellement définie
            $defaultLanguage = Configure::read('App.defaultLocale'); // langue par défaut de l'application
            if ($defaultLanguage != $actualLanguage) {
                $this->Flash->success(__('Adding is available only in the default language'));
                $this->changeLang($defaultLanguage);
                return $this->redirect(['action' => 'add']);
            }
        }
        //
        $this->Authorization->skipAuthorization();
        $plane = $this->Planes->newEmptyEntity();
        if ($this->request->is('post')) {
            $plane = $this->Planes->patchEntity($plane, $this->request->getData());
            if ($this->Planes->save($plane)) {
                $this->Flash->success(__('The plane has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plane could not be saved. Please, try again.'));
        }
        $reservations = $this->Planes->Reservations->find('list', ['limit' => 200])->all();
        $this->set(compact('plane', 'reservations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->Authorization->skipAuthorization();
        $plane = $this->Planes->get($id, [
            'contain' => ['Reservations'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $plane = $this->Planes->patchEntity($plane, $this->request->getData());
            if ($this->Planes->save($plane)) {
                $this->Flash->success(__('The plane has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The plane could not be saved. Please, try again.'));
        }
        $reservations = $this->Planes->Reservations->find('list', ['limit' => 200])->all();
        $this->set(compact('plane', 'reservations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Plane id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $plane = $this->Planes->get($id);
        if ($this->Planes->delete($plane)) {
            $this->Flash->success(__('The plane has been deleted.'));
        } else {
            $this->Flash->error(__('The plane could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
