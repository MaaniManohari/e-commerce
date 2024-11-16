<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function orderHistory()
{
    // Retrieve authenticated user
    $user = Auth::user();

    // Fetch orders for the user, with related order items and products
    $orders = Order::where('user_id', $user->id)
                   ->with('orderItems.product')
                   ->orderBy('created_at', 'desc')
                   ->get();

    // Pass $user and $orders to the view
    return view('User.profile', compact('user', 'orders'));
}

    public function viewOrder($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id); // Use 'orderItems' here
    
        return view('User.orders.viewOrder', compact('order'));
    }

    public function orderPdf($id)
    {
        $user = Auth::user();
        $order = Order::with('orderItems.product')->findOrFail($id);

        // Encode image to base64
        $path = public_path('assets/images/my/logo.jfif');
        if (!file_exists($path)) {
            abort(404, 'Logo not found');
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64Image = 'data:image/' . $type . ';base64,' . base64_encode($data);
        

        // Generate the current date
        $currentDate = Carbon::now()->format('Y-m-d');

        // Create PDF options
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Source Sans Pro');  // Ensure the font is available, or use a fallback font
        //  $pdfOptions->set('isRemoteEnabled', true);

        // Instantiate Dompdf
        $dompdf = new Dompdf($pdfOptions);

        // Render the view to HTML
        $pdfContent = view('User.orders.orderPdf', compact('base64Image', 'currentDate', 'user', 'order'))->render();

        // Load HTML content into Dompdf
        $dompdf->loadHtml($pdfContent);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');  // Consider using A4 unless A3 is really needed

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF (inline download)
        return $dompdf->stream('Invoice.pdf', array('Attachment' => 0));  // Attachment = 0 will display in browser, 1 for download
    }


    public function adminOrderList()
    {
        $orders = Order::with('orderItems.product')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    
    
    public function adminViewOrder($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id); // Use 'orderItems' here
    
        return view('admin.orders.viewOrder', compact('order'));
    }
    
   

    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
    
        // Update the order status and reason
        $order->status = $request->input('status');
        $order->reason = $request->input('reason');
        $order->save();
    
        // Optionally, send an email if needed
        // Mail::to($order->user->email)->send(new OrderStatusMail($order));
    
        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully.');
    }



    
    

    









}
