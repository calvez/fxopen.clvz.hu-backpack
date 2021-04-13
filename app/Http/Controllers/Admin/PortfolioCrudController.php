<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PortfolioRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PortfolioCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PortfolioCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Portfolio::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/portfolio');
        CRUD::setEntityNameStrings('portfolio', 'Portfolio Cabinet');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


        // fields
        $this->crud->addColumn(
            [
                'name' => 'user.name',
                'type' => 'text',
                'label' => "Client",
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'passport',
                'type' => 'text'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'base_currency',
                'type' => 'text'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'total_deposits',
                //'type' => 'relationship_count',
                'label' => "Total Deposits",
            ]
        );

        $this->crud->addColumn(
            [
                'name' => 'joined',
                'type' => 'date',
                'label' => "Date joined",
            ]
        );
    }


    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PortfolioRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField(
            [  // Select2
                'label'     => "Client name",
                'type'      => 'select2',
                'name'      => 'user_id', // the db column for the foreign key

                // optional
                'entity'    => 'user', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user

                // also optional
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ]
        );
        $this->crud->addField([
            'name' => 'base_currency',
            'type' => 'select_from_array',
            'label' => "Base Currency",
            'options'   => ['usd' => 'USD', 'eur' => 'EUR', 'aud' => 'AUD', 'jpy' => 'JPY'],
            'allows_null'     => false,
            'allows_multiple' => false,
        ]);
        $this->crud->addField([
            'name' => 'passport',
            'type' => 'text',
            'label' => "passport"
        ]);
        $this->crud->addField([
            'name' => 'phone',
            'type' => 'text',
            'label' => "Phone"
        ]);
        $this->crud->addField([
            'name' => 'address',
            'type' => 'textarea',
            'label' => "Address"
        ]);
        $this->crud->addField([
            'name' => 'joined',
            'type' => 'date',
            'label' => "Joined"
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
