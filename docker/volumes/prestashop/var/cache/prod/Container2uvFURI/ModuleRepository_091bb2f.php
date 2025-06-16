<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHolderfdb2c = null;
    private $initializer0414f = null;
    private static $publicPropertiesff54f = [
        
    ];
    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getList', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getList();
    }
    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getInstalledModules', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getInstalledModules();
    }
    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getMustBeConfiguredModules', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getMustBeConfiguredModules();
    }
    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getUpgradableModules', array(), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getUpgradableModules();
    }
    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getModule', array('moduleName' => $moduleName), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getModule($moduleName);
    }
    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->getModulePath($moduleName);
    }
    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'setActionUrls', array('collection' => $collection), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->setActionUrls($collection);
    }
    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        return $this->valueHolderfdb2c->clearCache($moduleName, $allShops);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);
        $instance->initializer0414f = $initializer;
        return $instance;
    }
    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;
        if (! $this->valueHolderfdb2c) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHolderfdb2c = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
        }
        $this->valueHolderfdb2c->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }
    public function & __get($name)
    {
        $this->initializer0414f && ($this->initializer0414f->__invoke($valueHolderfdb2c, $this, '__get', ['name' => $name], $this->initializer0414f) || 1) && $this->valueHolderfdb2c = $valueHolderfdb2c;
        if (isset(self::$publicPropertiesff54f[$name])) {
            return $this->valueHolderfdb2c->$name;
        }
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
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
