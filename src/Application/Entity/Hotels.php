<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Hotels
 *
 * @ORM\Table(name="hotels", uniqueConstraints={@ORM\UniqueConstraint(name="hotels_prop_key", columns={"propertyKey"})})
 * @ORM\Entity("Application\Entity\Hotels")
 */
class Hotels
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="propertyKey", type="string", length=16, nullable=true, options={"fixed"=true})
     */
    private $propertykey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="hotelName", type="string", length=128, nullable=true)
     */
    private $hotelName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="streetAddress", type="string", length=128, nullable=true)
     */
    private $streetaddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=128, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="stateProvince", type="string", length=128, nullable=true)
     */
    private $stateprovince;

    /**
     * @var string|null
     *
     * @ORM\Column(name="locality", type="string", length=128, nullable=true)
     */
    private $locality;

    /**
     * @var string|null
     *
     * @ORM\Column(name="country", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postalCode", type="string", length=24, nullable=true)
     */
    private $postalcode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="latitude", type="decimal", precision=8, scale=4, nullable=true)
     */
    private $latitude;

    /**
     * @var string|null
     *
     * @ORM\Column(name="longitude", type="decimal", precision=8, scale=4, nullable=true)
     */
    private $longitude;

    // getters
    public function getId()          { return $this->id; }
    public function getPropertyKey() { return $this->propertyKey; }
    public function getHotelName()   { return $this->hotelName; }
    public function getCity()        { return $this->city; }
    public function getCountry()     { return $this->country; }

    // output
    public function display()
    {
        $output = '';
        $vars = get_object_vars($this);
        foreach ($vars as $name => $value) {
            $output .= sprintf('%16s : %s' . PHP_EOL, ucfirst($name), $value);
        }
        return $output;
    }

}
