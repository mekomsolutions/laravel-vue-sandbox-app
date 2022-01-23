<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Demo\Feature\Demos\Demo\Demo as DomainModel;

class Demo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
    ];

    public function toModel(): DomainModel
    {
        return new DomainModel(
            id: $this->id,
            name: $this->name
        );
    }
}
