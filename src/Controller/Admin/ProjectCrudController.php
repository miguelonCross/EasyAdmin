<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use App\Form\InvoiceType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Image;
use Symfony\Component\Validator\Constraints\Date;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            // ...
            ->setPermission(Action::DETAIL, 'IS_AUTHENTICATED_ANONYMOUSLY')
        ;
    }

    public function configureFields(string $pageName): iterable
    {
        if (Crud::PAGE_INDEX === $pageName) {
            yield TextField::new('name','Nombre');
            yield TextField::new('email','email');
            yield ImageField::new('image', 'Imagen')->setBasePath('images/project');
            yield BooleanField::new('isFinished','Terminado');

        }

        if (Crud::PAGE_EDIT == $pageName){
            yield FormField::addPanel('Datos del proyecto');
            yield TextField::new('name','Nombre')->setColumns(4);
            yield EmailField::new('email','Email')->setColumns(4);
            yield ImageField::new('image', 'Imagen')->setUploadDir('public/images/project')->setBasePath('images/project')->setColumns(4);
            yield TextareaField::new('description', 'Descripción')->setColumns(12);
            yield BooleanField::new('isFinished', 'Terminado')->setColumns(4);
            yield DateField::new('startedAt','Fecha de inicio');
            yield DateField::new('finishedAt','Fecha finalización');
            yield BooleanField::new('isOnline','Online');
            yield AssociationField::new('invoice', 'Invoice');
        }

        if (Crud::PAGE_NEW == $pageName){
            yield FormField::addPanel('Cliente')->setColumns(6);
            yield FormField::addPanel('Facturas')->setFormType(InvoiceType::class);
        }

        if (Crud::PAGE_DETAIL == $pageName){
            yield FormField::addPanel('Datos del proyecto');
            yield TextField::new('name','Nombre')->setColumns(4);
            yield EmailField::new('email','Email')->setColumns(4);
            yield ImageField::new('image', 'Imagen')->setUploadDir('public/images/project')->setBasePath('images/project')->setColumns(4);
            yield TextareaField::new('description', 'Descripción')->setColumns(12);
            yield BooleanField::new('isFinished', 'Terminado')->setColumns(4);
            yield DateField::new('startedAt','Fecha de inicio');
            yield DateField::new('finishedAt','Fecha finalización');
            yield BooleanField::new('isOnline','Online');
            yield AssociationField::new('invoice', 'Invoice');
        }
    }

}
