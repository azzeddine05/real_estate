<?php

namespace App\Entity;

use App\Repository\PropertyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * @ORM\Entity(repositoryClass=PropertyRepository::class)
 * @Vich\Uploadable
 * @UniqueEntity("title")
 */
class Property
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceAsking;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceEstimated;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $area;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $livingSpace;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $roomNumber;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bathrooms;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garden;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $gardenSize;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yearsConstruction;


    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $facade;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cellar;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $garage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $garageSize;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $parkingSpaces;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buildingState;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $renovationYear;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $transaction;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $viewType;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $houseOrientation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $gardenOrientation;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $CalmNeighborhood;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $energeticPerformance;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ElectricSolarPanel;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $SolarPanelHeater;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $terrace;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $TerraceSize;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $SwimmingPool;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="PropertyType", inversedBy="property")
     */
    private $propertyType;

    /**
     * @ORM\OneToMany(targetEntity=PropertyImage::class, mappedBy="property", cascade={"persist", "remove"})
     */
    private $propertyImages;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;


    public function __construct()
    {
        $this->propertyImages = new ArrayCollection();
        $this->createdAt = new \DateTime('now');
        $this->updatedAt = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getArea(): ?float
    {
        return $this->area;
    }

    public function setArea(float $area): self
    {
        $this->area = $area;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPropertyType(): ?PropertyType
    {
        return $this->propertyType;
    }

    public function setPropertyType(?PropertyType $propertyType): self
    {
        $this->propertyType = $propertyType;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getTitle();
    }

    public function getViewType(): ?string
    {
        return $this->viewType;
    }

    public function setViewType(string $viewType): self
    {
        $this->viewType = $viewType;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(int $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getLivingSpace(): ?int
    {
        return $this->livingSpace;
    }

    public function setLivingSpace(int $livingSpace): self
    {
        $this->livingSpace = $livingSpace;

        return $this;
    }

    public function getRoomNumber(): ?int
    {
        return $this->roomNumber;
    }

    public function setRoomNumber(int $roomNumber): self
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    public function getBathrooms(): ?int
    {
        return $this->bathrooms;
    }

    public function setBathrooms(int $bathrooms): self
    {
        $this->bathrooms = $bathrooms;

        return $this;
    }

    public function getGarden(): ?bool
    {
        return $this->garden;
    }

    public function setGarden(bool $garden): self
    {
        $this->garden = $garden;

        return $this;
    }

    public function getGardenSize(): ?int
    {
        return $this->gardenSize;
    }

    public function setGardenSize(int $gardenSize): self
    {
        $this->gardenSize = $gardenSize;

        return $this;
    }

    public function getYearsConstruction(): ?int
    {
        return $this->yearsConstruction;
    }

    public function setYearsConstruction(int $yearsConstruction): self
    {
        $this->yearsConstruction = $yearsConstruction;

        return $this;
    }

    public function getFacade(): ?int
    {
        return $this->facade;
    }

    public function setFacade(int $facade): self
    {
        $this->facade = $facade;

        return $this;
    }

    public function getCellar(): ?bool
    {
        return $this->cellar;
    }

    public function setCellar(bool $cellar): self
    {
        $this->cellar = $cellar;

        return $this;
    }

    public function getGarage(): ?bool
    {
        return $this->garage;
    }

    public function setGarage(bool $garage): self
    {
        $this->garage = $garage;

        return $this;
    }

    public function getGarageSize(): ?int
    {
        return $this->garageSize;
    }

    public function setGarageSize(int $garageSize): self
    {
        $this->garageSize = $garageSize;

        return $this;
    }

    public function getParkingSpaces(): ?int
    {
        return $this->parkingSpaces;
    }

    public function setParkingSpaces(int $parkingSpaces): self
    {
        $this->parkingSpaces = $parkingSpaces;

        return $this;
    }

    public function getBuildingState(): ?string
    {
        return $this->buildingState;
    }

    public function setBuildingState(string $buildingState): self
    {
        $this->buildingState = $buildingState;

        return $this;
    }

    public function getRenovationYear(): ?int
    {
        return $this->renovationYear;
    }

    public function setRenovationYear(int $renovationYear): self
    {
        $this->renovationYear = $renovationYear;

        return $this;
    }

    public function getTransaction(): ?string
    {
        return $this->transaction;
    }

    public function setTransaction(string $transaction): self
    {
        $this->transaction = $transaction;

        return $this;
    }

    public function getPriceAsking(): ?float
    {
        return $this->priceAsking;
    }

    public function setPriceAsking(float $priceAsking): self
    {
        $this->priceAsking = $priceAsking;

        return $this;
    }

    public function getPriceEstimated(): ?float
    {
        return $this->priceEstimated;
    }

    public function setPriceEstimated(float $priceEstimated): self
    {
        $this->priceEstimated = $priceEstimated;

        return $this;
    }

    public function getHouseOrientation(): ?string
    {
        return $this->houseOrientation;
    }

    public function setHouseOrientation(string $houseOrientation): self
    {
        $this->houseOrientation = $houseOrientation;

        return $this;
    }

    public function getGardenOrientation(): ?string
    {
        return $this->gardenOrientation;
    }

    public function setGardenOrientation(string $gardenOrientation): self
    {
        $this->gardenOrientation = $gardenOrientation;

        return $this;
    }

    public function getCalmNeighborhood(): ?bool
    {
        return $this->CalmNeighborhood;
    }

    public function setCalmNeighborhood(bool $CalmNeighborhood): self
    {
        $this->CalmNeighborhood = $CalmNeighborhood;

        return $this;
    }

    public function getEnergeticPerformance(): ?string
    {
        return $this->energeticPerformance;
    }

    public function setEnergeticPerformance(string $energeticPerformance): self
    {
        $this->energeticPerformance = $energeticPerformance;

        return $this;
    }

    public function getElectricSolarPanel(): ?bool
    {
        return $this->ElectricSolarPanel;
    }

    public function setElectricSolarPanel(bool $ElectricSolarPanel): self
    {
        $this->ElectricSolarPanel = $ElectricSolarPanel;

        return $this;
    }

    public function getSolarPanelHeater(): ?bool
    {
        return $this->SolarPanelHeater;
    }

    public function setSolarPanelHeater(bool $SolarPanelHeater): self
    {
        $this->SolarPanelHeater = $SolarPanelHeater;

        return $this;
    }

    public function getTerrace(): ?bool
    {
        return $this->terrace;
    }

    public function setTerrace(bool $terrace): self
    {
        $this->terrace = $terrace;

        return $this;
    }

    public function getTerraceSize(): ?float
    {
        return $this->TerraceSize;
    }

    public function setTerraceSize(float $TerraceSize): self
    {
        $this->TerraceSize = $TerraceSize;

        return $this;
    }

    public function getSwimmingPool(): ?bool
    {
        return $this->SwimmingPool;
    }

    public function setSwimmingPool(bool $SwimmingPool): self
    {
        $this->SwimmingPool = $SwimmingPool;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|PropertyImage[]
     */
    public function getPropertyImages(): Collection
    {
        return $this->propertyImages;
    }

    public function addPropertyImage(PropertyImage $propertyImage): self
    {
        if (!$this->propertyImages->contains($propertyImage)) {
            $this->propertyImages[] = $propertyImage;
            $propertyImage->setProperty($this);
        }

        return $this;
    }

    public function removePropertyImage(PropertyImage $propertyImage): self
    {
        if ($this->propertyImages->removeElement($propertyImage)) {
            // set the owning side to null (unless already changed)
            if ($propertyImage->getProperty() === $this) {
                $propertyImage->setProperty(null);
            }
        }

        return $this;
    }
}
