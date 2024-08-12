<?php
namespace modele\metier;

/**
 * Description of Shopping
 *
 * @author apineau
 */
class Shopping {
    /**
    * @var string
    */
    private $titre;

    /**
     * Lieu constructor.
     * @param string $titre
     */
    public function __construct(string $titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }
}
