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

    public function find($id)
    {
        $result = $this->connection()->get($this->url, [
            $this->primaryKey => "guid'$id'"
        ]);

        $attributes = is_array($result) && count($result) > 0
            ? reset($result)
            : [];

        return new self($this->connection(), $attributes);
    }

    public function findWithSelect($id, $select = '')
    {
        throw new \RuntimeException(__METHOD__ . ' is not supported by the API');
    }

    public function filter($filter, $expand = '', $select = '', $system_query_options = null)
    {
        throw new \RuntimeException(__METHOD__ . ' is not supported by the API');
    }
}
