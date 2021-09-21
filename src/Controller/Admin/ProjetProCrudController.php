<?php

namespace App\Controller\Admin;

use App\Entity\ProjetPro;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjetProCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ProjetPro::class;
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
