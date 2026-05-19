<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Resources\ReportResource;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $reports = Report::where('user_id', $user->id)
            ->with('user')
            ->paginate(10);

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
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['user_id'] = auth()->id();

        $report = Report::create($validatedData);

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $report = Report::find($id);
        if (!$report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        $report->delete();

        return response()->json(['message' => 'Report deleted successfully']);
    }
}
