<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Response;

class HomeController extends Controller
{
	public function __construct ()
	{
		// 
	}
	public function index ()
	{
		return view('index');
	}
	public function search (Request $request)
	{
		$val = $request->validate([
			'mes' => 'required|numeric|max:12|min:01',
			'ano' => 'required|numeric',
			'print' => 'nullable',
		], [
			'mes.required' => 'selecciones un mes',
			'mes.ano' => 'selecciones un año',
		]);
		$response = Http::get('https://api.sbif.cl/api-sbifv3/recursos_api/dolar/'.$request->ano.'/'.$request->mes.'?apikey=d8093171162117c0c6e8da895b00978d4e2b6a0e&formato=json');
		// dd($response, $response->body(), $response->json(), $response->collect());
		if (isset($val['print'])) {
			// IMPRIMIR EN CSV
			$archivo=fopen("data.csv" ,"w");
			// fputcsv($archivo, array_values($columnas),";");
			foreach ($response->collect() as $dolar) {
				foreach ($dolar as $key => $value) {
					fputcsv($archivo,
						[
							date('d-m-Y', strtotime($value['Fecha'])),
							$value['Valor']
						],
						";");
				}
				// fputcsv($archivo, $dolar,";");
			}
			fclose($archivo);
			$headers = [
				"Content-type" => "text/csv",
				"Content-Disposition" => "attachment; filename=data.csv",
				"Pragma" => "no-cache",
				"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
				"Expires" => "0"
			];
			return Response::download('data.csv', 'data.csv',[$headers])->deleteFileAfterSend(true);
		}
		return view('lista')->with([
			'json' => $response->json(),
			'collection' => $response->collect(),
			'val' => $val,
		]);
	}
	public function print ($var)
	{
		// IMPRIMIR EN CSV
		$archivo=fopen("data.csv" ,"w");
		// fputcsv($archivo, array_values($columnas),";");
		foreach ($response->collect() as $dolar) {
			// $datos = array_map("utf8_decode", $pro);
			fputcsv($archivo, array_values($dolar),";");
		}
		fclose($archivo);
		$headers = [
			"Content-type" => "text/csv",
			"Content-Disposition" => "attachment; filename=data.csv",
			"Pragma" => "no-cache",
			"Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
			"Expires" => "0"
		];
		return Response::download('data.csv', 'data.csv',[$headers])->deleteFileAfterSend(true);
	}
}
