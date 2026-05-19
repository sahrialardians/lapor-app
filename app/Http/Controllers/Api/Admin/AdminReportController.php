<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\ReportResource;
use App\Models\Report;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::with('user')->paginate(10);

        return ReportResource::collection($reports);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $report = Report::with('user')->find($id);
        if (!$report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        return new ReportResource($report);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportRequest $request, $id)
    {
        $report = Report::find($id);
        if (!$report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        $validatedData = $request->validated();
        $report->update($validatedData);

        return new ReportResource($report);
    }
}
