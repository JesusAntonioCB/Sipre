<?php

namespace UtExam\ProEvalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\MaxDepth;
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
     * @ORM\ManyToOne(targetEntity="Materias", inversedBy="pregunta")
     * @ORM\JoinColumn(name="materias_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $materias;

    /**
     * @ORM\ManyToOne(targetEntity="TipoPregunta", inversedBy="pregunta")
     * @ORM\JoinColumn(name="tipoPregunta_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $tipoPregunta;

    /**
     * @ORM\ManyToOne(targetEntity="VideoPregunta", inversedBy="pregunta")
     * @ORM\JoinColumn(name="video_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $video;

    /**
     * @ORM\ManyToOne(targetEntity="ImagenPregunta", inversedBy="pregunta")
     * @ORM\JoinColumn(name="audio_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $audio;

    /**
     * @ORM\ManyToMany(targetEntity="ImagenPregunta", inversedBy="pregunta")
     * @ORM\JoinTable(name="Pregunta_ImagenPregunta",
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
     * @ORM\OneToOne(targetEntity="Respuestas")
     * @ORM\JoinColumn(name="Respuestas_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $respuestas;

    /**
     * @var string
     *
     * @ORM\Column(name="nivel", type="string", length=255)
     */
    private $nivel;

    /**
     * @ORM\OneToMany(targetEntity="preguntasinExamen", mappedBy="pregunta")
     */
    private $examen;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagen = new ArrayCollection();
        $this->examen = new ArrayCollection();
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
     * Set respuestas.
     *
     * @param \UtExam\ProEvalBundle\Entity\Respuestas|null $respuestas
     *
     * @return Pregunta
     */
    public function setRespuestas(\UtExam\ProEvalBundle\Entity\Respuestas $respuestas = null)
    {
        $this->respuestas = $respuestas;

        return $this;
    }

    /**
     * Get respuestas.
     *
     * @return \UtExam\ProEvalBundle\Entity\Respuestas|null
     */
    public function getRespuestas()
    {
        return $this->respuestas;
    }

    /**
     * Set nivel.
     *
     * @param string $nivel
     *
     * @return Pregunta
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel.
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    public function __toString(){
      return $this->escrito == null ? '' : $this->escrito;
    }


    /**
     * Add examan.
     *
     * @param \UtExam\ProEvalBundle\Entity\preguntasinExamen $examan
     *
     * @return Pregunta
     */
    public function addExaman(\UtExam\ProEvalBundle\Entity\preguntasinExamen $examan)
    {
        $this->examen[] = $examan;

        return $this;
    }

    /**
     * Remove examan.
     *
     * @param \UtExam\ProEvalBundle\Entity\preguntasinExamen $examan
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeExaman(\UtExam\ProEvalBundle\Entity\preguntasinExamen $examan)
    {
        return $this->examen->removeElement($examan);
    }

    /**
     * Get examen.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExamen()
    {
        return $this->examen;
    }

    /**
     * Set video.
     *
     * @param \UtExam\ProEvalBundle\Entity\VideoPregunta|null $video
     *
     * @return Pregunta
     */
    public function setVideo(\UtExam\ProEvalBundle\Entity\VideoPregunta $video = null)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video.
     *
     * @return \UtExam\ProEvalBundle\Entity\VideoPregunta|null
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set audio.
     *
     * @param \UtExam\ProEvalBundle\Entity\ImagenPregunta|null $audio
     *
     * @return Pregunta
     */
    public function setAudio(\UtExam\ProEvalBundle\Entity\ImagenPregunta $audio = null)
    {
        $this->audio = $audio;

        return $this;
    }

    /**
     * Get audio.
     *
     * @return \UtExam\ProEvalBundle\Entity\ImagenPregunta|null
     */
    public function getAudio()
    {
        return $this->audio;
    }

    /**
     * Add imagen.
     *
     * @param \UtExam\ProEvalBundle\Entity\ImagenPregunta $imagen
     *
     * @return Pregunta
     */
    public function addImagen(\UtExam\ProEvalBundle\Entity\ImagenPregunta $imagen)
    {
        $this->imagen[] = $imagen;

        return $this;
    }

    /**
     * Remove imagen.
     *
     * @param \UtExam\ProEvalBundle\Entity\ImagenPregunta $imagen
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeImagen(\UtExam\ProEvalBundle\Entity\ImagenPregunta $imagen)
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
}
