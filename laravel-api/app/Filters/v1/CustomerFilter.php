<?php
namespace App\Filters\v1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;



class CustomerFilter extends ApiFilter{

    protected $safeParms = [
        'postalCode' => ['eq','gt','lt'],
        'type' => ['eq'],
        'name' => ['eq'],
        'email' => ['eq'],
        'address' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq'],

    ];

    protected $columnMap =[
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'gte' => '>=',
        'lte' => '<=',
    ];

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->safeParms as $parm  => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column,$this->operatorMap[$operator],$query[$operator]];
                }
            }
        }

        return $eloQuery;
    }

}