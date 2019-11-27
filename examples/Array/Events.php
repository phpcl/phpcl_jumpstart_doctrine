<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 *
 * @ORM\Table(name="events", indexes={@ORM\Index(name="FK_hotels", columns={"hotels_id"})})
 * @ORM\Entity
 */
class Events
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
     * @ORM\Column(name="eventKey", type="string", length=16, nullable=true, options={"fixed"=true})
     */
    private $eventkey;

    /**
     * @var string|null
     *
     * @ORM\Column(name="event_name", type="string", length=128, nullable=true)
     */
    private $eventName;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="event_date", type="datetime", nullable=true)
     */
    private $eventDate;

    /**
     * @var \Hotels
     *
     * @ORM\ManyToOne(targetEntity="Hotels")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="hotels_id", referencedColumnName="id")
     * })
     */
    private $hotels;


}
