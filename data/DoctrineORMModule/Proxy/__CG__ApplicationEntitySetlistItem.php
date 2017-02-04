<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SetlistItem extends \Application\Entity\SetlistItem implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'cdSetlistItem', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'cdSetlist', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'cdMusicaArtista', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'setlist', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'musicaartista', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'dtCadastro');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'cdSetlistItem', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'cdSetlist', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'cdMusicaArtista', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'setlist', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'musicaartista', '' . "\0" . 'Application\\Entity\\SetlistItem' . "\0" . 'dtCadastro');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SetlistItem $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getDtCadastro()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDtCadastro', array());

        return parent::getDtCadastro();
    }

    /**
     * {@inheritDoc}
     */
    public function setDtCadastro($dtCadastro)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDtCadastro', array($dtCadastro));

        return parent::setDtCadastro($dtCadastro);
    }

    /**
     * {@inheritDoc}
     */
    public function getCdSetlist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCdSetlist', array());

        return parent::getCdSetlist();
    }

    /**
     * {@inheritDoc}
     */
    public function getCdMusicaArtista()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCdMusicaArtista', array());

        return parent::getCdMusicaArtista();
    }

    /**
     * {@inheritDoc}
     */
    public function setCdSetlist($cdSetlist)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCdSetlist', array($cdSetlist));

        return parent::setCdSetlist($cdSetlist);
    }

    /**
     * {@inheritDoc}
     */
    public function setCdMusicaArtista($cdMusicaArtista)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCdMusicaArtista', array($cdMusicaArtista));

        return parent::setCdMusicaArtista($cdMusicaArtista);
    }

    /**
     * {@inheritDoc}
     */
    public function getSetlist()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSetlist', array());

        return parent::getSetlist();
    }

    /**
     * {@inheritDoc}
     */
    public function getMusicaartista()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMusicaartista', array());

        return parent::getMusicaartista();
    }

    /**
     * {@inheritDoc}
     */
    public function setSetlist(\Application\Entity\Setlist $setlist)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSetlist', array($setlist));

        return parent::setSetlist($setlist);
    }

    /**
     * {@inheritDoc}
     */
    public function setMusicaartista(\Application\Entity\MusicaArtista $musicaartista)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMusicaartista', array($musicaartista));

        return parent::setMusicaartista($musicaartista);
    }

    /**
     * {@inheritDoc}
     */
    public function getCdSetlistItem()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCdSetlistItem();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCdSetlistItem', array());

        return parent::getCdSetlistItem();
    }

    /**
     * {@inheritDoc}
     */
    public function setCdSetlistItem($cdSetlistItem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCdSetlistItem', array($cdSetlistItem));

        return parent::setCdSetlistItem($cdSetlistItem);
    }

}
