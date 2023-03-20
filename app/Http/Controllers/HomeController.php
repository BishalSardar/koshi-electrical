<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Customer;
use App\Models\CustomerBill;
use App\Models\CustomerBillProduct;
use App\Models\Product;
use App\Models\RegularBill;
use App\Models\RegularBillProducts;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customerCount = Customer::count();

        $regularSales = RegularBillProducts::sum('amount');
        $customerSales = CustomerBillProduct::sum('amount');
        $totalEarnings = $regularSales + $customerSales;
        $customer_bills = CustomerBill::limit(7)->get();
        $completedContracts = Contract::where('status', 1)->count();
        $available_product_count = Stock::where('stock', '>', 0)->count();

        // asdhjflaksdfjlsadkfjlaskdjflaksdjfasldkfjalsdkjfds


        $current_week_start = Carbon::now()->startOfWeek();
        $current_week_end = Carbon::now()->endOfWeek();

        // Initialize an empty array to store the sales data
        $customer_sales_by_day = [];
        $regular_sales_by_day = [];

        // Loop through each day of the current week
        for ($date = $current_week_start; $date <= $current_week_end; $date->addDay()) {
            // Get the total sales for this day
            $customer_total_sales = CustomerBill::whereDate('created_at', $date)->sum('net_total_amount');
            $regular_total_sales = RegularBill::whereDate('created_at', $date)->sum('net_total_amount');
            // Store the total sales for this day in the sales array
            $customer_sales_by_day[] = $customer_total_sales;
            $regular_sales_by_day[] = $regular_total_sales;
        }

        // Output the sales data for each day of the week
        // print_r($customer_sales_by_day);

        // Output the total sales for each day for both models separately
        // echo "CustomerBill Sales by Day:\n";
        // print_r($customer_bill_customer_sales_by_day);
        // echo "\nRegularBill Sales by Day:\n";
        // print_r($regular_bill_customer_sales_by_day);

        // dd($customer_sales_by_day);


        // ak;sldfha;skdlfjha;sldkfjas;dlfkhasdfaskdfj





        return view('home', compact(
            'customerCount',
            'regularSales',
            'customerSales',
            'totalEarnings',
            'customer_bills',
            'completedContracts',
            'available_product_count',
            'customer_sales_by_day',
            'regular_sales_by_day'
        ));
    }
}
