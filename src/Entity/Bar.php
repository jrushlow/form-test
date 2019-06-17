<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Bar
 *
 * @package App\Entity
 * @author  Jesse Rushlow <jr@geeshoe.com>
 *
 * @ORM\Entity(repositoryClass="App\Repository\BarRepository")
 */
class Bar
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer", unique=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return Bar
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Bar
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
