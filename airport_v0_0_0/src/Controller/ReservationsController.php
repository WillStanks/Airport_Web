<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\I18n\I18n;
use Cake\Core\Configure;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 * @method \App\Model\Entity\Reservation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReservationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();
        /*        $this->paginate = [
            'contain' => ['Users'],
            'contain' => ['depCities'],
            'contain' => ['destCities'],
        ];



       $reservations = $this->paginate($this->Reservations);
*/
        $reservations = $this->Reservations->find('all', [
            'contain' => ['Users', 'DestCities', 'DepCities']
        ]);
        $this->set(compact('reservations'));
    }

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($slug = null)
    {
        $this->Authorization->skipAuthorization();
        $reservation = $this->Reservations->findBySlug($slug)->contain('Users')->contain('Planes')->contain('DepCities')->contain('DestCities')->firstOrFail();

        $this->set(compact('reservation'));
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
        $reservation = $this->Reservations->newEmptyEntity();
        $this->Authorization->authorize($reservation);
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());

            // Set the user_id from the current user.
            $reservation->user_id = $this->request->getAttribute('identity')->getIdentifier();

            if (!$reservation->getErrors) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFileName();

                $targetPath = WWW_ROOT . 'img' . DS . 'reservations' . DS . $name;

                if ($name)
                    $image->moveTo($targetPath);

                $reservation->image = $name;
            }

            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        // $users = $this->Reservations->Users->find('list', ['limit' => 200])->all();
        $planes = $this->Reservations->Planes->find('list', ['limit' => 200])->all();
        $depCities = $this->Reservations->DepCities->find('list', ['limit' => 200])->all();
        $destCities = $this->Reservations->DestCities->find('list', ['limit' => 200])->all();
        $this->set(compact('reservation', 'planes', 'depCities', 'destCities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null)
    {
        $reservation = $this->Reservations->findBySlug($slug)->contain('Users')->contain('Planes')->contain('DepCities')->contain('DestCities')->firstOrFail();
        $this->Authorization->authorize($reservation);
        /*       $reservation = $this->Reservations->get($id, [
            'contain' => ['Planes'],
        ]);*/
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);

            if (!$reservation->getErrors) {
                $image = $this->request->getData('image_file');

                $name = $image->getClientFileName();

                if ($name != "") { // Verifie si il y a deja une image.
                    $targetPath = WWW_ROOT . 'img' . DS . 'reservations' . DS . $name;

                    if ($name)
                        $image->moveTo($targetPath);

                    $reservation->image = $name;
                }
            }
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $users = $this->Reservations->Users->find('list', ['limit' => 200])->all();
        $planes = $this->Reservations->Planes->find('list', ['limit' => 200])->all();
        $depCity = $this->Reservations->DepCities->get($reservation->depCity_id);
        $destCity = $this->Reservations->DestCities->get($reservation->destCity_id);
        $this->set(compact('reservation', 'users', 'planes', 'depCity', 'destCity'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        $this->Authorization->authorize($reservation);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
