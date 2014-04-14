<?php

namespace Dragoon\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NavigationController extends Controller
{
    public function headerAction($max = 3)
    {
        
        return $this->render('DragoonAdminBundle:Navigation:header.html.twig');
    }
    
    public function sideAction($max = 3)
    {
        $navigation = array(
            array(
                'route' => 'dragoon_admin_dashboard',
                'href' => '',
                'lib' => 'Dashboard',
                'icone' => 'fa-dashboard'
            ),
            array(
                'route' => 'dragoon_admin_list',
                'route_param' => 'News',
                'href' => '',
                'lib' => 'News',
                'icone' => 'fa-dashboard'
            ),
            array(
                'route' => 'dragoon_admin_list',
                'route_param' => 'User',
                'href' => '',
                'lib' => 'Utilisateurs',
                'icone' => 'fa-users'
            ),
            array(
                'href' => '#',
                'lib' => 'Films',
                'icone' => 'fa-film'
            ),
            array(
                'href' => '#',
                'lib' => 'Charts',
                'icone' => 'fa-bar-chart-o',
                'second' => array(
                    array(
                        'href' => 'flot.html',
                        'lib' => 'Flot Charts',
                        'icone' => ''
                    ),
                    array(
                        'href' => 'morris.html',
                        'lib' => 'Morris.js Charts',
                        'icone' => ''
                    )
                )
            ),
            array(
                'href' => 'tables.html',
                'lib' => 'Tables',
                'icone' => 'fa-table'
            ),
            array(
                'href' => 'forms.html',
                'lib' => 'Forms',
                'icone' => 'fa-edit'
            ),
            array(
                'href' => '#',
                'lib' => 'UI Elements',
                'icone' => 'fa-wrench',
                'second' => array(
                    array(
                        'href' => 'panels-wells.html',
                        'lib' => 'Panels and Wells',
                        'icone' => ''
                    ),
                    array(
                        'href' => 'buttons.html',
                        'lib' => 'Buttons',
                        'icone' => ''
                    ),
                    array(
                        'href' => 'notifications.html',
                        'lib' => 'Notifications',
                        'icone' => ''
                    ),
                    array(
                        'href' => 'typography.html',
                        'lib' => 'Typography',
                        'icone' => ''
                    ),
                    array(
                        'href' => 'grid.html',
                        'lib' => 'Grid',
                        'icone' => ''
                    )
                )
            ),
            array(
                'href' => '#',
                'lib' => 'Multi-Level Dropdown',
                'icone' => 'fa-sitemap',
                'second' => array(
                    array(
                        'href' => '#',
                        'lib' => 'Second Level Item',
                        'icone' => ''
                    ),
                    array(
                        'href' => '#',
                        'lib' => 'Second Level Item',
                        'icone' => '',
                        'second' => array(
                            array(
                                'href' => '#',
                                'lib' => 'Third Level Item',
                                'icone' => ''
                            ),
                            array(
                                'href' => '#',
                                'lib' => 'Third Level Item',
                                'icone' => ''
                            ),
                            array(
                                'href' => '#',
                                'lib' => 'Third Level Item',
                                'icone' => ''
                            )
                        )
                    )
                )
            ),
            array(
                'href' => '#',
                'lib' => 'Sample Pages',
                'icone' => 'fa-files-o',
                'second' => array(
                    array(
                        'href' => 'blank.html',
                        'lib' => 'Blank Page',
                        'icone' => ''
                    ),
                    array(
                        'href' => 'login.html',
                        'lib' => 'Login Page',
                        'icone' => ''
                    )
                )
            ),
        );
        
        return $this->render(
                'DragoonAdminBundle:Navigation:side.html.twig',
                array(
                    'navigation' => $navigation
                )
        );
    }
}
