<?php

namespace  AdminBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class GameAdmin extends AbstractAdmin {

    protected $baseRouteName = 'admin_games';

    protected $baseRoutePattern = 'games';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array(
                'label'    => 'Nom de la partie'
            ))
            ->add('town', null, array(
                'label'    => 'Ville'
            ))
            ->add('date', DateTimeType::class, array(
                'label'    => 'Date du match'
            ))
            ->add('nbrMaxPlayers', null, array(
                'label'    => 'Nombre de joueurs maximum'
            ))
            ->add('users', null, array(
                'label'    => 'Joueur'
            ))
            ->add('organisator', null, array(
                'label'    => 'Organisateur du match'
            ));

    }
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Nom de la partie'))
            ->add('town', null, array('label' => 'Ville'))
            ->add('date', null, array('label' => 'Date',))
            ->add('nbrMaxPlayers', null, array('label' => 'Nombre de joueurs maximum'))
            ->add('users', null, array('label' => 'Joueur'))
            ->add('organisator', null, array('label' => 'Organisateur du match'));
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        unset($this->listModes['mosaic']);
        $listMapper
            ->addIdentifier('id', null, array('label' => 'Id'))
            ->addIdentifier('name', null, array('label' => 'Nom de la partie'))
            ->addIdentifier('town', null, array('label' => 'Ville'))
            ->addIdentifier('date', null, array('label' => 'Date'))
            ->addIdentifier('users', null, array('label' => 'Joueur'))
            ->addIdentifier('organisator', null, array('label' => 'Organisateur du match'))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => [],
                    'delete' => [],
                )
            ));
    }
}