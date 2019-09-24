<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Signup
 *
 * @ORM\Table(name="signup")
 * @ORM\Entity("Application\Entity\Signup")
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
     * @ORM\ManyToOne(targetEntity="Application\Entity\Events")
     */
    private $event;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Users")
     */
    private $user;

    // getters
    public function getEvent()
    {
        return $this->event;
    }
    public function getUser()
    {
        return $this->user;
    }
    // setters
    public function setEvent(Events $event)
    {
        $this->event = $event;
    }
    public function setUser(Users $user)
    {
        $this->user = $user;
    }

    // output
    public function display()
    {
        $output = '';
        $output .= "\nAttendee: " . $this->getUser()->getFullName();
        $output .= "\nEvent Info:\n";
        $output .= $this->getEvent()->display();
        return $output;
    }
}
