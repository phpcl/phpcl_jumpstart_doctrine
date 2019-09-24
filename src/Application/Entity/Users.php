<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="users_user_key", columns={"userKey"})})
 * @ORM\Entity("Application\Entity\Users")
 */
class Users
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
     * @ORM\Column(name="userKey", type="string", length=16, nullable=true, options={"fixed"=true})
     */
    private $userkey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=2, nullable=true, options={"fixed"=true})
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="first_name", type="string", length=24, nullable=true)
     */
    private $firstName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="middle_name", type="string", length=24, nullable=true)
     */
    private $middleName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="string", length=24, nullable=true)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name_suffix", type="string", length=3, nullable=true, options={"fixed"=true})
     */
    private $nameSuffix;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=24, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=true)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="socMedia", type="string", length=128, nullable=true)
     */
    private $socmedia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="streetAddress", type="string", length=128, nullable=true)
     */
    private $streetaddress;

    /**
     * @var string|null
     *
     * @ORM\Column(name="buildingName", type="string", length=24, nullable=true)
     */
    private $buildingname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="floor", type="string", length=8, nullable=true)
     */
    private $floor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="roomAptCondoFlat", type="string", length=8, nullable=true)
     */
    private $roomaptcondoflat;

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

    /**
     * @var string|null
     *
     * @ORM\Column(name="username", type="string", length=24, nullable=true)
     */
    private $username;

    /**
     * @var string|null
     *
     * @ORM\Column(name="oauth2", type="string", length=128, nullable=true)
     */
    private $oauth2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string|null
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $gender;

    /**
     * @var string|null
     *
     * @ORM\Column(name="dateOfBirth", type="string", length=20, nullable=true, options={"fixed"=true})
     */
    private $dateofbirth;

    /**
     * @var string|null
     *
     * @ORM\Column(name="partner", type="string", length=1, nullable=true, options={"fixed"=true})
     */
    private $partner;

    // getters/setters
    public function getFullName()
    {
        $name = $this->firstName ?? '';
        $name .= ($this->middleName) ? ' ' . $this->middleName . ' ' : '';
        $name .= ' ' . $this->lastName;
        return $name;
    }

    // output
    public function display()
    {
        $output = '';
        $vars = get_object_vars($this);
        foreach ($vars as $name => $value) {
            if ($name != 'password') {
                $output .= sprintf('%16s : %s' . PHP_EOL, ucfirst($name), $value);
            }
        }
        return $output;
    }

}
