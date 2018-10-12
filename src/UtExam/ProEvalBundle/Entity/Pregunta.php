<?php

namespace UtExam\ProEvalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pregunta
 *
 * @ORM\Table(name="pregunta")
 * @ORM\Entity(repositoryClass="UtExam\ProEvalBundle\Repository\PreguntaRepository")
 */
class Pregunta
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
     * @ORM\ManyToOne(targetEntity="Materias", inversedBy="Pregunta")
     * @ORM\JoinColumn(name="materias_id", referencedColumnName="id")
     */
    private $materias;

    /**
     * @ORM\ManyToOne(targetEntity="TipoPregunta", inversedBy="Pregunta")
     * @ORM\JoinColumn(name="tipoPregunta_id", referencedColumnName="id")
     */
    private $tipoPregunta;

    /**
     * @ORM\ManyToOne(targetEntity="Video", inversedBy="Pregunta")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="Audio", inversedBy="Pregunta")
     * @ORM\JoinColumn(name="audio_id", referencedColumnName="id")
     */
    private $audio;

    /**
     * @ORM\ManyToMany(targetEntity="Imagen", inversedBy="Pregunta")
     * @ORM\JoinTable(name="Pregunta_Imagen",
     *     joinColumns={
     *     @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="imagen_id", referencedColumnName="id")
     *   }
     * )
     */
    private $imagen;

    /**
     * @ORM\ManyToMany(targetEntity="Respuestas", inversedBy="Pregunta")
     * @ORM\JoinTable(name="pregunta_respuestas",
     *     joinColumns={
     *     @ORM\JoinColumn(name="Pregunta_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Respuestas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $respuestas;

    public function __construct()
    {
        $this->imagen = new ArrayCollection();
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
     * @return Pregunta
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
}
