<?php

namespace App\Repositories\InventoryRepositories;

use App\Models\Unit;
use App\Traits\UploadTrait;


class UnitRepository
{
    use UploadTrait;

    public function units()
    {
        return Unit::query();
    }

    public function store($request)
    {
        Unit::create([
            'code' => $request->code,
            'name' => $request->name,
            'base_unit' => $request->base_unit,
            'operator' => $request->operator,
            'operation_value' => $request->operation_value ? intval($request->operation_value) : null,
            'is_active' => $request->is_active ?? 0,
        ]);
    }

    public function show($unitId)
    {
        return Unit::find($unitId);
    }

    public function update($unit, $request)
    {
        $unit->code = $request->code;
        $unit->name = $request->name;
        $unit->base_unit = $request->base_unit;
        $unit->operator = $request->operator;
        $unit->operation_value = $request->operation_value ? intval($request->operation_value) : null;
        $unit->is_active = $request->is_active ?? 0;
        $unit->save();
    }


    public function destroy($unitId)
    {
        $unit = Unit::findOrFail($unitId);
        $this->deleteFile($unit->image);
        $unit->delete();
    }
}
