<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Hotels
 *
 * @ORM\Table(name="hotels", uniqueConstraints={@ORM\UniqueConstraint(name="hotels_prop_key", columns={"propertyKey"})})
 * @ORM\Entity
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
    private $hotelname;

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


}
