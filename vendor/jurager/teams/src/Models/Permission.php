<?php

namespace Jurager\Teams\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jurager\Teams\Teams;

class Permission extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['ability_id', 'entity_id', 'entity_type', 'forbidden'];

    /**
     * Create a new Team model instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->fillable[] = config('teams.foreign_keys.team_id');
    }

    /**
     * Get the team that the permission belongs to.
     */
    public function team(): BelongsTo
    {
        return $this->belongsTo(Teams::$teamModel);
    }

    /**
     * Get the ability that the permission belongs to.
     */
    public function ability(): BelongsTo
    {
        return $this->belongsTo(Teams::$abilityModel);
    }
}
