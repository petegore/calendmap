<?php

namespace App\Entity\Embeddable;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable
 */
class GpsCoordinates
{
    /**
     * @ORM\Column(type="float")
     */
    protected $latitude;

    /**
     * @ORM\Column(type="float")
     */
    protected $longitude;

    /**
     * @ORM\Column(type="float")
     */
    protected $altitude;

    /**
     * GpsCoordinates constructor.
     *
     * @param float $latitude
     * @param float $longitude
     * @param float $altitude
     *
     * @return GpsCoordinates
     */
    public function __construct($latitude, $longitude, $altitude = 0.0)
    {
        $this->latitude = $altitude;
        $this->longitude = $longitude;
        $this->altitude = $altitude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     *
     * @throws \LogicException
     * @return GpsCoordinates
     */
    public function setLatitude($latitude)
    {
        if ($latitude === null) {
            throw new \LogicException("Latitude cannot be set to null.");
        }
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     *
     * @throws \LogicException
     * @return GpsCoordinates
     */
    public function setLongitude($longitude)
    {
        if ($longitude === null) {
            throw new \LogicException("Longitude cannot be set to null.");
        }
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAltitude()
    {
        return $this->altitude;
    }

    /**
     * @param mixed $altitude
     *
     * @throws \LogicException
     * @return GpsCoordinates
     */
    public function setAltitude($altitude)
    {
        if ($altitude === null) {
            throw new \LogicException("Altitude cannot be set to null.");
        }
        $this->altitude = $altitude;

        return $this;
    }
}
