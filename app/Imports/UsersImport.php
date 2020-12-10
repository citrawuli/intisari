<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Validators\Failure;


class UsersImport implements ToModel, WithHeadingRow, WithValidation, WithBatchInserts, SkipsOnFailure, SkipsOnError
{
	use Importable, SkipsFailures, SkipsErrors;
    /**
    * @param Model
    */
    public function model(array $row)
    {
        //dump($row);

        return new Customer([
        	'id_customer' => @$row[0] ?? $row['id_customer'] ?? null,
	    	'nama_customer' => @$row[1] ?? $row['nama'] ?? $row['nama_lengkap'],
	    	'alamat_customer' => @$row[2] ?? $row['alamat'] ?? null,
	    	'id_kelurahan' => @$row[3] ?? $row['kodepos'] ?? null,
        ]);
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
        	'*.id_customer' => 'unique:customer,id_customer',
            '*.alamat' => 'required',
            '*.kodepos' => 'required',
        ];
    }

}
