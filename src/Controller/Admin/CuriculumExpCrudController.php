<?php

namespace App\Controller\Admin;

use App\Entity\CuriculumExp;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CuriculumExpCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CuriculumExp::class;
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
