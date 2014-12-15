<?php
/**
 * PhpStorm
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   autoloader.php_php
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 (c) Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve
 * @link      http://www.lds.org
 * @version   $Revision$
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

/**
 * Class AutoLoader
 *
 * <?php
 *
 * $loader = new \AutoLoader();
 * $loader->addNamespace('Foo\Bar', '/path/to/packages/foo-bar/src);
 * $loader->register();
 *
 * @category  PHP
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
class Autoloader
{

    /**
     * @var array $classes Key = Class name and Value = class directory.
     * @access
     */
    protected $classes = [];

    /**
     * Function __constructor
     *
     * @param array $defaultClasses
     */
    public function __construct($defaultClasses = [])
    {
        $this->classes = $defaultClasses;
    }

    /**
     * Function addClass Adds a class to the class list.
     *
     * @param string $className Name of the class to be loaded.
     * @param string $classDir  Directory of the class file.
     *
     * @access public
     */
    public function addClass($className, $classDir)
    {
        $this->classes[$className] = $classDir;
    }

    /**
     * Function loadClass
     *
     * @param $className
     *
     * @access public
     */
    public function loadClass($className)
    {
        if (isset($this->classes[$className])) {
            /** @noinspection PhpIncludeInspection */
            require $this->classes[$className];
        }
    }

    /**
     * Function register Register loader method with SPL autoloader queue.
     *
     * @access public
     */
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    /**
     * Function unregister Unregister the loader method with SPL autoloader queue.
     *
     * @access public
     */
    public function unregister()
    {
        spl_autoload_unregister([$this, 'loadClass']);
    }
}
