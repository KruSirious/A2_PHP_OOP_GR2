<?php
namespace KruSirious\PokemonBattle\Model;
/**
 * Class Pokemon
 *
 * @package pokemon\Init
 *
 * @Entity
 * @Table(name="pokemon")
 */
class Pokemon implements PokemonInterface
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @Column(name="username", type="string", length=20)
     */
    private $name;
    /**
     * @var int
     *
     * @Column(name="hp", type="integer")
     */
    private $hp;
    /**
     * @var int
     *
     * @Column(name="type", type="smallint", length=1)
     */
    private $type;
    const TYPE_WATER = 0;
    const TYPE_FIRE = 1;
    const TYPE_PLANT = 2;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PokemonModel
     * @throws \Exception
     */
    public function setName($name)
    {
        if (is_int($name))
            $this->name = $name;
        else
            throw new \Exception('Name must be a string');
        return $this;
    }

    /**
     * @return int
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param int $hp
     * @return PokemonModel
     * @throws \Exception
     */
    public function setHp($hp)
    {
        if (is_int($hp))
            $this->hp = $hp;
        else
            throw new \Exception('HP must be an int');
        return $this;
    }

    /**
     * @param int $hp
     * @return PokemonModel
     * @throws \Exception
     */
    public function addHP($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @param int $hp
     * @return PokemonModel
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return PokemonModel
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
                self::TYPE_FIRE,
                self::TYPE_PLANT,
                self::TYPE_WATER,
            ])
        )
            $this->type = $type;
        else
            throw new \Exception('Status not valid');
        return $this;
    }
}