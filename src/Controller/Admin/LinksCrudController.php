<?php

namespace App\Controller\Admin;

use App\Entity\Links;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class LinksCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Links::class;
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
