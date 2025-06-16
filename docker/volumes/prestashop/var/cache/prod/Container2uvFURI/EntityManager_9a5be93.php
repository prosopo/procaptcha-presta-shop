<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolderfdb2c = null;
    private $initializer0414f = null;
    private static $publicPropertiesff54f = [
        
    ];
    public function getConnection()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getConnection', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getMetadataFactory', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getExpressionBuilder', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'beginTransaction', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->beginTransaction();
    }
    public function getCache()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getCache', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getCache();
    }
    public function transactional($func)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'transactional', array('func' => $func), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'wrapInTransaction', array('func' => $func), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'commit', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->commit();
    }
    public function rollback()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'rollback', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getClassMetadata', array('className' => $className), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'createQuery', array('dql' => $dql), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'createNamedQuery', array('name' => $name), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'createQueryBuilder', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'flush', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'clear', array('entityName' => $entityName), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->clear($entityName);
    }
    public function close()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'close', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->close();
    }
    public function persist($entity)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'persist', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'remove', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'refresh', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'detach', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'merge', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getRepository', array('entityName' => $entityName), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'contains', array('entity' => $entity), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getEventManager', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getConfiguration', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'isOpen', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getUnitOfWork', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getProxyFactory', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'initializeObject', array('obj' => $obj), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getFilters', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'isFiltersStateClean', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'hasFilters', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializer0414f = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHolderfdb2c) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolderfdb2c = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHolderfdb2c->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__get', ['name' => $name], $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        if (isset(self::$publicPropertiesff54f[$name])) {
            return $this->valueHolderfdb2c->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfdb2c;
            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolderfdb2c;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __set($name, $value)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfdb2c;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHolderfdb2c;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();
        return $returnValue;
    }
    public function __isset($name)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__isset', array('name' => $name), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfdb2c;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHolderfdb2c;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();
        return $returnValue;
    }
    public function __unset($name)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__unset', array('name' => $name), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolderfdb2c;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHolderfdb2c;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }
    public function __clone()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__clone', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        $this->valueHolderfdb2c = clone $this->valueHolderfdb2c;
    }
    public function __sleep()
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__sleep', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return array('valueHolderfdb2c');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer0414f = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer0414f;
    }
    public function initializeProxy() : bool
    {
        return $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'initializeProxy', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolderfdb2c;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolderfdb2c;
    }
}
