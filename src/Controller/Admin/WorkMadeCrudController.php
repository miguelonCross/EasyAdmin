<?php

namespace App\Controller\Admin;

use App\Entity\WorkMade;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class WorkMadeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return WorkMade::class;
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
