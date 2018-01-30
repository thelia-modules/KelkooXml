<?php

namespace KelkooXml\Model\Base;

use \Exception;
use \PDO;
use KelkooXml\Model\KelkooxmlFeed as ChildKelkooxmlFeed;
use KelkooXml\Model\KelkooxmlFeedQuery as ChildKelkooxmlFeedQuery;
use KelkooXml\Model\Map\KelkooxmlFeedTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Thelia\Model\Country;
use Thelia\Model\Currency;
use Thelia\Model\Lang;

/**
 * Base class that represents a query for the 'kelkooxml_feed' table.
 *
 *
 *
 * @method     ChildKelkooxmlFeedQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildKelkooxmlFeedQuery orderByLabel($order = Criteria::ASC) Order by the label column
 * @method     ChildKelkooxmlFeedQuery orderByLangId($order = Criteria::ASC) Order by the lang_id column
 * @method     ChildKelkooxmlFeedQuery orderByCurrencyId($order = Criteria::ASC) Order by the currency_id column
 * @method     ChildKelkooxmlFeedQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 *
 * @method     ChildKelkooxmlFeedQuery groupById() Group by the id column
 * @method     ChildKelkooxmlFeedQuery groupByLabel() Group by the label column
 * @method     ChildKelkooxmlFeedQuery groupByLangId() Group by the lang_id column
 * @method     ChildKelkooxmlFeedQuery groupByCurrencyId() Group by the currency_id column
 * @method     ChildKelkooxmlFeedQuery groupByCountryId() Group by the country_id column
 *
 * @method     ChildKelkooxmlFeedQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildKelkooxmlFeedQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildKelkooxmlFeedQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildKelkooxmlFeedQuery leftJoinLang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Lang relation
 * @method     ChildKelkooxmlFeedQuery rightJoinLang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Lang relation
 * @method     ChildKelkooxmlFeedQuery innerJoinLang($relationAlias = null) Adds a INNER JOIN clause to the query using the Lang relation
 *
 * @method     ChildKelkooxmlFeedQuery leftJoinCurrency($relationAlias = null) Adds a LEFT JOIN clause to the query using the Currency relation
 * @method     ChildKelkooxmlFeedQuery rightJoinCurrency($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Currency relation
 * @method     ChildKelkooxmlFeedQuery innerJoinCurrency($relationAlias = null) Adds a INNER JOIN clause to the query using the Currency relation
 *
 * @method     ChildKelkooxmlFeedQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildKelkooxmlFeedQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildKelkooxmlFeedQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildKelkooxmlFeedQuery leftJoinKelkooxmlLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelkooxmlLog relation
 * @method     ChildKelkooxmlFeedQuery rightJoinKelkooxmlLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelkooxmlLog relation
 * @method     ChildKelkooxmlFeedQuery innerJoinKelkooxmlLog($relationAlias = null) Adds a INNER JOIN clause to the query using the KelkooxmlLog relation
 *
 * @method     ChildKelkooxmlFeed findOne(ConnectionInterface $con = null) Return the first ChildKelkooxmlFeed matching the query
 * @method     ChildKelkooxmlFeed findOneOrCreate(ConnectionInterface $con = null) Return the first ChildKelkooxmlFeed matching the query, or a new ChildKelkooxmlFeed object populated from the query conditions when no match is found
 *
 * @method     ChildKelkooxmlFeed findOneById(int $id) Return the first ChildKelkooxmlFeed filtered by the id column
 * @method     ChildKelkooxmlFeed findOneByLabel(string $label) Return the first ChildKelkooxmlFeed filtered by the label column
 * @method     ChildKelkooxmlFeed findOneByLangId(int $lang_id) Return the first ChildKelkooxmlFeed filtered by the lang_id column
 * @method     ChildKelkooxmlFeed findOneByCurrencyId(int $currency_id) Return the first ChildKelkooxmlFeed filtered by the currency_id column
 * @method     ChildKelkooxmlFeed findOneByCountryId(int $country_id) Return the first ChildKelkooxmlFeed filtered by the country_id column
 *
 * @method     array findById(int $id) Return ChildKelkooxmlFeed objects filtered by the id column
 * @method     array findByLabel(string $label) Return ChildKelkooxmlFeed objects filtered by the label column
 * @method     array findByLangId(int $lang_id) Return ChildKelkooxmlFeed objects filtered by the lang_id column
 * @method     array findByCurrencyId(int $currency_id) Return ChildKelkooxmlFeed objects filtered by the currency_id column
 * @method     array findByCountryId(int $country_id) Return ChildKelkooxmlFeed objects filtered by the country_id column
 *
 */
