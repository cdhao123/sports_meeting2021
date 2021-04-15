<?php

namespace App\Models;

/**
 * Class Game
 * @package App\Models
 *
 * @property integer $id
 * @property string $name
 * @property \Carbon\Carbon $begins_at
 * @property integer $golden_id
 * @property string $golden_name
 * @property Team $golden
 * @property integer $silver_id
 * @property string $silver_name
 * @property Team $silver
 * @property integer $bronze_id
 * @property string $bronze_name
 * @property Team $bronze
 * @property integer $golden_s_id
 * @property string $golden_s_name
 * @property Team $golden_s
 * @property integer $silver_s_id
 * @property string $silver_s_name
 * @property Team $silver_s
 * @property integer $bronze_s_id
 * @property string $bronze_s_name
 * @property Team $bronze_s
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Game extends Model
{
    /** @var array 需要转换的日期属性 */
    protected $dates = [
        'begins_at'
    ];

    /**
     * 金牌所属队伍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function golden()
    {
        return $this->belongsTo('App\Models\Team', 'golden_id');
    }

    /**
     * 银牌所属队伍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function silver()
    {
        return $this->belongsTo('App\Models\Team', 'silver_id');
    }

    /**
     * 铜牌所属队伍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bronze()
    {
        return $this->belongsTo('App\Models\Team', 'bronze_id');
    }

    /**
     * 体特-金牌所属队伍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function golden_s()
    {
        return $this->belongsTo('App\Models\Team', 'golden_s_id');
    }

    /**
     * 体特-银牌所属队伍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function silver_s()
    {
        return $this->belongsTo('App\Models\Team', 'silver_s_id');
    }

    /**
     * 体特-铜牌所属队伍
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bronze_s()
    {
        return $this->belongsTo('App\Models\Team', 'bronze_s_id');
    }

    public function toArray()
    {
        $data = [];

        $data['id'] = $this->id;
        $data['name'] = $this->name;
        $data['begins_at'] = $this->begins_at->toDateTimeString();
        $data['golden_name'] = $this->golden_name;
        $data['silver_name'] = $this->silver_name;
        $data['bronze_name'] = $this->bronze_name;
        $data['golden_s_name'] = $this->golden_s_name;
        $data['silver_s_name'] = $this->silver_s_name;
        $data['bronze_s_name'] = $this->bronze_s_name;
        $data['golden_team'] = $this->golden ? $this->golden->name : null;
        $data['silver_team'] = $this->silver ? $this->silver->name : null;
        $data['bronze_team'] = $this->bronze ? $this->bronze->name : null;
        $data['golden_s_team'] = $this->golden_s ? $this->golden_s->name : null;
        $data['silver_s_team'] = $this->silver_s ? $this->silver_s->name : null;
        $data['bronze_s_team'] = $this->bronze_s ? $this->bronze_s->name : null;

        return $data;
    }
}
