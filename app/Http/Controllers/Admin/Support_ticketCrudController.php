<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Support_ticketRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Support_ticketCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Support_ticketCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Support_ticket::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/support_ticket');
        CRUD::setEntityNameStrings('Service request', 'Service Tickets');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

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
        CRUD::setValidation(Support_ticketRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField(
            [  // Select2
                'label'     => "Related Client",
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
            'name' => 'time',
            'type' => 'date_picker',
            'label' => "Date",
            'date_picker_options' => [
                'todayBtn' => 'linked',
                'format'   => 'dd-mm-yyyy',
                'language' => 'en'
            ],
        ]);
        $this->crud->addField(
            [  // Select2
                'label'     => "Category",
                'type'      => 'select2',
                'name'      => 'support_ticket_category_id', // the db column for the foreign key

                // optional
                'entity'    => 'supportTicket', // the method that defines the relationship in your Model
                'model'     => "App\Models\Support_ticket_category", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'default'   => 2, // set the default value of the select2

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
