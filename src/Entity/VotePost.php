<?php

namespace App\Entity;

use App\Repository\VotePostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VotePostRepository::class)
 */
class VotePost
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $votes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVotes(): ?string
    {
        return $this->votes;
    }

    public function setVotes(string $votes): self
    {
        $this->votes = $votes;

        return $this;
    }
}
