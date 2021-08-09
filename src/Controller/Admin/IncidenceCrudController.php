<?php

namespace App\Controller\Admin;

use App\Entity\Incidence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class IncidenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Incidence::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
