<?php
use Migrations\AbstractSeed;

/**
 * Stores seed.
 */
class StoresSeed extends AbstractSeed
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
                'id' => '7',
                'file_id' => '5',
                'name' => 'Apple',
                'created' => '2019-10-14',
                'modified' => '2019-10-14',
            ],
            [
                'id' => '8',
                'file_id' => '6',
                'name' => 'Samsung',
                'created' => '2019-10-14',
                'modified' => '2019-10-14',
            ],
            [
                'id' => '9',
                'file_id' => '7',
                'name' => 'Google',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
            ],
            [
                'id' => '10',
                'file_id' => '8',
                'name' => 'One Plus',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
            ],
            [
                'id' => '11',
                'file_id' => '9',
                'name' => 'Huawei',
                'created' => '2019-10-15',
                'modified' => '2019-10-15',
            ],
        ];

        $table = $this->table('stores');
        $table->insert($data)->save();
    }
}
