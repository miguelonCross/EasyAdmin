<?php

namespace App\Controller\Admin;

use App\Entity\Budget;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BudgetCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Budget::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if(Crud::PAGE_INDEX === $pageName){
            yield NumberField::new('code', 'Codigo');
            yield TextareaField::new('description', 'Descripcion');
            yield NumberField::new('description', 'Precio propuesto');
            yield AssociationField::new('serviceBudgets','Servicios');
            yield AssociationField::new('client','Cliente');
            yield AssociationField::new('invoice', 'Factura');

        }
    }

}
