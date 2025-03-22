<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tools;
use App\Http\Requests\ToolRequest;
use App\Repositories\ToolRepository;

class ToolsController extends Controller
{
    protected $toolRepository;

    public function __construct(ToolRepository $toolRepository)
    {
        $this->toolRepository = $toolRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia('ToolsPage', [
            'tools' => $this->toolRepository->getAllTools(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusOptions = [
            [ "value" => "1", "label" => "Active" ],
            [ "value" => "0", "label" => "Inactive" ]
        ];
    
        $category = [
            [ "value" => "1", "label" => "AI" ],
            [ "value" => "2", "label" => "General" ]
        ];
    
        return inertia('AddTool', [
            'statusOptions' => $statusOptions,
            'category' => $category
        ]);
    }
    

    /**
     * Store a newly created resource in storage.
     */
  
    
     public function store(ToolRequest $request)
     {
         $this->toolRepository->storeTool($request->all());
 
         return redirect()->route('tools.index')->with('success', 'Tool added successfully.');
     }
    
    

    /**
     * Display the specified resource.
     */
    public function show(Tools $tools)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tools $tools)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tools $tools)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tools $tools)
    {
        //
    }
}
