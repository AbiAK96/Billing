<?php

namespace App\Main;

class SideMenu
{
    /**
     * List of side menu items.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function menu()
    {
        $menu = [
            'dashboard' => [
                'icon' => 'fa fa-tachometer-alt',
                'title' => 'Dashboard',
                'route_name' => 'dashboard'
            ]
        ];

        $menu['customerinquiry'] = [
            'icon' => 'fa fa-envelope',
            'title' => 'Customer Inquiry',
            'route_name' => 'customerinquiry.index',
        ];

        $menu['managment'] = [
            'icon' => 'fa fa-bars',
            'title' => 'Management '
        ];

        $menu['managment']['sub_menu']['customer'] = [
            'icon' => 'fa fa-user',
            'route_name' => 'customer.index',
            'title' => 'Customer'
        ];

        $menu['managment']['sub_menu']['product'] = [
            'icon' => 'fa fa-tag',
            'route_name' => 'product.index',
            'title' => 'Product'
        ];

        $menu['managment']['sub_menu']['tax'] = [
            'icon' => 'fa fa-coins',
            'route_name' => 'tax.index', 
            'title' => 'Tax'
        ];

        $menu['managment']['sub_menu']['invoice'] = [
            'icon' => 'fa fa-receipt',
            'route_name' => 'invoice.index', 
            'title' => 'Invoice'
        ];

        $menu['managment']['sub_menu']['organization'] = [
            'icon' => 'fa fa-building',
            'route_name' => 'organization.index',  
            'title' => 'Organization'
        ];

        $menu['setting'] = [
            'icon' => 'fa fa-cogs',
            'title' => 'Settings'
        ];

        $menu['setting']['sub_menu']['appearance'] = [
            'icon' => 'fa fa-palette', 
            'route_name' => 'appearance.index',
            'title' => 'Appearance'
        ];

        $menu['setting']['sub_menu']['systemuser'] = [
            'icon' => 'fa fa-user-shield',
            'route_name' => 'systemuser.index',
            'title' => 'System User'
        ];

        $menu['logout'] = [
            'icon' => 'fa fa-toggle-off',
            'title' => 'Logout',
            'route_name' => 'logout',
        ];

        return $menu;
    }
}
