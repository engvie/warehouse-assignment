<?php
namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Product();
    }

    public function all()
    {
        //Eager load product components with its inventory
        return $this->model->with('productComponents.inventory')->get();
    }

    public function import($file)
    {
        try {
            $rows = json_decode(file_get_contents($file));
            foreach ($rows->products as $row) {
                $product = $this->model->updateOrCreate(
                    ['name' => $row->name],
                    ['name' => $row->name],
                );

                foreach ($row->contain_articles as $productComponent)
                {
                    $product->productComponents()->updateOrCreate(
                        ['id' => $productComponent->art_id],
                        [
                            'id' => $productComponent->art_id,
                            'amount_of' => $productComponent->amount_of,
                        ]
                    );
                }
            }
        } catch (\Exception $e) {
            return $e;
        }
    }

}
