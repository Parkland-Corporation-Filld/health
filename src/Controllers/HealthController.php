<?php
namespace Filld\Health\Controllers;

use App\Http\Controllers\Controller;
use DB;

class HealthController extends Controller
{

    private $dbs;
    private $statuses;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Enumerate the DB connections in `config.database`
        $this->dbs = config('database.connections');

        if(count($this->dbs)) {
            $i = 0;
            foreach ($this->dbs as $conn_name => $value) {
                $status = (DB::connection($conn_name)->getPdo()) ? true : false;
                $this->statuses["DB_".++$i] = $status;
            }
        }
    }

    public function index()
    {
        $data = [
            "status" => true,
            "dbs" => $this->statuses
        ];

        return response()->json($data, 200);
    }
}
