<?php

namespace ASPhotography\AdminBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * UserRole
 *
 * @ORM\Table(name="user_roles")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class UserRole implements RoleInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=100)
     */
    private $role;

    /**
     * @ORM\ManyToMany(targetEntity="\ASPhotography\AdminBundle\Entity\AdminUser", mappedBy="roles")
     */
    private $adminUsers;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime")
     */
    private $dateCreated;

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->setDateCreated( new \DateTime() );
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adminUsers = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return UserRole
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     *
     * @return UserRole
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return UserRole
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Add adminUser
     *
     * @param \ASPhotography\AdminBundle\Entity\AdminUser $adminUser
     *
     * @return UserRole
     */
    public function addAdminUser(AdminUser $adminUser)
    {
        $this->adminUsers[] = $adminUser;

        return $this;
    }

    /**
     * Remove adminUser
     *
     * @param \ASPhotography\AdminBundle\Entity\AdminUser $adminUser
     */
    public function removeAdminUser(AdminUser $adminUser)
    {
        $this->adminUsers->removeElement($adminUser);
    }

    /**
     * Get adminUsers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdminUsers()
    {
        return $this->adminUsers;
    }
}
