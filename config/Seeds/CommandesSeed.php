<?php
use Migrations\AbstractSeed;

/**
 * Commandes seed.
 */
class CommandesSeed extends AbstractSeed
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
                'id' => '2',
                'user_id' => '2',
                'description' => 'Premiere commande',
                'price' => '1',
                'created' => '2019-09-19 13:13:57',
                'modified' => '2019-09-19 13:13:57',
            ],
            [
                'id' => '3',
                'user_id' => '2',
                'description' => 'Premiere commande',
                'price' => '1',
                'created' => '2019-09-26 12:24:22',
                'modified' => '2019-09-26 12:24:22',
            ],
            [
                'id' => '4',
                'user_id' => '1',
                'description' => 'Full Iphone',
                'price' => '5000',
                'created' => '2019-10-14 02:46:21',
                'modified' => '2019-10-14 02:46:21',
            ],
            [
                'id' => '5',
                'user_id' => '1',
                'description' => 'Huawei',
                'price' => NULL,
                'created' => '2019-10-15 16:25:44',
                'modified' => '2019-10-15 16:25:44',
            ],
            [
                'id' => '6',
                'user_id' => '2',
                'description' => 'New phone',
                'price' => NULL,
                'created' => '2019-10-15 16:32:04',
                'modified' => '2019-10-15 16:32:04',
            ],
            [
                'id' => '7',
                'user_id' => '5',
                'description' => 'Tout inventaire',
                'price' => NULL,
                'created' => '2019-10-15 17:20:14',
                'modified' => '2019-10-15 17:20:14',
            ],
        ];

        $table = $this->table('commandes');
        $table->insert($data)->save();
    }
}
