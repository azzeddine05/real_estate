<?php

namespace App\Entity;

use App\Repository\RegionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegionRepository::class)
 */
class Region
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="ZipCode", mappedBy="region")
     */
    private $zipcodes;


    public function __construct()
    {
        $this->zipcodes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|ZipCode[]
     */
    public function getZipcodes(): Collection
    {
        return $this->zipcodes;
    }

    public function addZipcode(ZipCode $zipcode): self
    {
        if (!$this->zipcodes->contains($zipcode)) {
            $this->zipcodes[] = $zipcode;
            $zipcode->setRegion($this);
        }

        return $this;
    }

    public function removeZipcode(ZipCode $zipcode): self
    {
        if ($this->zipcodes->removeElement($zipcode)) {
            // set the owning side to null (unless already changed)
            if ($zipcode->getRegion() === $this) {
                $zipcode->setRegion(null);
            }
        }

        return $this;
    }

}
