<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Wallet;

class WalletController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Wallet::getall(), Response::HTTP_OK); 
         } catch (\Exception $ex) {
            return json_encode(['erro' => 'Erro ao listar todas as transações.'.$ex->getMessage()], Response::HTTP_NO_CONTENT);
         }
    }

    public function store(Request $request)
    {
        try {
            return response()->json(Wallet::putWallet($request), Response::HTTP_OK); 
         } catch (\Exception $ex) {
            return json_encode(['erro' => 'Erro ao salvar a transação.'.$ex->getMessage()], Response::HTTP_NO_CONTENT);
         }
    }

    public function show($id)
    {
        return response()->json(Wallet::getWalletById($id), Response::HTTP_OK); 
        try {
            return response()->json(Wallet::getWalletById($id), Response::HTTP_OK); 
         } catch (\Exception $ex) {
            return json_encode(['erro' => 'Erro ao listar a transação.'.$ex->getMessage()], Response::HTTP_NO_CONTENT);
         }
    }

    public function update(Request $request, $id)
    {
        try {
            return response()->json(Wallet::updateWalletById($request, $id), Response::HTTP_OK); 
         } catch (\Exception $ex) {
            return json_encode(['erro' => 'Erro ao atualizar a transação.'.$ex->getMessage()], Response::HTTP_NO_CONTENT);
         }
    }

    public function destroy($id)
    {
        try {
            return response()->json(Wallet::deleteWalletById($id), Response::HTTP_OK); 
         } catch (\Exception $ex) {
            return json_encode(['erro' => 'Erro ao deletar transação.'.$ex->getMessage()], Response::HTTP_NO_CONTENT);
         }
    }

    public function rollBackWallet(Request $request)
    {
        try {
            return response()->json(Wallet::rollBack($request), Response::HTTP_OK); 
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_NO_CONTENT);
        }
    }
}
