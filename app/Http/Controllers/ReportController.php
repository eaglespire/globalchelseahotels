<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function show()
    {
        return view('report', [
            'monthlyOrdersImageUrl' => $this->monthlyOrdersImageUrl(),
            'monthlyRevenueImageUrl' => $this->monthlyRevenueImageUrl(),
            'shareOfProductsImageUrl' => $this->shareOfProductsImageUrl(),
        ]);
    }
     
    private function monthlyOrdersImageUrl() {
        $data = [
            [ "date" => "2021-01-01", "Orders" => 21 ],
            [ "date" => "2021-02-01", "Orders" => 46 ],
            [ "date" => "2021-03-01", "Orders" => 66 ],
            [ "date" => "2021-04-01", "Orders" => 81 ],
            [ "date" => "2021-05-01", "Orders" => 99 ],
            [ "date" => "2021-06-01", "Orders" => 117 ],
        ];
        $chart = [
            "data" => [ "values" => $data ],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "date",
                            "type" => "ordinal",
                            "timeUnit" => "month",
                            "axis" => [ "labelAngle" => 0 ],
                            "title" => "Month"
                        ],
                        "y" => [
                            "field" => "Orders",
                            "type" => "quantitative"
                        ]
                    ],
                    "layer" => [
                        [ "mark" => [ "type" => "bar" ] ],
                        [
                            "mark" => ["type" => "text", "dy" => -8],
                            "encoding" => ["text" => ["field" => "Orders", "type" => "quantitative" ]]
                        ]
                    ]
                ]
            ]
        ];
        // dd(json_encode($chart));
        return $chart;
        // return $this->buildGetChartMeUrl($chart);
    }

    private function monthlyRevenueImageUrl() {
        $data = [
            [ "date" => "2021-01-01", "Revenue" => 2123 ],
            [ "date" => "2021-02-01", "Revenue" => 4656 ],
            [ "date" => "2021-03-01", "Revenue" => 6652 ],
            [ "date" => "2021-04-01", "Revenue" => 8132 ],
            [ "date" => "2021-05-01", "Revenue" => 9992 ],
            [ "date" => "2021-06-01", "Revenue" => 11768 ],
        ];
      
         $chart = [
             "data" => [ "values" => $data ],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "x" => [
                            "field" => "date",
                            "type" => "ordinal",
                            "timeUnit" => "month",
                            "axis" => [ "labelAngle" => 0 ],
                            "title" => "Month"
                        ],
                        "y" => [
                            "field" => "Revenue",
                            "type" => "quantitative"
                        ]
                    ],
                    "layer" => [
                        [ "mark" => [ "type" => "line", "point" => true ] ],
                        [
                            "mark" => ["type" => "text", "align" => "left", "dx" => 8, "dy" => 8],
                            "encoding" => ["text" => ["field" => "Revenue", "type" => "quantitative" ]]
                        ]
                    ]
                ]
            ]
        ];
        return $this->buildGetChartMeUrl($chart);
    }

    private function shareOfProductsImageUrl() {
        $data = [
            [ "Product" => "Apple", "Orders" => 21 ],
            [ "Product" => "Orange", "Orders" => 46 ],
            [ "Product" => "Banana", "Orders" => 123 ],
            [ "Product" => "Guava", "Orders" => 34 ],
            [ "Product" => "Dragonfruit", "Orders" => 65 ],
            [ "Product" => "Jackfruit", "Orders" => 117 ],
        ];
        $chart = [
            "data" => [ "values" => $data ],
            "width" => 450,
            "height" => 300,
            "layer" => [
                [
                    "encoding" => [
                        "y" => [
                            "field" => "Product",
                            "type" => "nominal",
                            "sort" => "-x"
                        ],
                        "x" => [
                            "field" => "Orders",
                            "type" => "quantitative"
                        ]
                    ],
                    "layer" => [
                        [ "mark" => [ "type" => "bar" ] ],
                        [
                            "mark" => ["type" => "text", "dx" => 8, "align" => "left"],
                            "encoding" => ["text" => ["field" => "Orders", "type" => "quantitative" ]]
                        ]
                    ]
                ]
            ]
        ];
        
        return $this->buildGetChartMeUrl($chart);
    }

    private function buildGetChartMeUrl($chart)
    {
        return "https://pub.getchart.me/vega-lite?c=" . urlencode(json_encode($chart));
    }

}