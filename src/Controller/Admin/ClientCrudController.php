<?php

namespace App\Controller\Admin;

use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if(Crud::PAGE_INDEX === $pageName){
            yield TextField::new('name', 'Name');
            yield TextField::new('nif', 'Nif');
            yield EmailField::new('email', 'Email');
            yield TelephoneField::new('phoneNumber', 'Telefono');

        }

        if (Crud::PAGE_EDIT === $pageName){
            yield TextField::new('name', 'Name');
            yield TextField::new('nif', 'Nif');
            yield EmailField::new('email', 'Email');
            yield TelephoneField::new('phoneNumber', 'Telefono');
            yield TelephoneField::new('phoneNumber2', 'Telefono');
            yield TextField::new('address', 'Dirección');
            yield FormField::addPanel('Facturas');
            yield AssociationField::new('invoices', 'Numero');

        }

        if (Crud::PAGE_NEW === $pageName){
            yield TextField::new('name', 'Name');
            yield TextField::new('nif', 'Nif');
            yield EmailField::new('email', 'Email');
            yield TelephoneField::new('phoneNumber', 'Telefono');
            yield TelephoneField::new('phoneNumber2', 'Telefono');
            yield TextField::new('address', 'Dirección');
            yield FormField::addPanel('Facturas');
            yield AssociationField::new('invoices', 'Numero');

        }

        if (Crud::PAGE_DETAIL === $pageName){
            yield TextField::new('name', 'Name');
            yield TextField::new('nif', 'Nif');
            yield EmailField::new('email', 'Email');
            yield TelephoneField::new('phoneNumber', 'Telefono');
            yield TelephoneField::new('phoneNumber2', 'Telefono');
            yield TextField::new('address', 'Dirección');
            yield FormField::addPanel('Facturas');
            yield AssociationField::new('invoices', 'Numero');

        }
    }
}
