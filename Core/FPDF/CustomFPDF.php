<?php

namespace Core\FPDF;

class CustomFPDF extends FPDF
{

    protected $pageWidth = 210; // mm
    protected $pageHeight = 297; // mm

    /**
     * Report header
     */
    private function myHeader($start_date, $end_date, $revenue)
    {

        $print_date = date("Y-m-d H:i:s");

        $formated_print_date = date('F d, Y \a\\t h:i A', strtotime($print_date));
        $formated_start_date = date('F d, Y', strtotime($start_date));
        $formated_end_date = date('F d, Y', strtotime($end_date));

        $formated_revenue = number_format($revenue['revenue'], '2', '.', ',');

        // left sidde
        $this->SetFont('Arial', '', 23);
        $this->setX(0);
        $this->SetTextColor(255, 255, 255);
        $this->setFillColor(0, 0, 0);
        $this->Cell(90, 20, "NORTE CAFE    ", 1, 0, "R", true);

        // right side
        $this->setXY(100, 13);
        $this->SetFont('Arial', '', 11);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(90, 8, "BY  COFFEE BUNNY", 0, 1, "R");
        $this->setXY(100, 19);
        $this->SetFont("Arial", "", 11);
        $this->Cell(90, 8, "San Isidro 2, Dasmarinas, Cavite", 0,  0, "R");

        // rectangle on right side
        $this->setXY(200, 16);
        $this->Cell(10, 10, "", 1, 0, "", true);

        $this->ln();
        $this->ln();
        $this->SetFont("Arial", "", 12);
        $this->Cell(0, 4, "", 0, 1, "");
        $this->Cell(0, 7, "          Generated Report", 0, 1, "");

        $this->Cell(0, 2, "", 0, 1, "");
        $this->SetX(0);
        $this->Cell(50, 0.2, "", 1, 0, true);

        $this->ln();
        $this->Cell(0, 4, "", 0, 1, ""); // spacing

        $this->SetFont("Arial", "B", 12);
        $this->Cell(50, 7, "          PRINT DATE :", 0, 0, "L");

        $this->SetFont("Arial", "", 12);
        $this->Cell(0, 7, "{$formated_print_date}", 0, 1, "L");

        $this->SetFont("Arial", "B", 12);
        $this->Cell(50, 7, "          STARTING DATE :", 0, 0, "L");

        $this->SetFont("Arial", "", 12);
        $this->Cell(0, 7, "{$formated_start_date}", 0, 1, "L");

        $this->SetFont("Arial", "B", 12);
        $this->Cell(50, 7, "          END DATE :", 0, 0, "L");

        $this->SetFont("Arial", "", 12);
        $this->Cell(0, 7, "{$formated_end_date}", 0, 1, "L");

        $this->ln();

        $this->SetFont("Arial", "B", 12);
        $this->Cell(50, 7, "          REVENUE :", 0, 0, "L");

        $this->SetFont("Arial", "", 12);
        $this->Cell(0, 7, "P{$formated_revenue}", 0, 1, "L");
    }

    /**
     * Used for generating reports
     * on PDF
     */
    public function generateReport($transactions, $start_date, $end_date, $revenue)
    {

        new FPDF('P', 'mm', [$this->pageWidth, $this->pageHeight]);
        $this->AddPage();
        $this->SetFont('Arial', '', 23);

        $this->myHeader($start_date, $end_date, $revenue);

        // table heading
        $this->ln();
        $this->ln();
        $this->SetX(0);
        $this->SetFont("Arial", "B", 12);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(35, 10, "YEAR", 1, 0, "C", true);
        $this->Cell(35, 10, "MONTH", 1, 0, "C", true);
        $this->Cell(40, 10, "TRANS COUNT", 1, 0, "C", true);
        $this->Cell(40, 10, "REVENUE", 1, 0, "C", true);
        $this->Cell(60, 10, "TOP SALE PRODUCT", 1, 0, "C", true);

        // table body
        $cell_height = 15;
        foreach ($transactions as $trans) {
            $this->SetFont("Arial", "", 12);
            $this->SetTextColor(0, 0, 0);

            $this->Cell(25, $cell_height, $trans['year'], 1, 0, "C");
            $this->Cell(40, $cell_height, $trans['month_name'], 1, 0, "C");
            $this->Cell(40, $cell_height, $trans['transaction_count'], 1, 0, "C");
            $this->Cell(40, $cell_height, 'P' . number_format($trans['revenue'], 2), 1, 0, "C");
            $this->Cell(40, $cell_height, $trans['top_sale_product'] ?? 'N/A', 1, 0, "C");

            $this->Ln(); // move to next line after each row
        }


        $this->Output();
    }
}
