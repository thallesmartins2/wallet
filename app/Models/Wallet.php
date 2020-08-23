<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    protected $table = 'transaction_type';

    protected $fillable = [
        'user_id',
        'balance',
    ];

    public static function getAll()
    {
        return 'Chegou na Model Wallet metodo getAll';
    }

    public static function putWallet($request)
    {
        return $request->all();
    }

    public static function getWalletById($id)
    {
        return $id;
    }
    
    public static function editWalletById($id)
    {
        return $id;
    }

    public static function updateWalletById($request, $id) 
    {
        return $request->all();
    }

    public static function deleteWalletById($id) 
    {
        return $id;
    }
}