<?php

namespace UtExam\ProEvalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Texto
 *
 * @ORM\Table(name="texto")
 * @ORM\Entity(repositoryClass="UtExam\ProEvalBundle\Repository\TextoRepository")
 */
class Texto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Escrito", type="string", length=255)
     */
    private $escrito;

    /**
     * @var string
     *
     * @ORM\Column(name="correcto", type="string", length=255)
     */
    private $correcto;

    /**
     * @ORM\ManyToMany(targetEntity="Respuestas", inversedBy="Texto")
     * @ORM\JoinTable(name="texto_respuestas",
     *     joinColumns={
     *     @ORM\JoinColumn(name="texto_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $respuestas;
    public function __construct()
    {
        $this->respuestas = new ArrayCollection();
    }



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set escrito.
     *
     * @param string $escrito
     *
     * @return Texto
     */
    public function setEscrito($escrito)
    {
        $this->escrito = $escrito;

        return $this;
    }

    /**
     * Get escrito.
     *
     * @return string
     */
    public function getEscrito()
    {
        return $this->escrito;
    }

    /**
     * Set correcto.
     *
     * @param string $correcto
     *
     * @return Texto
     */
    public function setCorrecto($correcto)
    {
        $this->correcto = $correcto;

        return $this;
    }

    /**
     * Get correcto.
     *
     * @return string
     */
    public function getCorrecto()
    {
        return $this->correcto;
    }
}
