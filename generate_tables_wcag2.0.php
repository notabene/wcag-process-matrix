<?php
echo "<pre>";
// Generate table WCAG 2.0

// -----------------------
// 0.we load contents

// spreadsheet material

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Ods;

// init spreadsheet
$spreadsheet = new Spreadsheet();
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
$spreadsheet->getDefaultStyle()->getFont()->setSize(10);
$worksheet = $spreadsheet->getActiveSheet();

// all the WCAG information

require_once("inc/load_json_wcag2.0.php");

require_once("inc/build_data_arrays.php");



// -----------------------
// 1. initiating objects etc.

$folder = "output/";
$filename = "process-matrix-wcag20";
$linefeed = "<br>";

$styles_headings = [
	'font' => [
		'bold' => true,
	]
];

$styles_first_columns = [
	'alignment' => [
		'horizontal' => 'left'
	]
];

$styles_all = [
	'alignment' => [
		'vertical' => 'top',
		'horizontal' => 'center'
	]
];

// -----------------------
// 2. generating the data for the table

// 2.1. header

# https://phpspreadsheet.readthedocs.io/en/develop/topics/accessing-cells/#setting-a-range-of-cells-from-an-array
$worksheet->fromArray(
	$th,
	NULL,
	'A1');

$worksheet->getStyle($worksheet->calculateWorksheetDimension())->applyFromArray($styles_headings);


// 2.2. data in cells
$worksheet->fromArray(
	$tr,
	NULL,
	'A2');

$worksheet->getStyle($worksheet->calculateWorksheetDimension())->applyFromArray($styles_all);
$worksheet->getStyle('A1:C'.$worksheet->getHighestRow())->applyFromArray($styles_first_columns);

// 2.3. formatting the thing correctly
$rowcount = $worksheet->getHighestRow();
for($i = 2 ; $i <= $rowcount ; $i++) {
	// 1. store in a regexp everything that is going to be useful
	// "<a href='" . $sc_url . "'><strong>" . $sc_id . " - " . $sc_title . "</strong></a>"
	preg_match(
		"/\<a href='(.*)'\>\<strong\>(.*)\<\/strong\>\<\/a\>/",
		$worksheet->getCell('B'.$i)->getValue(),
		$matches);
	$sc_url = $matches[1];
	$sc_title = $matches[2];
	// 2. reconstruct string
	$worksheet->getCell('B'.$i)->setValue($sc_title);
	$worksheet->getCell('B'.$i)->getHyperlink()->setUrl($sc_url);
	$worksheet->getStyle('B'.$i)->getAlignment()->setWrapText(true);
	$worksheet->getStyle('C'.$i)->getAlignment()->setWrapText(true);
	$worksheet->getRowDimension($i)->setRowHeight(12.75*4); // 4 lines, better than nothing
}

$worksheet->getColumnDimension('A')->setAutoSize(true);
$worksheet->getColumnDimension('B')->setWidth(30);
$worksheet->getColumnDimension('C')->setWidth(40);


// -----------------------
// 3. outputting the data to a file

// add autofilter to avoid having to create one
$worksheet->setAutoFilter($worksheet->calculateWorksheetDimension());



		$writer = new Xlsx($spreadsheet);
		$writer->save($folder . $filename . '.xlsx');
		echo "XLSX created" . $linefeed;
		$writer = new Ods($spreadsheet);
		$writer->save($folder . $filename . '.ods');
		echo "ODS created" . $linefeed;

?>