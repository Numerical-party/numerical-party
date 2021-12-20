<?php

namespace App\Entity;

use App\Repository\CreateGroupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\NilUuid;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Uid\UuidV1;

/**
 * @ORM\Entity(repositoryClass=CreateGroupRepository::class)
 */
class CreateGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="uuid", unique=true)
     */
    private $token;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $member_invited;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $member;

    public function getToken(): ?Uuid
    {
        return $this->token;
    }

    public function __construct()
    {
        $this->token = Uuid::v1();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMemberInvited(): ?User
    {
        return $this->member_invited;
    }

    public function setMemberInvited(?User $member_invited): self
    {
        $this->member_invited = $member_invited;

        return $this;
    }

    public function getMember(): ?User
    {
        return $this->member;
    }

    public function setMember(?User $member): self
    {
        $this->member = $member;

        return $this;
    }
}
