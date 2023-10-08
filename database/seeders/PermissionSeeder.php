<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Paper Round
        Permission::create(
            [ 
                'name' => 'paper_round',
				'lable' => 'Paper Round',
            ]);
        Permission::create(
            [ 
                'name' => 'paper_round_delivery',
				'lable' => 'Paper Round Delivery',
            ],
            );
        Permission::create(
            [ 
                'name' => 'paper_round_detail',
				'lable' => 'Paper Round Detail',
            ],
           );
        Permission::create(
            [ 
                'name' => 'paper_round_assign',
				'lable' => 'Paper Round Assign',
            ]
        );

        //Delivery
        Permission::create(
            [ 
                'name' => 'delivery',
				'lable' => 'Delivery',
            ],
            );
        Permission::create(
            [ 
                'name' => 'filter_delivery',
				'lable' => 'Filter Delivery',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_paper_round',
				'lable' => 'Create Paper Round',
            ],
            );
        Permission::create(
            [ 
                'name' => 'edit_delivery',
				'lable' => 'Edit Delivery',
            ],
            );
        Permission::create(
            [ 
                'name' => 'delete_delivery',
				'lable' => 'Delete Delivery',
            ]
        );

         //Paper
         Permission::create(
            [ 
                'name' => 'paper',
				'lable' => 'Paper',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_paper',
				'lable' => 'Create paper',
            ],
            );
        Permission::create(
            [ 
                'name' => 'edit_paper',
				'lable' => 'Edit Paper',
            ],
            );
        Permission::create(
            [ 
                'name' => 'delete_paper',
				'lable' => 'Delete Paper',
            ],
           );
        Permission::create(
            [ 
                'name' => 'add_quantity',
				'lable' => 'Add Quantity',
            ]
        );

        //Customer
        Permission::create(
            [ 
                'name' => 'customer',
				'lable' => 'Customer',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_customer',
				'lable' => 'Create Customer',
            ],
            );
        Permission::create(
            [ 
                'name' => 'edit_customer',
				'lable' => 'Edit Customer',
            ],
            );
        Permission::create(
            [ 
                'name' => 'delete_customer',
				'lable' => 'Delete Customer',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_subscription',
				'lable' => 'Create Subscription',
            ],
            );
        Permission::create(
            [ 
                'name' => 'change_subscription_status',
				'lable' => 'Create Subscription Status',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_exception',
				'lable' => 'Create Exception ',
            ],
            );
        Permission::create(
            [ 
                'name' => 'delete_exception',
				'lable' => 'Delete Exception',
            ]
        );

        //Delivery Staff
        Permission::create(
            [ 
                'name' => 'delivery_staff',
				'lable' => 'Delivery Staff',
            ]
        );
         Permission::create(
            [ 
                'name' => 'create_delivery_staff',
				'lable' => 'Create Delivery Staff',
            ],
        );
         Permission::create(
            [ 
                'name' => 'edit_delivery_staff',
				'lable' => 'Edit Delivery Staff',
            ],
        );
         Permission::create(
            [ 
                'name' => 'create_delivery_vehicle',
				'lable' => 'Create Delivery Vehicle',
            ],
           );
         Permission::create(
            [ 
                'name' => 'edit_delivery_vehicle',
				'lable' => 'Edit Delivery Vehicle',
            ]
        );

        
        //Shipping Cost
        Permission::create(
            [ 
                'name' => 'shipping_cost',
				'lable' => 'Shipping Cost',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_shipping_cost',
				'lable' => 'Create Shipping Cost',
            ],
            );
        Permission::create(
            [ 
                'name' => 'edit_shipping_cost',
				'lable' => 'Edit Shipping Cost',
            ],
           );
        Permission::create(
            [ 
                'name' => 'delete_shipping_cost',
				'lable' => 'Delete Shipping Cost',
            ]
        );


        //Exception 
        Permission::create(
            [ 
                'name' => 'exceptional_days',
				'lable' => 'Exceptional Days',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_exceptional_days',
				'lable' => 'Create Exceptional Days',
            ],
            );
        Permission::create(
            [ 
                'name' => 'delete_exceptional_days',
				'lable' => 'Delete Exceptional Days',
            ]
        );

        //Payment Inventory 
        Permission::create(
            [ 
                'name' => 'payment_inventory',
				'lable' => 'Payment Inventory',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_billing',
				'lable' => 'Create Billing',
            ],
           );
        Permission::create(
            [ 
                'name' => 'update_billing',
				'lable' => 'Update Billing',
            ]
        );

        //Customer Inquiry 
        Permission::create(
            [ 
                'name' => 'customer_inquiry',
				'lable' => 'Customer Inquiry',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_customer_inquiry',
				'lable' => 'Create Customer Inquiry',
            ],
            );
        Permission::create(
            [ 
                'name' => 'edit_customer_inquiry',
				'lable' => 'Edit Customer Inquiry',
            ],
           );
        Permission::create(
            [ 
                'name' => 'delete_customer_inquiry',
				'lable' => 'Delete Customer Inquiry',
            ]
        );

        //Appearance 
        Permission::create(
            [ 
                'name' => 'appearance',
				'lable' => 'Appearance',
            ]
        );

        //System User 
        Permission::create(
            [ 
                'name' => 'system_user',
                'lable' => 'System User',
            ],
            );
        Permission::create(
            [ 
                'name' => 'create_system_user',
				'lable' => 'Create System User',
            ]
            );
        Permission::create(
            [ 
                'name' => 'edit_system_user',
				'lable' => 'Edit System User',
            ]
            );
        Permission::create(
            [ 
                'name' => 'delete_system_user',
				'lable' => 'Delete System User',
            ]
            );
        Permission::create(
            [ 
                'name' => 'assign_permission',
				'lable' => 'Assign Permission',
            ]
        );

        //Job List 
        Permission::create(
            [ 
                'name' => 'job_list',
                'lable' => 'Job List',
            ]
        );
    }
}
