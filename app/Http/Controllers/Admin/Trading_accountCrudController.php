<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Trading_accountRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Trading_accountCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Trading_accountCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Trading_account::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/trading_account');
        CRUD::setEntityNameStrings('Trading Account', 'Trading Accounts');
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
        CRUD::setValidation(Trading_accountRequest::class);

        $this->crud->addField(
            [  // Select2
                'label'     => "Client name",
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
            'name' => 'account_number',
            'type' => 'number',
            'label' => "Account number"
        ]);
        $this->crud->addField([
            'name' => 'master_name',
            'type' => 'text',
            'label' => "Master account name"
        ]);
        $this->crud->addField([
            'name' => 'sub_account_name',
            'type' => 'text',
            'label' => "Sub account name"
        ]);
        $this->crud->addField([
            'name' => 'base_currency',
            'type' => 'select_from_array',
            'label' => "Base Currency",
            'options'   => ['usd' => 'USD', 'eur' => 'EUR', 'aud' => 'AUD', 'jpy' => 'JPY'],
            'allows_null'     => false,
            'allows_multiple' => false,
        ]);
        $this->crud->addField([
            'name' => 'balance',
            'type' => 'number',
            'label' => "Balance"
        ]);
        $this->crud->addField([
            'name' => 'equity',
            'type' => 'number',
            'label' => "Equity"
        ]);
        $this->crud->addField([
            'name' => 'leverage',
            'type' => 'number',
            'label' => "Leverage"
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
