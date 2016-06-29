<?php
namespace Picqer\Financials\Exact;

/**
 * Entity holding stock position details.
 *
 * @package Picqer\Financials\Exact
 * @see https://start.exactonline.nl/docs/HlpRestAPIResourcesDetails.aspx?name=ReadLogisticsStockPosition
 *
 * @property $InStock
 * @property $ItemId
 * @property $PlanningIn
 * @property $PlanningOut
 */
class StockPosition extends Model
{
    use Query\Findable;

    /**
     * The fillable properties for the StockPosition model.
     *
     * @var string[]
     */
    protected $fillable = ['InStock', 'ItemId', 'PlanningIn', 'PlanningOut'];

    /**
     * The API request URL slug.
     *
     * @var string
     */
    protected $url = 'read/logistics/StockPosition';

    /**
     * The primary key for the current entity.
     *
     * @var string
     */
    protected $primaryKey = 'ItemId';

    /**
     * Load a model by it's GUID
     *
     * @param string $id
     *
     * @return StockPosition
     */
    public function find($id)
    {
        $result = $this->connection()->get($this->url, [
            $this->primaryKey => "guid'$id'"
        ]);

        return new self($this->connection(), reset($result));
    }

    /**
     * Load a model by it's GUID and select the fields
     *
     * @param string $id
     * @param string $select
     *
     * @return void
     *
     * @throws \RuntimeException Method not supported.
     */
    public function findWithSelect($id, $select = '')
    {
        throw new \RuntimeException(__METHOD__ . ' is not supported by the API');
    }

    /**
     * Filter a collection
     *
     * @param string $filter
     * @param string $expand
     * @param string $select
     * @param null   $system_query_options
     *
     * @return void
     *
     * @throws \RuntimeException Method not supported.
     */
    public function filter($filter, $expand = '', $select = '', $system_query_options = null)
    {
        throw new \RuntimeException(__METHOD__ . ' is not supported by the API');
    }
}
