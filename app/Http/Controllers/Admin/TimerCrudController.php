<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TimerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TimerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TimerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Timer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/timer');
        CRUD::setEntityNameStrings('Tracking', 'Log In Tracker');
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
        $this->crud->addColumn(['name' => 'started_at', 'type' => 'started_at', 'label' => 'Time Log In']);
        $this->crud->addColumn(['name' => 'stopped_at', 'type' => 'stopped_at', 'label' => 'Time Log Out']);
        $this->crud->addColumn(['name' => 'location', 'type' => 'location', 'label' => 'From Location']);
        $this->crud->addColumn(['name' => 'total_hours', 'type' => 'number', 'label' => 'Total Hours Recorded']);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TimerRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField(
            [  // Select2
                'label'     => "User",
                'type'      => 'select2',
                'name'      => 'user_id', // the db column for the foreign key

                // optional
                'entity'    => 'user', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'default'   => 2, // set the default value of the select2

                // also optional
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ]
        );
        $this->crud->addField([
            'name' => 'started_at',
            'type' => 'datetime_picker',
            'label' => "Time Log In",
            // optional:
            'datetime_picker_options' => [
                'format' => 'YYYY/MM/DD HH:mm',
                'language' => 'en'
            ],
            'allows_null' => true,
            // 'default' => '2017-05-12 11:59:59',
        ]);
        $this->crud->addField([
            'name' => 'stopped_at',
            'type' => 'datetime_picker',
            'label' => "Time Log Out",
            // optional:
            'datetime_picker_options' => [
                'format' => 'YYYY/MM/DD HH:mm',
                'language' => 'en'
            ],
            'allows_null' => true,
            // 'default' => '2017-05-12 11:59:59',
        ]);
        $this->crud->addField([
            'name' => 'location',
            'type' => 'text',
            'label' => "From Location"
        ]);
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
