<?php

namespace App\Entity;

use App\Repository\VoteInvitationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoteInvitationRepository::class)
 */
class VoteInvitation
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
