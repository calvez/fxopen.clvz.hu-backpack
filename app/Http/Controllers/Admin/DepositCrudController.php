<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepositRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DepositCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DepositCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Deposit::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/deposit');
        CRUD::setEntityNameStrings('Transaction Log', 'Transaction Logs');
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

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        // filters
        // daterange filter
        $this->crud->addFilter(
            [
                'type'  => 'date_range',
                'name'  => 'date',
                'label' => 'Date range'
            ],
            false,
            function ($value) { // if the filter is active, apply these constraints
                $dates = json_decode($value);
                $this->crud->addClause('where', 'date', '>=', $dates->from);
                $this->crud->addClause('where', 'date', '<=', $dates->to . ' 23:59:59');
            }
        );

        // dropdown filter
        $this->crud->addFilter(
            [
                'name'  => 'user_id',
                'type'  => 'dropdown',
                'label' => 'Client'
            ],
            // function ($value) { // if the filter is active
            //      $this->crud->addClause('where', 'user_id', $value);
            // }
        );

        // fields

        $this->crud->addColumn(
            [
                'name' => 'date',
                'type' => 'datetime',
                'label' => "Date",
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'transaction_type',
                'type' => 'text'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'user_id',
                'type' => 'text',
                'label' => "Client",
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
                'name' => 'amount',
                'type' => 'number'
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'transaction_id',
                'type' => 'text',
                'label' => "Digital Transaction ID"
            ]
        );
        $this->crud->addColumn(
            [
                'name' => 'details',
                'type' => 'text',
                'label' => "Details"
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
        CRUD::setValidation(DepositRequest::class);

        //CRUD::setFromDb(); // fields
        $this->crud->addField([
            'name' => 'date',
            'type' => 'datetime_picker',
            'label' => "Date",
            // optional:
            'datetime_picker_options' => [
                'format' => 'YYYY/MM/DD HH:mm',
                'language' => 'en'
            ],
            'allows_null' => true,
            // 'default' => '2017-05-12 11:59:59',
        ]);

        $this->crud->addField([
            'name' => 'transaction_type',
            'type' => 'select_from_array',
            'options'   => ['deposit' => 'DEPOSIT', 'withdraw' => 'WITHDRAW'],
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
            'allows_null'     => true,
            'allows_multiple' => true,
        ]);
        $this->crud->addField([
            'name' => 'amount',
            'type' => 'number',
            'label' => "Amount"
        ]);
        $this->crud->addField([
            'name' => 'transaction_id',
            'type' => 'textarea',
            'label' => "Digital Transaction ID"
        ]);
        $this->crud->addField([
            'name' => 'details',
            'type' => 'textarea',
            'label' => "Details"
        ]);
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
