<?php
use Migrations\AbstractSeed;

/**
 * Produits seed.
 */
class ProduitsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'store_id' => '8',
                'title' => 'Galaxy S9',
                'created' => '2019-10-14 02:41:40',
                'modified' => '2019-10-14 02:41:40',
            ],
            [
                'id' => '2',
                'store_id' => '7',
                'title' => 'Iphone 11',
                'created' => '2019-10-14 02:43:51',
                'modified' => '2019-10-14 02:45:35',
            ],
            [
                'id' => '3',
                'store_id' => '7',
                'title' => 'Iphone X',
                'created' => '2019-10-14 02:44:02',
                'modified' => '2019-10-14 02:44:02',
            ],
            [
                'id' => '4',
                'store_id' => '7',
                'title' => 'Iphone 8',
                'created' => '2019-10-14 02:44:14',
                'modified' => '2019-10-14 02:44:14',
            ],
            [
                'id' => '5',
                'store_id' => '7',
                'title' => 'Iphone XR',
                'created' => '2019-10-14 02:44:34',
                'modified' => '2019-10-14 02:44:34',
            ],
            [
                'id' => '6',
                'store_id' => '7',
                'title' => 'Iphone XS',
                'created' => '2019-10-14 02:44:45',
                'modified' => '2019-10-14 02:44:45',
            ],
            [
                'id' => '7',
                'store_id' => '8',
                'title' => 'Galaxy S10',
                'created' => '2019-10-14 02:45:18',
                'modified' => '2019-10-14 02:45:18',
            ],
            [
                'id' => '8',
                'store_id' => '11',
                'title' => 'P30',
                'created' => '2019-10-15 03:06:39',
                'modified' => '2019-10-15 03:06:39',
            ],
            [
                'id' => '9',
                'store_id' => '9',
                'title' => 'Pixel ',
                'created' => '2019-10-15 03:07:12',
                'modified' => '2019-10-15 03:07:12',
            ],
            [
                'id' => '10',
                'store_id' => '9',
                'title' => 'Pixel 2',
                'created' => '2019-10-15 03:07:36',
                'modified' => '2019-10-15 03:07:36',
            ],
            [
                'id' => '11',
                'store_id' => '9',
                'title' => 'Pixel 3',
                'created' => '2019-10-15 03:08:40',
                'modified' => '2019-10-15 03:08:40',
            ],
            [
                'id' => '12',
                'store_id' => '11',
                'title' => 'P10',
                'created' => '2019-10-15 03:09:21',
                'modified' => '2019-10-15 03:09:21',
            ],
            [
                'id' => '13',
                'store_id' => '8',
                'title' => 'Galaxy S8',
                'created' => '2019-10-15 03:09:45',
                'modified' => '2019-10-15 03:09:45',
            ],
            [
                'id' => '14',
                'store_id' => '8',
                'title' => 'Galaxy A20',
                'created' => '2019-10-15 03:09:57',
                'modified' => '2019-10-15 03:09:57',
            ],
            [
                'id' => '15',
                'store_id' => '11',
                'title' => 'P20',
                'created' => '2019-10-15 03:10:38',
                'modified' => '2019-10-15 03:10:38',
            ],
            [
                'id' => '16',
                'store_id' => '11',
                'title' => 'P30 Mate',
                'created' => '2019-10-15 03:10:49',
                'modified' => '2019-10-15 03:10:49',
            ],
            [
                'id' => '17',
                'store_id' => '11',
                'title' => 'P20 Mate',
                'created' => '2019-10-15 03:10:59',
                'modified' => '2019-10-15 03:10:59',
            ],
        ];

        $table = $this->table('produits');
        $table->insert($data)->save();
    }
}
