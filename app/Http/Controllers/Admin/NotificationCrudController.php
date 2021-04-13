<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NotificationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class NotificationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class NotificationCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Notification::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/notification');
        CRUD::setEntityNameStrings('Notification', 'Notifications');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        //CRUD::setFromDb(); // columns

        $this->crud->addColumn(['name' => 'title', 'label' => 'Title']);
        $this->crud->addColumn(['name' => 'impact',  'label' => 'Impact']);
        $this->crud->addColumn(['name' => 'user', 'attribute' => 'name', 'label' => 'Client']);
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(NotificationRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'title',
            'type' => 'text',
            'label' => "Title"
        ]);
        $this->crud->addField([
            'name' => 'description',
            'type' => 'textarea',
            'label' => "Description"
        ]);

        $this->crud->addField([
            'name' => 'impact',
            'type' => 'select_from_array',
            'label' => "Impact",
            'options'   => ['low' => 'LOW', 'medium' => 'MEDIUM', 'high' => 'HIGH'],
            'allows_null'     => false,
            'allows_multiple' => false,
        ]);
        $this->crud->addField(
            [  // Select2
                'label'     => "Client",
                'type'      => 'select2',
                'name'      => 'user_id', // the db column for the foreign key

                // optional
                'entity'    => 'user', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                //'default'   => 2, // set the default value of the select2

                // also optional
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ]
        );
        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
