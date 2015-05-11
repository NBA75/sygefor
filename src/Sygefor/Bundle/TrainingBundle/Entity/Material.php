<?php
namespace Sygefor\Bundle\TrainingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Material
 *
 * @ORM\Table(name="material")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorMap({"file" = "FileMaterial", "link" = "LinkMaterial"})
 * @ORM\Entity
 */
abstract class Material
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"Default", "api.attendance"})
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Serializer\Groups({"Default", "api.attendance"})
     */
    protected $name;

    /**
     * @var Training $training
     * @ORM\ManyToOne(targetEntity="Sygefor\Bundle\TrainingBundle\Entity\Training", inversedBy="materials")
     * @ORM\JoinColumn(nullable=true)
     * @Serializer\Exclude
     */
    protected $training;

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
     * @return Material
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
     * @param \Sygefor\Bundle\TrainingBundle\Entity\Training $training
     */
    public function setTraining($training)
    {
        $this->training = $training;
    }

    /**
     * @return \Sygefor\Bundle\TrainingBundle\Entity\Training
     */
    public function getTraining()
    {
        return $this->training;
    }
}
