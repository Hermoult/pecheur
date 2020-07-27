<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PostRepository;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * @ApiResource
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\Column(type="integer")
     */
    private $Taille;

    /**
     * @ORM\Column(type="integer")
     */
    private $Poids;



    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteurNom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $auteurPrenom;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="post")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Poisson::class, inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $poisson;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaille(): ?int
    {
        return $this->Taille;
    }

    public function setTaille(int $Taille): self
    {
        $this->Taille = $Taille;

        return $this;
    }

    public function getPoids(): ?int
    {
        return $this->Poids;
    }

    public function setPoids(int $Poids): self
    {
        $this->Poids = $Poids;

        return $this;
    }


    public function getAuteurNom(): ?string
    {
        return $this->auteurNom;
    }

    public function setAuteurNom(string $auteurNom): self
    {
        $this->auteurNom = $auteurNom;

        return $this;
    }

    public function getAuteurPrenom(): ?string
    {
        return $this->auteurPrenom;
    }

    public function setAuteurPrenom(string $auteurPrenom): self
    {
        $this->auteurPrenom = $auteurPrenom;

        return $this;
    }

    public function getHistoire(): ?string
    {
        return $this->histoire;
    }

    public function setHistoire(?string $histoire): self
    {
        $this->histoire = $histoire;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setPost($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->contains($comment)) {
            $this->comments->removeElement($comment);
            // set the owning side to null (unless already changed)
            if ($comment->getPost() === $this) {
                $comment->setPost(null);
            }
        }

        return $this;
    }

    public function getPoisson(): ?Poisson
    {
        return $this->poisson;
    }

    public function setPoisson(?Poisson $poisson): self
    {
        $this->poisson = $poisson;

        return $this;
    }

}

