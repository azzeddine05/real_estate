<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
        yield TextField::new('title');
        yield TextEditorField::new('description');

        if (Crud::PAGE_EDIT === $pageName || Crud::PAGE_NEW === $pageName)
            yield CollectionField::new('propertyImages')
                ->setEntryType(PropertyImageType::class)
                ->onlyOnForms();

        if (Crud::PAGE_DETAIL === $pageName)
            yield CollectionField::new('propertyImages')
                ->onlyOnDetail()
                ->setTemplatePath('property/images.html.twig');

        yield ChoiceField::new('transaction', 'Type de transaction')->setChoices(
            [
                'Acheter' => 'PURCHASE',
                'Vente' => 'SALE',
                'Loué' => 'RENTED',
                'Viagé' => 'VIAGER',
                'Vente publique' => 'PUBLIC_SALE'
            ]
        );
        yield ChoiceField::new('buildingState', 'Etat du batiment')->setChoices(
            [
                'Rénové' => 'RENOVATED',
                'Neuf' => 'NEW',
                'En bon état' => 'GOOD_STATE',
            ]
        );
        yield ChoiceField::new('viewType', 'Type de vue')->setChoices(
            [
                'vis-a-vis' => 'ROLE_ADMIN',
                'vue dégagé' => 'ROLE_USER'
            ]
        );
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->add(Crud::PAGE_INDEX, Crud::PAGE_DETAIL);
    }
}
