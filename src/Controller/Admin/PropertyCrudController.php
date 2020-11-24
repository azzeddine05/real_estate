<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Configurator\TextEditorConfigurator;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PropertyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Property::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title'),
            TextEditorField::new('description'),
            //ImageField::new('imageFile')->setFormType(VichImageType::class),
            AssociationField::new('propertyType'),
            ChoiceField::new('transaction', 'Type de transaction')->setChoices(
                [
                    'Acheter' => 'PURCHASE',
                    'Vente' => 'SALE',
                    'Loué' => 'RENTED',
                    'Viagé' => 'VIAGER',
                    'Vente publique' => 'PUBLIC_SALE'
                ]
            ),
            ChoiceField::new('buildingState', 'Etat du batiment')->setChoices(
                [
                    'Rénové' => 'RENOVATED',
                    'Neuf' => 'NEW',
                    'En bon état' => 'GOOD_STATE',
                ]
            ),
            ChoiceField::new('viewType', 'Type de vue')->setChoices(
                [
                    'vis-a-vis' => 'ROLE_ADMIN',
                    'vue dégagé' => 'ROLE_USER'
                ]
            ),
        ];
    }

}
