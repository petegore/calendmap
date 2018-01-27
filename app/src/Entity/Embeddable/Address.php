<?php

namespace App\Entity\Embeddable;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class Address
{
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $address1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $address4;

    /**
     * @ORM\Column(type="string", length=5)
     */
    protected $postalCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $city;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    protected $zipCode;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $region;

    /**
     * @ORM\Column(type="string", length=50)
     */
    protected $country;

    /**
     * @ORM\Embedded(class = "App\Entity\Embeddable\GpsCoordinates")
     *
     * @var GpsCoordinates
     */
    protected $gpsCoordinates;

    /**
     * Address constructor.
     *
     * @param string         $address1
     * @param string         $postalCode
     * @param string         $city
     * @param string         $country
     * @param GpsCoordinates $coordinates
     * @param string|null    $address2
     * @param string|null    $address3
     * @param string|null    $address4
     * @param string|null    $zipCode
     * @param string|null    $region
     *
     * @return Address
     */
    public function __construct(
        $address1,
        $postalCode,
        $city,
        $country,
        GpsCoordinates $coordinates,
        $address2 = null,
        $address3 = null,
        $address4 = null,
        $zipCode = null,
        $region = null
    ) {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->address4 = $address4;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->region = $region;
        $this->country = $country;
        $this->gpsCoordinates = $coordinates;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @param mixed $address1
     *
     * @throws \LogicException
     * @return Address
     */
    public function setAddress1($address1)
    {
        if ($address1 === null) {
            throw new \LogicException("Address1 cannot be set to null.");
        }
        $this->address1 = $address1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @param mixed $address2
     * @return Address
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * @param mixed $address3
     * @return Address
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress4()
    {
        return $this->address4;
    }

    /**
     * @param mixed $address4
     * @return Address
     */
    public function setAddress4($address4)
    {
        $this->address4 = $address4;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param mixed $postalCode
     * @throws \LogicException
     * @return Address
     */
    public function setPostalCode($postalCode)
    {
        if ($postalCode === null) {
            throw new \LogicException("Postal code cannot be set to null.");
        }
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @throws \LogicException
     * @return Address
     */
    public function setCity($city)
    {
        if ($city === null) {
            throw new \LogicException("City cannot be set to null.");
        }
        $this->city = $city;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     * @return Address
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     * @return Address
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     * @throws \LogicException
     * @return Address
     */
    public function setCountry($country)
    {
        if ($country === null) {
            throw new \LogicException("Country cannot be set to null.");
        }
        $this->country = $country;

        return $this;
    }

    /**
     * @return GpsCoordinates
     */
    public function getGpsCoordinates(): GpsCoordinates
    {
        return $this->gpsCoordinates;
    }

    /**
     * @param GpsCoordinates $gpsCoordinates
     */
    public function setGpsCoordinates(GpsCoordinates $gpsCoordinates): void
    {
        $this->gpsCoordinates = $gpsCoordinates;
    }
}
