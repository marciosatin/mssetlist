<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="produto")
 */
class Produto {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    **/
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categoria")
     * @ORM\JoinColumn(name="categoria_id", referencedColumnName="id")
     */
    private $categoria;
    
    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
    }

    /**
     * @ORM\Column(type="string")
     */
    private $nome;
    
    /**
     * @ORM\Column(type="text")
     */
    private $descricao;
    
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

}
