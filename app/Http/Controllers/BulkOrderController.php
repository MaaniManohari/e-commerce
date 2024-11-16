<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BulkOrder;
use App\Mail\BulkOrderMail;
use Illuminate\Support\Facades\Mail;

class BulkOrderController extends Controller
{
    public function submitBulkOrder(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        // Save the validated data to the bulk_orders table
        BulkOrder::create($data);

        // Send an email notification to the admin with the form data
        Mail::to('kannangaraharitha@gmail.com')->send(new BulkOrderMail($data));

        // Redirect the user back with a success message
        return redirect()->back()->with('success', 'Your order has been submitted successfully!');
    }


    public function bulkOrders()
    {
        // Fetch all bulk orders
        $bulkOrders = BulkOrder::paginate(10);
        
        // Return the view with the paginated bulk orders
        return view('admin.bulk.viewbulk', compact('bulkOrders'));
    }

    public function updateResponse(Request $request, $id)
    {
        $bulkOrder = BulkOrder::find($id);
        $bulkOrder->response = $request->has('response') ? true : false;
        $bulkOrder->save();

        return redirect()->back()->with('success', 'Response updated successfully!');
    }

    public function updateResponseAndNote(Request $request, $id)
    {
        $bulkOrder = BulkOrder::find($id);
        $bulkOrder->response = $request->has('response') ? true : false;
        $bulkOrder->note = $request->input('note');
        $bulkOrder->save();

        return redirect()->back()->with('success', 'Response and Note updated successfully!');
    }
}
