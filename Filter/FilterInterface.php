<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\AdminBundle\Filter;

use Sonata\AdminBundle\Admin\FieldDescriptionInterface;

interface FilterInterface
{
    /**
     * Apply the filter to the QueryBuilder instance
     *
     * @abstract
     * @param $queryBuilder
     * @param string $alias
     * @param string $field
     * @param string $value
     * @return void
     */
    function filter($queryBuilder, $alias, $field, $value);

    /**
     * Returns the filter name
     * @abstract
     * @return string
     */
    function getName();

    /**
     * @abstract
     * @return array
     */
    function getDefaultOptions();

    /**
     * @abstract
     * @param string $name
     * @param null $default
     * @return void
     */
    function getOption($name, $default = null);

    /**
     * @abstract
     * @return \Sonata\AdminBundle\Admin\FieldDescriptionInterface
     */
    function getFieldDescription();

    /**
     * @abstract
     * @param \Sonata\AdminBundle\Admin\FieldDescriptionInterface $fieldDescription
     * @return void
     */
    function setFieldDescription(FieldDescriptionInterface $fieldDescription);
}