abstract class KelkooxmlFeedQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \KelkooXml\Model\Base\KelkooxmlFeedQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\KelkooXml\\Model\\KelkooxmlFeed', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildKelkooxmlFeedQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildKelkooxmlFeedQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \KelkooXml\Model\KelkooxmlFeedQuery) {
            return $criteria;
        }
        $query = new \KelkooXml\Model\KelkooxmlFeedQuery();
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
     * @return ChildKelkooxmlFeed|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KelkooxmlFeedTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(KelkooxmlFeedTableMap::DATABASE_NAME);
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
     * @return   ChildKelkooxmlFeed A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, LABEL, LANG_ID, CURRENCY_ID, COUNTRY_ID FROM kelkooxml_feed WHERE ID = :p0';
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
            $obj = new ChildKelkooxmlFeed();
            $obj->hydrate($row);
            KelkooxmlFeedTableMap::addInstanceToPool($obj, (string) $key);
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
     * @return ChildKelkooxmlFeed|array|mixed the result, formatted by the current formatter
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
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KelkooxmlFeedTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KelkooxmlFeedTableMap::ID, $keys, Criteria::IN);
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
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlFeedTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the label column
     *
     * Example usage:
     * <code>
     * $query->filterByLabel('fooValue');   // WHERE label = 'fooValue'
     * $query->filterByLabel('%fooValue%'); // WHERE label LIKE '%fooValue%'
     * </code>
     *
     * @param     string $label The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByLabel($label = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($label)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $label)) {
                $label = str_replace('*', '%', $label);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelkooxmlFeedTableMap::LABEL, $label, $comparison);
    }

    /**
     * Filter the query on the lang_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLangId(1234); // WHERE lang_id = 1234
     * $query->filterByLangId(array(12, 34)); // WHERE lang_id IN (12, 34)
     * $query->filterByLangId(array('min' => 12)); // WHERE lang_id > 12
     * </code>
     *
     * @see       filterByLang()
     *
     * @param     mixed $langId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByLangId($langId = null, $comparison = null)
    {
        if (is_array($langId)) {
            $useMinMax = false;
            if (isset($langId['min'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::LANG_ID, $langId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($langId['max'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::LANG_ID, $langId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlFeedTableMap::LANG_ID, $langId, $comparison);
    }

    /**
     * Filter the query on the currency_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCurrencyId(1234); // WHERE currency_id = 1234
     * $query->filterByCurrencyId(array(12, 34)); // WHERE currency_id IN (12, 34)
     * $query->filterByCurrencyId(array('min' => 12)); // WHERE currency_id > 12
     * </code>
     *
     * @see       filterByCurrency()
     *
     * @param     mixed $currencyId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByCurrencyId($currencyId = null, $comparison = null)
    {
        if (is_array($currencyId)) {
            $useMinMax = false;
            if (isset($currencyId['min'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::CURRENCY_ID, $currencyId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($currencyId['max'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::CURRENCY_ID, $currencyId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlFeedTableMap::CURRENCY_ID, $currencyId, $comparison);
    }

    /**
     * Filter the query on the country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryId(1234); // WHERE country_id = 1234
     * $query->filterByCountryId(array(12, 34)); // WHERE country_id IN (12, 34)
     * $query->filterByCountryId(array('min' => 12)); // WHERE country_id > 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $countryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(KelkooxmlFeedTableMap::COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelkooxmlFeedTableMap::COUNTRY_ID, $countryId, $comparison);
    }

    /**
     * Filter the query by a related \Thelia\Model\Lang object
     *
     * @param \Thelia\Model\Lang|ObjectCollection $lang The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByLang($lang, $comparison = null)
    {
        if ($lang instanceof \Thelia\Model\Lang) {
            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::LANG_ID, $lang->getId(), $comparison);
        } elseif ($lang instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::LANG_ID, $lang->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByLang() only accepts arguments of type \Thelia\Model\Lang or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Lang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function joinLang($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Lang');

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
            $this->addJoinObject($join, 'Lang');
        }

        return $this;
    }

    /**
     * Use the Lang relation Lang object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\LangQuery A secondary query class using the current class as primary query
     */
    public function useLangQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Lang', '\Thelia\Model\LangQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Currency object
     *
     * @param \Thelia\Model\Currency|ObjectCollection $currency The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByCurrency($currency, $comparison = null)
    {
        if ($currency instanceof \Thelia\Model\Currency) {
            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::CURRENCY_ID, $currency->getId(), $comparison);
        } elseif ($currency instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::CURRENCY_ID, $currency->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCurrency() only accepts arguments of type \Thelia\Model\Currency or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Currency relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function joinCurrency($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Currency');

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
            $this->addJoinObject($join, 'Currency');
        }

        return $this;
    }

    /**
     * Use the Currency relation Currency object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\CurrencyQuery A secondary query class using the current class as primary query
     */
    public function useCurrencyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCurrency($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Currency', '\Thelia\Model\CurrencyQuery');
    }

    /**
     * Filter the query by a related \Thelia\Model\Country object
     *
     * @param \Thelia\Model\Country|ObjectCollection $country The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByCountry($country, $comparison = null)
    {
        if ($country instanceof \Thelia\Model\Country) {
            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::COUNTRY_ID, $country->getId(), $comparison);
        } elseif ($country instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::COUNTRY_ID, $country->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type \Thelia\Model\Country or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

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
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation Country object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \Thelia\Model\CountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', '\Thelia\Model\CountryQuery');
    }

    /**
     * Filter the query by a related \KelkooXml\Model\KelkooxmlLog object
     *
     * @param \KelkooXml\Model\KelkooxmlLog|ObjectCollection $kelkooxmlLog  the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function filterByKelkooxmlLog($kelkooxmlLog, $comparison = null)
    {
        if ($kelkooxmlLog instanceof \KelkooXml\Model\KelkooxmlLog) {
            return $this
                ->addUsingAlias(KelkooxmlFeedTableMap::ID, $kelkooxmlLog->getFeedId(), $comparison);
        } elseif ($kelkooxmlLog instanceof ObjectCollection) {
            return $this
                ->useKelkooxmlLogQuery()
                ->filterByPrimaryKeys($kelkooxmlLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKelkooxmlLog() only accepts arguments of type \KelkooXml\Model\KelkooxmlLog or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelkooxmlLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function joinKelkooxmlLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelkooxmlLog');

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
            $this->addJoinObject($join, 'KelkooxmlLog');
        }

        return $this;
    }

    /**
     * Use the KelkooxmlLog relation KelkooxmlLog object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \KelkooXml\Model\KelkooxmlLogQuery A secondary query class using the current class as primary query
     */
    public function useKelkooxmlLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKelkooxmlLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelkooxmlLog', '\KelkooXml\Model\KelkooxmlLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildKelkooxmlFeed $kelkooxmlFeed Object to remove from the list of results
     *
     * @return ChildKelkooxmlFeedQuery The current query, for fluid interface
     */
    public function prune($kelkooxmlFeed = null)
    {
        if ($kelkooxmlFeed) {
            $this->addUsingAlias(KelkooxmlFeedTableMap::ID, $kelkooxmlFeed->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the kelkooxml_feed table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(KelkooxmlFeedTableMap::DATABASE_NAME);
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
            KelkooxmlFeedTableMap::clearInstancePool();
            KelkooxmlFeedTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildKelkooxmlFeed or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildKelkooxmlFeed object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(KelkooxmlFeedTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(KelkooxmlFeedTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        KelkooxmlFeedTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            KelkooxmlFeedTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // KelkooxmlFeedQuery
