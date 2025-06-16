<?php

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHoldera4591 = null;
    private $initializerb2db0 = null;
    private static $publicPropertiesdc8c9 = [
        
    ];
    public function getConnection()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getConnection', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getConnection();
    }
    public function getMetadataFactory()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getMetadataFactory', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getMetadataFactory();
    }
    public function getExpressionBuilder()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getExpressionBuilder', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getExpressionBuilder();
    }
    public function beginTransaction()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'beginTransaction', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->beginTransaction();
    }
    public function getCache()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getCache', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getCache();
    }
    public function transactional($func)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'transactional', array('func' => $func), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->transactional($func);
    }
    public function wrapInTransaction(callable $func)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'wrapInTransaction', array('func' => $func), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->wrapInTransaction($func);
    }
    public function commit()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'commit', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->commit();
    }
    public function rollback()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'rollback', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->rollback();
    }
    public function getClassMetadata($className)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getClassMetadata', array('className' => $className), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getClassMetadata($className);
    }
    public function createQuery($dql = '')
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'createQuery', array('dql' => $dql), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->createQuery($dql);
    }
    public function createNamedQuery($name)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'createNamedQuery', array('name' => $name), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->createNamedQuery($name);
    }
    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->createNativeQuery($sql, $rsm);
    }
    public function createNamedNativeQuery($name)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->createNamedNativeQuery($name);
    }
    public function createQueryBuilder()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'createQueryBuilder', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->createQueryBuilder();
    }
    public function flush($entity = null)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'flush', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->flush($entity);
    }
    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->find($className, $id, $lockMode, $lockVersion);
    }
    public function getReference($entityName, $id)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getReference($entityName, $id);
    }
    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getPartialReference($entityName, $identifier);
    }
    public function clear($entityName = null)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'clear', array('entityName' => $entityName), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->clear($entityName);
    }
    public function close()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'close', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->close();
    }
    public function persist($entity)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'persist', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->persist($entity);
    }
    public function remove($entity)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'remove', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->remove($entity);
    }
    public function refresh($entity)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'refresh', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->refresh($entity);
    }
    public function detach($entity)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'detach', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->detach($entity);
    }
    public function merge($entity)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'merge', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->merge($entity);
    }
    public function copy($entity, $deep = false)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->copy($entity, $deep);
    }
    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->lock($entity, $lockMode, $lockVersion);
    }
    public function getRepository($entityName)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getRepository', array('entityName' => $entityName), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getRepository($entityName);
    }
    public function contains($entity)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'contains', array('entity' => $entity), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->contains($entity);
    }
    public function getEventManager()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getEventManager', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getEventManager();
    }
    public function getConfiguration()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getConfiguration', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getConfiguration();
    }
    public function isOpen()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'isOpen', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->isOpen();
    }
    public function getUnitOfWork()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getUnitOfWork', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getUnitOfWork();
    }
    public function getHydrator($hydrationMode)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getHydrator($hydrationMode);
    }
    public function newHydrator($hydrationMode)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->newHydrator($hydrationMode);
    }
    public function getProxyFactory()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getProxyFactory', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getProxyFactory();
    }
    public function initializeObject($obj)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'initializeObject', array('obj' => $obj), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->initializeObject($obj);
    }
    public function getFilters()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getFilters', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getFilters();
    }
    public function isFiltersStateClean()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'isFiltersStateClean', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->isFiltersStateClean();
    }
    public function hasFilters()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'hasFilters', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->hasFilters();
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);
        $instance->initializerb2db0 = $initializer;
        return $instance;
    }
    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;
        if (! $this->valueHoldera4591) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHoldera4591 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
        }
        $this->valueHoldera4591->__construct($conn, $config, $eventManager);
    }
    public function & __get($name)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__get', ['name' => $name], $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        if (isset(self::$publicPropertiesdc8c9[$name])) {
            return $this->valueHoldera4591->$name;
        }
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera4591;
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
        $targetObject = $this->valueHoldera4591;
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
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera4591;
            $targetObject->$name = $value;
            return $targetObject->$name;
        }
        $targetObject = $this->valueHoldera4591;
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
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__isset', array('name' => $name), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera4591;
            return isset($targetObject->$name);
        }
        $targetObject = $this->valueHoldera4591;
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
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__unset', array('name' => $name), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');
        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHoldera4591;
            unset($targetObject->$name);
            return;
        }
        $targetObject = $this->valueHoldera4591;
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
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__clone', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        $this->valueHoldera4591 = clone $this->valueHoldera4591;
    }
    public function __sleep()
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__sleep', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return array('valueHoldera4591');
    }
    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }
    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerb2db0 = $initializer;
    }
    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerb2db0;
    }
    public function initializeProxy() : bool
    {
        return $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'initializeProxy', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
    }
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHoldera4591;
    }
    public function getWrappedValueHolderValue()
    {
        return $this->valueHoldera4591;
    }
}
