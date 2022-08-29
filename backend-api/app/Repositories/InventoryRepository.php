<?php
namespace App\Repositories;

use App\Models\Inventory;

class InventoryRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Inventory();
    }

    public function import($file)
    {
        try {
            $rows = json_decode(file_get_contents($file));

            foreach ($rows->inventory as $row) {
                $this->model->updateOrCreate(
                    ['id' => $row->art_id],
                    [
                        'product_component_id' => $row->art_id,
                        'name' => $row->name,
                        'stock' => $row->stock,
                    ]
                );
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}
