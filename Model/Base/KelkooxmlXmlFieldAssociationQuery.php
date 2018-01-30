<?php

namespace KelkooXml\Model\Base;

use \Exception;
use \PDO;
use KelkooXml\Model\KelkooxmlXmlFieldAssociation as ChildKelkooxmlXmlFieldAssociation;
use KelkooXml\Model\KelkooxmlXmlFieldAssociationQuery as ChildKelkooxmlXmlFieldAssociationQuery;
use KelkooXml\Model\Map\KelkooxmlXmlFieldAssociationTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Attribute;
use Thelia\Model\Feature;

/**
 * Base class that represents a query for the 'kelkooxml_xml_field_association' table.
 *
 *
 *
 * @method     ChildKelkooxmlXmlFieldAssociationQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery orderByXmlField($order = Criteria::ASC) Order by the xml_field column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery orderByAssociationType($order = Criteria::ASC) Order by the association_type column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery orderByFixedValue($order = Criteria::ASC) Order by the fixed_value column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery orderByIdRelatedAttribute($order = Criteria::ASC) Order by the id_related_attribute column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery orderByIdRelatedFeature($order = Criteria::ASC) Order by the id_related_feature column
 *
 * @method     ChildKelkooxmlXmlFieldAssociationQuery groupById() Group by the id column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery groupByXmlField() Group by the xml_field column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery groupByAssociationType() Group by the association_type column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery groupByFixedValue() Group by the fixed_value column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery groupByIdRelatedAttribute() Group by the id_related_attribute column
 * @method     ChildKelkooxmlXmlFieldAssociationQuery groupByIdRelatedFeature() Group by the id_related_feature column
 *
 * @method     ChildKelkooxmlXmlFieldAssociationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKelkooxmlXmlFieldAssociationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKelkooxmlXmlFieldAssociationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKelkooxmlXmlFieldAssociationQuery leftJoinAttribute($relationAlias = null) Adds a LEFT JOIN clause to the query using the Attribute relation
 * @method     ChildKelkooxmlXmlFieldAssociationQuery rightJoinAttribute($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Attribute relation
 * @method     ChildKelkooxmlXmlFieldAssociationQuery innerJoinAttribute($relationAlias = null) Adds a INNER JOIN clause to the query using the Attribute relation
 *
 * @method     ChildKelkooxmlXmlFieldAssociationQuery leftJoinFeature($relationAlias = null) Adds a LEFT JOIN clause to the query using the Feature relation
 * @method     ChildKelkooxmlXmlFieldAssociationQuery rightJoinFeature($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Feature relation
 * @method     ChildKelkooxmlXmlFieldAssociationQuery innerJoinFeature($relationAlias = null) Adds a INNER JOIN clause to the query using the Feature relation
 *
 * @method     ChildKelkooxmlXmlFieldAssociation findOne(ConnectionInterface $con = null) Return the first ChildKelkooxmlXmlFieldAssociation matching the query
 * @method     ChildKelkooxmlXmlFieldAssociation findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKelkooxmlXmlFieldAssociation matching the query, or a new ChildKelkooxmlXmlFieldAssociation object populated from the query conditions when no match is found
 *
 * @method     ChildKelkooxmlXmlFieldAssociation findOneById(int $id) Return the first ChildKelkooxmlXmlFieldAssociation filtered by the id column
 * @method     ChildKelkooxmlXmlFieldAssociation findOneByXmlField(string $xml_field) Return the first ChildKelkooxmlXmlFieldAssociation filtered by the xml_field column
 * @method     ChildKelkooxmlXmlFieldAssociation findOneByAssociationType(int $association_type) Return the first ChildKelkooxmlXmlFieldAssociation filtered by the association_type column
 * @method     ChildKelkooxmlXmlFieldAssociation findOneByFixedValue(string $fixed_value) Return the first ChildKelkooxmlXmlFieldAssociation filtered by the fixed_value column
 * @method     ChildKelkooxmlXmlFieldAssociation findOneByIdRelatedAttribute(int $id_related_attribute) Return the first ChildKelkooxmlXmlFieldAssociation filtered by the id_related_attribute column
 * @method     ChildKelkooxmlXmlFieldAssociation findOneByIdRelatedFeature(int $id_related_feature) Return the first ChildKelkooxmlXmlFieldAssociation filtered by the id_related_feature column
 *
 * @method     array findById(int $id) Return ChildKelkooxmlXmlFieldAssociation objects filtered by the id column
 * @method     array findByXmlField(string $xml_field) Return ChildKelkooxmlXmlFieldAssociation objects filtered by the xml_field column
 * @method     array findByAssociationType(int $association_type) Return ChildKelkooxmlXmlFieldAssociation objects filtered by the association_type column
 * @method     array findByFixedValue(string $fixed_value) Return ChildKelkooxmlXmlFieldAssociation objects filtered by the fixed_value column
 * @method     array findByIdRelatedAttribute(int $id_related_attribute) Return ChildKelkooxmlXmlFieldAssociation objects filtered by the id_related_attribute column
 * @method     array findByIdRelatedFeature(int $id_related_feature) Return ChildKelkooxmlXmlFieldAssociation objects filtered by the id_related_feature column
 *
 */
abstract class KelkooxmlXmlFieldAssociationQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \KelkooXml\Model\Base\KelkooxmlXmlFieldAssociationQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\KelkooXml\\Model\\KelkooxmlXmlFieldAssociation', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKelkooxmlXmlFieldAssociationQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \KelkooXml\Model\KelkooxmlXmlFieldAssociationQuery) {
            return $criteria;
        }
        $query = new \KelkooXml\Model\KelkooxmlXmlFieldAssociationQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildKelkooxmlXmlFieldAssociation|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KelkooxmlXmlFieldAssociationTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KelkooxmlXmlFieldAssociationTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildKelkooxmlXmlFieldAssociation A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, XML_FIELD, ASSOCIATION_TYPE, FIXED_VALUE, ID_RELATED_ATTRIBUTE, ID_RELATED_FEATURE FROM kelkooxml_xml_field_association WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildKelkooxmlXmlFieldAssociation();
            $obj->hydrate($row);
            KelkooxmlXmlFieldAssociationTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildKelkooxmlXmlFieldAssociation|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the xml_field column
     *
     * Example usage:
     * <code>
     * $query->filterByXmlField('fooValue');   // WHERE xml_field = 'fooValue'
     * $query->filterByXmlField('%fooValue%'); // WHERE xml_field LIKE '%fooValue%'
     * </code>
     *
     * @param     string $xmlField The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByXmlField($xmlField = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($xmlField)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $xmlField)) {
                $xmlField = str_replace('*', '%', $xmlField);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::XML_FIELD, $xmlField, $comparison);
    }

    /**
     * Filter the query on the association_type column
     *
     * Example usage:
     * <code>
     * $query->filterByAssociationType(1234); // WHERE association_type = 1234
     * $query->filterByAssociationType(array(12, 34)); // WHERE association_type IN (12, 34)
     * $query->filterByAssociationType(array('min' => 12)); // WHERE association_type > 12
     * </code>
     *
     * @param     mixed $associationType The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByAssociationType($associationType = null, $comparison = null)
    {
        if (is_array($associationType)) {
            $useMinMax = false;
            if (isset($associationType['min'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ASSOCIATION_TYPE, $associationType['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($associationType['max'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ASSOCIATION_TYPE, $associationType['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ASSOCIATION_TYPE, $associationType, $comparison);
    }

    /**
     * Filter the query on the fixed_value column
     *
     * Example usage:
     * <code>
     * $query->filterByFixedValue('fooValue');   // WHERE fixed_value = 'fooValue'
     * $query->filterByFixedValue('%fooValue%'); // WHERE fixed_value LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fixedValue The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByFixedValue($fixedValue = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fixedValue)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fixedValue)) {
                $fixedValue = str_replace('*', '%', $fixedValue);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::FIXED_VALUE, $fixedValue, $comparison);
    }

    /**
     * Filter the query on the id_related_attribute column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRelatedAttribute(1234); // WHERE id_related_attribute = 1234
     * $query->filterByIdRelatedAttribute(array(12, 34)); // WHERE id_related_attribute IN (12, 34)
     * $query->filterByIdRelatedAttribute(array('min' => 12)); // WHERE id_related_attribute > 12
     * </code>
     *
     * @see       filterByAttribute()
     *
     * @param     mixed $idRelatedAttribute The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByIdRelatedAttribute($idRelatedAttribute = null, $comparison = null)
    {
        if (is_array($idRelatedAttribute)) {
            $useMinMax = false;
            if (isset($idRelatedAttribute['min'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_ATTRIBUTE, $idRelatedAttribute['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRelatedAttribute['max'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_ATTRIBUTE, $idRelatedAttribute['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_ATTRIBUTE, $idRelatedAttribute, $comparison);
    }

    /**
     * Filter the query on the id_related_feature column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRelatedFeature(1234); // WHERE id_related_feature = 1234
     * $query->filterByIdRelatedFeature(array(12, 34)); // WHERE id_related_feature IN (12, 34)
     * $query->filterByIdRelatedFeature(array('min' => 12)); // WHERE id_related_feature > 12
     * </code>
     *
     * @see       filterByFeature()
     *
     * @param     mixed $idRelatedFeature The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByIdRelatedFeature($idRelatedFeature = null, $comparison = null)
    {
        if (is_array($idRelatedFeature)) {
            $useMinMax = false;
            if (isset($idRelatedFeature['min'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_FEATURE, $idRelatedFeature['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idRelatedFeature['max'])) {
                $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_FEATURE, $idRelatedFeature['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_FEATURE, $idRelatedFeature, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Attribute object
     *
     * @param \Thelia\Model\Attribute|ObjectCollection $attribute The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByAttribute($attribute, $comparison = null)
    {
        if ($attribute instanceof \Thelia\Model\Attribute) {
            return $this
                ->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_ATTRIBUTE, $attribute->getId(), $comparison);
        } elseif ($attribute instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_ATTRIBUTE, $attribute->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByAttribute() only accepts arguments of type \Thelia\Model\Attribute or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Attribute relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function joinAttribute($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Attribute');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Attribute');
        }

        return $this;
    }

    /**
     * Use the Attribute relation Attribute object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\AttributeQuery A secondary query class using the current class as primary query
     */
    public function useAttributeQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAttribute($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Attribute', '\Thelia\Model\AttributeQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Feature object
     *
     * @param \Thelia\Model\Feature|ObjectCollection $feature The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function filterByFeature($feature, $comparison = null)
    {
        if ($feature instanceof \Thelia\Model\Feature) {
            return $this
                ->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_FEATURE, $feature->getId(), $comparison);
        } elseif ($feature instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID_RELATED_FEATURE, $feature->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByFeature() only accepts arguments of type \Thelia\Model\Feature or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Feature relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function joinFeature($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Feature');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Feature');
        }

        return $this;
    }

    /**
     * Use the Feature relation Feature object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\FeatureQuery A secondary query class using the current class as primary query
     */
    public function useFeatureQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinFeature($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Feature', '\Thelia\Model\FeatureQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKelkooxmlXmlFieldAssociation $kelkooxmlXmlFieldAssociation Object to remove from the list of results
     *
     * @return ChildKelkooxmlXmlFieldAssociationQuery The current query, for fluid interface
     */
    public function prune($kelkooxmlXmlFieldAssociation = null)
    {
        if ($kelkooxmlXmlFieldAssociation) {
            $this->addUsingAlias(KelkooxmlXmlFieldAssociationTableMap::ID, $kelkooxmlXmlFieldAssociation->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the kelkooxml_xml_field_association table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KelkooxmlXmlFieldAssociationTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            KelkooxmlXmlFieldAssociationTableMap::clearInstancePool();
            KelkooxmlXmlFieldAssociationTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildKelkooxmlXmlFieldAssociation or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildKelkooxmlXmlFieldAssociation object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KelkooxmlXmlFieldAssociationTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KelkooxmlXmlFieldAssociationTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        KelkooxmlXmlFieldAssociationTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KelkooxmlXmlFieldAssociationTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // KelkooxmlXmlFieldAssociationQuery
