<?php

namespace App\Entity;

use App\Repository\ZipCodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZipCodeRepository::class)
 */
class ZipCode
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
    private $label;

    /**
     * @ORM\OneToMany(targetEntity="Province", mappedBy="zipcode")
     */
    private $provinces;

    /**
     * @ORM\ManyToOne(targetEntity="Region", inversedBy="zipcodes")
     */
    private $region;

    public function __construct()
    {
        $this->provinces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection|Province[]
     */
    public function getProvinces(): Collection
    {
        return $this->provinces;
    }

    public function addProvince(Province $province): self
    {
        if (!$this->provinces->contains($province)) {
            $this->provinces[] = $province;
            $province->setZipcode($this);
        }

        return $this;
    }

    public function removeProvince(Province $province): self
    {
        if ($this->provinces->removeElement($province)) {
            // set the owning side to null (unless already changed)
            if ($province->getZipcode() === $this) {
                $province->setZipcode(null);
            }
        }

        return $this;
    }

    public function getRegion(): ?Region
    {
        return $this->region;
    }

    public function setRegion(?Region $region): self
    {
        $this->region = $region;

        return $this;
    }
}
