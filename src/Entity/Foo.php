<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Foo
 *
 * @package App\Entity
 * @author  Jesse Rushlow <jr@geeshoe.com>
 *
 * @ORM\Entity(repositoryClass="App\Repository\FooRepository")
 */
class Foo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Foo
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
