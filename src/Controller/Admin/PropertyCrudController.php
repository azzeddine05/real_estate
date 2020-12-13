<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Form\PropertyImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Configurator\TextEditorConfigurator;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
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
            NumberField::new('priceAsking'),
            NumberField::new('priceEstimated'),
            NumberField::new('area'),
            CollectionField::new('images', 'Images de bien')
                ->setEntryType(PropertyImageType::class)
                ->onlyOnForms(),
            ChoiceField::new('propertyType', 'Type de bien')->setChoices(
                [
                    'Maison' => 'HOME',
                    'Appartement' => 'APARTMENT',
                    'Villa' => 'VILLA',
                    'Garage' => 'GARAGE'
                ]
            ),
            ChoiceField::new('transaction', 'Type de transaction')->setChoices(
                [
                    'Acheter' => 'PURCHASE',
                    'Vente' => 'SALE',
                    'Loué' => 'RENTED',
                    'Viagé' => 'VIAGER',
                    'Vente publique' => 'PUBLIC_SALE'
                ]
            ),
            TextField::new('street', 'Rue'),
            NumberField::new('number', 'Numéro de la rue'),
            NumberField::new('zipCode', 'Code Postale'),
            AssociationField::new('city', 'Ville'),
            NumberField::new('livingSpace', 'Surface habiable'),
            NumberField::new('roomNumber', 'Nombre de chambre'),
            ChoiceField::new('buildingState', 'Etat du batiment')->setChoices(
                [
                    'Rénové' => 'RENOVATED',
                    'Neuf' => 'NEW',
                    'En bon état' => 'GOOD_STATE',
                ]
            ),
            ChoiceField::new('viewType', 'Type de vue')->setChoices(
                [
                    'Vis-a-vis' => 'ROLE_ADMIN',
                    'Vue dégagé' => 'ROLE_USER'
                ]
            ),
            ChoiceField::new('houseOrientation', 'Orientation de la maison')->setChoices(
                [
                    'Nord' => 'NORTH',
                    'Nord-est' => 'NORTHEAST',
                    'Ouest' => 'WEST'
                ]
            ),
            ChoiceField::new('gardenOrientation', 'Orientation du jardin')->setChoices(
                [
                    'Nord' => 'NORTH',
                    'Nord-est' => 'NORTHEAST',
                    'Ouest' => 'WEST'
                ]
            ),
            ChoiceField::new('energeticPerformance', 'performace énergétique ')->setChoices(
                [
                    'a' => 'A',
                    'B' => 'B',
                    'C' => 'C'
                ]
            ),
        ];
    }

}
