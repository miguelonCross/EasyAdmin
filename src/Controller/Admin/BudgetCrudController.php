<?php

namespace App\Controller\Admin;

use App\Entity\Budget;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            yield TextField::new('code', 'Codigo');
            yield TextField::new('description', 'Descripcion');

        }
    }

}
