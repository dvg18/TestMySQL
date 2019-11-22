<?php

namespace Storage;

use BaseClass;
use Exception;

/**
 * Class for working with MySql storage
 * @package Storage
 */
class AbstractManager implements CommonInterface
{
    /** @var string */
    const STORAGE_PATH_NAME = 'Storage';

    /** @var string */
    private $tableName;

    /** @var array */
    private $ptfMapping;

    /** @var string */
    private $entityName;

    /**
     * AbstractManager constructor.
     * @param $entityName
     */
    public function __construct($entityName)
    {
        $factoryClass = self::STORAGE_PATH_NAME . '\_' . $entityName;
        $this->tableName = $factoryClass::getTableName();
        $this->ptfMapping = $factoryClass::getPropertyToFieldMapping();
        $this->entityName = $entityName;
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    public function getById($id)
    {
        $item = API::selectOne('SELECT * FROM ' . $this->tableName . ' WHERE `id` = :id', array(':id' => $id));
        return empty($item)
            ? FALSE
            : $this->_extractItemFromQueryResult($item);
    }

    /**
     * @inheritdoc
     * @throws Exception
     */
    public function getAll($condition = '', $begin = 0, $count = 0)
    {
        $itemsIds = API::selectAll(
            'SELECT * FROM ' . $this->tableName . ' '
            . (empty($condition)
                ? ''
                : 'WHERE ' . $condition)
            . (empty($count)
                ? ''
                : 'LIMIT ' . $begin . $count)
        );
        $items = array();
        foreach ($itemsIds AS $item) {
            $items[] = $this->_extractItemFromQueryResult($item);
        }
        return $items;
    }

    /**
     * Extract entity from Storage
     *
     * @param BaseClass $item
     * @return LineItem
     */
    private function _extractItemFromQueryResult($item)
    {
        $className = self::STORAGE_PATH_NAME . '\\' . $this->entityName;
        $entityItem = new $className;
        foreach ($this->ptfMapping as $propertyName => $propertyValue) {
            $entityItem->$propertyName = $item->$propertyValue;
        }
        return $entityItem;
    }

    /**
     * @inheritdoc
     */
    public function getCounts($condition = '')
    {
        $count = API::selectOne(
            'SELECT count(id) AS count FROM ' . $this->tableName . ' '
            . (empty($condition)
                ? ''
                : 'WHERE ' . $condition)
        );
        return $count->count;
    }

    /**
     * @inheritdoc
     * @return BaseClass|LineItem
     * @throws Exception
     */
    public function create(BaseClass $entity)
    {
        $values = '';
        foreach (array_shift($this->ptfMapping) as $key => $value) {
            $values .= $entity->$key . ',';
        }
        $entity->Id = API::insert(
            'INSERT INTO ' . $this->tableName . ' '
            . '(' . implode(',', array_shift($this->ptfMapping)) . ', `inserted_date`)
                VALUES (' . $values . ',' . date('Y-m-d H:i:s') . ')'
        );
        return $entity;
    }

    /**
     * @inheritdoc
     */
    public function update(BaseClass $entity)
    {
        $values = array(':id' => $entity->Id);
        $valuesLine = '';
        foreach ($this->ptfMapping as $value => $key) {
            $valuesLine .= '`' . $key . '` = :' . $key . ',';
            $values[$key] = empty($entity->$value)
                ? 'NULL'
                : ($entity->$value);
        }
        $valuesLine = substr($valuesLine, 0, -1); //remove last ',' (comma) symbol

        return API::execute(
            'UPDATE ' . $this->tableName
            . ' SET ' . $valuesLine
            . ' WHERE `id` = :id',
            $values
        );
    }

    /**
     * @inheritdoc
     */
    public function remove($entityId)
    {
        return API::execute('DELETE FROM ' . $this->tableName . ' WHERE `id` = :id', array(':id' => $entityId));
    }
}
