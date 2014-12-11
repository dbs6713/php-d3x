<?php
/**
 * File name: AbstractRepository.php
 *
 * Project: d3x
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Common\Domain\Repository
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   $Revision$
 * @link      https:/ems.ldschurch.org
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Common\Domain\Repository;

use Common\Infrastructure\DataMapper\DataMapperInterface;


/**
 * Class AbstractRepository
 *
 * @category  PHP
 * @package   Common\Domain\Repository
 * @author    stringhamdb <stringhamdb@familysearch.org>
 * @copyright 2014 © Intellectual Reserve, Inc.
 * @license   Trademarked by Intellectual Reserve, Inc.
 * @version   Release: 0.1
 * @link      https:/ems.ldschurch.org
 */
abstract class AbstractRepository
{
    /**
     * @var \Common\Infrastructure\DataMapper\DataMapperInterface $dataMapper
     * @access protected
     */
    protected $dataMapper;

    /**
     * Function __constructor
     *
     * @param \Common\Infrastructure\DataMapper\DataMapperInterface $dataMapper
     *
     * @access public
     */
    public function __construct(DataMapperInterface $dataMapper)
    {
        $this->dataMapper = $dataMapper;
    }

    /**
     * Function __destructor
     *
     * @access public
     */
    public function __destruct()
    {
        unset($this->dataMapper);
    }
} 
