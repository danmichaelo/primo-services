<?php

namespace BCLib\PrimoTools;

/**
 * Generate queries for Deep Links and XService requests
 */
class Query
{
    private $_fields = array();

    public function isbn($isbn)
    {
        $isbn = str_replace('%20', '', $isbn);
        $isbn = preg_replace('/( |\-)/', '', $isbn);
        $this->_addQuery('isbn', 'contains', $isbn);
    }

    private function _addQuery($field, $delimiter, $value)
    {
        if (isset ($this->_fields[$field]))
        {
            $this->_fields[$field]->values[] = $value;
        }
        else
        {
            $this->_fields[$field] = new \stdClass();
            $this->_fields[$field]->delimiter = $delimiter;
            $this->_fields[$field]->values = array($value);
        }
    }

    private function _queryString()
    {
        $queries = array();

        foreach ($this->_fields as $name => $parameters)
        {
            $queries[] = $this->_buildQuery($name, $parameters->delimiter, $parameters->values);
        }

        return implode('&',$queries);
    }

    private function _buildQuery($name, $delimiter, array $values)
    {
        return 'query=' . $name . ',' . $delimiter . ',' . implode('+OR+',$values);
    }

    public function __toString()
    {
        return $this->_queryString();
    }

}