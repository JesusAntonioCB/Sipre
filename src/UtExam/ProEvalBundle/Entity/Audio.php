<?php

namespace UtExam\ProEvalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Audio
 *
 * @ORM\Table(name="audio")
 * @ORM\Entity(repositoryClass="UtExam\ProEvalBundle\Repository\AudioRepository")
 */
class Audio
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity="Respuestas", inversedBy="Audio")
     * @ORM\JoinTable(name="audio_respuestas",
     *     joinColumns={
     *     @ORM\JoinColumn(name="audio_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $respuestas;

    /**
     * @ORM\OneToMany(targetEntity="Pregunta", mappedBy="Audio")
     */
    private $pregunta;

    public function __construct()
    {
        $this->pregunta = new ArrayCollection();
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
     * Set nombre.
     *
     * @param string $nombre
     *
     * @return Audio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre.
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Audio
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
