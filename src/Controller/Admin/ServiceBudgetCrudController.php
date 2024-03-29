<?php

namespace App\Controller\Admin;

use App\Entity\ServiceBudget;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceBudgetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceBudget::class;
    }


    /*public function configureFields(string $pageName): iterable
    {

    }
    */
}
