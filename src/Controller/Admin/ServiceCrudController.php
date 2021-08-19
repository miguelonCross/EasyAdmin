<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) {
            yield TextField::new('name', 'Nombre');
            yield NumberField::new('code','Código');
            yield TextareaField::new('description', 'Descripción');
            yield NumberField::new('price', 'Precio');
            yield AssociationField::new('serviceBudgets', 'Servicios');
        }

        if (Crud::PAGE_NEW === $pageName || Crud::PAGE_EDIT === $pageName) {
            yield TextField::new('name', 'Nombre');
            yield NumberField::new('code','Código');
            yield TextareaField::new('description', 'Descripción');
            yield NumberField::new('price', 'Precio');
            yield AssociationField::new('serviceBudgets', 'Servicios');
        }

    }
}
