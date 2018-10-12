<?php

namespace UtExam\ProEvalBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Respuestas
 *
 * @ORM\Table(name="respuestas")
 * @ORM\Entity(repositoryClass="UtExam\ProEvalBundle\Repository\RespuestasRepository")
 */
class Respuestas
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
     * @ORM\ManyToMany(targetEntity="Video", inversedBy="Respuestas")
     * @ORM\JoinTable(name="respuestas_video",
     *     joinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="video_id", referencedColumnName="id")
     *   }
     * )
     */
    private $video;

    /**
     * @ORM\ManyToMany(targetEntity="Imagen", inversedBy="Respuestas")
     * @ORM\JoinTable(name="respuestas_imagen",
     *     joinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="imagen_id", referencedColumnName="id")
     *   }
     * )
     */
    private $imagen;

    /**
     * @ORM\ManyToMany(targetEntity="Audio", inversedBy="Respuestas")
     * @ORM\JoinTable(name="respuestas_audio",
     *     joinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="audio_id", referencedColumnName="id")
     *   }
     * )
     */
    private $audio;

    /**
     * @ORM\ManyToMany(targetEntity="Texto", inversedBy="Respuestas")
     * @ORM\JoinTable(name="respuestas_texto",
     *     joinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="texto_id", referencedColumnName="id")
     *   }
     * )
     */
    private $texto;

    /**
     * @ORM\ManyToMany(targetEntity="Pregunta", inversedBy="Respuestas")
     * @ORM\JoinTable(name="respuestas_pregunta",
     *     joinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id")
     *   }
     * )
     */
    private $pregunta;

    public function __construct()
    {
        $this->imagen = new ArrayCollection();
        $this->texto = new ArrayCollection();
        $this->pregunta = new ArrayCollection();
        $this->audio = new ArrayCollection();
        $this->video = new ArrayCollection();
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
}
