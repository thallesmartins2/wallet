<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wallet extends Model
{
    use SoftDeletes;

    protected $table = 'wallet';

    protected $fillable = [
        'user_id',
        'balance',
    ];

    public static function getAll()
    {
        return self::all();
    }

    public static function putWallet($request)
    {
        return self::create($request->all());
    }

    public static function getWalletById($id)
    {
        return self::join('user as u', 'u.id','=','wallet.user_id')
                    ->join('user_type as ut', 'ut.id','=','u.user_type_id')
                    ->where('u.id',$id)
                    ->select(
                        'wallet.*',
                        'u.name as user_name',
                        'ut.name as user_type'
                    )
                    ->first();
    }
    
    public static function editWalletById($id)
    {
        return $id;
    }

    public static function updateWalletById($request, $id) 
    {
        $update_balance = self::find($id)->balance + $request->value;
        return self::find($id)->update(['balance' => $update_balance]);

    }

    public static function deleteWalletById($id) 
    {
        return self::find($id)->delete();
    }

    public static function rollBack($request)
    {
        try {
            self::find($request->payee_wallet['id'])->update(['balance' => $request->payee_wallet['balance']]);
            self::find($request->payer_wallet['id'])->update(['balance' => $request->payer_wallet['balance']]);
            return ['mensagem' => 'rollback realizado com sucesso'];
        } catch (\Throwable $th) {
            return ['mensagem' => 'erro ao realizar o rollback'];
        } 
    }
}