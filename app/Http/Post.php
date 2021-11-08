<? php
class Post extends Model
{
 // 割り当て許可
    protected $fillable = [
        'name',
        'subject',
        'message', 
        'category_id'
    ];
}