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

    /**
     * Set materias.
     *
     * @param \UtExam\ProEvalBundle\Entity\Materias|null $materias
     *
     * @return Pregunta
     */
    public function setMaterias(\UtExam\ProEvalBundle\Entity\Materias $materias = null)
    {
        $this->materias = $materias;

        return $this;
    }

    /**
     * Get materias.
     *
     * @return \UtExam\ProEvalBundle\Entity\Materias|null
     */
    public function getMaterias()
    {
        return $this->materias;
    }

    /**
     * Set tipoPregunta.
     *
     * @param \UtExam\ProEvalBundle\Entity\TipoPregunta|null $tipoPregunta
     *
     * @return Pregunta
     */
    public function setTipoPregunta(\UtExam\ProEvalBundle\Entity\TipoPregunta $tipoPregunta = null)
    {
        $this->tipoPregunta = $tipoPregunta;

        return $this;
    }

    /**
     * Get tipoPregunta.
     *
     * @return \UtExam\ProEvalBundle\Entity\TipoPregunta|null
     */
    public function getTipoPregunta()
    {
        return $this->tipoPregunta;
    }

    /**
     * Set video.
     *
     * @param \UtExam\ProEvalBundle\Entity\Video|null $video
     *
     * @return Pregunta
     */
    public function setVideo(\UtExam\ProEvalBundle\Entity\Video $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video.
     *
     * @return \UtExam\ProEvalBundle\Entity\Video|null
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set audio.
     *
     * @param \UtExam\ProEvalBundle\Entity\Audio|null $audio
     *
     * @return Pregunta
     */
    public function setAudio(\UtExam\ProEvalBundle\Entity\Audio $audio = null)
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * Get audio.
     *
     * @return \UtExam\ProEvalBundle\Entity\Audio|null
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * Add imagen.
     *
     * @param \UtExam\ProEvalBundle\Entity\Imagen $imagen
     *
     * @return Pregunta
     */
    public function addImagen(\UtExam\ProEvalBundle\Entity\Imagen $imagen)
    {
        $this->imagen[] = $imagen;

        return $this;
    }

    /**
     * Remove imagen.
     *
     * @param \UtExam\ProEvalBundle\Entity\Imagen $imagen
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeImagen(\UtExam\ProEvalBundle\Entity\Imagen $imagen)
    {
        return $this->imagen->removeElement($imagen);
    }

    /**
     * Get imagen.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Add respuesta.
     *
     * @param \UtExam\ProEvalBundle\Entity\Respuestas $respuesta
     *
     * @return Pregunta
     */
    public function addRespuesta(\UtExam\ProEvalBundle\Entity\Respuestas $respuesta)
    {
        $this->respuestas[] = $respuesta;

        return $this;
    }

    /**
     * Remove respuesta.
     *
     * @param \UtExam\ProEvalBundle\Entity\Respuestas $respuesta
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeRespuesta(\UtExam\ProEvalBundle\Entity\Respuestas $respuesta)
    {
        return $this->respuestas->removeElement($respuesta);
    }

    /**
     * Get respuestas.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }
}
