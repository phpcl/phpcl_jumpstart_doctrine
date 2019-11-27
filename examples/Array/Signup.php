<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Signup
 *
 * @ORM\Table(name="signup", indexes={@ORM\Index(name="FK_users", columns={"users_id"}), @ORM\Index(name="FK_events", columns={"events_id"})})
 * @ORM\Entity
 */
class Signup
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
     * @var \Events
     *
     * @ORM\ManyToOne(targetEntity="Events")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="events_id", referencedColumnName="id")
     * })
     */
    private $events;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;


}
