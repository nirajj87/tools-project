<?php
namespace App\Repositories;

use App\Models\Tools;

class ToolRepository
{
   
    public function getAllTools()
    {
        return Tools::latest()->get()->map(function ($tool) {
            return [
                'id' => $tool->id,
                'title' => $tool->title,
                'category' => $tool->category,
                'short_des' => $tool->short_des,
                'description' => $tool->description,
                'order' => $tool->order,
                'status' => $tool->status,
                'button_label' => $tool->button_label ?? 'Try It',
                'image' => $tool->image ? asset('storage/uploads/' . $tool->image) : null,
                'created_at' => $tool->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $tool->updated_at->format('Y-m-d H:i:s'),
            ];
        });
    }
    public function storeTool(array $data)
    {
        $imagePath = null;

        if (isset($data['image'])) {
            $image = $data['image'];
            $fileName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'tools/' . $fileName;
            $image->storeAs('uploads/tools', $fileName, 'public');
        }

        $latestOrder = Tools::where('category', $data['category'])->max('order');
        $newOrder = $latestOrder ? $latestOrder + 1 : 1;

        return Tools::create([
            'title' => $data['title'],
            'category' => $data['category'],
            'short_des' => $data['short_des'],
            'description' => $data['description'],
            'order' => $newOrder,
            'status' => $data['status'],
            'button_label' => $data['button_label'] ?? 'Try It',
            'image' => $imagePath, 
        ]);
    }
}
