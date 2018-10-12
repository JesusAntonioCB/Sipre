<?php

namespace UtExam\ProEvalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Imagen
 *
 * @ORM\Table(name="imagen")
 * @ORM\Entity(repositoryClass="UtExam\ProEvalBundle\Repository\ImagenRepository")
 */
class Imagen
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
     * @ORM\ManyToMany(targetEntity="Respuestas", inversedBy="Imagen")
     * @ORM\JoinTable(name="imagen_respuestas",
     *     joinColumns={
     *     @ORM\JoinColumn(name="imagen_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="respuestas_id", referencedColumnName="id")
     *   }
     * )
     */
    private $respuestas;

    /**
     * @ORM\ManyToMany(targetEntity="Pregunta", inversedBy="Imagen")
     * @ORM\JoinTable(name="imagen_pregunta",
     *     joinColumns={
     *     @ORM\JoinColumn(name="imagen_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pregunta_id", referencedColumnName="id")
     *   }
     * )
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
     * @return Imagen
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
     * @return Imagen
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
