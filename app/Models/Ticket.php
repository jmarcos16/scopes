<?php

namespace App\Models;

use App\Models\User;
use App\Enums\TickerPriorityEnum;
use App\Models\Traits\Searchable;
use App\Models\Scopes\MyTaskScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[ScopedBy(MyTaskScope::class)]
class Ticket extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected function casts(): array
    {
        return [
            'priority' => TickerPriorityEnum::class,
        ];
    }
}
