<?php

class ModuleRepository_091bb2f extends \PrestaShop\PrestaShop\Core\Module\ModuleRepository implements \ProxyManager\Proxy\VirtualProxyInterface
{
    private $valueHoldera4591 = null;
    private $initializerb2db0 = null;
    private static $publicPropertiesdc8c9 = [
        
    ];
    public function getList() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getList', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getList();
    }
    public function getInstalledModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getInstalledModules', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getInstalledModules();
    }
    public function getMustBeConfiguredModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getMustBeConfiguredModules', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getMustBeConfiguredModules();
    }
    public function getUpgradableModules() : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getUpgradableModules', array(), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getUpgradableModules();
    }
    public function getModule(string $moduleName) : \PrestaShop\PrestaShop\Core\Module\ModuleInterface
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getModule', array('moduleName' => $moduleName), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getModule($moduleName);
    }
    public function getModulePath(string $moduleName) : ?string
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'getModulePath', array('moduleName' => $moduleName), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->getModulePath($moduleName);
    }
    public function setActionUrls(\PrestaShop\PrestaShop\Core\Module\ModuleCollection $collection) : \PrestaShop\PrestaShop\Core\Module\ModuleCollection
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'setActionUrls', array('collection' => $collection), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->setActionUrls($collection);
    }
    public function clearCache(?string $moduleName = null, bool $allShops = false) : bool
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, 'clearCache', array('moduleName' => $moduleName, 'allShops' => $allShops), $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        return $this->valueHoldera4591->clearCache($moduleName, $allShops);
    }
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;
        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $instance, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($instance);
        $instance->initializerb2db0 = $initializer;
        return $instance;
    }
    public function __construct(\PrestaShop\PrestaShop\Adapter\Module\ModuleDataProvider $moduleDataProvider, \PrestaShop\PrestaShop\Adapter\Module\AdminModuleDataProvider $adminModuleDataProvider, \Doctrine\Common\Cache\CacheProvider $cacheProvider, \PrestaShop\PrestaShop\Adapter\HookManager $hookManager, string $modulePath, int $contextLangId)
    {
        static $reflection;
        if (! $this->valueHoldera4591) {
            $reflection = $reflection ?? new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
            $this->valueHoldera4591 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
        }
        $this->valueHoldera4591->__construct($moduleDataProvider, $adminModuleDataProvider, $cacheProvider, $hookManager, $modulePath, $contextLangId);
    }
    public function & __get($name)
    {
        $this->initializerb2db0 && ($this->initializerb2db0->__invoke($valueHoldera4591, $this, '__get', ['name' => $name], $this->initializerb2db0) || 1) && $this->valueHoldera4591 = $valueHoldera4591;
        if (isset(self::$publicPropertiesdc8c9[$name])) {
            return $this->valueHoldera4591->$name;
        }
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        $realInstanceReflection = new \ReflectionClass('PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository');
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
        \Closure::bind(function (\PrestaShop\PrestaShop\Core\Module\ModuleRepository $instance) {
            unset($instance->moduleDataProvider, $instance->adminModuleDataProvider, $instance->hookManager, $instance->cacheProvider, $instance->modulePath, $instance->installedModules, $instance->modulesFromHook, $instance->contextLangId);
        }, $this, 'PrestaShop\\PrestaShop\\Core\\Module\\ModuleRepository')->__invoke($this);
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
