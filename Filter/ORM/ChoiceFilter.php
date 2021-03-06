<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\AdminBundle\Filter\ORM;

use Doctrine\ORM\QueryBuilder;

class ChoiceFilter extends Filter
{
    /**
     * @param QueryBuilder $queryBuilder
     * @param string $alias
     * @param string $field
     * @param mixed $value
     * @return
     */
    public function filter($queryBuilder, $alias, $field, $value)
    {
        if (is_array($value)) {
            if (count($value) == 0) {
                return;
            }

            if (in_array('all', $value)) {
                return;
            }

            $queryBuilder->andWhere($queryBuilder->expr()->in(sprintf('%s.%s', $alias, $field ), $value));
        } else {

            if (empty($value) || $value == 'all') {
                return;
            }

            $queryBuilder->andWhere(sprintf('%s.%s = :%s', $alias, $field, $this->getName()));
            $queryBuilder->setParameter($this->getName(), $value);
        }
    }
}