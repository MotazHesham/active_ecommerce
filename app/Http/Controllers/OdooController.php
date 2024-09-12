<?php

namespace App\Http\Controllers;

use App\Services\OdooService;
use Illuminate\Http\Request;

class OdooController extends Controller
{
    protected $odooService;

    public function __construct(OdooService $odooService)
    {
        $this->odooService = $odooService;
    }

    public function listRecords()
    {
        $model = 'res.partner';  // Example: Odoo model for partners
        $records = $this->odooService->list($model, ['name', 'email'], []);
        
        return response()->json($records);
    }

    public function createRecord(Request $request)
    {
        $model = 'res.partner';
        $data = $request->only(['name', 'email']);
        
        $newRecordId = $this->odooService->create($model, $data);
        
        return response()->json(['id' => $newRecordId]);
    }

    public function updateRecord(Request $request, $id)
    {
        $model = 'res.partner';
        $data = $request->only(['name', 'email']);
        
        $this->odooService->update($model, $id, $data);
        
        return response()->json(['success' => true]);
    }

    public function showRecord($id)
    {
        $model = 'res.partner';
        $record = $this->odooService->show($model, $id, ['name', 'email']);
        
        return response()->json($record);
    }

    public function deleteRecord($id)
    {
        $model = 'res.partner';
        $this->odooService->delete($model, $id);
        
        return response()->json(['success' => true]);
    }
}
