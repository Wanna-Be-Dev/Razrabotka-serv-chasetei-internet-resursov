<?php
require 'vendor/autoload.php';
require_once __DIR__ . '/vendor/amenadiel/jpgraph/src/config.inc.php';



use Amenadiel\JpGraph\Graph;
use Amenadiel\JpGraph\Plot;
use Amenadiel\JpGraph\Util;

function PieChart($name,$data1y) {
    $graph = new Graph\PieGraph(350, 250);
	$graph->title->Set($name);
	$graph->SetBox(true);
	
	
	$p1   = new Plot\PiePlot($data1y);
	$p1->ShowBorder();
	$p1->SetColor('black');
	$p1->SetSliceColors(array('#F72585','#B5179E','#FFCDD2','#560BAD','#480CA8','#3A0CA3','#3F37C9','#4361EE','#4895EF','#4CC9F0','#7400b8','#240046','#90e0ef','#212f45'));
		 
	$graph->Add($p1);
	$graph->Stroke("PieChart.jpg");
}

function BarChart($name,$data1y){
    setlocale(LC_ALL, 'et_EE.ISO-8859-1');
    // Create the graph. These two calls are always required
    $__width  = 310;
    $__height = 200;
    $graph    = new Graph\Graph($__width, $__height);
    $graph->SetScale('textlin');
    
    $graph->SetShadow();
    $graph->img->SetMargin(40, 30, 20, 40);
    
    // Create the bar plots
    $b1plot = new Plot\BarPlot($data1y);
    $b1plot->SetFillColor(array('#F72585','#B5179E','#FFCDD2'));
    
    // Create the grouped bar plot
    $gbplot = new Plot\AccBarPlot([$b1plot]);
    
    // ...and add it to the graPH
    $graph->Add($gbplot);
    $graph->title->Set($name);
    
    $graph->title->SetFont(FF_FONT1, FS_BOLD);
    $graph->yaxis->title->SetFont(FF_FONT1, FS_BOLD);
    $graph->xaxis->title->SetFont(FF_FONT1, FS_BOLD);
    // Display the graph
    $graph->Stroke("BarChart.jpg");
}

function lineChart($name,$data1y){
    // Create the graph.
			$__width  = 350;
			$__height = 250;
			$graph    = new Graph\Graph($__width, $__height);
			$graph->SetScale('textlin');
			$graph->img->SetMargin(30, 90, 40, 50);
			$graph->xaxis->SetFont(FF_FONT1, FS_BOLD);
			$graph->title->Set($name);
			
			// Create the linear plot
			$lineplot = new Plot\LinePlot($data1y);
			$lineplot->SetColor('#F72585');
			$lineplot->SetWeight(5);
			
			// Add the plot to the graph
			$graph->Add($lineplot);
			
			// Display the graph
			$graph->Stroke("LineChart.jpg");
}

function BiezeChart($name,$data1y){

  

    $__width  = 350;
    $__height = 250;
    $g        = new Graph\CanvasGraph($__width, $__height);
    $scale    = new Graph\CanvasScale($g);
    $shape    = new Graph\Shape($g, $scale);
    
    $g->title->Set('Bezier line '. $name);
    
    // Setup control point for bezier
    $p = $data1y;
    
    // Visualize control points
    $shape->SetColor('blue');
    $shape->Line($p[0], $p[1], $p[2], $p[3]);
    $shape->FilledCircle($p[2], $p[3], -6);
    
    $shape->SetColor('red');
    $shape->Line($p[4], $p[5], $p[6], $p[7]);
    $shape->FilledCircle($p[4], $p[5], -6);
    
    // Draw bezier
    $shape->SetColor('black');
    $shape->Bezier($p);
    
    // Frame it with a square
    $shape->SetColor('navy');
    $shape->Rectangle(0.5, 2, 9.5, 9.5);
    
    // ... and stroke it
    $g->Stroke('BiezeChart.png');
}
?>